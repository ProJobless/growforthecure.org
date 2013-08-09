<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Thanks extends CI_Controller {

	public function index()
	{

		$this->load->model('model_users');

		$custom = $_POST['custom'];
		list($growerid, $campaignid, $styleid, $grower_name) = explode('-',$custom);	
		$payer_firstname = $_POST['first_name'];
		$payer_email = $_POST['payer_email'];
		$payer_amount = $_POST['mc_gross'];
	

		$data['campaigninfo'] = $this->model_users->get_campaign_info($growerid);
		$data['styleinfo'] = $this->model_users->get_style_from_id($styleid);
		$data['growerinfo'] = $this->model_users->get_single_user($growerid);

		foreach ($data['campaigninfo'] as $campaign) {
			$data['campaign_id'] = $campaign->campaignID;
		}

		foreach ($data['styleinfo'] as $style) {
			$data['style_name'] = $style->styleName;
		}

		foreach ($data['growerinfo'] as $info) {
			$data['grower_email'] = $info->emailAddress;
		}

		echo $payer_firstname;
		
	}





}