<!DOCTYPE html>
<html>
<head>
	<title>Add Agent</title>
	<link rel="icon" type="image" href="../assets/upnext.png">
	<link rel="stylesheet" type="text/css" href="../assets/css/index.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/Dtables.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../assets/font-awesome-4.1.0/css/font-awesome.min.css">
	<script src="../sweetalertjs/sweetalert.js"></script>
	<script src="jquery-1.9.1.min.js"></script>
  <script src="jquery-3.4.1.min.js"></script>
	<script src="Dtables.js"></script>
	<script src="bootstrap-datepicker.js"></script>
</head>
<style>
  .container{
    border: 1px solid;
  }
</style>
<body style="background-image: url('../xypher_admin/white.jpg');background-repeat: no-repeat; background-size: cover; ">
	<?php include'upnext_navbar.php';?>
<br><br><br>
<div class="container" style="padding-top: 22px; margin-top: 10px; background-color: #fff">
  		<table class="table table-borderless table-condensed" >
  	<tr>
  		<td><img src="concorp.png" width="300"></td>
  		<td style="padding-left: 200px;"><p>Unit 308 Sunrise Condominium, 226 Ortigas Ave.,<br>Greenhills, San Juan City, Philippines 1502<br>(02) 9782698 | (0917) 720 2698 | marketing@connextph.com</p><br></td>
  	</tr>
  </table>
  	<hr><br>
  	<center><h1>AGENT CONTRACT</h1></center>
      <form method="post" action="save_agent_connext.php">
  	<table class="table table-bordered">
  		<tr>
  			<td><input type="text" name="lname" placeholder="Enter Lastname" class="form-control" required=""></td>
  			<td><input type="text" name="fname" id="name" onblur="get_username();" placeholder="Enter Firstname" class="form-control" required=""></td>
  			<td colspan="8"><input type="text" name="mname" placeholder="Enter Middlename and Suffix" class="form-control" required=""></td>
  		</tr>
  		<tr>
  			<td colspan="12" style="background:url('yelow.png');"><b><center>PERMANENT ADDRESS</center></b></td>
  		</tr>
  		<tr>
  			<td><input type="text" name="h_unit" placeholder="Enter House/Unit No." class="form-control"></td>
  			<td colspan="2"><input type="text" name="streetname" class="form-control" placeholder="Enter Street Name"></td>
  			<td colspan="8"><input type="text" name="floor" class="form-control" placeholder="Enter FloorNo./ Building Name/ Subdivision Name"></td>
  		</tr>
  		<tr>
       
  			<td><input type="text" name="brgy" class="form-control" placeholder="Enter Barangay"></td>
  			<td><select name="city" class="form-control action" id="major_area">
       <option value="">--Select City--</option>   
        <?php 
          $host = "localhost"; 
          $user = "root"; 
          $password = ""; 
          $dbname = "db_connext"; 
          $con = mysqli_connect($host, $user, $password,$dbname);
          // Check connection
          if (!$con) {
           die("Connection failed: " . mysqli_connect_error());
          }
            $sql_department = "SELECT * FROM zipcodes GROUP BY major_area";
            $department_data = mysqli_query($con,$sql_department);
            while($row = mysqli_fetch_assoc($department_data) ){
                $departid = $row['id'];
                $depart_name = $row['major_area'];
                echo "<option value='".$depart_name."' >".$depart_name."</option>";
            }
            ?>
        </select></td>
  			<td>
          <select id="city" class="form-control action" name="province" >
            <option value="">--Select--</option>
          </select>
        </td>
  			<td colspan="8"><select id="zip_code" class="form-control action" name="zip" >
            <option value="">--Select--</option>
          </select>
  		</tr>
  		<tr>
  			<td colspan="12" style="background:url('yelow.png');"><b><center>PERSONAL AND CONTACT DETAILS</center></b></td>
  		</tr>
  		<tr>
  			<td style="background-color: gray"><b>TELEPHONE NO.</b></td>
  			<td colspan="9"><input type="text" name="Tel1" class="form-control" placeholder="Enter TELEPHONE NO."></td>
  		</tr>
  		<tr>
  			<td style="background-color: gray"><b>MOBILE NO.</b></td>
  			<td colspan="9"><input type="text" name="mob1" class="form-control" placeholder="Enter MOBILE NO."></td>
  		</tr>
  		<tr>
  			<td style="background-color: gray"><b>EMAIL ADDRESS</b></td>
  			<td colspan="9"><input type="text" name="email" class="form-control" placeholder="Enter EMAIL ADDRESS"></td>
  		</tr>
  		<tr>
  			<td style="background-color: gray"><b>DATE OF BIRTH</b></td>
  			<td ><select name="DOBMonth" class="form-control">
            <option value="">- Month -</option>
            <option value="January">January</option>
            <option value="Febuary">Febuary</option>
            <option value="March">March</option>
            <option value="April">April</option>
            <option value="May">May</option>
            <option value="June">June</option>
            <option value="July">July</option>
            <option value="August">August</option>
            <option value="September">September</option>
            <option value="October">October</option>
            <option value="November">November</option>
            <option value="December">December</option>
            </select>
          </td>
  			<td > <select name="day" class="form-control">
          <option value="">- Day -</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
          <option value="7">7</option>
          <option value="8">8</option>
          <option value="9">9</option>
          <option value="10">10</option>
          <option value="11">11</option>
          <option value="12">12</option>
          <option value="13">13</option>
          <option value="14">14</option>
          <option value="15">15</option>
          <option value="16">16</option>
          <option value="17">17</option>
          <option value="18">18</option>
          <option value="19">19</option>
          <option value="20">20</option>
          <option value="21">21</option>
          <option value="22">22</option>
          <option value="23">23</option>
          <option value="24">24</option>
          <option value="25">25</option>
          <option value="26">26</option>
          <option value="27">27</option>
          <option value="28">28</option>
          <option value="29">29</option>
          <option value="30">30</option>
          <option value="31">31</option>
     </select></td>
  			<td ><select id="year" name="taon" class="form-control">
       <option value="">- Year -</option>   
        </select></td>
  			<td colspan="2" style="background-color: gray"><b>AGE</b></td>
  			<td colspan="2"><input type="number" class="form-control" name="age" placeholder="Enter Age"></td>
  		</tr>

  		<tr>
  			<td colspan="12" style="background:url('yelow.png');"><b><center>CHARACTER REFERENCE</center></b></td>
  		</tr>
  		<tr>
  			<td style="background-color: gray"><b>COMPLETE NAME</b></td>
  			<td colspan="9"><input type="text" class="form-control" name="complete_name" placeholder="Enter COMPLETE Name"></td>
  		</tr>
  		<tr>
  			<td style="background-color: gray"><b>TELEPHONE NO.</b></td>
  			<td colspan="9"><input type="text" class="form-control" name="tel2" placeholder="Enter TELEPHONE No."></td>
  		</tr>
  		<tr>
  			<td style="background-color: gray"><b>MOBILE NO.</b></td>
  			<td colspan="9"><input type="text" class="form-control" name="mob2" placeholder="Enter MOBILE No."></td>
  		</tr>
  	</table>
  	<table class="table table-bordered">
  		<tr>
  			<td style="background-color: gray"><i>What is your primary source of clients ?</i></td>
  			<td colspan="9"><input type="text" class="form-control" name="client" placeholder="(i.e. Area of Residence, personal network, Facebook, etc. For other areas, please specify.)"></td>
  		</tr>
  	</table>
  
  	<table class="table table-bordered table-condensed" >
  		<tr>
  			<td colspan="12" style="background:url('yelow.png');"><b><center>FOR CONNEXT USE ONLY</center></b></td>
  		</tr>
  		<tr>
  			<td style="background-color: gray"><b>AUB ATM NO.</b></td>
  			<td colspan="9"><input type="text" name="aub" class="form-control" placeholder="Enter AUB ATM NO."></td>
  		</tr>
  		<tr>
  			<td style="background-color: gray"><b>AUB ACCOUNT NO.</b></td>
  			<td colspan="9"><input type="text" class="form-control" name="aub_acct" placeholder="Enter AUB ACCOUNT NO."></td>
  		</tr>
  		<tr>
  			<td style="background-color: gray"><b>PROGRAM</b></td>
  			<td ><input type="number" min="0" step="0.1" class="form-control" name="prog" placeholder="Enter PROGRAM"></td>
  			<td colspan="2" style="background-color: gray"><b>SOURCE CODE</b></td>
  			<td colspan="2"><input type="text" class="form-control" name="source" placeholder="Enter SOURCE CODE"></td>
  		</tr>
      <tr>
        <td style="background-color: gray"><b>PROGRAM_TNVS</b></td>
        <td colspan="9"><input type="number" min="0" step="0.1" class="form-control" name="prog_tnvs" placeholder="Enter PROGRAM"></td>
      </tr>
  		<tr>
  			<td style="background-color: gray"><b>BRANCH ASSIGNED</b></td>
  			<td ><input type="text" class="form-control" name="branch" placeholder="Enter BRANCH ASSIGNED"></td>
  			<td colspan="2" style="background-color: gray"><b>ENDORESED BY</b></td>
  			<td colspan="2"><input type="text" class="form-control" name="endorse" placeholder="ENDORESED BY"></td>
  		</tr>
  		<tr>
  			<td style="background-color: gray"><b>Remarks</b></td>
  			<td colspan="9"><input type="text" class="form-control" name="remarks" placeholder="REMARKS"></td>
  		</tr>
  	</table>
  	<table class="table table-bordered table-condensed" >
  		<tr>
  			<td colspan="12" style="background:url('yelow.png');"><b><center>APPROVAL</center></b></td>
  		</tr>
  		<tr>
  			<td style="background-color: gray"><b>NAME OF APPROVER</b></td>
  			<td colspan="9"><input type="text" class="form-control" name="approver" placeholder="NAME OF APPROVER"></td>
  		</tr>
  		<tr>
  			<td style="background-color: gray"><b>SIGNATURE OF APPROVER</b></td>
  			<td colspan="9"><input type="text" class="form-control" disabled=""></td>
  		</tr>
  		<tr>
  			<td style="background-color: gray"><b>DATE APPROVED</b></td>
  			<td colspan="9"><input type="text" class="form-control" id="datepicker" autocomplete="off" name="date_app" placeholder="DATE APPROVAL"><input type="hidden"   name="username" value="<?php  echo $_SESSION['new_name'];?>"><input type="hidden" name="password">
          <p  ></p></td>
  		</tr>
  	</table>
  	<button style="margin-left: 500px;" class="btn btn-primary" type="submit" id="insert" name="insert"><span class="fa fa-user"></span> ADD AGENT</button>
   <button style="margin-left: 10px;" class="btn btn-danger" type="button" id="cancel"><span class="fa fa-times"></span> CANCEL</button>
  	</form>
  	<br><br>
  	<br>
  </div>
  </body>
  <script>for(var i=1980; i<= 2025; i++){
  var x = "<option>" + i + "</option>";
  document.getElementById("year").innerHTML += x;
}
$( function() {
  $( "#datepicker" ).datepicker({
    dateFormat: "dd-mm-yy"
    , duration: "fast"
  });
} );
</script>
 <script>
  $(document).ready(function(){
 $('.action').change(function(){
  if($(this).val() != '')
  {
    var major_area = $("#major_area").val();
   var action = $(this).attr("id");
   var query = $(this).val();
   var result = '';
   if(action == "major_area")
   {
    result = 'city';
   }
   else
   {
    result = 'zip_code';
   }
   $.ajax({
    url:"get_zipcode.php",
    method:"POST",
    data:{action:action, query:query,major_area:major_area},
    success:function(data){
     $('#'+result).html(data);
    }
   })
  }
 });
});
</script>
<script>
  function get_username()
{
 var name=$('#name').val();
 if(name!="")
 {
  $.ajax
  ({
   type:'post',
   url:'save_agent_query.php',
   data:{
    get_username:name
   },
   success:function(response) 
   {
    
    $('#username').html(response);
    $("#username_value").val(response);
   }
  });
 }
}
</script>
</script>
<script>
    document.getElementById('cancel').onclick = 
    function(){
        swal("Are you sure you want to CANCEL ?","", "warning", {
            buttons: ["No", "Yes"],
        }).then(okay => {
          if (okay) {
              
          window.location.href = "choose.php";
          }
      });
    }
</script>  
<br>
<br>      
  </html>