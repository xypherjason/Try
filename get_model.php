<?php
include_once 'dbcon.php';
if(isset($_GET['MODEL']))
{
function getModel(){
   $con = connect_db();
   $response = array();
    $response["model"] = array();
	$model=$_GET['MODEL'];
    // Mysql select query
    $result = mysqli_query($con,"SELECT * FROM `afmv` WHERE MAKE = '$model' GROUP BY MODEL");
    while($row = mysqli_fetch_array($result)){
        // temporary array to create single category
        $tmp = array();
        $tmp["model"] = $row["MODEL"];
         
        // push category to final json array
        array_push($response["model"], $tmp);
    }
     
    // keeping response header to json
    header('Content-Type: application/json');
     
    // echoing json result
    echo json_encode($response);
}

getModel();
}
if(isset($_GET['VARIANT'])){
if($_GET['VARIANT'] == 'SelectModel')
{
    
}
else
{
function getVariant(){
    $conn = connect_db();
    $var_response = array();
    $var_response["variant"] = array();
   
    $variant = $_GET['VARIANT'];

     $query = mysqli_query($conn,"SELECT VARIANT FROM `afmv` WHERE MODEL = '$variant'  GROUP BY VARIANT");

    while ($rows = mysqli_fetch_array($query)) {
        $temp = array();
        $temp["variant"] = $rows["VARIANT"];

        array_push($var_response["variant"], $temp);
    }
    echo json_encode($var_response);
 }
getVariant();
}
}

if(isset($_GET['YM'])){
if($_GET['YM'] == 'SelectModel')
{
    
}
else
{
function getYm(){
    $conn = connect_db();
    $yr_response = array();
    $yr_response["year"] = array();
   
     
    $vr = $_GET['YM'];
    $m = $_GET['MODEL1'];
    $mk = $_GET['MAKE1'];

     $query = mysqli_query($conn,"SELECT YM FROM `afmv` WHERE MODEL = '$m' and MAKE = '$mk' and VARIANT = '$vr' GROUP BY YM ");

    while ($rows = mysqli_fetch_array($query)) {
        $temp = array();
        $temp["year"] = $rows["YM"];

        array_push($yr_response["year"], $temp);
    }
    echo json_encode($yr_response);
 }
getYm();
}
}

if (isset($_GET['TRANS2'])) {
   if($_GET['TRANS2'] == 'SelectModel')
{
    
}
else{
    function getTrans(){
        $conn = connect_db();
        $res = array();
        $trans_res['transmission'] = array();

        $yr = $_GET['YM2'];
        $vr = $_GET['TRANS2'];
        $m = $_GET['MODEL2'];
        $mk = $_GET['MAKE2'];

        $query = mysqli_query($conn,"SELECT TRANS FROM `afmv` WHERE MODEL = '$m' and MAKE = '$mk' and VARIANT = '$vr' and YM = '$yr' ");

        while ($rows = mysqli_fetch_array($query)) {
            $temp = array();
            $temp["transmission"] = $rows["TRANS"];
            array_push($trans_res["transmission"], $temp);
        }
            echo json_encode($trans_res);
    }
            getTrans();
}
}



if (isset($_GET['COLOR3'])) {
   if($_GET['COLOR3'] == 'SelectModel')
{
    
}
else{
    function getColor(){
        $conn = connect_db();
        $ress = array();
        $color_res['color'] = array();

        $yr = $_GET['YM3'];
        $vr = $_GET['COLOR3'];
        $m = $_GET['MODEL3'];
        $mk = $_GET['MAKE3'];
        $trns = $_GET['TRANS3'];

        $query = mysqli_query($conn,"SELECT COLOR FROM `afmv` WHERE MODEL = '$m' and MAKE = '$mk' and VARIANT = '$vr' and YM = '$yr' and TRANS = '$trns' GROUP BY COLOR ");

        while ($rows = mysqli_fetch_array($query)) {
            
                 $temp = array();
                 $temp["color"] = $rows["COLOR"];
                 array_push($color_res["color"], $temp);
            
             
        }
           echo json_encode($color_res);
    }
            getColor();
}
}


if (isset($_GET['FMV4'])) {
   if($_GET['FMV4'] == 'SelectModel')
{
    
}
else{
    function getFMV(){
        $conn = connect_db();
        $fmvress = array();
        $fmv_res['fmv'] = array();

        $yr = $_GET['YM4'];
        $vr = $_GET['FMV4'];
        $m = $_GET['MODEL4'];
        $mk = $_GET['MAKE4'];
        $trns = $_GET['TRANS4'];
        $clrs = $_GET['COLOR4'];
        $of = $_GET['OF4'];
        
        $query = mysqli_query($conn,"SELECT FMV FROM `afmv` WHERE MODEL = '$m' and MAKE = '$mk' and VARIANT = '$vr' and YM = '$yr' and TRANS = '$trns' and COLOR = '$clrs' and OF = '$of' GROUP BY FMV ");

        while ($rows = mysqli_fetch_array($query)) {
            $temp = array();
            $temp["fmv"] = $rows["FMV"];
            array_push($fmv_res["fmv"], $temp);
        }
            echo json_encode($fmv_res);
    }
            getFMV();
}
}

if (isset($_GET['OF'])) {
   if($_GET['OF'] == 'SelectModel')
{
    
}
else{
    function getOF(){
        $conn = connect_db();
        $ress = array();
        $of_res['OF'] = array();

        $yr = $_GET['YM6'];
        $vr = $_GET['OF'];
        $m = $_GET['MODEL6'];
        $mk = $_GET['MAKE6'];
        $trns = $_GET['TRANS6'];
        $color = $_GET['COLOR6'];

        $query = mysqli_query($conn,"SELECT OF FROM `afmv` WHERE MODEL = '$m' and MAKE = '$mk' and VARIANT = '$vr' and YM = '$yr' and TRANS = '$trns' and COLOR='$color' GROUP BY OF ");

        while ($rows = mysqli_fetch_array($query)) {
            
                 $temp = array();
                 $temp["OF"] = $rows["OF"];
                 array_push($of_res["OF"], $temp);
            
            
        }
            echo json_encode($of_res);
    }
            getOF();
}
}

?>
