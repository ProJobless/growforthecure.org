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



}