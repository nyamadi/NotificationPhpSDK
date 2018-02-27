<?php namespace Hubtel\Notification;
use NotificationService;
$payload=
'{
    "audience":{
            "email":[
            {
                "name":"Augustine",
                "email":"augustine@hubtel.com"
            }],
            "sms":[
                "2334353443",
                "2334543353"
                ]
    },
	"values":{}
        
}';

 $res=JobsApi::executeJob("w3324",json_decode($payload),"45456");



class JobsApi{

    public static function executeJob(
        $code,
        $payload,
		$apikey
    )
    {
    
        try{

            $notification_client = new NotificationService($code , $apikey);
            $response = $notification_client->execute($payload);
            
            if(!$notification_client->isSuccessful()){
                   echo "Error occured";
            }
            return $response;

        }catch(\Exception $e){
            echo $e->getMessage();
            return null;
        }
  
    }
  
}