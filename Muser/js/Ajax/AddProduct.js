

$(document).ready(function()
{
	
	var base_url=getUrl();
	$("#addpro_sub").click(function()
	{
		//alert("kk");
		AddProduct(base_url);
	});
});

function AddProduct(base_url)
{
    var productname=$("#productname").val();
    var productprice=$("#productprice").val();
    var productdecription=$("#product_decription").val();
    var val=($("#userfile").val()).toLowerCase();
   
	if(productname==""||productprice==""||productdecription=="")
	{
		 alertify.error("Enter All Fields");  	
	}
	else if(isNaN(productprice)||productprice<=0)
	{
		alertify.error("Invalid Price Format"); 
	}
	else
	{
		      var file_data = $('#userfile').prop('files')[0];
			  var form_data = new FormData();
			    
				form_data.append('productname', productname);
				form_data.append('product_decription', productdecription);
				form_data.append('productprice', productprice);
			  form_data.append('userfile', file_data);
			 // alert(base_url+"welcome/AddProAction?productname="+productname+""+product_decription++productprice);
			 $.ajax({
				 url: base_url+"welcome/AddProAction", // point to server-side controller method
				 dataType: 'json', // what to expect back from the server
			cache: false,
			contentType: false,
				 processData: false,
				 data:form_data,
				/*beforeSend: function(){
				    $('.ajax-loader').css("visibility", "visible");
				  },*/
				 type: 'post',
			     success: function (json) {
			    	 if(json.w==1)
	    				{
							alertify.success(json.result);			
							setTimeout(function() {location.reload();}, 1500);
	    				}
	    				else
	    				{
	    					alertify.alert(json.result);
	    				}
					 }/*,
				  complete: function(){
					    $('.ajax-loader').css("visibility", "hidden");
					  }*/
				 });
		}

		
	}