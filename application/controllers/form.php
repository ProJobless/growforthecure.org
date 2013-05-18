<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Form extends CI_Controller {

	function index()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<p class="error">', '</p>');

		$this->form_validation->set_rules('firstname', 'First Name', 'required');
		$this->form_validation->set_rules('lastname', 'Last Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_check_email_address');
		$this->form_validation->set_rules('password1', 'Password', 'required|md5');
		$this->form_validation->set_rules('password2', 'Password2', 'required|matches[password1]|md5');
		$this->form_validation->set_rules('color', 'Color', 'required|callback_color_check');
		$this->form_validation->set_message('matches', 'The Password fields do not match.');

		if ($this->form_validation->run() == FALSE)
		{
		$data['body_class'] = 'registration-page';
		$data['page_title'] = "Grow for the Cure : Register / Log In";
		$data['page_description'] = "Log in to your grower account here, or create a new one.";

		$this->load->view('header', $data);
		$this->load->view('register', $data);
		$this->load->view('footer', $data);		}
		else
		{
			$this->load->view('formsuccess');
		}
	}

	public function check_email_address($e)
	{

		$this->db->where('emailAddress', $e);
		$query = $this->db->get('tblUsers');
		
		if ($query->num_rows() > 0) {
			
			$this->form_validation->set_message('check_email_address', 'There is already an account with the address of %s');
			return FALSE;
	
		} else {
	
			return TRUE;
	
		}


	}

	public function color_check($b)
	{
		
		if ($b == 'yellow') {
			
			return TRUE;
	
		} else {

			$this->form_validation->set_message('color_check', 'Sorry, but ' . $b . ' is not the color of a banana.');
			return FALSE;
	
		}


	}

}
?>