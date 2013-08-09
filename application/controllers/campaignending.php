<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Campaignending extends CI_Controller {

function index()
	{
		$this->load->model('model_users');

		$today = date("Y-m-d");
		$a = mktime(0,0,0,date("m"),date("d")+1,date("Y"));
		
		$tomorrow = date("Y-m-d", $a);

		$this->db->where('endDate', $tomorrow);
		$query = $this->db->get('tblCampaigns');
		
		foreach ($query->result_array() as $row) {

			$data['singleuser'] = $this->model_users->get_single_user($row['growerID']);
		
			foreach ($data['singleuser'] as $user) {
				$data['full_name'] = $user->firstName . " " . $user->lastName;
				$data['safe_name'] = strtolower($user->firstName) . "-" . strtolower($user->lastName);
				$data['first_name'] = $user->firstName;
				$data['last_name'] = $user->lastName;
				$data['user_id'] = $user->userID;
				$data['email'] = $user->emailAddress;
			}

			echo "Campaigns ending tomorrow: " . $data['full_name'] . "<br />";

		//$message = '<html><head></head>';
		//$message = $message . $registration_email;
		//$message = $message . '</html>';
		
		$message = '<html><head></head>';
		$message = $message = '<body style="background-color:#e0e0e0;margin:0;padding:0;">

<div align="center" style="background-color:white;">
	<br />
	<img src="' . base_url() . 'artwork/email_artwork/grow_header.gif" />
	<br />
</div>

<table width="600px" align="center">
	<tr>
		<td style="padding:10px;font-family:helvetica,arial,sans-serif;color:black;font-size:14px;line-height:140%;">
			<p>' . $data['first_name'] . ', a quick check of our calendar shows that your Grow for the Cure campaign will be ending tomorrow. Now would be a great time to try a last minute push for donations.</p><p>Let your friends know that it is over tomorrow by going to your profile and sending a Facebook message or a Tweet, or if you really need to, log into your account and extend your grow by a few days. Either way, thank you for your help and good luck.</p><p>Click to go to your profile -> ' . base_url() . 'grower/'. $data['safe_name'] . '/' . $data['user_id'] . '</p>
		</td>
	</tr>
</table>
	<br />
	<br />
	<br />
	<br />
</body>';
		$message = $message . '</html>';


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
		$this->email->to($data['email']); 
		$this->email->subject('Your Grow for the Cure campaign is almost ending.');
		$this->email->message($message);	
	//	echo '<pre>';
	//	print_r($this->email);
		$this->email->send();





		}
	}




}