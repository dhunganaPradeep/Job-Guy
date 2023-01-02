<?php

require '../constants/db_config.php';
require('../constants/connect.php');
session_start();
// Php mailer is a built in function that allows you to send emails. It is a library that is built into php.
// It is a class that is used to send emails.

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendMail($email,$v_code)
{
    //Load Composer's autoloader
    require("PHPMailer/PHPMailer.php");
    require("PHPMailer/SMTP.php");
    require("PHPMailer/Exception.php");

    $mail = new PHPMailer(true);        // Passing `true` enables exceptions


    try {
        //Server settings
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'jobguy222@gmail.com';                     //SMTP username
        $mail->Password   = 'ehjqejmfllqouxtb';                               //SMTP password
        //$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;                                    //TCP port to connect to; use 465 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_SMTPS`


        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        //Recipients
        $mail->setFrom('jobguy222@gmail.com', 'JobGuy');
        $mail->addAddress($email);     // Add a recipient


        //Content
        $mail->isHTML(true);                         //Set email format to HTML
        $mail->Subject = 'E-mail verification from JobGuy.';
        $mail->Body    = "Thanks for registration!
        Click the link to verify your email 
        <html><a href='http://localhost/job-portal/login/verify.php?email=$email&v_code=$v_code'>Verify</a></html>";

        $mail->send();
        return true;
    } catch (Exception $e) {
        echo 'exp:' . $e;
        return false;
    }
}

#For login Form
if (isset($_POST['signin'])) {

    $query = "SELECT * FROM `tbl_users` WHERE `email`='$_POST[email]'";
    $result=mysqli_query($con,$query);
    if($result)
    {
        if(mysqli_num_rows($result)==1)
        {
            $result_fetch=mysqli_fetch_assoc($result);
            if($result_fetch['is_verified']==1)
            {
                if(password_verify($_POST['password'],$result_fetch['Password'])) //To match password in database also in hash()
                {
                    $_SESSION['logged_in']=true;
                    $_SESSION['email']=$result_fetch['Email'];
                    $_SESSION['name']=$result_fetch['Name'];
                    header("location:../home/index.php");
                }
                else
                {
                    #if incorrect password
                    echo
                        "<script>alert('Incorrect Password');
                        window.location.href='login.php';
                        </script>"; 
                }
            }
            else
            {
                echo
                    "<script>alert('Email not verified');
                    window.location.href='../../home/index.php';
                    </script>"; 
            }
        }
        else
        {
            echo
                "<script>alert('Email is not registered');
                window.location.href='login.php';
                </script>"; 
        }
    }
    else
    {
        echo
            "<script>alert('Cannot run Query');
            window.location.href='login.php';
            </script>"; 
    }
}



#For registration form
if (isset($_POST['signup'])) {
    $email_exist_query = "SELECT * FROM `tbl_users` WHERE `email`='$_POST[email]'";
    $result = mysqli_query($con, $email_exist_query);

    if ($result) {
        if (mysqli_num_rows($result) > 0) #It will be executed if email is already taken
        {
            // To match email :Email cannot repeat: Assoc function works as associative array to differentiate
            $result_fetch = mysqli_fetch_assoc($result);
            if ($result_fetch['email'] == $_POST['email']) {
                // Error for email already registered
                echo
                "<script>alert('$result_fetch[email] Email already exists');
                    window.location.href='login.php';
                    </script>
                ";
            }
        } elseif (empty($_POST['fname'])) {
            echo
            "<script>alert(' first name cannot be empty ');
                window.location.href='login.php';
                </script>
            ";
        } elseif (empty($_POST['email'])) {
            echo
            "<script>alert('Email & password cannot be empty');
                window.location.href='login.php';
                </script>
            ";
        } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            echo
            "<script>alert('invalid email format');
                window.location.href='login.php';
                </script>
            ";
        } elseif (empty($_POST['password'])) {
            echo
            "<script>alert(' password cannot be empty');
                window.location.href='login.php';
                </script>
            ";
        } else {
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT); //To encrypt password: hash() is used : hash() is blowfish algorithm and bypassing it is impossible.
            $v_code = bin2hex(random_bytes(16)); //To generate random string of 16 characters
            if ($_POST['role'] == 'employee') {
                $query = "INSERT INTO tbl_users(`role`)VALUE('employee')";
                mysqli_query($con, $query);
            } else {
                $query = "INSERT INTO tbl_users(`role`)VALUE('employer')";
                mysqli_query($con, $query);
            }
            $query = "INSERT INTO `tbl_users`(`first_name`,`last_name`,`email`,`Password`,`verification_code`, `is_verified`) VALUES ('$_POST[fname]','$_POST[lname]','$_POST[email]','$password','$v_code','0')";
            if (mysqli_query($con, $query) && sendMail($_POST['email'], $v_code)) {
                echo
                "<script>alert('Verification code has been sent to your email');
                    window.location.href='login.php';
                    </script>";
            } else {
                echo
                "<script>alert('Cannot run Query');
                    window.location.href='login.php';
                    </script>";
            }
        }
    } else {
        echo
        "<script>alert('Cannot run Query');
        window.location.href='../../home/index.php';
        </script>";
    }
}
