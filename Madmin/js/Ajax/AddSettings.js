$(document).ready(function()
{
	
	var base_url=getUrl();
	loadSettings(base_url);
	$("#setting_sub").click(function()
	{
		//alert("kk");
		AddSettings(base_url);
	});
	
	$("#sub").click(function()
	{
		EditRepurchaseSettings(base_url)
	});
	
    $(document).on('input',"#l1,#l2,#l3,#l4,#l5,#l6,#l7,#l8,#l9,#l10",function(){
	    var match = (/(\d{0,3})[^.]*((?:\.\d{0,2})?)/g).exec(this.value.replace(/[^\d.]/g, ''));
	    this.value = match[1] + match[2];
    });
});
function AddSettings(base_url)
{
	
	var scharge=$("#scharge").val();
	var bvpoint=$("#bvpoint").val();
	var bvamt=$("#amount").val();
	var id=1;
	if(scharge=="")/*||bvpoint==""||bvamt=="")*/
	{
		alertify.error("Enter all Fields");
	}
	else if(isNaN(scharge))/*||isNaN(bvamt)||isNaN(bvpoint))*/
	{
		alertify.error("Invalid Data Format");
	}
        else
        {
        document.getElementById("setting_sub").disabled = true;
	$.getJSON(base_url+"welcome/settingsinsert",{"Scharge":scharge,"Bvpoint":bvpoint,"Bvamt":bvamt,"Adid":id},function(jsn)
	{
		document.getElementById("setting_sub").disabled = false;
		if(jsn[0].result==1)
		{
			alertify.success("Settings Added");
		}
		else if(jsn[0].result==2)
		{
			alertify.success("Settings Updated");
		}
	});
        }

}

function loadSettings(base_url)
{
	
	$.getJSON(base_url+"welcome/loadsettings",function(jsn)
			{
				$("#scharge").val(jsn[0].service_charge_price);
				$("#bvpoint").val(jsn[0].bv_amount_point);
				$("#amount").val(jsn[0].bv_equalent_amount);
			});
}



function EditRepurchaseSettings(base_url)
{
	var flg=0;
	var l1=$("#l1").val();
	var l2=$("#l2").val();
	var l3=$("#l3").val();
	var l4=$("#l4").val();
	var l5=$("#l5").val();
	var l6=$("#l6").val();
	var l7=$("#l7").val();
	var l8=$("#l8").val();
	var l9=$("#l9").val();
	var l10=$("#l10").val();
	var levelid=$("#levelid").val();
	
		if(l1==''||l2==''||l3==''||l4==''||l5==''||l6==''||l7==''||l8==''||l9==''||l10==''){
			alertify.error("Enter all purchase level fields");
			flg++;
		}
		else if(isNaN(l1)|| l1<0 ||isNaN(l2)|| l2<0 ||isNaN(l3)|| l3<0 ||isNaN(l4)|| l4<0 ||isNaN(l5)|| l5<0 ||isNaN(l6)|| l6<0 ||
				isNaN(l7)|| l7<0 ||isNaN(l8)|| l8<0 ||isNaN(l9)|| l9<0 ||isNaN(l10)|| l10<0)
		{
			alertify.error("Enter valid purchase level values");
			flg++;
		}
		else if(levelid==2){
			var totsum=parseFloat(l1)+parseFloat(l2)+parseFloat(l3)+parseFloat(l4)+parseFloat(l5)
					+parseFloat(l6)+parseFloat(l7)+parseFloat(l8)+parseFloat(l9)+parseFloat(l10);
			if(totsum<99 || totsum>100){
				flg++;
				alertify.error("Sum of Levels <br/> Value Got = "+totsum+ "<br/>Expected = Between 99-100");
			}
		}
	if(flg==0){
        document.getElementById("sub").disabled = true;
//alert(base_url+"welcome/repurchsesettings?levelid="+levelid+"&l1="+l1+"&l2="+l2+"&l3="+l3+"&l4="+l4+"&l5="+l5+"&l6="+l6+"&l7="+l7+"&l8="+l8+"&l9="+l9+"&l10="+l10);
	$.getJSON(base_url+"welcome/repurchsesettings?levelid="+levelid+"&l1="+l1+"&l2="+l2+"&l3="+l3+"&l4="+l4+"&l5="+l5+"&l6="+l6+"&l7="+l7+"&l8="+l8+"&l9="+l9+"&l10="+l10,function(jsn)
	{
                         document.getElementById("sub").disabled = false;
                         	alert("Repurchase Level Updated");
                         	window.location.reload();
	});
	}

}