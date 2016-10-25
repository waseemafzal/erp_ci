<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('contact_model','MODEL');
		
		if ($this->session->userdata('logged_in')==false and $this->session->userdata('type') != ADMIN)
			{
				header('location:'.base_url().'admin/');
			}
		
		 
	}

	function index()
	{
		$this->edit();
	}
	function view(){
	   
		$aData['data'] =$this->MODEL->get();
		$aData['tblName']="tbl_contact";
		$this->load->view('admin/main/header');
		$this->load->view('admin/contact/view_contact',$aData);
		$this->load->view('admin/main/footer');
	}
	function editHeader(){
	   
	$aData['row'] =$this->MODEL->edit(1);
		$this->load->view('admin/main/header');
		$this->load->view('admin/contact/edit_header',$aData);
		$this->load->view('admin/main/footer');
	}
				
	function delete(){
	   
		$aUrl=$this->uri->uri_to_assoc(2);
		$result =$this->MODEL->delete($aUrl['id']);
		$aData['class']="message_text_suc";
		$aData['tblName']="tbl_contact";
		$aData['msg']="Sucess : Record Have been Deleted Sucessfully";
		$aData['data'] =$this->MODEL->get();
		$this->load->view('admin/main/header');  
		$this->load->view('admin/contact/view_contact',$aData);
		$this->load->view('admin/main/footer');
	}
				
	function edit(){
		$aData['row'] =$this->MODEL->edit(1);
		$this->load->view('admin/main/header');
		$this->load->view('admin/contact/edit_contact',$aData);
		$this->load->view('admin/main/footer');
	}		
	function update()
	{
	//$aUrl=$this->uri->uri_to_assoc(2);
	//$aData['id']=$aUrl['id'];
	$aContact = array();
	$this->load->library('form_validation');
	$this->form_validation->set_rules('corporate_office','CORPORATE OFFICE','trim|required|xss_clean|max_length[255]');
	$this->form_validation->set_rules('phone_number','Phone Number ','trim|required|xss_clean|min_length[1]|max_length[255]');
	$this->form_validation->set_rules('fax','Fax ','trim|required|xss_clean|min_length[1]|max_length[50]');
	$this->form_validation->set_rules('regional_office','Regional Address','trim|required|xss_clean|max_length[255]');
	$this->form_validation->set_rules('phone_number_regniol','phone Regniol','trim|required|xss_clean|min_length[1]|max_length[255]');
	if ($this->form_validation->run()==false){
	
	$aData['row'] =$this->MODEL->edit(1);
	$this->load->view('admin/main/header');
	$this->load->view('admin/contact/edit_contact',$aData); 
	$this->load->view('admin/main/footer');
	}else{
	
	
	$aContact['corporate_office'] = $this->input->post('corporate_office'); 
	$aContact['phone_number'] = $this->input->post('phone_number'); 
	$aContact['fax'] = $this->input->post('fax'); 
	$aContact['regional_office'] = $this->input->post('regional_office'); 
	$aContact['phone_number_regniol'] = $this->input->post('phone_number_regniol'); 
	$aContact['id'] = 1; 
	$result =$this->MODEL->update($aContact);
	switch($result){
	
	
	case 1:
	$aData['class']="message_text_suc";
	$aData['msg']="Sucess : Record Have been updated Succesfully ";
	$this->load->view('admin/main/header');
	$aData['row'] =$this->MODEL->edit(1);
	$this->load->view('admin/contact/edit_contact',$aData);
	$this->load->view('admin/main/footer');
	break;
	
	case 0:
	$aData['class']="message_text_eror";
	$aData['msg']="Error : Updateion Faild";
	$this->load->view('admin/main/header');
	$aData['row'] =$this->MODEL->edit(1);
	$this->load->view('admin/contact/edit_contact',$aData);
	$this->load->view('admin/main/footer');
	break;
	
	default:
	$this->index();
	break;	
	
	
	}
	}
	}
	function headerUpdate()
	{
	//$aUrl=$this->uri->uri_to_assoc(2);
	//$aData['id']=$aUrl['id'];
	$aContact = array();
	$this->load->library('form_validation');
	$this->form_validation->set_rules('header_contact_one','Contact one','trim|required|xss_clean|min_length[11]|max_length[20]');
	$this->form_validation->set_rules('header_contact_two','header contact two ','trim|required|xss_clean|min_length[11]|max_length[20]');
	if ($this->form_validation->run()==false){
	
	$aData['row'] =$this->MODEL->edit(1);
	$this->load->view('admin/main/header');
	$this->load->view('admin/contact/edit_header',$aData); 
	$this->load->view('admin/main/footer');
	}else{
	$aContact['header_contact_one'] = $this->input->post('header_contact_one'); 
	$aContact['header_contact_two'] = $this->input->post('header_contact_two'); 
	$aContact['id'] = 1; 
	$result =$this->MODEL->updateHeader($aContact);
	switch($result){
	
	
	case 1:
	$aData['class']="message_text_suc";
	$aData['msg']="Sucess : Record Have been updated Succesfully ";
	$this->load->view('admin/main/header');
	$aData['row'] =$this->MODEL->edit(1);
	$this->load->view('admin/contact/edit_header',$aData);
	$this->load->view('admin/main/footer');
	break;
	
	case 0:
	$aData['class']="message_text_eror";
	$aData['msg']="Error : Updateion Faild";
	$this->load->view('admin/main/header');
	$aData['row'] =$this->MODEL->edit(1);
	$this->load->view('admin/contact/edit_header',$aData);
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