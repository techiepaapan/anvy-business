$(document).ready(function()
{
	
	var base_url=getUrl();
	
	$("#user_reg").click(function()
	{
		RegisterUser(base_url);
	});
	$("#checkuseid").click(function()
	{
		CheckAvailability(base_url);	
	});
	$("#refreal_sub").click(function()
	{
		CheckReferal(base_url);
	});
	$("#psrch").click(function()
	{
		
		ParentSearch(base_url);
	});
	
});
function RegisterUser(base_url)
{
	var msg="";var msg1="";var b1=0;var b2=0;var msg2="";var b3=0;
	var referalid=$("#referral_id").val();
	var parentid=$("#parent_id").val();
	var fname=$("#fname").val();
	var frname=$("#frname").val();
	var dob=$("#dob").val();
	dob=dob.split("/").reverse().join("-");
	var mail=$("#mail").val();
	var mobile=$("#mobile").val();
	var gender=$("input[name='gen']:checked").val();
	var position=$("input[name='pos']:checked").val();
	var address=$("#address").val();
	var city=$("#city").val();
	var country=$("#country").val();
	var state=$("#state").val();
	var apin=$("#apin").val();
	
	var bank_name=$("#bank_name").val();
	var branch_name=$("#branch_name").val();
	var acnt_no=$("#acnt_no").val();
	var ifsc=$("#ifsc").val();
	var pan=$("#pan").val();
	var add=$("#added").val();
	var nominee_name=$("#nominee_name").val();
	var relation=$("#relation").val();
	var age=$("#age").val();
	var username=$("#username").val();
	var password=$("#password").val();
	var emailformat = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/;
	
	var phoneformat=/^\d{10}$/;		
	var fu=$("#fu").val();
	if(fu==1)
	{
		if(add==""||fname==""||frname==""||gender==""||dob==""||mail==""||mobile==""||address==""||city==""||country==""||state==""||apin==""||bank_name==""||branch_name==""||acnt_no==""||ifsc==""||pan==""||nominee_name==""||relation==""||age==""||username==""||password=="")
		{
			
			alertify.error("Enter all Fields");
		}
		else if(!mail.match(emailformat))
		{
			alertify.error("Invalid email format");	
			//setTimeout(function() {$(".alertify-logs").remove();}, 1500);
			return false;
		}
		
		else if(!mobile.match(phoneformat))
		{
			alertify.error("Invalid phone format");	
			//setTimeout(function() {$(".alertify-logs").remove();}, 1500);
			return false;
		}
		else
		{
			msg1="";msg="";b1=0;b2=0;
			var username=$("#username").val();
			if(username=="")
			{
				alertify.error("Please Enter UserName");
			}
			else
			{
				
				$.ajax({
				    type: "POST",
				    url: base_url+"welcome/checkavailabe",		 
				    dataType: "json",
				    data:{"User":username},
				    async:false,   
				    success: function(jsn) 
				    {
				
						var res=jsn[0].result;
						///return res;
						if(jsn[0].result>0)
						{
							b1=1;
						}
						else
						{
							msg="Username";
							
						}
				    }
		 		 });
				if((b1==1))
				{
					
					$.ajax({
					    type: "POST",
					    url: base_url+"welcome/addfirstuser",		 
					    dataType: "json",
					    data:{"User":username,"Fname":fname,"Father":frname,"gender":gender,"dob":dob,"mail":mail,"mobile":mobile,"address":address,"city":city,"country":country,"state":state,"apin":apin,"bank_name":bank_name,"branch_name":branch_name,"acnt_no":acnt_no,"ifsc":ifsc,"pan":pan,"nominee_name":nominee_name,"relation":relation,"age":age,"password":password,"Added":add},
					    async:false,   
					    success: function(jsn) 
					    {
					
							alertify.success("User Added");
							setTimeout(function() {location.reload();}, 1500);
					    }
			 		 });
					
				}
				else
				{
				    if(msg!="")
					{
						alertify.alert(msg+" Already Exists");
					}
				
				}
			}
		}
	}
	else
	{
		if(referalid==""||parentid==""||position==""||fname==""||frname==""||dob==""||mail==""||mobile==""||address==""||city==""||country==""||state==""||apin==""||bank_name==""||branch_name==""||acnt_no==""||ifsc==""||pan==""||nominee_name==""||relation==""||age==""||username==""||password=="")
		{
			
			alertify.error("Enter all Fields");
		}
		else if(!mail.match(emailformat))
		{
			alertify.error("Invalid email format");	
			//setTimeout(function() {$(".alertify-logs").remove();}, 1500);
			return false;
		}
		
		else if(!mobile.match(phoneformat))
		{
			alertify.error("Invalid phone format");	
			//setTimeout(function() {$(".alertify-logs").remove();}, 1500);
			return false;
		}
		else
		{
			msg="";msg1="";b1=0;b2=0;b3=0;
			var bid1=$("#referral_id").val();
			var bid2=$("#username").val();
			var bid3=$("#parent_id").val();
			if((bid1!="") && (bid2!="")&&(bid3!=""))
			{
				$.ajax({
				    type: "POST",
				    url: base_url+"welcome/check_referralid_username_parent/",		 
				    dataType: "json",
				    data:{"bid1":bid1,"bid2":bid2,"bid3":bid3},
				    async:false,   
				    success: function(jsn) 
				    {
	 				 //alert(json.length);
		  				if(jsn[0].mg1>0)
		  				{
		  					msg="Referal Id";
		  				}
		  				else
		  				{
		  					b1=1;	
		  				}
		  				if(jsn[0].mg2>0)
				  		{
					  		msg1="User Name Already Exists <br/>";
					  		
				  		}
				  		else
				  		{
				  			b2=1;
					  	}
		  				if(jsn[0].mg3>0)
			  			{
			  				if(b1==0){msg=msg+", Parent Id";}
				  			else{msg="Parent Id";}
			  			}
			  			else
			  			{
			  				b3=1;
				  		}
				    }
		 		 });
				
				
			}
			
			if((b1==1)&&(b2==1)&&(b3==1))
			{
				alert();
				$.ajax({
				    type: "POST",
				    url: base_url+"welcome/addusers",		 
				    dataType: "json",
				    data:{"Parent":parentid,"Referal":referalid,"Pos":position,"User":username,"Fname":fname,"Father":frname,"gender":gender,"dob":dob,"mail":mail,"mobile":mobile,"address":address,"city":city,"country":country,"state":state,"apin":apin,"bank_name":bank_name,"branch_name":branch_name,"acnt_no":acnt_no,"ifsc":ifsc,"pan":pan,"nominee_name":nominee_name,"relation":relation,"age":age,"password":password,"Added":add},
				    async:false,   
				    success: function(jsn) 
				    {
				
						alertify.success("User Added");
						setTimeout(function() {location.reload();}, 1500);
				    }
		 		 });
				
			}
			else
			{if(b1==0||b3==0){msg=msg+" Does Not Exist<br/>";}
				alertify.error(msg+msg1);
					
			}
	}
	
	}
}
function CheckAvailability(base_url)
{
	
	var username=$("#username").val();
	if(username=="")
	{
		return "Please Enter UserName";
	}
	else
	{
		
		$.getJSON(base_url+"welcome/checkavailabe",{"User":username},function(jsn)
		{
			var res=jsn[0].result;
			///return res;
			if(jsn[0].result==0)
			{
				alertify.success("Username Already Exists");
			}
			else
			{
				alertify.success("Username Not Exists");
			}
			
		});
	}
}

function CheckReferal(base_url)
{
	var referalid=$("#referral_id").val();
	if(referalid=="")
	{
		alertify.error("Please Enter Referral Id");
	}
	else
	{
		
		$("#refname").text("");
		$("#refdate").text("");
		$.getJSON(base_url+"welcome/checkreferal",{"Referal":referalid},function(jsn)
		{
			$("#refname").text("");
			$("#refdate").text("");
			if(jsn[0].result==0)
			{
				alertify.success("ReferalId Not Available");
			}
			else
			{
				var name=jsn[0].u_name+" "+jsn[0].u_father;

				var joindate=jsn[0].u_joindate;
				joindate=joindate.split("-").reverse().join("/");
				$("#refname").text(name);
				$("#refdate").text(joindate);
			}
			
		});
	}
}
function ParentSearch(base_url)
{
	$("#m_parent_name").val("");
	$("#childappen").html("");
	var parentid=$("#parent_id").val();
	// data-toggle="modal" data-target="#myModal"
	if(parentid=="")
	{
		alertify.error("Please Enter Parent Id");
	}
	else
	{
		$("#m_parent_name").val("");
		$("#childappen").html("");
		$.getJSON(base_url+"welcome/checkparentid",{"Parentid":parentid},function(jsn)
		{
			$("#m_parent_name").val("");
			$("#childappen").html("");
			if(jsn[0].userid==0)
			{
				alertify.success("ReferalId Not Available");
			}
			else
			{
				$("#myModal").modal('show');
				var name=jsn[0].uname+" "+jsn[0].ufather;
				var lft=jsn[0].lft;
				var rgt=jsn[0].rght;
				if(lft==null||rgt=="")
				{
					lft="empty";
				}
				if(rgt==null||rgt=="")
				{
					rgt="empty";
				}
				var useid=jsn[0].userid;
				$("#m_parent_name").val(name);
				$("#childappen").append('<tr><td id="left'+useid+'">'+lft+'</td><td id="right'+useid+'">'+rgt+'</td></tr>')
			}
			
		});
	}
}