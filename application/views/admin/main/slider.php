
									<!-- SLIDE  -->
<div class="slider">
      <div id="coin-slider">				
                                     <?PHP  if($top_slider !='N/A'){ ?>
											<?PHP  $i=1;foreach ($top_slider->result() as $result) {?>
                                            
                                            <?PHP 
												
												if($result->image=="")
													$image='img/slide1.jpg';
												else
													$image=IMAGES.'gallery/'.$result->image;
											   ?>
										<img src="<?PHP echo $image;?>"  alt="slidebg<?PHP echo $i;?>"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
									
									
                                    <?PHP $i++;}?>
                                   <?PHP }else{?> 
                                     
                                      
									
										<img src="img/slide1.jpg"  alt="slidebg1"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
										
									
								 <?PHP }?> </div>
    </div>
    <div class="clr"></div>