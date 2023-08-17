<?php

define('FILEDIR','./apis/session.snx');
class AdminSessionHandler 
{
    private $id;
    private $expiry;
    private $start;
    private $fileDirectory = "./apis/session.snx";
    private $errors = array();
    private function CreateSessionParameters () {
        if($this->CheckSessionPresence() || $this->checkSessionLoad()){
            return json_encode(array("result"=>false));
        }
        $file = fopen($this->fileDirectory,'w');
        $variables = array(
            'session_start' => time(),
            'session_expiry' => time()+(84600 * 30),
            'sessionID'=>uniqid()
        );
        fwrite($file,json_encode($variables));
        fclose($file);
        
        return json_encode($variables);
        
    }
    
    function CheckSessionPresence() { 
        if(file_exists($this->fileDirectory)){
            return true;
        }
        else {return false;}
    }
    private function LoadSessionIntoRuntime() {

        if ($this->CheckSessionPresence()){
            $file = json_decode(file_get_contents(FILEDIR),true);
            $this->id = $file['sessionID'];
            $this->start = $file['session_start'];
            $this->expiry = $file['session_expiry'];
            return true;
        }
        return false;
    }

    function checkSessionLoad(){
        if (!isset($this->id) || !isset($this->start) || !isset($this->expiry)) {
            return false;
        } else { return true; }
    }

    function CheckValidtySession(){
        if(!$this->checkSessionLoad()){
            return false;
        }
        $curtime = time();
        if ($curtime >= $this->start && $curtime <= $this->expiry ){
            return true;
        } else {
            return false;
        }
    }

    function ReturnID(){
        if($this->checkSessionLoad() && $this->CheckValidtySession()){
            return $this->id;
        } return false;
    }

    private function DestroySessionParameters () {
        if ($this->CheckSessionPresence()){
            if(unlink($this->fileDirectory)){
                return true;
            }
            return false;
        }
        return false;
    }   
    function Login(){
        $this->CreateSessionParameters();
        $this->LoadSessionIntoRuntime();
        if($this->checkSessionLoad()){
            return true;
        } else { return false;}
    }
    function Logout(){
        if($this->DestroySessionParameters()){
            return true;
        } else {
            return false;
        }
    }

    function verifySessionKey($sessionKey){
        if ($sessionKey == $this->id){
            return true;
        } else { return false; }

    }

    function __construct()
    {
        if($this->CheckSessionPresence()){
            $this->LoadSessionIntoRuntime();
        }
    }
}

?>