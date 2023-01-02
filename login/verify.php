<?php
   require '../constants/db_config.php';
   require '../constants/connect.php';

    if(isset($_GET['email'])&& isset($_GET['v_code']))
    {
        $email=$_GET['email'];
        $v_code=$_GET['v_code'];
        echo $email;
        echo $v_code;
        $query="SELECT * FROM tbl_users WHERE email='$email' AND verification_code='$v_code'";
        $result=mysqli_query($con,$query);
        if($result)
        {
            if(mysqli_num_rows($result)>0)
            {
                $result_fetch=mysqli_fetch_assoc($result);
                if($result_fetch['is_verified']==0)
                {
                  $update="UPDATE `tbl_users` SET `is_verified`='1' WHERE `email`='$result_fetch[email]'";
                   if(mysqli_query($con,$update))
                   {
                       echo
                           "<script>alert('Email registration Successful. Please login to continue');
                           window.location.href='login.php';
                           </script>"; 
                   }
                   else
                   {
                       echo
                           "<script>alert('Cannot run Query');
                           window.location.href='../home/index.php';
                           </script>"; 
                   }
                }
                else
                {
                    echo
                        "<script>alert('Email already verified');
                        window.location.href='login.php';
                        </script>"; 
                }
            }
            else
            {
                echo
                    "<script>alert('Error while verifying email');
                    window.location.href='../home/index.php';
                    </script>"; 
            }
        }
        else
        {
            echo
                "<script>alert('Cannot run Query');
                window.location.href='../home/index.php';
                </script>"; 
        }
    }

?>