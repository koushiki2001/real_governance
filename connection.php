<?php
$conn = mysqli_connect("localhost","root","","usercomplaints");
        if (!$conn) {
              die("Connection failed: " . mysqli_connect_error());
            }
?>