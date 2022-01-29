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
alertify.confirm("Remove This Product?",function(e){
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
    $("#edtsli").click(function(){
		
    	//var ids=$(this).attr('id');
		EditSlider(base_url);
	});
	$("#file1").change(function()
    {
    	Browseimage1(this);
    });
	$("#file2").change(function()
	{
		Browseimage2(this);
	});
	
	
    $(document).on("keyup","#srch",function(e)
    {
    	//alert();
    	ProductSuggestion(base_url,e);
    });

   $("#add_slider").click(function(e)
    {
    	//alert("k");
    	 productDisplay(base_url,e);
    });
    
    
});
function productDisplay(base_url,e)
{
	
	//var value2send= document.getElementById("srch").value;
	
	var value2send= document.getElementById("srch").value;
	
	var val1=($("#file1").val()).toLowerCase();
	if(value2send=="")
	{
		alertify.error("Product Not Selected");
	}
	else if(val1=="")
	{
		alertify.error("Browse Image");
	}
	else
	{
		 var file_data1= $('#file1').prop('files')[0];
		 var form_data = new FormData();   
		 form_data.append('productname', value2send);
		 form_data.append('file1', file_data1);
		 
		 // alert(base_url+"welcome/AddProAction?productname="+productname+""+product_decription++productprice);
       document.getElementById("add_slider").disabled = true;
		 $.ajax({
			 url: base_url+"welcome/AddSliderimg", // point to server-side controller method
			 dataType: 'json', // what to expect back from the server
		cache: false,
		contentType: false,
			 processData: false,
			 data:form_data,
			 type: 'post',
		     success: function (json) {
		    	//alert(json.w);
		    	
		    	if(json.w>0)
   				{
                    document.getElementById("add_slider").disabled = false;
		    	     //	alert("New Product Uploaded");	
					 alertify.success(json.result);
						
					setTimeout(function() {location.reload();}, 1100);
   				}
		    	else if(json.w==2)
   				{
                    document.getElementById("add_slider").disabled = false;
   					//alert("Product Not Uploaded");	
   					alertify.error(json.result);
   				}
   				else
   				{
                    document.getElementById("add_slider").disabled = false;
   					//alert("Product Not Uploaded");	
   					alertify.error(json.result);
   				}
				 }
			 });
	}
}

function LoadReProducts(base_url)
{
	
	$.getJSON(base_url+"welcome/loadsliderproducts",function(jsn)
	{
		$("#proappend").html("");
		
		if(jsn.length>0)
		{
			$("#proappend").html("");
			for(var i=0;i<jsn.length;i++)
			{
				//alert(jsn[i].product_discount);
				var img=jsn[i].images;
				
				if(img=="")
				{
					img="default.jpeg";
				}
				
				$("#proappend").append('<tr id="row'+jsn[i].firstcombo0_id+'"><td style="width:300px;"><div class="image-box" style="width:200px;"><img src="'+base_url+'uploads/'+img+'"></div><input type="hidden" id="img'+jsn[i].firstcombo_id+'" value="'+jsn[i].images+'" /></td><td>'+jsn[i].product_name+'</td><td><button type="button" class="btn btn-primary editpro" id="edit'+jsn[i].firstcombo_id+'" data-target="#edit_new"  data-toggle="modal"><i class="fa fa-pencil" aria-hidden="true"></i></button><button type="button" class="btn btn-danger closepro" id="close'+jsn[i].firstcombo_id+'"><i class="fa fa-trash" aria-hidden="true"></i></button></td></tr>');
				//$("#proappend").append('<tr id="row'+jsn[i].re_product_id+'"><td id="name'+jsn[i].re_product_id+'">'+jsn[i].product_name+'</td><td id="code'+jsn[i].re_product_id+'">'+jsn[i].product_code+'</td><td id="des'+jsn[i].re_product_id+'">'+jsn[i].product_description+'</td><td class="deleted"><del  id="price'+jsn[i].re_product_id+'">'+oldprice+'</del><span style="display:none;" id="dist'+jsn[i].re_product_id+'">'+jsn[i].product_discount+'</span> <span>'+nprice+'</span></td><td id="qty'+jsn[i].re_product_id+'">'+jsn[i].product_qty+'<input type="hidden" id="img1'+jsn[i].re_product_id+'" value="'+jsn[i].image1+'" /><input type="hidden" id="img2'+jsn[i].re_product_id+'" value="'+jsn[i].image2+'" /><input type="hidden" id="img3'+jsn[i].re_product_id+'" value="'+jsn[i].image3+'" /><input type="hidden" id="img4'+jsn[i].re_product_id+'" value="'+jsn[i].image4+'" /><input type="hidden" id="cat'+jsn[i].re_product_id+'" value="'+jsn[i].catid+'" /></td><td><div class="two_btns"><button type="button" class="btn btn-primary editpro" id="edit'+jsn[i].re_product_id+'"><i class="fa fa-pencil" aria-hidden="true"></i></button><button type="button" class="btn btn-danger closepro" id="close'+jsn[i].re_product_id+'"><i class="fa fa-trash" aria-hidden="true"></i></button></div></td> </tr>');
				
			}
			
		}
		
		
	
	});

}
function Browseimage1(input) {
	//alert("kk");
	$('#imgboxs').html("");
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
           // $('#pic').attr('src', e.target.result);
        	$('#imgboxs').append('<img src="'+ e.target.result+'">');
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

function EditSlider(base_url)
{
	
	var editid=$("#pid").val();
	var val1=($("#file2").val()).toLowerCase();
    
	if(editid==0)
	{
		alertify.error("Product Not Selected"); 
	}
	else if(val1=="")
	{
		alertify.error("Please Select An Image"); 
	}
	else
	{
		  var file_data1= $('#file2').prop('files')[0];
		  var form_data = new FormData();  
				form_data.append('productid', editid);
				form_data.append('file2', file_data1);	 
			$.ajax({
				 url: base_url+"welcome/EditSliderImg", 
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
						alertify.success("Slider Edited");
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
	
	$("#imgbox2").html("");
	
	
	var edid=ids.slice(4);
	//alert(edid);
	$("#pid").val(edid);
	
	if(($("#img"+edid).val()!="")&&($("#img"+edid).val()!=null))
	{
		//alert($("#img1"+edid).val());
		$("#imgbox2").append( '<img src='+base_url+'uploads/combo_'+edid+'.jpeg>');
	}
	
}
function CloseReProduct(base_url,ids)
{
	var clid=ids.slice(5);
	//alert(base_url+"welcome/deleteslider1?id="+clid);
	$.getJSON(base_url+"welcome/deleteslider1",{"id":clid},function(jsn)
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
