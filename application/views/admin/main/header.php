<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title> Admin panel</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="education webs, a fully featured, responsive, HTML5, Bootstrap admin template.">
	<meta name="author" content="waseem afzal">
	<script src="<?PHP echo base_url();?>js/admin/jquery-1.7.2.min.js"></script>

	<!-- The styles -->
	<link id="" href="<?PHP echo base_url();?>css/admin/bootstrap-cerulean.css" rel="stylesheet">
	<style type="text/css">
	  body {
		padding-bottom: 40px;
	  }
	  .sidebar-nav {
		padding: 9px 0;
	  }
	  .hide{
		  display:none;
		  }
		  .banner{
			  width:32%;
			  }
			  

	</style>
	<link href="<?PHP echo base_url();?>css/admin/bootstrap-responsive.css" rel="stylesheet">
	<link href="<?PHP echo base_url();?>css/admin/charisma-app.css" rel="stylesheet">
	<link href="<?PHP echo base_url();?>css/admin/jquery-ui-1.8.21.custom.css" rel="stylesheet">
	<link href="<?PHP echo base_url();?>css/admin/fullcalendar.css" rel="stylesheet">
	<link href="<?PHP echo base_url();?>css/admin/fullcalendar.print.css" rel="stylesheet"  media="print">
	<link href="<?PHP echo base_url();?>css/admin/chosen.css" rel="stylesheet">
	<link href="<?PHP echo base_url();?>css/admin/uniform.default.css" rel="stylesheet">
	<link href="<?PHP echo base_url();?>css/admin/colorbox.css" rel="stylesheet">
	<link href="<?PHP echo base_url();?>css/admin/jquery.cleditor.css" rel="stylesheet">
	<link href="<?PHP echo base_url();?>css/admin/jquery.noty.css" rel="stylesheet">
	<link href="<?PHP echo base_url();?>css/admin/noty_theme_default.css" rel="stylesheet">
	<link href="<?PHP echo base_url();?>css/admin/elfinder.min.css" rel="stylesheet">
	<link href="<?PHP echo base_url();?>css/admin/elfinder.theme.css" rel="stylesheet">
	<link href="<?PHP echo base_url();?>css/admin/jquery.iphone.toggle.css" rel="stylesheet">
	<link href="<?PHP echo base_url();?>css/admin/opa-icons.css" rel="stylesheet">
	<link href="<?PHP echo base_url();?>css/admin/uploadify.css" rel="stylesheet">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="<?PHP echo base_url();?>css/admin/complete.css" rel="stylesheet">
    <script src="<?PHP echo base_url();?>js/admin/myscriptfile.js"></script>

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- The fav icon -->
<!--	<link rel="shortcut icon" href="<?PHP echo base_url();?>img/favicon.png">
-->		
</head>

<body>
	<?php //if(!isset($no_visible_elements) || !$no_visible_elements)	{ ?>
	<!-- topbar starts -->
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
            
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
<a class="brand" href="<?PHP echo base_url();?>admin"> <span>Admin</span></a>				
				
				<!-- theme selector starts -->
				<div class="btn-group pull-right theme-container" >
					<!--<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="icon-tint"></i><span class="hidden-phone"> Change Theme / Skin</span>
						<span class="caret"></span>
					</a>-->
					<ul class="dropdown-menu" id="themes" style="display:none;">
						<li><a data-value="classic" href="#"><i class="icon-blank"></i> Classic</a></li>
						<li><a data-value="cerulean" href="#"><i class="icon-blank"></i> Cerulean</a></li>
						<li><a data-value="cyborg" href="#"><i class="icon-blank"></i> Cyborg</a></li>
						<li><a data-value="redy" href="#"><i class="icon-blank"></i> Redy</a></li>
						<li><a data-value="journal" href="#"><i class="icon-blank"></i> Journal</a></li>
						<li><a data-value="simplex" href="#"><i class="icon-blank"></i> Simplex</a></li>
						<li><a data-value="slate" href="#"><i class="icon-blank"></i> Slate</a></li>
						<li><a data-value="spacelab" href="#"><i class="icon-blank"></i> Spacelab</a></li>
						<li><a data-value="united" href="#"><i class="icon-blank"></i> United</a></li>
					</ul>
				</div>
				<!-- theme selector ends -->
				
				<!-- user dropdown starts -->
				<div class="btn-group pull-right" >
					<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="icon-user"></i><span class="hidden-phone"> admin</span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li><a href="<?PHP echo base_url();?>admin/user/edit">Profile</a></li>
						<li class="divider"></li>
<!--						<li><a href="<?PHP echo base_url();?>admin/contact/">Contact Us</a></li>
						<li><a href="<?PHP echo base_url();?>admin/contact/editHeader">Edit header phone</a></li>
                       

						<li><a href="<?PHP echo base_url();?>admin/mails_to/">Edit mail Addresses</a></li>
-->						<li class="divider"></li>
						<li><a href="<?PHP echo base_url();?>admin/login/logout">Logout</a></li>
					</ul>
				</div>  
				<!-- user dropdown ends -->
				
				<!--<div class="top-nav nav-collapse">
					<ul class="nav">
						<li><a href="<?PHP echo base_url();?>" target="_new">Visit Site</a></li>
						<li>
							<form class="navbar-search pull-left">
								<input placeholder="Search" class="search-query span2" name="query" type="text">
							</form>
						</li>
					</ul>
				</div>--><!--/.nav-collapse -->
			</div>
		</div>
	</div>
	<!-- topbar ends -->
	<?php // } ?>
	<div class="container-fluid">
		<div class="row-fluid">
		<?php //if(!isset($no_visible_elements) || !$no_visible_elements) { ?>
		
			<!-- left menu starts -->
				<div class="span2 main-menu-span">
				<div class="well nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">
						<li class="nav-header hidden-tablet">Main</li>
    <li><a class="ajax-link" href="<?PHP echo base_url();?>admin/dashboard"><i class="icon-home"></i><span class="hidden-tablet"> Dashboard</span></a></li>
           
         
<!--        <li><a class="ajax-link" href="<?PHP echo base_url().'admin/meta/view'?>"><i class="icon-align-justify"></i><span class="hidden-tablet"> Seo tags</span></a></li>
                <li><a class="ajax-link" href="<?PHP echo base_url().'admin/contact/editHeader'?>"><i class="icon-align-justify"></i><span class="hidden-tablet"> Edit Header Phone #</span></a></li>
                 <li><a class="ajax-link" href="<?PHP echo base_url().'admin/cms/editpost/53'?>"><i class="icon-align-justify"></i><span class="hidden-tablet"> Terms & conditions</span></a></li>-->
        <li class="nav-header hidden-tablet">Product Management</li>
        <li><a class="ajax-link" href="<?PHP echo base_url().'admin/product_management/view'?>">
        <i class="icon-eye-open"></i><span class="hidden-tablet"> View/add/edit product</span></a></li> 
       
         <li class="nav-header hidden-tablet">Employee Management</li>
        <li><a class="ajax-link" href="<?PHP echo base_url().'admin/employee_management/view'?>">
        <i class="icon-eye-open"></i><span class="hidden-tablet"> View Employee</span></a></li> 
        <li><a class="ajax-link" href="<?PHP echo base_url().'admin/employee_management/add'?>">
        <i class="icon-eye-open"></i><span class="hidden-tablet"> Add Employee</span></a></li> 
            <li class="nav-header hidden-tablet">Company Management</li>           
        <li><a class="ajax-link" href="<?PHP echo base_url().'admin/location/view'?>">
        <i class="icon-eye-open"></i><span class="hidden-tablet"> Company/Party</span></a></li> 
        
        <li><a class="ajax-link" href="<?PHP echo base_url().'admin/location/viewSubcat'?>">
        <i class="icon-eye-open"></i><span class="hidden-tablet"> Customers</span></a></li> 
           <li class="nav-header hidden-tablet">Order Management</li>
        <li>
        <a class="ajax-link" href="<?PHP echo base_url().'admin/orderDetail/vieworderlist'?>">
        <i class="icon-eye-open"></i><span class="hidden-tablet"> View Orders </span>
        </a>
        </li> 
      
      
       

       <!--        <li><a class="ajax-link" href="<?PHP echo base_url().'admin/order/view'?>"><i class="icon-list"></i><span class="hidden-tablet"> Orders</span></a></li>

              <li><a class="ajax-link" href="<?PHP echo base_url().'admin/order/viewArchive'?>"><i class="icon-list"></i><span class="hidden-tablet"> Archive </span></a></li>

      <!-- <li><a class="ajax-link" href="<?PHP echo base_url().'admin/user/view'?>"><i class="icon-user"></i><span class="hidden-tablet"> Registered User</span></a></li>

       <li><a class="ajax-link" href="<?PHP echo base_url().'admin/socialurl'?>"><i class="icon-heart"></i><span class="hidden-tablet"> Social Url</span></a></li>


      <li>
      	<a class="ajax-link" href="<?PHP echo base_url().'admin/contact/index/'?>">
     		 <i class="icon-envelope"></i><span class="hidden-tablet"> contact</span>
      	</a>
      </li>
<li>
          <a class="ajax-link" href="<?PHP echo base_url().'admin/gallery/index/id/'.SLIDER.'/url/'.URL_FALSE?>">
      		 <i class="icon-eye-open"></i><span class="hidden-tablet"> Gallery</span>
      	 </a>
       </li>

       <li>
          <a class="ajax-link" href="<?PHP echo base_url().'admin/gallery/index/id/'.SLIDER.'/url/'.URL_FALSE?>">
      		 <i class="icon-eye-open"></i><span class="hidden-tablet"> Slider/Gallery</span>
      	 </a>
       </li>
     
       
       <li>
          <a class="ajax-link" href="<?PHP echo base_url().'admin/comment/viewmessage'?>">
      		 <i class="icon-camera"></i><span class="hidden-tablet">Comments</span>
      	 </a>
       </li>
        <li>
          <a class="ajax-link" href="<?PHP echo base_url().'admin/review/viewmessage'?>">
      		 <i class="icon-camera"></i><span class="hidden-tablet">Reviews</span>
      	 </a>
       </li>-->
      
						
					</ul>
					
				</div>
			</div>
			<!-- left menu ends -->
			
			<noscript>
				<div class="alert alert-block span10">
					<h4 class="alert-heading">Warning!</h4>
					<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
				</div>
			</noscript>
			
			<div id="content" class="span10">
			<!-- content starts -->
			<?php //} ?>