<?php
    require_once 'config_database.php';
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json");
    $request_body = file_get_contents('php://input');
    file_put_contents('log/logs', $request_body.PHP_EOL, FILE_APPEND);
    $data = json_decode($request_body,true);
    
    if(empty($data['id'])&&empty($data['NotiToken'])){
        exit(json_encode(['state'=>0, 'msg'=> 'miss']));
    }else{
        $string = mysqli_real_escape_string($con,$data['NotiToken']);
        if($string == ''){
            $update_status = "UPDATE `students` SET `notification_token`=  null WHERE `id` = ".$data['id'];
        }else{
            $update_status = "UPDATE `students` SET `notification_token`=  '".$string."' WHERE `id` = ".$data['id'];
        }
        
        file_put_contents('log/logs', $update_status.PHP_EOL, FILE_APPEND);
        mysqli_query($con,$update_status);
        exit(json_encode(['state'=>1, 'msg'=> 'success']));
    }