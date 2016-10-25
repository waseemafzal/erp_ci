

  <script type="text/javascript">
function chekall(){
	 $('.user_td input[type="checkbox"]').prop('checked', true);
	/*var selectedValue = $("#togleAll").val();
	if(selectedValue==0){
		 $('.user_td input[type="checkbox"]').prop('checked', true);
		 $("#togleAll").val('1');
		}
	if(selectedValue==1){
		 $('.user_td input[type="checkbox"]').prop('checked', false);
		 $("#togleAll").val('0');
		}
			
			 */
	}

</script>
			<div>
				<ul class="breadcrumb">
					<li>
						<a href="<?PHP echo base_url();?>">Home</a> <!--<span class="divider">/</span>-->
					</li>
					<!--<li>
						<a href="<?PHP //echo base_url();?>admin/user">Add Cms</a>
					</li>-->
				</ul>
			</div>
			
             <?PHP  if(isset($msg)){?>
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
						<h2><i class="icon-user"></i> User </h2>
						
                      
					</div>
                     <form name="user_form"  method="post" id="user_form" action="<?php echo base_url() ?>admin/user/sendMailtoSelected">
                      
					<div class="box-content">
						
                        
                        <table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
                          <tr >
                          	<th colspan="7">
                            	 <div  class="controls pull-right">
                          <select name="template">
                         <option  value="1">Newsletter one</option>
                         <option  value="2">Newsletter two</option>
                         </select> 
						 <input type="submit" style="margin:0 0 10px 0" class="btn btn-info " name="togleAll" id="togleAll" value="Send "  /> 
                        </div>
                            </th>
                          </tr>
                            <tr> 	 	 	 	 	 	
                                <th> <a href="javascript:void(0)" onclick="chekall();" id="toggle-all">check all</a>
                                
                                <input type="hidden" name="togleAll" id="togleAll" value="0"  />
                                </th>
                                <th>User Name</th>
                                <th>Display Name</th>
                                <th>Email </th>
                                <th>Register Date</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
						  </thead>   
						  <tbody>
                           
                            
                <?PHP  //$url =base_url().'index.php/ajax/index';?>           
                <?PHP  $i=1;foreach ($data->result() as $result) {?>
                             
                                    <tr>
                                        <td class="user_td"><input id="users" class="user_list" name="users_list[]" type="checkbox"  value="<?PHP echo $result->email;?>" />
                                        </td>
                                        <td class="center"><?PHP echo $result->user_name;?></td>
                                        <td class="center"><?PHP echo $result->display_name;?></td>
                                        <td class="center"><?PHP echo $result->email;?></td>
                                        <td class="center"><?PHP echo $result->created_at;?></td>
                                        <td class="center">
                                        
                                        
                                        <?PHP if($result->status==0){
                                        	$class="label-important";
                                        	$text='Inactive';
                                        }else{
                                        	$class="label-success";
                                        	$text='Active';
                                        } 
                                        
                                        ?> 
                                        
                                            <span id="div_status_<?PHP echo $result->id;?>">
                                                <a href="javascript:void(0);"  
                                                    onclick="changeStatus('<?PHP echo $result->id;?>',
                                                    '<?PHP echo $result->status;?>','<?PHP echo $tblName;?>');"> 
                                                    <span class="label <?PHP echo $class;?>"><?PHP echo $text;?></span>
                                                </a>
                                            </span> 
                                        </td> 
                                        <td class="center"> 
                                            <!-- <a class="btn btn-info" href="<?PHP  //echo base_url().'admin/user/edit/id/'.$result->id;?>">
                                            <i class="icon-edit icon-white"></i>  
                                            Edit                                            
                                            </a>-->
                                            <a class="btn btn-danger" href="<?PHP  echo base_url().'admin/user/delete/id/'.$result->id;?>">
                                                <i class="icon-trash icon-white"></i> 
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                            
                            <?PHP $i++;}?>
                         
						  </tbody>
					  </table> 
                                 
					</div>
                       </form>
				</div><!--/span-->
			
			</div><!--/row-->
          

		
    

