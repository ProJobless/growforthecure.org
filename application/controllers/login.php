<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->load->helper('cookie');

		delete_cookie("userid", '/');

		$user = $_POST['emailaddress'];
		$pass = do_hash($_POST['password'], 'md5');


		$this->load->model('model_users');
		$data['userinfo'] = $this->model_users->user_login($user, $pass);

		foreach ($data['userinfo'] as $user) {
			$userID = $user->userID;
			$fullName = strtolower($user->firstName) . '-' . strtolower($user->lastName);
		}

		setcookie('userid', $userID, time()+60*60*24*30, '/');
		setcookie('fullname', $fullName, time()+60*60*24*30, '/');

//		echo $this->input->cookie('userid');

		redirect('/grower/' . $fullName . '/' . $userID, 'refresh');
// userid=deleted; expires=Thu, 01-Jan-1970 00:00:01 GMT; path=/; domain=/, userid=1; expires=Mon, 08-Jul-2013 20:59:50 GMT; path=/, fullname=stephen-collins; expires=Mon, 08-Jul-2013 20:59:50 GMT; path=/


	}

// $str = do_hash($_POST['password'], 'md5'); // MD5

}
