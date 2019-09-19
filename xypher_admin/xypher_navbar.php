
<nav class="navbar-default navbar-fixed-top navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <img src="logo.png"  height="60" class="active" style="padding-left: 10px; padding-bottom: 8px; padding-top: 5px; background-color:   #fff; max-width: 100%">         
    </div>    
    <ul class="nav navbar-nav navbar-right" style="padding-top: 5px; padding-right: 10px;">
      <li><a href="index.php" style="font-size: 15px;  color:  #FDC30F;"><i class="fa fa-home"></i> <b>Home</b></a></li>  
      <li class="dropdown">
       <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:  #FDC30F;"><span class="label label-pill label-danger count" style="border-radius:10px;"></span> <span class="glyphicon glyphicon-bell" style="font-size:18px;"></span></a>
<style>
  .dropdown-menu{
overflow-y: scroll;
height: 250px;
  }
</style>
       <ul class="dropdown-menu" aria-labelledby="dLabel">
       </ul>

      </li>
       <!-- <li><a href="#" style="font-size: 15px;  color:    #FDC30F;"><b>Notification</b> <i class="fa fa-bell"></i><span class="label label-danger" style="background-color: red;">1</span></a></li> --> 
       <li><a href="#" style="font-size: 15px;  color:#FDC30F;"><i class="fa fa-money"></i> <b>Billing</b></a></li> 
      <li><a href="logout.php" style="font-size: 15px;  color:#FDC30F;"><i class="fa fa-power-off"></i> <b>Logout</b></a></li>       
    </ul>
  </div>
</nav>
<script>
$(document).ready(function(){
 
 function load_unseen_notification(view = '')
 {
  $.ajax({
   url:"fetch.php",
   method:"POST",
   data:{view:view},
   dataType:"json",
   success:function(data)
   {
    $('.dropdown-menu').html(data.notification);
    if(data.unseen_notification > 0)
    {
     $('.count').html(data.unseen_notification);
    }
   }
  });
 }
 
 load_unseen_notification();
 
 $(document).on('click', '.dropdown-toggle', function(){
  $('.count').html('');
  load_unseen_notification('yes');
 });
 
 setInterval(function(){ 
  load_unseen_notification();; 
 }, 1000);
 
});
</script>
