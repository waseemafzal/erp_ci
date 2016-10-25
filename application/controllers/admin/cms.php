<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cms extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('cms_model','MODEL');
		$this->load->model('contact_model');
		
		if ($this->session->userdata('logged_in')==false and $this->session->userdata('type') != ADMIN)
			{
				header('location:'.base_url().'admin/');
			}
	}

	function index()
	{
		
		$this->load->view('admin/main/header');
		$this->load->view('admin/cms/cms');
		$this->load->view('admin/main/footer');
	}
	function viewpost($id){
		$aData['data'] =$this->MODEL->get_post($id);
		$aData['post_parent_id'] =$id;
		$aData['url'] =$url;
		$aData['type'] =$id; 
		$this->load->view('admin/main/header');
		$this->load->view('admin/cms/viewpost',$aData);
		$this->load->view('admin/main/footer');
	}
	/************contacted user site messages**********/
	function viewmessage(){
		$aData['data'] =$this->contact_model->get_messages();
		$this->load->view('admin/main/header');
		$this->load->view('admin/meeting_request/view_site_messages',$aData);
		$this->load->view('admin/main/footer');
	}
	function message($id){
		$aData['row'] =$this->contact_model->get_user_message($id);
		$this->load->view('admin/main/header');
		$this->load->view('admin/meeting_request/view_user_message',$aData);
		$this->load->view('admin/main/footer');
	}
	
	
function deleteMessage($id){
		
		$aData['class']="message_text_suc";
		$aData['tblName']="site_messages";
		$result =$this->contact_model->deleteMessages($id);
		if($result==1){
		$aData['msg']="Sucess : Record Have been Deleted Sucessfully";
		$aData['data'] =$this->contact_model->get_messages();
		$this->load->view('admin/main/header');  
		$this->load->view('admin/meeting_request/view_site_messages',$aData);
		$this->load->view('admin/main/footer');
		}
		else{
		$aData['msg']="Error : Record Have not been Deleted";
		$aData['data'] =$this->contact_model->get_messages();
		$this->load->view('admin/main/header');  
		$this->load->view('admin/meeting_request/view_site_messages',$aData);
		$this->load->view('admin/main/footer');
			}
		
	}
	/************contacted user site End**********/


	function post($post_parent_id)
	{
		$aData['post_parent_id'] =$post_parent_id;
		$this->load->view('admin/main/header');
		$this->load->view('admin/cms/addpost',$aData);
		$this->load->view('admin/main/footer');
	}			
	function savepost($cms_id)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('description','Description ','trim|required|xss_clean|min_length[1]');
		if ($this->form_validation->run()==false){
		$this->load->view('admin/main/header');
		$this->load->view('admin/cms/addpost');
		$this->load->view('admin/main/footer');
		}else{
		  $result =$this->MODEL->savepost($this->input->post('description'),$cms_id);
		  switch($result){
			case 2:
			$aData['class']="message_text_eror";
			$aData['msg']="Error : Title With This Already Exist";
			$this->load->view('admin/main/header');
			$this->load->view('admin/cms/addpost',$aData);
			$this->load->view('admin/main/footer');
			break;
			case 1:
			$aData['class']="message_text_suc";
			$aData['msg']="Sucess : Record Have been Succesfully Added";
			$this->load->view('admin/main/header');
			$this->load->view('admin/cms/addpost',$aData);
			$this->load->view('admin/main/footer');
			break;
			case 0:
			$aData['class']="message_text_eror";
			$aData['msg']="Error : Something went wrong,try again";
			$this->load->view('admin/main/header');
			$this->load->view('admin/cms/addpost',$aData);
			$this->load->view('admin/main/footer');
			break;
			default:
			$this->viewpost($post_parent_id);
			break;	
			}
		}
	}
	function updatepost($post_parent_id)
	{
		
    	$this->load->library('form_validation');
		$this->form_validation->set_rules('description','Description ','trim|required');
		if ($this->form_validation->run()==false){
		$this->load->view('admin/main/header');
		$this->load->view('admin/cms/editpost');
		$this->load->view('admin/main/footer');
		}else{
		$id=	$this->input->post('id_of_edited_post');
		extract($_POST);
		$result =$this->MODEL->updatepost($description,$description_ar,$id);
			switch($result){
			case 1:
		
			$aData['class']="message_text_suc";
			 $aData['msg']="Sucess : Record Have been Succesfully updated";
			$aData['row'] =$this->MODEL->editpost($id);
			$this->load->view('admin/main/header');
			$this->load->view('admin/cms/editpost',$aData);
			$this->load->view('admin/main/footer');
			break;
			case 0:
			$aData['class']="message_text_eror";
			$aData['msg']="Error : Something went wrong,try again";
			$this->load->view('admin/main/header');
			$this->load->view('admin/cms/editpost',$aData);
			$this->load->view('admin/main/footer');
			break;
			default:
			$this->updatepost($post_parent_id);
			break;	
			}
		}
	
	}
		function editpost($post_parent_id)
		{
			
			$aData['row'] =$this->MODEL->editpost($post_parent_id);
			$this->load->view('admin/main/header');
			$this->load->view('admin/cms/editpost',$aData);
			$this->load->view('admin/main/footer');
		}
	
	function save()
	{
		    $this->load->library('form_validation');
			$this->form_validation->set_rules('title','Title','trim|required|xss_clean|min_length[1]|max_length[35]');
			$this->form_validation->set_rules('description','Description ','trim|required|xss_clean|min_length[1]');
			if ($this->form_validation->run()==false){
					$this->load->view('admin/main/header');
					$this->load->view('admin/cms/cms');
					$this->load->view('admin/main/footer');
			}else{
		  $result =$this->MODEL->save($this->input->post('title'),$this->input->post('title_ar'),$this->input->post('description'),$this->input->post('description_ar'));
			switch($result){
			case 2:
			$aData['class']="message_text_eror";
			$aData['msg']="Error : Title With This Already Exist";
			$this->load->view('admin/main/header');
			$this->load->view('admin/cms/cms',$aData);
			$this->load->view('admin/main/footer');
			break;
			case 1:
			$aData['class']="message_text_suc";
			$aData['msg']="Sucess : Record Have been Succesfully Added";
			$this->load->view('admin/main/header');
			$this->load->view('admin/cms/cms',$aData);
			$this->load->view('admin/main/footer');
			break;
			
			case 0:
			$aData['class']="message_text_eror";
			$aData['msg']="Error : Something went wrong,try again";
			$this->load->view('admin/main/header');
			$this->load->view('admin/cms/cms',$aData);
			$this->load->view('admin/main/footer');
			break;
			default:
			$this->index();
			break;	
			}
		}
	}	
	function view(){
		//die('han');
		$aData['data'] =$this->MODEL->get();
		$this->load->view('admin/main/header');
		$this->load->view('admin/cms/view_cms',$aData);
		$this->load->view('admin/main/footer');
	}
	function delete($id){
		$result =$this->MODEL->delete($id);
		$aData['class']="message_text_suc";
		$aData['tblName']="tbl_cms";
		$aData['msg']="Sucess : Record Have been Deleted Sucessfully";
		$aData['data'] =$this->MODEL->get();
		$this->load->view('admin/main/header');  
		$this->load->view('admin/cms/view_cms',$aData);
		$this->load->view('admin/main/footer');
	}
	function deleteNavPost($id,$post_parent_id){
		$result =$this->MODEL->delete($id);
		$this->viewpostNav($post_parent_id);
	}
	function edit(){
		$aUrl=$this->uri->uri_to_assoc(2);
		$aData['row'] =$this->MODEL->edit($aUrl['id']);
		$this->load->view('admin/main/header');
		$this->load->view('admin/cms/edit_cms',$aData);
		$this->load->view('admin/main/footer');
	}	
		/***************************** nav function Start ***********/
	function nav(){
	$aData['data'] =$this->MODEL->get_nav();
	$aData['tblName']="tbl_cms";
	$this->load->view('admin/main/header');
	$this->load->view('admin/cms/view_cms_nav',$aData);
	$this->load->view('admin/main/footer');
	}
	function viewpostNav($id){
	$aData['data'] =$this->MODEL->get_post_nav($id);
	$aData['post_parent_id'] =$id;
	$aData['url'] =$url;
	$aData['type'] =$id; 
	$this->load->view('admin/main/header');
	$this->load->view('admin/cms/viewpost_nav',$aData);
	$this->load->view('admin/main/footer');
	}
	function successStories($id){
	$aData['data'] =$this->MODEL->get_post_nav($id);
	$aData['post_parent_id'] =$id;
	$aData['url'] =$url;
	$aData['type'] =$id; 
	$this->load->view('admin/main/header');
	$this->load->view('admin/cms/viewpost_story',$aData);
	$this->load->view('admin/main/footer');
	}
	function editNav(){
	$aUrl=$this->uri->uri_to_assoc(2);
	$aData['row'] =$this->MODEL->edit_nav($aUrl['id']);
	$this->load->view('admin/main/header');
	$this->load->view('admin/cms/edit_cms_nav',$aData);
	$this->load->view('admin/main/footer');
	}
	function AddPostNav($post_parent_id)
	{
	$aData['post_parent_id'] =$post_parent_id;
	$this->load->view('admin/main/header');
	$this->load->view('admin/cms/addpost_nav',$aData);
	$this->load->view('admin/main/footer');
	}
	function SavePostNav($post_parent_id)
	{   
		$this->load->library('form_validation');
		$this->form_validation->set_rules('description','Description ','trim|required|xss_clean|min_length[1]');
	if ($this->form_validation->run()==false)
	{
		$this->load->view('admin/main/header');
		$this->load->view('admin/cms/addpost');
		$this->load->view('admin/main/footer');
	}
	else
	{
		extract($_POST);
		$result =$this->MODEL->savepostnav($description,$description_ar,$post_parent_id);
		switch($result){
		case 2:
		$aData['post_parent_id'] =$post_parent_id;
		$aData['class']="message_text_eror";
		$aData['msg']="Error : Title With This Already Exist";
		$this->load->view('admin/main/header');
		$this->load->view('admin/cms/addpost_nav',$aData);
		$this->load->view('admin/main/footer');
		break;
		case 1:
		$aData['post_parent_id'] =$post_parent_id;
		$aData['class']="message_text_suc";
		$aData['msg']="Sucess : Record Have been Succesfully Added";
		$this->load->view('admin/main/header');
		$this->load->view('admin/cms/addpost_nav',$aData);
		$this->load->view('admin/main/footer');
		break;
		
		case 0:
		$aData['post_parent_id'] =$post_parent_id;
		$aData['class']="message_text_eror";
		$aData['msg']="Error : Something went wrong,try again";
		$this->load->view('admin/main/header');
		$this->load->view('admin/cms/addpost_nav',$aData);
		$this->load->view('admin/main/footer');
		break;
		default:
		$this->viewpostNav($post_parent_id);
		break;	
			}
		}
	}	
	/**************update images ************/
	function update($id)
		{
				
		if($this->input->post('upload_hidden') ==1){
		$count =sizeof($_FILES);
		$config['upload_path']   =   "uploads/gallery/"; /* NB! create this dir! */
		$config['allowed_types'] = ALLOWED_TYPES;
		$config['max_size']      =   $this->input->post('max_size');
		
		$config['max_width']     =   $this->input->post('max_width');
		$config['max_height']    =   $this->input->post('max_height');
		//$config['file_name']  =    time().'.jpg'; 
		$this->load->library('upload', $config);
		$configThumb = array();
		$configThumb['image_library'] = 'gd2';
		$configThumb['source_image'] = "uploads/gallery/";
		$configThumb['create_thumb'] = TRUE;
		$configThumb['maintain_ratio'] = FALSE;
		$configThumb['width'] = 100;
		$configThumb['height'] = 100;
		$this->load->library('image_lib');
		$data['msg']=''; 
		$result=2;
		for($i = 1; $i <= $count; $i++) {
		$upload = $this->upload->do_upload('image'.$i);
		if($upload === FALSE) continue; 
		$data = $this->upload->data();
		$uploadedFiles[$i] = $data;  
		if($i == 1){
		 'File name : '. $largeImageFileName = $data['file_name'];
		}
		if($i == 2){
		$smallImageFileName = $data['file_name'];
		}
		
		if($data['is_image'] == 1) {
		$configThumb['source_image'] = $data['full_path'];
		$this->image_lib->initialize($configThumb);
		$this->image_lib->resize();
		}
		}
		$image1 = $this->input->post('hidden_img');
		$image_small = $this->input->post('hidden_img_small');
		
		if($largeImageFileName !=""){
		$image1 = $largeImageFileName;
		}
		
		if($smallImageFileName !=""){
		$image_small = $smallImageFileName;
		}
		extract($_POST);
		$result =$this->MODEL->update($image1,$image_small,$id,$title);
		{
		$aData['row'] =$this->MODEL->edit($id);
		}
		echo $result;
		switch($result){
		case 1:
		$aData['class']="message_text_suc";
		$aData['msg']="Sucess : Record Have been updated Succesfully ";
		$this->load->view('admin/main/header');
		$aData['row'] =$this->MODEL->edit($id);
		$this->load->view('admin/cms/edit_cms',$aData);
		$this->load->view('admin/main/footer');
		break;
		
		case 0:
		$aData['class']="message_text_eror";
		$aData['msg']="Error : Updateion Faild";
		$this->load->view('admin/main/header');
		$aData['row'] =$this->MODEL->edit($id);
		$this->load->view('admin/cms/edit_cms',$aData);
		$this->load->view('admin/main/footer');
		break;
		
		case 2:
		$aData['class']="message_text_eror";
		$aData['msg']="Error : Title With This Already Exist";
		$this->load->view('admin/main/header');
		$aData['row'] =$this->MODEL->edit($id);
		$this->load->view('admin/cms/edit_cms',$aData);
		$this->load->view('admin/main/footer');
		break;
		default:
		$this->index();
		break;	
		}
		}
	}
	
		/************************************************* nav function end***********/
		
		function updateNav()
		{
			$aUrl=$this->uri->uri_to_assoc(2);
			$aData['id']=$aUrl['id'];
			$result=0;				
			if($this->input->post('upload_hidden') ==1){
			$count =sizeof($_FILES);
			$config['upload_path']   =   "uploads/gallery/"; /* NB! create this dir! */
			$config['allowed_types'] = ALLOWED_TYPES;
			$config['max_size']      =   $this->input->post('max_size');
			$config['max_width']     =   $this->input->post('max_width');
			$config['max_height']    =   $this->input->post('max_height');
			//$config['file_name']  =    time().'.jpg'; 
			$this->load->library('upload', $config);
			$configThumb = array();
			$configThumb['image_library'] = 'gd2';
			$configThumb['source_image'] = "uploads/gallery/"; 
			$configThumb['create_thumb'] = TRUE;
			$configThumb['maintain_ratio'] = FALSE;
			$configThumb['width'] = 100;
			$configThumb['height'] = 100;
			$this->load->library('image_lib');
			$data['msg']=''; 
			
			$result=2;
			for($i = 1; $i <= $count; $i++) {
			$upload = $this->upload->do_upload('image'.$i);
			
			if($upload === FALSE) continue; 
			$data = $this->upload->data();
			$uploadedFiles[$i] = $data;
			if($i == 1){
			$largeImageFileName = $data['file_name'];
			}
			if($i == 2){
			$smallImageFileName = $data['file_name'];
			}
			
			if($data['is_image'] == 1) {
			$configThumb['source_image'] = $data['full_path'];
			$this->image_lib->initialize($configThumb);
			$this->image_lib->resize();
			}
		}
			$image1 = $this->input->post('hidden_img');
			$image_small = $this->input->post('hidden_img_small');
			
			if($largeImageFileName !=""){
				$image1 = $largeImageFileName;
			}
			
			if($smallImageFileName !=""){
				$image_small = $smallImageFileName;
			}
			$id = $aData['id'];
				$result =$this->MODEL->update_nav($image1,$id);
				  {
			   $aData['row'] =$this->MODEL->edit_nav($aUrl['id']);
/*			  if($data['is_image'] == 1) {
							$configThumb['source_image'] = $data['full_path'];
							$this->image_lib->initialize($configThumb);
							$this->image_lib->resize();
					}*/
				  }
			  echo $result;
			  switch($result){
						case 1:
						$aData['class']="message_text_suc";
						$aData['msg']="Sucess : Record Have been updated Succesfully ";
						$this->load->view('admin/main/header');
						$aData['row'] =$this->MODEL->edit_nav($aUrl['id']);
						$this->load->view('admin/cms/edit_cms_nav',$aData);
						$this->load->view('admin/main/footer');
						break;
						case 0:
						$aData['class']="message_text_eror";
						$aData['msg']="Error : Updateion Faild";
						$this->load->view('admin/main/header');
						$aData['row'] =$this->MODEL->edit_nav($aUrl['id']);
						$this->load->view('admin/cms/edit_cms_nav',$aData);
						$this->load->view('admin/main/footer');
						break;
						case 2:
						$aData['class']="message_text_eror";
						$aData['msg']="Error : Title With This Already Exist";
						$this->load->view('admin/main/header');
						$aData['row'] =$this->MODEL->edit_nav($aUrl['id']);
						$this->load->view('admin/cms/edit_cms_nav',$aData);
						$this->load->view('admin/main/footer');
						break;
						
						default:
						$this->index();
						break;	
				}
			}
			
		}
	}

/* End of file cms.php */
/* Location: ./application/controllers/admin/cms.php */
?>