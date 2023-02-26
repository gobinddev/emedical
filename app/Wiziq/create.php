<?php

class ScheduleClass
{
	
	
	function ScheduleClass($secretAcessKey,$access_key,$webServiceUrl,$presenter_id,$presenter_name,$start_time,$title,$duration,$id)
	{
		require_once("AuthBase.php");
		$authBase = new AuthBase($secretAcessKey,$access_key);
		$method = "create";
		$requestParameters["signature"]=$authBase->GenerateSignature($method,$requestParameters);
		#for teacher account pass parameter 'presenter_email'
                //$requestParameters["presenter_email"]="virenkumar2709@gmail.com";
		#for room based account pass parameters 'presenter_id', 'presenter_name'
		$requestParameters["presenter_id"] =$presenter_id; //"40"; //Required
		$requestParameters["presenter_name"] =$presenter_name;// "viren kumar";
		$requestParameters["start_time"] = $start_time;//"12/12/2021 13:30";
		$requestParameters["title"]=$title;//"my php-class"; //Required
		$requestParameters["duration"]=$duration;//"60"; //Required (in Minutes)
		$requestParameters["time_zone"]="Asia/Kolkata"; //optional
		$requestParameters["attendee_limit"]="30"; //optional
		$requestParameters["control_category_id"]=""; //optional
		$requestParameters["create_recording"]=""; //optional
		$requestParameters["return_url"]="https://admin.khannajeweller.com/thank-you"; //optional 
		$requestParameters["status_ping_url"]=""; //optional
                $requestParameters["attendee_default_controls"]="audio,video,writing"; //optional  
                $requestParameters["language_culture_name"]="en-us";
		$httpRequest=new HttpRequest();
		try
		{
			$XMLReturn=$httpRequest->wiziq_do_post_request($webServiceUrl.'?method=create',http_build_query($requestParameters, '', '&')); 
		}
		catch(Exception $e)
		{	
	  		echo $e->getMessage();
		}
 		if(!empty($XMLReturn))
 		{
 			try
			{
			  $objDOM = new DOMDocument();
			  $objDOM->loadXML($XMLReturn);
	  
			}
			catch(Exception $e)
			{
			  echo $e->getMessage();
			}
		$status=$objDOM->getElementsByTagName("rsp")->item(0);
    	$attribNode = $status->getAttribute("status");
		if($attribNode=="ok")
		{
			/*$methodTag=$objDOM->getElementsByTagName("method");
			echo "method=".$method=$methodTag->item(0)->nodeValue;
			$class_idTag=$objDOM->getElementsByTagName("class_id");
			echo "<br>Class ID=".$class_id=$class_idTag->item(0)->nodeValue;
			$recording_urlTag=$objDOM->getElementsByTagName("recording_url");
			echo "<br>recording_url=".$recording_url=$recording_urlTag->item(0)->nodeValue;
			$presenter_emailTag=$objDOM->getElementsByTagName("presenter_email");
			echo "<br>presenter_email=".$presenter_email=$presenter_emailTag->item(0)->nodeValue;
			$presenter_urlTag=$objDOM->getElementsByTagName("presenter_url");
			echo "<br>presenter_url=".$presenter_url=$presenter_urlTag->item(0)->nodeValue;*/
                    
                      $methodTag=$objDOM->getElementsByTagName("method");
			//echo "method=".$method=$methodTag->item(0)->nodeValue;
			$class_idTag=$objDOM->getElementsByTagName("class_id");
			//echo "<br>Class ID=".$class_id=$class_idTag->item(0)->nodeValue;
			$recording_urlTag=$objDOM->getElementsByTagName("recording_url");
			//echo "<br>recording_url=".$recording_url=$recording_urlTag->item(0)->nodeValue;
			$presenter_emailTag=$objDOM->getElementsByTagName("presenter_email");
			//echo "<br>presenter_email=".$presenter_email=$presenter_emailTag->item(0)->nodeValue;
			$presenter_urlTag=$objDOM->getElementsByTagName("presenter_url");
			//echo "<br>presenter_url=".$presenter_url=$presenter_urlTag->item(0)->nodeValue;
                            // echo"<pre>";
                     /*DB::table("online_meeting")->insert([
                     'presenter_id'=>$presenter_id,
                     'presenter_name'=>$presenter_name,
                     'start_time'=>date('Y-m-d H:i:s', strtotime($start_time)),
                     'title'=>$title,  
                     'duration'=>$duration,
                     'class_id'=>$class_idTag->item(0)->nodeValue, 
                     'recording_url'=>$recording_urlTag->item(0)->nodeValue, 
                     'presenter_url'=>$presenter_urlTag->item(0)->nodeValue,         
                      ]);*/
                        
                        DB::table("appointments")->where(['id'=>$id])->update([
                                        'class_id'=>$class_idTag->item(0)->nodeValue,
                                        'executive_meeting_url'=>$presenter_urlTag->item(0)->nodeValue,
                                        'recording_url'=>$recording_urlTag->item(0)->nodeValue,
                                        ]);  
                     /*   echo"<pre>";
                       print_r(array('method'=>$methodTag->item(0)->nodeValue,
                                     'class_id'=>$class_idTag->item(0)->nodeValue,
                                     'recording_url'=>$recording_urlTag->item(0)->nodeValue,
                                     //'presenter_email'=>$presenter_email=$presenter_emailTag->item(0)->nodeValue,
                                     'presenter_url'=>$presenter_urlTag->item(0)->nodeValue,
                            )); 
                     echo"</pre>";*/
                     
                     
                     //exit();
		}
		else if($attribNode=="fail")
		{
			$error=$objDOM->getElementsByTagName("error")->item(0);
   			echo "<br>errorcode=".$errorcode = $error->getAttribute("code");	
   			echo "<br>errormsg=".$errormsg = $error->getAttribute("msg");	
		}
	 }//end if	
   }//end function
	
}
?>