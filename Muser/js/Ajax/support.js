	var Interval="";
$(document).ready(function()
{
	
	var base_url=getUrl();



	
	$(document).on("click",".btn-support",function()
			{
				$('.chatbox').show();
			});
			$(document).on("click",".close_chat",function()
			{
				$('.chatbox').hide();
				$("#chatid").val("");	
				/* later */
				clearInterval(Interval);
			});
			
			
			$(".chat_here").on("keyup",function(e)
					{
						if (e.which == 13) {
							$(".chat_button").click();
						}
						
					});
			
			setInterval(function(){
				$.ajax({
				    type: "POST",
				    url: base_url+"welcome/getMsgNotify",		 
				    dataType: "json",
				    data:{}, 
				    success: function(jsn) 
				    {
				    	var msg="";
					    for(var i=0;i<jsn.length;++i)
					    	{
					    		if(jsn[i].cnt==0){var cnt='';}
					    		else{var cnt=jsn[i].cnt;}
					    		$("#notify"+jsn[i].sid).html(cnt);
							
					    	}
					
				    }
				});
				
			}, 2000);
			
			
			
	
	$("#ticketsubmit").click(function()
	{//alert();

		var sub=$("#tsubject").val();
		var msg=$("#tmessage").val();
		if(sub=="")
		{
			alertify.error("Please Enter Subject");
		}
		else if(msg=="")
		{
			alertify.error("Please Enter Message");
		}
		else
		{
			//alert(base_url+"welcome/createTicket?sub="+sub+"&msg="+msg);
			$.ajax({
			    type: "POST",
			    url: base_url+"welcome/createTicket",		 
			    dataType: "json",
			    data:{"sub":sub,"msg":msg},
			    async:false,   
			    success: function(jsn) 
			    {
			    	if(jsn.length>0)
			    	{
			    		$(".close").click();
			    		alertify.success("New Ticket Created");
			    		var trlength=$('#walappend tr').length;
			    		for(var i=0;i<jsn.length;i++)
			    		{
			    			//alert(jsn[i].payin_date);
			    			trlength++;
			    			var response_date=jsn[i].response_date;
			    			var sid=jsn[i].sid;
			    			var ticket=jsn[i].ticket;
			    			var subject=jsn[i].subject;
			    			var sdate=jsn[i].sdate;
			    			var stime=jsn[i].stime;
			    			var u_id=jsn[i].u_id;
			    			
			    			
			    			$("#walappend").append('<tr>'+
			    						'<td style="padding: 15px 10px !important;">'+trlength+'<span class="supnot" id="notify'+sid+'"></span></td>'+
			    						'<td id="sub'+sid+'">'+subject+'</td>'+
			    						'<td>'+ticket+'</td>'+
			    						'<td>'+sdate+" "+stime+'</td>'+
			    						'<td>'+response_date+'</td>'+
			    						'<td class="text-center"> <button class="btn btn-info btn-support" value="'+sid+'">View</button></td>'+
			    					'</tr>');
			    					
			    		}
			    		
			    	}
			    	else{
			    		alertify.error("Ticket Failed");
			    	}
			    	
				
			    }
				 });
		}
	});
	
	
	
	$(document).on("click",".btn-support",function()
	{
		var val=$(this).val();
		var sub=$("#sub"+val).text();
		$("#chatid").val(val);
		$(".chat_title").text(sub);
		$(".chatbox_content").html("");
		$("#notify"+val).html("");
		$.ajax({
		    type: "POST",
		    url: base_url+"welcome/getAllMsg",		 
		    dataType: "json",
		    data:{"id":val},
		    async:false,   
		    success: function(jsn) 
		    {
		    	var msg="";
			    for(var i=0;i<jsn.length;++i)
			    	{
				    	var from=jsn[i].fromuser;
				    	var message=jsn[i].message;
				    	var date=(jsn[i].date).split('-').reverse().join('.');
				    	if(from==0){
					    	msg+='<div class="chat_msg frm_cnt">'+
									'<h5>User</h5>'+
									'<h4>'+date+'</h4>'+
									'<p>'+message+'</p>'+
								'</div>';
				    	}
				    	else{
				    	
					    	msg+='<div class="chat_msg by_cnt">'+
									'<h5>Admin</h5>'+
									'<h4>'+date+'</h4>'+
									'<p>'+message+'</p>'+
								'</div>';
				    	}
					
			    	}
			    $(".chatbox_content").html(msg);
			    
			    setTimeout(function() {
			    	var objDiv = document.getElementById("chatbox_content");
				    objDiv.scrollTop = objDiv.scrollHeight;
			    	}, 50);
			    
				Interval =  setInterval(function(){
					getMsg(base_url);
					
				}, 2000);
			
		    }
		});
		
		//alert(val);
	});
	
	
	
	$(document).on("click",".chat_button",function()
	{
		var val=$("#chatid").val();
		var chat=$(".chat_here").val();
		$.ajax({
		    type: "POST",
		    url: base_url+"welcome/insertChat",		 
		    dataType: "json",
		    data:{"id":val,"chat":chat}, 
		    success: function(jsn) 
		    {
		    	var msg="";
			    for(var i=0;i<jsn.length;++i)
			    	{
				    	var from=jsn[i].fromuser;
				    	var message=jsn[i].message;
				    	var date=(jsn[i].date).split('-').reverse().join('.');
				    	if(from==0){
					    	msg+='<div class="chat_msg frm_cnt">'+
									'<h5>User</h5>'+
									'<h4>'+date+'</h4>'+
									'<p>'+message+'</p>'+
								'</div>';
				    	}
					
			    	}
			    $(".chat_here").val("");
			    $(".chatbox_content").append(msg);
			    setTimeout(function() {
			    	var objDiv = document.getElementById("chatbox_content");
				    objDiv.scrollTop = objDiv.scrollHeight;
			    	}, 50);
			
		    }
		});
	});
});


function getMsg(base_url){
	var val=$("#chatid").val();
	$.ajax({
	    type: "POST",
	    url: base_url+"welcome/getMsg",		 
	    dataType: "json",
	    data:{"id":val}, 
	    success: function(json) 
	    {
	    	var msg="";
		    for(var i=0;i<json.length;++i)
		    	{
			    	var from=json[i].fromuser;
			    	var message=json[i].message;
			    	var date=(json[i].date).split('-').reverse().join('.');
			    	msg+='<div class="chat_msg by_cnt">'+
						'<h5>Admin</h5>'+
						'<h4>'+date+'</h4>'+
						'<p>'+message+'</p>'+
						'</div>';
				
		    	}
		    $(".chatbox_content").append(msg);
		
	    }
	});
}



