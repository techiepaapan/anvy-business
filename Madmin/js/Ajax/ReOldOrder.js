	var reproductarray=[];
$(document).ready(function()
{
	var base_url=getUrl();
	//loadProductCode(base_url);
	var from='2010-01-01';
	var d=new Date();
	var y = d.getFullYear();
	var to=y+'-12-31';
	var stat="All";
	loadOldorder(base_url,from,to,stat);
	
	$("#oldorsrch").click(function()
			{
				var from=$("#from").val();
				var to=$("#to").val();
				var stat=$("#stat").val();
				if(from==""||to=="")
				{
					alertify.error("Please Select Date(s)");
				}
				else
				{
					from=from.split('/').reverse().join('-');
					to=to.split('/').reverse().join('-');
					loadOldorder(base_url,from,to,stat);
				}
				
			});
	
	$(".action").click(function()
			{
				var val=$(this).val();
				var msg="";
				
				if(val=="Cancelled")
					{
					    document.getElementById("cancel").disabled = true;
						msg="Cancel Selected Orders?";
					}
				else if(val=="Delivered")
					{
					    document.getElementById("deliver").disabled = true;
						msg="Mark Selected Orders As Delivered?";
					}
					alertify.confirm(msg,function(e)
						{
						if(e)
							{
								markaction(base_url,val);

								
							}
						    else
						    {
						    	document.getElementById("deliver").disabled = false;
						    	document.getElementById("cancel").disabled = false;
						    }
						});
			});
	
	$(document).on('click',".check_state",function()
			{
				$(".chk_all_state").attr("checked",false);
			});

	$('.print').click(function(){
		var flag=0,paysot=[];
		 var checkboxes = document.getElementsByName('prdcheckbox');
		  var checkboxesChecked = [];
		  for (var i=0; i<checkboxes.length; i++) {
		     if (checkboxes[i].checked) {
		    	 var obj={};
		    	 obj['o']=checkboxes[i].value;
		    	 obj['t']=2;
		    	 paysot.push(obj);
		    	 flag++;
		     }
		  }
		  if(flag>0)
			 {
			  	window.open(base_url+"welcome/trackorder?pmid="+JSON.stringify(paysot));
			  	window.open(base_url+"welcome/printaddress?pmid="+JSON.stringify(paysot));
			 }
		  else{
			  alertify.error("Select Order(s) To Print");
		  }
		
	});
	
});

function loadOldorder(base_url,from,to,stat)
{
	//alert(base_url+"welcome/load_reoldorder?from="+from+"&to="+to+"&stat="+stat);
	reproductarray=[];
	$.ajax({
	    type: "POST",
	    url: base_url+"welcome/load_reoldorder",		 
	    dataType: "json",
	    data:{"from":from,"to":to,"stat":stat},
	    //async:false,   
	    success: function(jsn) 
	    {
	    	
	    	$("#orderpalce").html("");
	    	if(jsn[0].res>0)
			{

				if(jsn.length>0)
				{
//alert(jsn.length);
					
					//alert("ssf"+jsn.length);
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
						var xs=0;
						if((jsn[i].order_status=='Shipping')||(jsn[i].order_status=='shipping'))
						{
							xs=1;
						}
						//alertify.error(xs);
                        if(reproductarray.length==0)
							
						{

							reproductarray.push(jsn[i].repurchase_order_id);
							$("#orderpalce").append('<tr><td><input type="checkbox" name="prdcheckbox" class="check_state" id="pr'+jsn[i].repurchase_order_id+'" value="'+jsn[i].repurchase_order_id+'"><input type="hidden" id="prx'+jsn[i].repurchase_order_id+'" value="'+xs+'"/>'+new_commission_tick+'</td><td>REOD'+jsn[i].repurchase_order_id+'</td><th>'+jsn[i].name+'</th><th id="procode'+jsn[i].repurchase_order_id+'">'+jsn[i].product_code+''+sizedetails+'</th><th>'+jsn[i].address+'</br>'+jsn[i].city+'</br>'+jsn[i].state+'</br>'+jsn[i].country+'</br>Pin:'+jsn[i].pincode+'</br>Mobile:'+jsn[i].mobile+'</th><th>'+jsn[i].order_date+'</th><th>'+jsn[i].username+'</th> <td>'+jsn[i].order_status+'</td></tr>')
							
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
								$("#orderpalce").append('<tr><td><input type="checkbox" name="prdcheckbox" class="check_state" id="pr'+jsn[i].repurchase_order_id+'" value="'+jsn[i].repurchase_order_id+'"><input type="hidden" id="prx'+jsn[i].repurchase_order_id+'" value="'+xs+'"/>'+new_commission_tick+'</td><td>REOD'+jsn[i].repurchase_order_id+'</td><th>'+jsn[i].name+'</th><th id="procode'+jsn[i].repurchase_order_id+'">'+jsn[i].product_code+''+sizedetails+'</th><th>'+jsn[i].address+'</br>'+jsn[i].city+'</br>'+jsn[i].state+'</br>'+jsn[i].country+'</br>Pin:'+jsn[i].pincode+'</br>Mobile:'+jsn[i].mobile+'</th><th>'+jsn[i].order_date+'</th><th>'+jsn[i].username+'</th> <td>'+jsn[i].order_status+'</td></tr>')
								
								
							}
			
						}
						
					//	$("#orderpalce").append('<tr><td><input type="checkbox" name="prdcheckbox" class="check_state" id="pr'+jsn[i].repurchase_order_id+'" value="'+jsn[i].repurchase_order_id+'"><input type="hidden" id="prx'+jsn[i].repurchase_order_id+'" value="'+xs+'"/></td><td>REOD'+jsn[i].repurchase_order_id+'</td><th>'+jsn[i].name+'</th><th>'+jsn[i].product_code+'</th><th>'+jsn[i].address+'</br>'+jsn[i].city+'</br>'+jsn[i].state+'</br>'+jsn[i].country+'</br>Pin:'+jsn[i].pincode+'</br>Mobile:'+jsn[i].mobile+'</th><th>'+jsn[i].order_date+'</th><th>'+jsn[i].username+'</th> <td>'+jsn[i].order_status+'</td></tr>')
					
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


function markaction(base_url,val)
{
	var flg=0; var idx=0;
	//alert("flg"+flg);
	 var checkboxes = document.getElementsByName('prdcheckbox');
	  var checkboxesChecked = [];
	  for (var i=0; i<checkboxes.length; i++) {
		  idx=0;
	     if (checkboxes[i].checked) {
	    	 var obj={};
	    	 obj['oid']=checkboxes[i].value;
	        checkboxesChecked.push(obj);
	        
	        var did=checkboxes[i].value;
	        idx=$("#prx"+did).val();
	       // alert(idx);
	        if(idx==0)
	        {
	        	flg++;
	        	//alert(i+" "+flg+" idx="+idx);
	        }
	      
	        
	     }
	  }
	// alert(JSON.stringify(checkboxesChecked)); 
	if(flg==0)
	{
	document.getElementById("deliver").disabled = true;
  	document.getElementById("cancel").disabled = true;
	//alert(base_url+"welcome/mark_reorders?val="+val+"&oid="+JSON.stringify(checkboxesChecked));
	$.ajax({
	    type: "POST",
	    url: base_url+"welcome/mark_reorders",		 
	    dataType: "json",
	    data:{"val":val,"oid":JSON.stringify(checkboxesChecked)},
	    async:false,   
	    success: function(jsn) 
	    {
	    	document.getElementById("deliver").disabled = false;
	    	document.getElementById("cancel").disabled = false;
	    	alertify.success(jsn[0].stat);
	    	setTimeout(function() {location.reload();}, 1000);
	    }
	});
	}
	else
	{	//alert(flg);
		document.getElementById("deliver").disabled = false;
		document.getElementById("cancel").disabled = false;
		alertify.error("Please Select Orders With Status 'Shipping' Only");
	}
	
}



function toggle(source){
	 var checkboxes = document.getElementsByName('prdcheckbox');
	  for(var i=0, n=checkboxes.length;i<n;i++) {
	    checkboxes[i].checked = source.checked;
	  }
}