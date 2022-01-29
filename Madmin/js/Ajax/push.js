var jarray=[];
$(document).ready(function()
{
	
	var base_url=getUrl();
	
	
	$(document).on("change","#product",function()
	{
		
		getproduct(base_url);
	});
	$(document).on("click",".selectimage",function()
	{
		var val=$(this).attr("value");
		$("#image").html(val);
		$(".aclose").click();
	});
	
	$(document).on("click","#sub",function()
	{
		sendPush(base_url);
	});
	
});

function getproduct(base_url)
{
    var product=$("#product").val();
    

    
    if(product=="")
    {
    	alertify.error("No Product Selected");
    }

    else
    {
    	//alert(base_url+"welcome/reproductdisplay?productid="+product);
    	$.getJSON(base_url+"welcome/reproductdisplay1",{"productid":product},function(jsn)
    			{
    				//alert(JSON.stringify(jsn));
    				$("#imgappend").html("");
    				if(jsn.length>0)
    				{ var i=0;
    					
    					var disc=parseFloat(jsn[i].product_discount);
    					var nprice=0,oldprice=0;
    					var edid=jsn[i].re_product_id;
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
    					//$("#proappend").append('<tr id="row'+jsn[i].re_product_id+'"><td id="name'+jsn[i].re_product_id+'">'+jsn[i].product_name+'</td><td id="code'+jsn[i].re_product_id+'">'+jsn[i].product_code+'</td><td id="des'+jsn[i].re_product_id+'">'+jsn[i].product_description+'</td><td class="deleted"><del  id="price'+jsn[i].re_product_id+'">'+oldprice+'</del><span style="display:none;" id="dist'+jsn[i].re_product_id+'">'+jsn[i].product_discount+'</span> <span>'+nprice+'</span></td><td id="qty'+jsn[i].re_product_id+'">'+jsn[i].product_qty+'<input type="hidden" id="img1'+jsn[i].re_product_id+'" value="'+jsn[i].image1+'" /><input type="hidden" id="img2'+jsn[i].re_product_id+'" value="'+jsn[i].image2+'" /><input type="hidden" id="img3'+jsn[i].re_product_id+'" value="'+jsn[i].image3+'" /><input type="hidden" id="img4'+jsn[i].re_product_id+'" value="'+jsn[i].image4+'" /><input type="hidden" id="cat'+jsn[i].re_product_id+'" value="'+jsn[i].catid+'" /></td><td><div class="two_btns"><button type="button" class="btn btn-primary editpro" id="edit'+jsn[i].re_product_id+'"><i class="fa fa-pencil" aria-hidden="true"></i></button><button type="button" class="btn btn-danger closepro" id="close'+jsn[i].re_product_id+'"><i class="fa fa-trash" aria-hidden="true"></i></button></div></td> </tr>');
    					$("#message").val("Buy "+jsn[i].product_name+" @"+nprice);
    					
    					
    					
    					var num;
    					if((jsn[i].image1!="")&&(jsn[i].image1!=null))
    					{
    						num=1;
    						checkimage(base_url,edid,num);
    					}
    					if((jsn[i].image2!="")&&(jsn[i].image2!=null))
    					{
    						num=2;
    						checkimage(base_url,edid,num);
    					}
    					if((jsn[i].image3!="")&&(jsn[i].image3!=null))
    					{
    						num=3;
    						checkimage(base_url,edid,num);
    					}
    					if((jsn[i].image4!="")&&(jsn[i].image4!=null))
    					{
    						num=4;
    						checkimage(base_url,edid,num);
    					}

    				}
    				else
    				{
    					alertify.error("Product(s) Not Found");
    				}

    				
    			});
		
    }
}


function checkimage(base_url,edid,num)
{
	$.get(base_url+'uploads/product1_'+edid+'_'+num+'.jpeg')
    .done(function() {
		$("#imgappend").append(' <div class="col-sm-3">'+
	                  '   <div class="image-box">'+
	                  '<img style="cursor:pointer;" class="selectimage" value="'+base_url+'uploads/product1_'+edid+'_'+num+'.jpeg" src='+base_url+'uploads/product1_'+edid+'_'+num+'.jpeg>'+
	                   '  </div>'+
			 ' </div>');

    });
}

function sendPush(base_url)
{
        
       var product = $("#product").val();
       var title = $("#title").val();
       var message = $("#message").val();
       var image = $("#image").html();
       
       
   	if(product=="")
	{
		alertify.error("Select Product");
	}
   	else if(title=="")
	{
		alertify.error("Enter Title");
	}
   	else{
   		if(image=="")
   		{
   			image=null;
   		}
   		
   		//alert("Under Testing</br>"+base_url+"push/sendMultiplePush.php?id="+product+"&title="+title+"&message="+message+"&image="+image);
        document.getElementById("sub").disabled = true;
        $(".printmsg").css("color","red");
        $(".printmsg").html("Processing");
	$.ajax({
	    type: "POST",
	    url: base_url+"push/sendMultiplePush.php",
	    dataType: "json",
	    data:{"id":product,"title":title,"message":message,"image":image},
	    success: function(jsn) 
	    {
	    	 $(".printmsg").css("color","green");
	    	 $(".printmsg").html("Done");
	    	document.getElementById("sub").disabled = false;
	    	$("#product").val("");
	        $("#title").val("MASS VENTURE");
	        $("#message").val("");
	        $("#image").html("");
	        $("#imgappend").html("");
         }
	});
   	}
}