

			<div>
				<ul class="breadcrumb">
					<li>
						<a href="#">Home</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="<?PHP echo $back_link;?>"> Back  <?PHP if($back_title)echo 'To '.$back_title;?></a>
					</li>
				</ul> 
			</div>

			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-picture"></i> <?PHP echo $title;?></h2>
						<div class="box-icon">
					<!--		<a href="#" id="setting_div" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>-->
							<a href="#"    class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<!--<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>-->
						</div>
					</div>
					<div class="box-content">
						<p class="center">
							<button id="toggle-fullscreen" class="btn btn-large btn-primary visible-desktop" data-toggle="button">Toggle Fullscreen</button>
						</p>
						<br/>
						<ul class="thumbnails gallery">
							
                            
                              <?PHP 
							  if($data !='N/A'){ 
							  
							  // $folderName = $title;
							   $i=1;foreach ($data->result() as $result) {?>
                                  <?PHP 
								      
									  $image = base_url().'uploads/gallery/'.$result->image;
									  $breakImage =explode(".",$result->image);
									  $thumbNail = $breakImage[0].'_thumb.'.$breakImage[1];
									  $thumbNailIamge = base_url().'uploads/gallery/'.$thumbNail;
								  
								  
								  ?>
                            <?PHP 
							
							if(isset($g_id))
								$galleryId = $g_id;
							else
								$galleryId = $result->gallery_id;
							
							
							?>
                            	 	
                        <li id="<?php echo $result->id; ?>" class="thumbnail"   value="<?php echo $url; ?>" title="<?php echo $galleryId; ?>">
                        <!--<div id="list_cover_<?php echo $result->id; ?>">-->
                            <a style="background:url(<?PHP echo $thumbNailIamge;?>)" title="<?php echo $result->alt_text; ?>" href="<?PHP echo $image;?>" id="thumbnail_child_<?php echo $result->id;?>">
                                <img class="grayscale" src="<?PHP echo $thumbNailIamge;?>" alt="<?php echo $result->alt_text; ?>">
                            </a>
                         <!--</div>-->
                        </li>
                           
                           <?PHP  }?>
                        <?PHP  }else{echo 'Not Found..!';}?>
                        
                        
						<?PHP ?>
						</ul>
					</div>
				</div><!--/span-->
			
			</div><!--/row-->
    
