<?php
    require_once 'config_database.php';
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json");
    $request_body = file_get_contents('php://input');
    file_put_contents('log/logs', $request_body.PHP_EOL, FILE_APPEND);
    $data = json_decode($request_body,true);
    // $data['type']=1;
    $array = array();
    if( $data['type'] == null ) {
        $data['type'] = 4;
    }
    if($data['type']){
        $query = "SELECT `id`,`head`,`image`,`send_add`,`title` FROM `news` WHERE `send_add` > 0 AND `typestudent` = ".$data['type']." OR `typestudent` = 4 ORDER BY `news`.`send_add` DESC LIMIT 10";
        // echo $query;
        $reusult_test = mysqli_query($con,$query);
        while($row = mysqli_fetch_assoc($reusult_test)){
            array_push($array,$row);
        }
        exit(json_encode($array));
    }else{
        exit(json_encode(['state'=>0, 'msg'=>'erro']));
    }
