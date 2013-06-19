<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Teaminvite extends CI_Controller {

	public function index()
	{

		$this->load->model('model_users');

		$userID = 3;

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

		$message = '<html><head></head><body>';
		$message = $message . '<p>' . $grower . ' has invited you to join his team, Team ' . $teamname . ', to help fight Lung Cancer. Grow for the Cure tries to...</p>';
		$message = $message . '<p>Join and help the cause by clicking here > ' . $url . '</p>';

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
		$this->email->to('stephen@stephencollins.me'); 


		$this->email->subject('Join the Grow!');
		$this->email->message($message);	

		$this->email->send();

		echo $this->email->print_debugger();

		echo current_url();


		
	}





}