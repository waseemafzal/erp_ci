<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Location extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('location_model','MODEL');
		$this->load->model('product_model');
		$this->load->model('employee_model');
		$this->load->helper('functions_helper');
		if ($this->session->userdata('logged_in')==false and $this->session->userdata('type') != ADMIN)
			{
				header('location:'.base_url().'admin/');
			}
	}

	function add()
	{	
	
		
		$this->load->view('admin/main/header');
		$this->load->view('admin/location/add_location');
		$this->load->view('admin/main/footer');
	}
	
	
	function save()
	{
		    $this->load->library('form_validation');
			$this->form_validation->set_rules('title','Title','trim|required|xss_clean|min_length[1]|max_length[35]');
			if ($this->form_validation->run()==false){
					$this->load->view('admin/main/header');
					$this->load->view('admin/location/add_location');
					$this->load->view('admin/main/footer');
			}else{
				extract($_POST); 
				$created_at= date('y-m-d H:i:s');
		$data = array(
		'title' => $title,
		'parent_id' => 0,
		'created_at' => $created_at,
		'status' => 1
		);
			  $result =$this->MODEL->save($data,$title);
			  switch($result){
					    case 2:
						$aData['class']="message_text_eror";
						$aData['msg']="Error : Title With This Already Exist";
						$this->load->view('admin/main/header');
						$this->load->view('admin/location/add_location',$aData);
						$this->load->view('admin/main/footer');
						break;
						case 1:
						$aData['class']="message_text_suc";
						$aData['msg']="Sucess : Record Have been Succesfully Added";
						$this->load->view('admin/main/header');
						$this->load->view('admin/location/add_location',$aData);
						$this->load->view('admin/main/footer');
						break;
							
						case 0:
						$aData['class']="message_text_eror";
						$aData['msg']="Error : Title With This Already Exist";
						$this->load->view('admin/main/header');
						$this->load->view('admin/location/add_location',$aData);
						$this->load->view('admin/main/footer');
						break;
						default:
						$this->index();
						break;	
				}
			}
		}
				function view(){
				 
				  	$aData['tblName'] ='location';
				  	$aData['data'] =$this->MODEL->get();
					$this->load->view('admin/main/header');
					$this->load->view('admin/location/view_category',$aData);
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
					$this->load->view('admin/location/view_category',$aData);
					$this->load->view('admin/main/footer');
				}
				
				function edit(){
				    
					$aUrl=$this->uri->uri_to_assoc(2);
					$aData['row'] =$this->MODEL->edit($aUrl['id']);
					$this->load->view('admin/main/header');
					$this->load->view('admin/location/edit_location',$aData);
					$this->load->view('admin/main/footer');
				}		
		
		
		
		function update()
		{
		
			$aUrl=$this->uri->uri_to_assoc(2);
			$aData['id']=$aUrl['id'];
			$id=$aUrl['id'];
			
			$this->load->library('form_validation');
			$this->form_validation->set_rules('title','Title','trim|required|xss_clean|min_length[1]|max_length[35]');
			if ($this->form_validation->run()==false){
					$aData['row'] =$this->MODEL->edit($aUrl['id']);
					//$aData['count_menu_items'] = $this->MODEL->countMenuItems();
					$this->load->view('admin/main/header');
					$this->load->view('admin/location/edit_location',$aData); 
					$this->load->view('admin/main/footer');
			}else{
			  $aData['row'] =$this->MODEL->edit($aUrl['id']);
		      $result =$this->MODEL->update($this->input->post('title'),$this->input->post('id'));
			  switch($result){
						case 1:
						$aData['class']="message_text_suc";
						$aData['msg']="Sucess : Record Have been updated Succesfully ";
						$this->load->view('admin/main/header');
						$aData['row'] =$this->MODEL->edit($id);
						$this->load->view('admin/location/edit_location',$aData);
						$this->load->view('admin/main/footer');
						break;
							
						case 0:
						$aData['class']="message_text_eror";
						$aData['msg']="Error : Updateion Faild";
						$this->load->view('admin/main/header');
						$aData['row'] =$this->MODEL->edit($id);
						$this->load->view('admin/location/edit_location',$aData);
						$this->load->view('admin/main/footer');
						break;
						
						case 2:
						$aData['class']="message_text_eror";
						$aData['msg']="Error : Something Went Wrong, try again";
						$this->load->view('admin/main/header');
						$aData['row'] =$this->MODEL->edit($id);
						$this->load->view('admin/location/edit_location',$aData);
						$this->load->view('admin/main/footer');
						break;
						
						default:
						$this->index();
						break;	
						
					
				}
			}
			
			
			
			
		}
		
		/************************** Level management that is subcat view  Add.edit .delete start ****************************************/
function addSubcat()
	{	
		$aData['categories'] =$this->MODEL->getcategory();
		$this->load->view('admin/main/header');
		$this->load->view('admin/level_management/sub_category',$aData);
		$this->load->view('admin/main/footer');
	}
	
	
	function saveSubcat()
	{
		    $this->load->library('form_validation');
			$this->form_validation->set_rules('title','Title','trim|required|xss_clean|min_length[1]|max_length[35]');
			if ($this->form_validation->run()==false){
				$aData['categories'] =$this->MODEL->getcategory();
					$this->load->view('admin/main/header');
					$this->load->view('admin/level_management/sub_category');
					$this->load->view('admin/main/footer');
			}else{
				extract($_POST);
				$created_at= date('y-m-d H:i:s');
		$data = array(
		'title' => $title,
		'parent_id' => $cat_id,
		'created_at' => $created_at,
		'status' => 1
		);
			  $result =$this->MODEL->save($data,$title);
			  switch($result){
					    case 2:
						$aData['categories'] =$this->MODEL->getcategory();
						$aData['class']="message_text_eror";
						$aData['msg']="Error : Title With This Already Exist";
						$this->load->view('admin/main/header');
						$this->load->view('admin/level_management/sub_category',$aData);
						$this->load->view('admin/main/footer');
						break;
						case 1:
						$aData['categories'] =$this->MODEL->getcategory();
						$aData['class']="message_text_suc";
						$aData['msg']="Sucess : Record Have been Succesfully Added";
						$this->load->view('admin/main/header');
						$this->load->view('admin/level_management/sub_category',$aData);
						$this->load->view('admin/main/footer');
						break;
							
						case 0:
						$aData['class']="message_text_eror";
						$aData['categories'] =$this->MODEL->getcategory();
						$aData['msg']="Error : Title With This Already Exist";
						$this->load->view('admin/main/header');
						$this->load->view('admin/level_management/sub_category',$aData);
						$this->load->view('admin/main/footer');
						break;
						default:
						$this->index();
						break;	
				}
			}
		}
				function viewSubcat($id){
				  	$aData['tblName'] ='location';
				  	$datatable =$this->MODEL->getSubcategory($id);
					if($datatable==0){
						$aData['datatable'] =1;
						}
				  	$aData['data'] =$datatable;
				  	$aData['datatable'] =0;
					$this->load->view('admin/main/header');
					$this->load->view('admin/level_management/view_sub_category',$aData);
					$this->load->view('admin/main/footer');
				}
				
				function deleteSubcat($id){
				   
				  	$result =$this->MODEL->delete($id);
					 switch($result){
						case 1:
						$aData['class']="message_text_suc";
						$aData['msg']="Sucess : Record Have been Succesfully Deleted";
						$aData['tblName'] ='location';
						
				  	$datatable = $this->MODEL->getSubcategory($id);
					if($datatable==0){
						$aData['datatable'] =1;
						}
				  	$aData['data'] =$datatable;
				  	$aData['datatable'] =1;
					$this->load->view('admin/main/header');
					$this->load->view('admin/level_management/view_sub_category',$aData);
					$this->load->view('admin/main/footer');
						break;
							
						case 0:
						$aData['class']="message_text_eror";
						$aData['msg']="Error :Some thing Wrong";
						$aData['tblName'] ='location';
				  	$aData['data'] =$this->MODEL->getSubcategory($id);
				  	$aData['datatable'] =1;
					$this->load->view('admin/main/header');
					$this->load->view('admin/level_management/view_sub_category',$aData);
					$this->load->view('admin/main/footer');
						break;
						default:
						$this->viewSubcat($id);
						break;	
				}
					
				}
				
				function editSubcat($id,$parent_id){
				    $aData['categories'] =$this->MODEL->getcategory();
					$aData['row'] =$this->MODEL->edit($id);
					$aData['parent_id'] =$parent_id;
					$this->load->view('admin/main/header');
					$this->load->view('admin/level_management/edit_sub_category',$aData);
					$this->load->view('admin/main/footer');
				}		
		
		
		
		function updateSubcat($id)
		{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('title','Title','trim|required|xss_clean|min_length[1]|max_length[35]');
			extract($_POST);
			if ($this->form_validation->run()==false){
				$aData['parent_id'] = $parent_id;
					$aData['row'] =$this->MODEL->edit($id);
					 $aData['categories'] =$this->MODEL->getcategory();
					$this->load->view('admin/main/header');
					$this->load->view('admin/level_management/edit_sub_category',$aData); 
					$this->load->view('admin/main/footer');
			}else{
			  $aData['row'] =$this->MODEL->edit($id);
		      $result =$this->MODEL->updateLevel($this->input->post('title'),$this->input->post('id'),$this->input->post('cat_id'));
			  switch($result){
						case 1:
						$this->viewSubcat($id);
						break;
							
						case 0:
						$aData['parent_id'] =$parent_id;
						$aData['class']="message_text_eror";
						$aData['msg']="Error : Updateion Faild";
						$aData['row'] =$this->MODEL->edit($id);
						 $aData['categories'] =$this->MODEL->getcategory();
						$this->load->view('admin/main/header');
						
						$this->load->view('admin/level_management/edit_sub_category',$aData);
						$this->load->view('admin/main/footer');
						break;
						
						case 2:
						$aData['parent_id'] =$parent_id;
						$aData['class']="message_text_eror";
						$aData['msg']="Error : Something Went Wrong, try again";
						$this->load->view('admin/main/header');
						$aData['row'] =$this->MODEL->edit($id);
						$this->load->view('admin/level_management/edit_sub_category',$aData);
						$this->load->view('admin/main/footer');
						break;
						
						default:
						$this->index();
						break;	
						
					
				}
			}
		}
		/************************** gameboard_management  that is subcat view  Add.edit .delete start ****************************************/
function addGameboard()
	{	
		$aData['categories'] =$this->MODEL->getcategory();
		$aData['subcategories'] =$this->MODEL->getsubcategory();
		$aData['emp_data'] =$this->employee_model->get();
		$aData['product_data'] =$this->product_model->get();
		$this->load->view('admin/main/header');
		$this->load->view('admin/gameboard_management/sub_category',$aData);
		$this->load->view('admin/main/footer');
	}


function get_ajax_subcat()
	{	
	extract($_POST); 
		echo $res = $this->MODEL->_getlevels($id);
		 
	}
	
	
	function saveGameboard()
	{
		    $this->load->library('form_validation');
			$this->form_validation->set_rules('game_board_title','Title','trim|required|xss_clean|min_length[1]|max_length[35]');
			if ($this->form_validation->run()==false){
				$aData['categories'] =$this->MODEL->getcategory();
					$aData['subcategories'] =$this->MODEL->getsubcategory();
					$this->load->view('admin/main/header');
					$this->load->view('admin/gameboard_management/sub_category');
					$this->load->view('admin/main/footer');
			}else{
				extract($_POST);
				if (isset($_FILES['media']) AND isset($_FILES['mediaImg'])) {
			  $directory =$this->MODEL->get_title($cat_id);
			$config['allowed_types'] = 'jpg|png|jpeg|pdf';
			$config['max_size'] = '2000'; // sets the upload limit to 2mb, some people may dicide to use digital camera
			$config['encrypt_name'] = TRUE;
			$config['remove_spaces'] = TRUE; // this turns files with name "file name" to "file_name" which is best practice
			$config['overwrite'] = TRUE; // new file replacess the file if it exist beforeok
			if (!is_dir('uploads/'.$directory)) {
			$res = mkdir('./uploads/' . $directory, 0777, TRUE);
			$config['upload_path'] = 'uploads/'.$directory;
			}
			else{
				$config['upload_path'] = 'uploads/'.$directory;
				}
			// load the upload library
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('media')) {
				print_r($vars['upload_media_error'] = $this->upload->display_errors());
			} 
			
			if (!$this->upload->do_upload('mediaImg')) {
				print_r($vars['upload_media_error'] = $this->upload->display_errors());
			} 
			
			else {
					
					$createdAt= date('y-m-d H:i:s');
					$updatedAt= date('y-m-d H:i:s');
					$media=$_FILES['media']["name"];
					$mediaImg=$_FILES['mediaImg']["name"];
					$data = array(
					'title' => $game_board_title,
					'parent_id' => $subcat_id,
					'image1' => 'uploads/'.$directory.'/'.$media,
					'image2' => 'uploads/'.$directory.'/'.$mediaImg,
					'created_at' => $createdAt,
					'status' => 1
					);
				  $result =$this->MODEL->save($data,$title);
					switch($result){
					case 2:
					$aData['categories'] =$this->MODEL->getcategory();
					$aData['subcategories'] =$this->MODEL->getsubcategory();
					$aData['class']="message_text_eror";
					$aData['msg']="Error : Title With This Already Exist";
					$this->load->view('admin/main/header');
					$this->load->view('admin/gameboard_management/sub_category',$aData);
					$this->load->view('admin/main/footer');
					break;
					case 1:
					$aData['categories'] =$this->MODEL->getcategory();
					$aData['subcategories'] =$this->MODEL->getsubcategory();
					$aData['class']="message_text_suc";
					$aData['msg']="Sucess : Record Have been Succesfully Added";
					$this->load->view('admin/main/header');
					$this->load->view('admin/gameboard_management/sub_category',$aData);
					$this->load->view('admin/main/footer');
					break;
					
					case 0:
					$aData['class']="message_text_eror";
					$aData['categories'] =$this->MODEL->getcategory();
					$aData['subcategories'] =$this->MODEL->getsubcategory();
					$aData['msg']="Error : Title With This Already Exist";
					$this->load->view('admin/main/header');
					$this->load->view('admin/gameboard_management/sub_category',$aData);
					$this->load->view('admin/main/footer');
					break;
					default:
					$this->viewGameboard();
					break;	
					}
			    }
		}
	}
}
				function viewGameboard(){
				  	$aData['tblName'] ='location';
				  	$datatable=$this->MODEL->get_parent_child_subchild();
				  	if($datatable==0){
						$aData['datatable'] =1;
						}
				  	$aData['data'] =$datatable;
					$this->load->view('admin/main/header');
					$this->load->view('admin/gameboard_management/view_sub_category',$aData);
					$this->load->view('admin/main/footer');
				}
				
				function deleteGameboard($id){
				   
				    $result =$this->MODEL->delete($id);
					if( $result){
						$aData['tblName'] ='location';
				 $this->viewGameboard();
						}
				}
				
				function editGameboard($id,$child_id,$subchild_id){
		$aData['categories'] =$this->MODEL->getcategory();
		$aData['subcategories'] =$this->MODEL->getsubcategory();
					$aData['row'] =$this->MODEL->edit($subchild_id);
					$aData['parent_id'] =$id;
					$aData['child_id'] =$child_id;
					$aData['subchild_id'] =$subchild_id;
					//$aData['parent_id'] =$parent_id;
					$aData['subcat'] = $this->MODEL->_getlevelsdata($id);
					$this->load->view('admin/main/header');
					$this->load->view('admin/gameboard_management/edit_sub_category',$aData);
					$this->load->view('admin/main/footer');
				}		
		
	function updateGameboard($cat_id,$subcat_id,$id)
		{
		extract($_POST);
	$this->load->library('form_validation');
			$this->form_validation->set_rules('game_board_title','Title','trim|required|xss_clean|min_length[1]|max_length[35]');
			
			if ($this->form_validation->run()==false){
					$aData['categories'] =$this->MODEL->getcategory();
					$aData['subcategories'] =$this->MODEL->getsubcategory();
					$aData['row'] =$this->MODEL->edit($id);
					$aData['parent_id'] =$cat_id;
					$aData['child_id'] =$subcat_id;
					$aData['subchild_id'] =$id;
					 $aData['subcat'] = $this->MODEL->_getlevelsdata($cat_id);
					$this->load->view('admin/main/header');
					$this->load->view('admin/gameboard_management/edit_sub_category',$aData); 
					$this->load->view('admin/main/footer');
			}

else{
	$path2 = $hidden_img2;
	$path1 = $hidden_img;
		$aData['row'] =$this->MODEL->edit($id);
		if ($upload_hidden==1) {$directory =$this->MODEL->get_title($cat_id);
			$config['allowed_types'] = 'jpg|png|jpeg|pdf';
			$config['max_size'] = '2000'; // sets the upload limit to 2mb, some people may dicide to use digital camera
			$config['encrypt_name'] = TRUE;
			$config['remove_spaces'] = TRUE; // this turns files with name "file name" to "file_name" which is best practice
			$config['overwrite'] = TRUE; // new file replacess the file if it exist beforeok
			if (!is_dir('uploads/'.$directory)) {
			$res = mkdir('./uploads/' . $directory, 0777, TRUE);
			$config['upload_path'] = 'uploads/'.$directory;
			}
			else{
				$config['upload_path'] = 'uploads/'.$directory;
				}
			// load the upload library
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('image1')) {
				$aData['message'] = $this->upload->display_errors();
				$path1 = $hidden_img;
			} 
			else{
							$upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
			$file_array = $this->upload->data('file_name');
			$image1 = $file_array['file_name'];
$path1 = $config['upload_path'].'/'.$image1;
				}
			
			
		}
		if ($upload_hidden2==1) {
			$config['allowed_types'] = 'jpg|png|jpeg|pdf';
			$config['max_size'] = '2000'; // sets the upload limit to 2mb, some people may dicide to use digital camera
			$config['encrypt_name'] = TRUE;
			$config['remove_spaces'] = TRUE; // this turns files with name "file name" to "file_name" which is best practice
			$config['overwrite'] = TRUE; // new file replacess the file if it exist beforeok
			if (!is_dir('uploads/'.$directory)) {
			$res = mkdir('./uploads/' . $directory, 0777, TRUE);
			$config['upload_path'] = 'uploads/'.$directory;
			}
			else{
				$config['upload_path'] = 'uploads/'.$directory;
				}
			// load the upload library
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('image2')) {
				$aData['message'] = $this->upload->display_errors();
				$path2 = $hidden_img2;
			} 
			else{
							$upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
			$file_array = $this->upload->data('file_name');
			$image2 = $file_array['file_name'];
			$path2 = $config['upload_path'].'/'.$image2;

				}
		}
			
			$created_at= date('y-m-d H:i:s');
			$data = array(
			'title' => $game_board_title,
			'parent_id' => $subcat_id,
					'image1' => $path1,
					'image2' => $path2,
			'updated_at' => $created_at
			);
			$result =$this->MODEL->updateGameBoard($data,$id);
			  switch($result){
						case 1:
					$aData['categories'] =$this->MODEL->getcategory();
					$aData['subcategories'] =$this->MODEL->getsubcategory();
					$aData['row'] =$this->MODEL->edit($id);
					$aData['parent_id'] =$cat_id;
					$aData['child_id'] =$subcat_id;
					$aData['subchild_id'] =$id;
					 $aData['subcat'] = $this->MODEL->_getlevelsdata($cat_id);
					$this->load->view('admin/main/header');
					$this->load->view('admin/gameboard_management/edit_sub_category',$aData); 
					$this->load->view('admin/main/footer');
						break;
						case 0:
					$aData['categories'] =$this->MODEL->getcategory();
					$aData['subcategories'] =$this->MODEL->getsubcategory();
					$aData['row'] =$this->MODEL->edit($id);
					$aData['parent_id'] =$cat_id;
					$aData['child_id'] =$subcat_id;
					$aData['subchild_id'] =$id;
					 $aData['subcat'] = $this->MODEL->_getlevelsdata($cat_id);
					$this->load->view('admin/main/header');
					$this->load->view('admin/gameboard_management/edit_sub_category',$aData); 
					$this->load->view('admin/main/footer');

						break;
						case 2:
					$aData['categories'] =$this->MODEL->getcategory();
					$aData['subcategories'] =$this->MODEL->getsubcategory();
					$aData['row'] =$this->MODEL->edit($id);
					$aData['parent_id'] =$cat_id;
					$aData['child_id'] =$subcat_id;
					$aData['subchild_id'] =$id;
					 $aData['subcat'] = $this->MODEL->_getlevelsdata($cat_id);
					$this->load->view('admin/main/header');
					$this->load->view('admin/gameboard_management/edit_sub_category',$aData); 
					$this->load->view('admin/main/footer');
						break;
						default:
						$this->index();
						break;	
						
					
				}
			}
		}	
		
		
		
	
}

/* End of file location.php */
/* Location: ./application/controllers/location.php */
?>