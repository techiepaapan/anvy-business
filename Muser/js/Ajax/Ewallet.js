$(document).ready(function()
{
	
	var base_url=getUrl();
	var from="2017-01-01";
	var to="";
 var date = new Date();
 
// GET YYYY, MM AND DD FROM THE DATE OBJECT
var yyyy = date.getFullYear().toString();
var mm = (date.getMonth()+1).toString();
var dd  = date.getDate().toString();
 
// CONVERT mm AND dd INTO chars
var mmChars = mm.split('');
var ddChars = dd.split('');
 
// CONCAT THE STRINGS IN YYYY-MM-DD FORMAT
var to = yyyy + '-' + (mmChars[1]?mm:"0"+mmChars[0]) + '-' + (ddChars[1]?dd:"0"+ddChars[0]);

	loadWallet(base_url,from,to);
	
	$("#srch").click(function()
	{//alert();
		from="";to="";
		from=$("#from").val();
		to=$("#to").val();
		if(from==""||to=="")
		{
			alert("Select From Date");
		}
		else
		{//alert();
			from=from.split("/").reverse().join("-");
			to=to.split("/").reverse().join("-");
			loadWallet(base_url,from,to);
		}
	});
	
	$(document).on("click",".bt",function()
	{
		var val=$(this).attr("id1");
		var sc=$(this).attr("id2");
		var fc=$(this).attr("id3");
		var tot=parseFloat(val)+parseFloat(sc)+parseFloat(fc);
		tot=parseFloat(tot).toFixed(2);
		$(".amt").text(val);
		$(".sv").text(sc);
		$(".fuc").text(fc);
		$(".tamt").text(tot);
		//alert(val);
	});
	
});

function loadWallet(base_url,from,to)
{
	//alert(base_url+"welcome/loadwallet?from="+from+"&to="+to);
	var j=1;
	$.ajax({
	    type: "POST",
	    url: base_url+"welcome/loadwallet",		 
	    dataType: "json",
	    data:{"from":from,"to":to},
	    async:false,   
	    success: function(jsn) 
	    {
	    	$("#walappend").html("");
	    	if(jsn[0].res>0)
	    	{
	    		$("#valletprice").text('INR '+jsn[0].balance);
	    		for(var i=0;i<jsn.length;i++)
	    		{
	    			//alert(jsn[i].payin_date);
	    			var dt=jsn[i].payin_date;
	    			var xs=+dt.substr(0, 4);
	    			var xs1=+dt.substr(5,2);
	    			var xs2=+dt.substr(8,2);
	    			var dtti=((dt).split('-').join(''))+""+((jsn[i].payin_time).split(':').join(''));
	    			//alert("xs="+xs+"xs1="+xs1+"xs2="+xs2);
	    			if(xs1==1)
	    			{
	    				var month='January';
	    			}
	    			else if(xs1==2)
	    			{
	    				var month='February';
	    			}
	    			else if(xs1==3)
	    			{
	    				var month='March';
	    			}
	    			else if(xs1==4)
	    			{
	    				var month='April';
	    			}
	    			else if(xs1==5)
	    			{
	    				var month='May';
	    			}
	    			else if(xs1==6)
	    			{
	    				var month='June';
	    			}
	    			else if(xs1==7)
	    			{
	    				var month='July';
	    			}
	    			else if(xs1==8)
	    			{
	    				var month='August';
	    			}
	    			else if(xs1==9)
	    			{
	    				var month='September';
	    			}
	    			else if(xs1==10)
	    			{
	    				var month='October';
	    			}
	    			else if(xs1==11)
	    			{
	    				var month='November';
	    			}
	    			else if(xs1==12)
	    			{
	    				var month='December';
	    			}
	    			//
	    			var dte=xs2+"-"+month+"-"+xs;
	    			$("#walappend").append('<tr><td style="display:none;">'+dtti+'</td><td>'+dte+' '+jsn[i].payin_time+'</td> <td>'+jsn[i].mode+'</td><td data-toggle="modal" data-target="#myModal" class="tbl-cursor bt" id1="'+jsn[i].pay_amount+'" id2="0" id3="0">'+jsn[i].mode+'-'+jsn[i].payin_date+'</td><td><i class="fa fa-inr" aria-hidden="true"></i> '+jsn[i].pay_amount+'</td></tr>');
	    			j++;
	    		}
	    		
	    	}
	    	
		
	    }
		 });
	//alert(base_url+"welcome/loadpayoutwallet?from="+from+"&to="+to);
	$.ajax({
	    type: "POST",
	    url: base_url+"welcome/loadpayoutwallet",		 
	    dataType: "json",
	    data:{"from":from,"to":to},
	    async:false,   
	    success: function(jsn) 
	    {
	    	
	    	if(jsn[0].res>0)
	    	{
	    		
	    		for(var i=0;i<jsn.length;i++)
	    		{
	    			//alert(jsn[i].payin_date);
	    			var dt=jsn[i].payout_date;
	    			var xs=+dt.substr(0, 4);
	    			var xs1=+dt.substr(5,2);
	    			var xs2=+dt.substr(8,2);
	    			//alert("xs="+xs+"xs1="+xs1+"xs2="+xs2);
	    			var dtti=((dt).split('-').join(''))+""+((jsn[i].payout_time).split(':').join(''));
	    			if(xs1==1)
	    			{
	    				var month='January';
	    			}
	    			else if(xs1==2)
	    			{
	    				var month='February';
	    			}
	    			else if(xs1==3)
	    			{
	    				var month='March';
	    			}
	    			else if(xs1==4)
	    			{
	    				var month='April';
	    			}
	    			else if(xs1==5)
	    			{
	    				var month='May';
	    			}
	    			else if(xs1==6)
	    			{
	    				var month='June';
	    			}
	    			else if(xs1==7)
	    			{
	    				var month='July';
	    			}
	    			else if(xs1==8)
	    			{
	    				var month='August';
	    			}
	    			else if(xs1==9)
	    			{
	    				var month='September';
	    			}
	    			else if(xs1==10)
	    			{
	    				var month='October';
	    			}
	    			else if(xs1==11)
	    			{
	    				var month='November';
	    			}
	    			else if(xs1==12)
	    			{
	    				var month='December';
	    			}
	    			//
	    			var amt=jsn[i].amount;
	    			var sc=jsn[i].service_charge;
	    			var fc=jsn[i].freecut;
	    			if(amt==""||amt==null){amt=0;}else{amt=parseFloat(amt);}
	    			if(sc==""||sc==null){sc=0;}else{sc=parseFloat(sc);}
	    			if(fc==""||fc==null){fc=0;}else{fc=parseFloat(fc);}
	    			var totamt=amt+sc+fc;
	    			totamt=parseFloat(totamt).toFixed(2);
	    			var dte=xs2+"-"+month+"-"+xs;
	    			$("#walappend").append('<tr><td style="display:none;">'+dtti+'</td><td>'+dte+' '+jsn[i].payout_time+'</td> <td>Withdraw</td><td data-toggle="modal" data-target="#myModal" class="tbl-cursor bt" id1="'+jsn[i].amount+'" id2="'+jsn[i].service_charge+'" id3="'+jsn[i].freecut+'">Withdraw-'+jsn[i].payout_date+'</td><td style="color:red;"><i class="fa fa-inr" style="color:black;" aria-hidden="true"></i> -'+totamt+'</td></tr>');
	    			j++;
	    		}
	    		
	    		
	    		
	    	}
	    	
	    	
	    	var table_id="tbx";
	    	var sortColumn=2;
	    	setTimeout(function() {
	    		 var tableData = document.getElementById('tbx').getElementsByTagName('tbody').item(0);

	    	        // Read table row nodes.
	    	        var rowData = tableData.getElementsByTagName('tr'); 

	    	        for(var i = 0; i < rowData.length - 1; i++) {
	    	            for(var j = 0; j < rowData.length - (i + 1); j++) {

	    	                //Swap row nodes if short condition matches
	    	                if(parseInt(rowData.item(j).getElementsByTagName('td').item(0).innerHTML) < parseInt(rowData.item(j+1).getElementsByTagName('td').item(0).innerHTML)) {
	    	                    tableData.insertBefore(rowData.item(j+1),rowData.item(j));
	    	                }
	    	            }
	    	        }
	    		}, 100);
	    	
		
	    }
		 });

}


