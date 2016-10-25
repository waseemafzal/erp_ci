<?PHP 



   if(isset($action)){

	   

	   

	   

	   if($action =='changeStatus'){

			

			if($status ==0){

			 	 $statusIs =1;

				 $class="label-success";

				 $text='Active';

			}else{

				$statusIs =0;

				$class="label-important"; 

				$text='Inactive'; 

			}

		 	$update = mysql_query("UPDATE ".$tblName." SET status='".$statusIs."' WHERE id  = ".$id);?>

		   

			<a href="javascript:void(0);"  onclick="changeStatus('<?PHP echo $id;?>','<?PHP echo $statusIs?>','<?PHP echo $tblName;?>');" >

             	 <span class="label <?PHP echo $class;?>"><?PHP echo $text;?></span>

            </a>

			

			

     <?PHP    }

	   

	   

	    if($action =='deleteThisImage'){

			

			$update = mysql_query("DELETE  FROM  ".$tblName." WHERE id  = ".$id);

			if($update){

		    	echo 1;

			}

			// tbl_gallery_images 

        }

		

		

		

		

		 if($action =='subscriber'){

			   
                 $email = str_replace("_", "@", $email);
				$sql2="SELECT email FROM  ".$tblName." WHERE email='".$email."'";

				$dbExi =mysql_query($sql2); 

					if(mysql_num_rows($dbExi) > 0){

					$msg =2;

					}else{

						$sql1="INSERT INTO ".$tblName."(email,status,created_at)VALUES('".$email."','1',NOW())";

						$dbExi2 =mysql_query($sql1);

							if($dbExi2){

								$msg =1;	

							}

		           }

				//review_list_block

				echo $msg;

		 }

		

		

		

		 if($action =='checkProductQuanity'){

			   

			   		$userSelectecQuantity = $quantity; // user Selected Quantity 

				    $sql2="SELECT quantity FROM  ".$tblName." WHERE id='".$id."'";

					$dbExi =mysql_query($sql2); 

					$msg='';

					if(mysql_num_rows($dbExi) > 0){

						$row = mysql_fetch_array($dbExi);

					    $prodcutCurrentQuantity = $row['quantity']; 

					    $msg=1;  // true case

						

						if($prodcutCurrentQuantity == 0){

							

							$msg=2;  // quantity out of stock

							

						}else{

							if($userSelectecQuantity > $prodcutCurrentQuantity){ // false case

								

								$msg=0;  	

							}

						}

					}

				//review_list_block

				echo $msg;

		 }

		

		

		

		

		

		

		

		

		

		

		  if($action =='removeItem'){

			

			$update = mysql_query("DELETE  FROM  ".$tblName." WHERE id  = ".$id);

			if($update){

		    	echo 1;

			}else

				echo 0;

			

        }

		

		if($action =='removeCompareItem'){  	 	

			

		 	$sql=" DELETE  FROM  ".$tblName." WHERE  user_id=".$userId." AND product_id=".$id."";

					$update = mysql_query($sql);	

			if($update){

		    	echo 1;

			}else

				echo 0;

			

        }

		

		

		

		

		

		

		

		if($action =='updateCartQuntity'){

			

			$update = mysql_query("UPDATE ".$tblName." SET quantity='".$quantity."' WHERE id  = ".$id);

			if($update){

		    	echo 1;

			}

			

        }

		

		if($action =='changeOrderStatus'){

			

			$update = mysql_query("UPDATE ".$tblName." SET status='".$status."' WHERE id  = ".$id);

			if($update){

		    	echo 1;

			}

			

        }

		

		if($action =='likeDisLike'){

			   

					$sql="UPDATE ".$tblName." SET  ".$tblName.".".$column." = ".$tblName.".".$column."  +1 WHERE id=".$id."";

					$update = mysql_query($sql);		

					if($update){

						$sql2="SELECT ".$tblName.".".$column." FROM  ".$tblName." WHERE id='".$id."'";

						$dbExi =mysql_query($sql2); 

						if(mysql_num_rows($dbExi) > 0){

							$row = mysql_fetch_array($dbExi);	

							$columnCount =  $row[$column] ;

							$like=0;

							$dislike=0;

							if($column =='like')

								$like=1;

								else

								$dislike=1;

							

							    $tblT ='tbl_user_review_like_dislike';

							    $sql23="INSERT INTO ".$tblT."(review_id,user_id,product_id,likes,dislike)VALUES

								('".$id."','".$userId."','".$prodcut_id."','".$like."','".$dislike."')";

								mysql_query($sql23); 

								

								

								if($column =='like'){

									$columnCounter='dislike';

									$delemiter='DISLIKE';

								}else{

									$columnCounter='like';

									$delemiter='LIKE';

								}

								

								$sql2="SELECT ".$tblName.".".$columnCounter." FROM  ".$tblName." WHERE id='".$id."'";

								$dbExi =mysql_query($sql2); 

								if(mysql_num_rows($dbExi) > 0){}

								$row = mysql_fetch_array($dbExi);	

								$additionalCount =  $row[$columnCounter] ;

								

							   $columnCount = $columnCount."||".$delemiter.",".$additionalCount;	

								

								

						}

					     

						

						 echo $columnCount;

					}

			

        }

		

		if($action =='getReviewReply'){

			

	   $sql="SELECT `tbl_user`.display_name AS user_name,`tbl_review_replys`.* FROM `tbl_review_replys` 

INNER JOIN `tbl_user` ON `tbl_user`.id = `tbl_review_replys`.user_id 

 WHERE tbl_review_replys.parent_comment_id ='".$id."'  ORDER BY  tbl_review_replys.id  DESC  ";	

 $dbExi =mysql_query($sql); 

 

		 if($dbExi){ 

			 

			if(mysql_num_rows($dbExi) > 0){?>

                <table border="0"  style="width:100%; padding:5px;">

                    <tr><th>User Name</th><th>Comments</th><th> Action</th></tr>

                    <?PHP  while($row = mysql_fetch_array($dbExi)) {?>

                    		<tr align="center" id="row_<?PHP echo $row['id'];?>"><td><?PHP echo $row['user_name'];?></td><td><?PHP echo $row['comments'];?></td>

                            <td> 	<a href="javascript:void(0);"  onclick="removeThisReply('<?PHP echo $row['id'];?>');">

                               			<img src="<?PHP echo base_url();?>img/corssbtn.png" title="del" />

                             		</a>

                             	</td>

                             </tr>

                     <?PHP }  ?>

                </table>

          <?php } else{?>

		   

			  

                    <table border="0" style="width:100%; padding:5px;"> 

                        <tr ><td>Not Found !</td></tr>

                    </table>

		<?PHP }

			

	}

 }

		

		

		

		

		

		 if($action =='saveReview'){

			   

			    $like=0; $disLike=0;

			 	$sql="INSERT INTO ".$tblName."(comments,".$tblName.".like,dislike,product_id,user_id,created_at)VALUES

				('".$commnets."','".$like."','".$disLike."','".$id."','".$userId."',NOW())";

				$dbExi =mysql_query($sql); 

				//review_list_block

				$lastInsertedId  = mysql_insert_id();

				if($dbExi){

				    $sql2="SELECT `tbl_user`.display_name AS user_name,`tbl_reviews`.* FROM `tbl_reviews` 

				INNER JOIN `tbl_user` ON `tbl_user`.id = `tbl_reviews`.user_id

				WHERE tbl_reviews.id ='".$lastInsertedId."' ORDER BY tbl_reviews.id DESC";

					$dbExi2 =mysql_query($sql2); 

					if(mysql_num_rows($dbExi2) > 0){

							$row = mysql_fetch_array($dbExi2);	

							$userName = $row['user_name'];

							$comments = $row['comments'];

							$created_at = $row['created_at'];

							$like = $row['like'];

							$dislike = $row['dislike']; ?>

							

								    <li>

											<p><strong><a href="#"><?PHP echo $userName;?></a></strong></p>

											<span class="date"><?PHP echo $created_at;?></span>

												<i class="icons green icon-thumbs-up-alt"></i>

												<i class="icons sum no-pointer green-sum"><?PHP echo $like;?></i>

												<i class="icons red icon-thumbs-down-alt"></i>

												<i class="icons  sum no-pointer green-sum" ><?PHP echo $dislike;?></i>

												<i class="icons icon-reply"></i>

												

												<div class="rating-box">

													<div class="rating readonly-rating" data-score="4"></div>

												</div>

											<br>

											<p><?PHP echo $comments;?></p>

										</li>

							

							

					<?PHP }

					

				}else

					echo 0;

				

        }

		

		if($action =='submitReviewReply'){

			   

			   

			 	$sql="INSERT INTO ".$tblName."(parent_comment_id,user_id,comments)VALUES

				('".$id."','".$userId."','".$commnets."')";

				$dbExi =mysql_query($sql); 

				

				if($dbExi){

				    		

							echo 1;

							

				}else

					echo 0;

				

        }

		

		

		

		

		

		

		

		 if($action =='contact_from'){

			 

				/*$sql="INSERT INTO tbl_contact(name,email,subject,massage,created_at)VALUES

				('".$contact_name."','".$contact_email."','".$contact_subject."','".$contact_message."',NOW())";

				$dbExi =mysql_query($sql);

				if($dbExi){*/

				    		
					$contact_email = str_replace("_", "@", $contact_email);	
					echo 1;		
                    sendEmail($contact_name,$contact_email,$contact_subject,$contact_message);

					

				//}else

					//echo 0;

				

        }

		

		

		  function sendEmail($contact_name,$contact_email,$contact_subject,$contact_message){

				

				

				     

				     

						$description.="Hi (Admin),".PHP_EOL.PHP_EOL;

						$description.="Welcome to CherryQ8".PHP_EOL.PHP_EOL;

						$description .=$contact_message.PHP_EOL.PHP_EOL.PHP_EOL ;

						

						$description .='Name : '.$contact_name.PHP_EOL;

						$description .='Email : '.$contact_email.PHP_EOL;

						$description .='Subject : '.$contact_subject.PHP_EOL.PHP_EOL.PHP_EOL;

						$description .='Regards,'.PHP_EOL;

						$description .=$contact_name.PHP_EOL.PHP_EOL;

					

						

						$to    = WEBMASTER;

						$subject =$contact_subject;

						$message = $description;

						$headers = 'From:'. $contact_email. "\r\n" .

						'Reply-To:  noreply.com' . "\r\n" .

						'X-Mailer: PHP/' . phpversion();

						$msg=0;

						$emailFunction = mail($to, $subject, $message, $headers);

						if($emailFunction){

							$msg=1;

						}

							

					  return $msg;

			}

		

		

		

		

		

		

		

		

		

		

		

		

		

		if($action =='getSubCategories'){ ?>

			

			<?PHP 

			

			

			

			  $sql = mysql_query("SELECT id,title FROM  ".$tblName." WHERE parent_id = ".$id);

			  

			  if(mysql_num_rows($sql) > 0){ ?>

				  

			

                <div class="control-group">

                    <label class="control-label" for="selectError">Select subCategory</label>

                    <div class="controls">

                    <select id="sub_cate_id"  name="sub_cate_id" 

                     data-rel="chosen" >

                   		 <option value="">Select subCategory</option>

			           <?PHP while($row = mysql_fetch_array($sql)){ ?>

					

					                <option value="<?PHP echo $row['id'];?>"><?PHP echo $row['title'];?></option>

                    	  <?PHP  } ?>

		    		 </select>

                </div>

             </div>

		<?PHP  }else{ ?>

			

			          <div class="control-group">

                            <label class="control-label" for="selectError">Select subCategory</label>

                            <div class="controls">

                            

                            <div style="color:red;"> There is no Category Against This Category.</div>

                            </div>

                        </div>

			

		 <?PHP } ?>

	  <?PHP   }

		

		

		

		/*if($action =='getSubCategories'){ ?>

			

			<?PHP 

			  $sql = mysql_query("SELECT id,title FROM  ".$tblName." WHERE parent_id = ".$id);

			  

			  if(mysql_num_rows($sql) > 0){ ?>

				  

			

                <div class="control-group">

                    <label class="control-label" for="selectError">Select subCategory</label>

                    <div class="controls">

                    <select id="sub_cate_id"  name="sub_cate_id" 

                     data-rel="chosen" onchange="getAttributes(this.value,'subcate_attribute_div','tbl_subcate_attribute')" >>

                   		 <option value="">Select subCategory</option>

			           <?PHP while($row = mysql_fetch_array($sql)){ ?>

					

					                <option value="<?PHP echo $row['id'];?>"><?PHP echo $row['title'];?></option>

                    	  <?PHP  } ?>

		    		 </select>

                </div>

             </div>

		<?PHP  } ?>

	  <?PHP   }*/

		

		

		

		if($action =='getAttributes'){ ?>

			

			<?PHP 

			

			 // $sql = mysql_query("SELECT attribute_id FROM  ".$tblName." WHERE subcat_id = ".$id);

		 	  $sql12 = "SELECT attribute_id FROM ".$tblName." WHERE subcat_id ='".$id."'";

			  $sql = mysql_query($sql12);

			  if(mysql_num_rows($sql) > 0){ ?>

				<?PHP 

				$aAttribute_ids = array();

				while($row22 = mysql_fetch_array($sql)){ 

					

				   $sql1 = "SELECT * FROM tbl_custum_fields WHERE id ='".$row22['attribute_id']."' AND is_in_search='1'";

					$queryExi = mysql_query($sql1);

					

					if(mysql_num_rows($queryExi) > 0){

						$y=1;

					   while($row = mysql_fetch_array($queryExi)){ 

					   

					           $filedId =  $row['id'];

					 		    $question_string = "cf_".$filedId;

					       

							/******code will come*************/

							if($row['field_type_id'] == TEXT_BOX){ ?>

							    

                                <label><?PHP echo $row['field_name'];?></label>

                                <input name="custom[<?PHP echo $question_string;?>]" type="text" value="">

                                <div class="clear"></div>

                                

                             <?PHP }else ?>

							<?PHP  if($row['field_type_id'] == TEXT_AREA){ ?>

                                     

                                    <label><?PHP echo $row['field_name'];?></label>

                                    <textarea name="custom[<?PHP echo $question_string;?>]"></textarea>

                                    <div class="clear"></div>

                                    

                            <?PHP }else 

                                

								if($row['field_type_id'] == SELECT){ 

                                    

									$sql6 = "SELECT * FROM tbl_custum_options WHERE field_id = '".$row['id']."' ";

									$queryExi = mysql_query($sql6);

                                    

									if(mysql_num_rows($queryExi) > 0){

										 while($row4 = mysql_fetch_array($queryExi)){ 

                                             

												$optionsEnglsih_ [] = $row4['option_value'];

												//$optionArabic_[] = $row4['option_value_arabic'];

											

                                          }

												$aOptions_[] = $optionsEnglsih_;				

												//$aOptions_[] = $optionArabic_;

										  ?>

											

                                            <label><?PHP echo $row['field_name'];?></label>

                                            <select class="chosen-select-search" name="custom[<?PHP echo $question_string;?>]" >

                                                 <option>Select option</option>

													  <?PHP for($i=0; $i < sizeof($aOptions_[0]); $i++){?>

                                                        <option value="<?PHP echo $aOptions_[0][$i];?>"><?PHP echo $aOptions_[0][$i];?></option>

                                                    <?PHP }?> 

                                            </select>	

                                        

                                       		<div class="clear">&nbsp;</div>

                                         

										 <?PHP  }  ?>

                    				<?PHP   }

								

			              /******code will come*************/	  

							$y++;}

						}		

				  	}

				

				?>      

		<?PHP  } ?>

	  <?PHP   }

		

		

		

	   

	   

   

   

   

   

   

    }

?>