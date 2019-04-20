<?php
    require_once 'config_database.php';
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json");
    $request_body = file_get_contents('php://input');
    file_put_contents('log/logs', $request_body.PHP_EOL, FILE_APPEND);
    $data = json_decode($request_body,true);
    
    $data['username'] = '59544401061-4';
    $data['password'] = '1509970034069';
     
    $query_1 = "SELECT COUNT(`stdId`) FROM `students` WHERE `stdId` = '".$data['username']."'";
    $result_1 = mysqli_fetch_array(mysqli_query($con,$query_1));
    
    if( $result_1[0] == 0){
        exit(json_encode(['state'=>0, 'msg'=> 'miss']));
    }else{
        $query_2 = "SELECT COUNT(`stdId`) FROM `students` WHERE `stdId` = '".$data['username']."' AND `peopleId` = '".$data['password']."'";
        $result_2 =  mysqli_fetch_array(mysqli_query($con,$query_2));
        if( $result_2[0]==0){
            exit(json_encode(['state'=>0, 'msg'=>'erro']));
        }else{
            $data_show = "select * from students left join documents on documents.student = students.id where  students.stdId = '".$data['username']."' and students.peopleId = '".$data['password']."'";
            $reusult_test = mysqli_query($con,$data_show);
            $result_show = mysqli_fetch_assoc($reusult_test);
            echo $data_show;

            if($result_show['loginstatus']){
//                 exit(json_encode(['state'=>0, 'msg'=>'login already']));
                exit(json_encode($result_show));
            }else{
                $update_status = 'UPDATE `students` SET `loginstatus`=  1 WHERE `stdId` = "'.$data['username'].'" AND `peopleId` = "'.$data['password'].'"';
                mysqli_query($con,$update_status);
                $result_show['state'] = 1;
                exit(json_encode($result_show));
            }
        }
    }
