<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Forget extends CI_Controller {

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
		//$this->load->view('admin/main/header_admin');
		$this->load->view('admin/user/forget');
		$this->load->view('admin/main/footer');
	}
	
	 
	
	  
	  
		
		
		
		
		/********************************Forget******************************/
		
		
	
		
		  function isvalidemail()
	    {
		
	        $this->load->library('form_validation');
			$this->form_validation->set_rules('email','Email','trim|required|valid_email|xss_clean|min_length[1]|max_length[50]');
			if ($this->form_validation->run()==false){
					
				//	$this->load->view('admin/main/header_admin');
					$this->load->view('admin/user/forget');
					$this->load->view('admin/main/footer');
			
			
			}else{
				
			    $result =$this->user_model->_isValidEmail($this->input->post('email'));
			 
			  
			   switch($result){
				
					    case 1:
						$aData['msg']="Sucess :Email containing Password sent your Email Address. ";
						$this->load->view('admin/user/forget',$aData);
						$this->load->view('admin/main/footer');
                        break;
							
						case 0:
						$aData['msg']="Error :This Email Not Exist In System";
						//$this->load->view('admin/main/header_admin');
						$this->load->view('admin/user/forget',$aData);
						$this->load->view('admin/main/footer');
						break;
						default:
						$this->index();
						break;	
						
					
				}
			}
		}
		/*****************************************************************************************/
		
		
		
	
}

/* End of file Dashboard.php */
/* Location: ./application/controllers/dashboard.php */
?>