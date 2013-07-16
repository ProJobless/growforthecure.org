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
			$campaignid = '1';
			$styleid = '2';
			$grower_name = 'Stephen Collins';
			$payer_firstname = 'Stephen';
			$payer_email = 'stephen@stephencollins.me';
			$payer_amount = '10';

		} else {
			
			// LIVE, USE DATA RETURNED IN POST.
			
			// 40 26 9 
			$custom = $_POST['custom'];
			list($growerid, $campaignid, $styleid, $grower_name) = explode('-',$custom);	
			$payer_firstname = $_POST['first_name'];
			$payer_email = $_POST['payer_email'];
			$payer_amount = $_POST['mc_gross'];
		}

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


		$this->db->set('campaignID', $data['campaign_id']);
		$this->db->set('userID', $growerid);
		$this->db->set('pledgeAmount', $payer_amount);
		$this->db->set('styleID', $styleid);
		$this->db->insert('tblPledges');


		$html_message = '
<body style="background-color:#e0e0e0;margin:0;padding:0;">

<div align="center" style="background-color:white;">
	<br />
	<img src="' . base_url() . 'artwork/email_artwork/grow_header.gif" />
	<br />
</div>

<table width="600px" align="center">
	<tr>
		<td style="padding:10px;font-family:helvetica,arial,sans-serif;color:black;font-size:14px;line-height:140%;">
			<p style="font-size:16px;">Thank you, [FIRSTNAME].</p>
			<p>You have successfully donated $[AMOUNT] to [GROWERNAME] grow campaign to fight Lung Cancer. You have pledged your money to the [STYLE] style. If [STYLE] receives the most pledges, [GROWERNAME] will shave his beard to match that style.</p>
			<p>Again, thank you from your friends at <a href="http://growforthecure.org">Grow for the Cure.</a></p>
			<p style="font-size:12px;">All net proceeds will be used by the Bonnie J. Addario Lung Cancer Foundation on the front lines of lung cancer research.</p>
			<p style="font-size:10px;">Grower ID : [GROWERID] Style ID : [STYLEID]</p>
		</td>
	</tr>
</table>
	<br />
	<br />
	<br />
	<br />
</body>
		';

		$grower_html_message = '
		<body style="background-color:#e0e0e0;margin:0;padding:0;">

<div align="center" style="background-color:white;">
	<br />
	<img src="' . base_url() . 'artwork/email_artwork/grow_header.gif" />
	<br />
</div>

<table width="600px" align="center">
	<tr>
		<td style="padding:10px;font-family:helvetica,arial,sans-serif;color:black;font-size:14px;line-height:140%;">
			<p style="font-size:16px;">Hello, [GROWERNAME].</p>
			<p>This email is to let you know that a donation for the style, [STYLE], in the amount of $[AMOUNT], has been made to your grow campaign.</p>
			<p>Thank you for being a part of the fight against Lung Cancer. Any bit of money raised helps the cause.</p>
			<p>Again, thank you from your friends at <a href="http://growforthecure.org">Grow for the Cure.</a></p>
			<p style="font-size:12px;">All net proceeds will be used by the Bonnie J. Addario Lung Cancer Foundation on the front lines of lung cancer research.</p>
		</td>
	</tr>
</table>
	<br />
	<br />
	<br />
	<br />
</body>';
		$html_message = str_replace('[AMOUNT]', $payer_amount, $html_message);
		$html_message = str_replace('[GROWERNAME]', $grower_name, $html_message);
		$html_message = str_replace('[FIRSTNAME]', $payer_firstname, $html_message);
		$html_message = str_replace('[GROWERID]', $growerid, $html_message);
		$html_message = str_replace('[STYLE]', $data['style_name'], $html_message);

		$grower_html_message = str_replace('[AMOUNT]', $payer_amount, $grower_html_message);
		$grower_html_message = str_replace('[GROWERNAME]', $grower_name, $grower_html_message);
		$grower_html_message = str_replace('[FIRSTNAME]', $payer_firstname, $grower_html_message);
		$grower_html_message = str_replace('[GROWERID]', $growerid, $grower_html_message);
		$grower_html_message = str_replace('[STYLE]', $data['style_name'], $grower_html_message);

		$message = '<html><head></head>';
		$message = $message . $html_message;
		$message = $message . '</html>';

		$grower_message = '<html><head></head>';
		$grower_message = $grower_message . $grower_html_message;
		$grower_message = $grower_message . '</html>';

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

		$this->email->from('do_not_reply@growforthecure.org', 'Grow for the Cure');
		$this->email->to($grower_email); 
		$this->email->subject('A donation has been made.');
		$this->email->message($grower_message);	
		$this->email->send();



		echo $this->email->print_debugger();

		echo current_url();


		
	}





}