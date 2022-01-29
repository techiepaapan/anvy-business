<?php

error_reporting(0);
include 'dbconnection.php';

$user_id=$_GET['user_id'];

$variable=$_GET['variable'];
try
{

    if($variable=='m4a0s1s')
    {
        
       // $query=mysqli_query($connect,"call webservice_dashboard('$user_id')");aa
    	
    	$a=mysqli_query($connect,"SELECT u_id  FROM user_extradetails  WHERE referral_id='$user_id'");
    	
    	mysqli_next_result($connect);
    	$qry=mysqli_query($connect,"select netincome,repbonus,balance from user_wallet where u_id='$user_id'");
    	//select netincome,repbonus,balance into income,bonus,bal from user_wallet where u_id=userid;
    	$tot1=0;$tot2=0;$tot3=0;$tot4=0;$tot5=0;$tot6=0;$tot7=0;$tot8=0;$tot9=0;$tot10=0;
    	$income=0;$bonus=0;$bal=0;
    	if($res=mysqli_fetch_array($qry))
    	{
    		
    		$income=$res['netincome'];
    		$bonus=$res['repbonus'];
    		$bal=$res['balance'];
    	}
    	
    	
    	
    	while($rows=mysqli_fetch_array($a))
    	{
    		$uid=$rows['u_id'];
    		$tot1=$tot1+1;
    		//echo $uid." ";
    		$b=mysqli_query($connect,"SELECT u_id  FROM user_extradetails  WHERE referral_id='$uid'");
    		while($rows1=mysqli_fetch_array($b))
    		{
    			$uid1=$rows1['u_id'];
    			$tot2=$tot2+1;
    		//	echo $uid1." ";
    			$c=mysqli_query($connect,"SELECT u_id  FROM user_extradetails  WHERE referral_id='$uid1'");
    			while($rows2=mysqli_fetch_array($c))
    			{
    				$uid2=$rows2['u_id'];
    				$tot3=$tot3+1;
    				//echo $uid2." ";
    				
    				$d=mysqli_query($connect,"SELECT u_id  FROM user_extradetails  WHERE referral_id='$uid2'");
    				while($rows3=mysqli_fetch_array($d))
    				{
    					$uid3=$rows3['u_id'];
    					$tot4=$tot4+1;
    					//echo $uid3." ";
    					
    					$e=mysqli_query($connect,"SELECT u_id  FROM user_extradetails  WHERE referral_id='$uid3'");
    					while($rows4=mysqli_fetch_array($e))
    					{
    						$uid4=$rows4['u_id'];
    						$tot5=$tot5+1;
    						//echo $uid4." ";
    						
    						$f=mysqli_query($connect,"SELECT u_id  FROM user_extradetails  WHERE referral_id='$uid4'");
    						while($rows5=mysqli_fetch_array($f))
    						{
    							$uid5=$rows5['u_id'];
    							$tot6=$tot6+1;
    							//echo $uid5." ";
    							
    							$g=mysqli_query($connect,"SELECT u_id  FROM user_extradetails  WHERE referral_id='$uid5'");
    							while($rows6=mysqli_fetch_array($g))
    							{
    								$uid6=$rows6['u_id'];
    								$tot7=$tot7+1;
    							///	echo $uid6." ";
    								
    								$h=mysqli_query($connect,"SELECT u_id  FROM user_extradetails  WHERE referral_id='$uid6'");
    								while($rows7=mysqli_fetch_array($h))
    								{
    									$uid7=$rows7['u_id'];
    									$tot8=$tot8+1;
    								//	echo $uid7." ";
    									
    									$i=mysqli_query($connect,"SELECT u_id  FROM user_extradetails  WHERE referral_id='$uid7'");
    									while($rows8=mysqli_fetch_array($i))
    									{
    										$uid8=$rows8['u_id'];
    										$tot9=$tot9+1;
    										//echo $uid8." ";
    										
    										
    										$j=mysqli_query($connect,"SELECT u_id  FROM user_extradetails  WHERE referral_id='$uid8'");
    										while($rows9=mysqli_fetch_array($j))
    										{
    											$uid9=$rows9['u_id'];
    											$tot10=$tot10+1;
    											//echo $uid9." ";
    										}
    									}
    								}
    							}
    						}
    						
    				  }
    					
    					
    				}
    			}
    			
    			
    		}
    		
    		
    	}
        
    //	echo "</br>".$tot1."</br>".$tot2."</br>".$tot3."</br>".$tot4."</br>".$tot5."</br>".$tot6."</br>".$tot7."</br>".$tot8."</br>".$tot9."</br>".$tot10;
    	//	echo $income."</br> " .$bonus."</br> " .$bal."</br>";
    	echo json_encode(array('status' => 200,'responseMessage'=>"Success",'income'=>$income,'bonus'=>$bonus,'wallet'=>$bal,'level1'=>$tot1,'level2'=>$tot2,'level3'=>$tot3,'level4'=>$tot4,'level5'=>$tot5,'level6'=>$tot6,'level7'=>$tot7,'level8'=>$tot8,'level9'=>$tot9,'level10'=>$tot10),JSON_UNESCAPED_SLASHES);
    }
    
    else
    {
    
    	echo json_encode(array('status' => 400,'responseMessage'=>"Failed"));
    }
}
    catch(Exception $ex)
    {
    	echo json_encode(array('status' => 400,'responseMessage'=>$ex->getMessage()));
    }
?>


