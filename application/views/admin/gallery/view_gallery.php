


			<div>
				<ul class="breadcrumb">
					<li>
						<a class="btn" href="<?PHP echo base_url();?>admin">Home</a> </span>
					</li>
					<li>
						<a class="btn" href="<?PHP echo base_url();?>admin/gallery/save/type/<?php echo $type; ?>">Add Record</a>
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
						<h2><i class="icon-user"></i> View <?PHP echo $heading;?></h2>
						<div class="box-icon">
							
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						
						</div>
					</div>
					<div class="box-content">
						
                        <table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
                            <tr>
                                    <th>id</th>
                                    <th>Images</th>
                                     <th>Add</th>
                                    <th>Title</th>
<!--                                    <th>Title Arabic</th>
-->                                    <th>Count</th>
                                    <th>Action</th>
                                   
							  </tr>
						  </thead>   
						  <tbody>
                                
                 <?PHP  //$url =base_url().'admin/ajax/index';?>          
                <?PHP  $i=1;foreach ($data->result() as $result) {?>
                             
                             <tr>
                                    <td><?PHP echo $i;?></td>
                                  
                                    <td class="center">
						<a href="<?PHP echo base_url();?>admin/gallery_images/view/id/<?PHP echo $result->id;?>/url/<?PHP echo $url;?>" class="btn btn-success">
                                            <i class="icon-zoom-in icon-white"></i>  
                                           	 	edit/View Images                                           
									   </a>
                                    </td>
                                    
                                    <td class="center">
									    <a href="<?PHP echo base_url().'admin/gallery_images';?>/index/id/<?PHP echo $result->id;?>/url/<?PHP echo $url;?>" >
                                          <button class="btn btn-large btn-info">Add Images</button>                                          
									   </a>
                                       
                                       
                                    
                                    </td>
                                    
                                    <td class="center"><?PHP echo $result->title;?></td>
<!--                                    <td class="center"><?PHP echo $result->title_ar;?></td>
-->                                    <td class="center"><?PHP echo $result->count;?></td>
                                    <td class="center">
                                    <a class="btn-success btn" href="<?PHP echo base_url();?>admin/gallery/update/id/<?php echo $result->id; ?>/type/<?php echo $type; ?>/">Edit</a>
                                    <a class="btn-danger btn" href="<?PHP echo base_url();?>admin/gallery/delete/id/<?php echo $result->id; ?>/type/<?php echo $type; ?>">Delete</a>
                                    
                                    </td>
                                    <!--<td class="center">
                                   	
                                        
                                        <?PHP /*if($result->status==0){
										       $class="label-important";
											   $text='Inactive';
											   
										}else{
										      $class="label-success";
											  $text='Active';
										}*/
											
										?> 
                                       <a href="javascript:void(0);" 
                                          onclick="changeStatus('<?PHP echo $result->id;?>','<?PHP echo $result->status;?>','<?PHP echo $url;?>','tbl_gallery');"
                                           id="div_status_"<?PHP echo $result->id;?>>
                                           		 <span class="label <?PHP echo $class;?>"><?PHP echo $text;?></span>
                                            </a>
                                        
                                    </td>-->
                                    <!--<td class="center"> 
                                        <a class="btn btn-info" href="<?PHP  echo base_url().'admin/gallery/edit_gallery/id/'.$result->id;?>">
                                            <i class="icon-edit icon-white"></i>  
                                            	Edit                                            
                                        </a>
                                        <a class="btn btn-danger" href="<?PHP  echo base_url().'admin/gallery/delete_gallery/id/'.$result->id;?>">
                                            <i class="icon-trash icon-white"></i> 
                                            Delete
                                        </a>
                                    </td>-->
                                </tr>
                             	
                            <?PHP $i++;}?>
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->

		
    

