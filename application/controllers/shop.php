<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shop extends CI_Controller {

	function index()
	{

		$data['page_title'] = "Grow for the Cure : Shop";
		$data['page_description'] = "Support Grow for the Cure by making a purchase.";
		$data['body_class'] = "shop-page";

		$this->load->view('header', $data);
//		$this->load->view('shop', $data);
		$this->load->view('footer', $data);

	}

}
?>