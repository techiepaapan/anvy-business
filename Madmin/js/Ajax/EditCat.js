$(document).ready(function()
{
	
	var base_url=getUrl();
	loadCat(base_url);
	
	$(document).on('click','.editcat',function()
	{
		
		var id=$(this).attr('id');
		//alert(id);
		EditCatClick(base_url,id);
	});
	$("#edtcat_sub").click(function()
	{
		EditCat(base_url);
	});
	
	
	$(document).on('click','.act',function()
			{
				
				var id=$(this).attr('id');
				//alert(id);
				InActcategory(base_url,id);
			});
	
	$(document).on('click','.inact',function()
			{
				
				var id=$(this).attr('id');
				//alert(id);
				ActCategory(base_url,id);
			});
	
	/*$(document).on('click','.catclose',function()
	{		
		var id=$(this).attr('id');
		//alert(id);pinclose
		DeleteCatClick(base_url,id);
	});*/
});
function InActcategory(base_url,id)
{
	
	var ids=id;
	//alert(ids);
	alertify.confirm("Do You Want To Disable This Category?",function(e)
		{
		if(e)
			{
				$.getJSON(base_url+"welcome/disablecat",{"id":ids},function(jsn)
				{
					var msg=jsn[0].res;
					if(msg==1)
					{
						alertify.success("Disabled");
						setTimeout(function() {location.reload();}, 1500);
					}
					else
					{
						alertify.error("Error");
					}
					
				});	
			}
		});
}
function ActCategory(base_url,id)
{
	
	var ids=id;
	//alert(ids);
	alertify.confirm("Do You Want To Enable This Category?",function(e)
		{
		if(e)
			{
				$.getJSON(base_url+"welcome/enablecat",{"id":ids},function(jsn)
				{
					var msg=jsn[0].res;
					if(msg==1)
					{
						alertify.success("Enabled");
						setTimeout(function() {location.reload();}, 1500);
					}
					else
					{
						alertify.error("Error");
					}
					
				});	
			}
		});
}

function EditCatClick(base_url,id)
{
	$("#edtscat").val("");
	$("#myModal").modal("show");
	var ids=id.slice(4);
	$("#cat").val(ids);
	//alert(ids);
	var pinnum=$("#cat"+ids).text();
	$("#edtscat").val(pinnum);
}

function EditCat(base_url)
{
	var catname=$("#edtscat").val();
	var catid=$("#cat").val();
	if(catname=="")
	{
		 alertify.error("Please Input Category Name");  	
	}
	
	else
	{
		//alert(base_url+"welcome/edit_catname?CatName="+catname+"&Id="+catid);
		$.getJSON(base_url+"welcome/edit_catname",{"CatName":catname,"Id":catid},function(jsn)
		{
			if(jsn[0].res>0)
			{
				$("#cat"+catid).text(jsn[0].catnames);
				alertify.success("Category Updated");
				$("#myModal").modal("hide");
			}
			else
			{
				alertify.success("Category Not Updated");
				$("#myModal").modal("hide");
				
			}
		});
	}
}

/*function DeleteCatClick(base_url,id)
{
	var ids=id.slice(5);
	//alert(ids);
	alertify.confirm("Delete This Category?",function(e)
		{
		if(e)
			{
				$.getJSON(base_url+"welcome/deletecat",{"id":ids},function(jsn)
				{
					var msg=jsn.result;
					if(msg=="success")
					{
						alertify.success("Deleted");
						setTimeout(function() {location.reload();}, 1500);
					}
					else
					{
						alertify.error("Error");
					}
					
				});	
			}
		});
}
*/

function loadCat(base_url)
{
	
	$.getJSON(base_url+"welcome/loadCat",function(jsn)
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
						var name=jsn[i].category_name;
						
						var catid=jsn[i].cat_id;
						var stat=jsn[i].cat_stat;
						if(stat==1)
						{
							//var statval="";
							$("#editappend").append('<tr id="row'+catid+'"><td>'+(i+1)+'</td><td id="cat'+catid+'">'+name+'</td><td><div class="two_btns"><button type="button" class="btn btn-info editcat" style="margin-left: 1px;height: 32px;" title="edit" id="edit'+catid+'"><i class="fa fa-pencil" aria-hidden="true"></i></button><input class="btn btn-success act" style="margin-left: 1px;height: 32px;background-color: #5cb85c;border-color: #4cae4c;" name="act" value="ACTIVE" id="'+catid+'" type="button"><input name="inact" style="margin-left: 1px;height: 32px;" class="btn btn-danger inact disabled" value="INACTIVE" id="'+catid+'" type="button"></div></td></tr>');
							
						}
						else
						{
							//var statval="disabled";
							$("#editappend").append('<tr id="row'+catid+'"><td>'+(i+1)+'</td><td id="cat'+catid+'">'+name+'</td><td><div class="two_btns"><button type="button" class="btn btn-info editcat" style="margin-left: 1px;height: 32px;" title="edit" id="edit'+catid+'"><i class="fa fa-pencil" aria-hidden="true"></i></button><input class="btn btn-success act disabled" style="margin-left: 1px;height: 32px;background-color: #5cb85c;border-color: #4cae4c;" name="act" value="ACTIVE" id="'+catid+'" type="button"><input name="inact" style="margin-left: 1px;height: 32px;" class="btn btn-danger inact " value="INACTIVE" id="'+catid+'" type="button"></div></td></tr>');
							
						}
                         //	<button type="button" class="btn btn-danger catclose" title="delete" id="close'+catid+'"><i class="fa fa-trash" aria-hidden="true"></i></button>					
						//alert(new_print);data-toggle="modal" data-target="#myModal"
			            //$("#print_values").append('<tr><td>'+new_print+'</td> <td>'+printname+'</td>   <td style="text-align:center;width:22%;"><input type="text" style="border: none;width: 100%;background: none;" readonly="readonly" value="'+jsn[i].shop_name+'"></td> <td style="text-align:center;">$'+parseFloat(jsn[i].bill_amount_total).toFixed(2)+'</td> <td style="text-align:center;">'+jsn[i].user_point_in_earn+'</td><td style="text-align:center;"><input type="button" id="'+printid+'" class="btn btn-primary reprints" value="Print"/></td> </tr>');
			           }
				}		
			});	

}