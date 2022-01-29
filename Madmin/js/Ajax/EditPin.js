$(document).ready(function()
{
	
	var base_url=getUrl();
	loadPin(base_url);
	$("#pin_srch").click(function()
	{
		PinSearch(base_url);
	});
	$(document).on('click','.editpin',function()
	{
		
		var id=$(this).attr('id');
		//alert(id);
		EditPinClick(base_url,id);
	});
	$("#edtpin_sub").click(function()
	{
		EditPinNumber(base_url);
	});
	$(document).on('click','.pinclose',function()
	{		
		var id=$(this).attr('id');
		//alert(id);pinclose
		DeletePinClick(base_url,id);
	});
});

function PinSearch(base_url)
{
	$("#editappend").html("");
	var from=$("#from-date").val();
	var to=$("#to-date").val();
	from=from.split("/").reverse().join("-");
	to=to.split("/").reverse().join("-");
	if(from==""||to=="")
	{
		alertify.error("Missing Dates");
	}
	else if(from=="")
	{
		alertify.error("Fill From Date");
	}
	else if(to=="")
	{
		alertify.error("Fill To Date");
	}
	else
	{
		//alert(from+""+to);
		$.getJSON(base_url+"welcome/searchpin",{"From":from,"To":to},function(jsn)
		{
			$("#editappend").html("");
			if(jsn.length==0)
			{
				alertify.error("No Result Found");
			}
			else
			{
				
				for(var i=0;i<jsn.length;i++)
				{
					var pinnumber=jsn[i].pinnumber;
					var pinid=jsn[i].pin_details_id;
					var bvpt=jsn[i].bvpoint;
					var pindate=jsn[i].pindate;
					var new_print=pindate.split("-").reverse().join("-");
					var stat=jsn[i].pin_status;
					var phone=jsn[i].phone;
					if(stat==1)
					{
						var col="red";
					}
					else
					{
						var col="green";
					}
					
					if(jsn[i].flag==0)
					{
						var tp='Free Pin';
					}
					else
					{
						var tp='Cash Pin';
					}
					//alert(new_print);data-toggle="modal" data-target="#myModal"
		            //$("#print_values").append('<tr><td>'+new_print+'</td> <td>'+printname+'</td>   <td style="text-align:center;width:22%;"><input type="text" style="border: none;width: 100%;background: none;" readonly="readonly" value="'+jsn[i].shop_name+'"></td> <td style="text-align:center;">$'+parseFloat(jsn[i].bill_amount_total).toFixed(2)+'</td> <td style="text-align:center;">'+jsn[i].user_point_in_earn+'</td><td style="text-align:center;"><input type="button" id="'+printid+'" class="btn btn-primary reprints" value="Print"/></td> </tr>');
		           $("#editappend").append('<tr id="row'+pinid+'"><td id="number'+pinid+'" style="color:'+col+';">'+pinnumber+'</td><td>'+tp+'</td><td>'+bvpt+'</td><td>'+phone+'</td><td id="date'+pinid+'">'+new_print+'</td><td><div class="two_btns"><button type="button" class="btn btn-primary editpin"  title="edit" id="edit'+pinid+'"><i class="fa fa-pencil" aria-hidden="true"></i></button><button type="button" class="btn btn-danger pinclose" title="delete" id="close'+pinid+'"><i class="fa fa-trash" aria-hidden="true"></i></button></div></td></tr>');
				}
			}
		});
	}
}
function EditPinClick(base_url,id)
{
	$("#edspin").val("");
	$("#myModal").modal("show");
	var ids=id.slice(4);
	$("#pid").val(ids);
	//alert(ids);
	var pinnum=$("#number"+ids).text();
	$("#edspin").val(pinnum);
}

function EditPinNumber(base_url)
{
	var pin=$("#edspin").val();
	var pinid=$("#pid").val();
	if(pin=="")
	{
		 alertify.error("Please Input Pin");  	
	}
	else if(isNaN(pin)||pin<=0)
	{
		 alertify.error("Invalid Pin");  	
	}
	else if(! /^[0-9]{17}$/.test(pin))
	{
		alertify.error("Please Input Exactly 17 Numbers!"); 
	}
	else
	{
		$.getJSON(base_url+"welcome/editpinnumber",{"Pin":pin,"Id":pinid},function(jsn)
		{
			if(jsn[0].result>0)
			{
				$("#number"+pinid).text(jsn[0].pins);
				alertify.success("Pin Updated");
				$("#myModal").modal("hide");
			}
			else
			{
				alertify.success("Pin Not Updated");
				$("#myModal").modal("hide");
				
			}
		});
	}
}

function DeletePinClick(base_url,id)
{
	var ids=id.slice(5);
	//alert(ids);
	alertify.confirm("Delete This Pin?",function(e)
		{
		if(e)
			{
				$.getJSON(base_url+"welcome/deletepin",{"id":ids},function(jsn)
				{
					var msg=jsn.result;
					if(msg=="success")
					{
						alertify.success("Deleted");
						$("#row"+ids).remove();
					}
					else
					{
						alertify.error("Error");
					}
					
				});	
			}
		});
}


function loadPin(base_url)
{
	
	$.getJSON(base_url+"welcome/loadPin",function(jsn)
			{
				$("#editappend").html("");
				if(jsn.length==0)
				{
					alertify.error("No Result Found");
				}
				else
				{
					
					for(var i=0;i<jsn.length;i++)
					{
						var pinnumber=jsn[i].pinnumber;
						var pinid=jsn[i].pin_details_id;
						var pindate=jsn[i].pindate;
						var bvpt=jsn[i].bvpoint;
						var new_print=pindate.split("-").reverse().join("-");
						var stat=jsn[i].pin_status;
						var phone=jsn[i].phone;
						if(stat==1)
						{
							var col="red";
						}
						else
						{
							var col="green";
						}
						
						if(jsn[i].flag==0)
						{
							var tp='Free Pin';
						}
						else
						{
							var tp='Cash Pin';
						}
						//alert(new_print);data-toggle="modal" data-target="#myModal"
			            //$("#print_values").append('<tr><td>'+new_print+'</td> <td>'+printname+'</td>   <td style="text-align:center;width:22%;"><input type="text" style="border: none;width: 100%;background: none;" readonly="readonly" value="'+jsn[i].shop_name+'"></td> <td style="text-align:center;">$'+parseFloat(jsn[i].bill_amount_total).toFixed(2)+'</td> <td style="text-align:center;">'+jsn[i].user_point_in_earn+'</td><td style="text-align:center;"><input type="button" id="'+printid+'" class="btn btn-primary reprints" value="Print"/></td> </tr>');
			           $("#editappend").append('<tr id="row'+pinid+'"><td id="number'+pinid+'" style="color:'+col+';">'+pinnumber+'</td><td>'+tp+'</td><td>'+bvpt+'</td><td>'+phone+'</td><td id="date'+pinid+'">'+new_print+'</td><td><div class="two_btns"><button type="button" class="btn btn-primary editpin"  title="edit" id="edit'+pinid+'"><i class="fa fa-pencil" aria-hidden="true"></i></button><button type="button" class="btn btn-danger pinclose" title="delete" id="close'+pinid+'"><i class="fa fa-trash" aria-hidden="true"></i></button></div></td></tr>');
					}
				}		
			});	

}