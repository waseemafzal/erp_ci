<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employee_management extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('employee_model','MODEL');
		
		if ($this->session->userdata('logged_in')==false and $this->session->userdata('type') != ADMIN)
			{
				header('location:'.base_url().'admin/');
			}
		
		 
	}

	function add()
	{
		$this->load->view('admin/main/header');
		$this->load->view('admin/employee_management/add');
		$this->load->view('admin/main/footer');
	}
	
	
	function save()
	{
		  
	
		    $this->load->library('form_validation');
			
			$this->form_validation->set_rules('emp_name','Employee name','trim|required|xss_clean|min_length[1]|max_length[35]');
			if ($this->form_validation->run()==false){
					$this->load->view('admin/main/header');
					$this->load->view('admin/employee_management/add');
					$this->load->view('admin/main/footer');
			
			
			}else{
				extract($_POST);
				$data = array(
               'emp_name' => $emp_name
            );
			  $result =$this->MODEL->save($data);
			  switch($result){
				
					    case 2:
						$aData['class']="message_text_eror";
						$aData['msg']="Error : Title With This Already Exist";
						$this->load->view('admin/main/header');
						$this->load->view('admin/employee_management/add',$aData);
						$this->load->view('admin/main/footer');
						break;
						case 1:
						$aData['class']="message_text_suc";
						$aData['msg']="Sucess : Record Have beddn Succesfully Added";
						$this->load->view('admin/main/header');
						$this->load->view('admin/employee_management/add',$aData);
						$this->load->view('admin/main/footer');
						break;
							
						case 0:
						$aData['class']="message_text_eror";
						$aData['msg']="Error : Title With This Already Exist";
						$this->load->view('admin/main/header');
						$this->load->view('admin/employee_management/add',$aData);
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
					$aData['tblName']="tbl_employee";
					$this->load->view('admin/main/header');
					$this->load->view('admin/employee_management/view',$aData);
					$this->load->view('admin/main/footer');
				}
				
				function delete($id){
				   $result =$this->MODEL->delete($id);
					$aData['class']="message_text_suc";
					$aData['tblName']="tbl_employee";
					$aData['msg']="Sucess : Record Have beddn Deleted Sucessfully";
					$aData['data'] =$this->MODEL->get();
					$this->load->view('admin/main/header');  
					$this->load->view('admin/employee_management/view',$aData);
					$this->load->view('admin/main/footer');
				}
				
				function edit($id){
				    $aData['row'] =$this->MODEL->edit($id);
					$this->load->view('admin/main/header');
					$this->load->view('admin/employee_management/edit',$aData);
					$this->load->view('admin/main/footer');
				}		
		
		
		
			function update($id)
			{
				$this->load->library('form_validation');
				$this->form_validation->set_rules('emp_name','Emp name','trim|required|xss_clean|min_length[1]|max_length[35]');
				if ($this->form_validation->run()==false){
						
						$aData['row'] =$this->MODEL->edit($id);
						$this->load->view('admin/main/header');
						$this->load->view('admin/employee_management/edit',$aData); 
						$this->load->view('admin/main/footer');
				}else{
				 // $aData['row'] =$this->MODEL->edit($id);
				  $result =$this->MODEL->update($this->input->post('emp_name'),$id);
				  
				  switch($result){
					
						   
							case 1:
							$aData['class']="message_text_suc";
							$aData['msg']="Sucess : Record Have been updated Succesfully ";
							$this->load->view('admin/main/header');
							$aData['row'] =$this->MODEL->edit($id);
							$this->load->view('admin/employee_management/edit',$aData);
							$this->load->view('admin/main/footer');
							break;
								
							case 0:
							$aData['class']="message_text_eror";
							$aData['msg']="Error : Updateion Faild";
							$this->load->view('admin/main/header');
							$aData['row'] = $this->MODEL->edit($id);
							$this->load->view('admin/employee_management/edit',$aData);
							$this->load->view('admin/main/footer');
							break;
							
							case 2:
							$aData['class']="message_text_eror";
							$aData['msg']="Error : Something Went Wrong, try again";
							$this->load->view('admin/main/header');
							$aData['row'] =$this->MODEL->edit($id);
							$this->load->view('admin/employee_management/edit',$aData);
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