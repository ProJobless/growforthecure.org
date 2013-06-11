<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends CI_Controller {

	public function index()
	{
		$this->load->helper('cookie');

		delete_cookie("userid");
		delete_cookie("fullname");

		redirect('/', 'refresh');

	}


}
