<?php
	class Slider_cms_model extends CI_model {
			private $tblName='slider_cms';
				function __construct()
				{
					parent::__construct();	
				}
	public function save($data_array)
		{
		$dbExi=$this->db->insert($this->tblName, $data_array); 
		$result =0;
		if($dbExi){
			$result = 1;
		}
		return  $result;
		}
	public function get()
		{
			
            $sql="SELECT * FROM ".$this->tblName." ";
	
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
		public function edit($id)
		{
			
            $sql="SELECT id,title ,title_ar ,description,description_ar FROM ".$this->tblName."  WHERE id='".$id."'";
	
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
	public  function update($title,$title_ar,$description,$description_ar,$id)
		{
					
					$updatedAt= date('y-m-d H:i:s');
		       $sql="UPDATE  ".$this->tblName." SET title = '".$title."',
				title_ar = '".$title_ar."',
				description = '".$description."',
			 description_ar='".$description_ar."'  WHERE id = '".$id."'";
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
    

		
}
?>