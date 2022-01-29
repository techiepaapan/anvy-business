$(document).ready(function()
{
	
	var base_url=getUrl();
//	loadcategory(base_url);
	$("#addpro_sub").click(function()
	{
		//alert("kk");
		AddReProduct(base_url);
	});
});

function AddReProduct(base_url)
{
	var flg=0;
	var sizearry=[];
    var productname=$("#productname").val();
    var p_code=$("#productcode").val();
    var productprice=$("#productprice").val();
    var productdecription=$("#product_decription").val();
    var quantity=$("#quantity").val();
    var discounted_price=$("#discounted_price").val();
    var delivery_charge=$("#delivery_charge").val();
    
    var pcat=$("#p_cat").val();
    var val1=($("#userfile1").val()).toLowerCase();
    var val2=($("#userfile2").val()).toLowerCase();
    var val3=($("#userfile3").val()).toLowerCase();
    var val4=($("#userfile4").val()).toLowerCase();
    var x = document.getElementsByName("field_name[]");
    var len=x.length;
    var commission=$("#commission").val();
   // alert(len);
    for(var j=0;j<len;j++)
    {
    	var prosize=x[j].value;
    	//alert(prosize);
    	if(prosize=="")
    	{
    		flg++;
    	}
    	else
    	{
    		var obj={};
    		obj['size']=prosize;
    		sizearry.push(obj);
    	}
    }
    //alert(JSON.stringify(sizearry));
	if(productname==""||productprice==""||productdecription==""||p_code==""||quantity==""||discounted_price==""||delivery_charge=='')
	{
		 alertify.error("Enter All Fields");  	
	}
	else if(commission=="" || commission==null || commission<0 || isNaN(commission) || commission>100)
	{
		alertify.error("Invalid Commission<br>Expected Value: 0-100");
	}
	else if(isNaN(productprice)||productprice<0)
	{
		alertify.error("Invalid Price Format"); 
	}
	else if(isNaN(quantity)||quantity<0)
	{
		alertify.error("Invalid Qty Format"); 
	}
	else if(isNaN(discounted_price)||discounted_price<0)
	{
		alertify.error("Invalid Discount Price Format"); 
	}
	else if(isNaN(delivery_charge)||delivery_charge<0)
	{
		alertify.error("Invalid Delivery Charge"); 
	}
	else if(pcat==""||pcat=="Select")
	{
		alertify.error("Select Category Name"); 
	}
	/*else if(flg>0)
	{
		alertify.error("Empty Size Field"); 
	}*/
	else if(val1=="")
	{
		alertify.error("Please Select An Image"); 
	}
	else
	{
		      var file_data1= $('#userfile1').prop('files')[0];
		      var file_data2= $('#userfile2').prop('files')[0];
		      var file_data3= $('#userfile3').prop('files')[0];
		      var file_data4= $('#userfile4').prop('files')[0];
			  var form_data = new FormData();
			    
				form_data.append('productname', productname);
				form_data.append('pcat', pcat);
				form_data.append('p_code', p_code);
				form_data.append('product_decription', productdecription);
				form_data.append('productprice', productprice);
				form_data.append('quantity', quantity);
				form_data.append('discounted_price', discounted_price);
				form_data.append('delivery_charge', delivery_charge);
				form_data.append('commission', commission);
				
				
				form_data.append('sizearray', JSON.stringify(sizearry));
			  form_data.append('userfile1', file_data1);
			  form_data.append('userfile2', file_data2);
			  form_data.append('userfile3', file_data3);
			  form_data.append('userfile4', file_data4);
                          document.getElementById("addpro_sub").disabled = true;
			 $.ajax({
				 url: base_url+"welcome/AddReProAction", // point to server-side controller method
				 dataType: 'json', // what to expect back from the server
			cache: false,
			contentType: false,
				 processData: false,
				 data:form_data,
				beforeSend: function(){
				    $('.ajax-loader').css("visibility", "visible");
				  },
				 type: 'post',
			     success: function (json) {
			    	//alert(json.w);
			    	
			    	if(json.w>0)
	    				{
                         document.getElementById("addpro_sub").disabled = false;
			    	     //	alert("New Product Uploaded");	
						 alertify.success("New Product Uploaded");
							
						setTimeout(function() {location.reload();}, 1100);
	    				}
	    				else
	    				{
                                                 document.getElementById("addpro_sub").disabled = false;
	    					//alert("Product Not Uploaded");	
	    					alertify.error(json.result);
	    				}
					 },
				  complete: function(){
					    $('.ajax-loader').css("visibility", "hidden");
					  }
				 });
		}

		
	}