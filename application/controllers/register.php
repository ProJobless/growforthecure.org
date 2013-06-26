<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {

function index()
	{

		$this->load->helper('cookie');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

		$this->form_validation->set_rules('firstname', 'First Name', 'prep_for_form|required');
		$this->form_validation->set_rules('lastname', 'Last Name', 'prep_for_form|required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_check_email_address');
		$this->form_validation->set_rules('password1', 'Password', 'required|md5');
		$this->form_validation->set_rules('password2', 'Password2', 'required|matches[password1]|md5');
		$this->form_validation->set_rules('enddate', 'End Date', 'required|callback_check_end_date');
		$this->form_validation->set_rules('color', 'Color', 'required|callback_color_check');
		$this->form_validation->set_message('matches', 'The Password fields do not match.');


		if ($this->form_validation->run() == FALSE)
		{
			$data['body_class'] = 'registration-page';
			$data['page_title'] = "Grow for the Cure : Register / Log In";
			$data['page_description'] = "Log in to your grower account here, or create a new one.";

			$this->load->view('header', $data);
			$this->load->view('register', $data);
			$this->load->view('footer', $data);
		}
		else
		{

            $firstname = $this->input->post('firstname');
            $lastname = $this->input->post('lastname');
            $email = $this->input->post('email');
            $password1 = $this->input->post('password1');
            $password2 = $this->input->post('password2');
            $enddate = $this->input->post('enddate');

            $secretcode = $this->input->post('secretcode');
            $teamname = $this->input->post('teamname');


            if (!$secretcode) {
            	if (!$teamname) {
					$team = $lastname;
            	} else {
					$team = $teamname;
            	}
            }


            if($secretcode) {

       			$this->load->model('model_users');
				$data['teamcheck'] = $this->model_users->get_team_from_code($secretcode);
			
				foreach ($data['teamcheck'] as $teamcheck) {
					$data['teamcheck'] = $teamcheck->teamName;
				}

				$team = $teamcheck->teamName;
				$teamID = $teamcheck->teamID;

			}


      //      print $firstname . '<br/>' . $lastname . '<br/>' . $email. '<br/>' . $password1 . '<br/>' . $password2 . '<br />' . $enddate . '<br />Team: ' . $team;


			$this->db->set('firstName', $firstname);
			$this->db->set('lastName', $lastname);
			$this->db->set('emailAddress', $email);
			$this->db->set('password', $password1);
			$this->db->insert('tblUsers');

			$this->db->where('emailAddress', $email);
			$query = $this->db->get('tblUsers');



			if ($query->num_rows() > 0) {

				foreach ($query->result_array() as $row) {
					$userID = $row['userID'];
				}
			}


			if ($secretcode) {
				// TEAM ALREADY EXISTS
				$this->db->set('growerID', $userID);
				$this->db->set('teamID', $teamID);
				$this->db->insert('tblTeamMembers');
			} else {
				// NEED TO ADD TEAM
				$this->db->set('teamName', $team);
				$randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 10);
				$randomString2 = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 10);
				$this->db->set('teamCode', time() . '-' . $randomString . '-' . $randomString2);
				$this->db->insert('tblTeams');

				$this->db->where('teamName', $team);
				$query = $this->db->get('tblTeams');

				if ($query->num_rows() > 0) {

					foreach ($query->result_array() as $row) {
						$teamID = $row['teamID'];
					}
				}

				$this->db->set('growerID', $userID);
				$this->db->set('teamID', $teamID);
				$this->db->insert('tblTeamMembers');
			}
			
			$newDate = new DateTime($enddate);
			$dateReady = $newDate->format('Y-m-d');
//			echo $dateReady;

			$this->db->set('growerID', $userID);
			$this->db->set('teamID', $teamID);
			$this->db->set('startDate', date("Y-m-d"));
			$this->db->set('endDate', $dateReady);
			$this->db->set('current', 1);
			$this->db->insert('tblCampaigns');

			$fullName = strtolower($firstname) . '-' . strtolower($lastname);

			setcookie('userid', $userID, time()+60*60*24*30, '/');
			setcookie('fullname', $fullName, time()+60*60*24*30, '/');

			redirect('/profile/'. $fullName . '/' . $userID, 'refresh');
		}
	}

	public function check_end_date($d)
	{		

			$ts1 = strtotime($d);
			$ts2 = strtotime(date("Y-m-d H:i:s"));

			$seconds_diff = $ts1 - $ts2;

			$time_difference = floor($seconds_diff/3600/24);
			
			if ($time_difference > 6) {
				return TRUE;
			} else {
				$this->form_validation->set_message('check_end_date', 'You must select a date at least 7 days in the future.');
				return FALSE;	
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

/* End of file register.php */
/* Location: ./application/controllers/register.php */

