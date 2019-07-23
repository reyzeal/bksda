<?php
/**
 * Code by Reyzeal
 * Jumat, 19 Juli 2019
 *
 * module checking Session Login
 */
session_start();
if(isset($_SESSION['login_status']) && $_SESSION['login_status']){

}else{
    header('Location: ../../pengunjung');
}
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
class Flash{
    public function success($msg){
        $_SESSION['message'] = [
            'type' => 'success',
            'message' => $msg
        ];
    }
    public function error($msg){
        $_SESSION['message'] = [
            'type' => 'error',
            'message' => $msg
        ];
    }
}
$FLASH = new Flash();