<?PHP //die('nnnnnnnnnnnnnnnnn');?>


			<div>
				<ul class="breadcrumb">
					<li>
						<a href="#">Home</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="<?PHP echo $back_link;?>">Back to Project</a>
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
             <?PHP //echo '<pre>';  print_r($data);echo '</pre>';?>
            
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-edit"></i>Add <?PHP echo $data->title;?> Images</h2>
						<div class="box-icon">
							<!--<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>-->
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							
						</div>
					</div>
					<div class="box-content">
				     
 <form name="f1" method="post" action="<?PHP echo base_url();?>admin/product_images/save/id/<?PHP echo $id;?>/url/<?PHP echo $url;?>"  class="form-horizontal" enctype="multipart/form-data">
						   <?PHP  echo validation_errors(); ?>
                          <fieldset>
						 <?PHP  
				 	$counter  =  $data->count - $upload_count;
				    if($counter ==0){ echo $full_upload_msg;}
						 for($i =1; $i <=$counter; $i++){
						   
						   ?>
                           
                           <div id="images_Field_Cover">
                                <div class="control-group">
                                    <label class="control-label" for="fileInput">Images <?PHP echo $i;?></label>
                                    <div class="controls">
                                        <input class="input-file uniform_on" id="fileInput" type="file" name="image<?PHP echo $i;?>">
                          <?PHP if($url == URL_TRUE){?>
                          <input type="text" class="span6 typeahead textf_large fr url_f"  name="banner_url<?PHP echo $i;?>"  data-provide="typeahead" data-items="4" 
                                value=""  placeholder="http://www.abcd.com...." title="Enter url">
                              <?PHP }?>
                            </div>
                                     
                                </div>
                                
                               
                                
                            </div>
                       <?PHP }?>
                           
                            <input class="input-file uniform_on"  type="hidden" name="max_size" value="<?PHP echo $data->max_width;?>">
                            <input class="input-file uniform_on" type="hidden" name="max_width" value="<?PHP echo $data->max_width;?>">
                            <input class="input-file uniform_on"  type="hidden" name="max_height" value="<?PHP echo $data->max_width;?>">
                             <input class="input-file uniform_on"  type="hidden" name="id" value="<?PHP echo $id?>">
                             
                             
                            <!--<div id="images_Field_Cover">
                                
                                <div class="control-group">
                                    <label class="control-label" for="fileInput">Images</label>
                                    <div class="controls">
                                        <input class="input-file uniform_on" id="fileInput" type="file" name="image1">
                                        	<!--<a href="javascript:void(0);"  id="firstLink" class="btn btn-mini btn-info" onclick="append_Fields(1);">Add More</a>
                                    </div>
                                </div>
                                
                            
                            </div>-->
                            
							
                            
                            
                            <?PHP if($counter <>0){?>
                           		 <div class="form-actions">
							  <input type="submit" class="btn btn-primary" name="submit_btn" value="Save changes">
							  <button type="reset" class="btn">Cancel</button>
							</div>
                            <?PHP }?>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->


			<!--/row-->
			
			
    

