<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Teaminvite extends CI_Controller {

	public function index()
	{

		$this->load->model('model_users');

		$userID = $_GET['user'];
		$invitee = $_GET['invite'];

		$data['userteam'] = $this->model_users->get_user_team($userID);
		$data['user'] = $this->model_users->get_single_user($userID);


		foreach ($data['user'] as $user) {
			$grower = $user->firstName . " " . $user->lastName;
			$groweremail = $user->emailAddress;

		}

		foreach ($data['userteam'] as $team) {
			$teamname = $team->teamName;
			$teamid = $team->teamID;
			$teamcode = $team->teamCode;
		}

		print_r($teamcode);

		$url = base_url() . 'register/?team=' . $teamcode;


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
			<p>[GROWER] has invited you to join Team [TEAMNAME] in his fight against Lung Cancer.</p>
			<p>Join Grow for the Cure, select your beard styles, and then shave your beard like the style that receives the most pledges. Let&apos;s see what could your face do for Lung Cancer.</p>
			<p>Join and help the cause by clicking here -> [URL]</p>
			<p style="font-size:12px;">All net proceeds will be used by the Bonnie J. Addario Lung Cancer Foundation on the front lines of lung cancer research.</p>
		</td>
	</tr>
</table>
	<br />
	<br />
	<br />
	<br />
</body>
		';


		$message = '<html><head></head>';
		$message = $message . $html_message;
		$message = $message . '</html>';


		$message = str_replace('[GROWER]', $grower, $message);
		$message = str_replace('[TEAMNAME]', $teamname, $message);
		$message = str_replace('[URL]', $url, $message);



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
		$this->email->to($invitee); 


		$this->email->subject('Join the Grow!');
		$this->email->message($message);	

		$this->email->send();

		echo $this->email->print_debugger();

		echo current_url();


		
	}





}