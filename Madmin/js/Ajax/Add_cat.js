var jarray=[];
$(document).ready(function()
{
	
	var base_url=getUrl();
	
	$("#addcat_sub").click(function()
	{
				//alert("kk");
		AddCategory(base_url);
	});



});

function AddCategory(base_url)
{
	var jarray=[];
	var flg=0;
    var option=$("#add_catss").val();
   
    if(option=="")
    {
    	alertify.error("Enter Category Name");
    }
    else
    {
   // alert(base_url+"welcome/addpin_action?Pin_no="+JSON.stringify(jarray));
		$("#addcat_sub").addClass("disabled");

		$.ajax({
		    type: "POST",
		    url: base_url+"welcome/addcat_action",
		 
		    dataType: "json",
		    data:{"Cat":option},
		    success: function(jsn) 
		    {
				$("#addcat_sub").removeClass("disabled");
				//alert(jsn[0].result);
				var msg=jsn[0].res;
				if(msg==0)
				{
					$("#addcat_sub").removeClass("disabled");
			        alertify.error("Category Already Exists");
			        setTimeout(function() {location.reload();}, 1500);
				}
				else
				{
					$("#addcat_sub").removeClass("disabled");
					alertify.success("Category Added");
					setTimeout(function() {location.reload();}, 1500);
				}
		    }
			        
		    });
		
    }
}


