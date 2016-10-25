<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>LinaDina - admin panel</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="education webs, a fully featured, responsive, HTML5, Bootstrap admin template.">
	<meta name="author" content="Arslan khan">

	<!-- The styles -->
	<link id="" href="<?PHP echo base_url();?>css/admin/bootstrap-cerulean.css" rel="stylesheet">
	<style type="text/css">
	  body {
		padding-bottom: 40px;
	  }
	  .sidebar-nav {
		padding: 9px 0;
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
    <script src="<?PHP echo base_url();?>js/admin/myscriptfile.js"></script>

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- The fav icon -->
	<link rel="shortcut icon" href="<?PHP echo base_url();?>img/favicon.ico">
		
</head>

<body>
	
	
			
			<div id="content" class="span10"  style="margin: 0 auto; float:none;">



			<div class="row-fluid">
				<div class="span12 center login-header">
					<h2>Welcome to  Admin Site</h2>
				</div><!--/span-->
			</div><!--/row-->
			
			<div class="row-fluid">
				<div class="well span5 center login-box" style=" width:51.171%;">
					<?PHP if($msg <> ""){?>
                    <div class="alert alert-info">
						Please login with your Username and Password.
					</div>
                   <?PHP }?> 
					<form class="form-horizontal" action="<?PHP echo base_url();?>admin/login/isvalid" method="post">
                        <?PHP  echo validation_errors(); ?>
                    
                    
						<fieldset>
							<div class="input-prepend" title="Username" data-rel="tooltip">
								<span class="add-on"><i class="icon-user"></i></span>
                               <input autofocus class="input-large span10" name="email" id="email" type="text" value=""  placeholder="Email...."/>
							</div>
							<div class="clearfix"></div>

							<div class="input-prepend" title="Password" data-rel="tooltip">
								<span class="add-on"><i class="icon-lock"></i></span>
                                <input class="input-large span10" name="password" id="password" type="password" value=""  placeholder="password...."/>
							</div>
							<div class="clearfix"></div>
                           

<!--							<div class="input-prepend">
							<label class="remember" for="remember"><input type="checkbox" id="remember" />Remember me</label>
							</div>
							<div class="clearfix"></div>
                             <p class="center span5">
							<a href="<?PHP echo base_url();?>admin/forget">Forget Password ?</a>
							</p>
-->
							<p class="center span5">
							<button type="submit" class="btn btn-primary">Login</button>
							</p>
						</fieldset>
					</form>
				</div><!--/span-->
			</div><!--/row-->
<!---------------------------------Header Code------------------------------------------------------>

			 <br /><br /><br /><br /><br /><br /> <br /><br /><br /><br /><br />
