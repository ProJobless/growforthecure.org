<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Grower extends CI_Controller {

	public function index()
	{
		$this->load->model('model_users');

		$user_to_get = $this->uri->segment(2);

		// echo $user_to_get;

		$data['singleuser'] = $this->model_users->get_single_user($user_to_get);
		$data['userteam'] = $this->model_users->get_user_team($user_to_get);
		$data['campaigninfo'] = $this->model_users->get_campaign_info($user_to_get);

		foreach ($data['userteam'] as $team) {
			$data['team_name'] = $team->teamName;
			$data['team_id'] = $team->teamID;
		}

		$data['teammembers'] = $this->model_users->get_all_team_members($data['team_id']);

		// echo "<pre>";
		// print_r($data['teammembers']);
		// echo "</pre>";
	
		foreach ($data['singleuser'] as $user) {
			$data['full_name'] = $user->firstName . " " . $user->lastName;
			$data['first_name'] = $user->firstName;
			$data['last_name'] = $user->lastName;
			$data['user_id'] = $user->userID;
			$data['statement'] = $user->statement;
			$data['profile_pic'] = $user->profilePic;
		}

		foreach ($data['campaigninfo'] as $campaign) {
			$data['startDate'] = $campaign->startDate;
			$data['endDate'] = $campaign->endDate;
			$data['campaign_id'] = $campaign->campaignID;
			

			$ts1 = strtotime($data['startDate']);
			$ts2 = strtotime($data['endDate']);
			$ts3 = now();

			$seconds_diff = $ts2 - $ts1;
			$seconds_diff2 = $ts3 - $ts1;
			$seconds_diff3 = $ts2 - $ts3;

			$data['campaign_full'] = floor($seconds_diff/3600/24);
			$data['campaign_elapsed'] = floor($seconds_diff2/3600/24);
			$data['campaign_remaining'] = floor($seconds_diff3/3600/24);



		}	

		$data['photos'] = $this->model_users->get_user_photos($user_to_get, $data['campaign_id']);


		$data['body_class'] = 'grower-page';
		$data['page_title'] = "Grow for the Cure : " . $data['full_name'] . " : Grower Profile";
		$data['page_description'] = $data['full_name'] . " is growing and shaving his beard to fight Lung Cancer. Donate to his grow campaign to show your support.";


		$this->load->view('header', $data);
		$this->load->view('grower', $data);
		$this->load->view('footer', $data);

	}


}

/* End of file grower.php */
/* Location: ./application/controllers/grower.php */

