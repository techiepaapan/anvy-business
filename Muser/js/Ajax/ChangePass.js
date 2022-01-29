$(document).ready(function()
{
	
	var base_url=getUrl();
	
	$("#submitt").click(function()
	{
		ChangePassword(base_url);
	});
	
});

function ChangePassword(base_url)
{
	var current_password=$("#current_password").val();
	var new_password=$("#new_password").val();
	var confirm_password=$("#confirm_password").val();
	var adminid=1;
	//alert(current_password+"-"+new_password+"=="+confirm_password);
	if(current_password==""||new_password==""||confirm_password=="")
	{
		alertify.error("Enter all Fields");
	}
	else if(new_password!=confirm_password)
	{
		alertify.error("Password Missmatch");
	}
	else
	{
		$.getJSON(base_url+"welcome/chngepass",{"id":adminid,"Oldpass":current_password,"Newpass":new_password},function(jsn)
		{
			alertify.success(jsn.result);
			setTimeout(function() {
				location.reload();
			}, 1000);
		});
	}
}