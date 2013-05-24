<?php

class Model_users extends CI_Model {

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}
	
	function get_all_users()
	{

		$query = $this->db->query('select * from tblUsers order by lastName desc');

		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return NULL;
		}

	}

	function get_single_user($id)
	{

		$this->db->where('userID', $id);
		$query = $this->db->get('tblUsers');
		
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			redirect(base_url('who'), 'refresh');
		}


	}

	function get_user_team($id)
	{
		$this->db->where('growerID', $id);
		$query = $this->db->get('tblTeamMembers');

		if ($query->num_rows() > 0) {

			foreach ($query->result() as $row) {		
				$teamID = $row->teamID;
	   			$this->db->where('teamID', $teamID);
				$query = $this->db->get('tblTeams');

				if ($query->num_rows() > 0) {
					return $query->result();
				} else {
					redirect(base_url('who'), 'refresh');
				}
			}     
		} else {
			redirect(base_url('who'), 'refresh');
		}
	}

	function get_all_team_members($teamid)
	{

		$this->db->select('*');
		$this->db->where('teamID', $teamid);
		$this->db->from('tblTeamMembers');
		$this->db->join('tblUsers', 'tblTeamMembers.growerID = tblUsers.userID');
		$this->db->order_by('userID');

		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			redirect(base_url('who'), 'refresh');
		}

	}

	function get_campaign_info($id)
	{
		$this->load->helper('date');
	
		$this->db->where('endDate <', now());
		$this->db->where('current = 1');
		$this->db->where('growerID', $id);

		$query = $this->db->get('tblCampaigns');

		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			redirect(base_url('who'), 'refresh');
		}


	}

	function get_team_from_code($code)
	{
	
		$this->db->where('teamCode', $code);
		$query = $this->db->get('tblTeams');
		
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			$team = 'Error';
		}

	}

	function update_user_style($s, $c, $u, $insdel)
	{
		if ($insdel == 'ins') {
			$this->db->set('userID', $u);
			$this->db->set('campaignID', $c);
			$this->db->set('styleID', $s);
			$this->db->insert('tblUserStyles'); 
		}

		if ($insdel == 'del') {
			$this->db->where('userID', $u);
			$this->db->where('campaignID', $c);
			$this->db->where('styleID', $s);
			$this->db->delete('tblUserStyles'); 
		}		

	}

	function get_active_styles($c, $u)
	{
		$this->db->where('userID', $u);
		$this->db->where('campaignID', $c);
		$query = $this->db->get('tblUserStyles');

		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return NULL;
		}
	}

	function get_active_pledges($c, $u)
	{
		$this->db->distinct('styleID');
		$this->db->where('userID', $u);
		$this->db->where('campaignID', $c);
		$query = $this->db->get('tblPledges');

		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return NULL;
		}
	}

}

















