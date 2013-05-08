<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index()
	{

		$this->load->model('model_page_data');

		$page = 'front';

		// echo $user_to_get;

		$data['pagecopy'] = $this->model_page_data->get_copy($page);

		foreach ($data['pagecopy'] as $copy) {
			$data['copy'] = $copy->introCopy;
		}


		$data['page_title'] = "Grow for the Cure : Funny Hair. Serious Cause.";
		$data['page_description'] = "Grow for the Cure is XXXXXXXX";
		$data['body_class'] = "front-page";

		$this->load->view('header', $data);
		$this->load->view('index', $data);
		$this->load->view('footer', $data);
	}


}

/* End of file main.php */
/* Location: ./application/controllers/main.php */