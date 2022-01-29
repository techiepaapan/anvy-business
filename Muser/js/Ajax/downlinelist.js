$(document).ready(function()
{
	var base_url=getUrl();
	getuser(base_url);
	
	$("input[name=radio]").click(function(){
		getuser(base_url);
	});
	 
});




function getuser(base_url)
{
	var timeStamp=new Date().getTime();
	var pos=$("input[name=radio]:checked").val();
	$("#walappend").html("");
	 $.ajax({
		 url: base_url+"welcome/getUserByPosition", // point to server-side controller method
		 dataType: 'json', // what to expect back from the server
		 data:{"pos":pos},
		 type: 'post',
		 async:false,
	     success: function (jsn) {
	    		$("#walappend").html("");
	    		
	    		for(var i=0;i<jsn.length;++i){
	    			
	    			
	    			var name=jsn[i].u_name;
	    			var username=jsn[i].username;
	    			var freeuser=jsn[i].freeuser;
	    			var joindate=jsn[i].u_joindate;
	    			
	    			if(freeuser==0){
	    				if(jsn[i].activated==1){
	    				var stat="Paid User";var col="green";
	    				}
	    				else{
	    					var stat="Unpaid User";var col="red";
	    				}
	    			}
	    			else{var stat="Free User";var col="red";}
	    			
		    		$("#walappend").append('<tr>'+
		    				'<td>'+(i+1)+'</td>'+
		    				'<td>'+name+'</td>'+
		    				'<td>'+username+'</td>'+
		    				'<td>'+joindate+'</td>'+
							'<td><img src="'+base_url+'/'+getrank(jsn[i].pbv)+'?t='+timeStamp+'" style="width: 45px;"/></td>'+
		    				'<td style="color:'+col+'">'+stat+'</td>'+
		    				'</tr>'
		    		);
	    		}

	    	 	
			 }
		 });
	 
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


