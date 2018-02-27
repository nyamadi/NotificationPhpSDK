<?php namespace Hubtel\Notification;

class NotificationService{
  private static $BASE_URL = "http://localhost:7755/jobs";
  public $apikey =  '';
  private static $client = null;

  private $status = null;

  function __construct($code , $apikey){
        $this->headers = ['Content-Type' => 'application/json' , 'apikey' => $apikey];
        $this->url = self::$BASE_URL."/$code/execute";
        self::$client = new \GuzzleHttp\Client();
  }
    private function post($body)
    {
        $response = self::$client->post($this->url , ['body'=> json_encode($body),'headers'=> $this->headers ]);
        $this->status = $response->getStatusCode();
        return $response->getBody();
    }

    public function execute($body)
    {
        return $this->post($body);
    }

    public function isSuccessful(){
        return $this->status == 200;
    }
}