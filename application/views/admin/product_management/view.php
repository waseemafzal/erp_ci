


			<div>
				<ul class="breadcrumb">
					<li>
						<a href="#">Home</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="<?PHP echo base_url();?>admin/product_management/add">Add product</a>
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
						<h2><i class="icon-user"></i> Product Management:   </h2>
						<div class="box-icon">
							
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						
						</div>
                        <a class="btn btn-info pull-right" href="<?PHP echo base_url();?>admin/product_management/add">Add product</a>
					</div>
					<div class="box-content">
						
                        <table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
                                    <th>id</th>
                                   <th>Product Name</th>
<!--                                   <th class="sorting">Level</th>
                                    <th class="sorting">Game board</th> 
                                    <th>Created At</th> 
                                     <th>Status</th>
-->                                    <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
                <?PHP
				if($data =='N/A'){   
				echo '<tr><td colspan="3">NotFound!</td></tr>';
				}
							else {
				  $i=1;foreach ($data->result() as $result)
				  
				   {?>
                             
                             <tr>
                                    <td><?PHP echo $i;?></td>
                                    <td class="center"><?PHP echo $result->product_name ;?></td>
                                   
                                   <?php 
								   
								   /*?> <td class="center"><?PHP echo $result->created_at;?></td>
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
                                    </td> <?php */?>
                                    <td class="center"> 
                                        <a class="btn btn-info" href="<?PHP  echo base_url().'admin/product_management/edit/'.$result->id;?>">
                                            <i class="icon-edit icon-white"></i>  
                                            	Edit                                            
                                        </a>
                                        <a class="btn btn-danger" href="<?PHP  echo base_url().'admin/product_management/delete/'.$result->id;?>">
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
				</div>
			</div>

		
    

