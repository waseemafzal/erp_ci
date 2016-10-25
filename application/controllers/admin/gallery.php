<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gallery extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('gallery_model','MODEL');
		$this->load->model('gallery_images_model','IMAGES_MODEL');
		//$this->
		if ($this->session->userdata('logged_in')==false and $this->session->userdata('type') != ADMIN)
			{
				header('location:'.base_url().'admin/');
			}
		 
	}

	function index()
	{
		
		
		 $aUrl=$this->uri->uri_to_assoc(2);
		$type = $aUrl['type'];
		 $this->view($aUrl['id'],$aUrl['url']);
		 
		//$this->load->view('main/header');
		//$this->load->view('gallery/gallery');
		//$this->load->view('main/footer');
	}
	
	
	function save()
	{
		 	$aUrl=$this->uri->uri_to_assoc(2);
			$this->MODEL->getHeading($type);
			$aData['heading'] = $this->MODEL->_pageHeading;
			$aData['data'] =$this->MODEL->get($type);
			$type = $aUrl['type'];
		    $this->load->library('form_validation');
			$this->form_validation->set_rules('title','Title','trim|required|xss_clean|max_length[100]');
			
			if ($this->form_validation->run()==false){
					$this->load->view('admin/main/header');
					$aData['type']=$type;
					$this->MODEL->getHeading($type);
					$aData['heading'] = $this->MODEL->_pageHeading;
					$this->load->view('admin/gallery/gallery',$aData);
					$this->load->view('admin/main/footer');
			
			
			}else{
						 
				
				$title = $this->input->post('title');
				$title_ar = $this->input->post('title_ar');
				$type = $this->input->post('type');
				$count = $this->input->post('count');
				
				 $result =$this->MODEL->save($title,$title_ar,$type,$count);
			  
			  switch($result){
				
					    case 2:
						
						$aData['class']="message_text_eror";
						$aData['msg']="Error : Title With This Already Exist";
						$this->load->view('admin/main/header');
						$aData['type']=$type;
		 				$this->load->view('admin/gallery/gallery',$aData);
						$this->load->view('admin/main/footer');
						break;
						case 1:
						$aData['class']="message_text_suc";
						$this->MODEL->getHeading($type);
						$aData['heading'] = $this->MODEL->_pageHeading;
						$aData['data'] =$this->MODEL->get($type);
						$aData['msg']="Sucess : Record Have been Succesfully Added";
						$aData['type']=$type;
		 				$this->load->view('admin/main/header');
						$this->load->view('admin/gallery/gallery',$aData);
						$this->load->view('admin/main/footer');
						
						break;
							
						case 0:
						$aData['class']="message_text_eror";
						$aData['msg']="Error : Operation Faild";
						$aData['type']=$type;
		 				$this->load->view('admin/main/header');
						$this->load->view('admin/gallery/gallery',$aData);
						$this->load->view('admin/main/footer');
						break;
						default:
						$this->index();
						break;	
						
					
				}
			}
		}
		
		
				function view($id,$url){
				
				  	
					$this->MODEL->getHeading($id);
					$aData['heading'] = $this->MODEL->_pageHeading;
					$aData['data'] =$this->MODEL->get($id);
					$aData['url'] =$url;
					$aData['type'] =$id; 
					
					$this->load->view('admin/main/header');
					$this->load->view('admin/gallery/view_gallery',$aData);
					$this->load->view('admin/main/footer');
				}
				
				function delete(){
				   
				  	$aUrl=$this->uri->uri_to_assoc(2);
					$type = $aUrl['type'];
					$aData['type']= $type;
					$result =$this->MODEL->delete($aUrl['id']);
					$result2 =$this->IMAGES_MODEL->delete_images($aUrl['id']);
					$aData['class']="message_text_suc";
					$aData['msg']="Sucess : Record Have beddn Deleted Sucessfully";
					$aData['data'] =$this->MODEL->get();
					$this->load->view('admin/main/header');
					$this->load->view('admin/gallery/view_gallery',$aData);
					$this->load->view('admin/main/footer');
				}
				
				function edit(){
				    
					$aUrl=$this->uri->uri_to_assoc(2);
					$type = $aUrl['type'];
					$aData['type']= $type;
					$aData['row'] =$this->MODEL->edit($aUrl['id']);
					$this->load->view('admin/main/header');
					$this->load->view('admin/gallery/edit_gallery',$aData);
					$this->load->view('admin/main/footer');
				}		
		
		
		
		function update()
		{
		
			$aUrl=$this->uri->uri_to_assoc(2);
			$this->MODEL->getHeading($type);
					$aData['heading'] = $this->MODEL->_pageHeading;
			$type = $aUrl['type'];
			$aData['type']= $type;
			$aData['id']=$aUrl['id'];
			$this->load->library('form_validation');
			$this->form_validation->set_rules('title','Title','trim|required|xss_clean|max_length[100]');
			if ($this->form_validation->run()==false){
					
					$aData['row'] =$this->MODEL->edit($aUrl['id']);
					$this->MODEL->getHeading($type);
					$aData['heading'] = $this->MODEL->_pageHeading;
					$this->load->view('admin/main/header');
					$this->load->view('admin/gallery/edit_gallery',$aData);
					$this->load->view('admin/main/footer');
			}else{
			  $aData['row'] =$this->MODEL->edit($aUrl['id']);
		      $result =$this->MODEL->update($this->input->post('title'),$this->input->post('title_ar'),$this->input->post('count'),$this->input->post('id'));
			  
			  switch($result){
				
					   
						case 1:
						$aData['class']="message_text_suc";
						$aData['msg']="Sucess : Record Have been updated Succesfully ";
						$this->MODEL->getHeading($type);
						$aData['heading'] = $this->MODEL->_pageHeading;
						$aData['data'] =$this->MODEL->get($type);
						$this->load->view('admin/main/header');
						$this->load->view('admin/gallery/view_gallery',$aData);
						$this->load->view('admin/main/footer');
						//redirect('/', 'refresh');
/*						$this->load->view('admin/main/header');
						$this->load->view('admin/gallery/edit_gallery',$aData);
						$this->load->view('admin/main/footer');
*/						break;
							
						case 0:
						$aData['class']="message_text_eror";
						$aData['msg']="Error : Updateion Faild";
						$this->load->view('admin/main/header');
						$this->load->view('admin/gallery/edit_gallery',$aData);
						$this->load->view('admin/main/footer');
						break;
						
						case 2:
						$aData['class']="message_text_eror";
						$aData['msg']="Error : Title With This Already Exist";
						$this->load->view('admin/main/header');
						$this->load->view('admin/gallery/edit_gallery',$aData);
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
/* Location: ./application/controllers/dashboard.php */
?>