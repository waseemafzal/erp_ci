// JavaScript Document
/************************************************************************************************/

  function showError(id){
	  
	 var id;
	 document.getElementById(id).style.display='block';
	 
   }
  
  
  
  
  
  function valid_cms(){
		
			
			if ($('#title').val() == ''){
				bIsValid = false;
				showError('title_e');
			}else
			if ($('#detail').val() == ''){
				bIsValid = false;
				showError('detail_e');
			}
		    
			if( bIsValid ){ 
				return true;
			} 

		 return false;
	} 
		/************************************************************************************************/
	
	
	
	
	function changeBrandColor(colorVal){
		
		var colorVal;
		document.getElementById('brand_color').value= colorVal;
		return  true;
		
	}
	
	
	
	
	
	function changeStatus(id,status,tblName){
					   
					 
				
				var id;
				var status;
				var url = document.getElementById('ajax_url').value;
				var tblName;
				
				//alert('in function');
					  var ajaxRequest;  // The variable that makes Ajax possible!
							 try{
						ajaxRequest = new XMLHttpRequest();
						 }catch (e){
						    // Internet Explorer Browsers
						   try{
							  ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
						   }catch (e) {
							  try{
								 ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
							  }catch (e){
								 // Something went wrong
								 alert("Your browser broke!");
								 return false;
     					 }
   					 }
				 }

             ajaxRequest.onreadystatechange = function(){
				                               
                      if(ajaxRequest.readyState == 4){
						responseText = ajaxRequest.responseText;
							
							document.getElementById('div_status_'+id).innerHTML=responseText;
					    
				}
			 }  
       
            
					var domain =url+"/action/changeStatus/status/"+status+"/id/"+id+"/tblName/"+tblName+"";
					//var domain =url;  
					ajaxRequest.open("GET", domain, true);
					ajaxRequest.send(null); 
								
	  } 
	
	
	function changeOrderStatus(id,status,tblName){
					   
					 
				
				var id;
				var status;
				var url = document.getElementById('ajax_url').value;
				var tblName;
				
				//alert('in function');
					  var ajaxRequest;  // The variable that makes Ajax possible!
							 try{
						ajaxRequest = new XMLHttpRequest();
						 }catch (e){
						    // Internet Explorer Browsers
						   try{
							  ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
						   }catch (e) {
							  try{
								 ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
							  }catch (e){
								 // Something went wrong
								 alert("Your browser broke!");
								 return false;
     					 }
   					 }
				 }

             ajaxRequest.onreadystatechange = function(){
				                               
                      if(ajaxRequest.readyState == 4){
						responseText = ajaxRequest.responseText;
						if(responseText > 0){
						  alert('Status Change Successfully..');	
						}
						
							
						
					    
				}
			 }  
       
            
					var domain =url+"/action/changeOrderStatus/status/"+status+"/id/"+id+"/tblName/"+tblName+"";
					//var domain =url;  
					ajaxRequest.open("GET", domain, true);
					ajaxRequest.send(null); 
								
	  }
	
	
	
	
	    function deleteThisImage(){
					   
				
				
				
				var id = document.getElementById('gallery_id').value;
				
				
				
					  var ajaxRequest;  // The variable that makes Ajax possible!
							 try{
						ajaxRequest = new XMLHttpRequest();
						 }catch (e){
						    // Internet Explorer Browsers
						   try{
							  ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
						   }catch (e) {
							  try{
								 ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
							  }catch (e){
								 // Something went wrong
								 alert("Your browser broke!");
								 return false;
     					 }
   					 }
				 }

             ajaxRequest.onreadystatechange = function(){
				                               
                      if(ajaxRequest.readyState == 4){
						responseText = ajaxRequest.responseText;
							//alert(responseText);
							
							
							if(responseText > 0){
							
								//$("#list_cover_"+id).fadeOut();
								$("#thumbnail_child_"+id).parents('.thumbnail').fadeOut();
								//$('#myModal_del_confirm_box').hide();
							
							
							}
							
				}
			 }  
       
					var url = document.getElementById('ajax_url').value;
					var tblName='tbl_gallery_images';
					var status=1; 
					var domain =url+"/action/deleteThisImage/status/"+status+"/id/"+id+"/tblName/"+tblName+"";
					//var domain =url;
					ajaxRequest.open("GET", domain, true);
					ajaxRequest.send(null); 
								
	  } 
	
	
	
	
	
	
	
	
	
function append_Fields(count){
	
	document.getElementById('firstLink').style.display='none';

	if(count > 1){
		document.getElementById('more_'+count).style.display='none';
	}

var count =count+1;;
$('#images_Field_Cover').append('<div class="control-group"><label class="control-label" for="fileInput">Images</label><div class="controls"><input class="input-file uniform_on" id="fileInput" type="file"  name="image'+count+'"><a href="javascript:void(0);"   id="more_'+count+'" class="btn btn-mini btn-info" onclick="append_Fields('+count+');">Add More</a></div></div>');
}
	
	

                                    
                                    
                                        
   /********************************************My Attributes Js*************3-19-2014***************/ 
         function display_option_block_cover_default(val){
	//alert('mmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm');
	
	//alert('val is'+val);
	
	//return false;
	
	var val ;//alert(val);
	if(val==4 || val==5 || val==6)	
	{    
	    var option_block_cover_default = document.getElementById("option_block_cover_default");
		if(option_block_cover_default != null){
			option_block_cover_default.style.display="block";
		}
	}
	else
	{ 
		 document.getElementById("option_block_cover_default").style.display="none";
		 	document.getElementById('more_option_area').innerHTML = "";
		
	}
	 //return false;
	if(val==4 || val==5 || val==2){
			 // alert('in condition');
		    document.getElementById("is_in_serach").style.display="none";
		}else{ 
			document.getElementById("is_in_serach").style.display="block";
	}
		
}

function append_option(count){
	
	//return false;;
	
	var newFiledNo = document.getElementById('options_count').value;
	newFiledNo = parseInt(newFiledNo) + 1;
	document.getElementById('options_count').value = newFiledNo;


								
								
			//option html var
			var optionHtml='<div id="field_block_'+newFiledNo+'"><div  class="option_covers"><div class="option_covers_box fl"><label class="control-label" for="typeahead">Options  </label><div class="controls"><input type="text" class="span6 typeahead textf_medium "  name="option[]" id="option"  data-provide="typeahead"  data-items="4"></div></div><div class="option_covers_box fl"><label class="control-label my_lable_margin" for="typeahead">Options Arabic</label><div class="controls my_optiion_margin"><input type="text" class="span6 typeahead textf_medium ar"  name="option_ar[]" id="option_ar"  data-provide="typeahead"  data-items="4"></div></div> </div> <input type="button"id="delete_btn" class="btn btn-mini btn-danger" value="delete" onclick="deleteField('+newFiledNo+');"></br> </br></div>';
			
	       $('#more_option_area').append(optionHtml);
			
			
}

function deleteField(count){
	document.getElementById('field_block_'+count).innerHTML = "";
}

function del(count){
	var count;
	alert(count);
	return true;
	//document.getElementById('field_block_'+count).innerHTML = "";
}

   
   /********************************************My Attributes Js*************3-19-2014***************/                                    
   
   function getImage(fileName,hiddenField){
	  // alert('sssssssss');
	   // alert(fileName);
		// alert(hiddenField);
		var fileName;
		var hiddenField;
		var img = document.getElementById(fileName).value;
		if(img !=null){
			document.getElementById(hiddenField).value=1;	
		
		}
	}
					
				
				
				
				
				
	 function getCheckBoxVal(filedId,hiddenfieldId){ // for field check and uncheck
		
				
				var hiddenfieldId;
				if(hiddenfieldId==null){
					hiddenfieldId='hidden_ch_b_f';
				}
				//alert('1'+filedId);
				//alert('2'+hiddenfieldId);
				//return false;
				var filedId;	
				var checkBoxVal =  document.getElementById(filedId).value;
				//var formatstr =  checkBoxVal+'||';
				var formatstr =  '||'+checkBoxVal;
				var checkBoxState =  document.getElementById(filedId);
				var checkBoxHiddenFieldValue  =  document.getElementById(hiddenfieldId).value; 
				
					if(checkBoxState.checked==true){
						var newStr = checkBoxHiddenFieldValue+formatstr;
						
					}else{
						var savedSeats = checkBoxHiddenFieldValue.split('||');
						var rSeatIndex = savedSeats.indexOf(checkBoxVal); 
						savedSeats.splice(rSeatIndex,1);
						var newStr = savedSeats.join('||');
					}
			
			   
			      var newValue =document.getElementById(hiddenfieldId).value=newStr;
		}			
				
				
					
/****************************************************************************************************************/

 function getSubCategories(id,div,tblName){
					   
				//alert('in funchcklhlkjhkl');	 
				
				var id;
				var div;
				var url = document.getElementById('ajax_url').value;
				var tblName;
				
				//alert(id);
				//alert(div);
				//alert(tblName);
				//alert(url);
				//return false;
				
					  var ajaxRequest;  // The variable that makes Ajax possible!
							 try{
						ajaxRequest = new XMLHttpRequest();
						 }catch (e){
						    // Internet Explorer Browsers
						   try{
							  ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
						   }catch (e) {
							  try{
								 ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
							  }catch (e){
								 // Something went wrong
								 alert("Your browser broke!");
								 return false;
     					 }
   					 }
				 }

             ajaxRequest.onreadystatechange = function(){
				                               
                      if(ajaxRequest.readyState == 4){
						responseText = ajaxRequest.responseText;
							//alert(responseText);
							//return false;
							document.getElementById(div).innerHTML=responseText;
					    
				}
			 }  
       
            		var status =0;
					var domain =url+"/action/getSubCategories/status/"+status+"/id/"+id+"/tblName/"+tblName+"";
					//var domain =url;  
					ajaxRequest.open("GET", domain, true);
					ajaxRequest.send(null); 
								
	  }

   
  /*********************Get Attributes************************************/
  function getAttributes(id,div,tblName){
					   
				//alert('in funchcklhlkjhkl');	 
				
				var id;
				var div;
				var url = document.getElementById('ajax_url').value;
				var tblName;
				
				//alert(id);
				//alert(div);
			//	//alert(tblName);
			//	alert(url);
				//return false;
				
					  var ajaxRequest;  // The variable that makes Ajax possible!
							 try{
						ajaxRequest = new XMLHttpRequest();
						 }catch (e){
						    // Internet Explorer Browsers
						   try{
							  ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
						   }catch (e) {
							  try{
								 ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
							  }catch (e){
								 // Something went wrong
								 alert("Your browser broke!");
								 return false;
     					 }
   					 }
				 }

             ajaxRequest.onreadystatechange = function(){
				                               
                      if(ajaxRequest.readyState == 4){
						responseText = ajaxRequest.responseText;
						//	alert(responseText);
							document.getElementById(div).innerHTML=responseText;
					    
				}
			 }  
       
            		var status =0;
					var domain =url+"/action/getAttributes/status/"+status+"/id/"+id+"/tblName/"+tblName+"";
					//var domain =url;  
					ajaxRequest.open("GET", domain, true);
					ajaxRequest.send(null); 
								
	  }
  
  
  function removeThisReply(id){
					   
				//alert('in funchcklhlkjhkl');	 
				
				var id;
				var div;
				var url = document.getElementById('ajax_url').value;
				var tblName ='tbl_review_replys';
				
				if(confirm('Do You Realy Want Delete ?')){
				
					  var ajaxRequest;  // The variable that makes Ajax possible!
							 try{
						ajaxRequest = new XMLHttpRequest();
						 }catch (e){
						    // Internet Explorer Browsers
						   try{
							  ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
						   }catch (e) {
							  try{
								 ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
							  }catch (e){
								 // Something went wrong
								 alert("Your browser broke!");
								 return false;
     					 }
   					 }
				 }

             ajaxRequest.onreadystatechange = function(){
				                               
                      if(ajaxRequest.readyState == 4){
						responseText = ajaxRequest.responseText;
							document.getElementById('row_'+id).innerHTML="";
					    
				}
			 }  
       
            		var status =0;
					var domain =url+"/action/removeItem/status/"+status+"/id/"+id+"/tblName/"+tblName+"";
					//var domain =url;  
					ajaxRequest.open("GET", domain, true);
					ajaxRequest.send(null); 
								
	  }
  }
/****************************************************************************************************************/					
					

		
		