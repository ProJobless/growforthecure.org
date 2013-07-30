<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Terms extends CI_Controller {

	function index()
	{

		$data['page_title'] = "Grow for the Cure : Terms and Conditions";
		$data['page_description'] = "Read our terms and conditions for Gorw for the Cure here.";
		$data['body_class'] = "terms-page";

		$this->load->view('header', $data);
		$this->load->view('terms', $data);
		$this->load->view('footer', $data);

	}



}
?>