<?php
	class Category_model extends CI_model {
			/*function Buku_model()
			{
				parent::CI_model();
			}*/
			 
			private $tblName='tbl_categories';
			private $active='1';
			
			
			
				function __construct()
				{
				
					parent::__construct();	
				}
	public function save($title,$title_ar,$sub_title,$sub_title_ar)
		{
			//
		 	$sql="SELECT * FROM ".$this->tblName." WHERE title='".$title."' || title_ar='".$title_ar."'";
			$data= $this->db->query($sql);
			if ($data->num_rows()>0)
			{  
			  $result = 2;
			
			}else{
			  
				$createdAt= date('y-m-d H:i:s');
				$updatedAt= date('y-m-d H:i:s'); 
				$sql="INSERT INTO ".$this->tblName."(title,sub_title,title_ar,sub_title_ar,status,parent_id,created_at,updated_at)VALUES(?,?,?,?,?,?,?,?)";
				$dbExi =$this->db->query($sql,array($title,$sub_title,$title_ar,$sub_title_ar,'1',PARENT_ID,$createdAt,$updatedAt));
				$result =0;
				 
				if($dbExi){
				  	$result = 1;
				}
			} 
		
		 return  $result;
		}
		
		
	public 	function get()
		{
			
            $sql="SELECT * FROM ".$this->tblName." WHERE parent_id='".PARENT_ID."' ORDER BY id DESC";
			$data= $this->db->query($sql);
			if ($data->num_rows()>0)
			{
				return $data;
			}
			else
			{
				return 0;
			}
			
			
		}
		

 	public  function delete($id)
		{
			
          	$sql="DELETE FROM ".$this->tblName." WHERE id='".$id."'";
			$data= $this->db->query($sql);
			if ($data)
			{
				return 1;
			}
			else
			{
				return 0;
			}
			
			
		}
    
	public function edit($id)
		{
			
           $sql="SELECT * FROM ".$this->tblName."  WHERE id='".$id."'";
			$data= $this->db->query($sql);
			if ($data->num_rows()>0)
			{
				return $data->row();
			}
			else
			{
				return 0;
			}
			
			
		}
		
	
	public  function update($title,$title_ar,$sub_title,$sub_title_ar,$menu_item=0,$id)
		{
			
			 
			
		   $sql="SELECT title FROM ".$this->tblName." WHERE (title='".$title."' || title_ar='".$title_ar."')  AND  id!='".$id."'";
			$data= $this->db->query($sql);
			if ($data->num_rows()>0)
			{  
			  return 2;
			
			}else{ 
				$updatedAt= date('y-m-d H:i:s');
		      $sql="UPDATE  ".$this->tblName." SET title='".$title."',sub_title='".$sub_title."',title_ar='".$title_ar."',sub_title_ar='".$sub_title_ar."',menu_item='".$menu_item."',updated_at='".$updatedAt."'  WHERE id='".$id."'";
			  $data= $this->db->query($sql);
				if ($data)
				{
					return 1;
				}
				else
				{
					return 0;
				}
				}
			
		}
		
		
		  public function countMenuItems()
		{
			
            $sql="SELECT * FROM ".$this->tblName."  WHERE parent_id=".PARENT_ID." AND menu_item=".YES."";
			$data= $this->db->query($sql);
			if ($data->num_rows() > 0) {
		
			       return $data->num_rows();
				
			}
			else
			{
				return 0;
			}
		}
	 //	status
	
	public function _getSubCategories($id)
		{
			$as = "";
			if($this->session->userdata('lang') == ARABIC)
				$as="title_ar As subtitle";
			else
				$as="title As subtitle";
			
            $sql="SELECT id,$as FROM ".$this->tblName."  WHERE parent_id='".$id."'";
			$data= $this->db->query($sql);
			if ($data->num_rows()>0)
			{
				return 	$data;
			}
			else
			{
				return false;
			}
			
			
		}
	
	
	public 	function getAllSubCatgories()
		{
			
            $sql="SELECT * FROM ".$this->tblName." WHERE parent_id!='".PARENT_ID."'";
			$data= $this->db->query($sql);
			if ($data->num_rows()>0)
			{
				return $data;
			}
			else
			{
				return 0;
			}
			
			
		}
	
	
	
	
	
	
		 
/**************************************************************************************************/
    public function leftMenu()
		{
			
			$as = "";
			if($this->session->userdata('lang') == ARABIC)
			{
				$as="title_ar As title";
				$icon_direction = "icon-left-dir ";
			}
			else
			{
				$icon_direction = "icon-right-dir";
				$as="title As title";;
			}	
			
            $sql="SELECT id,".$as." FROM ".$this->tblName."  WHERE parent_id='".PARENT_ID."' LIMIT 0,15";
			$data= $this->db->query($sql);
			if ($data->num_rows()>0)
			{
				$htmlData =""; 
				foreach ($data->result() as $result) {
					
					$htmlData.='<li><a href="#">'.substr($result->title,0,30).'<i class="icons '.$icon_direction.'"></i></a>';
                                    	
										if($subCateData = $this->_getSubCategories($result->id)){
											
											$htmlData.='<ul class="sidebar-dropdown">';
											 	$i=1;
												$htmlData.='<li><ul>';
													foreach ($subCateData->result() as $result1) {
  $url=base_url().'product/productlist/id/'.$result1->id.'/type/'.SUB_CATEGORY;
	$htmlData.='<li><a href="'.$url.'">'.substr($result1->subtitle,0,30).'</a></li>';
													$i++;}
										        $htmlData.='</ul></li>';
										   $htmlData.='</ul>';
										}
										
                             $htmlData.=' </li>';
					
				}
				
				return $htmlData;
			}
			else
			{
				return 0;
			}
			
			
		}
		
		public function topMenuCatgories()
		{ 
			$as = "";
			if($this->session->userdata('lang') == ARABIC)
			{
			$as="title_ar As title, sub_title_ar as sub_title";
			}
			else
			{
					
				$as="title As title , sub_title as sub_title";;
			}
			 
           $sql="SELECT id,$as FROM ".$this->tblName."  WHERE parent_id='".PARENT_ID."' AND menu_item='".$this->active."' AND status='".$this->active."'  LIMIT 0,3";
			$data= $this->db->query($sql); 
			if ($data->num_rows()>0)
			{
				$htmlData =""; 
				$i=1;
				foreach ($data->result() as $result) {
					
					if($i==1)
					{
						$langUrl = "";
						if($this->session->userdata('lang') == ARABIC)
						{
						$langUrl = ARABIC_FOLDER;
						$class='red';
						}
						else
						{
							$class='orange';
						}
					}
					else
					if($i==2)
					{
					$class='blue';
					}else
					$class='red';
					 	
					$htmlData.='<li class="'.$class.'"><a href="">
									<i class="icons icon-mobile-6"></i>
									<span class="nav-caption">'.substr($result->title,0,30).'</span>
									<span class="nav-description">'.substr($result->sub_title,0,30).'</span>
								</a>';
					              if($subCateData = $this->_getSubCategories($result->id)){
											$htmlData.='<ul class="wide-dropdown normalAniamtion"><li><ul>';
										       foreach ($subCateData->result() as $result1) {
												   		 $url=base_url().'product/productlist/id/'.$result1->id.'/type/'.SUB_CATEGORY;
													      $htmlData.='<li><a href="'.$url.'">'.substr($result1->subtitle,0,30).'</a></li>';
												}
										        $htmlData.='</ul></li></ul>';
									}
										
                             $htmlData.=' </li>';
					
				$i++;}
				
				return $htmlData;
			}
			else
			{
				return 'N/A';
			}
			
			
		}
		
		
		       
		
		
		
		
		
		
		
		
		
		
		
		
/**************************************************************************************************/

}
?>