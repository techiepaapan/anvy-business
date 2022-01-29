$(document).ready(function()
{
	var baseurl=getUrl();
	var limit1=0;
	var limit2=10;
	getreproducts(baseurl,limit1,limit2);
	
	$(".prev").click(function()
			{
				var val=parseFloat($(this).val()-12);
				if(val<0){val=0;}
				limit1=val;limit2=val+12;
				//alert(limit1+"  -  "+limit2);
				getreproducts(baseurl,limit1,limit2);
			});
			$(".nex").click(function()
			{
				var maxval=parseFloat($(".maxval").val());
				var val=parseFloat($(this).val());
				if(val>(maxval)){val=maxval;}
				limit1=val-12;limit2=val;
				//alert(limit1+"  -  "+limit2);
				getreproducts(baseurl,limit1,limit2);
			});
});

function getreproducts(baseurl,limit1,limit2)
{
	//alert(baseurl+"welcome/getreproducts?limit1="+limit1+"&limit2="+limit2);
	$.getJSON(baseurl+"welcome/getreproducts?limit1="+limit1+"&limit2="+limit2,function(jsn)
			{
				$(".xrow").html("");
				var len=jsn.length;
				//alert()
				for(var i=0;i<len;++i)
				{
					var pid=jsn[i].re_product_id;
					
					var data='<div class="col-xs-6 col-sm-4 col-md-4 products-each">'+
					'<div class="products-each-subb products-each-subb-new">'+
					'<a href="'+baseurl+'welcome/product_details?pd='+pid+'">'+
					'	<div class="product-image">'+
					'		<img style="height:220px;" src="'+baseurl+'Madmin/uploads/'+jsn[i].image1+'" alt="product-1">'+
					'	</div>'+
					'</a>'+
					'<a href="product-details.html">'+
					'	<div class="product-details-sub">'+
					'		<ul class="repurchase-list">'+
					'			<li class="re-first"><span>id:</span>'+jsn[i].product_code+'</li>'+
					'			<li class="re-second"><i class="fa fa-inr" aria-hidden="true"></i> '+jsn[i].product_price+'</li>'+
					'		</ul>'+
					'	</div>'+
					'</a>'+
					'	<div class="repurchase-btns">'+
					'		<h5 class="repurchase-head-new">'+jsn[i].product_name+'r</h5>'+
					'		<a href="'+baseurl+'welcome/product_details?pd='+pid+'"><button class="btn btn-primary btn-sm hidden-md"><i class="fa fa-info-circle"></i> More Info</button></a>'+
					'	</div>'+
					'</div>'+
				'</div>';
					$(".xrow").append(data);
						
				}
			});
}