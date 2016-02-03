<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	public function index()
	{
		$this->load->view('login_page');
	}

	public function registration()
	{
		$this->user->registration_process($this->input->post());
		redirect("/");

	}

	public function login()
	{
		$login_user = $this->user->login_process($this->input->post());
		if(empty($login_user))
		{
			$this->session->set_flashdata('errors', "Username and Password didn't match. Try Again");
			redirect("/");
		} else {
			$this->session->set_userdata($login_user);
			redirect("/dashboard");
		}
	}

	public function dashboard()
	{
		//Grabbing USERS's trips
		$personal_trips = $this->trip->get_personal_trips();

		//Grabbing OTHER users' trips where the logged-in user DIDNOT FAVORITED
		$other_trips = $this->trip->get_other_trips();

		$this->load->view('dashboard', array(
			"personal_trips" => $personal_trips,
			"other_trips" => $other_trips
			)
		);
	}

	public function logout()
	{
		$this->session->sess_destroy($this->session->userdata);
		redirect('/');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */