<?php
$errorEmail = "";
$errorUser = "";
$conn = mysqli_connect("localhost","root","","usercomplaints");
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST['SUBMIT']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password1 = $_POST['password1'];
    $municipality = $_POST['municipality'];
   
    
    $sqlu = "SELECT * FROM admin WHERE Username='$username'";
    $sqle = "SELECT * FROM admin WHERE Email = '$email'";
    
    $resu = mysqli_query($conn,$sqlu);
    $rese = mysqli_query($conn,$sqle);
    
    
    if(mysqli_num_rows($resu) > 0)
    {
        $errorUser = "Username already in use";
    }
    
    if(mysqli_num_rows($rese) > 0)
    {
        $errorEmail = "Email already in use";
    }
    
    else{
        
        $sql = "INSERT INTO admin(Name,Email,Username,Password,Municipality) VALUES ('$name','$email','$username','$password1','$municipality')";
        if(mysqli_query($conn,$sql)){
            echo "SUCCESSFUL SIGN UP";
            
        }
    }
    
    
}

mysqli_close($conn);

?>


<html>
<head>
    <title>ADMIN LOGIN</title>
    <link rel="stylesheet" href="signup.css">
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    </head>
<body>
    
<div class="container" id="wrap" style="padding:3rem; margin-top:3rem; margin-bottom:3rem;">
	  <div class="row">
        <div class="col-md-6 col-md-offset-3">
    <form method="post">
        <legend style="text-align:center; font-family:cursive;">Sign Up</legend>
        <input type="text" name="name" class="form-control input-lg" placeholder="Enter Your Name" required>
        <br> <br>
        
    
        <input type="email" name="email" class="form-control input-lg"  placeholder="Enter Your Email" required> 
        <div class="field-error" style="color:red"><?php echo $errorEmail; ?></div>
         <br> <br>
    
   
        <input type="text" name="username" class="form-control input-lg"  placeholder="Enter Your Username" required>
        <div class="field-error" style="color:red"><?php echo $errorUser; ?></div>
         <br> <br>
        
    
        <input type="password" name="password1" class="form-control input-lg"  placeholder="Enter Your Password" required>
        
         <br> <br>
        
        <input type="text" name="municipality" class="form-control input-lg"  placeholder="Enter the municipality you are accountable for " required>
        
         <br> <br>
        
   
        
   <button class="btn btn-lg btn-primary btn-block signup-btn" type="submit" name="SUBMIT">
                        SIGN UP</button>
        <br><br>
        <div class="linkLogin" style="text-align:center; font-size:20px; text-decoration:underline;font-family:cursive;"><a href="adminLogin.php" title="Sign In">Sign In</a></div>
    
    </form>
          </div>
    </div>
    </div>
    </body>
</html>