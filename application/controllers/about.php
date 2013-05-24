<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About extends CI_Controller {

	function index()
	{

		$data['page_title'] = "Grow for the Cure : About Grow for the Cure";
		$data['page_description'] = "Find out more about Grow for the Cure, and why we do what we do.";
		$data['body_class'] = "about-page";

		$this->load->view('header', $data);
		$this->load->view('about', $data);
		$this->load->view('footer', $data);

	}

	function faq()
	{

		$data['page_title'] = "Grow for the Cure : Frequently Asked Questions";
		$data['page_description'] = "Find out more about Grow for the Cure, and why we do what we do.";
		$data['body_class'] = "faq-page";

		$this->load->view('header', $data);
		$this->load->view('faq', $data);
		$this->load->view('footer', $data);

	}

	function lung_cancer_facts()
	{
		$data['page_title'] = "Grow for the Cure : Lung Cancer Facts";
		$data['page_description'] = "Find out more about Grow for the Cure, and why we do what we do.";
		$data['body_class'] = "lung-page";

		$this->load->view('header', $data);
		$this->load->view('lungcancer', $data);
		$this->load->view('footer', $data);

	}


	function beards101()
	{
		$data['page_title'] = "Grow for the Cure : Beards 101";
		$data['page_description'] = "Find out more about Grow for the Cure, and why we do what we do.";
		$data['body_class'] = "beard-page";

		$this->load->view('header', $data);
		$this->load->view('beards', $data);
		$this->load->view('footer', $data);

	}



}
?>