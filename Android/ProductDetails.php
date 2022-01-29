<?php

error_reporting(0);
include 'dbconnection.php';

$variable=$_GET['variable'];
$id=$_GET['product_id'];

try
{
    if($variable=='m4a0s1s')
    {
        
        $query=mysqli_query($connect,"call webservice_getproductsdetails('$id')");
        mysqli_next_result($connect);
        $query1=mysqli_query($connect,"select * from repurchase_size where re_product_id='$id'");
        //$query=mysql_query("select * from soft_user where soft_user_username='$username' and soft_user_password='$password'");
        $arrys=array();
        $arry=array();
        $len=mysqli_num_rows($query);
        $len1=mysqli_num_rows($query1);
        if($len>0||$len1>0)
        {
            while($rows=mysqli_fetch_array($query))
            {
                $path='http://www.massventureindia.com/Madmin/uploads/';
                $logo1=$path.$rows['image1'];
                $logo2=$path.$rows['image2'];
                $logo3=$path.$rows['image3'];
                $logo4=$path.$rows['image4'];
                
                $row_array['image1']=$logo1;
                $row_array['image2']=$logo2;
                $row_array['image3']=$logo3;
                $row_array['image4']=$logo4;
                
                $row_array['delivery_charge']=$rows['delivery_charge'];
                
                // $data=array('name'=>$rows['u_name']);
                array_push($arrys,$row_array);
            }
            while($rows1=mysqli_fetch_array($query1))
            {
            	$row_array1['name']=$rows1['size'];
            	$row_array1['sizeid']=$rows1['size_id'];
            	array_push($arry,$row_array1);
            }
            
            
            $productId=$id;
            mysqli_next_result($connect);
            $rquery1 = mysqli_query($connect,"SELECT count(id) as cnt,sum(rating) as srate FROM product_rating where pid='$productId' and  flag=1");
            $flgx=1;
            //echo "Rows->".$query->num_rows();
            $wrating=0;$wreview=0;$srate=0;
            
            
            while ($row=mysqli_fetch_array($rquery1))
            {
            	$wreview=$row['cnt'];
            	$srate=$row['srate'];
            		
            	if($wreview==0 || $srate==null|| $srate==''){$wrating=0;$srate=0;}
            	else{$wrating=($srate/(5*$wreview))*100;}
            }
            
            $avgrating=sprintf('%0.1f',($wrating*5/100));
            $wrating=sprintf('%0.2f',$wrating);
            
            $ratings=array('rating' => $avgrating,"ratingperc"=>$wrating,"total"=>$wreview);
            
            mysqli_next_result($connect);
            $ts1=0;$ts2=0;$ts3=0;$ts4=0;$ts5=0;
            $rquery2 = mysqli_query($connect,"call webservice_eachstar_reviews('$productId')");
            while ($row=mysqli_fetch_array($rquery2))
            {
            	$s1=$row['s1'];
            	$s2=$row['s2'];
            	$s3=$row['s3'];
            	$s4=$row['s4'];
            	$s5=$row['s5'];
            	$sum=($s1+$s2+$s3+$s4+$s5)/100;
            
            	$ts5=sprintf('%0.0f',($s5/$sum));
            	$ts4=sprintf('%0.0f',($s4/$sum));
            	$ts3=sprintf('%0.0f',($s3/$sum));
            	$ts2=sprintf('%0.0f',($s2/$sum));
            	$ts1=sprintf('%0.0f',($s1/$sum));
            }
            //echo "<br/><br/>".$ts1." ".$ts2." ".$ts3." ".$ts4." ".$ts5;
            $rating_detail=array('one' => $ts1,'two' => $ts2,'three' => $ts3,'four' => $ts4,'five' => $ts5,);
            
            
            $reviewarry=array();
            mysqli_next_result($connect);
            $rquery3 = mysqli_query($connect,"select ue.u_name,pr.rating,pr.heading,pr.review,pr.date,pr.time from product_rating pr,user_extradetails ue
            		where pr.u_id=ue.u_id and pr.pid='$productId' and flag='1' order by pr.id desc limit 2");
            while ($row=mysqli_fetch_array($rquery3))
            {
            	$row_array1['name']=$row['u_name'];
            	$row_array1['rating']=$row['rating'];
            	$row_array1['heading']=$row['heading'];
            	$row_array1['review']=$row['review'];
            	$date=implode('-', array_reverse(explode('-', $row['date'])));
            	$row_array1['date']=$date;
            	
            	$date2=implode('/', explode('-', $date));
            	$timestamp = strtotime($date2." ".$row['time']);
            	$time=date("h.i A", $timestamp);
            	
            	$row_array1['time']=$time;
            	array_push($reviewarry,$row_array1);
            }
            
            echo json_encode(array('status' => 200,'response_message'=>"Success",'details'=>$arrys,'size'=>$arrys,'size'=>$arry,
            		'ratings'=>$ratings,'rating_detail'=>$rating_detail,'reviews'=>$reviewarry),JSON_UNESCAPED_SLASHES);
            
        }
        
        else
        {
            echo json_encode(array('status' => 400,'response_message'=>"Product Not Exists"));
        }
    }
    
    else
    {
        
        echo json_encode(array('status' => 400,'response_message'=>"Failed"));
    }
}
catch(Exception $ex)
{
    echo json_encode(array('status' => 400,'response_message'=>$ex->getMessage()));
}

?>


