<?php
	class Gallery_model extends CI_model {
			/*function Buku_model()
			{
				parent::CI_model();
			}*/
			
			private $tblName='tbl_gallery';
			public $_pageHeading;
			
			 
			
				function __construct()
				{
				
					parent::__construct();	
				}
		function save($title, $title_ar ,$type, $count)
		{
			//
			$sql="SELECT * FROM ".$this->tblName." WHERE title='".$title."'";
			$data= $this->db->query($sql);
			if ($data->num_rows()>0)
			{  
			  $result = 2;
			
			}else{
			 
				$createdAt= date('y-m-d H:i:s');
				$updatedAt= date('y-m-d H:i:s');
				$sql="INSERT INTO ".$this->tblName."(title,title_ar,count,type)VALUES(?,?,?,?)";
				$dbExi =$this->db->query($sql,array($title,$title_ar,$count,$type));
				$result =0;
				
				if($dbExi){
					 mkdir("uploads/gallery/".$title."", 0777);
				  	$result = 1;
				}
			}
		
		 return  $result;
		}
		
		
		function get($id)
		{
			
         	//here id contain type of gallery
			$sql="SELECT * FROM ".$this->tblName." WHERE type ='".$id."'";
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
		
		function get_galleries($id)
		{
			
			
         	//here id contain type of gallery
		 	$sql="SELECT title,title_ar,alt_text,image,gallery_id FROM ".$this->tblName."  INNER JOIN tbl_gallery_images ON 
			".$this->tblName.".id=tbl_gallery_images.gallery_id
			  WHERE type ='".$id."'  ORDER BY tbl_gallery_images.id ";
			$data= $this->db->query($sql);
			if ($data->num_rows()>0)
			{	
				//foreach ($query->result() as $row)
				$temp_gallery_images = array();
				$galleries = array();
				$galleries_ar = array();
				$galleries_images = array();
				$pre_id = -1;
				$count = $data->num_rows();
				foreach ($data->result() as $row) 
				{
			//		echo $i." itration <br>";
/*					print_r($row);
*/					$id=$row->gallery_id;
					if($pre_id != $id)
					{
						$pre_id=$id;
						if(sizeof($galleries)  > 0)
						{
							$galleries_count= sizeof($galleries);
							$galleries_images[$galleries_count - 1] = $temp_gallery_images;
						}
						$galleries[] = $row->title;
						$galleries_ar[] = $row->title_ar;
						$temp_gallery_images = array();
					}
					$temp_gallery_images[]= $row->image;	
				}
				if(sizeof($galleries)>0)
				{
					$galleries_count= sizeof($galleries);
					$galleries_images[$galleries_count - 1] = $temp_gallery_images;
				}
				$galleries_and_galleries_images[] = $galleries;
				$galleries_and_galleries_images[] = $galleries_images;
				$galleries_and_galleries_images[] = $galleries_ar;
				
/*				echo "<pre>";
				print_r($galleries_and_galleries_images);
				echo "</pre>";
				die('DONE');				
*/				return $galleries_and_galleries_images;
			}
			else
			{
				return 0;
			}
			
			
		
		}

		
		
		
		
		
		/*************************************************************/
		   function getAlbumName($id)
		{
			
         	$sql="SELECT  title FROM ".$this->tblName." WHERE id='".$id."'";
			$data= $this->db->query($sql);
			if ($data->num_rows()>0)
			{
				$result = $data->row();
				return $result->title;
			}
			else
			{
				return 0;
			}
			
			
		}
		/*************************************************************/
		
		
		
		
		

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
    
	function edit($id)
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
		
	
	 function update($title,$title_ar,$count,$id)
		{
			
			
			
		 	$sql="SELECT title FROM ".$this->tblName." WHERE title='".$title."' AND  id!='".$id."'";
			$data= $this->db->query($sql);
			if ($data->num_rows()>0)
			{  
			  return 2;
			
			}else{
				$updatedAt= date('y-m-d H:i:s');
			    $sql="UPDATE  ".$this->tblName." SET title='".$title."',
				title_ar='".$title_ar."',
				count='".$count."'
				 WHERE id='".$id."'";
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
		
		
	public function getHeading($id)
		{
			
         	if($id == SLIDER)
				$this->_pageHeading = SLIDER_HEADING;
			else
			if($id == BANNERS)
				$this->_pageHeading = BANNERS_HEADING;
			else
			if($id == PRODUCTS)
				$this->_pageHeading = PRODUCTS_HEADING;
			else
			if($id == BRANDS)
				$this->_pageHeading = BRANDS_HEADING;
			else
			if($id == GALLERY)
				$this->_pageHeading = GALLERY_HEADING;
			else
			if($id == NEWS)
				$this->_pageHeading = NEWS_HEADING;
			
		}
		
     function getGallerySpecifications($id)
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
		
		 function getTitle($id)
		{
			 
          	$sql="SELECT title FROM ".$this->tblName."  WHERE id='".$id."'";
			$data= $this->db->query($sql);
			if ($data->num_rows()>0)
			{
				$result  = $data->row();
					return $result->title;
			}
			else
			{
				return 0;
			}
			
			
		}
		
		

     
	 



}
?>