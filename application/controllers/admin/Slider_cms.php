<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Slider_cms extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Slider_cms_model','MODEL');
		if ($this->session->userdata('logged_in')==false and $this->session->userdata('type') != ADMIN)
			{
				header('location:'.base_url().'admin/');
			}
	}

	function view(){
		$aData['data'] =$this->MODEL->get();
		$this->load->view('admin/main/header');
		$this->load->view('admin/slider_cms/view',$aData);
		$this->load->view('admin/main/footer');
	}
	function save()
	{
		extract($_POST);
		
		if($id==''){
			$id=0;
			//echo $id;
			}
		/*echo '<pre>';
		print_r($_POST);
		die('haaaaaaaemaaaaaaaaai');*/
		$this->load->library('form_validation');
		$this->form_validation->set_rules('title','title ','trim|required|xss_clean|min_length[1]');
		$this->form_validation->set_rules('description','Description ','trim|required|xss_clean|min_length[1]');
		$this->form_validation->set_rules('title_ar','title arabic ','trim|required|xss_clean|min_length[1]');
		$this->form_validation->set_rules('description_ar','Description arabic','trim|required|xss_clean|min_length[1]');
		if ($this->form_validation->run()==false){
		$this->load->view('admin/main/header');
		$this->load->view('admin/slider_cms/add');
		$this->load->view('admin/main/footer');
		
		}else{
							$description =	mysql_escape_string($description);
		$description_ar =	mysql_escape_string($description_ar);

				$data = array(
				
	'id' => $id ,
	'title' => $title ,
	'description' => $description,
	'title_ar' => $title_ar,
	'description_ar' => $description_ar
	);

		  $result =$this->MODEL->save($data);
		  switch($result){
			case 2:
			$aData['class']="message_text_eror";
			$aData['msg']="Error : Title With This Already Exist";
			$this->load->view('admin/main/header');
			$this->load->view('admin/slider_cms/add',$aData);
			$this->load->view('admin/main/footer');
			break;
			case 1:
			$aData['class']="message_text_suc";
			$aData['msg']="Sucess : Record Have been Succesfully Added";
			$this->load->view('admin/main/header');
			$this->load->view('admin/slider_cms/add',$aData);
			$this->load->view('admin/main/footer');
			break;
			case 0:
			$aData['class']="message_text_eror";
			$aData['msg']="Error : Something went wrong,try again";
			$this->load->view('admin/main/header');
			$this->load->view('admin/slider_cms/add',$aData);
			$this->load->view('admin/main/footer');
			break;
			default:
			$this->view();
			break;	
			}
		}
	}
	function update()
	{
		
    	$this->load->library('form_validation');
		$this->form_validation->set_rules('title','title ','trim|required|xss_clean|min_length[1]');
		$this->form_validation->set_rules('description','Description ','trim|required|xss_clean|min_length[1]');
		if ($this->form_validation->run()==false){
		$this->load->view('admin/main/header');
		$this->load->view('admin/slider_cms/edit');
		$this->load->view('admin/main/footer');
		}else{
		extract($_POST);
						$description =	mysql_escape_string($description);
		$description_ar =	mysql_escape_string($description_ar);

		$result =$this->MODEL->update($title,$title_ar,$description,$description_ar,$id);
			switch($result){
			case 1:
		
			$aData['class']="message_text_suc";
			 $aData['msg']="Sucess : Record Have been Succesfully updated";
			$aData['row'] =$this->MODEL->edit($id);
			$this->load->view('admin/main/header');
			$this->load->view('admin/slider_cms/edit',$aData);
			$this->load->view('admin/main/footer');
			break;
			case 0:
			$aData['class']="message_text_eror";
			$aData['msg']="Error : Something went wrong,try again";
			$this->load->view('admin/main/header');
			$this->load->view('admin/slider_cms/edit',$aData);
			$this->load->view('admin/main/footer');
			break;
			default:
			$this->edit($id);
			break;	
			}
		}
	
	}
		function edit($id)
		{
			$aData['row'] =$this->MODEL->edit($id);
			$this->load->view('admin/main/header');
			$this->load->view('admin/slider_cms/edit',$aData);
			$this->load->view('admin/main/footer');
		}
		function add($id)
		{
			$aData['id']=$id; 
			$this->load->view('admin/main/header');
			$this->load->view('admin/slider_cms/add',$aData);
			$this->load->view('admin/main/footer');
		}
		function delete($id){
		$result =$this->MODEL->delete($id);
		$aData['class']="message_text_suc";
		$aData['msg']="Sucess : Record Have been Deleted Sucessfully";
		$aData['data'] =$this->MODEL->get();
		$this->load->view('admin/main/header');  
		$this->load->view('admin/slider_cms/view',$aData);
		$this->load->view('admin/main/footer');
	}
}

/* End of file tips.php */
/* Location: ./application/controllers/admin/slider_cms.php */
?>