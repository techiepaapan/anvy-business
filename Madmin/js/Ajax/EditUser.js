$(document).ready(function()
{
	
	var base_url=getUrl();
	UserDisplays(base_url);
	
	
	$("#editclidk").click(function()
	{
		EditUserDetails(base_url);
	});
        $(document).on("click",".active_user",function()
	{
		var id=$("#editid").val();
		//var id=$(this).attr('id');
		UserActivate(base_url,id);
	});
	$(document).on("click",".inactive_user",function()
	{
		var id=$("#editid").val();
		//var id=$(this).attr('id');
		UserDeactivate(base_url,id);
	});
	
	$(document).on("click",".chngref",function()
			{
				var ref=$("#referredbyid").val();
				$("#cref").val(ref);
				$("#nref").val();
			});
	
	$(document).on("click",".saveref",function()
			{
				var ref=$("#nref").val();
				var id=$("#editid").val();
				if(ref=="" || ref==null)
					{
						alertify.error("Enter Referral ID");
					}
				else{
					//alert(base_url+"welcome/changeref?ref="+ref+'&id='+id);
					$.getJSON(base_url+"welcome/changeref",{"ref":ref,'id':id},function(jsn)
							{
								var stat=jsn[0].res;
								if(stat==0)
								{
									alertify.error("Referral ID Not Found");
								}
								else
								{
									$("#referredbyid").val(jsn[0].ref);
									alertify.success("Referral ID Changed");
									$(".aclose").click();
									$("#cref").val("");
									$("#nref").val("");
								}
							});
					}
			});
	
	$(document).on("click",".editstatus",function()
			{
				var id=$(this).val();
				var p_code=$("#p_code option:selected").attr("value");
				var bv=$("#p_code option:selected").attr("value2");
				if(p_code=='' || p_code==null){
					alertify.error("Please Select A Product");
				}
				else if(bv=='' || bv==null){
					alertify.error("BV Not Available");
				}
				else if(id=='' || id==null){
					alertify.error("ID Null");
				}
				else{
				//alert(base_url+"welcome/editusertopaid?u_id="+id+"&pid="+p_code+"&bv="+bv);
				$.getJSON(base_url+"welcome/editusertopaid?u_id="+id+"&pid="+p_code+"&bv="+bv,function(jsn)
						{
							var result=jsn.result;
							if(result==1)
							{
								alertify.success("Status Updated");
								setTimeout(function() {location.reload();}, 1200);
							}
							else
							{
								alertify.error("Error Occurred("+result+")!!!");
							}
						});
					}
			});
	
		$(document).on("click",".resendsms",function()
			{
	
				 var id = $("#uid").val();
				  $.getJSON(base_url + "welcome/sendregsms_binary?id=" + id, function(json) {
					  if (json.stat == 1) {
					      alertify.success("SMS sent");
					    } else {
					      alertify.error("SMS not sent");
					    }
				  });
			});
	
	
	
});
function UserActivate(base_url,id)
{
	
	$.getJSON(base_url+"welcome/activateuser",{"Id":id},function(jsn)
	{
		var stat=jsn[0].u_status;
		if(stat==0)
		{
			$(".active_user").show();
			$(".inactive_user").hide();
		}
		else
		{
			$(".active_user").hide();
			$(".inactive_user").show();
		}
	});
}
function UserDeactivate(base_url,id)
{
	
	$.getJSON(base_url+"welcome/deactivateuser",{"Id":id},function(jsn)
	{
		var stat=jsn[0].u_status;
		if(stat==0)
		{
			$(".active_user").show();
			$(".inactive_user").hide();
		}
		else
		{
			$(".active_user").hide();
			$(".inactive_user").show();
		}
	});
}

function UserDisplays(base_url)
{
	var value2send=$("#editid").val();
	//alert(base_url+"welcome/userdisplay?userid="+value2send);
	$.getJSON(base_url+"welcome/userdisplay",{"userid":value2send,"From":"","To":""},function(jsn)
			{
				    var stat=jsn[0].u_status;
					if(stat==0)
					{
						$(".active_user").show();
						$(".inactive_user").hide();
					}
					else
					{
						$(".active_user").hide();
						$(".inactive_user").show();
					}
					$("#uid").val(jsn[0].u_id);
					$("#referral_id").val(jsn[0].u_referalid);
					
					$("#referredbyid").val(jsn[0].ref);
					$("#parentid").val(jsn[0].prnt);
					
					
					
					$("#username").val(jsn[0].username);
					$("#upass").val(jsn[0].u_password);
					$("#fname").val(jsn[0].u_name);
					$("#frname").val(jsn[0].u_father);
					$("#gender").val(jsn[0].u_gender);
					var dob=jsn[0].u_dob.split("-").reverse().join("/");
					$("#dob").val(dob);
					$("#mail").val(jsn[0].u_email);
					$("#mobile").val(jsn[0].u_mobile);
					$("#address").val(jsn[0].u_address);
					$("#city").val(jsn[0].u_city);
					
					$("#country").val(jsn[0].u_country);
					$("#state").val(jsn[0].u_state);
					$("#apin").val(jsn[0].u_pincode);
					$("#bank_name").val(jsn[0].u_bankname);
					$("#branch_name").val(jsn[0].u_branch);
					$("#acnt_no").val(jsn[0].u_accountno);
					$("#ifsc").val(jsn[0].u_ifsc);
					$("#pan").val(jsn[0].u_pancard);
					$("#nominee_name").val(jsn[0].u_nominee_name);
					$("#relation").val(jsn[0].u_nom_relation);
					$("#age").val(jsn[0].u_nominee_age);
				
				
			});

}


function EditUserDetails(base_url)
{
	var uid=$("#uid").val();
	//alert("uid"+uid);
	//$("#referral_id").val();
	var fname=$("#fname").val();
	//alert("fname"+fname);
	var frname=$("#frname").val();
	//alert("frname"+frname);
	var gender=$("#gender").val();
	//alert("gender"+gender)
	var dob=$("#dob").val();
	
	dob=dob.split("/").reverse().join("-");
	//alert("dob"+dob);
	var mail=$("#mail").val();
	//alert("mail"+mail);
	var mobile=$("#mobile").val();
	//alert("mobile"+mobile);
	var address=$("#address").val();
	//alert("address"+address);
	var city=$("#city").val();
	//alert("city"+city);
	var country=$("#country").val();
	//alert("country"+country);
	var state=$("#state").val();
	//alert("state"+state);
	var apin=$("#apin").val();
	//alert("apin"+apin);
	var bank_name=$("#bank_name").val();
	//alert("bank_name"+bank_name);
	var branch_name=$("#branch_name").val();
	//alert("branch_name"+branch_name);
	var acnt_no=$("#acnt_no").val();
	//alert("acnt_no"+acnt_no);
	var ifsc=$("#ifsc").val();
	//alert("ifsc"+ifsc);
	var pan=$("#pan").val();
	//alert("pan"+pan);
	var nominee_name=$("#nominee_name").val();
	//alert("nominee_name"+nominee_name);
	var relation=$("#relation").val();
	//alert("relation"+relation);
	var age=$("#age").val();
	var maxbv=$("#maxbv").val();
	//alert("age"+age);
	
	var emailformat = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/;
	var ifscformat=/^[A-Za-z]{4}0[A-Z0-9a-z]{6}$/;
	var phoneformat=/^\d{10}$/;	
	var regpan = /^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}?$/;
	//if(uid==""||fname==""||frname==""||dob==""||mail==""||mobile==""||address==""||city==""||country==""||state==""||apin==""||bank_name==""||branch_name==""||acnt_no==""||ifsc==""||pan==""||nominee_name==""||relation==""||age==""||maxbv=="")
	if(uid==""||fname==""||mobile==""||city==""||country==""||state==""||maxbv==""||gender=="")
	{
		
		alertify.error("Enter all Fields");
	}
	else if(isNaN(maxbv))
	{
		alertify.error("Invalid Max BV");
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
	
	else
	{


                document.getElementById("editclidk").disabled = true;
		//alert(base_url+"welcome/editusers?Id="+uid+"&Fname="+fname+"&Father="+frname+"&gender="+gender+"&dob="+dob+"&mail="+mail+"&mobile="+mobile+"&address="+address+"&city="+city+"&country="+country+"&state="+state+"&apin="+apin+"&bank_name="+bank_name+"&branch_name="+branch_name+"&acnt_no="+acnt_no+"&ifsc="+ifsc+"&pan="+pan+"&nominee_name="+nominee_name+"&relation="+relation+"&age="+age);
		$.ajax({
		    type: "POST",
		    url: base_url+"welcome/editusers",		 
		    dataType: "json",
		    data:{"Id":uid,"Fname":fname,"Father":frname,"gender":gender,"dob":dob,"mail":mail,"mobile":mobile,"address":address,"city":city,"country":country,"state":state,"apin":apin,"bank_name":bank_name,"branch_name":branch_name,"acnt_no":acnt_no,"ifsc":ifsc,"pan":pan,"nominee_name":nominee_name,"relation":relation,"age":age,"maxbv":maxbv},
		    async:false,   
		    success: function(jsn) 
		    {
                        
		    	if(jsn[0].res>0)
		    	{
                                document.getElementById("editclidk").disabled = false;
		    		alertify.success("User Details Updated");
				setTimeout(function() {window.location.href=base_url+"welcome/edituser";}, 1500);
		    	}
                        else
                        {
                                document.getElementById("editclidk").disabled = false;
		    		alertify.success(jsn[0].msg+" Already Exists");
                                setTimeout(function() {location.reload();}, 1500);
                        }
			
		    }
 		 });
	}
}