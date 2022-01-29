var jarray=[];
$(document).ready(function()
{
	
	var base_url=getUrl();
	$(document).on("click","#addpin_sub",function()
	{
		
		AddPin(base_url);
	});
	$("#genpin").click(function()
	{
				//alert("kk");
		GenPin(base_url);
	});


	$(".editclose").click(function()
			{
				location.reload();
			});
	
	$("#sel_pin").change(function()
	{
		var pins=$("#sel_pin").val();
		if(pins==1)
		{
			$("#sel_bv").show();
		}
		else
		{
			$("#sel_bv").hide();
		}
	});
});

function AddPin(base_url)
{
	var jarray=[];
	var flg=0;
    var option=$("#option_select").val();
    var tp=$("#sel_pin").val();
    if(tp==1)
    {
    	var bv=$("#sel_bv").val();
    }
    else
    {
    	var bv=0;
    }
    
    for(var i=0;i<option;i++)
	{
    	var pinno=$("#add_pin"+i).val();
    	if(isNaN(pinno)||pinno<=0)
    	{
    		// alertify.error("Invalid Pin");
    		 flg=2;
    	}
    	else if(! /^[0-9]{17}$/.test(pinno))
    	{
    		//alertify.error("Please Input Exactly 17 Numbers!"); 
    		flg=2;
    	}
    	else if(tp==1 &&(bv==""||bv==null))
    	{
    		flg=2;
    	}
    	else
    	{
	    	var obj={};
			obj['pinum']=pinno;
			obj['tp']=tp;
			obj['bv']=bv;
			jarray.push(obj);
			flg=1
    	}
    	
    	
	}
    
    if(flg==0)
    {
    	alertify.error("Invalid Pin");
    }
    else if(flg==2)
    {
    	alertify.error("Please Select BV");
    }
    else
    {
   // alert(base_url+"welcome/addpin_action?Pin_no="+JSON.stringify(jarray));
		$("#addpin_sub").addClass("disabled");

		$.ajax({
		    type: "POST",
		    url: base_url+"welcome/addpin_action",
		 
		    dataType: "json",
		    data:{"Pin_no":JSON.stringify(jarray)},
		    success: function(jsn) 
		    {
				$("#addpin_sub").removeClass("disabled");
				//alert(jsn[0].result);
				var msg=jsn[0].result;
				if(msg==0)
				{
					$("#addpin_sub").removeClass("disabled");
			        alertify.success("Pin Already Exists");
			        setTimeout(function() {location.reload();}, 1500);
				}
				else
				{
					$("#addpin_sub").removeClass("disabled");
			         $(".snd").click();
	$("#sendp").click(function()
			{
				var ph=$("#phone").val();
				if(isNaN(ph)||(!/^[0-9]{10}$/.test(ph)))
		    	{
		    		alertify.error("Invalid Phone");
		    	}
		    	else
		    	{
		    		//alert(ph+" - "+JSON.stringify(jarray));
		    		var msg="";var tpx='';var bvx=0;
		    		if(tp==0){tpx='Free%20Pin'}else{tpx='Cash%20Pin';bvx=$("#sel_bv").val();}
		    		for(var i=0;i<jarray.length;i++)
			    	{
		    			if(i==0)
		    			{
		    				if(tp==0)
		    				{
		    					msg=tpx+"%20:%20"+jarray[i].pinum;
		    				}
		    				else
		    				{
		    					msg=bvx+"%20BV%20"+tpx+"%20:%20"+jarray[i].pinum;
		    				}
		    				
		    			}
		    			else
		    			{
		    			msg=msg+","+jarray[i].pinum;
		    			}
			    	}
		    		//alert(base_url+"welcome/sendSMS?phone="+ph+"&msg="+msg);
		    		$("#sendp").addClass("disabled");
		    		$.ajax({
		    		    type: "POST",
		    		    url: base_url+"welcome/sendSMS",
		    		 
		    		    dataType: "json",
		    		    data:{"phone":ph,"msg":msg,"pinarray":JSON.stringify(jarray)},
		    		    success: function(jsn) 
		    		    {
		    		    	location.reload();
		    		    }
		    		});
		    	}
			});
			        
				}
		    }
		    });
		
    }
}


function GenPin(base_url)
{
	var option=$("#option_select").val();
        $("#newpin").html("");
        $("#appendadd").html("");
        document.getElementById("genpin").disabled = true;
	$.ajax({
	    type: "POST",
	    url: base_url+"welcome/genpin_action",
	    dataType: "json",
	    data:{"option":option},
	    success: function(jsn) 
	    {
                 $("#newpin").html("");
                 $("#appendadd").html("");
                document.getElementById("genpin").disabled = false;
	    	for(var i=0;i<jsn.length;i++)
	    	{
	    		$("#newpin").append('<input  class="form-control1 input-search" placeholder="Add Pin" value="'+jsn[i].current_mills+'" readonly="readonly" type="text" style="margin-top:1%;" id="add_pin'+i+'"/>')
	    	}
	    	//$("#add_pin").val(jsn[0].current_mills);
                $("#appendadd").append('<button class="btn btn-info  warning_2"  type="button" id="addpin_sub">ADD</button>');
	    }
	});
}