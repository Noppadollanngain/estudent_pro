<?php
    require_once 'config_database.php';
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json");
    $request_body = file_get_contents('php://input');
    file_put_contents('log/logs', $request_body.PHP_EOL, FILE_APPEND);
    $data = json_decode($request_body,true);    
    //$data['id']=1;
    if($data['newsid']){
        $query = "SELECT `head`,`body`,`image`,`linkdownload`,`send_add` FROM `news` WHERE `id` = ".$data['newsid'];
        $reusult_test = mysqli_query($con,$query);
        $row = mysqli_fetch_assoc($reusult_test);
        exit(json_encode($row));
    }else{
        exit(json_encode(['state'=>0, 'msg'=>'erro']));
    }