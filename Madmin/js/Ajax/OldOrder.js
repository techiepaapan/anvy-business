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
				msg="Cancel Selected Orders?";
			}
		else if(val=="Delivered")
			{
				msg="Mark Selected Orders As Delivered?";
			}
			alertify.confirm(msg,function(e)
				{
				if(e)
					{
						markaction(base_url,val);
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
		    	 obj['t']=1;
		    	 paysot.push(obj);
		    	 flag++;
		     }
		  }
		  if(flag>0)
			 {
			  	window.open(base_url+"welcome/trackorder?pmid="+JSON.stringify(paysot)," Track Order");
			  	setTimeout(function(){window.open(base_url+"welcome/printaddress?pmid="+JSON.stringify(paysot)),"Print Address"},500);
			 }
		  else{
			  alertify.error("Select Order(s) To Print");
		  }
		
	});
	
});

function loadOldorder(base_url,from,to,stat)
{
	//alert(base_url+"welcome/load_oldorder?from="+from+"&to="+to+"&stat="+stat);
	$.ajax({
	    type: "POST",
	    url: base_url+"welcome/load_oldorder",		 
	    dataType: "json",
	    data:{"from":from,"to":to,"stat":stat},
	   // async:false,   
	    success: function(jsn) 
	    {
	    	
	    	$("#orderpalce").html("");
	    	if(jsn[0].res>0)
			{
				if(jsn.length>0)
				{
					//alert(jsn.length);
					for(var i=0;i<jsn.length;i++)
					{
						var xs=0;
						var statx=(jsn[i].status).replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
						if((statx=='Shipping'))
						{
							xs=1;
						}
						var pd=1;
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
							$("#orderpalce").append('<tr>'+
							'<td><input type="checkbox" name="prdcheckbox" class="check_state" id="user'+i+'" value="'+jsn[i].user_product_id+'">'+
							'<input type="hidden" id="prx'+jsn[i].user_product_id+'" value="'+xs+'"/></td>'+
							'<td id="usera'+i+'">OD'+jsn[i].user_product_id+'</td>'+
							'<th>'+jsn[i].name+'</th><th id="userb'+i+'">'+jsn[i].product_code+'<br>Qty:'+jsn[i].qty+'<br>Size:'+jsn[i].size+'</th>'+
							'<th>'+jsn[i].address+'</br>'+jsn[i].city+'</br>'+jsn[i].state+'</br>'+jsn[i].country+'</br>Pin:'+jsn[i].pincode+'</br>Mobile:'+jsn[i].mobile+'</th><th>'+jsn[i].prefer_date+'</th>'+
							'<th>'+jsn[i].username+'</th><td>'+statx+'</td></tr>');
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

function markaction(base_url,val)
{
	var flg=0; var idx=0;
	 var checkboxes = document.getElementsByName('prdcheckbox');
	  var checkboxesChecked = [];
	  for (var i=0; i<checkboxes.length; i++) {
	     if (checkboxes[i].checked) {
			var arval=checkboxes[i].value;
			var myarray = arval.split(',');

			for(var ix = 0; ix < myarray.length; ix++)
			{
				var obj={};
				obj['oid']=myarray[ix];
			   checkboxesChecked.push(obj);
			   
			   var did=myarray[ix];
			   idx=$("#prx"+did).val();
			  // alert(idx);
			   if(idx==0)
			   {
				   flg++;
				   //alert(i+" "+flg+" idx="+idx);
			   }
			}

	     }
	  }
 if(flg==0)
	{
	//alert(base_url+"welcome/mark_orders?val="+val+"&oid="+JSON.stringify(checkboxesChecked));
	$.ajax({
	    type: "POST",
	    url: base_url+"welcome/mark_orders",		 
	    dataType: "json",
	    data:{"val":val,"oid":JSON.stringify(checkboxesChecked)},
	    async:false,   
	    success: function(jsn) 
	    {
	    	alertify.success(jsn[0].stat);
	    	setTimeout(function() {location.reload();}, 1000);
	    }
	});
	}
 else
	{	//alert(flg);
	/*	document.getElementById("deliver").disabled = false;
		document.getElementById("cancel").disabled = false;*/
		alertify.error("Please Select Orders With Status 'Shipping' Only");
	}
	
}


function toggle(source){
	 var checkboxes = document.getElementsByName('prdcheckbox');
	  for(var i=0, n=checkboxes.length;i<n;i++) {
	    checkboxes[i].checked = source.checked;
	  }
}