


			<div>
				<ul class="breadcrumb">
					<li>
						<a href="#">Home</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="<?PHP echo base_url();?>admin/user/view">View Cms</a>
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
						<h2><i class="icon-edit"></i>Add User</h2>
						<div class="box-icon">
							<!--<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>-->
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							
						</div>
					</div>
					<div class="box-content">
				     
                   <form  name="f1"  method="post"   action="<?PHP echo base_url();?>admin/user/save"  class="form-horizontal">
						   <?PHP  echo validation_errors(); ?>
                          <fieldset>
							<!--<legend>Datepicker, Autocomplete, WYSIWYG</legend>-->
							<div class="control-group">
							  <label class="control-label" for="typeahead">Title </label>
							  <div class="controls">
                              
								<input type="text" class="span6 typeahead"  name="title" id="title"  data-provide="typeahead" data-items="4"  >
                                 <span class="help-inline d_n" id="title_e">Please fill out this field</span>
								
							  </div>
							</div>
                            <div class="control-group">
							  <label class="control-label" for="typeahead">Title arabic </label>
							  <div class="controls">
                              
								<input type="text" class="span6 typeahead ar"  name="title_ar" id="title_ar"  data-provide="typeahead" data-items="4"  >
                                 <span class="help-inline d_n" id="title_e">Please fill out this field</span>
								
							  </div>
							</div>
							
                            
							          
							<div class="control-group"> 
							  <label class="control-label" for="textarea2"> Detail </label>
							  <div class="controls">
								<textarea class="cleditor"  name="description"  id="description" rows="3" ></textarea>
                                <span class="help-inline d_n" id="detail_e">Please fill out this field</span>
							  </div>
							</div>
                            
                            <div class="control-group"> 
							  <label class="control-label" for="textarea2"> Detail Arabic </label>
							  <div class="controls">
								<textarea class="cleditor"  name="description_ar"  id="description_ar" rows="3" ></textarea>
                                <span class="help-inline d_n" id="detail_e">Please fill out this field</span>
							  </div>
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
			
			
    

