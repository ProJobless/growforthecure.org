<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notify extends CI_Controller {

	public function index()
	{
		if (current_url() == 'http://localhost:8888/growforthecure.org/notify') {
			$testing = TRUE;
		} else {
			$testing = FALSE;
		}
		
		if ($testing) {
			
			// WE ARE TESTING, POPULATE DATA OURSELVES.
			
			$custom = 'Not Set';
			$growerid = 'TESTGROWER';
			$styleid = 'TESTSTYLE';
			$grower_name = 'Stephen Collins';
			$payer_firstname = 'Stephen';
			$payer_email = 'stephen@stephencollins.me';
			$payer_amount = '10';

		} else {
			
			// LIVE, USE DATA RETURNED IN POST.
			
			$custom = $_POST['custom'];
			list($growerid, $styleid) = explode('-',$custom);	
			$grower_name = $growerid;
			$payer_firstname = $_POST['first_name'];
			$payer_email = $_POST['payer_email'];
			$payer_amount = $_POST['mc_gross'];
		}

		$message = '<html><head></head><body>';
		$message = $message . '<p>Payee Name : ' . $payer_firstname . '</p>';
		$message = $message . '<p>Grower Name : ' . $grower_name . '</p>';
		$message = $message . '<p>Grower ID : ' . $growerid . '</p>';
		$message = $message . '<p>Style ID : ' . $styleid . '</p>';
		$message = $message . '<p>Amount : $' . $payer_amount . '</p>';
		$message = $message . '</body></html>';

		$this->load->library('email');

		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'smtp.mandrillapp.com';
		$config['smtp_user'] = 'stephen@stephencollins.me';
		$config['smtp_pass'] = 'IrLx5aS2RPPLc_FcG6cWkQ';
		$config['smtp_port'] = '587';
		$config['charset'] = 'iso-8859-1';
		$config['mailtype'] = 'html';

		$this->email->initialize($config);

		$this->email->from('do_not_reply@growforthecure.org', 'Grow for the Cure');
		$this->email->to($payer_email); 


		$this->email->subject('Thank you for your donation, ' . $payer_firstname . '.');
		$this->email->message($message);	

		$this->email->send();

		echo $this->email->print_debugger();

		echo current_url();

// 		if($growerid && $styleid){
// 			$payment_status = $this->input->post('payment_status');
// 			if ($payment_status == 'Pending' || $payment_status == 'Completed'){
// 				$amount = 	$this->input->post('mc_gross');
// 				$curr = 	$this->input->post('mc_currency');
// //				$this->User->insertGrowerDonation($growerid,$styleid,$amount);
				
// 				//Now send emails to STEVE
// 				$payer_email = $_POST['payer_email'];
// 				$payer_fname = $_POST['first_name'];
// //				$grower_info_tmp = $this->User->getGrowerName(array('gotid'=>$growerid));
// //				$grower_info = $grower_info_tmp[0];
// //				$grower_name = $grower_info->username;
// //				$style_name = $this->User->getStyleName($styleid);

// //				$sql_email = "SELECT subjects, description FROM emailmanage WHERE id = '3' AND status = '1'";
// //				$res_email = mysql_query($sql_email) or die(mysql_error());
// //				$row_email = mysql_fetch_array($res_email);
				
// 				$subject = 'Email from paypal test.';

// 				$this->load->library('email');
// 				$configm['wordwrap'] = TRUE;
// 				$configm['mailtype'] = 'html';
// 				$configm['charset'] = 'utf-8';

// 				$this->email->initialize($configm);
// //				$receipentemail	= $grower_info->email;
// 				$receipentemail	= 'stephen@stephencollins.me';

// 				$link = base_url()."index.php/home/supportgrower/$growerid";

// //				$body = $row_email['description'];
// //				$body = str_replace('[AMOUNT]',$amount,$body);
// //				$body = str_replace('[FNAME]',$payer_fname,$body);
// //				$body = str_replace('[PEMAIL]',$payer_email,$body);
// //				$body = str_replace('[STYLENAME]',$style_name,$body);
// //				$body = str_replace('[LINK]','<b><a href="'.$link.'" target="_blank">'.$link.'</a></b>',$body);
// 				$body = 'Test email from Paypal link.';
// 				$body = $body + $growerid + $styleid;
// 				$this->email->from('admin@growforthecure.org');
// 				$this->email->to($receipentemail);

// 				$this->email->subject($subject);
// 				$this->email->message($body);
				
// 				$this->email->send();

// 				//Now send emails to payer
// 				// $this->email->clear();

// 				// $sql_email2 = "SELECT subjects, description FROM emailmanage WHERE id = '2' AND status = '1'";
// 				// $res_email2 = mysql_query($sql_email2) or die(mysql_error());
// 				// $row_email2 = mysql_fetch_array($res_email2);

// 				// $subject = $row_email2['subjects'];

// 				// $this->email->initialize($configm);
// 				// $receipentemail	= $payer_email;
				
// 				// $link2 = base_url()."index.php/home/supportgrower/$growerid";

// 				// $body = $row_email2['description'];
// 				// $body = str_replace('[AMOUNT]',$amount,$body);
// 				// $body = str_replace('[GROWERNAME]',$grower_name,$body);
// 				// $body = str_replace('[STYLENAME]',$style_name,$body);
// 				// $body = str_replace('[LINK]','<b><a href="'.$link2.'" target="_blank">'.$link2.'</a></b>',$body);

// 				// $this->email->from('admin@growforthecure.org');
// 				// $this->email->to($receipentemail);

// 				// $this->email->subject($subject);
// 				// $this->email->message($body);
				
// 				// $this->email->send();
				
		// 	}
		// }
		
	}





}