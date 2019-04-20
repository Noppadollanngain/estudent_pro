<?php
    require_once 'config_database.php';
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json");
    $request_body = file_get_contents('php://input');
    file_put_contents('log/logs', $request_body.PHP_EOL, FILE_APPEND);
    $data = json_decode($request_body,true);
    $data['id'] = 92;
    if(empty($data['id'])){
        exit(json_encode(['msg'=> 'miss']));
    }else{
        $query = "SELECT `doc1`, `doc2`, `doc3`, `confrim` FROM `documents` WHERE `id` = ".$data['id'];
        $reusult_test = mysqli_query($con,$query);
        $result_show = mysqli_fetch_assoc($reusult_test);
        echo $query;
        exit(json_encode($result_show));
    }
