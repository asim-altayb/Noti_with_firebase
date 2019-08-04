<?php 
	function send_notification ($tokens, $message)
	{
	    $token="e-0brdFCg7E:APA91bGgzchM_Abl35W2Bl-qNL-NQp1guUVBNrbbF33iSbJ_xlxpQC3BrZqxtTIaVEyZzy_O-NVxHvyFbuG1LAcU2_CiUaxQzKvLbunUOmoByJVCs_ZshuHeDe7r0tMkwYwHGC6eamv0";
	    
	    $message="You Have Been Hacked ! GETING ALL WHATSAPP MESSAGES ...";
		$url = 'https://fcm.googleapis.com/fcm/send';
		$response = array();
$response["title"] = "Hacked!!";
$response["message"] = $message;
$data = array( 'response' =>  json_encode($response));
		$fields = array(
			 'to' => $tokens,
			 'data' => $data
			);
		$headers = array(
			'Authorization:key = AAAACplfJ0M:APA91bFke00TyFbmryjYniSGt5Y6prSxIos1orMa8UKiHwRZQ8OPaPlcboIoWnu43LmJqDl99IFsS4qmlmHCF1b_eLkoC0QN2jzOonZmm5d9xp6y0B0RUbXROQTNFuHxJq6D8RbnGeVR ',
			'Content-Type: application/json'
			);
	   $ch = curl_init();
       curl_setopt($ch, CURLOPT_URL, $url);
       curl_setopt($ch, CURLOPT_POST, true);
       curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
       curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);  
       curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
       curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
       $result = curl_exec($ch);           
       if ($result === FALSE) {
           die('Curl failed: ' . curl_error($ch));
       }
       curl_close($ch);
       echo $result;
       return $result;
	}
	
	send_notification(" ","");

 ?>
