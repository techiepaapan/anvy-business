$(document).ready(function()
{
	document.getElementById("submitt").disabled = true;
	var base_url=getUrl();
	loadProfile(base_url);
	$("#submitt").click(function()
	{
		ChangeProfile(base_url);
	});
	
	
	$("#profile_photo").change(function()
			{
				var file = this.files[0];
				var fileType = file["type"];
				var ValidImageTypes = ["image/gif", "image/jpeg", "image/png"];
				if ($.inArray(fileType, ValidImageTypes) < 0) {
				   alertify.error("Invalid File Format");
				   $('#photo  img').attr('src','');
				   $(this).val("");
				}
				else{
					uploadImage(base_url);

				}
			});
			/*function filePreview(input) {
			    if (input.files && input.files[0]) {
			        var reader = new FileReader();
			        reader.onload = function (e) {
			            $('#photo  img').attr('src','');
			             $('#photo  img').attr('src',e.target.result);
			        }
			        reader.readAsDataURL(input.files[0]);
			    }
			}*/
	
});

function loadProfile(base_url)
{
	$.ajax({
	    type: "POST",
	    url: base_url+"welcome/viewprofile",		 
	    dataType: "json",
	    data:{},
	    async:false,   
	    success: function(jsn) 
	    {
document.getElementById("submitt").disabled = false;
	    	if(jsn[0].res>0)
	    	{
	    		//alertify.success("User Details Edited");
				//setTimeout(function() {location.reload();}, 1500);
	    		
				//$("#frname").val(jsn[0].u_father);
				//$("#gender").val(jsn[0].u_gender);
				//var dob=jsn[0].u_dob.split("-").reverse().join("/");
				//$("#dob").val(dob);
	    		$("#fname").val(jsn[0].u_name);
				$("#mail").val(jsn[0].u_email);
				$("#mobile").val(jsn[0].u_mobile);
				$("#address").val(jsn[0].u_address);
				$("#city").val(jsn[0].u_city);
				
				$("#country").val(jsn[0].u_country);
				$("#state").val(jsn[0].u_state);
				$("#apin").val(jsn[0].u_pincode);
				$("#bank_name").val(jsn[0].u_bankname);
				$("#branch_name").val(jsn[0].u_branch);
				$("#payee_name").val(jsn[0].u_name);
				$("#acnt_no").val(jsn[0].u_accountno);
				$("#ifsc").val(jsn[0].u_ifsc);
				$("#pan").val(jsn[0].u_pancard);
				//$("#nominee_name").val(jsn[0].u_nominee_name);
				//$("#relation").val(jsn[0].u_nom_relation);
				//$("#age").val(jsn[0].u_nominee_age);
$("#u_referal").val(jsn[0].u_referalid);
			
	    	}
	    	else
	    	{
	    		alertify.error("Invalid User")
	    	}
		
	     }
		 });
}
function ChangeProfile(base_url)
{
	var fname=$("#fname").val();
	var mail=$("#mail").val();
	var mobile=$("#mobile").val();
	var address=$("#address").val();
	var city=$("#city").val();
	
	var country=$("#country").val();
	var state=$("#state").val();
	var apin=$("#apin").val();
	var bank_name=$("#bank_name").val();
	var branch_name=$("#branch_name").val();
	//var payee_name=$("#payee_name").val();
	var acnt_no=$("#acnt_no").val();
	var ifsc=$("#ifsc").val();
	var pan=$("#pan").val();
	var emailformat = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/;
	var ifscformat=/^[A-Za-z]{4}0[A-Z0-9a-z]{6}$/;
	var phoneformat=/^\d{10}$/;	
	var regpan = /^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}?$/;
	//if(fname==""||mail==""||mobile==""||address==""||city==""||country==""||state==""||apin==""||bank_name==""||branch_name==""||acnt_no==""||ifsc==""||pan=="")
    if(fname==""||mobile==""||city==""||country==""||state=="")
	{
		alertify.error("Enter all Fields");
	}
	/*else if(!mail.match(emailformat))
	{
		alertify.error("Invalid email format");	
		//setTimeout(function() {$(".alertify-logs").remove();}, 1500);
		return false;
	}*/
	
	else if(!mobile.match(phoneformat))
	{
		alertify.error("Invalid phone format");	
		//setTimeout(function() {$(".alertify-logs").remove();}, 1500);
		return false;
	}
	/*else if(!ifsc.match(ifscformat))
	{
		alertify.error("Invalid IFSC Format");	
		//setTimeout(function() {$(".alertify-logs").remove();}, 1500);
		return false;
	}
	
	else if(!pan.match(regpan))
	{
		alertify.error("Invalid PAN Card Format");	
		//setTimeout(function() {$(".alertify-logs").remove();}, 1500);
		return false;
	}*/
	else
	{
                document.getElementById("submitt").disabled = true;
		$.ajax({
		    type: "POST",
		    url: base_url+"welcome/edituserprofile",		 
		    dataType: "json",
		    data:{"Fname":fname,"mail":mail,"mobile":mobile,"address":address,"city":city,"country":country,"state":state,"apin":apin,"bank_name":bank_name,"branch_name":branch_name,"acnt_no":acnt_no,"ifsc":ifsc,"pan":pan},
		    async:false,   
		    success: function(jsn) 
		    {
		    	if(jsn[0].res>0)
		    	{
                                document.getElementById("submitt").disabled = false;
		    		alertify.success("User Details Updated");
			        setTimeout(function() {location.reload();}, 1500);
		    	}
			else
                        {
                                document.getElementById("submitt").disabled = false;
		    		alertify.success(jsn[0].msg+" Already Exists");
                                setTimeout(function() {location.reload();}, 1500);
                        }
		    }
 		 });
	}
	
}





function uploadImage(base_url)
{
	var file_data = $('#profile_photo').prop('files')[0];
	  var form_data = new FormData();

	  form_data.append('photo', file_data);
	  
		 $.ajax({
			 url: base_url+"welcome/imgupload", // point to server-side controller method
			 dataType: 'json', // what to expect back from the server
			 async : false,
			 cache: false,
			 contentType: false,
			 processData: false,
			 data:form_data,
			 type: 'post',
			 success: function (json) {
				if(json.w==1)
				{
					alertify.success("Profile Picture Updated");
					var d = new Date();
					$('#photo  img').attr('src','');
		             $('#photo  img').attr('src',base_url+"/images/profile/"+json.img+"?"+d.getTime());
				}
				else
				{
					alertify.error("File Not Uploaded");
					$('#photo  img').attr('src','');
				}
				 
			  }
		  });
}
