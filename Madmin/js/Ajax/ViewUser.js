$(document).ready(function()
{
	
	var base_url=getUrl();
	ViewUser(base_url);
	$(document).on("click",".views",function()
	{
		var cid=$(this).attr('id');
				
				cid=cid.slice(3);
				var id=cid;
				var hovered1 = $(this).find(".active_user:hover").length;
				var hovered2 = $(this).find(".inactive_user:hover").length;
				//alert(hovered1+" - "+hovered2);
				if(hovered1==1) {
					UserActivate(base_url,id);
				}
				else if(hovered2==1) { 
					UserDeactivate(base_url,id);
					}
				else{
					//alert();
				viewedit(base_url,cid);
				}
	});
	$("#usersrch").keyup(function(e)
	{ 	
		 UserSuggestion(base_url,e);
	});
	$("#use_srch").on("click",function(e)
	{ 	
		UserDisplay(base_url,e);
	});
	
	$("#fromid,#toid").click(function()
	{
		
		$("#usersrch").val("");
	});
	
	$("#usersrch").click(function()
	{
		$("#fromid,#toid").val("");
	});
});

function UserActivate(base_url,id)
{
	
	$.getJSON(base_url+"welcome/activateuser",{"Id":id},function(jsn)
	{
		var stat=jsn[0].u_status;
		if(stat==0)
		{
			$("#a"+id).show();
			$("#d"+id).hide();
		}
		else
		{
			$("#a"+id).hide();
			$("#d"+id).show();
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
			$("#a"+id).show();
			$("#d"+id).hide();
		}
		else
		{
			$("#a"+id).hide();
			$("#d"+id).show();
		}
	});
}
function UserSuggestion(base_url,e)
{
	var text=$("#usersrch").val();
	//alert(text);
	if ((e.which == 38)||(e.which == 40)) {
	}
	else if(e.which == 13)
	{
		var searchproduct=$("#usersrch").val();
		var delayMillis = 100; //1 second
		setTimeout(function() {
			$("#usersrch").val(searchproduct);
			//searchproduct=$("#srch").val();
			
		}, delayMillis);
		//arr(searchproduct);
	}
	else if(text=="")
	{
		 $("#a_usr_details").html("");
		 $("#loadviewuser").html("");
		 ViewUser(base_url);
	}
	else
	{		
		$("#loadviewuser").html("");
		$.ajax({
		    type: "POST",
		    url: base_url+"welcome/usersuggest1",
		 
		    dataType: "json",
		    data:{"term":text},
		    success: function(jsn) 
		    {
		    	$("#loadviewuser").html("");
		    	appendUsers(jsn);
		    }
		    });
	}

}
function UserDisplay(base_url,e)
{
	var pflg=0,cpflg=0;
	
	var value2send=0;
	var from="";
	var to="";
	
	var shownVal= document.getElementById("usersrch").value;
	var id= document.getElementById("userid").value;
	if(shownVal!="")
	{
		value2send=document.querySelector("#a_usr_details option[value='"+shownVal+"']").dataset.value;
		
	}
	
	if(id!="")
	{
		value2send=id;
		
	}
	
	
	if((id=="")&&(value2send==""))
	{
		alertify.error("Enter all Fields");
		setTimeout(function() {$(".alertify-logs").remove();}, 1500);
	}
	else
	{
		//alert(base_url+"welcome/userdisplay?userid="+value2send+"&From="+from+"&To="+to);
		$.getJSON(base_url+"welcome/userdisplay",{"userid":value2send,"From":from,"To":to},function(jsn)
		{
			$("#loadviewuser").html("");
			if(jsn.length==0)
			{
				alertify.error("No User Found");
			}
			else if(jsn.length==1)
			{
				var cid=jsn[0].u_id;
				window.location.href=base_url+"welcome/edits?uid="+cid;
			}
			else{
				appendUsers(jsn);
			}
			
			
			
		});
	}
}
function ViewUser(base_url)
{
	$.ajax({
	    type: "POST",
	    url: base_url+"welcome/viewusers",
	 
	    dataType: "json",
	    data:{},
	    success: function(jsn) 
	    {
	    	$("#loadviewuser").html("");
	    	appendUsers(jsn);
	    }
	    });
}


function appendUsers(jsn)
{
	for(var i=0;i<jsn.length;i++)
	{
		if(jsn[i].u_id=="" || jsn[i].u_id==null ||jsn[i].u_name=="" || jsn[i].u_name==null){}
		else{
		var stat=jsn[i].u_status;
		var cid=jsn[i].u_id;
		var st='',st1='';
		if(stat==0)
		{
				st='<button type="button" class="btn btn-info active_user"  id="a'+cid+'" '+st+'>Activate</button><button type="button" class="btn btn-danger inactive_user" id="d'+cid+'" style="display:none;">Deactivate</button>';
		}
		else
		{
			st='<button type="button" class="btn btn-info active_user"  id="a'+cid+'" style="display:none;">Activate</button><button type="button" class="btn btn-danger inactive_user" id="d'+cid+'">Deactivate</button>';
		}

		if(jsn[i].ref==null){var ref="";}else{var ref=jsn[i].ref;}
		if(jsn[i].prnt==null){var prnt="";}else{var prnt=jsn[i].prnt;}
			$("#loadviewuser").append('<tr class="views" id="row'+cid+'">'+
					'<td>'+jsn[i].u_name+'</td>'+
					'<td>'+jsn[i].username+'</td>'+
					'<td>'+jsn[i].u_password+'</td>'+
					'<td>'+ref+'</td>'+
					'<td>'+prnt+'</td>'+
					'<td>'+jsn[i].u_father+'</td>'+
					'<td>'+jsn[i].u_address+'</td>'+
					'<td>'+jsn[i].u_email+'</td>'+
					'<td>'+jsn[i].u_mobile+'</td>'+
					'<td>'+st+'</td></tr>');
	}
	}
}

function viewedit(base_url,cid)
{
	window.location.href=base_url+"welcome/edits?uid="+cid;

}