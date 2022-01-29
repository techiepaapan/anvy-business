$(document).ready(function()
{
	
	var base_url=getUrl();
	loadReprint(base_url);
	$(document).on('click','.reprints',function()
	{
		mid=$(this).attr('id');
		$("#printModal").modal({
	        backdrop: 'static',
	        keyboard: false
	    });
	});
	
	
	$("#printPDF").click(function(){
		window.open(base_url+"welcome/rebill?pmid="+mid);
	});
	$("#printEXCEL").click(function(){
		window.open(base_url+"welcome/payoutExcel?pmid="+mid);
	});
	$("#srch").click(function()
	{
		ReprintSearch(base_url);
	});
});
function loadReprint(base_url)
{
	$.getJSON(base_url+"welcome/loadreprint",function(jsn)
	{
		$("#rebody").html("");
		if(jsn[0].res>0)
		{
			for(var i=0;i<jsn.length;i++)
			{
				$("#rebody").append('<tr><td>'+(i+1)+'</td><td>'+jsn[i].p_m_date+'</td><td>'+jsn[i].p_m_time+'</td><td>'+jsn[i].number+'</td><td>INR '+jsn[i].p_m_amount+'</td><td><button type="button" class="btn btn-danger reprints" title="reprint" value="'+jsn[i].payout_master_id+'" id="'+jsn[i].payout_master_id+'"> Reprint</button></td> </tr>');
			}
		}
		
	});
}


function ReprintSearch(base_url,mid)
{
	var from=$("#fromdate").val();
	from=from.split("/").reverse().join("-");
	var to=$("#todate").val();
	to=to.split("/").reverse().join("-");
	$("#rebody").html("");
	$.getJSON(base_url+"welcome/reprintsrch",{"From":from,"To":to},function(jsn)
	{
		$("#rebody").html("");
		if(jsn[0].res>0)
		{
			for(var i=0;i<jsn.length;i++)
			{
				$("#rebody").append('<tr><td>'+(i+1)+'</td><td>'+jsn[i].p_m_date+'</td><td>'+jsn[i].p_m_time+'</td><td>'+jsn[i].number+'</td><td>INR '+jsn[i].p_m_amount+'</td><td><button type="button" class="btn btn-danger reprints" title="reprint" value="'+jsn[i].payout_master_id+'" id="'+jsn[i].payout_master_id+'"> Reprint</button></td> </tr>');
			}
		}
				
    });
	
}