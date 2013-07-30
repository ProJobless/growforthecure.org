<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Privacy extends CI_Controller {

	function index()
	{

		$data['page_title'] = "Grow for the Cure : Privacy Policy";
		$data['page_description'] = "Read our privacy policy for Gorw for the Cure here.";
		$data['body_class'] = "privacy-page";

		$this->load->view('header', $data);
		$this->load->view('privacy', $data);
		$this->load->view('footer', $data);

	}



}
?>