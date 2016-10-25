			<div>
				<ul class="breadcrumb">
					<li>
						<a href="#">Home</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="<?PHP echo base_url();?>admin/orderDetail/view">View Orders</a>
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
						<h2><i class="icon-edit"></i>Add Level</h2>
						<div class="box-icon">
							<!--<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>-->
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							
						</div>
					</div>
					<div class="box-content">
				     
                   <form  name="f1"  method="post" enctype="multipart/form-data" accept-charset="utf-8"   action="<?PHP echo base_url();?>admin/location/saveGameboard"  class="form-horizontal">
						   <?PHP  echo validation_errors(); ?>
                          <fieldset>
                          <div class="control-group">
								<label class="control-label" for="selectError">Select Location</label>
								<div class="controls">
                                
                                      <select id="cat_id" onchange="get_sub(this.value);"  name="cat_id">
                                          <option value="">Select Category</option>
                                            <?PHP 
											 $i=1;foreach ($categories->result() as $result) {?>
                                                	<option value="<?PHP echo $result->id;?>"><?PHP echo $result->title;?></option>
                                              <?PHP };?>
                                      </select>
								</div>
							  </div>
                           <div class="control-group">
                            <label class="control-label" for="selectError">Select Level</label>
                            <div class="controls">
                            
                                  <select id="subcat_id"  name="subcat_id">
                                      
                                       
                                  </select>
                            </div>
                          </div>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Game Board </label>
							  <div class="controls">
								<input type="text" class="span6 typeahead"  name="game_board_title" id="game_board_title"  data-provide="typeahead" data-items="4"  >
                                 <span class="help-inline d_n" id="title_e">Please fill out this field</span>
							  </div>
							</div>
                            <!--**************** IMages **************-->
                            
                              <div id="images_Field_Cover">
                                <div class="control-group">
                                    <label class="control-label" for="fileInput">Chose Day Image</label>
                                    <div class="controls">
                                        <input class="input-file uniform_on" id="fileInput" type="file" name="media">
                            </div>
                                </div>
                            </div>
                              <div id="images_Field_Cover">
                                <div class="control-group">
                                    <label class="control-label" for="fileInput">Chose Night Image</label>
                                    <div class="controls">
                                        <input class="input-file uniform_on" id="fileInput" type="file" name="mediaImg">
                            </div>
                                </div>
                            </div>
                            
         
                            <!--**************** IMages **************-->
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
			<!--/row-->
			
			
    

