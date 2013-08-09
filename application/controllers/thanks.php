<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Thanks extends CI_Controller {

	public function index()
	{

		$this->load->model('model_users');

			if (current_url() == 'http://localhost:8888/growforthecure.org/thanks') {
			$testing = TRUE;
		} else {
			$testing = FALSE;
		}
		
		if ($testing) {
			
			// WE ARE TESTING, POPULATE DATA OURSELVES.
			
			$data['custom'] = 'Not Set';
			$data['growerid'] = '1';
			$data['campaignid'] = '1';
			$data['styleid'] = '2';
			$data['grower_name'] = 'Stephen Collins';
			$data['payer_firstname'] = 'Stephen';
			$data['payer_email'] = 'stephen@stephencollins.me';
			$data['payer_amount'] = '10';

		} else {
			
			// LIVE, USE DATA RETURNED IN POST.
			
			// 40 26 9 
			$custom = $_POST['custom'];
			list($data['growerid'], $data['campaignid'], $data['styleid'], $data['grower_name']) = explode('-',$custom);	
			$data['payer_firstname'] = $_POST['first_name'];
			$data['payer_email'] = $_POST['payer_email'];
			$data['payer_amount'] = $_POST['mc_gross'];
		}

		$data['campaigninfo'] = $this->model_users->get_campaign_info($data['growerid']);
		$data['styleinfo'] = $this->model_users->get_style_from_id($data['styleid']);
		$data['growerinfo'] = $this->model_users->get_single_user($data['growerid']);

		foreach ($data['campaigninfo'] as $campaign) {
			$data['campaign_id'] = $campaign->campaignID;
		}

		foreach ($data['styleinfo'] as $style) {
			$data['style_name'] = $style->styleName;
		}

		foreach ($data['growerinfo'] as $info) {
			$data['grower_email'] = $info->emailAddress;
		}

		$data['page_title'] = "Grow for the Cure : Thank you for donating.";
		$data['page_description'] = "Thank you page after donating to the Grow for the Cure lung Cancer fight.";
		$data['body_class'] = "thanks-page";

		$this->load->view('header', $data);
		$this->load->view('thanks', $data);
		$this->load->view('footer', $data);

	}
	public function comment()
	{

		$g = $_POST['grower'];
		$c = $_POST['commenter'];
		$cp = $_POST['campaign'];
		$comment = $_POST['comment'];
		$gn = str_replace(' ', '-', strtolower($_POST['growername']));

		// echo $g;
		// echo $c;
		// echo $cp;
		// echo $comment;

		$this->db->set('growerID', $g);
		$this->db->set('campaignID', $cp);
		$this->db->set('commenterName', $c);
		$this->db->set('comment', $comment);
		$this->db->set('commentDate', date("Y-m-d"));
		$this->db->insert('tblComments'); 

		redirect(base_url()."grower/".$gn."/".$g, 'refresh');



	}





}