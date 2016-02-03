<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Trip extends CI_Model {

	public function add_process($post)
	{

		//Destination Validation
		$this->form_validation->set_rules("destination", "Destination", "trim|required");

		//Description Validation
		$this->form_validation->set_rules("description", "Descripton", "trim|required");

		//Travel Start Validation
		$this->form_validation->set_rules("travel_start", "Travel Start", "required");

		//Travel End Validation
		$this->form_validation->set_rules("travel_end", "Travel End", "required");
		if($this->form_validation->run() === FALSE)
		{
			//We Have Errors -> Setting Flashdata
			$this->session->set_flashdata('trip_errors', validation_errors() );
		} else 
		{
			// $login_id = $this->session->userdata['id'];

			// $add_query = "INSERT INTO TRIPS(user_id, destination, description, travel_start, travel_end, CREATED_AT, UPDATED_AT) VALUES (?, ?, ?, ?, ?, NOW(), NOW())";
			
			// $add_values = array($login_id, $post['destination'], $post['description'], $post['travel_start'], $post['travel_end']);

			// $this->db->query($add_query, $add_values);
		}
	}

	public function show_trip($trip_info)
	{
		$trip_query = "SELECT trips.*, trips.id as trip_info, users.name FROM trips JOIN users ON users.id = user_id WHERE trips.id = $trip_info";

		return $this->db->query($trip_query)->row_array();
	}

	public function show_favorite($trip_info)
	{
		$trip_id = $trip_info["id"];
		$trip_query = "SELECT favorites.*, users.name FROM favorites JOIN USERS ON users.id = favorites.user_id WHERE favorites.trip_id = $trip_id";
		return $this->db->query($trip_query)->result_array();
	}

	public function join_trip($trip_id)
	{
		$my_id = $this->session->userdata["id"];
		// var_dump($this->session->userdata, $trip_id);
		// die();
		$join_query = "INSERT INTO favorites(user_id,trip_id) VALUES($my_id,$trip_id)";

		$this->db->query($join_query);
	}

	public function get_personal_trips()
	{
		$login_id = $this->session->userdata['id'];
		$query = "SELECT trips.id as trip_id, trips.destination, trips.description, trips.travel_start, trips.travel_end, users.id as user_id, users.name FROM trips
		 LEFT JOIN users ON users.id = trips.user_id 
		 LEFT JOIN favorites ON favorites.trip_id = trips.id
		 WHERE trips.user_id = $login_id OR favorites.user_id = $login_id";
		return $this->db->query($query)->result_array();
	}

	public function get_other_trips()
	{
		$login_id = $this->session->userdata['id'];
		$query = "SELECT trips.id as trips_id, trips.destination, trips.description, trips.travel_start, trips.travel_end, users.id as user_id, users.name FROM trips LEFT JOIN users ON users.id = trips.user_id WHERE trips.id NOT IN (SELECT favorites.trip_id FROM favorites WHERE favorites.user_id = $login_id) AND trips.user_id != $login_id";
		return $this->db->query($query)->result_array();
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */