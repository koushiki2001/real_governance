<?php
require_once('connection.php');
require_once('component.php');
session_start();
$user =  $_SESSION['USERNAME'];
$admin_zone=$_SESSION['ADMIN_ZONE'];
if(isset($_POST['action'])){
    
    $department = $_POST['CATEGORY'];
    $complainantName = $_POST['ComplainantName'];
    $complainantId = $_POST['complaintId'];
    $complainantPhNo = $_POST['ComplainantPhNo'];
    $municipality = $_POST['Municipality'];
    $description = $_POST['desc'];
    $type = $_POST['type'];
    
    
    if($department == "EDUCATION"){
         $sql1 = "INSERT INTO education(ComplaintId,ComplainantName,ComplainantPhNo,Municipality,Description,Type) VALUES('$complainantId','$complainantName','$complainantPhNo','$municipality','$description','$type')";
        if(mysqli_query($conn ,$sql1)){
        echo "Successfully updated";
       
    }
        else
        {
            echo"Problems updating record";
        }
        
        sleep(3);
        header("Location:website.php");
        
    }
    else if($department == "HEALTH")
    {
         $sql2 = "INSERT INTO health(ComplaintId,ComplainantName,ComplainantPhNo,Municipality,Description,Type) VALUES('$complainantId','$complainantName','$complainantPhNo','$municipality','$description','$type')";
        if(mysqli_query($conn ,$sql2)){
        echo "Successfully updated";    
       
    }
        else
        {
            echo"Problems updating record";
        }
        
        sleep(3);
        header("Location:website.php");
        
    }
    else if($department == "ROADS")
    {
         $sql3 = "INSERT INTO randc(ComplaintId,ComplainantName,ComplainantPhNo,Municipality,Description,Type) VALUES('$complainantId','$complainantName','$complainantPhNo','$municipality','$description','$type')";
        if(mysqli_query($conn ,$sql3)){
        echo "Successfully updated";
        
       
       
    }
        
        else
        {
            echo"Problems updating record";
        }
        
        sleep(3);
        header("Location:website.php"); 
    }
    else if($department == "PENSION")
    {
         $sql4 = "INSERT INTO pension(ComplaintId,ComplainantName,ComplainantPhNo,Municipality,Description,Type) VALUES('$complainantId','$complainantName','$complainantPhNo','$municipality','$description','$type')";
        if(mysqli_query($conn ,$sql4)){
        echo "Successfully updated";
               
        
    }
        else
        {
            echo"Problems updating record";
        }
    sleep(3);
     header("Location:website.php");    
    }
    else if($department == "RELIEF AND DISASTER MANAGEMENT")
       {
        
         $sql5 = "INSERT INTO randmgmt(ComplaintId,ComplainantName,ComplainantPhNo,Municipality,Description,Type) VALUES('$complainantId','$complainantName','$complainantPhNo','$municipality','$description','$type')";
        if(mysqli_query($conn ,$sql5)){
        echo "Successfully updated";        
       
    }
        else
        {
            echo"Problems updating record";
        }
   
        sleep(3);
         header("Location:website.php");
        
    }
    
    
    
    
    
}



//FOR PROBLEM SOLVED

if(isset($_POST['solved'])){
    
    $department = $_POST['CATEGORY'];
    $complainantName = $_POST['ComplainantName'];
    $complainantId = $_POST['complaintId'];
    $complainantPhNo = $_POST['ComplainantPhNo'];
    $municipality = $_POST['Municipality'];
    $description = $_POST['desc'];
    $type = $_POST['type'];
    
    
    if($type == 'Personal')
    {
        $sql = "INSERT INTO donepersonal(ComplaintId,ComplainantName,Category,Municipality) VALUES ('$complainantId','$complainantName','$department','$municipality')";
        
        mysqli_query($conn , $sql);
        
        $query = "DELETE * FROM personal WHERE ComplaintId = '$complainantId' ";
        if(mysqli_query($conn ,$query))
        {
            echo "Problem Solved";
        }
        sleep(4);
        header("Location:website.php");
        
        
    }
    
    
    
    
}




?>

<html>
<head>
    <title>WEBSITE</title>
   
    
    </head>
    
    <meta charset="utf-8">
<!--    Bootstrap CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<!--    Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
    
    <body>
        
<!--      FOR PERSONAL COMPLAINTS-->
        
         <div class=" container pt-5 PersonalComplaints">
             <h6 style="text-align:center;"><legend>PERSONAL COMPLAINTS</legend></h6>
             <hr>
        <table class="table table-bordered tableP">
      <thead>
        <tr class="table-dark" style="color:black">
          <th scope="col">ComplaintId</th>
          <th scope="col">ComplainantName</th>
          <th scope="col">ComplainantPhNo</th>
          <th scope="col">Municipality</th>
            <th scope="col">Address</th>
          <th scope="col">CATEGORY</th>
          <th scope="col" style="display:none;">Description</th>
          <th scope="col">Take action</th>
          <th scope="col" >Problem Solved </th>
                        

        </tr>
      </thead>
        <tbody>
      <?php 
        
        $type = "Personal";
        $admin_zone=$_SESSION['ADMIN_ZONE'];
            
        $sql = "SELECT * FROM personal WHERE Municipality = '$admin_zone' ";

        $result = mysqli_query($conn , $sql);
        if(mysqli_num_rows($result)>0)
        {
            while($row = mysqli_fetch_assoc($result)) {

            if($row['NoActionDays'] == "MORE THAN A WEEK"){
                $color = 'blue';
            }
                
            else if($row['NoActionDays'] == "MORE THAN A MONTH"){
                $color = 'yellow';
            }
                
            else if($row['NoActionDays'] == "MORE THAN SIX MONTHS"){
                $color = 'green';
            }
                
            else if($row['NoActionDays'] == "MORE THAN A YEAR"){
                $color = 'red';
            }
        
        getTableData($row['ComplaintId'],$row['ComplainantName'],$row['ComplainantPhNo'],$row['Municipality'],$row['Address'],$row['CATEGORY'],$color,$row['Description'],$type);

        }
        }
      
       ?>
            </tbody>
   
    
    
        </table>
     </div> 
        
        
<!--   FOR COMMUNITY COMPLAINTS     -->
        
        <div class=" container CommunityComplaints">
             <h6 style="text-align:center;"><legend>COMMUNITY COMPLAINTS</legend></h6>
            <hr>
        <table class="table table-bordered tableC">
      <thead>
        <tr class="table-dark" style="color:black">
          <th scope="col">ComplaintId</th>
          <th scope="col">ComplainantName</th>
          <th scope="col">ComplainantPhNo</th>
            <th scope="col">Complainant 2 Name</th>
          <th scope="col">Municipality</th>
             <th scope="col">Address</th>
          <th scope="col">CATEGORY</th>
          <th scope="col" style="display:none;">Description</th>
          <th scope="col">Take action</th>
          <th scope="col" >Problem Solved </th>
                        

        </tr>
      </thead>
        <tbody>
      <?php 
        
        $type = "Community";
        $admin_zone=$_SESSION['ADMIN_ZONE'];
            
        $sql = "SELECT * FROM community WHERE Municipality = '$admin_zone' ";

        $result = mysqli_query($conn , $sql);
        if(mysqli_num_rows($result)>0)
        {
            while($row = mysqli_fetch_assoc($result)) {

            if($row['NoActionDays'] == "MORE THAN A WEEK"){
                $color = 'blue';
            }
                
            else if($row['NoActionDays'] == "MORE THAN A MONTH"){
                $color = 'yellow';
            }
                
            else if($row['NoActionDays'] == "MORE THAN SIX MONTHS"){
                $color = 'green';
            }
                
            else if($row['NoActionDays'] == "MORE THAN A YEAR"){
                $color = 'red';
            }
        
        getTableDataCommunity($row['ComplaintId'],$row['Complainant1Name'],$row['Complainant1PhNo'],$row['Complainant2Name'],$row['Municipality'],$row['Address'],$row['CATEGORY'],$color,$row['Description'],$type);

        }
        }
      
       ?>
            </tbody>
   
    
    
        </table>
     </div>    
    </body>
</html>