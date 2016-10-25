<?php
	class Messages extends CI_model {
			
			private $tblName='messages';
			
	function get_message($keyword)
	{
		$message = "";
			if($this->session->userdata('lang') == ARABIC)
			{
				$message="ar_message";
			}
			else
			{
				$message="en_message";;
			}
		$this->db->select($message);
		$this->db->from('messages');
		$this->db->where('keyword',$keyword);
		$query = $this->db->get();
		if($query->num_rows>0)
		{
			foreach ($query->result() as $row)
			{
				$data[]=$row;
			}
			return $data[0]->$message;
		}	
	
	}
	
	public  function update_messages($id,$en_message,$ar_message,$id)
		{
			
			
			
	      $sql="SELECT *  FROM ".$this->tblName." WHERE (en_message='".$en_message."' || ar_message='".$ar_message."')  AND  id!='".$id."'";
			$data= $this->db->query($sql);
			if ($data->num_rows()>0)
			{  
			  return 2;
			
			}
			else
			{
		    $sql="UPDATE  ".$this->tblName." SET en_message='".$en_message."',ar_message='".$ar_message."'  WHERE id='".$id."'"; 
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
	
	
	
}
?>