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
					var pindate=jsn[i].pindate;
					var new_print=pindate.split("-").reverse().join("-");
					//alert(new_print);data-toggle="modal" data-target="#myModal"
		            //$("#print_values").append('<tr><td>'+new_print+'</td> <td>'+printname+'</td>   <td style="text-align:center;width:22%;"><input type="text" style="border: none;width: 100%;background: none;" readonly="readonly" value="'+jsn[i].shop_name+'"></td> <td style="text-align:center;">$'+parseFloat(jsn[i].bill_amount_total).toFixed(2)+'</td> <td style="text-align:center;">'+jsn[i].user_point_in_earn+'</td><td style="text-align:center;"><input type="button" id="'+printid+'" class="btn btn-primary reprints" value="Print"/></td> </tr>');
		           $("#editappend").append('<tr id="row'+pinid+'"><td id="number'+pinid+'">'+pinnumber+'</td><td id="date'+pinid+'">'+new_print+'</td><td><button type="button" class="btn btn-primary editpin"  title="edit" id="edit'+pinid+'"><i class="fa fa-pencil" aria-hidden="true"></i></button><button type="button" class="btn btn-danger pinclose" title="delete" id="close'+pinid+'"><i class="fa fa-trash" aria-hidden="true"></i></button></td></tr>');
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
		alertify.error("Enter Pin");
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
	$("#row"+ids).remove();
	$.getJSON(base_url+"welcome/deletepin",{"id":ids},function(jsn)
	{
		var msg=jsn.result;
		if(msg=="success")
		{
			alertify.success("Deleted");
		}
		else
		{
			alertify.error("Error");
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
						var new_print=pindate.split("-").reverse().join("-");
						//alert(new_print);data-toggle="modal" data-target="#myModal"
			            //$("#print_values").append('<tr><td>'+new_print+'</td> <td>'+printname+'</td>   <td style="text-align:center;width:22%;"><input type="text" style="border: none;width: 100%;background: none;" readonly="readonly" value="'+jsn[i].shop_name+'"></td> <td style="text-align:center;">$'+parseFloat(jsn[i].bill_amount_total).toFixed(2)+'</td> <td style="text-align:center;">'+jsn[i].user_point_in_earn+'</td><td style="text-align:center;"><input type="button" id="'+printid+'" class="btn btn-primary reprints" value="Print"/></td> </tr>');
			           $("#editappend").append('<tr id="row'+pinid+'"><td id="number'+pinid+'">'+pinnumber+'</td><td id="date'+pinid+'">'+new_print+'</td><td><button type="button" class="btn btn-primary editpin"  title="edit" id="edit'+pinid+'"><i class="fa fa-pencil" aria-hidden="true"></i></button><button type="button" class="btn btn-danger pinclose" title="delete" id="close'+pinid+'"><i class="fa fa-trash" aria-hidden="true"></i></button></td></tr>');
					}
				}		
			});	

}