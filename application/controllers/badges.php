<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Badges extends CI_Controller {

	function index()
	{
		// DO NOT RETURN NULL ON THESE QUERIES.
		// RETURNING NULL STOPS EVERYTHING.

		// NEW IN TOWN BADGE
		$newintown = $this->db->query('select * from tblUsers where userID not in (select growerID from tblUserBadges where badgeID = 1)');

		if ($newintown->num_rows() > 0) {
			foreach ($newintown->result_array() as $row) {
				$uID = $row['userID'];
				echo $uID . '<br/>';
				$update = $this->db->query('INSERT INTO tblUserBadges (growerID, badgeID) VALUES (' . $uID . ', 1)');
			}
		} else {
			// DO NOTHING. 
		}

		// FIRST DONATION IS FREE BADGE
		$firstone = $this->db->query('select distinct userID from tblPledges where userID not in (select growerID from tblUserBadges where badgeID = 2)');
		if ($firstone->num_rows() > 0) {
			foreach ($firstone->result_array() as $row) {
				$uID = $row['userID'];
				echo $uID . '<br/>';
				$update = $this->db->query('INSERT INTO tblUserBadges (growerID, badgeID) VALUES (' . $uID . ', 2)');			
			}

		} else {
			// DO NOTHING. 
		}

		// NO MAN LEFT BEHIND BADGE
		$noman = $this->db->query('select distinct teamID from tblTeams');
		if ($noman->num_rows() > 0) {
			foreach ($noman->result_array() as $row) {
				$uID = $row['teamID'];
				$teamcount = $this->db->query('select growerID from tblTeamMembers where teamID = ' . $uID . ' and growerID not in (select growerID from tblUserBadges where badgeID = 3)');
						if (count($teamcount->result_array()) > 1 && count($teamcount->result_array()) < 5){
							foreach ($teamcount->result_array() as $member) {
								$mID = $member['growerID'];
								$update = $this->db->query('INSERT INTO tblUserBadges (growerID, badgeID) VALUES (' . $mID . ', 3)');
							}
						}
			}

		} else {
			// DO NOTHING. 
		}

		// BAND OF BROTHERS BADGE
		$band = $this->db->query('select distinct teamID from tblTeams');
		if ($band->num_rows() > 0) {
			foreach ($band->result_array() as $row) {
				$uID = $row['teamID'];
				$teamcount = $this->db->query('select growerID from tblTeamMembers where teamID = ' . $uID . ' and growerID not in (select growerID from tblUserBadges where badgeID = 3)');
						if (count($teamcount->result_array()) > 3 && count($teamcount->result_array()) < 10){
							foreach ($teamcount->result_array() as $member) {
								$mID = $member['growerID'];
								$update = $this->db->query('INSERT INTO tblUserBadges (growerID, badgeID) VALUES (' . $mID . ', 3)');
							}
						}
			}

		} else {
			// DO NOTHING. 
		}

		// HELPFUL BADGE
		$helpful = $this->db->query('select  userID, sum(pledgeAmount) from tblPledges where userID not in (select growerID from tblUserBadges where badgeID = 5) group by userID ');
		if ($helpful->num_rows() > 0) {
			foreach ($helpful->result_array() as $row) {
				$uID = $row['userID'];
				echo $uID;
				$update = $this->db->query('INSERT INTO tblUserBadges (growerID, badgeID) VALUES (' . $uID . ', 5)');

			}

		} else {
			// DO NOTHING. 
		}








	}


}