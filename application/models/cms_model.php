<?php
	class Cms_model extends CI_model {
			private $tblName='tbl_cms';
			private $tblUserAgent='user_agent';
				function __construct()
				{
					parent::__construct();	
				}
		public function user_agent($data_array)
		{
			 	$dbExi=$this->db->insert($this->tblUserAgent, $data_array); 
				$result =0;
				if($dbExi){
				  	$result = 1;
		}
			
		}
	public function save($title,$title_ar,$description,$description_ar)
		{
			//
			$sql="SELECT * FROM ".$this->tblName." WHERE title='".$title."' ";
			$data= $this->db->query($sql);
			if ($data->num_rows()>0)
				
			{  
			  $result = 2; 
			
			}else{
			 
				$createdAt= date('y-m-d H:i:s');
				$updatedAt= date('y-m-d H:i:s');
				$sql="INSERT INTO ".$this->tblName."(title,title_ar,description,description_ar,status,created_at,updated_at)VALUES(?,?,?,?,?,?,?)";
				$dbExi =$this->db->query($sql,array($title,$title_ar,$description,$description_ar,'1',$createdAt,$updatedAt));
				$result =0;
				 
				if($dbExi){
				  	$result = 1;
				}
			} 
		
		 return  $result;
		}
	public function savepost($description,$cms_id)
		{
			$createdAt= date('y-m-d H:i:s');
			$description= mysql_escape_string($description);
			$sql="INSERT INTO ".$this->tblName."(parent_id,description,created_at)VALUES(?,?,?)";
			$dbExi =$this->db->query($sql,array($cms_id,$description,$createdAt));
			$inserted_id =$this->db->insert_id();
			
			$sql="INSERT INTO  tbl_gallery (cms_id,type,count)VALUES(?,?,?)";
			$dbExi =$this->db->query($sql,array($inserted_id,1,4));
			//inserting empty entry for images 
			for ($i = 1; $i <= 4; $i++) {
			$items[] = array(
			'gallery_id' => $inserted_id,
			'status' => 1,
			'image' => '1427888624.jpg',
			
			);
			}
			$this->db->insert_batch('tbl_gallery_images', $items);
			if($dbExi){
			$result = 1;
			} 
			else{
			$result = 0;
			}
			
			return  $result;
		}

	function get_post($id)
		{
			//here id contain type of gallery
/*			$sql="SELECT * FROM tbl_gallery WHERE type =6 AND cms_id='".$id."' ";
*/
//echo  $sql="SELECT * FROM tbl_gallery JOIN tbl_cms ON tbl_gallery.cms_id =tbl_cms.id  WHERE type =1 AND cms_id='".$id."'";
  $sql="SELECT * FROM tbl_cms  where id='".$id."' OR parent_id='".$id."'";


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
public  function updatepost($description,$description_ar,$id)
		{
			$description= mysql_escape_string($description);
			$description_ar= mysql_escape_string($description_ar);
			$updatedAt= date('y-m-d H:i:s');
		      $sql="UPDATE  ".$this->tblName." SET 
				description='".$description."',
				description_ar='".$description_ar."',
				updated_at='".$updatedAt."'  WHERE id = '".$id."'";
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
	public 	function get()
		{
			
      	$sql="SELECT * FROM ".$this->tblName." where parent_id = 0 and page_type= 0 ";
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
		public function editpost($id)
		{
            $sql="SELECT id ,title, description,description_ar FROM ".$this->tblName."  WHERE id='".$id."'";
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
		public function getCmsPage($id)
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
		public function getPillarPost($id)
		{
			$sql="SELECT * FROM ".$this->tblName."  WHERE parent_id='".$id."'";
			$data= $this->db->query($sql);
			if ($data->num_rows()>0)
			{
			return $data();
			}
			else
			{
			return 0;
			}
		}
		
		public function getCmsPage_dandot($id)
		{
			$sql="SELECT * FROM ".$this->tblName."  WHERE id='".$id."' OR parent_id='".$id."'";
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

	
	public  function update($large_image,$small_image,$id,$title)
		{
					
					$updatedAt= date('y-m-d H:i:s');
		       $sql="UPDATE  ".$this->tblName." SET image = '".$large_image."',
				small_image = '".$small_image."',
				title = '".$title."',
			 updated_at='".$updatedAt."'  WHERE id = '".$id."'";
			  $data= $this->db->query($sql);  
				if ($data==1)
				{
					return 1;
				}
				else
				{
					return 0;
				}
		}
		
/********************************************  Nav function strart  *********************************************************/
	public 	function get_nav(){
		$sql="SELECT * FROM ".$this->tblName. " where page_type= 2";
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
	function get_post_nav($id){
		$sql="SELECT * FROM tbl_cms  where parent_id='".$id."'";
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
	public function edit_nav($id)
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
	public  function update_Nav($large_image,$id)
		{
				$updatedAt= date('y-m-d H:i:s');
		      $sql="UPDATE  ".$this->tblName." SET image = '".$large_image."',
			 updated_at='".$updatedAt."'  WHERE id = '".$id."'";
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
	public function savepostnav($description,$description_ar,$cms_id)
	{
		$createdAt= date('y-m-d H:i:s');
		$description= mysql_escape_string($description);
		$sql="INSERT INTO ".$this->tblName."(parent_id,description,description_ar,created_at)VALUES(?,?,?,?)";
		$dbExi =$this->db->query($sql,array($cms_id,$description,$description_ar,$createdAt));
		$inserted_id =$this->db->insert_id();
		
		$sql="INSERT INTO  tbl_gallery (cms_id,type,count)VALUES(?,?,?)";
		$dbExi =$this->db->query($sql,array($inserted_id,1,4));
		//inserting empty entry for images 
		for ($i = 1; $i <= 4; $i++) {
		$items[] = array(
		'gallery_id' => $inserted_id,
		'status' => 1,
		'image' => '1427888624.jpg',
		
		);
		}
		$this->db->insert_batch('tbl_gallery_images', $items);
		if($dbExi){
		$result = 1;
		} 
		else{
		$result = 0;
		}
		
		return  $result;
	}
/*******************nav function end **************/
}
?>