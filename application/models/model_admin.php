<?php

class Model_admin extends CI_Model {

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}
	

	function get_all_users()
	{
		$this->db->order_by('lastName');
		$query = $this->db->get('tblUsers');
		
			if ($query->num_rows() > 0) {
				return $query->result();
			} else {
				redirect(base_url('no-users'), 'refresh');
			}


	}

	function get_top_news()
	{
		$this->db->limit(10);
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get('tblNews');
		
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			redirect(base_url('no-users'), 'refresh');
		}


	}
	function add_news_item($h, $c, $l)
	{

		$this->db->set('headline', $h);
		$this->db->set('copy', $c);
		$this->db->set('link', $l);
		$query = $this->db->insert('tblNews'); 

		if ($query) {
			redirect(base_url('admin/news'), 'refresh');
		} else {
			return NULL;
		}
	}

	function delete_news_item($id)
	{


		$this->db->where('id', $id);
		$query = $this->db->delete('tblNews'); 

		if ($query) {
			redirect(base_url('admin/news'), 'refresh');
		} else {
			return NULL;
		}
	}

	function delete_user_forever($id)
	{

		$this->db->where('userID', $id);
		$this->db->delete('tblUsers');

		$this->db->where('growerID', $id);
		$this->db->delete('tblCampaigns');

		$this->db->where('userID', $id);
		$this->db->delete('tblPledges');

		$this->db->where('growerID', $id);
		$this->db->delete('tblTeamMembers');

		$this->db->where('growerID', $id);
		$this->db->delete('tblUserPhotos');

		$this->db->where('userID', $id);
		$query = $this->db->delete('tblUserStyles');


		// $statement = 'delete from tblUsers where userID = '.$id.'; delete from tblCampaigns where growerID = ' . $id . ';delete from tblTeamMembers where growerID = '.$id.'; delete from tblPledges where userID = ' . $id . '; delete from tblUserPhotos where growerID = ' . $id . '; delete from tblUserStyles where userID = ' . $id . ';';

		// $query = $this->db->query($statement);

		if ($query) {
			redirect(base_url('admin/delete_user'), 'refresh');
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

	function update_intro_text($p, $c)
	{

		$data = array ('introCopy' => $c);

		$this->db->where('page', $p);
		$this->db->update('tblCopy', $data);
		
	}

	function get_all_styles()
	{

		$query = $this->db->get('tblStyles');
		
			if ($query->num_rows() > 0) {
				return $query->result();
			} else {
				redirect(base_url('no-copy'), 'refresh');
			}
	}

	function add_cash_donation($s, $g, $c, $cp)
	{

		$this->db->set('campaignID', $cp);
		$this->db->set('userID', $g);
		$this->db->set('pledgeAmount', $c);
		$this->db->set('styleID', $s);
		$this->db->set('pledger', 'CASH');
		$this->db->set('pledgeTime', date("Y-m-d"));
		$query = $this->db->insert('tblPledges');

		if ($query) {
			return "Success.";
		} else {
			redirect(base_url('no-copy'), 'refresh');
		}

	}


















}