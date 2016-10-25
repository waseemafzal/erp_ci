<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class orderDetail extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('orderdetail_model','MODEL');
		$this->load->model('location_model');
		$this->load->model('employee_model');
		
		if ($this->session->userdata('logged_in')==false and $this->session->userdata('type') != ADMIN)
			{
				header('location:'.base_url().'admin/');
			}
		
		 
	}

	function index()
	{
		$this->load->view('admin/main/header');
		$this->load->view('admin/orderDetail/view');
		$this->load->view('admin/main/footer');
	}
	 function detail($id){
				   
					
					$aData['data'] =$this->MODEL->vieworderDetail($id);
				   $this->load->view('admin/main/header');
					$this->load->view('admin/orderDetail/view_order_detail_one',$aData);
					$this->load->view('admin/main/footer');
				}
	function add()
	{
		$this->load->view('admin/main/header');
		$this->load->view('admin/orderDetail/add');
		$this->load->view('admin/main/footer');
	}
	
	
	function save()
	{
	
		    $this->load->library('form_validation');
			$this->form_validation->set_rules('cat_id','Company Name','trim|required|xss_clean|min_length[1]|max_length[35]');
			$this->form_validation->set_rules('subcat_id','Customer Name','trim|required|xss_clean|min_length[1]|max_length[35]');
			$this->form_validation->set_rules('emp_id','Employee Name','trim|required|xss_clean|min_length[1]|max_length[50]');
			$this->form_validation->set_rules('date','Date','trim|required|xss_clean|min_length[1]|max_length[50]');
			
			
			if ($this->form_validation->run()==false){
					$aData['categories'] =$this->location_model->getcategory();
					$aData['subcategories'] =$this->location_model->getsubcategory();
					$aData['emp_data'] =$this->employee_model->get();

					$this->load->view('admin/main/header');
					$this->load->view('admin/orderDetail/add',$aData);
					$this->load->view('admin/main/footer');
			
			
			}else{
				extract($_POST);
				$data = array(
	'emp_id' => $emp_id,
	'user_id' => $this->session->userdata('admin_id'),
	'order_date' => $date ,
	'customer_id' => $subcat_id
	);
			  $result =$this->MODEL->saveOrder($data,$_POST);
			  
			  switch($result){
				
					    case 2:
						$aData['class']="message_text_eror";
						$aData['msg']="Error : Title With This Already Exist";
					$aData['categories'] =$this->location_model->getcategory();
					$aData['subcategories'] =$this->location_model->getsubcategory();
					$aData['emp_data'] =$this->employee_model->get();
						$this->load->view('admin/main/header');
						$this->load->view('admin/orderDetail/add',$aData);
						$this->load->view('admin/main/footer');
						break;
						case 1:
					$aData['categories'] =$this->location_model->getcategory();
					$aData['subcategories'] =$this->location_model->getsubcategory();
					$aData['emp_data'] =$this->employee_model->get();
						$aData['class']="message_text_suc";
						$aData['msg']="Sucess : Record Have beddn Succesfully Added";
						$this->load->view('admin/main/header');
						$this->load->view('admin/orderDetail/add',$aData);
						$this->load->view('admin/main/footer');
						break;
							
						case 0:
						$aData['class']="message_text_eror";
					$aData['categories'] =$this->location_model->getcategory();
					$aData['subcategories'] =$this->location_model->getsubcategory();
					$aData['emp_data'] =$this->employee_model->get();
						$aData['msg']="Error : Title With This Already Exist";
						$this->load->view('admin/main/header');
						$this->load->view('admin/orderDetail/add',$aData);
						$this->load->view('admin/gameboard_management/sub_category',$aData);
		
						$this->load->view('admin/main/footer');
						break;
						default:
						$this->index();
						break;	
						
					
				}
			}
		}
		
		
				function vieworderlist(){
				   $aData['tblName']="order";
				  	$aData['data'] =$this->MODEL->vieworderlist();
					$this->load->view('admin/main/header');
					$this->load->view('admin/orderDetail/vieworderlist',$aData);
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
					$this->load->view('admin/orderDetail/view_category',$aData);
					$this->load->view('admin/main/footer');
				}
				
				function edit(){
				    
					$aUrl=$this->uri->uri_to_assoc(2);
					$aData['row'] =$this->MODEL->edit($aUrl['id']);
					$aData['count_menu_items'] = $this->MODEL->countMenuItems();
					$this->load->view('admin/main/header');
					$this->load->view('admin/orderDetail/edit_category',$aData);
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
					$this->load->view('admin/orderDetail/edit_category',$aData); 
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
						$this->load->view('admin/orderDetail/edit_category',$aData);
						$this->load->view('admin/main/footer');
						break;
							
						case 0:
						$aData['class']="message_text_eror";
						$aData['msg']="Error : Updateion Faild";
						$this->load->view('admin/main/header');
						$aData['row'] =$this->MODEL->edit($aUrl['id']);
						$aData['count_menu_items'] = $this->MODEL->countMenuItems();
						$this->load->view('admin/orderDetail/edit_category',$aData);
						$this->load->view('admin/main/footer');
						break;
						
						case 2:
						$aData['class']="message_text_eror";
						$aData['msg']="Error : Something Went Wrong, try again";
						$this->load->view('admin/main/header');
						$aData['row'] =$this->MODEL->edit($aUrl['id']);
						$aData['count_menu_items'] = $this->MODEL->countMenuItems();
						$this->load->view('admin/orderDetail/edit_category',$aData);
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