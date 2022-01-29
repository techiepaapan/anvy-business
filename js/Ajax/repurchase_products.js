	var limit1=0;
	var limit2=12;
$(document).ready(function()
{
	var baseurl=getUrl();

	var id=0;
	var count=12;
	getreproducts(baseurl,limit1,limit2,id);
	$(".pr_name").click(function()
	{
		id=$(this).attr('id');
		//alert(id);
		$("#catidss").val(id);
		$(".prev").val(0);
		$(".nex").val(1);
		selectnewcategory(baseurl,id);
		//CollectReProducts(baseurl,id);
	});
	$(".prev").click(function()
			{
				var val=parseFloat($(this).val());
				if(val<1){val=1;}
				
				limit1=(val-1)*count;limit2=count;
				if(limit1<0){limit1=0;}
				id=$("#catidss").val();
				$(".prev").val(val-1);
				$(".nex").val(val);
				//alert(limit1+"  -  "+limit2);
				getreproducts(baseurl,limit1,limit2,id);
			});
			$(".nex").click(function()
			{
				var maxval=parseFloat($(".maxval").val());
				var val=parseFloat($(this).val());
				if(val>(maxval)){val=maxval;}
				if(val<1){val=0;}
				limit1=val*count;limit2=count;
				id=$("#catidss").val();
				$(".prev").val(val);
				$(".nex").val(val+1);
				getreproducts(baseurl,limit1,limit2,id);
			});
});


function selectnewcategory(baseurl,id)
{
	$.getJSON(baseurl+"welcome/selectnewcategory?id="+id,function(jsn)
			{
				limit1=0;
				limit2=12;
				var cnt=Math.ceil(jsn[0].cnt);
				$(".maxval").val(cnt);
				getreproducts(baseurl,limit1,limit2,id);
			});
}
function getreproducts(baseurl,limit1,limit2,id)
{
	$.getJSON(baseurl+"welcome/getreproducts?limit1="+limit1+"&limit2="+limit2+"&id="+id,function(jsn)
			{
				$(".xrow").html("");
				var len=jsn.length;
				//alert()
				for(var i=0;i<len;++i)
				{
					var pid=jsn[i].re_product_id;
					var disc=parseFloat(jsn[i].product_discount);
					if(disc<=0)
					{
						var anydiscount='<li class="re-second"><i class="fa fa-inr" aria-hidden="true"></i> '+jsn[i].product_price+'</li>';
					}
					else
					{
						var nprice=parseFloat(jsn[i].product_price)-disc;
						var anydiscount='<li style="font-size: 12px;color: grey;" class="re-second"><s><i class="fa fa-inr" aria-hidden="true"></i> '+jsn[i].product_price+'</s></li>'+
						'<li class="re-second"><i class="fa fa-inr" aria-hidden="true"></i> '+nprice+'</li>';
					}
					
					var data='<div class="col-xs-6 col-sm-4 col-md-4 products-each">'+
					'<div class="products-each-subb products-each-subb-new">'+
					'<a href="'+baseurl+'welcome/product_details?pd='+pid+'">'+
					'	<div class="product-image">'+
					'		<img src="'+baseurl+'Madmin/uploads/'+jsn[i].image1+'" alt="product-1">'+
					'	</div>'+
					'</a>'+
					'<a href="'+baseurl+'welcome/product_details?pd='+pid+'">'+
					'	<div class="product-details-sub">'+
					'		<ul class="repurchase-list">'+
					'			<li class="re-first"><span>id:</span>'+jsn[i].product_code+'</li>'+
					anydiscount+
					'		</ul>'+
					'	</div>'+
					'</a>'+
					'	<div class="repurchase-btns">'+
					'		<h5 class="repurchase-head-new">'+jsn[i].product_name+'</h5>'+
					'		<a href="'+baseurl+'welcome/product_details?pd='+pid+'"><button class="btn btn-primary btn-sm hidden-md"><i class="fa fa-info-circle"></i> More Info</button></a>'+
					'	</div>'+
					'</div>'+
				'</div>';
					$(".xrow").append(data);
						
				}
			});
}