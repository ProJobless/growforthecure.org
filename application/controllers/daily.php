<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Daily extends CI_Controller {

	function index()
	{

		// Daily report: Total donations for the day. New campaigns started. Campaigns ended.

		//echo Date('Y-m-d');

		// GET ALL PLEDGES FOR THE DAY

		$this->db->select('*');
		$this->db->from('tblPledges');
		$this->db->join('tblUsers', 'tblPledges.userID = tblUsers.userID');
		$this->db->join('tblStyles', 'tblPledges.styleID = tblStyles.styleID');
		$this->db->where('tblPledges.pledgeTime', Date('Y-m-d'));
		$data['dailyPledges'] = $this->db->get('');

		$data['totalDaily'] = 0;

		// GET ALL NEW CAMPAIGNS FOR DAY

		$this->db->select('*');
		$this->db->from('tblCampaigns');
		$this->db->join('tblUsers', 'tblCampaigns.growerID = tblUsers.userID');
		$this->db->where('startDate', Date('Y-m-d'));
		$data['newCampaigns'] = $this->db->get('');

		// GET ALL ENDING CAMPAIGNS FOR DAY

		$this->db->select('*, sum(tblPledges.pledgeAmount) as pledgeTotal');
		$this->db->from('tblCampaigns');
		$this->db->join('tblUsers', 'tblCampaigns.growerID = tblUsers.userID');
		$this->db->join('tblPledges', 'tblCampaigns.growerID = tblPledges.userID');
		$this->db->where('endDate', Date('Y-m-d'));
		$this->db->group_by('tblCampaigns.growerID');
		$data['endingCampaigns'] = $this->db->get('');

		//echo '<pre>';
		//print_r($data['endingCampaigns']->result());




		// End of campaign email for users with their totals and winning beard style.





		$data['body_class'] = 'report-page';
		$data['page_title'] = "Grow for the Cure : Daily Report";
		$data['page_description'] = "";



		$this->load->view('header', $data);
		$this->load->view('daily', $data);
		$this->load->view('footer', $data);



	}



}
?>