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

	function cash()
	{
		$this->load->model('model_admin');

		$data['title'] = "Grow for the Cure Admin Area.";

		$data['styles'] = $this->model_admin->get_all_styles();
		$data['users'] = $this->model_admin->get_all_users();


		$this->load->view('header_admin', $data);
		$this->load->view('admin_cash', $data);

	}

	function cash_update()
	{
		$s = $_POST['style'];
		$g = $_POST['grower'];
		$c = $_POST['cash'];

		$this->load->model('model_admin');
		$this->load->model('model_users');
		$data['campaignInfo'] = $this->model_users->get_campaign_info($g);

		foreach ($data['campaignInfo'] as $info) {
			$data['campaignID'] = $info->campaignID;
		}

		$this->model_users->update_user_style($s, $data['campaignID'], $g, 'ins');

		$data['donation'] = $this->model_admin->add_cash_donation($s, $g, $c, $data['campaignID']);

		echo "Successful Donation of $" . $c . ".";
	}


	function sponsor()
	{
		$this->load->helper('form');
		$this->load->model('model_admin');
		$this->load->model('model_page_data');

		$data['sponsors'] = $this->model_page_data->get_sponsors();

		$data['title'] = "Grow for the Cure Admin Area.";

		$this->load->view('header_admin', $data);
		$this->load->view('admin_sponsor', $data);
	}

	function sponsor_add()
	{
		
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

		$this->form_validation->set_rules('name', 'Sponsor Name', 'required');
		$this->form_validation->set_rules('link', 'Sponsor Link', 'prep_url|required');
		$this->form_validation->set_rules('copy', 'Sponsor Copy', 'required');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->model('model_admin');
			$this->load->model('model_page_data');
			$data['sponsors'] = $this->model_page_data->get_sponsors();

			$data['title'] = "Grow for the Cure Admin Area.";
			$this->load->view('header_admin', $data);
			$this->load->view('admin_sponsor', $data);

//			print_r($data);
		}
		else
		{
		$sponsorName = $this->input->post('name');
		$sponsorCopy = $this->input->post('copy');
		$sponsorLink = $this->input->post('link');
		$sponsorLogo = '';

		$config['upload_path'] = './artwork/sponsors/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '5000';
		$config['max_width']  = '0';
		$config['max_height']  = '0';

		$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('logo'))
			{
				$data['error'] = array('error' => $this->upload->display_errors());

				$this->load->view('admin_sponsor', $data);
			}
			else
			{

				$data = array('upload_data' => $this->upload->data());
			$sponsorLogo = $data['upload_data']['file_name'];

	//			$this->load->view('upload_success', $data);
			}

		$this->load->model('model_admin');
		$data['sponsors'] = $this->model_admin->add_sponsor($sponsorName, $sponsorCopy, $sponsorLogo, $sponsorLink);
		
		redirect('/admin/sponsor', 'refresh');
		}

	}

	function sponsor_delete($i)
	{
			$this->load->model('model_admin');

			$id = $_POST['i'];

			$data['deletesponsor'] = $this->model_admin->delete_sponsor($id);
	}







}