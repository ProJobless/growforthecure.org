<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Who extends CI_Controller {

	public function index()
	{
		$this->load->model('model_users');

		$data['users'] = $this->model_users->get_all_users();


		$data['page_title'] = "Grow for the Cure : Unknow User.";
		$data['page_description'] = "Grow for the Cure is XXXXXXXX";
		$data['body_class'] = "unknown-page";


		$this->load->view('header', $data);
		$this->load->view('who', $data);
		$this->load->view('footer', $data);
	}


}

/* End of file main.php */
/* Location: ./application/controllers/main.php */