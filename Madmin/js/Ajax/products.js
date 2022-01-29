$(document).ready(function()
{
	var baseurl=getUrl();
	var limit1=0;
	var limit2=10;
	getproducts(baseurl,limit1,limit2);
	
	$(".prev").click(function()
	{
		var val=parseFloat($(this).val()-12);
		if(val<0){val=0;}
		limit1=val;limit2=val+12;
		$(".prev").val(limit1);$(".nex").val(limit2);
		//alert(limit1+"  -  "+limit2);
		getproducts(baseurl,limit1,limit2);
	});
	$(".nex").click(function()
	{
		var maxval=parseFloat($(".maxval").val());
		var val=parseFloat($(this).val());
		if(val>(maxval)){val=maxval;}
		limit1=val-12;limit2=val;
		$(".prev").val(limit1);$(".nex").val(limit2);
		//alert(limit1+"  -  "+limit2);
		getproducts(baseurl,limit1,limit2);
	});
	
	$(document).on( "click", ".pdetail", function()
	{//alert();
		var pd=$(this).val();
		getproductsdetail(baseurl,pd);
	});
	
	$(document).on( "click", ".buy", function()
			{//alert();
				var pd=$(this).val();
				window.location.href=baseurl+"welcome/delivery_details?pd="+pd;
			});
	
});

function getproducts(baseurl,limit1,limit2)
{
	var lg=$("#ldf").val();var by="";var align='';var alink1="";var alink2="";
		//alert(baseurl+"welcome/getproducts?limit1="+limit1+"&limit2="+limit2);
	$.getJSON(baseurl+"welcome/getproducts?limit1="+limit1+"&limit2="+limit2,function(jsn)
			{
				$(".xrow").html("");
				var len=jsn.length;
				//alert()
				for(var i=0;i<len;++i)
				{
					var pid=jsn[i].product_id;
					if(lg==1){by='<h5 class="repurchase-head-new"></h5><button class="btn btn-danger btn-sm buy" value="'+pid+'"><i class="fa fa-shopping-cart" style="float:left;"></i> &nbsp; Buy Now&nbsp; </button>';align='style="float:right;"';alink1='<a>';alink2="</a>";}
					var data=//'<a href="'+baseurl+'welcome/delivery_details?pd='+pid+'">'+
						'<div class="col-xs-6 col-sm-4 col-md-3 products-each">'+
								'<div class="products-each-subb">'+
								'<div class="product-image">'+
								'	<img style="height: 175px;" src="'+baseurl+'Madmin/uploads/'+jsn[i].image+'" alt="product-1">'+
								'	<div class="pdt-price"><div class="product-price-sub"><i class="fa fa-inr" aria-hidden="true"></i> '+jsn[i].product_price+'</div></div>'+
								'</div>'+
								'<div class="product-details-sub">'+
								'	<ul>'+
								'		<li><span>Product id:</span>'+jsn[i].product_code+'</li>'+
								'		<li><span>Product Name:</span>'+jsn[i].product_name+'</li>'+
								'		<li><span>Description:</span><p>'+jsn[i].product_description+'</p></li>'+
								'	</ul>'+by+
								alink1+'<button class="pdetail btn btn-primary btn-sm hidden-md" data-toggle="modal" data-target="#myModal" '+align+' value="'+pid+'"><i class="fa fa-info-circle"></i> More Info</button>'+alink2+
								'</div>'+
							'</div>'+
						'</div>';//</a>';
					$(".xrow").append(data);
						
				}
			});
}

function getproductsdetail(baseurl,pd)
{
	//alert(baseurl+"welcome/getproductsdetail?pd="+pd);
	$.getJSON(baseurl+"welcome/getproductsdetail?pd="+pd,function(jsn)
			{
				$(".xrow1").html("");
				var len=jsn.length;
				//alert()
				for(var i=0;i<len;++i)
				{
					var pid=jsn[i].product_id;
					var data='<h4>'+jsn[i].product_name+'</h4>'+
					'<div class="pdt-img">'+
					'	<img src="'+baseurl+'Madmin/uploads/'+jsn[i].image+'" alt="...">'+
					'</div>'+
					'<div class="product-model-price">'+
					'	<div class="product-details-sub">'+
					'		<ul>'+
					'			<li><span>Product id:</span>'+jsn[i].product_code+'</li>'+
					'			<li><span>Product Price:</span><span class="pprice"><i class="fa fa-inr" aria-hidden="true"></i> '+jsn[i].product_price+'</span></li>'+
								
					'		</ul>'+
					'	</div>'+
					'</div>'+
					'<div class="pdescrptn">'+
					'<p>'+jsn[i].product_description+'</p>'+
					'</div>';
					$(".xrow1").append(data);
						
				}
			});
}
