<?php
session_start();
class AUTH{
    public function isPrivilege($name){
        $data = $this->get()[0];
        return isset($data->privilege)? $name==$data->privilege : false;
    }
    public function get(){
        return isset($_SESSION['auth'])?unserialize($_SESSION['auth']):null;
    }
}
$AUTH = new AUTH();