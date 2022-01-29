var data=[];
$(document).ready(function()
{
	var id=$("#id").val();
	var pin=$("#pin").val();
	var tree=$("#tree").val();
	var base_url=getUrl();
	$(".rankimg").css({
		   'width' : '70px',
		   'height' : '70px',
		   'border-radius' : '35px'
		});

	createtree(base_url,tree);
	
	
	 $(".tree-data-name").click(function()
	{
		var text=$(this).text();
		var tree=$(this).attr("id1");
		//alert(tree);
		if(text=="FREE"){}else if(text=="ADD")
		{
			//alert(base_url+"welcome/adduser1?tree="+tree);
			//alert(tree);
			$.ajax({
				 url: base_url+"welcome/adduser1", // point to server-side controller method
				 dataType: 'json', // what to expect back from the server
				 data:{"tree":tree},
				 type: 'post',
			     success: function (jsn) {
			    	 if(jsn.result==1){
			    	 window.location.href=base_url+"welcome/adduser";
			    	 }
			     }
			     });
			 
			
		}
		else{createtree(base_url,tree);}
	});
	 
	 $("#up").click(function()
		{
			var tree=$(this).attr("id1");
			tree=tree.slice(0,-1);
			var trees=$("#tree").val();
			//alert(tree.length+" - "+trees.length);
			
			if((tree=="")||(tree=="2" && id!=1)||tree.length<trees.length){}else{createtree(base_url,tree);}
		});
	 
	 
	 
	 
	 $("#srch").click(function()
				{
					var id=$('#srchid').val();
					//alert(tree);
					if(id==""){
						alertify.error("Please Enter A Value");
					}
					else
					{
						//alert(base_url+"welcome/getuserID?id="+id);
						//alert(tree);
						$.ajax({
							 url: base_url+"welcome/getuserID", // point to server-side controller method
							 dataType: 'json', // what to expect back from the server
							 data:{"id":id},
							 type: 'post',
						     success: function (jsn) {
						    	 if(jsn[0].res==1){
						    	 createtree(base_url,jsn[0].tree);
						    	 }
						    	 else{
						    		 alertify.error("ID not found");
						    	 }
						     }
						     });
						 
						
					}
				});
	 
});




function createtree(base_url,tree)
{
	//red: #E74C3C
	$("#t2").css("background-color","#b6b6b6");
	$("#t0").css("background-color","#b6b6b6");
	$("#t00").css("background-color","#b6b6b6");
	$("#t01").css("background-color","#b6b6b6");
	$("#t1").css("background-color","#b6b6b6");
	$("#t10").css("background-color","#b6b6b6");
	$("#t11").css("background-color","#b6b6b6");
	
	$("#t2").html("FREE");
	$("#t0").html("FREE");
	$("#t00").html("FREE");
	$("#t01").html("FREE");
	$("#t1").html("FREE");
	$("#t10").html("FREE");
	$("#t11").html("FREE");
	if ($("#t2").hasOwnProperty('href')) {document.getElementsById("t2").removeAttribute("href");}
	if ($("#t0").hasOwnProperty('href')) {document.getElementsById("t0").removeAttribute("href");}
	if ($("#t00").hasOwnProperty('href')) {document.getElementsById("t00").removeAttribute("href");}
	if ($("#t01").hasOwnProperty('href')) {document.getElementsById("t01").removeAttribute("href");}
	if ($("#t1").hasOwnProperty('href')) {document.getElementsById("t1").removeAttribute("href");}
	if ($("#t10").hasOwnProperty('href')) {document.getElementsById("t10").removeAttribute("href");}
	if ($("#t11").hasOwnProperty('href')) {document.getElementsById("t11").removeAttribute("href");}
	$("#name2").text("");$("#l2").text("");$("#r2").text("");$("#date2").text("");
	$("#name0").text("");$("#l0").text("");$("#r0").text("");$("#date0").text("");
	$("#name00").text("");$("#l00").text("");$("#r00").text("");$("#date00").text("");
	$("#name01").text("");$("#l01").text("");$("#r01").text("");$("#date01").text("");
	$("#name1").text("");$("#l1").text("");$("#r1").text("");$("#date1").text("");
	$("#name10").text("");$("#l10").text("");$("#r10").text("");$("#date10").text("");
	$("#name11").text("");$("#l11").text("");$("#r11").text("");$("#date11").text("");
	$(".tree-data-name").attr("id1",""); 
	$("#up").attr("id1",""); 
	//alert(base_url+"welcome/gettree?tree="+tree);
	$('.tooltipstered').tooltipster('destroy');
	$('.ajax-loader').css("visibility", "visible");
	var timeStamp=new Date().getTime();
		 $("#rankimg2").attr("src",base_url+"images/tree-person.png?t="+timeStamp);
	 $("#rankimg0").attr("src",base_url+"images/tree-person.png?t="+timeStamp);
	 $("#rankimg00").attr("src",base_url+"images/tree-person.png?t="+timeStamp);
	 $("#rankimg01").attr("src",base_url+"images/tree-person.png?t="+timeStamp);
	 $("#rankimg1").attr("src",base_url+"images/tree-person.png?t="+timeStamp);
	 $("#rankimg10").attr("src",base_url+"images/tree-person.png?t="+timeStamp);
	 $("#rankimg11").attr("src",base_url+"images/tree-person.png?t="+timeStamp);
	
	 $.ajax({
		 url: base_url+"welcome/gettree", // point to server-side controller method
		 dataType: 'json', // what to expect back from the server
		 data:{"tree":tree},
		 type: 'post',
		 async:false,
	     success: function (jsn) {
	    	 data=[];
	    	 //namem,uidm,name0,uid0,name00,uid00,name01,uid01,name1,uid1,name10,uid10,name11,uid11,treem,tree0,tree00,tree01,tree1,tree10,tree11
	    	// alert(jsn[0].namem);
	    	 if(jsn[0].namem!=null)
	    	 {
	    		 $("#t2").html((jsn[0].namem));
	    		 if(jsn[0].activem==1){
	    			 $("#t2").css("background-color","#00A5FF");
	    		 }
	    		 else{
	    			 $("#t2").css("background-color","#E74C3C");
	    		 }
	    		 $("#t2").attr("id1",jsn[0].treem);
	    		 $("#up").attr("id1",jsn[0].treem); 
	    		 var obj={};
	    		 obj['id']=jsn[0].uidm;
	    		 obj['ttip']="2";
	    		 data.push(obj);
	    	 }
	    	 if(jsn[0].name0!=null)
    		 {
	    		 $("#t0").html((jsn[0].name0));
	    		 if(jsn[0].active0==1){
	    			 $("#t0").css("background-color","#00A5FF");
	    		 }
	    		 else{
	    			 $("#t0").css("background-color","#E74C3C");
	    		 }
	    		 $("#t0").attr("id1",jsn[0].tree0); 
	    		 var obj={};
	    		 obj['id']=jsn[0].uid0;
	    		 obj['ttip']="0";
	    		 data.push(obj);
    		 }
	    	 else
	    	 {
	    		 $("#t0").html("ADD");
	    		 $("#t0").css("background", "green");
	    		 $("#t0").attr("id1",jsn[0].treem+"0"); 
	    	 }
	    	 
	    	 
	    	 if(jsn[0].name00!=null)
    		 {
	    		 $("#t00").html((jsn[0].name00));
	    		 if(jsn[0].active00==1){
	    			 $("#t00").css("background-color","#00A5FF");
	    		 }
	    		 else{
	    			 $("#t00").css("background-color","#E74C3C");
	    		 }
	    		 $("#t00").attr("id1",jsn[0].tree00); 
	    		 var obj={};
	    		 obj['id']=jsn[0].uid00;
	    		 obj['ttip']="00";
	    		 data.push(obj);
    		 }
	    	 else
	    	 {
	    		 if(jsn[0].name0!=null){
	    		 $("#t00").html("ADD");
	    		 $("#t00").css("background", "green");
	    		 $("#t00").attr("id1", jsn[0].tree0+"0");
	    		 }
	    	 }
	    	 
	    	 
	    	 if(jsn[0].name01!=null)
    		 {
	    		 $("#t01").html((jsn[0].name01));
	    		 if(jsn[0].active01==1){
	    			 $("#t01").css("background-color","#00A5FF");
	    		 }
	    		 else{
	    			 $("#t01").css("background-color","#E74C3C");
	    		 }
	    		 $("#t01").attr("id1",jsn[0].tree01); 
	    		 var obj={};
	    		 obj['id']=jsn[0].uid01;
	    		 obj['ttip']="01";
	    		 data.push(obj);
    		 }
	    	 else
	    	 {
	    		 if(jsn[0].name0!=null){
	    		 $("#t01").html("ADD");
	    		 $("#t01").css("background", "green");
	    		 $("#t01").attr("id1", jsn[0].tree0+"1");
	    		 }
	    		 
	    	 }
	    	 
	    	 
	    	 if(jsn[0].name1!=null)
    		 {
	    		 $("#t1").html((jsn[0].name1));
	    		 if(jsn[0].active1==1){
	    			 $("#t1").css("background-color","#00A5FF");
	    		 }
	    		 else{
	    			 $("#t1").css("background-color","#E74C3C");
	    		 }
	    		 $("#t1").attr("id1",jsn[0].tree1); 
	    		 var obj={};
	    		 obj['id']=jsn[0].uid1;
	    		 obj['ttip']="1";
	    		 data.push(obj);
    		 }
	    	 else
	    	 {
	    		 $("#t1").attr("id1",jsn[0].treem);
	    		 $("#t1").html("ADD");
	    		 $("#t1").css("background", "green");
	    		 $("#t1").attr("id1",jsn[0].treem+"1"); 
	    	 }
	    	 
	    	 
	    	 if(jsn[0].name10!=null)
    		 {
	    		 $("#t10").html((jsn[0].name10));
	    		 if(jsn[0].active10==1){
	    			 $("#t10").css("background-color","#00A5FF");
	    		 }
	    		 else{
	    			 $("#t10").css("background-color","#E74C3C");
	    		 }
	    		 $("#t10").attr("id1",jsn[0].tree10); 
	    		 var obj={};
	    		 obj['id']=jsn[0].uid10;
	    		 obj['ttip']="10";
	    		 data.push(obj);
    		 }
	    	 else
	    	 {
	    		 if(jsn[0].name1!=null){
	    		 $("#t10").html("ADD");
	    		 $("#t10").css("background", "green");
	    		 $("#t10").attr("id1",jsn[0].tree1+"0");
	    		 }
	    	 }
	    	 
	    	 
	    	 if(jsn[0].name11!=null)
    		 {
	    		 $("#t11").html((jsn[0].name11));
	    		 if(jsn[0].active11==1){
	    			 $("#t11").css("background-color","#00A5FF");
	    		 }
	    		 else{
	    			 $("#t11").css("background-color","#E74C3C");
	    		 }
	    		 $("#t11").attr("id1",jsn[0].tree11); 
	    		 var obj={};
	    		 obj['id']=jsn[0].uid11;
	    		 obj['ttip']="11";
	    		 data.push(obj);
    		 }
	    	 else
	    	 {
	    		 if(jsn[0].name1!=null){
	    		 $("#t11").html("ADD");
	    		 $("#t11").css("background", "green");
	    		 $("#t11").attr("id1", jsn[0].tree1+"1");
	    		 }
	    	 }
	    	 
	    	
			 }
		 });
	
	// alert(JSON.stringify(data));
 	// alert("Length=> "+data.length);
	 if(data.length>0){
 	 for(var i=0;i<data.length;++i)
 		{
 		var sttip=data[i].ttip;//alert(sttip);
		 var uid=data[i].id;
 		 //alert(data[i].id+" - "+data[i].ttip);
 		 //alert(base_url+"welcome/gettreedetails?id="+uid);
	    	 $.ajax({
	    		 url: base_url+"welcome/gettreedetails", // point to server-side controller method
	    		 dataType: 'json', // what to expect back from the server
	    		 data:{"id":uid},
	    		 type: 'POST',
	    		 async:false,
	    	     success: function (jsn1) {
	    	    	 var namex="#name"+sttip,rx="#r"+sttip,lx="#l"+sttip,datex="#date"+sttip,tpbv="#pbv"+sttip;
	    	    	 var rankImg="rankimg"+sttip;
	    	    	 var uname=(jsn1[0].u_name);
	    	    	$(namex).text(uname);
	    	    	$(rx).text(jsn1[0].bv_right);
	    	    	$(lx).text(jsn1[0].bv_left);
	    	    	if(jsn1[0].pbv==null || jsn1[0].pbv==''||jsn1[0].pbv==undefined){
	    	    		jsn1[0].pbv=0;
	    	    	}
	    	    	$(tpbv).text(jsn1[0].pbv+" BV");
	    	    	$(datex).text((jsn1[0].u_joindate).split("-").reverse().join("-"));
	    	    	document.getElementById(rankImg).src=base_url+"/"+getrank(jsn1[0].pbv)+"?t="+timeStamp;
	    	     }
	    	 });
	    if(i==(data.length-1))
 		 {

	    	$('.ajax-loader').css("visibility", "hidden");
	    	$('.tree-data img').attr('class','tooltipstered');
	    	$('.tree-data img').attr('title','');
	    	setTimeout(function() {
	    		$('.tooltipstered').tooltipster({
	    			contentAsHTML: 'true',
	    		   animation: 'grow',
	    		   delay: 200,
	    		   theme: 'tooltipster-punk',
	    		   trigger: 'custom',
	    		    interactive: true,
	    			triggerOpen: {
	    				mouseenter: true,
	    				touchstart: true
	    			},
	    			triggerClose: {
	    				click: true,
	    				scroll: true,
	    				tap: true,
	    				mouseleave:true
	    			},
	    		   contentCloning: true,
	    		   
	    		});
	    	}, 60);
 		 	//setTimeout(function() {$('.tooltipstered').tooltipster({multiple:true});}, 100);
 		 }
 		}
	 }
	 else
		 {
		 $('.ajax-loader').css("visibility", "hidden");
		 }
	 
}


function getrank(rankbv){
	if(rankbv=="" || rankbv==null || isNaN(rankbv) || rankbv<0){
		rankbv=0;
	}
	var image="images/tree-person.png";
	if(rankbv>=500 && rankbv<1000){
		image="images/rank/star.jpg";
	}
	else if(rankbv>=1000 && rankbv<2500 ){
		image="images/rank/silver.jpg";
	}
	else if(rankbv>=2500 && rankbv<5000 ){
		image="images/rank/gold.jpg";
	}
	else if(rankbv>=5000 && rankbv<15000 ){
		image="images/rank/pearl1.jpg";
	}
	else if(rankbv>=15000 && rankbv<30000 ){
		image="images/rank/emerald.jpg";
	}
	else if(rankbv>=30000 && rankbv<70000 ){
		image="images/rank/platinum.jpg";
	}
	else if(rankbv>=70000 && rankbv<150000 ){
		image="images/rank/diamond.jpg";
	}
	else if(rankbv>=150000 && rankbv<300000 ){
		image="images/rank/double_diamond.jpg";
	}
	else if(rankbv>=300000 && rankbv<750000 ){
		image="images/rank/triple_diamond.jpg";
	}
	else if(rankbv>=750000 && rankbv<1500000 ){
		image="images/rank/blue_diamond.jpg";
	}
	else if(rankbv>=1500000 && rankbv<4000000 ){
		image="images/rank/royal_diamond.jpg";
	}
	else if(rankbv>=4000000 && rankbv<10000000 ){
		image="images/rank/crown_diamond.jpg";
	}
	else if(rankbv>=10000000){
		image="images/rank/imperial_crown_diamond.jpg";
	}
	
	return image;
	
}