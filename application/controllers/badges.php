<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Badges extends CI_Controller {

	function index()
	{
		// NEW IN TOWN BADGE
		$newintown = $this->db->query('select * from tblUsers where userID not in (select growerID from tblUserBadges)');

		if ($newintown->num_rows() > 0) {

			foreach ($newintown->result_array() as $row) {
				$uID = $row['userID'];
				echo $uID . '<br/>';
				$update = $this->db->query('INSERT INTO tblUserBadges (growerID, badgeID) VALUES (' . $uID . ', 1)');
			}
		} else {
			return NULL;
		}





	}


}