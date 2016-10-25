<?php
	class Location_model extends CI_model {
			private $tblName='location';
			private $active='1';
				function __construct()
				{
					parent::__construct();	
				}
		public function save($data_array,$title){
		
		$dbExi=$this->db->insert($this->tblName, $data_array); 
		$result =0;
		if($dbExi){
		$result = 1;
		}
		return  $result;
	}

		public 	function get($id=0)
		{
			if($id==0)
				$parentId='WHERE parent_id =0'; 
			else
			    $parentId='WHERE parent_id='.$id; 
            $sql="SELECT * FROM ".$this->tblName." $parentId ORDER BY id DESC";
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
		
	
	public  function update($title,$id)
		{
			
				$updatedAt= date('y-m-d H:i:s');
		      $sql="UPDATE  ".$this->tblName." SET title='".$title."'
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
		public  function updateLevel($title,$id , $parent_id)
		{
			
				$created_at= date('y-m-d H:i:s');
		      $sql="UPDATE  ".$this->tblName." SET title='".$title."',parent_id='".$parent_id."',created_at='".$created_at."'
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
	function getcategory(){
		 $query="SELECT * FROM  location WHERE  parent_id = '0' ";		
		 $data= $this->db->query($query);
			if ($data->num_rows()>0)
			{
				return $data;
			}
			else
			{
				return 0;
			}
		}
	function getSubcategory($parent_id){
		
	 	 $query="SELECT c1.id,c1.created_at,  
  c1.parent_id,  
  c1.title,c1.status,
  c2.title as `parent_title` 
FROM location  c1  
left outer join location c2 on c1.parent_id = c2.id ";	
	 	
	
		 $data= $this->db->query($query);
			if ($data->num_rows()>0)
			{
				return $data;
			}
			else
			{
				return 0;
			}
	}
		

	public function _getSubCategories($id)
		{
			
				//$as="title As subtitle";
			
            $sql="SELECT * FROM ".$this->tblName."  WHERE parent_id='".$id."'";
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
			public function _getlevels($id)
		{
            $sql="SELECT * FROM ".$this->tblName."  WHERE parent_id='".$id."'";
			$data= $this->db->query($sql);
			if ($data->num_rows()>0)
			{
				foreach ($data->result() as $result){
					$option_html .='<option value="'.$result->id.'">'.$result->title.'</option>';
					
					}
				return 	$option_html;
			}
			else
			{
				return false;
			}
			
			
		}
		public function _getlevelsdata($id)
		{
            $sql="SELECT * FROM ".$this->tblName."  WHERE parent_id='".$id."'";
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

/***************************************************GAME BORD MANAGEMENT***************************************/
		 
	public 	function get_parent_child_subchild()
		{
			
            $sql="SELECT tparent.id AS parent_id,tparent.created_at AS created_at,tparent.id AS id,tparent.status AS status, tparent.title AS parent_name, tchild1.id AS child_id, tchild1.title AS child_name, tchild2.id AS subchild_id, tchild2.title AS subchild_name, tchild2.id AS subchild_id
FROM location tparent
LEFT JOIN location tchild1 ON tparent.id = tchild1.parent_id
LEFT JOIN location tchild2 ON tchild1.id = tchild2.parent_id";
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

public  function updateGameBoard($data,$id){
		$this->db->where('id',$id);
		$result=$this->db->update($this->tblName,$data); 
		if ($result)
		{
			return 1;
		}
		else
		{
			return 0;
		}
}

public 	function get_title($id)
		{
			
            $sql="SELECT title FROM ".$this->tblName." WHERE id ='".$id."' AND parent_id='".PARENT_ID."'";
			$data= $this->db->query($sql);
			if ($data->num_rows()>0)
			{
				return $data->row()->title;
			}
			else
			{
				return 0;
			}
			
			
		}






}
?>