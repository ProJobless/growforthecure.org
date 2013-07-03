<?php

class Model_users extends CI_Model {

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


}