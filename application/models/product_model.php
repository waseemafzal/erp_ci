<?php
	class Product_model extends CI_model {
		
	private $tblName='tbl_product';
	private $active='1';
	function __construct()
	{
	
		parent::__construct();	
	}
	public function save($data_array) {
		$dbExi=$this->db->insert($this->tblName, $data_array); 
		$result =0;
		if($dbExi){
			$result = 1;
		}
		return $result;
	} 
		
	public 	function get(){
            $sql="SELECT * FROM ".$this->tblName."  ORDER BY id DESC";
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
		
 	public  function delete($id){
          	$sql="DELETE FROM ".$this->tblName." WHERE id='".$id."'";
			$data= $this->db->query($sql);
			if ($data){
				return 1;
			}
			else{
				return 0;
			}
		}
    
	public function edit($id){
           $sql="SELECT * FROM ".$this->tblName."  WHERE id='".$id."'";
			$data= $this->db->query($sql);
			if ($data->num_rows()>0){
				return $data->row();
			}
			else{
				return 0;
			}
		}
		
	public  function update($data , $id){
		 $sql="UPDATE  ".$this->tblName." SET product_name='".$data."' WHERE id = '".$id."'";
				$data= $this->db->query($sql);
				if ($data){
					return 1;
				}
				else{
					return 0;
				}
			}
		//}
		
}
?>