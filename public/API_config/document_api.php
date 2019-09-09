<?php
    require_once 'config_database.php';
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json");
    $request_body = file_get_contents('php://input');
    file_put_contents('log/logs', $request_body.PHP_EOL, FILE_APPEND);
    $data = json_decode($request_body,true);
    if(empty($data['id'])){
        exit(json_encode(['msg'=> 'miss']));
    }else{
        $count = "SELECT COUNT(`doc1`) as count FROM `documents` WHERE `student` = ".$data['id'];
        $reusult_count = mysqli_query($con,$count);
        
        $count_fetch = mysqli_fetch_assoc($reusult_count);
        
        if($count_fetch['count'] > 0) {
            $query = "SELECT `doc1`, `doc2`, `doc3`, `doc4`, `confrim` FROM `documents` WHERE `student` = ".$data['id'];
            $reusult_test = mysqli_query($con,$query);
            $result_show = mysqli_fetch_assoc($reusult_test);
            exit(json_encode($result_show));
        }else { 
            $arr = [
                'doc1' => 2,
                'doc2' => 2,
                'doc3' => 2,
                'doc4' => 2,
                'confrim' => 2,
            ];
            exit(json_encode($arr));
        }
        
    }
