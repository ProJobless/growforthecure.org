<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	function index()
	{

		// $data['page_title'] = "Grow for the Cure : Meet Our Generous Sponsors";
		// $data['page_description'] = "Grow for the Cure couldn't so what it does with out our generous sponsors.";
		// $data['body_class'] = "sponsor-page";

		$data['title'] = "Grow for the Cure Admin Area.";


		$this->load->view('header_admin', $data);
		$this->load->view('admin', $data);

	}


	function hall_of_fame()

	{
		$this->load->model('model_admin');

		$data['title'] = "Grow for the Cure Admin Area.";
		$data['hall'] = $this->model_admin->select_all_in_hall();
		$data['nothall'] = $this->model_admin->select_not_in_hall();

		$this->load->view('header_admin', $data);
		$this->load->view('admin_hall', $data);

	}

	function hall_status()

	{
		$user_to_get = $this->uri->segment(3);
		$promote_demote = $this->uri->segment(4);

		$this->load->model('model_admin');

		$data['promote'] = $this->model_admin->hall_promote_demote($user_to_get, $promote_demote);

	}

	function intro_text()
	{
		$this->load->model('model_admin');
		$data['introtexts'] = $this->model_admin->get_intro_text();
		$data['title'] = "Grow for the Cure Admin Area.";

		$this->load->view('header_admin', $data);
		$this->load->view('admin_intro_text', $data);
	}

	function update_intro()
	{
		$this->load->model('model_admin');

		$introPage = $this->uri->segment(3);
		$introCopy = $_POST['copy'];

		$data['updatetext'] = $this->model_admin->update_intro_text($introPage, $introCopy);

	}

	function delete_user()
	{
		$this->load->model('model_admin');
		$data['users'] = $this->model_admin->get_all_users();
		$data['title'] = "Grow for the Cure Admin Area.";

		$this->load->view('header_admin', $data);
		$this->load->view('admin_delete_users', $data);

	}

	function remove()

	{
		$user_to_get = $this->uri->segment(3);

		$this->load->model('model_admin');

		$data['promote'] = $this->model_admin->delete_user_forever($user_to_get);

	}

	function news()
	{

		$this->load->model('model_admin');
		$data['newsitems'] = $this->model_admin->get_top_news();



		$data['title'] = "Grow for the Cure Admin Area.";

		$this->load->view('header_admin', $data);
		$this->load->view('admin_news', $data);
	}

	function news_add()
	{
		$this->load->model('model_admin');

		$h = $_POST['h'];
		$c = $_POST['c'];
		$l = $_POST['l'];

		$data['addnews'] = $this->model_admin->add_news_item($h, $c, $l);

	}

	function news_delete($id)
	{
		$this->load->model('model_admin');

		$id = $_POST['i'];

		$data['deletenews'] = $this->model_admin->delete_news_item($id);

	}














}