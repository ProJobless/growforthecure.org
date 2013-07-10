<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends CI_Controller {

	function index()
	{
		$this->load->model('model_page_data');

		$page = 'news';
		$data['pagecopy'] = $this->model_page_data->get_copy($page);
		$data['stories'] = $this->model_page_data->get_news();

		foreach ($data['pagecopy'] as $copy) {
			$data['copy'] = $copy->introCopy;
		}

		$data['page_title'] = "Grow for the Cure : News and Events";
		$data['page_description'] = "Read news related to Grow for the Cure and see our upcoming events.";
		$data['body_class'] = "news-page";

		$this->load->view('header', $data);
		$this->load->view('news', $data);
		$this->load->view('footer', $data);

	}

}
?>