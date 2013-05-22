<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About extends CI_Controller {

	function index()
	{

		$data['page_title'] = "Grow for the Cure : About Grow for the Cure";
		$data['page_description'] = "Find out more about Grow for the Cure, and why we do what we do.";
		$data['body_class'] = "about-page";

		$this->load->view('header', $data);
//		$this->load->view('about', $data);
		$this->load->view('footer', $data);

	}

}
?>