


			<div>
				<ul class="breadcrumb">
					<li>
						<a href="#">Home</a> <span class="divider">/</span>
					</li>
					<li>
						<!--<a href="<?PHP echo base_url();?>admin/location/viewGameboard">View Game Board</a>-->
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
						<h2><i class="icon-edit"></i>Order Detail</h2>
						<div class="box-icon">
							<!--<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>-->
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							
						</div>
					</div>
					<div class="box-content">
				     
                   <form  name="f1" enctype="multipart/form-data"  method="post"   action="<?PHP echo base_url();?>admin/location/updateGameboard/<?PHP echo $parent_id.'/'.$child_id.'/'.$subchild_id;?>"  class="form-horizontal">
						   <?PHP  echo validation_errors(); ?>
                          <fieldset>
                          <table width="100%" border="1" cellpadding="5" class="table table-striped table-bordered bootstrap-datatable datatable">
                            <tr>  	 	 	 	 	 	 
                              <td>Date</td>
                             <!-- <td>customer_id</td>-->
                              <td>order id</td>
                              <td>product</td>
                              <td>quantity</td>
                              <td>price</td>
                              <td>amount</td>
                             <!-- <td>emp_id</td>-->
                            </tr>
                               <?PHP
				if($data =='N/A'){   
				echo '<tr><td colspan="7">NotFound!</td></tr>';
				}
							else {
				  $i=1;foreach ($data->result() as $result)
				  
				   {?>
                             
                            <tr>
                            
                              <td><?PHP echo $result->date;?></td>
                             <!-- <td><?PHP echo $result->customer_id;?></td>-->
                              <td><?PHP echo $result->order_id;?></td>
                              <td><?PHP echo $result->product;?></td>
                              <td><?PHP echo $result->quantity;?></td>
                              <td><?PHP echo $result->price;?></td>
                              <td><?PHP echo $result->amount;?></td>
                              <!--<td><?PHP echo $result->emp_id;?></td>-->
                            
                            </tr>
                              <?PHP $i++;}
							}
							?>
                          </table>
                          <!--<legend>Datepicker, Autocomplete, WYSIWYG</legend>-->
                    		
                            
                              
                            
							<!--<div class="form-actions">
							  <input type="submit" class="btn btn-primary" value="Save changes">
							  <button type="reset" class="btn">Cancel</button>
							</div>-->
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
			
			
    

    

