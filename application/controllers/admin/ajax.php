<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		 
	}

	function index()
	{
		
		$aUrl=$this->uri->uri_to_assoc(2);
		$aData['id'] = $aUrl['id']; 
		$aData['quantity'] = $aUrl['quantity'];
		$aData['action'] = $aUrl['action'];
		$aData['status'] = $aUrl['status'];
		$aData['tblName'] = $aUrl['tblName'];
		$aData['email'] = $aUrl['email'];
		$aData['userId'] = $aUrl['userId'];
		$aData['prodcut_id'] = $aUrl['prodcut_id'];
		$aData['column'] = $aUrl['column'];
		$aData['commnets'] = $aUrl['commnets'];
		$aData['contact_name'] = $aUrl['contact_name'];
		$aData['contact_email'] = $aUrl['contact_email'];
		$aData['contact_subject'] = $aUrl['contact_subject'];
		$aData['contact_message'] = $aUrl['contact_message'];
	
		
		
		$this->load->view('admin/ajax_view/ajax_view',$aData);
	}
	 function change_status()
	{
	/*	echo '<pre>';
print_r($_POST);
die();*/

		extract($_POST);
		if($status ==1){
		$status =0;
		}
		else{
		$status =1;
		}
		$data = array(
		'status' => $status 
		);
		 $status = $this->user_model->change_status($id,$data,$table_name);
			if($status ==1){
			 	echo 1;
			}else{
				echo '<span class="label label-important">UnApproved</span>';
			}
		}

	
	
	
	
}

/* End of file Dashboard.php */
/* Location: ./application/controllers/dashboard.php */
?>