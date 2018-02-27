<?php namespace HubtelNotification;
use  Hubtel\Notification\NotificationService;

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