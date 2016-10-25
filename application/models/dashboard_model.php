<?php
	class Dashboard_model extends CI_model {
			
			private $tblName='tbl_dashboard_logos';
			private $active='1';
			
			
			
				function __construct()
				{
				
					parent::__construct();	
				}
	
		function get()
		{
            $sql="SELECT * FROM ".$this->tblName." ";
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
		
	
	 function update($id,$image,$logo)
		{
				
  	            $sql="UPDATE  ".$this->tblName." SET image='".$image."',small_image='".$logo."' WHERE id = '".$id."'";
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