<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Teams extends CI_Controller {

	public function index()
	{
		$team_to_get = $this->uri->segment(3);

		$data['body_class'] = 'team-page';
		$data['page_title'] = "Grow for the Cure : " . " : Team Profile";
		$data['page_description'] = "Team page for";

		$this->load->view('header', $data);
		$this->load->view('team', $data);
		$this->load->view('footer', $data);




	}





}