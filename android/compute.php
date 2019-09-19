<?php
include_once 'DbConnect.php';
$con = connect_db();

if(isset($_POST['MAKE']))
{
    
    $make = $_POST['MAKE'];
    $var = $_POST['VARIANT'];
    $model = $_POST['MODEL'];
    $rbi1 = $_POST['rbi'];
    $rpd1 = $_POST['rpd'];
    $year = $_POST['YM'];
    $color = $_POST['COLOR'];
    $aog = $_POST['AOG'];
    $fmv = $_POST['FMV'];
    $trans = $_POST['TRANS'];
    $name = $_POST['name'];
    $markup = $_POST['markup'];
    $rbi = str_replace( ',', '', $rbi1 );
    
    $rpd = str_replace( ',', '', $rpd1 );
    $result = mysqli_query($con,"SELECT * FROM rate WHERE rate = $rbi AND cat_id='1'");
    while($row = mysqli_fetch_array($result))
    {
        $ratebi = $row['rbi'];
    }
    $result = mysqli_query($con,"SELECT * FROM rate WHERE rate = $rpd AND cat_id='1'");
    while($row = mysqli_fetch_array($result))
    {
        $ratepd = $row['rpd'];
    }
    $result = mysqli_query($con,"SELECT * FROM afmv WHERE MAKE='".$make."' AND MODEL='".$model."' AND VARIANT='".$var."' AND YM='".$year."' AND COLOR='$color' AND TRANS='$trans' ");
    while($row = mysqli_fetch_array($result))
    {
        $BT = $row['BT'];
    }
    if($BT=='SEDAN' || $BT =='HATCHBACK')
    {
        $aon = 0.5/100;
    }
    else
    {
        $aon = 0.3/100;
    }
    if($aog=='NO')
    {
        $aon=0;
    }
    $aog1 = $aon*$fmv;
    $ld = $fmv*0.0125;
    $prem = $ld+$aog1+$ratebi+$ratepd;
    $dst = $prem*(12.5/100);
    $evat = $prem * (12/100);
    $lgt = $prem * (0.2/100);
    $gross = $prem+$dst+$evat+$lgt;
    $m3 = $gross/3;
    $m6 = $gross/6;
    $response = array();
    $today = date("Ymd");
    $rand = strtoupper(substr(uniqid(sha1(time())),0,4));
    $gross = $gross + $markup;
    $unique = $today . $rand;

    //while($row = mysqli_fetch_array($result))
    //{
    	array_push($response,array("MAKE"=>$make,"VAR"=>$var,"MODEL"=>$model,"YM"=>$year,"COLOR"=>$color,"rbi"=>"₱".$rbi1.".00","rpd"=>"₱".$rpd1.".00","BT"=>$BT,"TRANS"=>$trans,"FMV"=>"₱".number_format($fmv,2),"AOG"=>"₱".number_format($aog1,2),"GROSS"=>"₱".number_format($gross,2),"M3"=>"₱".number_format($m3,2),"M6"=>"₱".number_format($m6,2),"ref"=>$unique,"name"=>$name,"mark"=>$markup));
    	
    //}
    
    echo json_encode(array("server_response"=>$response));
    
}

else if(isset($_POST['BRAND']))
{
    $var=$_POST['VARIANT'];
    $brand=$_POST['BRAND'];
    $color=$_POST['COLOR'];
    $trans=$_POST['TRANS'];
    $model=$_POST['MODEL'];
    $name=$_POST['name'];
    $ref=$_POST['REF'];
    $fmv=$_POST['FMV'];
    $aog=$_POST['AOG'];
    $ym= $_POST['YM'];
    $gross = $_POST['GROSS'];
    $rbi = $_POST['RBI'];
    $rpd = $_POST['RPD'];
    $mark = $_POST['MARK'];
    $response = array();
    $result = mysqli_query($con,"SELECT * FROM afmv WHERE MAKE='".$brand."' AND MODEL='".$model."' AND VARIANT='".$var."' AND COLOR='".$color."' AND TRANS='".$trans."' AND YM='".$ym."'");
    while($row = mysqli_fetch_array($result))
    {
        $fmv_id = $row['fmv_id'];
    }
    
    $result = mysqli_query($con,"INSERT INTO user_quotes ( `tracking_no`, `aog`, `gross`, `fmv_id`, `rbi`, `rpd`, `client_name`, `markup`) VALUES ('".$ref."','".$aog."','".$gross."','".$fmv_id."','".$rbi."','".$rpd."','".$name."','".$mark."')");
    if($result)
    {
    array_push($response,array("ref"=>$ref,"aog"=>$aog,"gross"=>$gross,"fmv"=>$fmv_id,"rbi"=>$rbi,"rpd"=>$rpd,"name"=>$name,"mark"=>$mark));
    echo json_encode(array("server_response"=>$response));
    
    }
    else
    {
    echo "INSERT INTO user_quotes VALUES ('','".$ref."','".$aog."','".$gross."','".$fmv_id."','".$rbi."','".$rpd."','".$name."','".$mark."')";
    
    }
    
}

?>
