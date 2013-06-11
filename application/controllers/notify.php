<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notify extends CI_Controller {

	public function index()
	{
		$custom = $this->input->get('custom');
		list($growerid, $styleid) = explode('-',$custom);

		echo $growerid;
		echo $styleid;

		$this->load->library('email');

$config['protocol'] = 'sendmail';
$config['mailpath'] = '/usr/sbin/sendmail';
$config['charset'] = 'iso-8859-1';
$config['wordwrap'] = TRUE;

$this->email->initialize($config);

$this->email->from('stephen@stephencollins.me', 'Stephen Collins');
$this->email->to('scollins@slightlymanic.com'); 


$this->email->subject('Email Test');
$this->email->message('Testing the email class.');	

$this->email->send();

echo $this->email->print_debugger();

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