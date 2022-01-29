$(document).ready(function()
{
	
	var base_url=getUrl();
	loadProductCode(base_url);
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
	$(".lft").click(function()
	{
		var lftchd=$("#lftchd").text();
		if(lftchd=="--.--")
		{
			$("#myModal").modal('hide');
			$("#pos").val("Left");
			$('#pos').attr('readonly', 'readonly');  
			$("#parent_id").attr('readonly', 'readonly'); 
		}
	});
	$(".rgt").click(function()
	{
		var rgtchd=$("#rgtchd").text();
		if(rgtchd=="--.--")
		{
			$("#myModal").modal('hide');
			$("#pos").val("Right");	
			$('#pos').attr('readonly', 'readonly'); 
			$("#parent_id").attr('readonly', 'readonly'); 
		}
	});
	$("#referral_id").dblclick(function()
	{
		$("#referral_id").removeAttr('readonly'); 
	});
	$("#parent_id").dblclick(function()
	{
		$("#parent_id").removeAttr('readonly'); 
	});
	
});
function RegisterUser(base_url)
{
	var msg="";var msg1="";var b1=0;var b2=0;var msg2="";var b3=0;var b4=0;var b5=0;
	var referalid=$("#referral_id").val();
	var parentid=$("#parent_id").val();
	var fname=$("#fname").val();
	var frname=$("#frname").val();
	var dob=$("#dob").val();
	dob=dob.split("/").reverse().join("-");
	var mail=$("#mail").val();
	var mobile=$("#mobile").val();
	var gender=$("input[name='gen']:checked").val();
	var position=$("#pos").val();
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
	var p_code=$("#p_code").val();
	//alert(p_code);
	//var re = /^([0-9]{11})|([0-9]{2}-[0-9]{3}-[0-9]{6})$/;
	var emailformat = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/;
	var ifscformat=/^[A-Za-z]{4}0[A-Z0-9a-z]{6}$/;
	var phoneformat=/^\d{10}$/;	
	var regpan = /^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}?$/;
	var fu=$("#fu").val();
	if(fu==1)
	{
		//if(p_code==""||add==""||fname==""||frname==""||gender==""||dob==""||mail==""||mobile==""||address==""||city==""||country==""||state==""||apin==""||bank_name==""||branch_name==""||acnt_no==""||ifsc==""||pan==""||nominee_name==""||relation==""||age==""||username==""||password==""||p_code=="")
if(p_code==""||add==""||fname==""||mobile==""||gender==""||city==""||country==""||state==""||username==""||password==""||p_code=="")		
		
		{
			
			alertify.error("Enter all Fields");
		}
		/*else if(!mail.match(emailformat))
		{
			alertify.error("Invalid Email Format");	
			//setTimeout(function() {$(".alertify-logs").remove();}, 1500);
			return false;
		}
		
		else if(!ifsc.match(ifscformat))
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
		else if(!mobile.match(phoneformat))
		{
			alertify.error("Invalid Phone Format");	
			//setTimeout(function() {$(".alertify-logs").remove();}, 1500);
			return false;
		}
		else if(p_code=="Select")
		{
			alertify.error("Select Any Product Code");
			
		}
		else
		{
			msg1="";msg="";b1=0;b2=0;b3=0;
			var username=$("#username").val();
			var mails=$("#mail").val();
                        if(mails=="")
			{
				mails="massventure@gmail.com"
			}
			 var mobile=$("#mobile").val();
			//var p_code=$("#p_code").val();
			if(username=="")
			{
				alertify.error("Please Enter UserName");
			}
			else if(mails=="")
			{
				alertify.error("Please Enter Mail");
			}
			else if(mobile=="")
			{
				alertify.error("Please Enter Mobile");
			}
			else
			{
				var b1=0;
				$.ajax({
				    type: "POST",
				    url: base_url+"welcome/checkavailabes",		 
				    dataType: "json",
				    data:{"User":username,"Mail":mails,"Mob":mobile},
				    async:false,   
				    success: function(jsn) 
				    {
						if(jsn[0].msg>0)
						{
							b1=1;
						}
						else
						{
							msg="Username ";
							
						}
							b2=1;
						
							b3=1;
				    }
		 		 });
				if((b1==1)&&(b2==1)&&(b3==1))
				{
//alert(base_url+"welcome/addfirstuser?User="+username+"&Fname="+fname+"&Father="+frname+"&gender="+gender+"&dob="+dob+"&mail="+mail+"&mobile="+mobile+"&address="+address+"&city="+city+"&country="+country+"&state="+state+"&apin="+apin+"&bank_name="+bank_name+"&branch_name="+branch_name+"&acnt_no="+acnt_no+"&ifsc="+ifsc+"&pan="+pan+"&nominee_name="+nominee_name+"&relation="+relation+"&age="+age+"&password="+password+"&Added="+add+"&code="+p_code);

					document.getElementById("user_reg").disabled = true;
					$.ajax({
					    type: "POST",
					    url: base_url+"welcome/addfirstuser",		 
					    dataType: "json",
					    data:{"User":username,"Fname":fname,"Father":frname,"gender":gender,"dob":dob,"mail":mail,"mobile":mobile,"address":address,"city":city,"country":country,"state":state,"apin":apin,"bank_name":bank_name,"branch_name":branch_name,"acnt_no":acnt_no,"ifsc":ifsc,"pan":pan,"nominee_name":nominee_name,"relation":relation,"age":age,"password":password,"Added":add,"code":p_code},
					    async:false,   
					    success: function(jsn) 
					    {
					                document.getElementById("user_reg").disabled = false;
							alertify.success("User Added");
							setTimeout(function() {location.reload();}, 1000);
					    }
			 		 });
					
				}
				else
				{
                                   document.getElementById("user_reg").disabled = false;
				   msg=msg+" Already Exist";
				   alertify.error(msg);
				    
				}
			}
		}
	}
	else
	{
		//if(p_code==""||referalid==""||parentid==""||position==""||fname==""||frname==""||dob==""||mail==""||mobile==""||address==""||city==""||country==""||state==""||apin==""||bank_name==""||branch_name==""||acnt_no==""||ifsc==""||pan==""||nominee_name==""||relation==""||age==""||username==""||password=="")
if(p_code==""||referalid==""||parentid==""||position==""||gender==""||fname==""||mobile==""||city==""||country==""||state==""||username==""||password=="")
		
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
		else if(p_code=="")
		{
			
			alertify.error("Please Enter Product Code");
		}
		else
		{
			msg="";msg1="";b1=0;b2=0;b3=0;
			var bid1=$("#referral_id").val();
			var bid2=$("#username").val();
			var bid3=$("#parent_id").val();
			var bid4=$("#mail").val();
                        if(bid4=="")
			{
				bid4="massventure@gmail.com"
			}
			 var bid5=$("#mobile").val();
			if((bid1!="") && (bid2!="")&&(bid3!="")&&(bid4!="")&&(bid5!=""))
			{
				$.ajax({
				    type: "POST",
				    url: base_url+"welcome/check_referralid_username_parent/",		 
				    dataType: "json",
				    data:{"bid1":bid1,"bid2":bid2,"bid3":bid3,"bid4":bid4,"bid5":bid5},
				    async:false,   
				    success: function(jsn) 
				    {
	 				 //alert(json.length);
		  				if(jsn[0].mg1>0)
		  				{
		  					msg="Sponsor Id";
		  				}
		  				else
		  				{
		  					b1=1;	
		  				}
		  				if(jsn[0].mg2>0)
				  		{
					  		msg1="User Name<br/>";
					  		
				  		}
				  		else
				  		{
				  			b2=1;
					  	}
		  				if(jsn[0].mg3>0)
			  			{
			  				if(b1==0){msg=msg+", Parent Id";}
				  			else{msg="Placement Id";}
			  			}
			  			else
			  			{
			  				b3=1;
				  		}
		  				/*if(jsn[0].mg4>0)
			  			{
			  				if(b2==0){msg1=msg1+", Mail";}
				  			else{msg1="Mail";}
			  			}
			  			else
			  			{*/
			  				b4=1;
				  		//}
		   				if(jsn[0].mg5>0)
			  			{
			  				if(b2==0||b4==0){msg1=msg1+", Mobile";}
				  			else{msg1="Mobile";}
			  			}
			  			else
			  			{
			  				b5=1;
				  		}
		  				
				    }
		 		 });
				
				
			}
			
			if((b1==1)&&(b2==1)&&(b3==1)&&(b4==1)&&(b5==1))
			{
                                  document.getElementById("user_reg").disabled = true;
				//alert(base_url+"welcome/addusers?Parent="+parentid+"&Referal="+referalid+"&Pos="+position+"&User="+username+"&Fname="+fname+"&Father="+frname+"&gender="+gender+"&dob="+dob+"&mail="+mail+"&mobile="+mobile+"&address="+address+"&city="+city+"&country="+country+"&state="+state+"&apin="+apin+"&bank_name="+bank_name+"&branch_name="+branch_name+"&acnt_no="+acnt_no+"&ifsc="+ifsc+"&pan="+pan+"&nominee_name="+nominee_name+"&relation="+relation+"&age="+age+"&password="+password+"&Added="+add+"&code="+p_code);
				$.ajax({
				    type: "POST",
				    url: base_url+"welcome/addusers",		 
				    dataType: "json",
				    data:{"Parent":parentid,"Referal":referalid,"Pos":position,"User":username,"Fname":fname,"Father":frname,"gender":gender,"dob":dob,"mail":mail,"mobile":mobile,"address":address,"city":city,"country":country,"state":state,"apin":apin,"bank_name":bank_name,"branch_name":branch_name,"acnt_no":acnt_no,"ifsc":ifsc,"pan":pan,"nominee_name":nominee_name,"relation":relation,"age":age,"password":password,"Added":add,"code":p_code},
				    async:false,   
				    success: function(jsn) 
				    {
				                document.getElementById("user_reg").disabled = false;
						alertify.success("User Added");
						setTimeout(function() {location.reload();}, 1000);
				    }
		 		 });
				
				
			}
			else
			{
                                document.getElementById("user_reg").disabled = false;
				if(b1==0||b3==0){msg=msg+" Does Not Exist<br/>";}
				if(b2==0||b4==0||b5==0){msg1=msg1+" Already Exist<br/>";}
				alertify.error(msg+msg1);
					
			}
	}
	
	}
}
function CheckAvailability(base_url)
{
	
	var username=$("#username").val();
	//alert(username);
	if(username=="")
	{
		return "Please Enter UserName";
	}
	else
	{
		
		$.getJSON(base_url+"welcome/checkavailabes",{"User":username},function(jsn)
		{
			var res=jsn[0].msg;
			
			if(jsn[0].msg==0)
			{
				alertify.error("Username Already Exists");
			}
			else
			{
				alertify.success("Username Available");
			}
			
		});
	}
}

function CheckReferal(base_url)
{
	var referalid=$("#referral_id").val();
	if(referalid=="")
	{
		alertify.error("Please Enter Sponsor Id");
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
				alertify.error("SponsorId Not Available");
			}
			else
			{
				$("#referral_id").attr('readonly', 'readonly'); 
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
	$(".lft").removeClass('empty');
	$(".rgt").removeClass('empty');
	$("#rgtchd").text("");
	$("#lftchd").text("");
	$("#m_parent_name").val("");
	var parentid=$("#parent_id").val();
	// data-toggle="modal" data-target="#myModal"
	if(parentid=="")
	{
		alertify.error("Please Enter Placement Id");
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
				alertify.error("Placement Id Not Available");
			}
			else
			{
				$("#myModal").modal('show');
				var name=jsn[0].uname+" "+jsn[0].ufather;
				var lft=jsn[0].lft;
				var rgt=jsn[0].rght;
				if(lft==null||rgt=="")
				{
					lft="--.--";
					$(".lft").addClass('empty');
				}
				if(rgt==null||rgt=="")
				{
					rgt="--.--";
					$(".rgt").addClass('empty');
				}
				var useid=jsn[0].userid;
				$("#m_parent_name").val(name);
				$("#rgtchd").text(rgt);
				$("#lftchd").text(lft);
				//$("#childappen").append('<tr><td id="left'+useid+'">'+lft+'</td><td id="right'+useid+'">'+rgt+'</td></tr>')
			}
			
		});
	}
}
function loadProductCode(base_url)
{
	$.getJSON(base_url+"welcome/loadprocode",function(jsn)
	{
		if(jsn.length>0)
		{
			for(var i=0;i<jsn.length;i++)
			{
				$("#p_code").append('<option value="'+jsn[i].product_id+'" id="'+jsn[i].product_id+'">'+jsn[i].product_code+'</option>');
			}
			
		}
		
	});
	
}