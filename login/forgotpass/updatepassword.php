<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Update</title>
    <style>
        *,
*:before,
*:after {
    box-sizing: border-box;
    margin:0;
    padding:0;
    text-decoration: none;
    font-family: 'Quicksand', sans-serif;
}
body{
    background-color: #4158D0;
    background-image: linear-gradient(to right, #0f0c29, #302b63, #24243e);
    background-attachment: fixed;
}

form{
    border-radius: 5px;
    background-color: #f2f2f2;
    width:350px;
    transform: translate(-50%,-50%);
    position: absolute;
    top: 50%;
    left: 50%;
    padding: 20px 25px 30px 25px;
}
form h3{
    text-align: center;
    margin-bottom: 20px;
}

form input{
    border: none;
    outline: none;
    background: none;
    width: 100%;
    margin-top: 10px;
    padding-bottom: 0px;
    font-size: 16px;
    border-bottom: 2px solid rgba(0, 0, 0, 0.4)
}
form button{
    border: none;
    outline: none;
    background-image: linear-gradient(to right, #7474BF 0%, #348AC7 51%, #7474BF 100%);
    font-family:'Quicksand', sans-serif;
    display: block;
    margin: 50px auto;
    width: 260px;
    height: 36px;
    border-radius: 30px;
    color: #fff;
    font-size: 15px;
    cursor: pointer;
}

    </style>
</head>
<body>
    
<?php
require('../../constants/db_config.php');
require('../../constants/connect.php');

if(isset($_GET['email'])&& isset($_GET['reset_token']))
{
    date_default_timezone_set('Asia/Kathmandu');
    $date = date('Y-m-d');
    $query="SELECT * FROM `tbl_users` WHERE `email`='$_GET[email]' AND `resettoken`='$_GET[reset_token]' AND `resettokenexpire`='$date'";
    $result=mysqli_query($con,$query);
    if($result)
    {
        if(mysqli_num_rows($result)==1)
        {
            echo"<form method='POST'>
            <h3>Create New Password</h3>
            <input type='password' name='password' placeholder='Enter New Password' required>
            <button type='submit' name='updatepassword'>Update</button>
            <input type='hidden' name='email' value='$_GET[email]'>
            </form>";
        }
        else
        {
            echo"<script>alert('Invalid Token');
            window.location.href='../../home/index.php';
            </script>";
        }
    }
    else
    {
        echo"<script>alert('Server Down! try again later');
        window.location.href='../../home/index.php';
        </script>";
    }
}
?>

<?php 
    if(isset($_POST['updatepassword']))
    {
        $pass=password_hash($_POST['password'],PASSWORD_BCRYPT);
        $update="UPDATE `tbl_users` SET `Password`='$pass',`resettoken`=NULL,`resettokenexpire`=NULL WHERE `email`='$_POST[email]'";
        if(mysqli_query($con,$update))
        {
            echo"<script>alert('Password Updated Successfully');
            window.location.href='../login.php';
            </script>";
        }
        else{
            echo"<script>alert('Server Down! try again later');
            window.location.href='../../home/index.php';
            </script>"; 
        }
    }
?>
</body>
</html>