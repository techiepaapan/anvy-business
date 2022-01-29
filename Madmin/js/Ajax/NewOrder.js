$(document).ready(function()
{
	
	var base_url=getUrl();
	var processary=[];

	loadProductCode(base_url);
	loadOrder(base_url);
	$("#p_srch").change(function()
	{
		var p_code=$("#p_srch").val();
		if(p_code=="All")
			{
				$("#orderpalce").html("");
				loadOrder(base_url);
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
function loadProductCode(base_url)
{
	//alert(base_url+"welcome/loadprocode");
	$.getJSON(base_url+"welcome/loadprocode",function(jsn)
	{
		if(jsn.length>0)
		{
			for(var i=0;i<jsn.length;i++)
			{
				$("#p_srch").append('<option value="'+jsn[i].product_id+'" id="'+jsn[i].product_id+'">'+jsn[i].product_code+'</option>');
			}
			
		}
		
	});
	
}

function codeChange(base_url)
{
	var p_code=$("#p_srch").val();
	$("#orderpalce").html("");
	$.ajax({
	    type: "POST",
	    url: base_url+"welcome/pload",		 
	    dataType: "json",
	    data:{"p_code":p_code},
	    async:false,   
	    success: function(jsn) 
	    {
	    	$("#orderpalce").html("");
			if(jsn[0].res>0)
			{
				if(jsn.length>0)
				{
					var axr=0;
					for(var i=0;i<jsn.length;i++)
					{	var pd=1;
						if(jsn[i].size=="")
							{
							jsn[i].size="Free";
							}
						if(i>0 && jsn[i-1].u_id==jsn[i].u_id){
							
							if(jsn[i-1].upgraded==jsn[i].upgraded)
							{
								if(jsn[i-1].upgrade_id==jsn[i].upgrade_id){
									pd=0;
								}
								else{
									pd=1;
								}
								
							}
							else{
								pd=1;
							}
						}
						if(pd==0){
							$("#user"+axr).val($("#user"+axr).val()+","+jsn[i].user_product_id);
							$("#usera"+axr).html($("#usera"+axr).html()+'<br/>OD'+jsn[i].user_product_id);
							$("#userb"+axr).html($("#userb"+axr).html()+'<br/>'+jsn[i].product_code+'<br>Qty:'+jsn[i].qty+'<br>Size:'+jsn[i].size);
						}

						if(pd==1){
							axr=i;
							if(jsn[i].upgraded==1 && jsn[i].paid==0){
								var checker='';
							}
							else{
								var checker='<input type="checkbox" class="check_state" id="user'+i+'" value="'+jsn[i].user_product_id+'">';
							}
						$("#orderpalce").append('<tr>'+
						'<td><input type="checkbox" class="check_state" id="user'+i+'" value="'+jsn[i].user_product_id+'"></td>'+
						'<td id="usera'+i+'">OD'+jsn[i].user_product_id+'</td>'+
						'<th>'+jsn[i].u_name+'</th>'+
						'<th id="userb'+i+'">'+jsn[i].product_code+'<br>Qty:'+jsn[i].qty+'<br>Size:'+jsn[i].size+'</th>'+
						'<th>'+jsn[i].address+'</br>'+jsn[i].city+'</br>'+jsn[i].state+'</br>'+jsn[i].country+'</br>Pin:'+jsn[i].pincode+'</br>Mobile:'+jsn[i].mobile+'</th>'+
						'<th>'+jsn[i].prefer_date+'</th><th>'+jsn[i].username+'</th> </tr>')
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
				alertify.error("Invalid User");
				
			}
	    }
		 });
}

function ProcessOrder(base_url)
{
	var processary=[];
	var paysot=[];
	var paysot1=[];
	$.each($("input[class='check_state']:checked"), function()
			{            					
				processary.push($(this).val());	
			});
	//alert(processary);
	var len=processary.length;
	for(var i=0;i<len;i++)
	{
		var id=processary[i];
		var myarray = id.split(',');

		for(var ix = 0; ix < myarray.length; ix++)
		{
			var obj={};
			obj['o']=myarray[ix];
			obj['t']=1;
			paysot.push(obj);
		}

		var obj1={};
			obj1['o']=id;
			obj1['t']=1;
			paysot1.push(obj1);

	}
	//alert(JSON.stringify(paysot)+" "+JSON.stringify(paysot1));
	if(len>0)
	{
                 document.getElementById("process_clk").disabled = true;
		//alert(base_url+"welcome/processorder?orderary="+JSON.stringify(paysot));
		//mysqli_next_result($this->db->conn_id);
		$.ajax({
		    type: "POST",
		    url: base_url+"welcome/processorder",		 
		    dataType: "json",
		    data:{"orderary":JSON.stringify(paysot)},
		    async:false,   
		    success: function(jsn) 
		    {
		    	var stat=jsn[0].stat;
		    	
		    	if(stat=="success")
		    	{
                     document.getElementById("process_clk").disabled = false;
					window.open(base_url+"welcome/trackorder?pmid="+JSON.stringify(paysot1));
		    		
					window.open(base_url+"welcome/printaddress?pmid="+JSON.stringify(paysot1));
					
					alert("Order Processed");
		    		location.reload();
		    		//alert(base_url+"welcome/trackorder?pmid="+JSON.stringify(paysot));
		    		
		    	}
		    	else
		    	{
                                document.getElementById("process_clk").disabled = false;
		    		alertify.success("Error In Processing");
		    		setTimeout(function() {location.reload();}, 1500);
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
function loadOrder(base_url)
{
	//alert(base_url+"welcome/load_nworder");
	$.ajax({
	    type: "POST",
	    url: base_url+"welcome/load_nworder",		 
	    dataType: "json",
	    data:{},
	    //async:false,   
	    success: function(jsn) 
	    {
	    	$("#orderpalce").html("");
	    	//alert(jsn[0].res);
			if(jsn[0].res>0)
			{
				if(jsn[0].res==1)
				{
					var axr=0;
					
					for(var i=0;i<jsn.length;i++)
					{	var pd=1;
						if(jsn[i].size=="")
						{
						jsn[i].size="Free";
						}
						if(i>0 && jsn[i-1].u_id==jsn[i].u_id){
							if(jsn[i-1].upgraded==jsn[i].upgraded)
							{
								if(jsn[i-1].upgrade_id==jsn[i].upgrade_id){
									pd=0;
								}
								else{
									pd=1;
								}
								
							}
							else{
								pd=1;
							}
						}
						if(pd==0){
							$("#user"+axr).val($("#user"+axr).val()+","+jsn[i].user_product_id);
							$("#usera"+axr).html($("#usera"+axr).html()+'<br/>OD'+jsn[i].user_product_id);
							$("#userb"+axr).html($("#userb"+axr).html()+'<br/>'+jsn[i].product_code+'<br>Qty:'+jsn[i].qty+'<br>Size:'+jsn[i].size);
						}

						if(pd==1){
							axr=i;
							if(jsn[i].upgraded==1 && jsn[i].paid==0){
								var checker='';
							}
							else{
								var checker='<input type="checkbox" class="check_state" id="user'+i+'" value="'+jsn[i].user_product_id+'">';
							}
						$("#orderpalce").append('<tr>'+
						'<td>'+checker+'</td>'+
						'<td id="usera'+i+'">OD'+jsn[i].user_product_id+'</td>'+
						'<th>'+jsn[i].u_name+'</th>'+
						'<th id="userb'+i+'">'+jsn[i].product_code+'<br>Qty:'+jsn[i].qty+'<br>Size:'+jsn[i].size+'</th>'+
						'<th>'+jsn[i].address+'</br>'+jsn[i].city+'</br>'+jsn[i].state+'</br>'+jsn[i].country+'</br>Pin:'+jsn[i].pincode+'</br>Mobile:'+jsn[i].mobile+'</th>'+
						'<th>'+jsn[i].prefer_date+'</th><th>'+jsn[i].username+'</th> </tr>')
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
				alertify.error("Invalid User");
				
			}
	    }
		 });

}