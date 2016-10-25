<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('contact_model');
		$this->load->model('dashboard_model','MODEL');
		if ($this->session->userdata('logged_in')==false and $this->session->userdata('type') != ADMIN)
			{
				header('location:'.base_url().'admin/');
			}
		 
	}

	function index()
	{
		
		
		$total_unread_messages =$this->contact_model->get_unread_messages();
		$total_messages =$this->contact_model->total_messages_count();
		$aData['total_messages'] =$total_messages;
		$aData['unread_messages'] =$total_unread_messages;
	    $this->load->view('admin/main/header');
		$this->load->view('admin/dashboard',$aData);
		$this->load->view('admin/main/footer');
	}
	
	
	function view(){
		$aData['data'] =$this->MODEL->get();
		$this->load->view('admin/main/header');
		$this->load->view('admin/dashboard/view_cms',$aData);
		$this->load->view('admin/main/footer');
	}
	function edit(){
		$aUrl=$this->uri->uri_to_assoc(2);
		$aData['id']=$aUrl['id'];
		$aData['row'] =$this->MODEL->edit($aUrl['id']);
		$this->load->view('admin/main/header');
		$this->load->view('admin/dashboard/edit_cms',$aData);
		$this->load->view('admin/main/footer');
	}
	function update($id)
		{
	
		if($this->input->post('upload_hidden') ==1){
		$count =sizeof($_FILES);
		$config['upload_path']   =   "uploads/gallery/"; /* NB! create this dir! */
		$config['allowed_types'] = ALLOWED_TYPES;
		$config['max_size'] = '2000'; // sets the upload limit to 2mb, some people may dicide to use digital camera
		$config['remove_spaces'] = TRUE; 
		$config['overwrite'] = TRUE; 
		$config['max_width']     =   268;
		$config['max_height']    =   268;
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
	
	
		$result =$this->MODEL->update($id,$image1,$image_small);
		
		 $result;
		switch($result){
		case 1:
		$aData['id']=$id;
		$aData['class']="message_text_suc";
		$aData['msg']="Sucess : Record Have been updated Succesfully ";
		$this->load->view('admin/main/header');
	
		$aData['row'] =$this->MODEL->edit($id);
		$this->load->view('admin/dashboard/edit_cms',$aData);
		$this->load->view('admin/main/footer');
		break;
		
		case 0:
		$aData['id']=$id;
		$aData['class']="message_text_eror";
		$aData['msg']="Error : Updateion Faild";
		$this->load->view('admin/main/header');
		$aData['row'] =$this->MODEL->edit($id);
		$this->load->view('admin/dashboard/edit_cms',$aData);
		$this->load->view('admin/main/footer');
		break;
		
		case 2:
		$aData['id']=$id;
		$aData['class']="message_text_eror";
		$aData['msg']="Error : Title With This Already Exist";
		$this->load->view('admin/main/header');
		$aData['row'] =$this->MODEL->edit($id);
		$this->load->view('admin/dashboard/edit_cms',$aData);
		$this->load->view('admin/main/footer');
		break;
		default:
		$this->index();
		break;	
		}
		}
	}	
	
}

/* End of file Dashboard.php */
/* Location: ./application/controllers/admin/dashboard.php */
?>