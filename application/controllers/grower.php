<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Grower extends CI_Controller {

	public function index()
	{
		$this->load->model('model_users');

		$user_to_get = $this->uri->segment(2);

		// echo $user_to_get;

		$data['firstnames'] = $this->model_users->get_all_users();
		$data['singleuser'] = $this->model_users->get_single_user($user_to_get);

		foreach ($data['singleuser'] as $row2) {
			$data['full_name'] = $row2->firstName . " " . $row2->lastName;
			$data['first_name'] = $row2->firstName;
			$data['last_name'] = $row2->lastName;
			$data['user-id'] = $row2->userID;
			$data['statement'] = $row2->statement;
		}

		$this->load->view('header', $data);
		$this->load->view('grower', $data);
		$this->load->view('footer', $data);

	}


}

/* End of file growers.php */
/* Location: ./application/controllers/growers.php */

