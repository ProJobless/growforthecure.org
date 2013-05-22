<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Styleupdate extends CI_Controller {

	function index()
	{
		$user = $this->input->post('user');
		$campaign = $this->input->post('campaign');
		$style = $this->input->post('style');
		$idyn = $this->input->post('idyn');

		$this->load->model('model_users');
		$this->model_users->update_user_style($style, $campaign, $user, $idyn);

		echo 'UserID = ' . $user . ' CampaignID = ' . $campaign . ' StyleID = ' . $style;

	}

}
?>