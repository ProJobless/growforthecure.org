<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index()
	{

		$query = $this->db->get_where('tblCopy', array('page' => 'front'));
		$row = $query->row();
		$data = $row;

		$this->load->view('index', $data);
	}


}

/* End of file main.php */
/* Location: ./application/controllers/main.php */