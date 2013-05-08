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

}