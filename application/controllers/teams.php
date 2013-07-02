<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Teams extends CI_Controller {

	public function index()
	{
		$team_to_get = $this->uri->segment(3);
		$this->load->model('model_users');


		$data['body_class'] = 'team-page';
		$data['page_title'] = "Grow for the Cure : " . " : Team Profile";
		$data['page_description'] = "Team page for";

		$data['teammembers'] = $this->model_users->get_all_team_members($team_to_get);
		$data['teaminfo'] = $this->model_users->get_team_from_id($team_to_get);

	
		foreach ($data['teaminfo'] as $info) {
			$data['team_name'] = $info->teamName;

		}


		$this->load->view('header', $data);
		$this->load->view('team', $data);
		$this->load->view('footer', $data);




	}





}