
<?php
session_start();
$conn = mysqli_connect("localhost","root","","usercomplaints");
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$msg='';
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $sql = "SELECT * FROM admin WHERE Username = '$username' and Password = '$password'";
    $res = mysqli_query($conn,$sql);
    $count = mysqli_num_rows($res);
    
    if($count>0){
        
        $row = mysqli_fetch_assoc($res);
        
        $zone = $row['Municipality'];
        $_SESSION['ADMIN_LOGIN']='yes';
        $_SESSION['USERNAME']= $username;
        $_SESSION['ADMIN_ZONE'] = $zone;
        header('location:website.php');
        die();
        
    }else{
        
        $msg="Please enter correct details";
    }
   
}
?>
<html>
<head>
    <link rel="stylesheet" href="LoginStyles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>ADMIN LOGIN</title>
    </head>
    
    <body>
       <div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first p-5">
      <img src="images/admin.png" id="icon" alt="User Icon" style="height:80px;" />
    </div>

    <!-- Login Form -->
    <form method="post">
      <input type="text" id="name" class="fadeIn second" name="username" placeholder="Enter username" required>
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="Enter password" required>
      <input type="submit" class="fadeIn fourth"  name="submit" value="Log In">
        
    </form>
      <div class="field_error"><?php echo $msg;?></div>
    

  </div>
</div>
        
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>

