<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notify extends CI_Controller {

	public function index()
	{

		$this->load->model('model_users');

		if (current_url() == 'http://localhost:8888/growforthecure.org/notify') {
			$testing = TRUE;
		} else {
			$testing = FALSE;
		}
		
		if ($testing) {
			
			// WE ARE TESTING, POPULATE DATA OURSELVES.
			
			$custom = 'Not Set';
			$growerid = '1';
			$styleid = '2';
			$grower_name = 'Stephen Collins';
			$payer_firstname = 'Stephen';
			$payer_email = 'stephen@stephencollins.me';
			$payer_amount = '10';

		} else {
			
			// LIVE, USE DATA RETURNED IN POST.
			
			$custom = $_POST['custom'];
			list($growerid, $campaignid, $styleid) = explode('-',$custom);	
			$grower_name = $growerid;
			$payer_firstname = $_POST['first_name'];
			$payer_email = $_POST['payer_email'];
			$payer_amount = $_POST['mc_gross'];
		}

		$data['campaigninfo'] = $this->model_users->get_campaign_info($campaignid);

		foreach ($data['campaigninfo'] as $campaign) {
			$data['campaign_id'] = $campaign->campaignID;
		}


		$this->db->set('campaignID', $data['campaign_id']);
		$this->db->set('userID', $growerid);
		$this->db->set('pledgeAmount', $payer_amount);
		$this->db->set('styleID', $styleid);
		$this->db->insert('tblPledges');




		$message = '<html><head></head><body>';
		$message = $message . '<p>Payee Name : ' . $payer_firstname . '</p>';
		$message = $message . '<p>Grower Name : ' . $grower_name . '</p>';
		$message = $message . '<p>Grower ID : ' . $growerid . '</p>';
		$message = $message . '<p>Style ID : ' . $styleid . '</p>';
		$message = $message . '<p>Amount : $' . $payer_amount . '</p>';
		$message = $message . '</body></html>';

		$this->load->library('email');

		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'smtp.mandrillapp.com';
		$config['smtp_user'] = 'stephen@stephencollins.me';
		$config['smtp_pass'] = 'IrLx5aS2RPPLc_FcG6cWkQ';
		$config['smtp_port'] = '587';
		$config['charset'] = 'iso-8859-1';
		$config['mailtype'] = 'html';

		$this->email->initialize($config);

		$this->email->from('do_not_reply@growforthecure.org', 'Grow for the Cure');
		$this->email->to($payer_email); 


		$this->email->subject('Thank you for your donation, ' . $payer_firstname . '.');
		$this->email->message($message);	

		$this->email->send();

		echo $this->email->print_debugger();

		echo current_url();


		
	}





}