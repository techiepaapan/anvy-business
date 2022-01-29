$(document).ready(function()
{
	
	var base_url=getUrl();
	$("#submitt").click(function()
	{
		ActivateUser(base_url);
	});
});

function ActivateUser(base_url)
{
	var msg="";var b1=0;var pinunbr=0;
	var pinnumber=$("#pin").val();
	if(pinnumber=="")
	{
		alertify.error("Enter the Pin");
	}
	else if(isNaN(pinnumber)||pinnumber<=0)
	{
		 alertify.error("Invalid Pin");  	
	}
	else if(! /^[0-9]{13}$/.test(pinnumber))
	{
		alertify.error("Please input exactly 15 numbers!"); 
	}
	else
	{
		msg="";b1=0;pinunbr=0;
		$.ajax({
		    type: "POST",
		    url: base_url+"welcome/checkpin",		 
		    dataType: "json",
		    data:{"number":pinnumber},
		    async:false,   
		    success: function(jsn) 
		    {
		
				var res=jsn[0].result;
				///return res;
				if(jsn[0].pinid>0)
				{
					b1=1;
				    pinunbr=jsn[0].pinid;
				}
				else
				{
					msg="Invalid PinNumber";
					
				}
		    }
 		 });
		if(b1==1)
		{
			//alert(pinunbr);
		$.ajax({
		    type: "POST",
		    url: base_url+"welcome/activates",		 
		    dataType: "json",
		    data:{"Pins":pinunbr},
		    async:false,   
		    success: function(jsn) 
		    {
		    	if(jsn[0].res==1)
		    	{
		    		alertify.success("Pin Activated");
					setTimeout(function() {location.reload();}, 1500);
		    	}
		    	if(jsn[0].res==2)
		    	{
		    		alertify.success("User Already Active");
					setTimeout(function() {location.reload();}, 1500);
		    	}
		    	
		    }
		    });
		}
		else
		{
			alertify.error(msg);
		}
	}
	
}