

			<div>
				<ul class="breadcrumb">
					<li>
						<a href="#">Home</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="<?PHP echo $back_link;?>">Back </a>
					</li>
				</ul>
			</div>
            <?PHP //echo  '<pre>';  print_r($data);echo '</pre>';?>
           
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
						<h2><i class="icon-edit"></i>Edit <?PHP echo $data->title;?> Image</h2>
						<div class="box-icon">
							<!--<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>-->
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							
						</div>
					</div>
					<div class="box-content">
                    
                    <?PHP 
					  /* echo '<pre>';
					   print_r($image_url);
					   
					   echo '</pre>';
					   die('----------');*/
						$imagedata = explode("|",$image_url);
						$image = $imagedata[0];
					$image_url = $imagedata[1];
				$alt_text = $imagedata[2];
					
					?>
                    
                    
				     
 <form  name="f1"  method="post"   
 action="<?PHP echo base_url();?>admin/gallery_images/update/id/<?PHP echo $id;?>/g_id/<?PHP  echo $data->id;?>/url/<?PHP echo $url;?>"  class="form-horizontal" enctype="multipart/form-data">
						 
						<?PHP  echo validation_errors(); ?>
                          <fieldset>
							<!--<legend>Datepicker, Autocomplete, WYSIWYG</legend>-->
							
                            <div id="images_Field_Cover">
                                
                                <div class="control-group">
                                    <label class="control-label" for="fileInput">Image</label>
                                    <div class="controls">
                                        <input class="input-file uniform_on" id="fileInput" type="file" name="image1" onchange="getImage('fileInput','upload_hidden');">
                                        
										<?PHP if($url == URL_TRUE){?>
                             <input type="text" class="span6 typeahead textf_large fr url_f"  name="banner_url"  data-provide="typeahead" data-items="4" 
                                        value="<?PHP echo $image_url;?>"  placeholder="http://www.abcd.com...." title="Enter url" >
                                        <?PHP }?>
                                        
                                        	<!--<a href="javascript:void(0);"  id="firstLink" class="btn btn-mini btn-info" onclick="append_Fields(1);">Add More</a>-->
                                    </div>
                                </div>
								
                            </div>
                            
                            <input class="input-file uniform_on"  type="hidden" id="upload_hidden" name="upload_hidden" value="0">
                            <input class="input-file uniform_on"  type="hidden" name="id" value="<?PHP echo $id;?>">
                            <input class="input-file uniform_on"  type="hidden" name="hidden_img" value="<?PHP echo $image; ?>">
                            	<img src="<?PHP echo base_url().'uploads/gallery/'.$image;?>" height="100" width="100">
                            <input class="input-file uniform_on"  type="hidden" name="max_size" value="<?PHP echo $data->max_width;?>">
                            <input class="input-file uniform_on" type="hidden" name="max_width" value="<?PHP echo $data->max_width;?>">
                            <input class="input-file uniform_on"  type="hidden" name="max_height" value="<?PHP echo $data->max_width;?>">
                            <input class="input-file uniform_on"  type="hidden" name="g_id" value="<?PHP echo $data->id;?>">
                                
                              <div class="control-group">
							  <label class="control-label" for="typeahead">Title</label>
							  <div class="controls">
                              
								<input type="text"  class="span6 typeahead" required  name="alt_text" id="alt_text"  data-provide="typeahead" data-items="4" value="<?PHP  echo $alt_text; ?>" >
                                 <span class="help-inline d_n" id="title_e">Please fill out this field</span>
                              </div>
							</div>
                            <div class="control-group">
							  <label class="control-label" for="typeahead">Title Arabic</label>
							  <div class="controls">
                              
								<input type="text"  class="span6 typeahead" required  name="alt_text_ar" id="alt_text_ar"  data-provide="typeahead" data-items="4" value="<?PHP  echo $alt_text_ar; ?>" >
                                 <span class="help-inline d_n" id="title_e">Please fill out this field</span>
                              </div>
							</div>  
                                
                                
                                
							<div class="form-actions">
							  <input type="submit" class="btn btn-primary" name="submit_btn" value="Save changes">
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->


			<!--/row-->
			
			
    

