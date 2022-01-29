$(document).ready(function()
{
	
	var base_url=getUrl();
	//alert(base_url);
	LoadReProducts(base_url);
	
	$(document).on('click','.editpro',function()
	{
		
		var ids=$(this).attr('id');
		
		EditReProduct(base_url,ids);
		
	});
	
	$(document).on('click','#addprox',function()
	{
		$("#myModal").modal("show");
	});
	
	$(document).on('click',".closepro",function()
	{
		var ids=$(this).attr('id');
		alertify.confirm("Remove This Product?",function(e){
			
			if(e)
				{
				CloseReProduct(base_url,ids);
				}
		});

				
	});

	
    $("#srch").keyup(function(e)
    {
    	ProductSuggestion(base_url,e);
    });

    $("#itemsrch").click(function(e)
    {
    	//alert("k");
    	 productDisplay(base_url,e);
    });
    
});

function LoadReProducts(base_url)
{
	
	$.getJSON(base_url+"welcome/slider2loadreproduct",function(jsn)
	{
		$("#proappend").html("");
			for(var i=0;i<jsn.length;i++)
			{
				//alert(jsn[i].product_discount);
				var disc=parseFloat(jsn[i].product_discount);
				var nprice=0,oldprice=0;
				if(disc<=0)
				{
					nprice=jsn[i].product_price;
					oldprice=jsn[i].product_price;
				}
				else
				{
					nprice=parseFloat(jsn[i].product_price)-parseFloat(jsn[i].product_discount);
					oldprice=jsn[i].product_price;
					nprice=parseFloat(nprice).toFixed(2);
				}
				$("#proappend").append('<tr id="row'+jsn[i].re_product_id+'"><td>'+(i+1)+'</td><td id="name'+jsn[i].re_product_id+'">'+jsn[i].product_name+'</td><td id="code'+jsn[i].re_product_id+'">'+jsn[i].product_code+'</td><td class="deleted"><del id="price'+jsn[i].re_product_id+'">'+oldprice+'</del><span style="display:none;" id="dist'+jsn[i].re_product_id+'">'+jsn[i].product_discount+'</span> <span>'+nprice+'</span></td><td id="qty'+jsn[i].re_product_id+'"><img style="height: 75px;width: 75px;" src="'+base_url+'uploads/'+jsn[i].image1+'" /></td><td><div class="two_btns"><button type="button" class="btn btn-danger closepro" id="close'+jsn[i].id+'"><i class="fa fa-trash" aria-hidden="true"></i></button></div></td> </tr>');
				
			}
		
	
	});

}



function CloseReProduct(base_url,ids)
{
	var clid=ids.slice(5);
	$.getJSON(base_url+"welcome/slider2deletereproduct",{"id":clid},function(jsn)
	{
		if(jsn.length>0)
		{
			location.reload();
		}
		
	});
	
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
		}, delayMillis);
		//arr(searchproduct);
	}
	else if(text=="")
	{
		 $("#prolist").html("");
	}
	else
	{		
			 $("#prolist").html("");	    		
			 $.getJSON(base_url+"welcome/suggestrepro_action/",{"term":text}, function(json)
			 {			
				 $("#prolist").html("");	 
						for(var i=0;i<json.length;i++)
						{
							$("#prolist").append('<option data-value="'+json[i].re_product_id+'" value="'+json[i].product_name+'"></option>');

						}				       				      
			}); 
	}

}
function productDisplay(base_url,e)
{
	var value2send= document.getElementById("srch").value;
	
	$.getJSON(base_url+"welcome/slider2reproductdisplay",{"productid":value2send},function(jsn)
	{
		$("#srch").val("");
		if(jsn[0].res==1)
		{
			var i=0;
			var disc=parseFloat(jsn[0].product_discount);
			var nprice=0,oldprice=0;
			if(disc<=0)
			{
				nprice=jsn[0].product_price;
				oldprice=jsn[0].product_price;
			}
			else
			{
				nprice=parseFloat(jsn[0].product_price)-parseFloat(jsn[i].product_discount);
				oldprice=jsn[0].product_price;
				nprice=parseFloat(nprice).toFixed(2);
			}
			$("#proappend").append('<tr id="row'+jsn[0].re_product_id+'"><td>'+jsn[i].cnt+'</td><td id="name'+jsn[i].re_product_id+'">'+jsn[i].product_name+'</td><td id="code'+jsn[i].re_product_id+'">'+jsn[i].product_code+'</td><td class="deleted"><del id="price'+jsn[i].re_product_id+'">'+oldprice+'</del><span style="display:none;" id="dist'+jsn[i].re_product_id+'">'+jsn[i].product_discount+'</span> <span>'+nprice+'</span></td><td id="qty'+jsn[i].re_product_id+'"><img style="height: 75px;width: 75px;" src="'+base_url+'uploads/'+jsn[i].image1+'" /></td><td><div class="two_btns"><button type="button" class="btn btn-danger closepro" id="close'+jsn[i].id+'"><i class="fa fa-trash" aria-hidden="true"></i></button></div></td> </tr>');
			$("#myModal").modal("hide");
		}
		else if(jsn[0].res==2)
		{
			alertify.error("Product Already Exists");
		}
		else if(jsn[0].res==3)
		{
			alertify.error("Only 10 Products Can Be Added");
		}
		else
		{
			alertify.error("Product Not Found");
		}
		
	});
}
