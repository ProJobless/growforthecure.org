<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Growers extends CI_Controller {

	public function index()
	{
		$this->load->model('model_users');

		$data['users'] = $this->model_users->get_all_users();

		$data['body_class'] = 'growers-page';
		$data['page_title'] = "Grow for the Cure : Meet Our Growers";
		$data['page_description'] = "Meet the growers doing their part to help fight Lung Cancer";


		$this->load->view('header', $data);
		$this->load->view('growers', $data);
		$this->load->view('footer', $data);

	}


}

/* End of file grower.php */
/* Location: ./application/controllers/grower.php */

