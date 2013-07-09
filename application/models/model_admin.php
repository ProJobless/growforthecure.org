<?php

class Model_admin extends CI_Model {

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}
	

	function delete_user_forever($id)
	{

		$query = $this->db->query('
				delete from tblUsers where userID = $id;
				delete from tblCampaigns where growerID = $id;
				delete from tblPledges where userID = $id;
				delete from tblTeamMembers where growerID = $id;
				delete from tblUserPhotos where growerID = $id;
				delete from tblUserStyles where userID = $id;
			');

		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return NULL;
		}

	}

	function select_not_in_hall()
	{
		$query = $this->db->query('select * from tblUsers where hallOfFame is null or hallOfFame = 0 order by lastName desc');

		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return NULL;
		}
	}

	function select_all_in_hall()
	{
		$query = $this->db->query('select * from tblUsers where hallOfFame = 1 order by lastName desc');

		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return NULL;
		}
	}

	function hall_promote_demote($id, $pd)
	{
		if ($pd == 1) {
			$query = $this->db->query('Update tblUsers set hallOfFame = 1 where userID = ' . $id);
		} else {
			$query = $this->db->query('Update tblUsers set hallOfFame = 0 where userID = ' . $id);
		}

		if ($query) {
			redirect(base_url('admin/hall_of_fame'), 'refresh');
		} else {
			return NULL;
		}
	}

	function get_intro_text()
	{
		$query = $this->db->get('tblCopy');
		
			if ($query->num_rows() > 0) {
				return $query->result();
			} else {
				redirect(base_url('no-copy'), 'refresh');
			}


	}




}