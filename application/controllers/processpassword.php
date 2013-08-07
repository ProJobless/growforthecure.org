<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Processpassword extends CI_Controller {

	function index()
	{
		$u = $_POST['user'];
		$p = md5($_POST['pass']);

		$data = array(
               'password' => $p
            );
		$this->db->where('userID', $u);
		$query = $this->db->update('tblUsers', $data);

		if ($query) {
			redirect(base_url('register'), 'refresh');
		} else {
			return 0;
		}



	}



}
?>