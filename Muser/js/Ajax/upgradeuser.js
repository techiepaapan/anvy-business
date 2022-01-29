var prdarr=[];
var totalProductValue=[];
var success=0;
totalProductValue.push({"price":0,"bv":0});
$(document).ready(function()
{
	
	var base_url=getUrl();
	$("#submitt").click(function()
	{
		addproducts(base_url);
	});
	$("#checkuseid").click(function()
	{
		CheckAvailability(base_url);	
	});
	
	

	
	$(document).on("click",".prdbtnsel",function()
			{
				var id=$(this).val();
				success=0;
				if(prdarr.length > 0){
					if(prdarr.indexOf(id)== -1){
						prdarr.push(id);
						calculateProducts(base_url);
						if(success==1){
						$(this).css("background","green");
						$(this).css("color","#fff");
						alertify.success("Added to cart");
						}
						else{
							var index=prdarr.indexOf(id);
							prdarr.splice(index, 1);
						}
					}
					else{
						var index=prdarr.indexOf(id);
						prdarr.splice(index, 1);
						calculateProducts(base_url);
						$(this).css("background","rgb(222, 222, 222)");
						$(this).css("color","rgb(51, 51, 51)");
						alertify.error("Removed from cart");
					}
					
				}
				else{
					prdarr.push(id);
					calculateProducts(base_url);
					if(success==1){
						$(this).css("background","green");
						$(this).css("color","#fff");
						alertify.success("Added to cart");
					}
					else{
						var index=prdarr.indexOf(id);
						prdarr.splice(index, 1);
					}
				}
				
				
			});
	$(document).on("click","#remprod",function()
			{
				alertify.confirm("Remove all products from cart???",function(e){
					
					if(e){
						prdarr=[];
						calculateProducts(base_url);
						$(".prdbtnsel").css("background","rgb(222, 222, 222)");
						$(".prdbtnsel").css("color","rgb(51, 51, 51)");
						alertify.success("Cart Emptied");
					}
				});
				
			});
	
	
});


function calculateProducts(base_url){
	//alert(JSON.stringify(prdarr));
	$.ajax({
	    type: "GET",
	    url: base_url+"welcome/calculateBinaryProducts",		 
	    dataType: "json",
	    data:{"products":JSON.stringify(prdarr)},
	    async:false,   
	    success: function(jsn) 
	    {
	    	if(jsn.length>0){
	    		success=0;
	    		if(isNaN(jsn[0].bv)){
	    			var newbv=currentbv
	    		}
	    		else{
	    			var newbv=currentbv+parseFloat(jsn[0].bv);
	    		}
	    		
	    		//alertify.error(newbv);
	    		//if(newbv<=100){
	    			success=1;
		    		totalProductValue=[];
		    		totalProductValue.push({"price":jsn[0].price,"bv":jsn[0].bv});
		    		$(".ptp").html(jsn[0].price);
		    		$(".pbv").html(jsn[0].bv);
					var amounta=jsn[0].price;
					var deliveryc=0;
						if(amounta>=2700){
					 				deliveryc=200;
					 			}
					 			else if(amounta>=1200 && amounta<2700){
					 				deliveryc=150;
					 			}
					 			else{
					 				deliveryc=100;
					 			}
					if(amounta==0){deliveryc=0;}
					$(".pdc").html(deliveryc);
		    	/*}
	    		else{
	    			success=0;
	    			alertify.error("Cannot Select Total Products Worth More Than 100BV");
	    		}*/
	    	}
	    	else{
	    		totalProductValue=[];
	    		totalProductValue.push({"price":0,"bv":0});
	    		$(".ptp").html(0);
	    		$(".pbv").html(0);
				$(".pdc").html(0);
	    	}
	    }
	});
}


function addproducts(base_url)
{

	if(prdarr.length==0){
		alertify.error("Please Select Product(s)");
	}
	else{
		alertify.confirm("Buy Selected Products?",function(e){
			if(e){
				$.ajax({
				    type: "POST",
				    url: base_url+"welcome/upgradeuser_products",		 
				    dataType: "json",
				    data:{"product":JSON.stringify(prdarr)},
				    async:false,   
				    beforeSend: function(){
				    	 document.getElementById("submitt").disabled = true;
      				  },
				    success: function(jsn) 
				    {
						if(jsn[0].res==0){
							document.getElementById("submitt").disabled = false;
							alertify.error("Error!!!");
						}
						else{
							alert("Products Added For Upgradation");
							location.reload();
						}
						
				    }
		 		 });
			}
		});	
	}
}

function CheckAvailability(base_url)
{
	
	var username=$("#username").val();
	//alert(username);
	if(username=="")
	{
		return "Please Enter UserName";
	}
	else
	{
		//alert(base_url+"welcome/checkavailabes?User="+username);
		$.getJSON(base_url+"welcome/checkavailabes",{"User":username},function(jsn)
		{
			var res=jsn[0].msg;
			//alert(jsn[0].msg);
			if(jsn[0].msg==0)
			{
				alertify.error("Username Already Exists");
			}
			else
			{
				alertify.success("Username Available");
			}
			
		});
	}
}

