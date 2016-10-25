<?php
	class Gallery_images_model extends CI_model {
			
			private $tblName='tbl_gallery_images';
			private $active='1';
			
			
			
				function __construct()
				{
				
					parent::__construct();	
				}
		function save($id,$image,$url=0)
		{
			//
			
			
				$createdAt= date('y-m-d H:i:s');
				$updatedAt= date('y-m-d H:i:s');
			    $sql="INSERT INTO ".$this->tblName."(gallery_id,image,status,url,created_at,updated_at)VALUES(?,?,?,?,?,?)";
			
				$dbExi =$this->db->query($sql,array($id,$image,'1',$url,$createdAt,$updatedAt));
				$result =0;
				
				if($dbExi){
				  	$result = 1;
				}
			
		return  $result;
		}
		
		
		function get($id)
		{
			
              $sql="SELECT id,image,gallery_id,url,alt_text,alt_text_ar FROM ".$this->tblName." WHERE  gallery_id='".$id."' AND status='".$this->active."'";
			$data= $this->db->query($sql);
			if ($data->num_rows()>0)
			{
				return $data;
			}
			else
			{
				return 'N/A';
			}
			
			
		}
 	 function delete($id)
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
		 	 function delete_images($id)
		{
			
          	$sql="DELETE FROM ".$this->tblName." WHERE gallery_id='".$id."'";
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

    
	function edit($id)
		{
			
          	$sql="SELECT image,url,alt_text,alt_text_ar FROM ".$this->tblName."  WHERE id='".$id."'";
			$data= $this->db->query($sql);
			if ($data->num_rows()>0)
			{
				$result  =  $data->row();
				return  $result->image.'|'.$result->url.'|'.$result->alt_text.'|'.$result->alt_text_ar;
			}
			else
			{
				return 0;
			}
			
			
		}
		function getalt_text_ar($id)
		{
			
          	$sql="SELECT * FROM ".$this->tblName."  WHERE id='".$id."'";
			$data= $this->db->query($sql);
			if ($data->num_rows()>0)
			{
				
				return $data->row()->alt_text_ar;
			}
			else
			{
				return 0;
			}
			
			
		}
		
	
	 function update($id,$image,$url=0,$alt_text,$alt_text_ar)
		{
			

			 	$updatedAt= date('y-m-d H:i:s'); 
  	      $sql="UPDATE  ".$this->tblName." SET image='".$image."',alt_text='".$alt_text."',alt_text_ar='".$alt_text_ar."',url='".$url."',updated_at='".$updatedAt."' WHERE id='".$id."'";
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
		function getGalleryUploadedImagesCount($id)
		{
			
       $sql="SELECT image  FROM ".$this->tblName."  WHERE gallery_id='".$id."'";
			$data= $this->db->query($sql);
			if ($data->num_rows()>0)
			{ 
				return $data->num_rows();
			}
			else
			{
				return 0;
			}
			
			
		}

}
?>