		<?php //if(!isset($no_visible_elements) || !$no_visible_elements)	{ ?>
			<!-- content ends -->
			</div><!--/#content.span10-->
		<?php //} ?>
		</div><!--/fluid-row-->
		<?php // if(!isset($no_visible_elements) || !$no_visible_elements)	{ ?>
		
		<hr>

		<!--<div class="modal hide fade" id="myModal">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h3>Settings</h3>
			</div>
			<div class="modal-body">
				<p>Here settings can be configured...</p>
			</div>
			<div class="modal-footer">
				<a href="#" class="btn" data-dismiss="modal">Close</a>
				<a href="#" class="btn btn-primary">Save changes</a>
			</div>
		</div>-->
        
        
        <!--------------------------------------------------------------------------------------------------------------------->
            <div class="modal hide fade" id="myModal_del_confirm_box">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h3>Confirmation</h3>
			</div>
			<div class="modal-body">
				<p>Are you sure to delete.?</p>
			</div>
			<div class="modal-footer">
				<a href="#" class="btn" data-dismiss="modal">Cancel</a>
				<a href="#" class="btn btn-primary" data-dismiss="modal" onclick="deleteThisImage();">Yes</a>
			</div>
		</div>
        <!--------------------------------------------------------------------------------------------------------------------->
        
        
        
        
         <!--------------------------------------------------------------------------------------------------------------------->
                            <div class="modal hide fade" id="reply_box_popup">
                                <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">×</button>
                                <h3>Review Replys</h3>
                                </div>
                                    <div class="modal-body">
                                        <div id="reply_data_div"></div>
                                    
                                    </div>
                                <div class="modal-footer">
                                <a href="#" class="btn btn-primary"   data-dismiss="modal">Okey</a>
                                
                                </div>
                            </div>
        <!--------------------------------------------------------------------------------------------------------------------->
        

            <footer>
            	<p class="pull-left">&copy; <a href="#" target="_blank">Erp Management</a></p>
            	
            </footer>
           
		<?php //} ?>

	</div><!--/.fluid-container-->

	<!-- external javascript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->

	<!-- jQuery -->
	<script src="<?PHP echo base_url();?>js/admin/jquery-1.7.2.min.js"></script>
	<!-- jQuery UI -->
	<script src="<?PHP echo base_url();?>js/admin/jquery-ui-1.8.21.custom.min.js"></script>
	<!-- transition / effect library -->
	<script src="<?PHP echo base_url();?>js/admin/bootstrap-transition.js"></script>
	<!-- alert enhancer library -->
	<script src="<?PHP echo base_url();?>js/admin/bootstrap-alert.js"></script>
	<!-- modal / dialog library -->
	<script src="<?PHP echo base_url();?>js/admin/bootstrap-modal.js"></script>
	<!-- custom dropdown library -->
	<script src="<?PHP echo base_url();?>js/admin/bootstrap-dropdown.js"></script>
	<!-- scrolspy library -->
	<script src="<?PHP echo base_url();?>js/admin/bootstrap-scrollspy.js"></script>
	<!-- library for creating tabs -->
	<script src="<?PHP echo base_url();?>js/admin/bootstrap-tab.js"></script>
	<!-- library for advanced tooltip -->
	<script src="<?PHP echo base_url();?>js/admin/bootstrap-tooltip.js"></script>
	<!-- popover effect library -->
	<script src="<?PHP echo base_url();?>js/admin/bootstrap-popover.js"></script>
	<!-- button enhancer library -->
	<script src="<?PHP echo base_url();?>js/admin/bootstrap-button.js"></script>
	<!-- accordion library (optional, not used in demo) -->
	<script src="<?PHP echo base_url();?>js/admin/bootstrap-collapse.js"></script>
	<!-- carousel slideshow library (optional, not used in demo) -->
	<script src="<?PHP echo base_url();?>js/admin/bootstrap-carousel.js"></script>
	<!-- autocomplete library -->
	<script src="<?PHP echo base_url();?>js/admin/bootstrap-typeahead.js"></script>
	<!-- tour library -->
	<script src="<?PHP echo base_url();?>js/admin/bootstrap-tour.js"></script>
	<!-- library for cookie management -->
	<script src="<?PHP echo base_url();?>js/admin/jquery.cookie.js"></script>
	<!-- calander plugin -->
	<script src='<?PHP echo base_url();?>js/admin/fullcalendar.min.js'></script>
	<!-- data table plugin -->
    <?php if(!$datatable == 1){ { ?>
	<script src='<?PHP echo base_url();?>js/admin/jquery.dataTables.min.js'></script>
<?php } }?>
	<!-- chart libraries start -->
    
	<script src="<?PHP echo base_url();?>js/admin/excanvas.js"></script>
	<script src="<?PHP echo base_url();?>js/admin/jquery.flot.min.js"></script>
	<script src="<?PHP echo base_url();?>js/admin/jquery.flot.pie.min.js"></script>
	<script src="<?PHP echo base_url();?>js/admin/jquery.flot.stack.js"></script>
	<script src="<?PHP echo base_url();?>js/admin/jquery.flot.resize.min.js"></script>
	<!-- chart libraries end -->

	<!-- select or dropdown enhancer -->
	<script src="<?PHP echo base_url();?>js/admin/jquery.chosen.min.js"></script>
	<!-- checkbox, radio, and file input styler -->
	<script src="<?PHP echo base_url();?>js/admin/jquery.uniform.min.js"></script>
	<!-- plugin for gallery image view -->
	<script src="<?PHP echo base_url();?>js/admin/jquery.colorbox.min.js"></script>
	<!-- rich text editor library -->
	<script src="<?PHP echo base_url();?>js/admin/jquery.cleditor.min.js"></script>
	<!-- notification plugin -->
	<script src="<?PHP echo base_url();?>js/admin/jquery.noty.js"></script>
	<!-- file manager library -->
	<script src="<?PHP echo base_url();?>js/admin/jquery.elfinder.min.js"></script>
	<!-- star rating plugin -->
	<script src="<?PHP echo base_url();?>js/admin/jquery.raty.min.js"></script>
	<!-- for iOS style toggle switch -->
	<script src="<?PHP echo base_url();?>js/admin/jquery.iphone.toggle.js"></script>
	<!-- autogrowing textarea plugin -->
	<script src="<?PHP echo base_url();?>js/admin/jquery.autogrow-textarea.js"></script>
	<!-- multiple file upload plugin -->
	<script src="<?PHP echo base_url();?>js/admin/jquery.uploadify-3.1.min.js"></script>
	<!-- history.js for cross-browser state change on ajax -->
	<script src="<?PHP echo base_url();?>js/admin/jquery.history.js"></script>
	<!-- application script for Charisma demo -->
	<script src="<?PHP echo base_url();?>js/admin/charisma.js"></script>
    	
	
	<?php //Google Analytics code for tracking my demo site, you can remove this.
		//if($_SERVER['HTTP_HOST']=='usman.it') { ?>
		<!--<script>
			var _gaq = _gaq || [];
			_gaq.push(['_setAccount', 'UA-26532312-1']);
			_gaq.push(['_trackPageview']);
			(function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(ga);
			})();
		</script>-->
	<?php  //} ?>
     <input type="hidden" name="gallery_id" id="gallery_id" value="" />
	 <input type="hidden" name="ajax_url" id="ajax_url" value="<?PHP echo base_url();?>admin/ajax/index" />
     <input type="hidden" name="base_url" id="base_url" value="<?PHP echo base_url();?>admin/" />
     
     
</body>
</html>
<script>
$(document).ready(function() {
			$('.message_text_suc').delay(2000).fadeOut('slow');
		});
		</script>


