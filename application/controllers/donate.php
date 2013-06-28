<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Donate extends CI_Controller {

	function index()
	{

		$data['page_title'] = "Grow for the Cure : Make a Donation";
		$data['page_description'] = "Make a one time donation to show your support for the cause.";
		$data['body_class'] = "donate-page";

		$this->load->view('header', $data);
		$this->load->view('donate', $data);
		$this->load->view('footer', $data);

	}

}
?>