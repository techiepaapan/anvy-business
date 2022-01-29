<?php 
 
class Push {
    //notification title
    private $title;
 
    //notification message 
    private $message;
 
    //notification image url 
    private $image;

//Product ID
    private $id;
 
    //initializing values in this constructor
    function __construct($title, $message,$id,$image) {
         $this->title = $title;
         $this->message = $message; 
         $this->image = $image; 
	$this->id = $id; 
    }
    
    //getting the push notification
    public function getPush() {
        $res = array();
        $res['data']['title'] = $this->title;
        $res['data']['message'] = $this->message;
        $res['data']['image'] = $this->image;
	$res['data']['id'] = $this->id;
 	
        return $res;
    }
 
}
