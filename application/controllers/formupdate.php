<?php

class Formupdate extends CI_Controller {

	function index()
	{

		$this->load->model('model_users');
		$this->load->model('model_page_data');

		$data['styles'] = $this->model_page_data->get_style_icons(14, 'ASC');

		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

		$this->form_validation->set_rules('firstname', 'First Name', 'prep_for_form|required');
		$this->form_validation->set_rules('lastname', 'Last Name', 'prep_for_form|required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_check_email_address');
		$this->form_validation->set_rules('password1', 'Password', 'matches[password2]|md5');
		$this->form_validation->set_rules('password2', 'Password2', 'md5');
		$this->form_validation->set_rules('enddate', 'End Date', 'required|callback_check_end_date');
		$this->form_validation->set_message('matches', 'The Password fields do not match.');

		$data['user_id'] = $this->input->post('userID');
		$data['first_name'] = $this->input->post('firstname');
		$data['last_name'] = $this->input->post('lastname');
		$data['email'] = $this->input->post('email');
		$data['statement'] = $this->input->post('statement');
		$data['endDate'] = $this->input->post('enddate');
		$data['password'] = $this->input->post('password1');

		if ($this->form_validation->run() == FALSE)
		{

			$data['page_title'] = "Grow for the Cure : Edit your Profile";
			$data['page_description'] = "Profile Editor";
			$data['body_class'] = "profile-page";



			$this->load->view('header', $data);
			$this->load->view('formupdate', $data);
			$this->load->view('footer', $data);

		}
		else
		{



			if ($data['password']) {
//				$pass = do_hash($data['password'], 'md5');
//				echo $pass;
//				$pass = do_hash($data['password'], 'md5');
				$this->db->set('password', do_hash($data['password'], 'md5'));
			}


			$this->db->set('firstName', $data['first_name']);
			$this->db->set('lastName', $data['last_name']);
			$this->db->set('emailAddress', $data['email']);
			$this->db->set('statement', $data['statement']);
			$this->db->where('UserID', $data['user_id']);
			$this->db->update('tblUsers'); 

			$this->db->set('endDate', $data['endDate']);
			$this->db->where('growerID', $data['user_id']);
			$this->db->where('current', '1');
			$this->db->update('tblCampaigns'); 



			redirect('/profile/'.$data['user_id'], 'refresh');
		}

	}
}
?>