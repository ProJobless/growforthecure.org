<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Photos extends CI_Controller {


	function index()
	{

			$user_to_get = $this->uri->segment(2);

			$data['user_id'] = $user_to_get;

			$this->load->model('model_users');

			$data['campaigninfo'] = $this->model_users->get_campaign_info($user_to_get);

			foreach ($data['campaigninfo'] as $campaign) {
				$data['campaign_id'] = $campaign->campaignID;
			}	

			$data['photos'] = $this->model_users->get_user_photos($data['user_id'], $data['campaign_id']);


			$data['photoName'] = '';

			$this->load->helper('form');
			$this->load->library('form_validation');


			$data['page_title'] = "Grow for the Cure : Photo Uploading";
			$data['page_description'] = "Photo Editor";
			$data['body_class'] = "photos-page";

			$this->load->view('header', $data);
			$this->load->view('photos', array('error' => ' ' ));
			$this->load->view('footer', $data);
	}

	function upload_photos()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('userfile', 'Photo', 'required');

		$config['upload_path'] = './userphotos/';
		$config['allowed_types'] = 'jpg';
		$config['max_size']	= '10000';
		$config['max_width']  = '0';
		$config['max_height']  = '0';
		$config['encrypt_name']  = TRUE;
		
		$this->load->library('upload', $config);



		


		if ( ! $this->upload->do_upload())
		{


			$data['error'] = array('error' => $this->upload->display_errors());
			

			$data['page_title'] = "Grow for the Cure : Photo Uploading";
			$data['page_description'] = "Photo Editor";
			$data['body_class'] = "photos-page";

			$this->load->view('header', $data);
			$this->load->view('error', $data);
			$this->load->view('footer', $data);

		}
		else
		{


			$data = array('upload_data' => $this->upload->data());
			
            $userID = $this->input->post('userID');
            $campaignID = $this->input->post('campaignID');
            $caption = $this->input->post('caption');
            $profilepic = $this->input->post('profilepic');

			$data['photoName'] = $data['upload_data']['file_name'];
			$data['caption'] = $caption;

			$this->db->set('growerID', $userID);
			$this->db->set('photoImage', $data['upload_data']['file_name']);
			$this->db->set('photoCaption', $caption);

			if ($profilepic == 'yes') {
				$this->db->set('profilePic', 1);
				$this->db->set('growPic', 0);
			} else {
				$this->db->set('profilePic', 0);
				$this->db->set('growPic', 1);
			}

			$this->db->set('campaignID', $campaignID);
			$this->db->insert('tblUserPhotos');

			if ($profilepic == 'yes') {
				
				$profile = array(
					'profilePic' => $data['upload_data']['file_name'],
				);

				$this->db->where('userID', $userID);
				$this->db->update('tblUsers', $profile); 
			}

			$photoConfig['image_library'] = 'gd2';
			$photoConfig['source_image'] = $data['upload_data']['full_path'];
			$photoConfig['create_thumb'] = TRUE;
			$photoConfig['maintain_ratio'] = TRUE;
			$photoConfig['width']	 = 300;
			$photoConfig['height']	= 400;

			$this->load->library('image_lib', $photoConfig); 
			
			if ( ! $this->image_lib->resize())
			{
			    echo $this->image_lib->display_errors();
			} else {
//			    echo $this->image_lib->display_errors();
				$this->image_lib->resize();
//				echo 'Successfully resized: ' . $photoConfig['source_image'];
			}


			// echo '<pre>';
			// print_r($data);
			// echo '</pre>';

			// echo '<pre>';
			// print_r($photoConfig);
			// echo '</pre>';

			redirect('/photos/'.$userID, 'refresh');

		}
	}

	}