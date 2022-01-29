$(document).ready(function()
{
	
	var base_url=getUrl();
	var cid=1;
	var tp=1;
	ViewUser(base_url,cid,tp);
	$(document).on("click",".views",function()
	{
		var cid=$(this).attr('id');
				
				cid=cid.slice(3);
				var tp=1;
				ViewUser(base_url,cid,tp);
				
	});
	$("#usersrch").keyup(function(e)
	{ 	
		 UserSuggestion(base_url,e);
	});
	$("#use_srch").on("click",function(e)
	{ 	
		UserDisplay(base_url,e);
	});
	
	$("#up").on("click",function(e)
	{ 	
		var cid=$(this).attr('id1');
		var tp=2;
		ViewUser(base_url,cid,tp);
	});
	
	$(".sendregsms").on("click",function(e)
		{ 	
				var id=$("#up").attr('id1');
			 $.getJSON(base_url+"welcome/sendregsms?id="+id, function(json)
				 {	
					 if(json.stat==1)	{
						 alertify.success("SMS sent");
					 }
				 else{
					 alertify.error("SMS not sent");
				 }
				 });
		});
	
	$(".getUserIdForEdit").on("click",function(e)
			{ 	
				var cur_id=$("#up").attr('id1');
				var tp=1;
				getUserIdForEdit(base_url,cur_id,tp);
			});

	
	$(".edituserval").on("click",function(e){
		
		var id=$("#editthisid").val();
		var name=$("#editname").val();
		var uname=$("#edituid").val();
		var pwd=$("#editpwd").val();
		var phone=$("#editph").val();
		var email=$("#editem").val();
		var phoneformat=/^\d{10}$/;	
		var emailformat = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/;
		
		if(id=="" || id==1){
			alertify.error("Cannot Edit This User");
		}
		else if(name=='' ||uname=='' ||pwd==''||phone==''){
			alertify.error("Enter Values for fields marked important");
		}
		else if(!phone.match(phoneformat))
		{
			alertify.error("Invalid phone format");
		}
		
		else if(email!="" & !email.match(emailformat))
		{
			alertify.error("Invalid email format");
		}
		else{
		//alert(base_url+"welcome/editmuser?id="+id+"&name="+name+"&uname="+uname+"&pwd="+pwd+"&phone="+phone+"&email="+email);
		 $.getJSON(base_url+"welcome/editmuser?id="+id+"&name="+name+"&uname="+uname+"&pwd="+pwd+"&phone="+phone+"&email="+email, function(json)
				 {	
					 if(json[0].res==1)	{
						 alertify.success(json[0].msg);
						 $(".aclose").click();
						 var tp=1;
						 var cid=id;
						 ViewUser(base_url,cid,tp);
					 }
					 else{
						 alertify.error(json[0].msg);
					 }
				});
		}
	});
});


function UserSuggestion(base_url,e)
{
	var text=$("#usersrch").val();

	$("#a_usr_details").html("");
			 $.getJSON(base_url+"welcome/usersuggest_m/",{"term":text}, function(json)
			 {	
				 $("#a_usr_details").html("");
				 //alert(JSON.stringify(json));
						for(var i=0;i<json.length;i++)
						{
							$("#a_usr_details").append('<option value="'+json[i].u_name+'"></option>');

						}				       				      
			}); 
	

}

function UserDisplay(base_url,e)
{
	var shownVal= document.getElementById("usersrch").value;
	
	if(shownVal=="")
	{
		alertify.error("Enter Any Value To Search");
	}
	else
	{
		document.getElementById("use_srch").disabled = true;
		$.getJSON(base_url+"welcome/userdisplay_m",{"term":shownVal},function(jsn)
		{
			$("#usersrch").val("");
			if(jsn.length>0)
				{
				var cid=jsn[0].u_id;
				var tp=1;
				ViewUser(base_url,cid,tp);
				}
			else{
				document.getElementById("use_srch").disabled = false;
			}
		});
	}
}


function ViewUser(base_url,cid,tp)
{
	//alert(base_url+"welcome/viewusers_m?id="+cid+"&tp="+tp);
	
	if(cid==1 && tp==2){}
	else{
	$.ajax({
	    type: "POST",
	    url: base_url+"welcome/viewusers_m",
	 
	    dataType: "json",
	    data:{'id':cid,'tp':tp},
	    beforeSend: function(){
	    	document.getElementById("up").disabled = true;
	    	document.getElementById("use_srch").disabled = true;
			  },
	    success: function(jsn) 
	    {
	    	$("#loadviewuser").html("");
	    	//alert(jsn.length);
	    	if(tp==1)
	    	{$("#up").attr("id1",cid);}
	    	else{$("#up").attr("id1",jsn[0].id1);}
	    	var mname=(jsn[0].mname).replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
	    	$("#mid").text(mname);
	    	if(jsn[0].res==1)
	    	{
				for(var i=0;i<jsn.length;i++)
				{
					var u_name=(jsn[i].u_name).replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
					$("#loadviewuser").append('<tr class="views" id="mob'+jsn[i].u_id+'">'+
							'<td style="padding: 3px !important; width: 10%;color: #696969;">'+(i+1)+'</td>'+
							'<td style="padding: 3px !important;width: 25%;color: #696969;">'+jsn[i].username+'</td>'+
							'<td style="padding: 3px !important;width: 25%;color: #696969;">'+jsn[i].u_password+'</td>'+
							'<td style="padding: 3px !important;width: 25%;color: #696969;">'+u_name+'</td>'+
							'<td style="padding: 3px !important;width: 25%;color: #696969;">'+jsn[i].u_mobile+'</td>'+
							'<td style="padding: 3px !important;width: 15%;color: #696969;">'+jsn[i].cnt+'</td>'+
						 	'</tr>');	  
				}
	    	}
	    },
		  complete: function(){
			  document.getElementById("up").disabled = false;
			  document.getElementById("use_srch").disabled = false;
			  }
	    });
	
	var cur_id=cid;
		getuser_id(base_url,cur_id,tp);
	}
}

function viewedit(base_url,cid)
{
	window.location.href=base_url+"welcome/edits?uid="+cid;

}


function getuser_id(base_url,cur_id,tp){
	
	$("#cuid").html("");
	$("#cpwd").html("");
	$("#cphone").html("");
	$("#cref").html("");
	//alert(base_url+"welcome/viewusers_m_id?id="+cur_id+"&tp="+tp);
	$.ajax({
	    type: "POST",
	    url: base_url+"welcome/viewusers_m_id",
	    dataType: "json",
	    data:{'id':cur_id,'tp':tp},
	    success: function(json) 
	    {
	    	if(json.length>0){
	    	$("#cuid").html(json[0].username);
	    	$("#cpwd").html(json[0].u_password);
	    	$("#cphone").html(json[0].u_mobile);
	    	$("#cref").html(json[0].cnt);
	    	}
	    }
	});
	
}



function getUserIdForEdit(base_url,cur_id,tp){
	
	$("#editthisid").val("");
	$("#editname").val("");
	$("#edituid").val("");
	$("#editpwd").val("");
	$("#editph").val("");
	$("#editem").val("");
	//alert(base_url+"welcome/viewusers_m_id?id="+cur_id+"&tp="+tp);
	$.ajax({
	    type: "POST",
	    url: base_url+"welcome/viewusers_m_id",
	    dataType: "json",
	    data:{'id':cur_id,'tp':tp},
	    success: function(json) 
	    {
	    	//alert(json.length);
	    	if(json.length>0){
	    	$("#editthisid").val(json[0].u_id);
	    	$("#editname").val(json[0].u_name);
	    	$("#edituid").val(json[0].username);
	    	$("#editpwd").val(json[0].u_password);
	    	$("#editph").val(json[0].u_mobile);
	    	$("#editem").val(json[0].u_email);
	    	}
	    }
	});
	
}