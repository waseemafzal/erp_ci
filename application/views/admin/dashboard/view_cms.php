


			<div>
				<ul class="breadcrumb">
					<li>
						<a href="<?PHP echo base_url();?>">Home</a> <!--<span class="divider">/</span>-->
					</li>
					<!--<li>
						<a href="<?PHP //echo base_url();?>admin/cms">Add Cms</a>
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
						<h2><i class="icon-user"></i> Cms pages</h2>
						<div class="box-icon">
							
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						
						</div>
					</div>
					<div class="box-content">
						
                        <table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
                                    <th>id</th>
                                    <th>Title</th>
                                    <th>Logo</th>
                                    <th>Back-ground Image</th>
                                    
                                  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
                            
                <?PHP  //$url =base_url().'index.php/ajax/index';?>           
                <?PHP  $i=1;foreach ($data->result() as $result) {?>
                             
                             <tr>
                                    <td><?PHP echo $i;?></td>
                                   

                                    <td class="center"><?PHP echo $result->title;?></td>
                                      <td class="center" width="30">
                                       <?php
									  if($result->image=="")
										 $image = base_url().'img/no_img.jpg';
										else
										
										  $image = IMAGES.'gallery/'.$result->image;
									  ?>
                                       <img height="30" width="50"  src="<?php echo $image ?>"/>
                                    </td>
                                      <td align="center" class="center" width="120" style="background-color:#c1c1f2;">
                                       <?php
									  if($result->image=="")
										 $image = base_url().'img/no_img.jpg';
										else
										
										  $image = IMAGES.'gallery/'.$result->small_image;
									  ?>
                                       <img height="30" width="50"  src="<?php echo $image ?>"/>
                                    </td>
									<td class="center"> 
                                        <a class="btn btn-info" href="<?PHP  echo base_url().'admin/dashboard/edit/id/'.$result->id;?>">
                                            <i class="icon-edit icon-white"></i>  
                                            	view/Edit Header Images                                            
                                        </a>
                                    </td>
                                </tr>
                            
                            <?PHP $i++;}?>
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->

		
    

