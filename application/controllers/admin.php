<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	function index()
	{

		// $data['page_title'] = "Grow for the Cure : Meet Our Generous Sponsors";
		// $data['page_description'] = "Grow for the Cure couldn't so what it does with out our generous sponsors.";
		// $data['body_class'] = "sponsor-page";



		//$this->load->view('admin', $data);
		$this->load->view('admin');

	}


	function hall_of_fame()

	{
		$this->load->model('model_admin');
		
		$data['hall'] = $this->model_admin->select_all_in_hall();
		$data['nothall'] = $this->model_admin->select_not_in_hall();

		$this->load->view('header_admin', $data);
		$this->load->view('admin_hall', $data);

	}

	function hall_status()

	{
		$user_to_get = $this->uri->segment(3);
		$promote_demote = $this->uri->segment(4);

		$this->load->model('model_admin');

		$data['promote'] = $this->model_admin->hall_promote_demote($user_to_get, $promote_demote);

	}

	function intro_text()
	{
		$this->load->model('model_admin');
		$data['introtexts'] = $this->model_admin->get_intro_text();


		$this->load->view('header_admin', $data);
		$this->load->view('admin_intro_text', $data);
	}

	function update_intro()
	{
		$this->load->model('model_admin');

		$introPage = $this->uri->segment(3);
		$introCopy = $_POST['copy'];

		$data['updatetext'] = $this->model_admin->update_intro_text($introPage, $introCopy);

	}




}