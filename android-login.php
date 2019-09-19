<?php
 include 'connection.php';
 $con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);
 $email = $_POST['email'];
 $password = $_POST['password'];
 $response = array();
 $result = mysqli_query($con,"SELECT * FROM agent_list_tb WHERE username='".$email."' AND password='".$password."' ");
    
 $num_rows = mysqli_num_rows($result);
 if ($num_rows > 0) {
 while($row = mysqli_fetch_array($result))
    {
        $lname = $row['lastname'];
        $fname = $row['firstname'];
        $mname = $row['middlename_suffix'];
        $rate = $row['program'];
        $rate1 = $row['program_tnvs'];
        $id = $row['id'];
        $status = $row['status'];
        array_push($response,array("lname"=>$lname,"fname"=>$fname,"mname"=>$mname,"rate"=>$rate,"id"=>$id,"status"=>$status,"rate1"=>$rate1));
    }
     if($status=='Inactive'){
        $output = (1);
        json_encode($output);
        echo json_encode($output);
    }
    else{
        echo json_encode(array("server_response"=>$response));
    }   
}
else {
   $output = (2);
    json_encode($output);
    echo json_encode($output);
}
mysqli_close($con);