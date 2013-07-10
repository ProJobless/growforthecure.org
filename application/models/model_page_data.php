<?php

class Model_page_data extends CI_Model {

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}
	
	function get_copy($page)
	{
		$this->db->where('page', $page);
		$query = $this->db->get('tblCopy');
		
			if ($query->num_rows() > 0) {
				return $query->result();
			} else {
				redirect(base_url('no-copy'), 'refresh');
			}


	}

	function get_style_icons($n, $o)
	// n = NUMBER o = RANDOM/ASC/DESC
	{
		$this->db->order_by("styleName", $o); 
		$this->db->limit($n);
		$query = $this->db->get('tblStyles');
		
			if ($query->num_rows() > 0) {
				return $query->result();
			} else {
				redirect(base_url('no-styles'), 'refresh');
			}
	}

	function get_news()
	{
		$this->db->order_by('id', 'DESC');
		$this->db->limit(10);

		$query = $this->db->get('tblNews');

			if ($query->num_rows() > 0) {
				return $query->result();
			} else {
				redirect(base_url('no-news'), 'refresh');
			}
	}



}