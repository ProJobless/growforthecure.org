<?php

class Model_users extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_all_users()
    {

        $query = $this->db->query('select firstName from tblUsers');

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
            redirect(base_url('no-user'), 'refresh');
        }


    }

}