$(document).ready(function()
{
	
	var base_url=getUrl();
	var payoutary=[];
	$("#print").click(function()
	{
		//alert("kk");
		PayoutCash(base_url);
	});
        $("#repbonus").click(function()
	{
		RepurchaseBonus(base_url);
	});
	loadPayOut(base_url);
	
	
	$(".bt").click(function()
	{
		var id=($(this).attr("id")).slice(3);

	$.ajax({
		    type: "POST",
		    url: base_url+"welcome/paydetails",		 
		    dataType: "json",
		    data:{"id":id},  
		    success: function(jsn) 
		    {var tt=0;
		    //alert(jsn.length);
		    $("#paydetails").html("");
		    	if(jsn.length>0)
		    	{
	    			/*var tot=parseFloat(jsn[0].total);
	    			var scx=parseFloat(jsn[0].sc);
	    			var totx=tot-((tot*scx)/100);
	    			totx=parseFloat(totx).toFixed(2);
		    		$("#payoutcsh").text('INR '+totx);*/
		    		for(var i=0;jsn.length;i++)
		    		{
		    			var time=jsn[i].payin_time;
		    			var dt=(jsn[i].payin_date).split('-').reverse().join('/');
		    			
		    			  
		    			  
		    			if(time==""||time==null)
		  				{
		    				time="";
		  				}
		    			else{
		  				var tsx = time;
		  				  var H1 = +tsx.substr(0, 2);
		  				  var h1 = (H1 % 12) || 12;
		  				  h1 = (h1 < 10)?("0"+h1):h1;  // leading 0 at the left for 1 digit hours
		  				  var ampm = H1 < 12 ? " AM" : " PM";
		  				time = h1 + tsx.substr(2, 3) + ampm;
		  				}
		    			  
		    			  
		    			$("#paydetails").append('<tr><td style="padding: 6px !important;">'+(i+1)+'</td><td style="padding: 6px !important;">'+jsn[i].mode+'</td><td style="padding: 6px !important;">'+dt+'</td><td style="padding: 6px !important;">'+time+'</td><td style="padding: 6px !important;text-align:right;">'+jsn[i].pay_amount+'</td></tr>');

		    		}
		    		/*alertify.success("User Details Edited");
					setTimeout(function() {location.reload();}, 1500);*/
		    	}
			
		    }
			 });
	});
	
		
	$(".printClose").click(function(){
		location.reload();
	});
});
function loadPayOut(base_url)
{
	$.ajax({
	    type: "POST",
	    url: base_url+"welcome/loadpay",		 
	    dataType: "json",
	    data:{},
	    async:false,   
	    success: function(jsn) 
	    {var tt=0,fwal=0;
	    	if(jsn.length>0)
	    	{
    			var tot=parseFloat(jsn[0].total);
    			var scx=parseFloat(jsn[0].sc);
    			var totx=0;
    			//var totx=tot-parseInt((tot*scx)/100);
    			///totx=parseFloat(totx).toFixed(2);
	    		//$("#payoutcsh").text('INR '+totx);
	    		for(var i=0;i<jsn.length;i++)
	    		{
	    			if(jsn[i].fwallet==null || jsn[i].fwallet==''){fwal=0}else{fwal=jsn[i].fwallet;}
	    			
	    			fwal=parseFloat(fwal);
	    			//alert(jsn[i].fwallet);
	    			
	    			var bal=parseFloat(jsn[i].balance).toFixed(2);
	    			var sc=parseFloat(jsn[i].sc).toFixed(2);
	    			var ded=parseFloat((bal*sc)/100).toFixed(2);
	    			var net=bal-parseFloat((bal*sc)/100).toFixed(2);
	    			var perc=0;
	    			if(fwal>0 && net>10)
	    			{
	    				var perc=(bal*0.1).toFixed(2);
	    				if(perc>fwal)
	    				{
	    					perc=fwal;
	    				}
	    				net=net-parseFloat(perc).toFixed(2);
	    				ded=ded+parseFloat(perc).toFixed(2);
	    			}
	    			totx=totx+net;
	    			//totx=totx-perc;
	    			ded=parseFloat(ded).toFixed(2);
	    			net=parseFloat(net).toFixed(2);
	    			
					var chkbox="";
	    			if(jsn[i].activated==1){
	    				chkbox='<input id="'+jsn[i].u_id+'" type="checkbox" value="'+jsn[i].u_id+'" class="check_state">';
	    			}
	    			$("#payotappend").append('<tr id="id'+jsn[i].u_id+'"><td id="pay'+jsn[i].u_id+'">'+chkbox+'</td><td>'+(i+1)+'</td><td>'+jsn[i].username+'</td><td  value="'+jsn[i].u_id+'" id="user'+jsn[i].u_id+'">'+jsn[i].u_name+'</td><td  value="'+jsn[i].u_id+'" id="place'+jsn[i].u_id+'">'+jsn[i].u_address+'</td><td id="mode'+jsn[i].u_id+'" value="'+jsn[i].u_accountno+'">'+jsn[i].u_accountno+'</td><td name="amt" style="cursor:pointer;" data-toggle="modal" data-target="#myModal1" class="bt" value="'+jsn[i].balance+'" id="amt'+jsn[i].u_id+'">'+jsn[i].balance+'</td> <td name="ded" value="'+ded+'" id="ded'+jsn[i].u_id+'">'+ded+'<input type="hidden" name="dep" id="dep'+jsn[i].u_id+'" value="'+perc+'"/></td><td name="net"  value="'+net+'" id="net'+jsn[i].u_id+'">'+net+'</td></tr>');
	    			
	    			
	    			if(i==(jsn.length-1))
	    			{
	    				totx=parseFloat(totx).toFixed(2);
	    	    		$("#payoutcsh").text('INR '+totx);
	    			}
	    		}
	    		/*alertify.success("User Details Edited");
				setTimeout(function() {location.reload();}, 1500);*/
	    	}
		
	    }
		 });


}

function PayoutCash(base_url)
{
	var payoutary=[];
	var productid=[];
	var paysot=[];
	var total=0;
	$.each($("input[class='check_state']:checked"), function()
	{            					
		payoutary.push($(this).val());	
	});
	var len=payoutary.length;
	
	for(var i=0;i<len;i++)
	{
		var id=payoutary[i];
		//var userid=$("#user"+id).attr('value');
		var amt=parseFloat($("#net"+id).text());
		var dep=parseFloat($("#dep"+id).val());
		var ded=parseFloat($("#ded"+id).text());
		//var mode=$("#mode"+id).attr('value');
		total=total+amt;
		
		var obj={};
	  	//obj['payid']=id; 
	  	obj['userid']=id;
	  	obj['amt']=amt;
	  	obj['ded']=ded-dep;
		obj['dep']=dep;
	  	//obj['mode']=mode;
	  	
	  	paysot.push(obj);
	}
	if(len>0)
	{
		//alert("Pay = "+JSON.stringify(paysot)+"& Total="+total);
	$.ajax({
	    type: "POST",
	    url: base_url+"welcome/payout_action",
	    async: false,
	    dataType: "json",
	    data: {"Pay":JSON.stringify(paysot),"Total":total,"Len":len},
	    success: function(json) {
	    	//alert(json[0].stat);
	    	var stat=json[0].stat;
	    	var mid=json[0].mid;
	    	if(stat=="success")
	    	{
	    		alertify.success("Cash transfered");
	    		$("#printModal").modal({
	    	        backdrop: 'static',
	    	        keyboard: false
	    	    });
	    		
	    		$("#printPDF").click(function(){
	    			window.open(base_url+"welcome/rebill?pmid="+mid);
	    		});
	    		$("#printEXCEL").click(function(){
	    			window.open(base_url+"welcome/payoutExcel?pmid="+mid);
	    		});
	    	}
	    	else
	    	{
	    		alertify.success("Error In Cash transfer");
	    		setTimeout(function() {location.reload();}, 1500);
	    	}
	    }
	    });
	}
	else
	{
		alertify.error("Not Selected Anything for payout");
	}
}
function RepurchaseBonus(base_url)
{
	//alert(base_url+"welcome/repurchasebonus");
	$.getJSON(base_url+"welcome/repurchasebonus",function(jsn)
			{
		         alertify.success("Repurchase Bonus Added");
                         setTimeout(function() {location.reload();}, 1500);
			});

}