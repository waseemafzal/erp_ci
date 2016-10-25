


			<div>
				<ul class="breadcrumb">
					<li>
						<a href="#">Home</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="<?PHP echo base_url();?>admin/gallery/index/id/<?php echo $type; ?>">View <?PHP echo $heading;?></a>
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
						<h2><i class="icon-edit"></i>Edit <?PHP echo $heading;?></h2>
						<div class="box-icon">
							<!--<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>-->
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							
						</div>
					</div>
					<div class="box-content">
				     
                   <form  name="f1"  method="post"   action="<?PHP echo base_url();?>admin/gallery/update/id/<?PHP echo $row->id;?>/type/<?php echo $type; ?>"  class="form-horizontal">
						   <?PHP  echo validation_errors(); ?>
                          <fieldset>
							<!--<legend>Datepicker, Autocomplete, WYSIWYG</legend>-->
							<div class="control-group">
							  <label class="control-label" for="typeahead">Title </label>
							  <div class="controls">
                              
								<input type="text" class="span6 typeahead"  name="title" id="title"  data-provide="typeahead" data-items="4" 
                                value="<?PHP if(isset($row)) echo $row->title;?>" >
                                 <span class="help-inline d_n" id="title_e">Please fill out this field</span>
                                 
                                  <input type="hidden"   name="id" id="id"  value="<?PHP if(isset($id)) echo $id;?>" >  
                               
                                 
								
							  </div>
							</div>
							<!--<div class="control-group">
							  <label class="control-label" for="typeahead">Title arabic</label>
							  <div class="controls">
                              
								<input type="text" class="span6 typeahead"  name="title_ar" id="title_ar"  data-provide="typeahead" data-items="4" 
                                value="<?PHP if(isset($row)) echo $row->title_ar;?>" >
                                 <span class="help-inline d_n" id="title_e">Please fill out this field</span>
                                 
                                  <input type="hidden"   name="id" id="id"  value="<?PHP if(isset($id)) echo $id;?>" >  
                               
                                 
								
							  </div>
							</div>-->
                            <div class="control-group">
							  <label class="control-label" for="typeahead">Number of Images</label>
							  <div class="controls">
                              
								<input type="text" class="span6 typeahead"  name="count" id="count"  data-provide="typeahead" data-items="4"   value="<?PHP if(isset($row)) echo $row->count;?>">
                                 <span class="help-inline d_n" id="title_e">Please fill out this field</span>
								
							  </div>
							</div>
							<div class="form-actions">
                            <input type="hidden" name="type" value="<?php echo $type; ?>" />
							  <input type="submit" class="btn btn-primary" value="Save changes">
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->


			<!--/row-->
			
			
    

