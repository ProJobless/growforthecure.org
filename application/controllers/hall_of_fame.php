<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hall_of_fame extends CI_Controller {

	function index()
	{
		$this->load->model('model_page_data');

		$page = 'halloffame';
		$data['pagecopy'] = $this->model_page_data->get_copy($page);

		foreach ($data['pagecopy'] as $copy) {
			$data['copy'] = $copy->introCopy;
		}

		$data['page_title'] = "Grow for the Cure : Hall of Fame";
		$data['page_description'] = "Meet the Growers who have risen above the rest to make their mark.";
		$data['body_class'] = "hall-page";

		$this->load->view('header', $data);
		$this->load->view('hall-of-fame', $data);
		$this->load->view('footer', $data);

	}

}
?>