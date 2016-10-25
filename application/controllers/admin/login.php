<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		
		
		
		if ($this->session->userdata('logged_in')==true and  $this->session->userdata('type') == ADMIN)
			{
				header('location:'.base_url().'admin/dashboard');
			}
		
		 
	}

	function index()
	{
	$this->load->view('admin/main/header_admin');
		$this->load->view('admin/user/login');
		$this->load->view('admin/main/footer');
	}
	
	 
	 function isvalid()
	{
		
	        $this->load->library('form_validation');
			$this->form_validation->set_rules('email','Email','trim|required|valid_email|xss_clean|min_length[5]|max_length[255]');
			$this->form_validation->set_rules('password','Password','trim|required|xss_clean|min_length[1]|max_length[10]');
			
			
			if ($this->form_validation->run()==false){
					
					//$this->load->view('admin/main/header_admin');
					$this->load->view('admin/user/login');
					$this->load->view('admin/main/footer');
			
			
			}else{
				
			  $result =$this->user_model->_isValidAdmin($this->input->post('email'),$this->input->post('password'));
			  if($result->num_rows()>0){
				  
				    $userData=$result->row();
					$userData = array(
						'admin_id'  => $userData->id,
						'user_name_admin'  => $userData->display_name,
						'type'  => $userData->type,
						'logged_in' => true
					);
					
					$this->session->set_userdata($userData);
				     $result=1;
				}else{
				      $result=0;
				}
			   
			   switch($result){
				
					    case 1:
						header('location:'.base_url().'admin/dashboard');
                        break;
							
						case 0:
						$aData['msg']="Error : Not Valid Parametr";
						//$this->load->view('admin/main/header_admin');
						$this->load->view('admin/user/login',$aData);
						$this->load->view('admin/main/footer');
						break;
						default:
						$this->index();
						break;	
						
					
				}
			}
		}
	
	  
	   function logout(){
	        $result =$this->user_model->_alogout();
			header('location:'.base_url().'admin/');
		}
		
		
		
	
		
		
		
	
}

/* End of file Dashboard.php */
/* Location: ./application/controllers/dashboard.php */
?>