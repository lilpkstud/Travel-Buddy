<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Trips extends CI_Controller {

	public function index()
	{
		$this->load->view('add_trip');
	}

	public function add_trip()
	{
		$trip_added = $this->trip->add_process($this->input->post() );
		if(empty($trip_added))
		{
			redirect('/add_trip');
		}
		else {
			redirect("/dashboard");
		}
	}

	public function show_trip($trip_info)
	{
		$trip_info = $this->trip->show_trip($trip_info);
		$user_favorited = $this->trip->show_favorite($trip_info);
		$this->load->view("trip_info", array(
			"trip_info" => $trip_info,
			"favorite" => $user_favorited
			)
		);
	}

	public function join_trip($trip_id)
	{
		//var_dump($trip_id);
		//die();
		
		$this->trip->join_trip($trip_id);
		redirect('/dashboard');
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */