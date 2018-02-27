<?php 
require "../vendor/autoload.php";
use  Hubtel\Notification\JobsApi;



$jobcode="w3324";

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
	"values":{
        
    }
        
}';

$apikey="45456";

$res=JobsApi::executeJob($jobcode,json_decode($payload),$apikey);