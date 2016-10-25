


			<div>
				<ul class="breadcrumb">
					<li>
						<a href="#">Home</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="<?PHP echo base_url();?>admin/menu">Add Category</a>
					</li>
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
						<h2><i class="icon-user"></i> Level Management:   </h2>
						<div class="box-icon">
							
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						
						</div>
					</div>
					<div class="box-content">
						
                        <table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
                                    <th>id</th>
                                   
                                   <th>Level</th>
                                     <th>Game Board Management</th>
                                    <th>Game Board Management</th> 
                                     
                                   <!-- <th>Created Date</th>-->
                                    <th>Status</th>
                                    <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
                            
                <?PHP  //$url =base_url().'index.php/ajax/index';?>           
                <?PHP
				if($data =='N/A'){   
				echo '<tr><td colspan="6">NotFound!</td></tr>';
				}
							else {
				  $i=1;foreach ($data->result() as $result) {?>
                             
                             <tr>
                                    <td><?PHP echo $i;?></td>
                                    
                                    
                                   
                                    
                                    <td class="center"><?PHP echo $result->title;?></td>
                                    <td class="center">
									    <a href="<?PHP echo base_url();?>admin/menu/viewMenuOption/<?PHP echo $result->id;?>" class="btn btn-success">
                                            <i class="icon-zoom-in icon-white"></i>  
                                           	 	edit/View                                           
									   </a>
                                    </td>
                                    <td class="center ">
									    <a href="<?PHP echo base_url();?>admin/menu/addMenuOptions/<?PHP echo $result->id;?>">
                                          <button class="btn btn-large btn-info">Add Game Board</button>                                          
									   </a>
                                    </td>
                                    
                                   <!-- <?PHP /*if($result->menu_item == YES)
										       $inMenu='<span class="label label-success">Yes</span>';
										  else
										       $inMenu='<span class="label label-warning">No</span>';*/
											 
									?>
                                    
                                    <td class="center"><?PHP echo $inMenu ;?></td>-->
                                  <!--  <td class="center"><?PHP echo $result->created_at;?></td>-->
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
                                       onclick="changeStatus('<?PHP echo $result->id;?>','<?PHP echo $result->status;?>','<?PHP echo $tblName;?>');" >
                                          
                                           		 <span class="label <?PHP echo $class;?>"><?PHP echo $text;?></span>
                                            </a>
                                     </span>   
                                    </td> 
                                    <td class="center"> 
                                        <a class="btn btn-info" href="<?PHP  echo base_url().'admin/menu/editSubcat/'.$result->id;?>">
                                            <i class="icon-edit icon-white"></i>  
                                            	Edit                                            
                                        </a>
                                        <a class="btn btn-danger" href="<?PHP  echo base_url().'admin/menu/deleteSubcat/'.$result->id;?>">
                                            <i class="icon-trash icon-white"></i> 
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                            
                            <?PHP $i++;}
							}
							?>
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->

		
    

