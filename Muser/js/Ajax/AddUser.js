var prdarr=[];
var totalProductValue=[];
var success=0;
totalProductValue.push({"price":0,"bv":0});
$(document).ready(function()
{
	
	var base_url=getUrl();
	$("#submitt").click(function()
	{
		RegisterUser(base_url);
	});
	$("#checkuseid").click(function()
	{
		CheckAvailability(base_url);	
	});
	
	
	$(".closure").click(function(){
		window.location.href=base_url+"welcome/teamView";
	});
	
	$(".closure1").click(function(){
		window.location.href=base_url+"welcome/businessTools";
	});

	function removeByKey(array, params){
		  array.some(function(item, index) {
		    return (array[index][params.key] === params.value) ? !!(array.splice(index, 1)) : false;
		  });
		  return array;
		}
	

	$(document).on("click",".prdbtnsel",function()
			{
				var id=$(this).val();
				success=0;
				
				if(prdarr.length > 0){
					''
					if(prdarr.some(function(o){return o["id"] == "free";}) ==true){
						prdarr=[];
						$(".prdbtnsel1").css("background","rgb(222, 222, 222)");
						$(".prdbtnsel1").css("color","rgb(51, 51, 51)");
					}
					if(prdarr.some(function(o){return o["id"] == id;}) ==false){
						var obj={};
						obj["id"]=id;
						obj['qty']=$("#qt"+id).val();
						obj['size']=$("#sz"+id).val();
						prdarr.push(obj);
						calculateProducts(base_url);
						if(success==1){
							$("#qt"+id).css('pointer-events','none');
							$("#sz"+id).css('pointer-events','none');
						$(this).css("background","green");
						$(this).css("color","#fff");
						alertify.success("Added to cart");
						}
						else{
							removeByKey(prdarr, {
								  "key": 'id',
								  "value": id
								});
							$("#qt"+id).css('pointer-events','');
							$("#sz"+id).css('pointer-events','');
						}
					}
					else{
						removeByKey(prdarr, {
							  "key": 'id',
							  "value": id
							});
						calculateProducts(base_url);
						$(this).css("background","rgb(222, 222, 222)");
						$(this).css("color","rgb(51, 51, 51)");
						$("#qt"+id).css('pointer-events','');
						$("#sz"+id).css('pointer-events','');
						alertify.error("Removed from cart");
					}
					
				}
				else{
					var obj={};
					obj["id"]=id;
					obj['qty']=$("#qt"+id).val();
					obj['size']=$("#sz"+id).val();
					prdarr.push(obj);
					calculateProducts(base_url);
					$(this).css("background","green");
					$(this).css("color","#fff");
					$("#qt"+id).css('pointer-events','none');
					$("#sz"+id).css('pointer-events','none');
					alertify.success("Added to cart");
				}
				
			//	alert(JSON.stringify(prdarr));
			});
	$(document).on("click","#remprod",function()
			{
				alertify.confirm("Remove all products from cart???",function(e){
					
					if(e){
						clearProducts();
						calculateProducts(base_url);
						alertify.success("Cart Emptied");
					}
				});
				
			});
	
	function clearProducts(){
		prdarr=[];
		$(".qtclass").css('pointer-events','');
		$(".szclass").css('pointer-events','');
		$(".prdbtnsel").css("background","rgb(222, 222, 222)");
		$(".prdbtnsel").css("color","rgb(51, 51, 51)");
	}
	
	
	/*$(document).on("click",".prdbtnsel1",function()
			{
						prdarr=[];
						var obj={};
						obj["id"]="free";
						obj['qty']=1;
						obj['size']="";
						prdarr.push(obj);
						calculateProducts(base_url);
						
						$(".qtclass").css('pointer-events','');
						$(".qtclass").css('pointer-events','');
						$(".prdbtnsel").css("background","rgb(222, 222, 222)");
						$(".prdbtnsel").css("color","rgb(51, 51, 51)");
						$(this).css("background","green");
						$(this).css("color","#fff");
			});*/
	
});


function calculateProducts(base_url){
	//alert(JSON.stringify(prdarr));
	$.ajax({
	    type: "GET",
	    url: base_url+"welcome/calculateBinaryProductsall",		 
	    dataType: "json",
	    data:{"products":JSON.stringify(prdarr)},
	    async:false,   
	    success: function(jsn) 
	    {
	    	if(jsn.length>0){
	    		if(jsn[0].bv>0){
	    			success=1;
		    		totalProductValue=[];
		    		totalProductValue.push({"price":jsn[0].price,"bv":jsn[0].bv});
		    		$(".ptp").html(jsn[0].price);
		    		$(".pbv").html(jsn[0].bv);
					var amounta=jsn[0].price;
					var deliveryc=0;
						if(amounta>=2700){
					 				deliveryc=200;
					 			}
					 			else if(amounta>=1200 && amounta<2700){
					 				deliveryc=150;
					 			}
					 			else{
					 				deliveryc=100;
					 			}
					if(amounta==0){deliveryc=0;}
					$(".pdc").html(deliveryc);
		    	}
	    		else{
					totalProductValue=[];
					$(".ptp").html(0);
					$(".pbv").html(0);
					$(".pdc").html(0);
	    		}
	    	}
	    	else{
				totalProductValue=[];
	    		$(".ptp").html(0);
	    		$(".pbv").html(0);
				$(".pdc").html(0);
	    	}
	    }
	});
}


function RegisterUser(base_url)
{
	var msg="";var msg1="";var b1=0;var b2=0;var msg2="";var b3=0;var b4=0;var b5=0;var b6=0;var msg2="";var b7=0,msg3="";
	var referalid=$("#referal_id").val();
	var parentid=$("#parent_id").val();
	var fname=$("#fname").val();
	var frname=$("#frname").val();
	var dob=$("#dob").val();
	dob=dob.split("/").reverse().join("-");
	var mail=$("#mail").val();
	var mobile=$("#mobile").val();
	var gender=$("input[name='gen']:checked").val();
	var position=$("#pos").val();
	var address=$("#address").val();
	var city=$("#city").val();
	var country=$("#country").val();
	var state=$("#state").val();
	var apin=$("#apin").val();
	
	var bank_name=$("#bank_name").val();
	var branch_name=$("#branch_name").val();
	var acnt_no=$("#acnt_no").val();
	var ifsc=$("#ifsc").val();
	var pan=$("#pan").val();
	var add=$("#referal_id").val();
	var nominee_name=$("#nominee_name").val();
	var relation=$("#relation").val();
	var username=$("#username").val();
	var password=$("#password").val();
	var p_code=prdarr;
	var pin_number=$("#pin_number").val();
	//alert(p_code);
	//var re = /^([0-9]{11})|([0-9]{2}-[0-9]{3}-[0-9]{6})$/;
	var emailformat = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/;
	var ifscformat=/^[A-Za-z]{4}0[A-Z0-9a-z]{6}$/;
	var phoneformat=/^\d{10}$/;	
	var regpan = /^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}?$/;
	
	var userFlag=0;
	var freestat=0;
	var prdarr1=[];
	var bvFlag = false;
	if(totalProductValue.length > 0){
		try{if(totalProductValue[0].bv>=20){bvFlag =true;}}catch(e){}
	}
	console.log(bvFlag);
	//alert(JSON.stringify(prdarr));
		//if(p_code==""||referalid==""||parentid==""||position==""||fname==""||frname==""||dob==""||mail==""||mobile==""||address==""||city==""||country==""||state==""||apin==""||bank_name==""||branch_name==""||acnt_no==""||ifsc==""||pan==""||nominee_name==""||relation==""||age==""||username==""||password==""||pin_number=="")
	//alert(p_code+" "+referalid+" "+parentid+" "+position+" "+fname+" "+mobile+" "+city+" "+country+" "+state+" "+pin_number+" "+gender);	
	if(referalid==""||parentid==""||position==""||fname==""||mobile==""||city==""||country==""||state==""||gender=="")		
		{
			
			alertify.error("Enter all Fields");
		}
		else if(mail!="" && !mail.match(emailformat))
		{
			alertify.error("Invalid email format");
		}
		else if(prdarr.length==0 || totalProductValue.length == 0 || bvFlag == false)
		{
			alertify.error("Select Product(s) worth more than 20BV");
		}
		else if(!mobile.match(phoneformat))
		{
			alertify.error("Invalid phone format");
		}

		
		else
		{
				
				//alert(base_url+"welcome/addusers?Parent="+parentid+"&Referal="+referalid+"&Pos="+position+"&Fname="+fname+"&Father="+frname+"&gender="+gender+"&dob="+dob+"&mail="+mail+"&mobile="+mobile+"&address="+address+"&city="+city+"&country="+country+"&state="+state+"&apin="+apin+"&bank_name="+bank_name+"&branch_name="+branch_name+"&acnt_no="+acnt_no+"&ifsc="+ifsc+"&pan="+pan+"&nominee_name="+nominee_name+"&relation="+relation+"&Added="+add+"&code="+JSON.stringify(prdarr));
				$.ajax({
				    type: "POST",
				    url: base_url+"welcome/addusers",		 
				    dataType: "json",
				    data:{"Parent":parentid,"Referal":referalid,"Pos":position,"Fname":fname,"Father":frname,"gender":gender,"dob":dob,"mail":mail,"mobile":mobile,"address":address,"city":city,"country":country,"state":state,"apin":apin,"bank_name":bank_name,"branch_name":branch_name,"acnt_no":acnt_no,"ifsc":ifsc,"pan":pan,"nominee_name":nominee_name,"relation":relation,"Added":add,"code":JSON.stringify(prdarr)},
				    async:false,   
				    beforeSend: function(){
				    	 $('#processMsg').css("display", "block");
				    	 document.getElementById("submitt").disabled = true;
      				  },
				    success: function(jsn) 
				    {
						if(jsn[0].res==0){
							document.getElementById("submitt").disabled = false;
							alertify.error(jsn[0].msg);
						}
						else{
							$("#newUserID").html(jsn[0].UID);
							$("#mySuccessModal").modal({
					            backdrop: 'static',
					            keyboard: false
					        });
						}
						
				    },
 					  complete: function(){
						    $('#processMsg').css("display", "none");
						  }
		 		 });
	}
}

function CheckAvailability(base_url)
{
	
	var username=$("#username").val();
	//alert(username);
	if(username=="")
	{
		return "Please Enter UserName";
	}
	else
	{
		//alert(base_url+"welcome/checkavailabes?User="+username);
		$.getJSON(base_url+"welcome/checkavailabes",{"User":username},function(jsn)
		{
			var res=jsn[0].msg;
			//alert(jsn[0].msg);
			if(jsn[0].msg==0)
			{
				alertify.error("Username Already Exists");
			}
			else
			{
				alertify.success("Username Available");
			}
			
		});
	}
}

