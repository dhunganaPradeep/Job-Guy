 <?php

    require '../../constants/db_config.php';
    require '../../constants/connect.php';
    require '../../constants/check-login.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    function sendMail($email, $reset_token)
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
        // $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
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
        $mail->Subject = 'Password reset link from JobGuy.';
        $mail->Body    = "We got a request to reset your password.
        Click the link to reset your password
        <html><a href='http://localhost/job-portal/login/forgotpass/updatepassword.php?email=$email&reset_token=$reset_token'>Reset Password</a></html>";

        $mail->send();
        return true;
    } catch (Exception $e) {
        echo 'exp:' . $e;
        return false;
    }
    }

    if (isset($_POST['forgot'])) {
        $query = "SELECT * FROM `tbl_users` WHERE `email`='$_POST[email]'";
        $result = mysqli_query($con, $query);
        if ($result) {
            if (mysqli_num_rows($result) == 1) {
                //if email is registered
                $reset_token = bin2hex(random_bytes(16)); //To generate random token
                $email = $_POST['email'];
                date_default_timezone_set('Asia/Kathmandu');
                $date = date('Y-m-d H:i:s');
                $query = "UPDATE `tbl_users` SET `resettoken`='$reset_token',`resettokenexpire`='$date' WHERE `email`='$_POST[email]'";
                if (mysqli_query($con, $query) && sendMail($_POST['email'], $reset_token)) {
                    echo
                    "<script>alert('Password reset link sent to your email successfully');
                    window.location.href='forgotpassword.php';
                    </script>";
                } else {
                    echo
                    "<script>alert('Server Down! try again later');
                    window.location.href='forgotpassword.php';
                    </script>";
                }
            } else {
                echo
                "<script>alert('Invalid email Entered');
                    window.location.href='forgotpassword.php';
                    </script>";
            }
        } else {
            echo
            "<script>alert('Cannot run Query');
                window.location.href='../../home/index.php';
                </script>";
        }
    }
    ?>

 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Forgot password</title>
     <link rel="stylesheet" href="forgotpass.css">
     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Quicksand:300,500">
 </head>

 <body>
     <form action="forgotpassword.php" method="post">
         <div class="row">
             <h1>Forgot Password</h1>
             <h5>Enter your registered email to reset your password.</h5>
             <div class="form">
                 <label for="email">Email</label>
                 <input type="text" id="email" name="email" required />
                 <button type="submit" name="forgot" class="submit" id="submit">Reset Password</button>
             </div>
             <div class="footer">
                 <h4>New here?<a href="../login.php"><u>Sign Up</u></a></h4>
                 <h4>Already have an account? <a href="../login.php"><u>Sign In</u></a></h4>
             </div>
         </div>
         <script src="forgotpass.js"></script>
     </form>
 </body>

 </html>