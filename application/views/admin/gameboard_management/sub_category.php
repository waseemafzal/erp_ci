			<div>
				<ul class="breadcrumb">
					<li>
						<a href="#">Home</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="<?PHP echo base_url();?>admin/location/viewGameboard">View Orders</a>
					</li>
				</ul>
			</div>
            
            
            <?PHP if(isset($msg)){?>
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
						<h2><i class="icon-edit"></i>Add Order</h2>
						<div class="box-icon">
							<!--<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>-->
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							
						</div>
					</div>
					<div class="box-content">
				     
                   <form  name="f1"  method="post" enctype="multipart/form-data" accept-charset="utf-8"   action="<?PHP echo base_url();?>admin/orderDetail/save"  class="form-horizontal">
						   <?PHP  echo validation_errors(); ?>
                          <fieldset>
                        <div class="col-md-4 col-xs-12 pull-left">
<div class="control-group ">
    <label class="control-label" for="selectError">Company</label>
    <div class="controls">
    
          <select id="cat_id" onchange="get_sub(this.value);"  name="cat_id">
              <option value="">Select Category</option>
                <?PHP 
                 $i=1;foreach ($categories->result() as $result) {?>
                        <option value="<?PHP echo $result->id;?>"><?PHP echo $result->title;?></option>
                  <?PHP };?>
          </select>
    </div>
  </div>
  </div>
                          <div class="col-md-4 col-xs-12 pull-left">
                          <div class="control-group">
                            <label class="control-label" for="selectError"> Customer</label>
                            <div class="controls">
                            
           -                       <select id="subcat_id"  name="subcat_id">
                                      
                                       
                                  </select>
                            </div>
                          </div>
                          </div>
                          <div class="clearfix"></div>
                           <div class="col-md-4 col-xs-12 pull-left">
                       	<div class="control-group">
							  <label class="control-label" for="typeahead">Date </label>
							  <div class="controls">
								<input type="text" class=" typeahead datepicker"  name="date" id="date"  data-provide="typeahead" data-items="4"  >
                                 <span class="help-inline d_n" id="title_e">Please fill out this field</span>
							  </div>
                                  </div>
                                </div>
                                
                             <div class="col-md-4 col-xs-12 pull-left">   
                                 <label class="control-label" for="typeahead">Invoice No </label>
							  <div class="controls">
								<input type="text" class=" typeahead"  name="inv_no" id="inv_no"  data-provide="typeahead" data-items="4"  >
                                 <span class="help-inline d_n" id="title_e">Please fill out this field</span>
							  </div>
							  </div>
                              <div class="clearfix"></div>
                                 <div class="col-md-4 col-xs-12 pull-left">
                            <div class="control-group ">
    <label class="control-label" for="selectError">Employee </label>
    <div class="controls">
    
          <select id="emp_id"  name="emp_id">
              <?PHP 
                 $i=1;foreach ($emp_data->result() as $result) {?>
                        <option value="<?PHP echo $result->id;?>"><?PHP echo $result->emp_name;?></option>
                  <?PHP };?>
               
          </select>
    </div>

  </div>
  </div>
                           <table class="table table-striped table-bordered ">
                          
						  <thead>
							  <tr>
                                    <th>No</th>
                                   <th>Product</th>
                                   <th class="sorting">Quantity</th>
                                    <th class="sorting">Price</th> 
                                    <th>Amount</th> 
                                     
							  </tr>
						  </thead>   
						  <tbody id="inv_detail">
                            <tr>
                                <td>1</td>
                                <td id="td_product">
                                 <select id="product_name"  name="product_name[]">
              <?PHP 
                 $i=1;foreach ($product_data->result() as $result) {?>
                        <option value="<?PHP echo $result->id;?>"><?PHP echo $result->product_name;?></option>
                  <?PHP };?>
               
          </select>
                                </td>
                                <td><input type="text" class="span12 quantity"  name="quantity[]" id="quantity" ></td>
                                <td><input type="text" class="span12 price"  name="price[]" id="price" ></td>
                                <td><input type="text" class="span12 amount" disabled="disabled"  name="amount[]" id="amount" ></td>
                            </tr>
                                
                           </tbody>
                           <tfoot>
                           <tr> 
                                <td colspan="5">
                                    <input type="button" class="btn btn-info" onclick="add_row();" value="Add item">
                                </td>
                            </tr>
                           <tr> 
                                <td colspan="4" >
                                     <b class="pull-right"> Total :</b>
                                </td>
                                <td  >
                                   <b id="Total"></b>
                                </td>
                            </tr>
                           </tfoot>
					  </table>  
                 
                                 
                                
							<div class="form-actions">
							  <input type="submit" class="btn btn-primary" value="Save changes">
							   <!--<a class="btn btn-info" onclick="PrintElem('#inv_detail')" href="javascript:void(0)">
                                            <i class=" icon-print icon-green"></i>  
                                            	                                          
                                        </a>-->
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->

<script>
	function get_sub(id){
	//alert(id);
    $.ajax({
        url: "<?php echo base_url().'admin/location/get_ajax_subcat'; ?>",
        type: 'POST',
		 data: {id: id},
        success: function(response) {
            if (response)
            {   
				//show success message
				$('#subcat_id').html(response);
            }
           }
	 });
	}
	function add_row(id){
	var n =	$('#inv_detail tr').length +1;
	//alert(n);
	
var pro_list = $('#td_product').html();

	var row ='<tr>'+'<td>'+ n +'</td>'+
			'<td>'+pro_list+'</td>'+
			'<td><input type="text" class="span12 quantity"  name="quantity[]" id="quantity" ></td>'+
			'<td><input type="text" class="span12 price"  name="price[]" id="price" ></td>'+
			'<td><input type="text" class="span12 amount "  name="amount[]" id="amount" ></td>'+
	'</tr>';
	$('#inv_detail').append(row);
	}
	
	
		
	
	$(function() {
		$('#inv_detail').delegate('.product_name','change',function(){
		var product_name = $('.product_name:last').val();
		if (product_name !=''){
		//	add_row();
		}
		});
/************************/
		$('#inv_detail').delegate('.price','change',function(){ 
		var tr = $(this).parent().parent();
		var qty = tr.find('.quantity').val()-0;
		var price = tr.find('.price').val()-0;
		var amt = qty * price;
		tr.find('.amount').val(amt);
		var total = 0;
			$ ('.amount').each(function(i,el)
			{
			var amount = $(this).val()-0;
			total +=amount;
			 $('#Total').html(total);
			});
		
		});
		
		// function on quantity
		$('#inv_detail').delegate('.quantity','change',function(){ 
		var tr = $(this).parent().parent();
		var qty = tr.find('.quantity').val()-0;
		var price = tr.find('.price').val()-0;
		var amt = qty * price;
		tr.find('.amount').val(amt);
		var total = 0;
			$ ('.amount').each(function(i,el)
			{
			var amount = $(this).val()-0;
			total +=amount;
			 $('#Total').html(total);
			});
		
		});


	});
		 function PrintElem(elem)
    {
        Popup($(elem).html(),elem);
    }

    function Popup(data,elem) 
    {
        var mywindow = window.open('', 'menu'+elem, 'height=400,width=600');
        mywindow.document.write('<html><head><title>Invoice </title>');
        /*optional stylesheet*/ //mywindow.document.write('<link rel="stylesheet" href="main.css" type="text/css" />');
        mywindow.document.write('</head><body >');
		        mywindow.document.write('<center>');
        mywindow.document.write('<h4>Invoice Detail </h4 ><hr>');
		var company = $('#cat_id').val();
		var subcat_id = $('#subcat_id').val();
		var product_name = $('.product_name').val();
		var quantity = $('.quantity').val();
		var price = $('.price').val();
		var Total = $('#Total').val();
	var data =	'<tr><td>Company<td>'+company+'<td>Customer</td>'+'<td>'+subcat_id+'</td><td>Product_name</td>'+'<td>'+product_name+'</td></tr>';
        mywindow.document.write(data);
		mywindow.document.write('</center>');
        mywindow.document.write('</body></html>');

        mywindow.document.close(); // necessary for IE >= 10
        mywindow.focus(); // necessary for IE >= 10

        mywindow.print();
        mywindow.close();

        return true;
    }
	
</script>
			<!--/row-->
			
			
    

