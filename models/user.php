<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Model {
	
	public function registration_process($post)
	{
		//Name Validation
		$this->form_validation->set_rules("name", "Name", "trim|required");

		//Username Validation
		$this->form_validation->set_rules("user_name", "Username", "trim|required|is_unique[users.username]");

		//Password Validation
		$this->form_validation->set_rules("password", "Password", "required|min_length[8]");

		//Confirm Password Validation
		$this->form_validation->set_rules("password_confirmation", "Password Confirmation", "required|matches[password]");

		if($this->form_validation->run() === FALSE)
		{
			//We Have Errors -> Setting Flashdata 
			$this->session->set_flashdata('errors', validation_errors() );
		} 
		else
		{
			//Creating a query to connect to db
			$query = "INSERT INTO users(name, username, password, CREATED_AT, UPDATED_AT)
			VALUES(?, ?, ?, NOW(), NOW() )";

			//Inserting values into db
			$values = array($post['name'], $post['user_name'], $post['password'] );

			//Returning the values back to the ____ page;
			$this->db->query($query, $values);
			$this->session->set_flashdata('success','Thanks for registering! Please Login.');
		}
	}

	public function login_process($post)
	{
		//Username Validation
		$this->form_validation->set_rules("user_name", "Username", "trim|required");

		//Password
		$this->form_validation->set_rules("password", "Password", "required|min_length[8]"); 

		if($this->form_validation->run() === FALSE)
		{
			$this->session->set_flashdata('errors', validation_errors() );
		} 
		else
		{
			$query = "SELECT * FROM users WHERE users.user_name = ? AND users.password = ?";

			$values = array($post['user_name'], $post['password']);

			$user = $this->db->query($query, $values)->row_array();

			return $user;
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */