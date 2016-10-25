


			<div>
				<ul class="breadcrumb">
					<li>
						<a href="#">Home</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="<?PHP echo base_url();?>admin/dashboard/view">View All Dashboard Logo</a>
					</li>
				</ul>
			</div>
            
           
            <?PHP if(isset($msg)){?>
                   <div id="error_div_strip">
                            <div class=" validation-error">
                                <div class="message message-error">
                                    <div class="message-inner">
                                        <div class="<?PHP echo $class;?>">
                                                        <a href="#" id="alert_close" class="btn  btn-round">
                                                                <i class="icon-remove"></i>
                                                        </a>
                                                      <?PHP echo $msg;?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                     </div>
           	 <?PHP }?>
            
            
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-edit"></i>Edit Image and Logo for <?php echo $row->title; ?></h2>
						<div class="box-icon">
							<!--<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>-->
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							
						</div>
					</div>
					<div class="box-content">
				  
                   <form  name="f1"  method="post"   action="<?PHP echo base_url();?>admin/dashboard/update/<?PHP echo $id;?>"  class="form-horizontal" enctype="multipart/form-data">
						   <?PHP  echo validation_errors(); ?>
                          <fieldset>
                            <!--**************** IMages **************-->
                              <div id="images_Field_Cover">
                                <div class="control-group">
                                    <label class="control-label" for="fileInput">Back-Ground Image</label>
                                    <div class="controls">
                                        <input class="input-file uniform_on" id="fileInput" type="file" name="image1" onchange="getImage('fileInput','upload_hidden');">
                          
                            </div>
                                     
                                </div>
                            </div>
                              		 <?PHP if($row->image <>"")
												$image = IMAGES.'gallery/'.$row->image;
													else
												$image = base_url().'img/no_img.jpg';
										?>
                              	
                                <img src="<?PHP echo $image;?>" class="banner">
                           
                            <input type="hidden" name="hidden_img" id="hidden_img" value="<?PHP echo $row->image;?>">  
                            <input type="hidden" name="upload_hidden" id="upload_hidden" value="0">  
                           
													<!--small-image	-->						 
          <div id="images_Field_Cover"> <br> <br>
                                <div class="control-group">
                                    <label class="control-label" for="fileInput"> Logo</label>
                                    <div class="controls">
										<input class="input-file uniform_on" id="fileInput" type="file" name="image2" onchange="getImage('fileInput','upload_hidden');">
                          
                            </div>
                                     
                                </div>
                            </div>
                              		 <?PHP if($row->small_image <>"")
												$image = IMAGES.'gallery/'.$row->small_image;
													else
												$image = base_url().'img/no_img.jpg';
										?>
                              	<div style="background-color:#c1c1f2;">
                                <img src="<?PHP echo $image;?>" height="100" width="100">
                           </div>
                            <input type="hidden" name="hidden_img_small" id="hidden_img_small" value="<?PHP echo $row->small_image;?>">  
                            <input type="hidden" name="upload_hidden_small" id="upload_hidden_small" value="0">  

          											<!--small-image	-->	
          
				
            </div>  		 
									 
									 
									  
							
                            <div class="form-actions">
							  <input type="submit" class="btn btn-primary" value="Save changes">
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->


			<!--/row-->
			
			
    

