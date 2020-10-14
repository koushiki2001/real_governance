<?php

$link = mysqli_connect("localhost","root","","usercomplaints");

if(isset($_POST['SUBMIT']))
{
    $name = $_POST['nameOfComplainant'];
    $PhNo = $_POST['PhnoOfComplainant'];
    $Address = $_POST['addressOfComplainant'];
    $municipality = $_POST['municipality'];
    $category = $_POST['CATEGORY'];
    $desc = $_POST['description'];
    $reported = $_POST['REPORTED'];
    $daysPassed = $_POST['DAYS_PASSED'];
    
    $sql = "INSERT INTO personal(ComplainantName,ComplainantPhNo,Municipality,Address,CATEGORY,Description,ReportedEarlier,NoActionDays)
    VALUES('$name','$PhNo','$municipality','$Address','$category','$desc','$reported','$daysPassed')";
    
    if (mysqli_query($link, $sql)) {
  echo "Complaint lodged successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($link);
}
    
}


?>


<html>
<head>
    <title>PERSONAL COMPLAINT FORM</title>
    <link rel="stylesheet" href="css/personalForm.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body>
    
        <div class="container topHead">
        <h1 class="display-4">Personal Complaint Form</h1>
        </div>
        
        <form method="post">
            
        <label style="color:red;">Required (<span class="required"></span> )</label>
            <br>
            <br>
        <div class="form-group">
            <label for="nameOfComplainant" class="required">Name of the complainant:</label>
            <input type="text" class="form-control" id="nameOfComplainant" name="nameOfComplainant" placeholder="Enter name" required >
         </div>
            
        <div class="form-group">
            <label for="PhnoOfComplainant" class="required">Contact number of the complainant:</label>
            <input type="text" class="form-control" id="PhnoOfComplainant" name="PhnoOfComplainant" placeholder="Enter contact number" required>
         </div>
            
          
            <div class="form-group">
            <label for="addressOfComplainant" class="required">Enter Address:</label>
            <textarea class="form-control" id="addressOfComplainant" rows="3" name="addressOfComplainant" required></textarea>
          </div>
            
        <div class="form-group">
            <label for="municipality" class="required">Municipality under which the Complainant resides:</label>
            <input type="text" class="form-control" id="municipality" placeholder="Enter Municipality name" name="municipality" required>
         </div>
            
         
        <label class="required">ENTER THE CATEGORY OF YOUR COMPLAINT:</label>    
        <div class="form-check">
            <input class="form-check-input" type="radio" name="CATEGORY" id="Radios1" value="EDUCATION">
            <label class="form-check-label" for="Radios1">
            EDUCATION
            </label>
        </div>
            
            
        <div class="form-check">
            <input class="form-check-input" type="radio" name="CATEGORY" id="Radios2" value="HEALTH">
            <label class="form-check-label" for="Radios2">
            HEALTH
            </label>
        </div>
            
            
        <div class="form-check">
            <input class="form-check-input" type="radio" name="CATEGORY" id="Radios3" value="ROADS AND CONSTRUCTION">
            <label class="form-check-label" for="Radios3">
            ROADS AND CONSTRUCTION
            </label>
        </div>
            
            
        <div class="form-check">
            <input class="form-check-input" type="radio" name="CATEGORY" id="Radios4" value="PENSION">
            <label class="form-check-label" for="Radios4">
            PENSION
            </label>
        </div>
            
            
            
        <div class="form-check">
            <input class="form-check-input" type="radio" name="CATEGORY" id="Radios5" value="RELIEF AND DISASTER MANAGEMENT">
            <label class="form-check-label" for="Radios5">
            RELIEF AND DISASTER MANAGEMENT
            </label>
        </div>
            
        <br>
        <div class="form-group">
            <label for="description" class="required">Enter Description of the problem:</label>
            <textarea class="form-control" id="description" rows="3"  name="description" required></textarea>
        </div>
            
            
        
            
        <label  class="required">HAS IT BEEN REPORTED EARLIER:</label>    
        <div class="form-check">
            <input class="form-check-input" type="radio" name="REPORTED" id="Radios6" value="YES">
            <label class="form-check-label" for="Radios6">
            YES
            </label>
        </div>
            
            
        <div class="form-check">
            <input class="form-check-input" type="radio" name="REPORTED" id="Radios7" value="NO">
            <label class="form-check-label" for="Radios7">
            NO
            </label>
        </div>
            
         <br>   
            
        <label class="required">NO OF DAYS PASSED WITHOUT ANY ACTION BEEN TAKEN:</label>    
        <div class="form-check">
            <input class="form-check-input" type="radio" name="DAYS_PASSED" id="Radios8" value="MORE THAN A WEEK">
            <label class="form-check-label" for="Radios8">
            MORE THAN A WEEK
            </label>
        </div>
            
            
        <div class="form-check">
            <input class="form-check-input" type="radio" name="DAYS_PASSED" id="Radios9" value="MORE THAN A MONTH">
            <label class="form-check-label" for="Radios9">
            MORE THAN A MONTH
            </label>
        </div>
            
            
            
        <div class="form-check">
            <input class="form-check-input" type="radio" name="DAYS_PASSED" id="Radios10" value="MORE THAN SIX MONTHS">
            <label class="form-check-label" for="Radios10">
            MORE THAN SIX MONTHS
            </label>
        </div>
            
            
        <div class="form-check">
            <input class="form-check-input" type="radio" name="DAYS_PASSED" id="Radios11" value="MORE THAN A YEAR">
            <label class="form-check-label" for="Radios11">
            MORE THAN A YEAR
            </label>
        </div>
        
            
        <br>
            
         <input type="submit" class="btn btn-success mb-2" value="SUBMIT FORM" name="SUBMIT">
        </form>
        
        
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>