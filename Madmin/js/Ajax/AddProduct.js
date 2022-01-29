$(document).ready(function()
{
	
	var base_url=getUrl();
	$("#addpro_sub").click(function()
	{
		//alert("kk");
		AddProduct(base_url);
	});

	 $('.szval').keyup(function () {
		var val=$(this).val();
		val=val.split(" ").join("");
		val=val.split(",").join("");
		$(this).val(val);
		});
	 
	
});

function AddProduct(base_url)
{
    var productname=$("#productname").val();
    var p_code=$("#productcode").val();
    var productprice=$("#productprice").val();
    var productbv=$("#productbv").val();
    var productdecription=$("#product_decription").val();
    var quantity=$("#quantity").val();
    var discounted_price=$("#discounted_price").val();
    var val=($("#userfile").val()).toLowerCase();
    
    var cgst=$("#cgst").val();
    var sgst=$("#sgst").val();
    var igst=$("#igst").val();
    
    var size="";
    
    for(var i=1;i<=6;++i){
    	var szval=$("#sz"+i).val();
    	if(szval!=""){
    			size+=szval+",";
    	}
    }
    size = size.replace(/,\s*$/, "");
	if(productname==""||productprice==""||productdecription==""||p_code==""||quantity==""||discounted_price==""||productbv=="")
	{
		 alertify.error("Enter All Fields");  	
	}
	else if(isNaN(productprice)||productprice<0)
	{
		alertify.error("Invalid Price Format"); 
	}
	else if(isNaN(productbv)||productbv<0)
	{
		alertify.error("Invalid BV Point"); 
	}
	else if(isNaN(quantity)||quantity<0)
	{
		alertify.error("Invalid Qty Format"); 
	}
	else if(isNaN(discounted_price)||discounted_price<0)
	{
		alertify.error("Invalid Discount Price Format"); 
	}
	else if(cgst!="" && isNaN(cgst))
	{
		alertify.error("Invalid CGST"); 
	}
	else if(sgst!="" && isNaN(sgst))
	{
		alertify.error("Invalid SGST"); 
	}
	else if(igst!="" && isNaN(igst))
	{
		alertify.error("Invalid IGST"); 
	}
	else
	{
		      var file_data = $('#userfile').prop('files')[0];
			  var form_data = new FormData();
			    
				form_data.append('productname', productname);
				form_data.append('p_code', p_code);
				form_data.append('product_decription', productdecription);
				form_data.append('productprice', productprice);
				form_data.append('productbv', productbv);
				form_data.append('quantity', quantity);
				form_data.append('discounted_price', discounted_price);
				form_data.append('size', size);
				form_data.append('cgst', cgst);
				form_data.append('sgst', sgst);
				form_data.append('igst', igst);
			  form_data.append('userfile', file_data);
			 // alert(base_url+"welcome/AddProAction?productname="+productname+""+product_decription++productprice);
			
           document.getElementById("addpro_sub").disabled = true;
            $.ajax({
				 url: base_url+"welcome/AddProAction", // point to server-side controller method
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
			    	 if(json.w==1)
	    				{
							alertify.success(json.result);			
							setTimeout(function() {location.reload();}, 1500);
	    				}
	    				else
	    				{
                            document.getElementById("addpro_sub").disabled = false;
	    					alertify.error(json.result);
	    				}
					 },
				  complete: function(){
					    $('.ajax-loader').css("visibility", "hidden");
					  }
				 });
		}

		
	}