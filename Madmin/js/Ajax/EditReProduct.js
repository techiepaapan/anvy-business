$(document).ready(function()
{
	
	var base_url=getUrl();
	//alert(base_url);
	LoadReProducts(base_url);
	
	$(document).on('click','.editpro',function()
	{
		
		var ids=$(this).attr('id');
		
		EditReProduct(base_url,ids);
		
	});
	$(document).on('click',".closepro",function()
	{
		var ids=$(this).attr('id');
		alertify.confirm("Do You Want To Delete This Product?", function(e){
			if(e){
					CloseReProduct(base_url,ids);
			}

		});
				
	});
	$(".editclose").click(function(){
		
		$("#editproductname").val("");
		$("#editdescription").val("");
		$("#editprice").val("");
		$("#editproductcode").val("");
		$("#edtquantity").val("");
		$("#edtdiscounted").val("");
		$("#imgbox").html("");
	});
    $("#edit_prosub").click(function(){
		
    	//var ids=$(this).attr('id');
		EditLoadReProducts(base_url);
	});
	$("#file1").change(function()
    {
    	Browseimage1(this);
    });
	$("#file2").change(function()
	{
		Browseimage2(this);
	});
	$("#file3").change(function()
	{
		Browseimage3(this);
	});
      $("#file4").change(function()
	{
		Browseimage4(this);
	});
	
    $("#srch").keyup(function(e)
    {
    	ProductSuggestion(base_url,e);
    });

    $("#itemsrch").click(function(e)
    {
    	//alert("k");
    	 productDisplay(base_url,e);
    });
    $(document).on('click', '.remove_button', function(e){  
       var idss=$(this).attr('id');
      
       if(idss=="")
       {
    	   e.preventDefault();
           $(this).parent('div').remove(); 
       }
       else
       {
    	   idss=idss.slice(9);
    	   // alert(idss);
    	   var thisx=$(this);
    	   alertify.confirm("Delete This Size?", function(e){
    			if(e){
			    	   thisx.parent('div').remove(); 
			    	   DeleteSize(idss,base_url);
    			}

    		});
       }
    });
    
});
function DeleteSize(idss,base_url)
{

			$.getJSON(base_url+"welcome/deletesize",{"id":idss},function(jsn)
					{
						
						
					});


}
function LoadReProducts(base_url)
{
	//alert(base_url+"welcome/loadreproducts");
	
	$.getJSON(base_url+"welcome/loadreproducts",function(jsn)
	{
		$("#proappend").html("");
		
		if(jsn[0].res>0)
		{
			
			for(var i=0;i<jsn.length;i++)
			{
				//alert(jsn[i].product_discount);
				var disc=parseFloat(jsn[i].product_discount);
				var nprice=0,oldprice=0;
				if(disc<=0)
				{
					nprice=jsn[i].product_price;
					oldprice=jsn[i].product_price;
				}
				else
				{
					nprice=parseFloat(jsn[i].product_price)-parseFloat(jsn[i].product_discount);
					oldprice=jsn[i].product_price;
					nprice=parseFloat(nprice).toFixed(2);
				}
				$("#proappend").append('<tr id="row'+jsn[i].re_product_id+'"><td id="name'+jsn[i].re_product_id+'">'+jsn[i].product_name+'</td>'+
							'<td id="code'+jsn[i].re_product_id+'">'+jsn[i].product_code+'</td>'+
							'<td id="des'+jsn[i].re_product_id+'">'+jsn[i].product_description+'</td>'+
							'<td class="deleted"><del  id="price'+jsn[i].re_product_id+'">'+oldprice+'</del><span style="display:none;" id="dist'+jsn[i].re_product_id+'">'+jsn[i].product_discount+'</span> <span>'+nprice+'</span></td>'+
							'<td id="qty'+jsn[i].re_product_id+'">'+jsn[i].product_qty+'<input type="hidden" id="img1'+jsn[i].re_product_id+'" value="'+jsn[i].image1+'" /><input type="hidden" id="img2'+jsn[i].re_product_id+'" value="'+jsn[i].image2+'" /><input type="hidden" id="img3'+jsn[i].re_product_id+'" value="'+jsn[i].image3+'" /><input type="hidden" id="img4'+jsn[i].re_product_id+'" value="'+jsn[i].image4+'" />'+
								'<input type="hidden" id="cat'+jsn[i].re_product_id+'" value="'+jsn[i].catid+'" /><input type="hidden" id="comm'+jsn[i].re_product_id+'" value="'+jsn[i].commission+'"></td>'+
							'<td id="dc'+jsn[i].re_product_id+'">'+jsn[i].delivery_charge+'</td>'+
							'<td><div class="two_btns"><button type="button" class="btn btn-primary editpro" id="edit'+jsn[i].re_product_id+'"><i class="fa fa-pencil" aria-hidden="true"></i></button><button type="button" class="btn btn-danger closepro" id="close'+jsn[i].re_product_id+'"><i class="fa fa-trash" aria-hidden="true"></i></button></div></td> </tr>');
				
			}
			
		}
		else
		{
			alertify.error('Invalid user');
		}
		
	
	});

}
function Browseimage1(input) {
	//alert("kk");
	$('#imgbox1').html("");
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
           // $('#pic').attr('src', e.target.result);
        	$('#imgbox1').append('<img src="'+ e.target.result+'">');
        }

        reader.readAsDataURL(input.files[0]);
    }
}

function Browseimage2(input) {
	//alert("kk");
	$('#imgbox2').html("");
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
           // $('#pic').attr('src', e.target.result);
        	$('#imgbox2').append('<img src="'+ e.target.result+'">');
        }

        reader.readAsDataURL(input.files[0]);
    }
}
function Browseimage3(input) {
	//alert("kk");
	$('#imgbox3').html("");
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
           // $('#pic').attr('src', e.target.result);
        	$('#imgbox3').append('<img src="'+ e.target.result+'">');
        }

        reader.readAsDataURL(input.files[0]);
    }
}
function Browseimage4(input) {
	//alert("kk");
	$('#imgbox4').html("");
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
           // $('#pic').attr('src', e.target.result);
        	$('#imgbox4').append('<img src="'+ e.target.result+'">');
        }

        reader.readAsDataURL(input.files[0]);
    }
}
function EditLoadReProducts(base_url)
{
	var sizearry=[];
	var proname=$("#editproductname").val();
	var prodesc=$("#editdescription").val();
	var proprice=$("#editprice").val();
	var code=$("#editproductcode").val();
	var quantity=$("#edtquantity").val();
    var discounted_price=$("#edtdiscounted").val();
	var editid=$("#pid").val();
	var catid=$("#pcat").val();
	var prodc=$("#edtdc").val();
	var x = document.getElementsByName("field_name[]");
    var len=x.length;
    var flg=0;
    var commission=$("#edtcomm").val();
	//alert(len+x);
    for(var j=0;j<len;j++)
    {
    	var pronames=x[j].value;
    	var prosize=x[j].getAttribute('id');
    	
    	//alert(pronames+" -> "+prosize);
    	if((prosize=="")||(prosize==null)){
    		prosize="";flg++;
    	}
    	else
    	{
    		prosize=prosize.slice(5);
    	}
    	
    			var obj={};
        		obj['size']=pronames;
        		obj['sid']=prosize;
        		sizearry.push(obj);
        		
    }
	if(proname==""||prodesc==""||proprice==""||code==""||quantity==""||discounted_price==""||prodc=="")
	{
		alertify.error("Enter all Fields");
	}
	else if(commission=="" || commission==null || commission<0 || isNaN(commission) || commission>100)
	{
		alertify.error("Invalid Commission<br>Expected Value: 0-100");
	}
	else if(isNaN(proprice)||proprice<0)
	{
		alertify.error("Invalid Price Format"); 
	}
	else if(isNaN(quantity))
	{
		alertify.error("Invalid Quantity"); 
	}
	else if(isNaN(discounted_price)||discounted_price<0)
	{
		alertify.error("Invalid Discount Price Format"); 
	}
	else if(isNaN(prodc)||prodc<0)
	{
		alertify.error("Invalid Delivery Charge Format"); 
	}
	else if(catid==""||catid=="Select")
	{
		alertify.error("Select Category Name"); 
	}
	/*else if(flg>0)
	{
		alertify.error("Empty Size Field"); 
	}*/
	else
	{
		  var file_data1= $('#file1').prop('files')[0];
	      var file_data2= $('#file2').prop('files')[0];
	      var file_data3= $('#file3').prop('files')[0];
	      var file_data4= $('#file4').prop('files')[0];
		  var form_data = new FormData();
			    
				form_data.append('productname', proname);
				form_data.append('product_decription', prodesc);
				form_data.append('productid', editid);
				form_data.append('productprice', proprice);
				form_data.append('code', code);
				form_data.append('pcat', catid);
				form_data.append('quantity', quantity);
				form_data.append('discounted_price', discounted_price);
				form_data.append('delivery_charge', prodc);
				form_data.append('commission', commission);
				form_data.append('sizearray', JSON.stringify(sizearry));
				  form_data.append('userfile1', file_data1);
				  form_data.append('userfile2', file_data2);
				  form_data.append('userfile3', file_data3);
				  form_data.append('userfile4', file_data4);
			$.ajax({
				 url: base_url+"welcome/EditRePro", 
				 dataType: 'json',
			cache: false,
			contentType: false,
				 processData: false,
				 data:form_data,
				
				 type: 'post',
			     success: function (json) {
					
			    	// alert(JSON.stringify(json));
					if(json.w>0)
    				{
						alertify.success("Product Edited");
						$("#myModal").modal("hide");			
						setTimeout(function() {location.reload();}, 1100);
    				}
    				else
    				{
    					alertify.error(json.result);
    				}
					 }
				 });
		}
	
	
}
function EditReProduct(base_url,ids)
{
	$("#editproductname").val("");
	$("#editdescription").val("");
	$("#editprice").val("");
	$("#editproductcode").val("");
	$("#edtquantity").val("");
	$("#edtdiscounted").val("");
	$("#edtcomm").val("");
	$("#edtdc").val("");
	$(".field_wrapper").html("");
	$("#imgbox1").html("");
	$("#imgbox2").html("");
	$("#imgbox3").html("");
	$("#imgbox4").html("");
	$("#imgbox1").html();
	$("#imgbox2").html();
	$("#imgbox3").html();
	$("#imgbox4").html();
	$("#myModal").modal("show");
	var edid=ids.slice(4);
	$("#pid").val(edid);
	//alert(edid);
	var proname=$("#name"+edid).text();
	var prodesc=$("#des"+edid).text();
	var proprice=$("#price"+edid).text();
	var procode=$("#code"+edid).text();
	var proqty=$("#qty"+edid).text();
	var prodist=$("#dist"+edid).text();
	var prodc=$("#dc"+edid).text();
	var catname=$("#cat"+edid).val();
	var commission=$("#comm"+edid).val();
	
	var mySelect1= document.getElementById('pcat');
	for(var x, y = 0; x = mySelect1.options[y]; y++) {
	    if(x.value == catname) {
	    	mySelect1.selectedIndex = y;
	        break;
	    }
	}
	
	//alert(proname+"-"+prodesc+"-"+proprice);
	$("#editproductname").val(proname);
	$("#editdescription").val(prodesc);
	$("#editproductcode").val(procode);
	$("#edtquantity").val(proqty);
	$("#edtdiscounted").val(prodist);
	$("#editprice").val(proprice);
	$("#edtdc").val(prodc);
	$("#edtcomm").val(commission);
	if(($("#img1"+edid).val()!="")&&($("#img1"+edid).val()!=null))
	{
		//alert($("#img1"+edid).val());
		$("#imgbox1").append( '<img src='+base_url+'uploads/product1_'+edid+'_1.jpeg>');
	}
	if(($("#img2"+edid).val()!="")&&($("#img2"+edid).val()!=null))
	{
		//alert($("#img2"+edid).val());
		$("#imgbox2").append( '<img src='+base_url+'uploads/product1_'+edid+'_2.jpeg>');
	}
	if(($("#img3"+edid).val()!="")&&($("#img3"+edid).val()!=null))
	{
		//alert($("#img3"+edid).val());
		$("#imgbox3").append( '<img src='+base_url+'uploads/product1_'+edid+'_3.jpeg>');
	}
	if(($("#img4"+edid).val()!="")&&($("#img4"+edid).val()!=null))
	{
		//alert($("#img4"+edid).val());
		$("#imgbox4").append( '<img src='+base_url+'uploads/product1_'+edid+'_4.jpeg>');
	}
	
	$.getJSON(base_url+"welcome/loadsize",{"id":edid},function(jsn)
			{
				
		for(var i=0;i<jsn.length;i++)
		{
			var size_id=jsn[i].size_id;
			$(".field_wrapper").append('<div> <div class="col-sm-2"></div><input type="text" class="form-control1" placeholder="Product Size" style="width:50%;margin-top: 10px;" name="field_name[]" id="field'+size_id+'" value="'+jsn[i].size+'">	<a href="javascript:void(0);" class="remove_button" title="Remove field" id="closesize'+size_id+'"><img src="'+base_url+'images/close-box-red24.png"/></a></div>');

		}
			});
	
}
function CloseReProduct(base_url,ids)
{
	//alert(ids);
	var clid=ids.slice(5);
	$("#row"+clid).remove();
	$.getJSON(base_url+"welcome/deletereproduct",{"id":clid},function(jsn)
	{
		if(jsn[0].res>0)
		{
			location.reload();
		}
		
	});
	
}
function ProductSuggestion(base_url,e)
{
	var text=$("#srch").val();
	//alert(text);
	if ((e.which == 38)||(e.which == 40)) {
	}
	else if(e.which == 13)
	{
		var searchproduct=$("#srch").val();
		var delayMillis = 100; //1 second
		setTimeout(function() {
			$("#srch").val(searchproduct);
			//searchproduct=$("#srch").val();
			
		}, delayMillis);
		//arr(searchproduct);
	}
	else if(text=="")
	{
		 $("#prolist").html("");
		 LoadReProducts(base_url);
	}
	else
	{		
			 $("#prolist").html("");	    		
			 $.getJSON(base_url+"welcome/suggestrepro_action/",{"term":text}, function(json)
			 {			
				 $("#prolist").html("");	 
						for(var i=0;i<json.length;i++)
						{
							$("#prolist").append('<option data-value="'+json[i].re_product_id+'" value="'+json[i].product_name+'"></option>');

						}				       				      
			}); 
	}

}
function productDisplay(base_url,e)
{
	//var proname=document.getElementById("srch").text;
	var value2send= document.getElementById("srch").value;
   // alertify.error(shownVal+" - "+value2send);
	//alertify.error(value2send);
	//alert(base_url+"welcome/reproductdisplay?productid="+value2send);
	$.getJSON(base_url+"welcome/reproductdisplay",{"productid":value2send},function(jsn)
	{
		//alert(JSON.stringify(jsn));
		$("#proappend").html("");
		if(jsn.length>0)
		{
			for(var i=0;i<jsn.length;i++)
			{
			
			var disc=parseFloat(jsn[i].product_discount);
			var nprice=0,oldprice=0;
			if(disc<=0)
			{
				nprice=jsn[i].product_price;
				oldprice=jsn[i].product_price;
			}
			else
			{
				nprice=parseFloat(jsn[i].product_price)-parseFloat(jsn[i].product_discount);
				oldprice=jsn[i].product_price;
				nprice=parseFloat(nprice).toFixed(2);
			}
			//$("#proappend").append('<tr id="row'+jsn[i].re_product_id+'"><td id="name'+jsn[i].re_product_id+'">'+jsn[i].product_name+' <p style="display:none;" id="dc'+jsn[i].re_product_id+'">'+jsn[i].delivery_charge+'</p></td><td id="code'+jsn[i].re_product_id+'">'+jsn[i].product_code+'</td><td id="des'+jsn[i].re_product_id+'">'+jsn[i].product_description+'</td><td class="deleted"><del  id="price'+jsn[i].re_product_id+'">'+oldprice+'</del><span style="display:none;" id="dist'+jsn[i].re_product_id+'">'+jsn[i].product_discount+'</span> <span>'+nprice+'</span></td><td id="qty'+jsn[i].re_product_id+'">'+jsn[i].product_qty+'<input type="hidden" id="img1'+jsn[i].re_product_id+'" value="'+jsn[i].image1+'" /><input type="hidden" id="img2'+jsn[i].re_product_id+'" value="'+jsn[i].image2+'" /><input type="hidden" id="img3'+jsn[i].re_product_id+'" value="'+jsn[i].image3+'" /><input type="hidden" id="img4'+jsn[i].re_product_id+'" value="'+jsn[i].image4+'" /><input type="hidden" id="cat'+jsn[i].re_product_id+'" value="'+jsn[i].catid+'" /></td><td><div class="two_btns"><button type="button" class="btn btn-primary editpro" id="edit'+jsn[i].re_product_id+'"><i class="fa fa-pencil" aria-hidden="true"></i></button><button type="button" class="btn btn-danger closepro" id="close'+jsn[i].re_product_id+'"><i class="fa fa-trash" aria-hidden="true"></i></button></div></td> </tr>');
			
			$("#proappend").append('<tr id="row'+jsn[i].re_product_id+'"><td id="name'+jsn[i].re_product_id+'">'+jsn[i].product_name+'</td>'+
					'<td id="code'+jsn[i].re_product_id+'">'+jsn[i].product_code+'</td>'+
					'<td id="des'+jsn[i].re_product_id+'">'+jsn[i].product_description+'</td>'+
					'<td class="deleted"><del  id="price'+jsn[i].re_product_id+'">'+oldprice+'</del><span style="display:none;" id="dist'+jsn[i].re_product_id+'">'+jsn[i].product_discount+'</span> <span>'+nprice+'</span></td>'+
					'<td id="qty'+jsn[i].re_product_id+'">'+jsn[i].product_qty+'<input type="hidden" id="img1'+jsn[i].re_product_id+'" value="'+jsn[i].image1+'" /><input type="hidden" id="img2'+jsn[i].re_product_id+'" value="'+jsn[i].image2+'" /><input type="hidden" id="img3'+jsn[i].re_product_id+'" value="'+jsn[i].image3+'" /><input type="hidden" id="img4'+jsn[i].re_product_id+'" value="'+jsn[i].image4+'" />'+
					'<input type="hidden" id="cat'+jsn[i].re_product_id+'" value="'+jsn[i].catid+'" /><input type="hidden" id="comm'+jsn[i].re_product_id+'" value="'+jsn[i].commission+'"></td>'+
					'<td id="dc'+jsn[i].re_product_id+'">'+jsn[i].delivery_charge+'</td>'+
					'<td><div class="two_btns"><button type="button" class="btn btn-primary editpro" id="edit'+jsn[i].re_product_id+'"><i class="fa fa-pencil" aria-hidden="true"></i></button><button type="button" class="btn btn-danger closepro" id="close'+jsn[i].re_product_id+'"><i class="fa fa-trash" aria-hidden="true"></i></button></div></td> </tr>');

			}
		}
		else
		{
			alertify.error("Product(s) Not Found");
		}

		
	});
}
