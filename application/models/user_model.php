<?php
	class User_model extends CI_model {
			
			
			private $tblName='tbl_user';
			private $tblCart='tbl_cart';
			private $tblSubscriber='tbl_subscriber';
			private $tblusers='users';
			private $active=1;
			private $unActive=0;
			 
			   function __construct()
				{
				
					parent::__construct();	
				}
	public function save($data_array)
		{
			//
			$email=$data_array['email'];
			 $sql="SELECT email FROM ".$this->tblName." WHERE email='".$email."'";
			$data= $this->db->query($sql);
			if ($data->num_rows()>0)
			{  
			  $result = 2; 
			
			}else{
			  $dbExi=$this->db->insert($this->tblName, $data_array); 
				$result =0;
				if($dbExi){
					$result = 1;
				}
			} 
		 return  $result;
		}
		
		
	public 	function get()
		{
			
         	$sql="SELECT * FROM ".$this->tblName." WHERE  type!='".ADMIN."'";
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
	public 	function get_hash_value($email)
		{
			
         	$sql="SELECT * FROM ".$this->tblName." WHERE  email ='".$email."'";
			$data= $this->db->query($sql);
			if ($data->num_rows()>0)
			{
				return $result =  $data->row();
			}
			else
			{
				return 0;
			}
			
			
		}
		
		
		public 	function getSubscribers()
		{
			
			$sql="SELECT * FROM ".$this->tblSubscriber." WHERE  status='".$this->active."'";
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
		
		
		
		public 	function unSubscribe($email)
		{ 
			$sql="UPDATE  ".$this->tblSubscriber." SET status='".$this->unActive." WHERE email='".$email."'";
			$data= $this->db->query($sql);  
			//true
        }
		
		public function getTemplate($template)
		{
			if($template==1){
				$html = '<html>
				<body>
				<img src="http://www.gr-cdn.com/images/pages/newsletter-templates/messages/59/3/preview/59_big.jpg"/>
				</body>
							</html>';
				}
				else{
					$html = '<html>
				<body>
				<img src="http://partner.graphicmail.com/site/images/features/templates/industries/food_wine_02.jpg"/>
				</body>
							</html>';
				}
					
			return $html;
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
    
	
		/*****************Is User Valid**************************/
		  
		   	
		  
		public function _isValidUser($email,$password)
		{
			$password=md5($password);
			
            $sql="SELECT * FROM ".$this->tblName."  WHERE email='".$email."' AND password='".$password."' AND status='".$this->active."' AND type='".USER."'";
			$data= $this->db->query($sql);
			return $data;
		}
		  
		public function _isValidAdmin($email,$password)
		{
			$password=md5($password);
            $sql="SELECT * FROM ".$this->tblName."  WHERE email='".$email."' AND password='".$password."' AND type='".ADMIN."'";
			$data= $this->db->query($sql);
			return $data;
		}
		  
		
		
		
		/***************************************************************************/
		  public function _isValidEmail($email)
		{
			
            $sql="SELECT * FROM ".$this->tblName."  WHERE email='".$email."'  AND type='".USER."'";  // for admin
			$data= $this->db->query($sql);
			
			if ($data->num_rows()>0)
			{
				$result =  $data->row();
				
				$password = $result->password;
				$email = $result->email;
				//$userName = $result->display_name;
				$userName ='Admin';
				/*******************************************/
				    $this->load->library('email');
					$config['protocol'] = 'mail';
					$config['mailpath'] = '/usr/sbin/sendmail';
					$config['charset'] = 'iso-8859-1';
					$config['mailtype'] = 'html';
					$config['wordwrap'] = TRUE;
					$this->email->initialize($config);
					
					$this->email->from('non-reply@charryq8.com', 'CherryQ8.com');
					$this->email->to($email); 
					$this->email->subject('Paswword Recovey');
					$msg=' Hi,&nbsp;'.$userName.' <br/>
					  Your Password <span style="font-weight:bold">: '.$password.'</span>
					<br/>
					
					<br/>
					Regards,
					<br/>
					cherryq8 team
					';
					$this->email->message($msg);			
					$this->email->send();
				/*******************************************/
				 return 1;	
			}else{
				
			  	return 0;	
			}
			
			
		}
		/***************************************************************************/
		
		
		
		
		/******************************User Forget**************************************/
	  public function _isValidUserEmail($email)
		{
			
             $sql="SELECT * FROM ".$this->tblName."  WHERE email='".$email."'  AND status='".$this->active."' AND type='".USER."'"; // for User
			$data= $this->db->query($sql);
			
			if ($data->num_rows()>0)
			{
				$result =  $data->row();
				
				$password = $result->password;
				$email = $result->email;
				$userName = $result->display_name;
				/*******************************************/
				$this->load->library('email');
				$config['protocol'] = 'mail';
				$config['mailpath'] = '/usr/sbin/sendmail';
				$config['charset'] = 'iso-8859-1';
				$config['mailtype'] = 'html';
				$config['wordwrap'] = TRUE;
				$this->email->initialize($config);
				$this->email->from('non-reply@linasdinas.com', 'linasdinas.com');
				$this->email->to($email); 
				$this->email->subject('Paswword Recovey');
				$msg=' Hi,&nbsp;'.$userName.' <br/>
				Your Password<span style="font-weight:bold">:&nbsp;'.$password.'</span>
				<br/>
				<br/>
				
				Regards,
				<br/>
				cherryq8 team
				';
				$this->email->message($msg);			
				$this->email->send();
				/*******************************************/
				 return 1;	
			}else{
				
			  	return 0;	
			}
			
			
		}
		/****************************User Forget*****************************************/
		
		
		
		
		
		/****************************************************/
		
		
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
	
	public  function update($data,$id)
		{

			$this->db->where('id',$id);
			$result= $this->db->update($this->tblName,$data); 
			
			if ($result)
			{
				return 1;
			}
			else
			{
				
				return 0;
			}
		
			
}
	public  function change_status($id,$data,$table)
		{
			$this->db->where('id',$id);
			$result= $this->db->update($table,$data); 
			$sql="SELECT * FROM ".$table."  WHERE id='".$id."'";
			$data= $this->db->query($sql);
			return $data->row()->status; 
}
		
		public function edit($id)
		{
			
    $sql="SELECT * FROM tbl_user  WHERE id='".$id."'";
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
		
		
		function logout() // user 
		{
			
					
			$userData = array(
						'user_id'  => '',
						'user_name'  => '',
						'email'     => '',
						'user_type'     => '',
						'logged_in_user' => false
					);
				  $this->session->set_userdata($userData);
				  return true;
		}
		
		//admin logout
		
		function _alogout()
		{
			$userData = array(
						'admin_id'  => '',
						'user_name_admin'  => '',
						'type'  => '',
						'logged_in' => false
					);
			$this->session->set_userdata($userData);
			return true;
		}
		
		
     	
		
   public  function _emptyUserItems($id)
		{
			
            $sql="DELETE FROM ".$this->tblCart." WHERE user_id='".$id."'";
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
function verify_user($email) {
        $data = array('status' => 1);
        $this->db->where('email', $email);
        $this->db->update('users', $data);
    }
function send_confirmation() {
      $this->load->library('email');  	//load email library
      $this->email->from('no-reply@etlbna.com', 'Linasdinas'); //sender's email
      $address = $_POST['email'];	//receiver's email
      $subject="Welcome to MySite!";	//subject
      $message= /*-----------email body starts-----------*/
        'Thanks for signing up, '.$_POST['fname'].'!
      
        Your account has been created. 
        Here are your login details.
        -------------------------------------------------
        Email   : ' . $_POST['email'] . '
        Password: ' . $_POST['password'] . '
        -------------------------------------------------
                        
        Please click this link to activate your account:
            
        ' . base_url() . 'index.php/user_registration/verify?' . 
        'email=' . $_POST['email'] . '&hash=' . $this->data['hash'] ;
		/*-----------email body ends-----------*/		      
      $this->email->to($address);
      $this->email->subject($subject);
      $this->email->message($message);
      $this->email->send();
    }
}
?>