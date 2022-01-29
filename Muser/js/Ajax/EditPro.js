$(document).ready(function()
{
	
	var base_url=getUrl();
	LoadProducts(base_url);
	
	$(document).on('click','.editpro',function()
	{
		
		var ids=$(this).attr('id');
		
		EditProduct(base_url,ids);
		
	});
	$(document).on('click',".closepro",function()
	{
		var ids=$(this).attr('id');
		CloseProduct(base_url,ids);
				
	});
	$(".editclose").click(function(){
		
		$("#editproductname").val("");
		$("#editdescription").val("");
		$("#editprice").val("");
		$("#imgbox").html();
	});
    $("#edit_prosub").click(function(){
		
    	//var ids=$(this).attr('id');
		EditLoadProducts(base_url);
	});
    $("#srch").keyup(function(e)
    {
    	
    	ProductSuggestion(base_url,e);
    });
    $("#srch").on("select",function(e)
    { 	
    	 productDisplay(base_url,e);
    });
    $("#newuserfile").change(function()
    {
    	Browseimage(this);
    });
});
function Browseimage(input) {
	//alert("kk");
	$('#imgbox').html("");
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
           // $('#pic').attr('src', e.target.result);
        	$('#imgbox').append('<img src="'+ e.target.result+'">');
        }

        reader.readAsDataURL(input.files[0]);
    }
}
function LoadProducts(base_url)
{
	
	$.getJSON(base_url+"welcome/loadproducts",function(jsn)
	{
		for(var i=0;i<jsn.length;i++)
		{
			$("#proappend").append('<tr id="row'+jsn[i].product_id+'"><td id="name'+jsn[i].product_id+'">'+jsn[i].product_name+'</td><td id="des'+jsn[i].product_id+'">'+jsn[i].product_description+'</td><td id="price'+jsn[i].product_id+'">'+jsn[i].product_price+'</td><td><button type="button" class="btn btn-primary editpro" id="edit'+jsn[i].product_id+'"><i class="fa fa-pencil" aria-hidden="true"></i></button><button type="button" class="btn btn-danger closepro" id="close'+jsn[i].product_id+'"><i class="fa fa-trash" aria-hidden="true"></i></button></td> </tr>');
			
		}
	
	});

}

function EditProduct(base_url,ids)
{
	$("#editproductname").val("");
	$("#editdescription").val("");
	$("#editprice").val("");
	$("#imgbox").html("");
	$("#myModal").modal("show");
	var edid=ids.slice(4);
	$("#pid").val(edid);
	//alert(edid);
	var proname=$("#name"+edid).text();
	var prodesc=$("#des"+edid).text();
	var proprice=$("#price"+edid).text();
	//alert(proname+"-"+prodesc+"-"+proprice);
	$("#editproductname").val(proname);
	$("#editdescription").val(prodesc);
	$("#editprice").val(proprice);
	$("#imgbox").append( '<img src='+base_url+'uploads/product_'+edid+'.jpeg>');
	
}
function CloseProduct(base_url,ids)
{
	//alert(ids);
	var clid=ids.slice(5);
	$("#row"+clid).remove();
	$.getJSON(base_url+"welcome/deleteproduct",{"id":clid},function(jsn)
	{
		
		location.reload();
	});
	
}
function EditLoadProducts(base_url)
{
	var proname=$("#editproductname").val();
	var prodesc=$("#editdescription").val();
	var proprice=$("#editprice").val();
	var editid=$("#pid").val();
	
	if(proname==""||prodesc==""||proprice=="")
	{
		alertify.error("Enter all Fields");
	}
	else if(isNaN(proprice)||proprice<0)
	{
		alertify.error("Invalid Price Format"); 
	}
	else
	{
		      var file_data = $('#newuserfile').prop('files')[0];
			  var form_data = new FormData();
			    
				form_data.append('productname', proname);
				form_data.append('product_decription', prodesc);
				form_data.append('productid', editid);
				form_data.append('productprice', proprice);
			  form_data.append('newuserfile', file_data);
			$.ajax({
				 url: base_url+"welcome/EditProAction", // point to server-side controller method
				 dataType: 'json', // what to expect back from the server
			cache: false,
			contentType: false,
				 processData: false,
				 data:form_data,
				
				 type: 'post',
			     success: function (json) {
					
					
					if(json.w==1)
    				{
						alertify.success(json.result);
						$("#myModal").modal("hide");			
						setTimeout(function() {location.reload();}, 1500);
    				}
    				else
    				{
    					alertify.alert(json.result);
    				}
					 }
				 });
		}
	
	
}
function ProductSuggestion(base_url,e)
{
	var text=$("#srch").val();
	//alert(text);
	if ((e.which == 38)||(e.which == 40)) {
	}
	else if(e.which == 13)
	{
		var searchproduct=$("#srch").val();
		var delayMillis = 100; //1 second
		setTimeout(function() {
			$("#srch").val(searchproduct);
			//searchproduct=$("#srch").val();
			
		}, delayMillis);
		//arr(searchproduct);
	}
	else if(text=="")
	{
		 $("#prolist").html("");
		 LoadProducts(base_url);
	}
	else
	{		
			 $("#prolist").html("");	    		
			 $.getJSON(base_url+"welcome/suggest_action/",{"term":text}, function(json)
			 {			
				 $("#prolist").html("");	 
						for(var i=0;i<json.length;i++)
						{
							$("#prolist").append('<option data-value="'+json[i].product_id+'" value="'+json[i].product_name+'"></option>');

						}				       				      
			}); 
	}

}
function productDisplay(base_url,e)
{
	//var proname=document.getElementById("srch").text;
	var shownVal= document.getElementById("srch").value;
	var value2send=document.querySelector("#prolist option[value='"+shownVal+"']").dataset.value;
   // alertify.error(shownVal+" - "+value2send);
	//alertify.error(value2send);
	$.getJSON(base_url+"welcome/productdisplay",{"productid":value2send},function(jsn)
	{
		//alert(JSON.stringify(jsn));
		$("#proappend").html("");
		if(jsn[0].result==0)
		{
			
			$("#proappend").append('<tr id="row'+jsn[0].product_id+'"><td id="name'+jsn[0].product_id+'">'+jsn[0].product_name+'</td><td id="des'+jsn[0].product_id+'">'+jsn[0].product_description+'</td><td id="price'+jsn[0].product_id+'">'+jsn[0].product_price+'</td><td><button type="button" class="btn btn-primary editpro" id="edit'+jsn[0].product_id+'"><i class="fa fa-pencil" aria-hidden="true"></i></button><button type="button" class="btn btn-danger closepro" id="close'+jsn[0].product_id+'"><i class="fa fa-trash" aria-hidden="true"></i></button></td> </tr>');
			
		}
		else
		{
			alertify.error("Product Not Exists");
		}
		
	});
}
