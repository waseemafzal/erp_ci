<?php
	class Contact_model extends CI_model {
			private $tblName='tbl_contact';
			private $tbl_applicant='tbl_applicant';
				function __construct() 
				{
					parent::__construct();	
				}
	public 	function get()
	{
		$sql="SELECT * FROM ".$this->tblName."";
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
/*******************contact messages ***************/		
	public 	function get_messages()
	{
		$sql="SELECT * FROM  site_messages";
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
	public 	function get_user_message($id)
	{
		 $sql="UPDATE  site_messages SET status=1
			 WHERE id='".$id."'";
		  $data= $this->db->query($sql); 
		$sql="SELECT * FROM  site_messages where id ='".$id."'";
		$data= $this->db->query($sql);
		if ($data->num_rows()>0)
		{
			return $data->row();;
		}
		else
		{
			return 0;
		}
	}
	public	function get_unread_messages(){
		$this->db->where('status', 0);
		$num_rows = $this->db->count_all_results('site_messages');
		return $num_rows;
	}
	public	function total_messages_count(){
		$num_rows = $this->db->count_all_results('site_messages');
		return $num_rows;
	}
	public function save($name,$email,$phone,$message,$ip) {
	$createdAt= date('y-m-d H:i:s');
	$sql="INSERT INTO site_messages (name,email,phone,interested_in,ip_address,created_at)VALUES(?,?,?,?,?,?)";
	$dbExi =$this->db->query($sql,array($name,$email,$phone,$message,$ip,$createdAt));
	$result =0;
	if($dbExi){
	$result = 1;
	}
	return $result;
} 
public function save_resume($data_array) {
	$dbExi=$this->db->insert($this->tbl_applicant, $data_array); 
				$result =0;
				if($dbExi){
				  	$result = 1;
				}
	return $result;
} 


	public  function deleteMessages($id)
	{
	 	$sql="DELETE FROM  site_messages WHERE id='".$id."'"; 
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
/*******************contact messages ***************/		
	public 	function getContactInfo()
		{
			
         	$sql="SELECT * FROM ".$this->tblName."";
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

	function sendMail()
	{
		$config = Array(
		'protocol' => 'smtp',
		'smtp_host' => 'ssl://smtp.googlemail.com',
		'smtp_port' => 465,
		'smtp_user' => 'waseemafzal.purplearts@gmail.com', // change it to yours
		'smtp_pass' => '!@QWASZX', // change it to yours
		'mailtype' => 'html',
		'charset' => 'iso-8859-1',
		'wordwrap' => TRUE
		);
		
		$message = '';
		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
		$this->email->from('waseemafzal.purplearts@gmail.com'); // change it to yours
		$this->email->to('waseemafzal31@gmail.com');// change it to yours
		$this->email->subject('Resume from JobsBuddy for your Job posting');
		$this->email->message($message);
		if($this->email->send())
		{
		echo 'Email sent.';
		}
		else
		{
		show_error($this->email->print_debugger());
		}
	
}
  public function send(){
	$toaddress = "waseemafzal.purplearts@gmail.com";  //Change this to the email address you will be receiving your notices.
	$mailhost = "mail.101.com";  //Change this to your actual Domain name.
	$fromaddress = "maged@101.com";  //Change this to the email address you will use to send and authenticate with.
	$frompwd = "magedmiras";  //Change this to the above email addresses password.
	$subject = "Email From 101.com Website";  //Change this to your own email message subject.
	//////////////////////////////////////////
	// DO NOT CHANGE ANYTHING PAST THIS LINE//
	//////////////////////////////////////////
	$fromname = $_POST["TName"];
	$body = $_POST["TBody"] ;
	$rplyto = $_POST["TEmail"];
	$phone = $_POST["TPhone"];
	$company = $_POST['TCompany'];
	$msgbody = $myinvalidname . $fromname . "<br>"."<br>" . $myinvalidemail . $rplyto  ."<br>"."<br>" .$myinvalidphone . $phone . "<br>" . "<br>".$myinvalidcomoany . $company . "<br>". "<br>".$myinvalidmessage ."<br>" . $body;
		$mail->IsSMTP();
		$mail->Host = $mailhost;
		$mail->SMTPAuth = true;
		$mail->Username = $fromaddress;
		$mail->Password = $frompwd;
		
		$mail->From = $fromaddress;
		$mail->FromName = $fromname;
		$mail->AddReplyTo($rplyto);
		$mail->AddAddress($toaddress);
		$mail->IsHTML(true);
		$mail->phone = $phone;
		$mail->Company = $company;
		$mail->Subject = $subject;
		$mail->Body = $msgbody;
		if(!$mail->Send())
		{
		$msj = 0;
		exit;
		}
		else
		$msj=1;
		return $msj;
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
	
	public  function update($aContact)
		{
		 	  $sql="UPDATE  ".$this->tblName." SET corporate_office='".$aContact['corporate_office']."',
			  regional_office='".$aContact['regional_office']."',
			  phone_number_regniol='".$aContact['phone_number_regniol']."',
			  phone_number='".$aContact['phone_number']."',
			  fax='".$aContact['fax']."'
				 WHERE id='".$aContact['id']."'";
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
	public  function updateHeader($aContact)
		{
		 	  $sql="UPDATE  ".$this->tblName." SET header_contact_one='".$aContact['header_contact_one']."',
			  header_contact_two='".$aContact['header_contact_two']."'
				 WHERE id='".$aContact['id']."'";
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