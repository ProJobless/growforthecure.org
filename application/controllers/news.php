<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends CI_Controller {

	function index()
	{

		$data['page_title'] = "Grow for the Cure : News and Events";
		$data['page_description'] = "Read news related to Grow for the Cure and see our upcoming events.";
		$data['body_class'] = "news-page";

		$this->load->view('header', $data);
//		$this->load->view('news', $data);
		$this->load->view('footer', $data);

	}

}
?>