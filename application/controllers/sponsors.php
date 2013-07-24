<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sponsors extends CI_Controller {

	function index()
	{
		$this->load->model('model_page_data');

		$page = 'sponsors';
		$data['pagecopy'] = $this->model_page_data->get_copy($page);
		$data['sponsors'] = $this->model_page_data->get_sponsors();

		foreach ($data['pagecopy'] as $copy) {
			$data['copy'] = $copy->introCopy;
		}

		$data['page_title'] = "Grow for the Cure : Meet Our Generous Sponsors";
		$data['page_description'] = "Grow for the Cure couldn't so what it does with out our generous sponsors.";
		$data['body_class'] = "sponsor-page";

		$this->load->view('header', $data);
		$this->load->view('sponsors', $data);
		$this->load->view('footer', $data);

	}

}
?>