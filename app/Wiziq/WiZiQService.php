<?php
/*
$access_key="AUyPy7LRsxM=";
$secretAcessKey="B4j6AQr5CfxMOuR83vFTAQ==";
$webServiceUrl="http://classapi.wiziqxt.com/apimanager.ashx";
*/
define ('access_key', 'AUyPy7LRsxM=');
define ('secretAcessKey', 'B4j6AQr5CfxMOuR83vFTAQ==');
define ('webServiceUrl', 'http://classapi.wiziqxt.com/apimanager.ashx');
		
 function WiziqCreate($presenter_id,$presenter_name,$start_time,$title,$duration,$id)
 {
  require_once("create.php");
  $obj=new ScheduleClass(secretAcessKey,access_key,webServiceUrl,$presenter_id,$presenter_name,$start_time,$title,$duration,$id);
  return $obj;	       // echo'<pre/>';
               // print_r($obj);   
 }
 function WiziqCreate2($presenter_id,$presenter_name,$start_time,$title,$duration,$id)
 {
  require_once("create_multiple.php");
  $obj=new ScheduleClass(secretAcessKey,access_key,webServiceUrl,$presenter_id,$presenter_name,$start_time,$title,$duration,$id);
  return $obj;	       // echo'<pre/>';
               // print_r($obj);   
 }
 
 function WiziqAddAttendee($class_id,$attendee,$id)
 {    
     
    require_once("AddAttendee.php");
    $obj=new AddAttendee(secretAcessKey,access_key,webServiceUrl,$class_id,$attendee,$id);
    return $obj;		//echo'<pre/>';
               // print_r($obj); 	       // echo'<pre/>';
               // print_r($obj);   
 }
 function WiziqAddAttendee2($class_id,$attendee,$id)
 {    
     
    require_once("AddAttendee_multiple.php");
    $obj=new AddAttendee(secretAcessKey,access_key,webServiceUrl,$class_id,$attendee,$id);
    return $obj;		//echo'<pre/>';
               // print_r($obj); 	       // echo'<pre/>';
               // print_r($obj);   
 }
		
		//require_once("create.php");
		//$obj=new ScheduleClass($secretAcessKey,$access_key,$webServiceUrl);
	       // echo'<pre/>';
               // print_r($obj);
               // 
               // 
		//require_once("ModifyClass.php");
		//$obj=new ModifyClass($secretAcessKey,$access_key,$webServiceUrl);
		
		//require_once("AddAttendee.php");
		//$obj=new AddAttendee($secretAcessKey,$access_key,$webServiceUrl);
		//echo'<pre/>';
               // print_r($obj);  
                 
		//require_once("CancelClass.php");
		//$obj=new CancelClass($secretAcessKey,$access_key,$webServiceUrl);

		
		//require_once("DownloadRecording.php");
		/*$obj = new DownloadRecording($secretAcessKey, $access_key, $webServiceUrl);
		 In the above download recording output xml there is a <status_xml_path> i.e. http://wiziq.com/download/1234.xml
		   this xml would contain all the necessary status for the recording download
		   e.g -:
		   <rsp status='ok'>
		   <method>download_recording</method>
		   <download_recording status='true'>
		   <download_status>false</download_status>
		   <message>Download Recording has been started..</message>
		   <recording_download_path>http://wiziq.com/download/recording_9195.exe</recording_download_path>
		   </download_recording>
		   </rsp>
		   Actual recording file path will be the value of node <recording_download_path> obtained by requesting above xml
		 */
?>