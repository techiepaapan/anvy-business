	var reproductarray=[];
$(document).ready(function()
{

	var base_url=getUrl();
	//alert(base_url);
	loadProductCode(base_url);
	loadAllOrder(base_url);
	$("#p_srch").change(function()
	{
		var val=$("#p_srch").val();
		//alert(val);
		if(val=="All")
			{
			loadAllOrder(base_url);
			}
		else{
		codeChange(base_url);
		}
	});
	$("#process_clk").click(function()
	{
		ProcessOrder(base_url);
	});
});


function loadAllOrder(base_url)
{
	//alert(base_url+"welcome/load_renworder");
	reproductarray=[];
	var flag=0;
$.ajax({
    type: "POST",
    url: base_url+"welcome/load_renworder",		 
    dataType: "json",
    data:{},
   // async:false,   
    success: function(jsn) 
    {
    	$("#orderpalce").html("");
    	if(jsn[0].res>0)
		{
			if(jsn.length>0)
			{
				/*alert(jsn.length);*/
				for(var i=0;i<jsn.length;i++)
				{
					if((jsn[i].re_size==null)||(jsn[i].re_size==""))
					{
						var sizedetails="";
					}
					else
					{
						var sizedetails="  Size:"+jsn[i].re_size;
					}
					var new_commission_tick="";
					if(jsn[i].new_commission==1){
						new_commission_tick='<i class="fa fa-check" aria-hidden="true" style="color:green;"></i>';
					}
					if(reproductarray.length==0)	
					{
						reproductarray.push(jsn[i].repurchase_order_id);
						
						$("#orderpalce").append('<tr><td><input type="checkbox" class="check_state" id="'+jsn[i].repurchase_order_id+'" value="'+jsn[i].repurchase_order_id+'">'+new_commission_tick+'</td><td>REOD'+jsn[i].repurchase_order_id+'</td><th>'+jsn[i].name+'</th><th id="procode'+jsn[i].repurchase_order_id+'">'+jsn[i].product_code+' '+sizedetails+'</th><th>'+jsn[i].address+'</br>'+jsn[i].city+'</br>'+jsn[i].state+'</br>'+jsn[i].country+'</br>Pin:'+jsn[i].pincode+'</br>Mobile:'+jsn[i].mobile+'</th><th>'+jsn[i].order_date+'</th><th>'+jsn[i].username+'</th> </tr>')
					
					}
					else
					{
						var flag=0;
						for(var j=0;j<reproductarray.length;j++)
						{
							//alert(reproductarray);
							//alert(jsn[i].repurchase_order_id);
							if(reproductarray[j]==jsn[i].repurchase_order_id)
							{
								//alert();
								flag=1;
								
								var procode=$("#procode"+jsn[i].repurchase_order_id).text();
								
								var newprocode=procode+",  "+jsn[i].product_code+sizedetails;
								
								$("#procode"+jsn[i].repurchase_order_id).text(newprocode);
							}
						}
						if(flag==0)
						{
							reproductarray.push(jsn[i].repurchase_order_id);
							$("#orderpalce").append('<tr><td><input type="checkbox" class="check_state" id="'+jsn[i].repurchase_order_id+'" value="'+jsn[i].repurchase_order_id+'">'+new_commission_tick+'</td><td>REOD'+jsn[i].repurchase_order_id+'</td><th>'+jsn[i].name+'</th><th id="procode'+jsn[i].repurchase_order_id+'">'+jsn[i].product_code+' '+sizedetails+'</th><th>'+jsn[i].address+'</br>'+jsn[i].city+'</br>'+jsn[i].state+'</br>'+jsn[i].country+'</br>Pin:'+jsn[i].pincode+'</br>Mobile:'+jsn[i].mobile+'</th><th>'+jsn[i].order_date+'</th><th>'+jsn[i].username+'</th> </tr>')
							
							
						}
		
					}
				}
			}
			else
			{
				alertify.error("No Result Found");
				
			}
		}
		else
		{
			alertify.error("Invalid Admin");
			
		}
    }
	 });
}
function loadProductCode(base_url)
{
	$.getJSON(base_url+"welcome/loadreprocode",function(jsn)
	{
		
		if(jsn.length>0)
		{
			for(var i=0;i<jsn.length;i++)
			{
				$("#p_srch").append('<option value="'+jsn[i].re_product_id+'" id="'+jsn[i].re_product_id+'">'+jsn[i].product_code+'</option>');
			}
			
		}
		
	});
	
}
function codeChange(base_url)
{
	var p_code=$("#p_srch").val();
   //alert(p_code);
	reproductarray=new Array();
	$("#orderpalce").html("");
	$.ajax({
	    type: "POST",
	    url: base_url+"welcome/repload",		 
	    dataType: "json",
	    data:{"p_code":p_code},
	    //async:false,   
	    success: function(jsn) 
	    {
	    	$("#orderpalce").html("");
			if(jsn[0].res>0)
			{
				if(jsn.length>0)
				{
					/*//alert(jsn.length);
					for(var i=0;i<jsn.length;i++)
					{
						$("#orderpalce").append('<tr><td><input type="checkbox" class="check_state" id="'+jsn[i].repurchase_order_id+'" value="'+jsn[i].repurchase_order_id+'"></td><td>REOD'+jsn[i].repurchase_order_id+'</td><th>'+jsn[i].u_name+' '+jsn[i].u_father+'</th><th>'+jsn[i].product_code+'</th><th>'+jsn[i].u_address+'</br>'+jsn[i].u_city+'</br>'+jsn[i].u_state+'</br>'+jsn[i].u_country+'</br>Pin:'+jsn[i].u_pincode+'</br>Mobile:'+jsn[i].u_mobile+'</th><th>'+jsn[i].order_date+'</th><th>'+jsn[i].username+'</th> </tr>')
					}*/
					
					for(var i=0;i<jsn.length;i++)
					{
						if(jsn[i].re_size==null)
						{
							var sizedetails="";
						}
						else
						{
							var sizedetails="  Size:"+jsn[i].re_size;
						}
						var new_commission_tick="";
						if(jsn[i].new_commission==1){
							new_commission_tick='<i class="fa fa-check" aria-hidden="true" style="color:green;"></i>';
						}
						if(reproductarray.length==0)
							
						{
							reproductarray.push(jsn[i].repurchase_order_id);
							
							$("#orderpalce").append('<tr><td><input type="checkbox" class="check_state" id="'+jsn[i].repurchase_order_id+'" value="'+jsn[i].repurchase_order_id+'">'+new_commission_tick+'</td><td>REOD'+jsn[i].repurchase_order_id+'</td><th>'+jsn[i].name+'</th><th id="procode'+jsn[i].repurchase_order_id+'">'+jsn[i].product_code+''+sizedetails+'</th><th>'+jsn[i].address+'</br>'+jsn[i].city+'</br>'+jsn[i].state+'</br>'+jsn[i].country+'</br>Pin:'+jsn[i].pincode+'</br>Mobile:'+jsn[i].mobile+'</th><th>'+jsn[i].order_date+'</th><th>'+jsn[i].username+'</th> </tr>')
						
						}
						else
						{
							var flag=0;
							for(var j=0;j<reproductarray.length;j++)
							{
								if(reproductarray[j]==jsn[i].repurchase_order_id)
								{
									//alert();
									flag=1;
									var procode=$("#procode"+jsn[i].repurchase_order_id).text();
									
									var newprocode=procode+",  "+jsn[i].product_code+sizedetails;
									
									$("#procode"+jsn[i].repurchase_order_id).text(newprocode);
								
								}
							}
							if(flag==0)
							{
								reproductarray.push(jsn[i].repurchase_order_id);
								$("#orderpalce").append('<tr><td><input type="checkbox" class="check_state" id="'+jsn[i].repurchase_order_id+'" value="'+jsn[i].repurchase_order_id+'">'+new_commission_tick+'</td><td>REOD'+jsn[i].repurchase_order_id+'</td><th>'+jsn[i].name+'</th><th id="procode'+jsn[i].repurchase_order_id+'">'+jsn[i].product_code+''+sizedetails+'</th><th>'+jsn[i].address+'</br>'+jsn[i].city+'</br>'+jsn[i].state+'</br>'+jsn[i].country+'</br>Pin:'+jsn[i].pincode+'</br>Mobile:'+jsn[i].mobile+'</th><th>'+jsn[i].order_date+'</th><th>'+jsn[i].username+'</th> </tr>')
								
								
							}
			
						}
					}
				}
				else
				{
					alertify.error("No Result Found");
					
				}
			}
			else
			{
				alertify.error("Invalid Admin");
				
			}
	    }
		 });
}


function ProcessOrder(base_url)
{
	var processary=[];
	var paysot=[];
	$.each($("input[class='check_state']:checked"), function()
			{            					
				processary.push($(this).val());	
			});
	//alert(processary);
	var len=processary.length;
	for(var i=0;i<len;i++)
	{
		var id=processary[i];
		var obj={};
	  	obj['o']=id;
	  	obj['t']=2;
	  	paysot.push(obj);
	}
//	alert(JSON.stringify(paysot));
	if(len>0)
	{
                  document.getElementById("process_clk").disabled = true;
		//alert(base_url+"welcome/process_reorder?orderary="+JSON.stringify(paysot));
		$.ajax({
		    type: "POST",
		    url: base_url+"welcome/process_reorder",		 
		    dataType: "json",
		    data:{"orderary":JSON.stringify(paysot)},
		   // async:false,   
		    success: function(jsn) 
		    {
		    	var stat=jsn[0].stat;
		    	
		    	if(stat=="success")
		    	{
                    document.getElementById("process_clk").disabled = false;
			    	window.open(base_url+"welcome/trackorder?pmid="+JSON.stringify(paysot));
		    		window.open(base_url+"welcome/printaddress?pmid="+JSON.stringify(paysot));
		    		alert("Order Processed");
		    		location.reload();
		    		//window.open(base_url+"welcome/rebill?pmid="+mid,'-blank');
		    		
		    	}
		    	else
		    	{
                                document.getElementById("process_clk").disabled = false;
		    		alertify.error("Error In Processing");
		    		setTimeout(function() {location.reload();}, 1100);
		    	}
		    }
			 });
	}
	else
	{
                document.getElementById("process_clk").disabled = false;
		alertify.error("Not Selected Anything for payout");
	}
}
