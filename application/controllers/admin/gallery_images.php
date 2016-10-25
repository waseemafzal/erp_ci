<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gallery_images extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('gallery_images_model','MODAL');
		$this->load->model('gallery_model','MODAL_');
		
		if ($this->session->userdata('logged_in')==false and $this->session->userdata('type') != ADMIN)
			{
				header('location:'.base_url().'admin/');
			}
		 
	}

	function index()
	{
		
		$this->session->set_userdata('back_link',$_SERVER['HTTP_REFERER']);
	    $aData['back_link']  =  $this->session->userdata('back_link');
		$aUrl=$this->uri->uri_to_assoc(2);
		$aData['url'] = $aUrl['url'];
		$aData['data'] =$this->MODAL_->getGallerySpecifications($aUrl['id']);
		$aData['upload_count'] =$this->MODAL->getGalleryUploadedImagesCount($aUrl['id']);
		$aData['full_upload_msg']= 'Images Are Complete';
		$this->load->view('admin/main/header');
		$this->load->view('admin/gallery_images/gallery_images',$aData);
		$this->load->view('admin/main/footer');
	}
	
	
	function save()
	{
		
	        $aData['back_link']  =  $this->session->userdata('back_link');	
		    if($this->input->post('submit_btn')){
					
				/****************************************************************************************************************************/
					$count =sizeof($_FILES);
					$config['upload_path']   =   "uploads/gallery/"; /* NB! create this dir! */
					$config['allowed_types'] = ALLOWED_TYPES;
					$config['max_size']      =   $this->input->post('max_size');
					$config['max_width']     =   $this->input->post('max_width');
					$config['max_height']    =   $this->input->post('max_height');
				//	$config['file_name']  =    time().'.jpg'; 
				  
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
				  for($i = 1; $i <=$count; $i++) {
				   
						$upload = $this->upload->do_upload('image'.$i);
					 
				   
					if($upload === FALSE) continue; 
					
					$data = $this->upload->data();
					$uploadedFiles[$i] = $data;
					
					$result =$this->MODAL->save($this->input->post('id'),$data['file_name'],$this->input->post('banner_url'.$i));
					if($data['is_image'] == 1) {
							$configThumb['source_image'] = $data['full_path'];
							$this->image_lib->initialize($configThumb);
							$this->image_lib->resize();
					}
				  }
				    
				
 
				
				/****************************************************************************************************************************/
				    switch($result){
				
					   
						case 1:
						$aData['class']="message_text_suc";
						$aData['msg']="Sucess : Images Have been Added To Selected Albums Successfully";
						
						$aUrl=$this->uri->uri_to_assoc(2);
						$aData['url'] = $aUrl['url'];
						$aData['data'] =$this->MODAL_->getGallerySpecifications($aUrl['id']);
					    $aData['upload_count'] =$this->MODAL->getGalleryUploadedImagesCount($aUrl['id']);
						$aData['full_upload_msg']= 'Images Are Complete'; 
						$this->load->view('admin/main/header');
						$this->load->view('admin/gallery_images/gallery_images',$aData);
						$this->load->view('admin/main/footer');
						
						
						break;
							
						case 0:
							
						$aData['class']="message_text_eror";
						$aData['msg']="Error : Operation Faild Oops!";
						
						$aUrl=$this->uri->uri_to_assoc(2);
						$aData['url'] = $aUrl['url'];
						$aData['data'] =$this->MODAL_->getGallerySpecifications($aUrl['id']);
					    $aData['upload_count'] =$this->MODAL->getGalleryUploadedImagesCount($aUrl['id']);
						$aData['full_upload_msg']= 'Images Are Complete'; 
						$this->load->view('admin/main/header');
						$this->load->view('admin/gallery_images/gallery_images',$aData);
						$this->load->view('admin/main/footer');
						break;
						
						
						case 2:
							
						$aData['class']="message_text_eror";
						$aData['msg']="Error : Something Went Wrong, it may be image size or something else, try again!!";
						$aUrl=$this->uri->uri_to_assoc(2);
						$aData['url'] = $aUrl['url'];
						$aData['data'] =$this->MODAL_->getGallerySpecifications($aUrl['id']);
					    $aData['upload_count'] =$this->MODAL->getGalleryUploadedImagesCount($aUrl['id']);
						$aData['full_upload_msg']= 'Images Are Complete'; 
						
						$this->load->view('admin/main/header');
						$this->load->view('admin/gallery_images/gallery_images',$aData);
						$this->load->view('admin/main/footer');
						break;
						
						
						default:
						
						$aData['class']="message_text_eror";
						$aData['msg']="Error : Something Went Wrong!";
						$aUrl=$this->uri->uri_to_assoc(2);
						$aData['url'] = $aUrl['url'];
						$aData['data'] =$this->MODAL_->getGallerySpecifications($aUrl['id']);
					    $aData['upload_count'] =$this->MODAL->getGalleryUploadedImagesCount($aUrl['id']);
						$aData['full_upload_msg']= 'Images Are Complete'; 
						$this->load->view('admin/main/header');
						$this->load->view('admin/gallery_images/gallery_images',$aData);
						$this->load->view('admin/main/footer');
						break;	
						
				}
			}else
						$this->index();
				
			    
			//}
			
		}
				function view(){
					
					$this->session->set_userdata('back_link',$_SERVER['HTTP_REFERER']);
	                $aData['back_link']  =  $this->session->userdata('back_link');
					$aUrl=$this->uri->uri_to_assoc(2);
					$aData['url']  = $aUrl['url'];
					$aData['title'] =$this->MODAL_->getTitle($aUrl['id']);
				    $aData['data'] =$this->MODAL->get($aUrl['id']);
					$this->load->view('admin/main/header');
					$this->load->view('admin/gallery_images/view_gallery_images',$aData);
					$this->load->view('admin/main/footer');
				}
				
				function delete_gallery(){
				   
				  	$aUrl=$this->uri->uri_to_assoc(2);
					$result =$this->MODAL_->delete($aUrl['id']);
					$aData['class']="message_text_suc";
					$aData['msg']="Sucess : Record Have beddn Deleted Sucessfully";
					$aData['data'] =$this->MODAL_->get();
					$this->load->view('admin/main/header');
					$this->load->view('admin/gallery/view_gallery',$aData);
					$this->load->view('admin/main/footer');
				}
				
				function edit(){
					$this->session->set_userdata('back_link',$_SERVER['HTTP_REFERER']);
					$aData['back_link']  =  $this->session->userdata('back_link');
					$aUrl=$this->uri->uri_to_assoc(2);
					$aData['url']  = $aUrl['url'];
					$aData['data'] =$this->MODAL_->getGallerySpecifications($aUrl['g_id']);
					$aData['image_url'] =$this->MODAL->edit($aUrl['id']);
					$aData['id'] = $aUrl['id'];
					$this->load->view('admin/main/header');
					$this->load->view('admin/gallery_images/edit_gallery_images',$aData);
					$this->load->view('admin/main/footer');
				}		
		
		
		
		function update()
		{
			

			$aUrl=$this->uri->uri_to_assoc(2);
			 $id = $aUrl['id'];
		
			$alt_text= $this->input->post('alt_text');
			$alt_text_ar= $this->input->post('alt_text_ar');
			$aData['back_link']  =  $this->session->userdata('back_link');
			if($this->input->post('upload_hidden') ==1){
				
					/**********************************************************************************************/
			$count =sizeof($_FILES);
			$config['upload_path']   =   "uploads/gallery/"; /* NB! create this dir! */
			$config['allowed_types'] = ALLOWED_TYPES;
			$config['max_width']     =   '844';
			$config['max_height']    =   '345';
			$aData['max_size']      =   '2000';
		
			//	$config['file_name']  =    time().'.jpg'; 
			//die('rikkkkkkk');
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
				  //$result=2;
					for($i = 1; $i <= $count; $i++) {
					$upload = $this->upload->do_upload('image'.$i);
					if($upload === FALSE) continue; 
					$data = $this->upload->data();
					$uploadedFiles[$i] = $data;
					
					$result =$this->MODAL->update($id,$data['file_name'],$this->input->post('banner_url'),$alt_text,$alt_text_ar);
					if($data['is_image'] == 1) {
					$configThumb['source_image'] = $data['full_path'];
					$this->image_lib->initialize($configThumb);
					$this->image_lib->resize();
					}
				  }
				    echo 'result is : '.$result;
					/**********************************************************************************************/
		     switch($result){
						case 1:
						$aData['class']="message_text_suc";
						$aData['msg']="Sucess : Images Have been Upload Successfully";
						$aUrl=$this->uri->uri_to_assoc(2);
						$aData['url']  = $aUrl['url'];
						$aData['data'] =$this->MODAL_->getGallerySpecifications($aUrl['g_id']);
						$aData['image_url']  =$this->MODAL->edit($aUrl['id']);
						$aData['id'] = $aUrl['id'];
					    $aData['full_upload_msg']= 'Images Are Complete'; 
						$this->load->view('admin/main/header');
						$this->load->view('admin/gallery_images/edit_gallery_images',$aData);
						$this->load->view('admin/main/footer');
						break;
							
						case 0:
							
						$aData['class']="message_text_eror";
						$aData['msg']="Error : Operation Faild Oops!";
						$aUrl=$this->uri->uri_to_assoc(2);
						$aData['url']  = $aUrl['url'];
						$aData['data'] =$this->MODAL_->getGallerySpecifications($aUrl['g_id']);
						$aData['image_url']  =$this->MODAL->edit($aUrl['id']);
						$aData['id'] = $aUrl['id'];
					    $aData['full_upload_msg']= 'Images Are Complete'; 
						$this->load->view('admin/main/header');
						$this->load->view('admin/gallery_images/edit_gallery_images',$aData);
						$this->load->view('admin/main/footer');
						break;
						
						
						case 2:
						$aData['class']="message_text_eror";
						$aData['msg']="Error : Something Went Wrong, it may be image size or something else, try again!!";
						$aUrl=$this->uri->uri_to_assoc(2);
						$aData['url']  = $aUrl['url'];
						$aData['data'] =$this->MODAL_->getGallerySpecifications($aUrl['g_id']);
						$aData['image_url']  =$this->MODAL->edit($aUrl['id']);
						$aData['id'] = $aUrl['id'];
					    $aData['full_upload_msg']= 'Images Are Complete'; 
						$this->load->view('admin/main/header');
						$this->load->view('admin/gallery_images/edit_gallery_images',$aData);
						$this->load->view('admin/main/footer');
						break;
						
						
						default:
						
						$aData['class']="message_text_eror";
						$aData['msg']="Error : Something Went Wrong!";
						$aUrl=$this->uri->uri_to_assoc(2);
						$aData['url']  = $aUrl['url'];
						$aData['data'] =$this->MODAL_->getGallerySpecifications($aUrl['g_id']);
						$aData['image_url']  =$this->MODAL->edit($aUrl['id']);
						$aData['id'] = $aUrl['id'];
					    $aData['full_upload_msg']= 'Images Are Complete'; 
						$this->load->view('admin/main/header');
						$this->load->view('admin/gallery_images/edit_gallery_images',$aData);
						$this->load->view('admin/main/footer');
						break;	
						
					}
			   }
		
		    else{
				   $result   =  $this->MODAL->update($this->input->post('id'),$this->input->post('hidden_img'),$this->input->post('banner_url'),$alt_text,$alt_text_ar);
					
					
					 switch($result){
				
					   
						case 1:
							$aData['class']="message_text_suc";
							$aData['msg']="Sucess : Record Updated Successfull";
							$aUrl=$this->uri->uri_to_assoc(2);
							$aData['url']  = $aUrl['url'];
							$aData['data'] =$this->MODAL_->getGallerySpecifications($aUrl['g_id']);
							$aData['image_url']  =$this->MODAL->edit($aUrl['id']);
							$aData['alt_text_ar']  =$this->MODAL->getalt_text_ar($aUrl['id']);
							$aData['id'] = $aUrl['id'];
							$aData['full_upload_msg']= 'Images Are Complete'; 
							$this->load->view('admin/main/header');
							$this->load->view('admin/gallery_images/edit_gallery_images',$aData);
							$this->load->view('admin/main/footer');
						break;
							
						case 0:
							$aData['class']="message_text_eror";
							$aData['msg']="Error : Something Went Wrong!";
							$aUrl=$this->uri->uri_to_assoc(2);
							$aData['url']  = $aUrl['url']; 
							$aData['data'] =$this->MODAL_->getGallerySpecifications($aUrl['g_id']);
							$aData['image_url']  =$this->MODAL->edit($aUrl['id']);
							$aData['id'] = $aUrl['id'];
							$this->load->view('admin/main/header');
							$this->load->view('admin/gallery_images/edit_gallery_images',$aData);
							$this->load->view('admin/main/footer');
					}
				}
		
		
				
		}
		
		
	
}

/* End of file Dashboard.php */
/* Location: ./application/controllers/dashboard.php */
?>