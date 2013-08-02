<?php

class Model_users extends CI_Model {

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}
	
	function user_login($e, $p) {
		$this->db->where('emailAddress', $e);
		$this->db->where('password', $p);
		$query = $this->db->get('tblUsers');
		
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			redirect(base_url('who'), 'refresh');
		}
	}


	function get_all_users()
	{
		$query = $this->db->query('select * from tblUsers order by lastName');

		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return NULL;
		}

	}


	function get_all_teams()
	{
		$query = $this->db->query('select * from tblTeams order by teamName');

		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return NULL;
		}

	}


	function get_hall_of_fame()
	{

		$query = $this->db->query('select * from tblUsers where hallOfFame = 1 order by lastName desc');

		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return NULL;
		}

	}

	function search_for_users($term)
	{

		$query = $this->db->query('select firstName, lastName, userID from tblUsers where lastName like "%' . $term . '%" or firstName like "%' . $term . '%"');

		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return NULL;
		}

	}

	function search_for_teams($term)
	{

		$query = $this->db->query('select teamName, teamID from tblTeams where teamName like "%' . $term . '%"');

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
		$this->db->where('current = 1');
		$this->db->where('growerID', $id);

		$query = $this->db->get('tblCampaigns');

		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			redirect(base_url('whodat'), 'refresh');
		}


	}

	function get_comments($id)
	{
		$this->db->where('growerID', $id);
		$query = $this->db->get('tblComments');

		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			// Return nothing. No comments.
		}


	}

	function get_badges($id)
	{
		$this->db->where('growerID', $id);
		$query = $this->db->get('tblUserBadges');



		if ($query->num_rows() > 0) {

			foreach ($query->result_array() as $row) {
				return $query->result();
			}

		} else {
			// Return nothing. No comments.
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
	
	function get_team_from_id($id)
	{
	
		$this->db->where('teamID', $id);
		$query = $this->db->get('tblTeams');
		
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			$team = 'Error';
		}

	}
	
	function get_style_from_id($id)
	{
	
		$this->db->where('styleiD', $id);
		$query = $this->db->get('tblStyles');
		
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


	function get_active_styles_and_pledges($c, $u)
	{

// tblStyles.StyleID, tblStyles.styleName, tblStyles.fileName, tblUserStyles.userID, tblUserStyles.campaignID, sum(tblPledges.pledgeAmount) as PledgeAmount 
		$query = $this->db->query('select  tblStyles.StyleID, tblStyles.styleName, tblStyles.fileName, tblUserStyles.userID, tblUserStyles.campaignID, sum(tblPledges.pledgeAmount) as PledgeAmount from tblStyles inner join tblUserStyles on tblStyles.styleID = tblUserStyles.styleID left join (select * from tblPledges where userID = '.$u.' and campaignID = '.$c.') tblPledges on tblStyles.styleID = tblPledges.styleID where tblUserStyles.userID = '.$u.' and tblUserStyles.campaignID = '.$c.' group by tblStyles.styleID');


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

	function get_user_photos($u, $c)
	{
		$this->db->where('growerID', $u);
		$this->db->where('campaignID', $c);
		$query = $this->db->get('tblUserPhotos');

		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return NULL;
		}


	}

	




}

















