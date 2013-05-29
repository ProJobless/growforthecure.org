<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Deletephoto extends CI_Controller {

	function index()
	{
		$pID = $_GET['id'];
		$uID = $_GET['u'];
		$fID = $_GET['f'];

		$path = './userphotos/' . $fID;
		$path2 = './userphotos/' . str_replace('.', '_thumb.', $fID);

		unlink($path); 
		unlink($path2); 

		$this->db->where('photoID', $pID);
		$this->db->where('growerID', $uID);
		$this->db->delete('tblUserPhotos'); 

		redirect('/photos/'.$uID, 'refresh');

	}



}

