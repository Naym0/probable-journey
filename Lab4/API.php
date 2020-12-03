<?php
    header("Content-Type:application/json"); //id, name, email, number, address, points
    require_once 'connection.php';

    if (isset($_GET['s_id']) && $_GET['s_id']!="") {
        $s_id = $_GET['s_id'];
        $sql = "SELECT * FROM students WHERE id=$s_id";
        $result = $mysqli->query($sql);

        if(mysqli_num_rows($result)>0){
            $row = mysqli_fetch_array($result);
            $id = $row['id'];
            $name = $row['name'];
            $email = $row['email'];
            $number = $row['number'];
            $address = $row['address'];
            $points = $row['points'];
            response($id,$name,$email,$number,$address,$points);
            $mysqli->close();;
        }else{
            response(NULL, NULL, 200,"No Record Found");
        }
    }
    else{
        response(NULL, NULL, 400,"Invalid Request");
    }
    
    function response($id,$name,$email,$number,$address,$points){
        $response['id'] = $id;
        $response['name'] = $name;
        $response['email'] = $email;
        $response['number'] = $number;
        $response['address'] = $address;
        $response['points'] = $points;
        
        $json_response = json_encode($response);
        echo $json_response;
    }
?>