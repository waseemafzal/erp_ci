


			<div>
				<ul class="breadcrumb">
					<li>
						<a href="#">Home</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="<?PHP echo base_url();?>admin/location/viewSubcat">View Customers</a>
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
						<h2><i class="icon-edit"></i>Add Customer</h2>
						<div class="box-icon">
							<!--<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>-->
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							
						</div>
					</div>
					<div class="box-content">
				     
                   <form  name="f1"  method="post"   action="<?PHP echo base_url();?>admin/location/saveSubcat"  class="form-horizontal">
						   <?PHP  echo validation_errors(); ?>
                          <fieldset>
                          <div class="control-group">
								<label class="control-label" for="selectError">Select Customer</label>
								<div class="controls">
                                
                                      <select id="cat_id"  name="cat_id">
                                          <option value="">Select Customer</option>
                                            <?PHP 
											 $i=1;foreach ($categories->result() as $result) {?>
                                                	<option value="<?PHP echo $result->id;?>"><?PHP echo $result->title;?></option>
                                              <?PHP };?>
                                      </select>
								</div>
							  </div>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Title </label>
							  <div class="controls">
								<input type="text" class="span6 typeahead"  name="title" id="title"  data-provide="typeahead" data-items="4"  >
                                 <span class="help-inline d_n" id="title_e">Please fill out this field</span>
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
			
			
    

