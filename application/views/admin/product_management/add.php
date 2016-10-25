


			<div>
				<ul class="breadcrumb">
					<li>
						<a href="#">Home</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="<?PHP echo base_url();?>admin/product_management/view">View products</a>
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
						<h2><i class="icon-edit"></i>Add product </h2>
						<div class="box-icon">
							<!--<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>-->
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							
						</div>
					</div>
					<div class="box-content">
				     
                   <form  name="f1" enctype="multipart/form-data"  method="post"   action="<?PHP echo base_url();?>admin/product_management/save"  class="form-horizontal">
						   <?PHP  echo validation_errors(); ?>
                          <fieldset>
							<!--<legend>Datepicker, Autocomplete, WYSIWYG</legend>-->
                              
							<div class="control-group">
							  <label class="control-label" for="typeahead"> product</label>
							  <div class="controls">
                              
								<input type="text" class="span6 typeahead"  name="product_name" id="product_name"  data-provide="typeahead" data-items="4" >
                                 <span class="help-inline d_n" id="title_e">Please fill out this field</span>
                                 
                               </div>
							</div>
                            
                              <!--**************** PDf file **************-->
                            
                             <?php /*?> <div id="images_Field_Cover">
                                <div class="control-group">
                                    <label class="control-label" for="fileInput">Day  Image</label>
                                    <div class="controls">
                                        <input class="input-file uniform_on" id="fileInput" type="file" name="image1" onchange="getImage('fileInput','upload_hidden');">
                          
                            </div>
                                     
                                </div>
                            </div>
                              		 <?PHP if($row->image1 <>"")
												$image = base_url().$row->image1;
													else
												$image = base_url().'img/no_img.jpg';
										?>
                              	
                                
                             <img src="<?PHP echo $image;?>" height="100" width="100">
                            <input type="hidden" name="hidden_img" id="hidden_img" value="<?PHP echo $row->image1;?>">  
                            <input type="hidden" name="upload_hidden" id="upload_hidden" value="0">  <?php */?>
                            <!--**************** PDf file  end **************-->
													<!--small-image	-->						 
                            <?php /*?>  <div id="images_Field_Cover"> 
                              <br> <br>
                                                    <div class="control-group">
                                                        <label class="control-label" for="fileInput"> Night image</label>
                                                        <div class="controls">
                                                            <input class="input-file uniform_on" id="fileInput" type="file" name="image2" onchange="getImage('fileInput','upload_hidden2');">
                                              
                                                </div>
                                                         
                                                    </div>
                                                </div>
                              		 <?PHP if($row->image2 <>"")
												$mediaImg = base_url().$row->image2;
													else
												$mediaImg = base_url().'img/no_img.jpg';
										?>
                              	
                                <img src="<?PHP echo $mediaImg;?>" height="100" width="100">
                           
                            <input type="hidden" name="hidden_img2" id="hidden_img2" value="<?PHP echo $row->image2;?>">  
                            <input type="hidden" name="upload_hidden2" id="upload_hidden2" value="0">  
<?php */?>
          											<!--small-image	-->	
                            
                            
							<div class="form-actions">
							  <input type="submit" class="btn btn-primary" value="Save changes">
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->

<script>
	function get_sub(id){
	//alert(id);
    $.ajax({
        url: "<?php echo base_url().'admin/location/get_ajax_subcat'; ?>",
        type: 'POST',
		 data: {id: id},
        success: function(response) {
            if (response)
            {   
				//show success message
				$('#subcat_id').html(response);
            }
           }
	 });
	}
</script>
			<!--/row - ->
			
			
    

    

