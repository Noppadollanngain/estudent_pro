<?php
    require_once 'config_database.php';
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json");
    $request_body = file_get_contents('php://input');
    file_put_contents('log/logs', $request_body.PHP_EOL, FILE_APPEND);
    $data = json_decode($request_body,true);
    /*
    $data['id'] = 1;
    */
    if(empty($data['id'])){
        exit(json_encode(['state'=>0, 'msg'=> 'miss']));
    }else{
        $update_status = 'UPDATE `students` SET `loginstatus`=  0 , `notification_token` = null WHERE `id` = '.$data['id'];
        mysqli_query($con,$update_status);
        exit(json_encode(['state'=>1, 'msg'=> 'success']));
    }