$(document).ready(function()
{
	
	var base_url=getUrl();
	LoadProducts(base_url);
	
	$(document).on('click','.editpro',function()
	{
		
		var ids=$(this).val();
		
		EditProduct(base_url,ids);
		
	});
	$(document).on('click',".disablepro",function()
	{
		var ids=$(this).val();
		alertify.confirm("Disable This Product?",function(e)
		{
			if(e)
			{
				var flag=0;
				setProduct(base_url,ids,flag)
			}
		});
	});

	$(document).on('click',".enablepro",function()
	{
		var ids=$(this).val();
		alertify.confirm("Enable This Product?",function(e)
		{
			if(e)
			{
				var flag=1;
				setProduct(base_url,ids,flag)
			}
		});
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
    $("#itemsrch").click(function(e)
    { 	
    	 productDisplay(base_url,e);
    });
    $("#newuserfile").change(function()
    {
    	Browseimage(this);
    });
    
    

	 $('.szval').keyup(function () {
		var val=$(this).val();
		val=val.split(" ").join("");
		val=val.split(",").join("");
		$(this).val(val);
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
		$("#proappend").html("");
		//alert(jsn.length);
		for(var i=0;i<jsn.length;i++)
		{
			var disc=parseFloat(jsn[i].product_discount);
			var nprice=0,oldprice=0;
			if(disc<=0)
			{
				nprice=jsn[i].product_price;
				oldprice=jsn[i].product_price;
			}
			else
			{
				nprice=parseFloat(jsn[i].product_price)-parseFloat(jsn[i].discount_price);
				oldprice=jsn[i].product_price;
				nprice=parseFloat(nprice).toFixed(2);
			}
			if(jsn[i].active==1){
				var statBtn='<button type="button" class="btn btn-danger disablepro" style="margin-left:2px;" value="'+jsn[i].product_id+'">DIS</button>';
			}
			else{
				var statBtn='<button type="button" class="btn btn-info enablepro" style="margin-left:2px;" value="'+jsn[i].product_id+'">EN</button>';			
			}
			$("#proappend").append('<tr id="row'+jsn[i].product_id+'"><td>'+jsn[i].product_name+'</td><td>'+jsn[i].product_code+'</td><td>'+jsn[i].product_description+'</td><td class="deleted"><del>'+oldprice+'</del><span style="display:none;">'+jsn[i].discount_price+'</span><span>'+nprice+'</span></td><td>'+jsn[i].bv+'</td><td>'+jsn[i].pro_qty+'</td><td><div class="two_btns"><button type="button" class="btn btn-primary editpro" value="'+jsn[i].product_id+'"><i class="fa fa-pencil" aria-hidden="true"></i></button>'+statBtn+'</div></td> </tr>');
			
		}
	
	});

}

function EditProduct(base_url,ids)
{
	$("#editproductname").val("");
	$("#editdescription").val("");
	$("#editprice").val("");
	$("#editproductcode").val("");
	$("#edtquantity").val("");
	$("#edtdiscounted").val("");
	$("#product_bv").val("");
	$("#imgbox").html("");
	$("#pid").val("");
	 $.getJSON(base_url+"welcome/getproduct",{"pid":ids}, function(json)
			 {			
				 if(json.length>0){
						$("#myModal").modal("show");
							$("#pid").val(json[0].product_id);
							$("#editproductname").val(json[0].product_name);
							$("#editdescription").val(json[0].product_description);
							$("#editproductcode").val(json[0].product_code);
							$("#edtquantity").val(json[0].pro_qty);
							$("#edtdiscounted").val(json[0].discount_price);
							$("#editprice").val(json[0].product_price);
							$("#product_bv").val(json[0].bv);
							$("#cgst").val(json[0].cgst);
							$("#sgst").val(json[0].sgst);
							$("#igst").val(json[0].igst);
							var size=json[0].pro_size;
							size=size.split(",");
							
							for(var i=0;i<size.length;++i){
								if(size[i]!=""){
									$("#sz"+(i+1)).val(size[i]);
								}
							}
							if($(json[0].image).val()!="")
							{
								$("#imgbox").append( '<img src='+base_url+'uploads/product_'+json[0].product_id+'.jpeg>');
							}
				 }
								       				      
			}); 
	
	
	
}

function setProduct(base_url,ids,flag)
{
	$.getJSON(base_url+"welcome/setproduct",{"id":ids,"flag":flag},function(jsn)
	{
		location.reload();
	});
	
}
function EditLoadProducts(base_url)
{
	var proname=$("#editproductname").val();
	var prodesc=$("#editdescription").val();
	var proprice=$("#editprice").val();
	var code=$("#editproductcode").val();
	var quantity=$("#edtquantity").val();
    var discounted_price=$("#edtdiscounted").val();
    var productbv=$("#product_bv").val();
	var editid=$("#pid").val();
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
    
	if(proname==""||prodesc==""||proprice==""||code==""||quantity==""||discounted_price==""||productbv=="")
	{
		alertify.error("Enter all Fields");
	}
	else if(isNaN(proprice)||proprice<0)
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
		      var file_data = $('#newuserfile').prop('files')[0];
			  var form_data = new FormData();
			    
				form_data.append('productname', proname);
				form_data.append('product_decription', prodesc);
				form_data.append('productid', editid);
				form_data.append('productprice', proprice);
				form_data.append('productbv', productbv);
				form_data.append('code', code);
				form_data.append('quantity', quantity);
				form_data.append('discounted_price', discounted_price);
				form_data.append('newuserfile', file_data);
				form_data.append('size', size);
				form_data.append('cgst', cgst);
				form_data.append('sgst', sgst);
				form_data.append('igst', igst);
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
	//alert();
	//var proname=document.getElementById("srch").text;
	var value2send= document.getElementById("srch").value;
   // alertify.error(shownVal+" - "+value2send);
	//alert(base_url+"welcome/productdisplay?productid="+value2send);
	$.getJSON(base_url+"welcome/productdisplay",{"productid":value2send},function(jsn)
	{
		//alert(JSON.stringify(jsn));
		$("#proappend").html("");

		if(jsn.length>0)
		{
			for(var i=0;i<jsn.length;i++)
			{
			var disc=parseFloat(jsn[i].product_discount);
			var nprice=0,oldprice=0;
			if(disc<=0)
			{
				nprice=jsn[i].product_price;
				oldprice=jsn[i].product_price;
			}
			else
			{
				nprice=parseFloat(jsn[i].product_price)-parseFloat(jsn[i].discount_price);
				oldprice=jsn[i].product_price;
				nprice=parseFloat(nprice).toFixed(2);
			}
			
			if(jsn[i].active==1){
				var statBtn='<button type="button" class="btn btn-danger disablepro" style="margin-left:2px;" value="'+jsn[i].product_id+'">DIS</button>';
			}
			else{
				var statBtn='<button type="button" class="btn btn-info enablepro" style="margin-left:2px;" value="'+jsn[i].product_id+'">EN</button>';			
			}
			$("#proappend").append('<tr id="row'+jsn[i].product_id+'"><td>'+jsn[i].product_name+'</td><td>'+jsn[i].product_code+'</td><td>'+jsn[i].product_description+'</td><td class="deleted"><del>'+oldprice+'</del><span style="display:none;">'+jsn[i].discount_price+'</span><span>'+nprice+'</span></td><td>'+jsn[i].bv+'</td><td>'+jsn[i].pro_qty+'</td><td><div class="two_btns"><button type="button" class="btn btn-primary editpro" value="'+jsn[i].product_id+'"><i class="fa fa-pencil" aria-hidden="true"></i></button>'+statBtn+'</div></td> </tr>');
			}
		}
		else
		{
			alertify.error("Product Not Exists");
		}
		
	});
}