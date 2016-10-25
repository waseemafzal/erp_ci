
			<div>
				<ul class="breadcrumb">
					<li>
						<a href="<?PHP echo base_url();?>">Home</a><!-- <span class="divider">/</span>-->
					</li>
					<!--<li>
						<a href="#">Dashboard</a>
					</li>-->
				</ul>
			</div>
			<div class="sortable row-fluid" style="min-height:500px"> 
            <a data-rel="tooltip" title="View Employee" class="well span3 top-block" href="<?PHP echo base_url().'admin/employee_management/view'?>">
					<span class="icon32 icon-color icon-compose"></span>
					<div>View Employee</div><div>&nbsp;</div>
				</a>

				<a data-rel="tooltip" title="Add Employee" class="well span3 top-block" href="<?PHP echo base_url().'admin/employee_management/add'?>">
					<span class="icon32 icon-color icon-book"></span>
					<div>Add Employee</div><div>&nbsp;</div>
				</a>
                <a data-rel="tooltip" title="Company Management" class="well span3 top-block" href="<?PHP echo base_url().'admin/location/view'?>">
					<span class="icon32 icon-color icon-help"></span>
					<div>Company Management</div><div>&nbsp;</div>
				</a>
                 <a data-rel="tooltip" title="Customers Management" class="well span3 top-block" href="<?PHP echo base_url().'admin/location/viewSubcat'?>">
					<span class="icon32 icon-color icon-image"></span>
					<div>Customers</div><div>&nbsp;</div>
				</a>
               <!-- <a data-rel="tooltip" title="Banners" class="well span3 top-block" href="<?PHP echo base_url().'admin/banner/view'?>">
					<span class="icon32 icon-color icon-image"></span>
					<div>Banners</div><div>&nbsp;</div>
				</a>
                -->

		
                
             
                
			</div>
            
           <?php /*?> <div class="sortable row-fluid"> 
				<a data-rel="tooltip" title="Our History,Our team" class="well span3 top-block" href="<?PHP echo base_url().'admin/cms/view'?>">
					<span class="icon32 icon-red icon-user"></span>
					<div>About</div><div>&nbsp;</div>
				</a>

				<a data-rel="tooltip" title="Programs" class="well span3 top-block" href="<?PHP echo base_url().'admin/Success_stories/view'?>">
					<span class="icon32 icon-color  icon-edit"></span>
					<div>Success Stories</div><div>&nbsp;</div>
					
				</a>
                 <a data-rel="tooltip" title="Press Release" class="well span3 top-block" href="<?PHP echo base_url().'admin/media/view'?>">
					<span class="icon32 icon-color icon-video"></span>
					<div> Press Release</div><div>&nbsp;</div>
					
				</a>
                
                <a data-rel="tooltip" title="Programs, Add Packages / Menu" class="well span3 top-block" href="<?PHP echo base_url().'admin/shop/view'?>">
					<span class="icon32 icon-color icon-compose"></span>
					<div>Programs</div><div>&nbsp;</div>
					
				</a>
               <!-- <a data-rel="tooltip" title="Programs" class="well span3 top-block" href="<?PHP echo base_url().'admin/menu/view'?>">
					<span class="icon32 icon-color icon-star-on"></span>
					<div>Menu</div><div>&nbsp;</div>
					
				</a>-->

				<!--<a data-rel="tooltip" title="Shop" class="well span3 top-block" href="<?PHP echo base_url().'admin/shop/view/'?>">
					<span class="icon32 icon-color icon-cart"></span>
					<div>Program's Packages</div><div>&nbsp;</div>
					<div>13320</div>
					<span class="notification yellow">$34</span>
				</a>-->
				
				
             
                
	</div>
	<div class="sortable row-fluid"> 
    <a data-rel="tooltip" title="Healthy Tips" class="well span3 top-block" href="<?PHP echo base_url().'admin/tips/view'?>">
					<span class="icon32 icon-color icon-info"></span>
					<div> Healthy Tips</div><div>&nbsp;</div>
					</a>
                <a data-rel="tooltip" title="Edit Gallery Images" class="well span3 top-block" href="<?PHP echo base_url().'admin/edit-gallery-images'?>">
                <span class="icon32 icon-green icon-image"></span>
                <div> Edit Gallery Images</div><div>&nbsp;</div>
                </a>
                 <a data-rel="tooltip" title="Edit Gallery Images" class="well span3 top-block" href="<?PHP echo base_url().'admin/pr/view'?>">
                    <span class="icon32 icon-orange icon-contacts"></span>
                    <div> PR Coverage</div><div>&nbsp;</div>
                </a>
                 <a data-rel="tooltip" title="Blog" class="well span3 top-block" href="<?PHP echo base_url().'admin/blog/view'?>">
                    <span class="icon32 icon-red icon-comment-text"></span>
                    <div> Blog</div><div>&nbsp;</div>
                </a>
                       
         </div>
                 
         <div class="sortable row-fluid"> 
          <a data-rel="tooltip" title="<?php echo $unread_messages; ?> new messages." class="well span3 top-block" href="<?PHP echo base_url().'admin/cms/viewmessage'?>">
					<span class="icon32 icon-color icon-messages"></span>
					<div> Contact / Meeting Request</div>
					<div><?php echo $total_messages; ?></div>
					<span class="notification red"><?php echo $unread_messages; ?></span>
				</a>
                
                     
 <a data-rel="tooltip" title="Header Phone Numbers" class="well span3 top-block" href="<?PHP echo base_url().'admin/mails_to'?>">
					<span class="icon32 icon-red icon-mail-closed"></span>
					<div> Edit Email Addresses</div><div>&nbsp;</div>
					
				</a>
                <a data-rel="tooltip" title="Edit Contact us Page" class="well span3 top-block" href="<?PHP echo base_url().'admin/contact/index/'?>">
					<span class="icon32 icon-color icon-envelope-closed"></span>
					<div>Edit Contact us Page</div><div>&nbsp;</div>
					<!--<div>25</div>
					<span class="notification red">12</span>-->
				</a>
                 <a data-rel="tooltip" title="Registered Users" class="well span3 top-block" href="<?PHP echo base_url().'admin/user/view'?>">
					<span class="icon32 icon-color icon-users"></span>
					<div> Registered Users</div><div>&nbsp;</div>
					<!--<div><?php echo $total_messages; ?></div>-->
					<!--<span class="notification red"><?php echo $unread_messages; ?></span>-->
				</a>
            </div>
         <div class="sortable row-fluid"> 
          <a data-rel="tooltip" title="<?php echo $total_reviews_un_approved; ?> Unaproved Reviews." class="well span3 top-block" href="<?PHP echo base_url().'admin/cms/viewmessage'?>">
					<span class="icon32 icon-color icon-star-off"></span>
					<div> Reviews </div>
					<div><?php echo $total_reviews_count; ?></div>
					<span class="notification yellow"><?php echo $total_reviews_un_approved; ?></span>
				</a>
                
      
            </div>   <?php */?>
               
        <!-- <div class="sortable row-fluid">        
               
     </div>-->
       

