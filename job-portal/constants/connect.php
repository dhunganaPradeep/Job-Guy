<?php
    $con=mysqli_connect("localhost","root","","job_portal");

    if(mysqli_connect_error()){
        echo"<script>alert('Cannot connect to database');</script>";
        exit();
    }
?>