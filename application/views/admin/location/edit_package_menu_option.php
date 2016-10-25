


			<div>
				<ul class="breadcrumb">
					<li>
						<a href="#">Home</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="<?PHP echo base_url();?>admin/menu/viewPackageMenu/<?PHP if(isset($package_id)) echo $package_id;?>">View Menu</a>
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
						<h2><i class="icon-edit"></i>Add Categories</h2>
						<div class="box-icon">
							<!--<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>-->
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							
						</div>
					</div>
					<div class="box-content">
				     
                   <form  name="f1"  method="post"   action="<?PHP echo base_url();?>admin/menu/updatePackageMenu"  class="form-horizontal">
						   <?PHP  echo validation_errors(); ?>
                          <fieldset>
                           <div class="control-group">
								<label class="control-label" for="selectError" >Select Menu Category</label>
								<div class="controls">
                                
                                      <select id="cat"  name="cat" onChange="getSubCategories(this.value,'0')">
                                          <option value="">Select Category</option>
                                            <?PHP 
											 $i=1;foreach ($category->result() as $result) {?>
                                                	<option value="<?PHP echo $result->id;?>"
                                                   <?PHP  
												   if($result->id== $row->cat){
													   echo 'selected';
													   }
												   ?> 
                                                    ><?PHP echo $result->title;?></option>
                                              <?PHP };?>
                                      </select>
								</div>
							  </div>
                           <div class="control-group">
								<label class="control-label" for="selectError">Select Menu Sub Category</label>
								<div class="controls">
                                
                                      <select id="subcat"  name="subcat" onChange="getSubCategories2(this.value,'0')">
                                          <option value="">Select Sub Category</option>
                                           <optgroup id="subcategory" label=""></optgroup>
                                            
                                      </select>
								</div>
							  </div>
                           <div class="control-group">
								<label class="control-label" for="selectError">Select Menu option</label>
								<div class="controls">
                                
                                      <select id="menu_option"  name="menu_option">
                                         
                                          <optgroup id="subcategory2" label="Select Menu option"></optgroup>
                                      </select>
								</div>
							  </div>      
							<div class="form-actions">
                             <input type="hidden"   name="package_id" id="package_id"  value="<?PHP if(isset($package_id)) echo $package_id;?>" >                               <input type="hidden"   name="id" id="id"  value="<?PHP echo $row->id;?>" >  

							  <input type="submit" class="btn btn-primary" value="Save changes">
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->


			<!--/row-->
		<script type="text/javascript">
$( document ).ready(function() {
       var form_data = {
        parent_id:146,
    };
    $.ajax({
        url: "<?php echo base_url().'waranty/getSubcategory'; ?>",
        type: 'POST',
        data: form_data,
        success: function(msg) {
            if (msg != "no")
            {   
			    
                $('#subcategory').html(msg);
				//$('#ErrorMessage').delay(5000).fadeOut('slow');
            }
                  
        }
	 
    });
});
function getSubCategories(id){
	//alert(id);
	    var form_data = {
        parent_id:id,
    };
    $.ajax({
        url: "<?php echo base_url().'admin/menu/getSubcategory'; ?>",
        type: 'POST',
        data: form_data,
        success: function(msg) {
            if (msg != "no")
            {   
			    $('#subcategory').html(msg);
				
				//$('#ErrorMessage').delay(5000).fadeOut('slow');
            }
           }
	 });
	}
/****************** getSubCategories2 ************************/

function getSubCategories2(id){
//	alert(id);
	    var form_data = {
        parent_id:id,
    };
    $.ajax({
        url: "<?php echo base_url().'admin/menu/getSubcategory2'; ?>",
        type: 'POST',
        data: form_data,
        success: function(msg) {
            if (msg != "no")
            {   $('#prod_name_p').show();
                $('#subcategory2').html(msg);
            }
			 if (msg == "no")
            {   
				//$('#subcategory2').prop('disabled', true);
				$('#subcategory2').html('');
				}
			
                        
        }
	 
    });
	}


/**************************************************************/

</script>	
			
    

