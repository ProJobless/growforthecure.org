<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Password extends CI_Controller {

	function index()
	{

	}

	function update()
	{
		$user_to_update = $this->uri->segment(3);
		$user_code = $this->uri->segment(4);

		$data['page_title'] = "Grow for the Cure : Update your password";
		$data['page_description'] = "Use this page to update your password.";
		$data['body_class'] = "update-page";

		$data['uID'] = $user_to_update;

		$this->db->where('userID', $user_to_update);
		$this->db->where('password', $user_code);
		$query = $this->db->get('tblUsers');

		if ($query->num_rows() > 0) {
		} else {
			redirect(base_url('who'), 'refresh');
		}


		if ($query) {
			$this->load->view('header', $data);
			$this->load->view('update', $data);
			$this->load->view('footer', $data);
		}
	}


}
?>