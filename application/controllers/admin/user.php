<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('user_model','MODEL');
		 
		if ($this->session->userdata('logged_in')==false and $this->session->userdata('type') != ADMIN)
			{
				header('location:'.base_url().'admin/');
			}
		
		 
	}

function sendMailtoSelected(){
		extract($_POST);
		$template_to_send =$this->MODEL->getTemplate($template);
		if(is_array($_POST['users_list'])  && count($_POST) > 1){
			$config = Array(
			'mailtype' => 'html',
			'charset' => 'iso-8859-1',
			'wordwrap' => TRUE);
			$this->load->library('email', $config);
			foreach($_POST['users_list'] as $key=>$address){
				$this->email->set_newline("\r\n");
				$this->email->from('no-reply@etlbna.com'); // change it to yours
				$this->email->to($address);// change it to yours
				$this->email->subject('web visitor');
				$this->email->reply_to($email, 'no-reply');
				$this->email->message($template_to_send);
				$this->email->send();
			}
		}
		$aData['data'] =$this->MODEL->get();
		$aData['tblName']="tbl_user";
		$aData['msg']="Newsletter sent successfully to the selected users!";
		$aData['class']="message_text_suc";
		$this->load->view('admin/main/header');
		$this->load->view('admin/user/view_user',$aData);
		$this->load->view('admin/main/footer');
}
	
	function index()
	{
		
		$this->load->view('admin/main/header');
		$this->load->view('admin/user/user');
		$this->load->view('admin/main/footer');
	}
	
	
	function save()
	{
		
	
		    $this->load->library('form_validation');
			
			$this->form_validation->set_rules('title','Title','trim|required|xss_clean|min_length[1]|max_length[35]');
			$this->form_validation->set_rules('title_ar','Title Arabic','trim|required|xss_clean|min_length[1]|max_length[50]');
			$this->form_validation->set_rules('description','Description ','trim|required|xss_clean|min_length[1]');
			$this->form_validation->set_rules('description_ar','Description Arabic','trim|required|xss_clean|min_length[1]');
			
			
			if ($this->form_validation->run()==false){
					$this->load->view('admin/main/header');
					$this->load->view('admin/user/user');
					$this->load->view('admin/main/footer');
			
			
			}else{
				
		  $result =$this->MODEL->save($this->input->post('title'),$this->input->post('title_ar'),$this->input->post('description'),$this->input->post('description_ar'));
			  
			  switch($result){
				
					    case 2:
						$aData['class']="message_text_eror";
						$aData['msg']="Error : Title With This Already Exist";
						$this->load->view('admin/main/header');
						$this->load->view('admin/user/user',$aData);
						$this->load->view('admin/main/footer');
						break;
						case 1:
						$aData['class']="message_text_suc";
						$aData['msg']="Sucess : Record Have been Succesfully Added";
						$this->load->view('admin/main/header');
						$this->load->view('admin/user/user',$aData);
						$this->load->view('admin/main/footer');
						break;
							
						case 0:
						$aData['class']="message_text_eror";
						$aData['msg']="Error : Something went wrong,try again";
						$this->load->view('admin/main/header');
						$this->load->view('admin/user/user',$aData);
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
					$aData['tblName']="tbl_user";
					$this->load->view('admin/main/header');
					$this->load->view('admin/user/view_user',$aData);
					$this->load->view('admin/main/footer');
				}
				
				function delete(){
				   
				  	$aUrl=$this->uri->uri_to_assoc(2);
					$result =$this->MODEL->delete($aUrl['id']);
					$aData['class']="message_text_suc";
					$aData['tblName']="tbl_user";
					$aData['msg']="Sucess : Record Have been Deleted Sucessfully";
					$aData['data'] =$this->MODEL->get();
					$this->load->view('admin/main/header');  
					$this->load->view('admin/user/view_user',$aData);
					$this->load->view('admin/main/footer');
				}
				
				function edit(){
				   $aData['row'] =$this->MODEL->edit(ADMIN);
					$this->load->view('admin/main/header');
					$this->load->view('admin/user/edit_user',$aData);
					$this->load->view('admin/main/footer');
				}		
		
		
		
		function update()
		{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('username','Username','trim|required|xss_clean|min_length[1]|max_length[35]');
			$this->form_validation->set_rules('password','password','trim|required|xss_clean|min_length[1]|max_length[50]');
			if ($this->form_validation->run()==false){
					
					$aData['row'] =$this->MODEL->edit(ADMIN);
					$this->load->view('admin/main/header');
					$this->load->view('admin/user/edit_user',$aData); 
					$this->load->view('admin/main/footer');
			}else{
			  $aData['row'] =$this->MODEL->edit(ADMIN);
		      $result =$this->MODEL->update($this->input->post('username'),$this->input->post('password'));
			  
			  switch($result){
				
					   
						case 1:
						$aData['class']="message_text_suc";
						$aData['msg']="Sucess : Record Have been updated Succesfully ";
						$this->load->view('admin/main/header');
						$aData['row'] =$this->MODEL->edit(ADMIN);
						$this->load->view('admin/user/edit_user',$aData);
						$this->load->view('admin/main/footer');
						break;
							
						case 0:
						$aData['class']="message_text_eror";
						$aData['msg']="Error : Updateion Faild";
						$this->load->view('admin/main/header');
						$aData['row'] =$this->MODEL->edit(ADMIN);
						$this->load->view('admin/user/edit_user',$aData);
						$this->load->view('admin/main/footer');
						break;
						
						case 2:
						$aData['class']="message_text_eror";
						$aData['msg']="Error : Title With This Already Exist";
						$this->load->view('admin/main/header');
						$aData['row'] =$this->MODEL->edit(ADMIN);
						$this->load->view('admin/user/edit_user',$aData);
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