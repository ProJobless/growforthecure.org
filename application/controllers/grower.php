<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Grower extends CI_Controller {

	public function index()
	{
		$this->load->model('model_users');

		$user_to_get = $this->uri->segment(2);

		// echo $user_to_get;

		$data['singleuser'] = $this->model_users->get_single_user($user_to_get);
		$data['userteam'] = $this->model_users->get_user_team($user_to_get);

		foreach ($data['userteam'] as $team) {
			$data['team_name'] = $team->teamName;
		}

		foreach ($data['singleuser'] as $user) {
			$data['full_name'] = $user->firstName . " " . $user->lastName;
			$data['first_name'] = $user->firstName;
			$data['last_name'] = $user->lastName;
			$data['user-id'] = $user->userID;
			$data['statement'] = $user->statement;
		}

		$data['body_class'] = 'grower-page';
		$data['page_title'] = "Grow for the Cure : " . $data['full_name'] . " : Grower Profile";
		$data['page_description'] = $data['full_name'] . " is growing and shaving his beard to fight Lung Cancer. Donate to his grow campaign to show your support.";


		$this->load->view('header', $data);
		$this->load->view('grower', $data);
		$this->load->view('footer', $data);

	}


}

/* End of file growers.php */
/* Location: ./application/controllers/growers.php */

