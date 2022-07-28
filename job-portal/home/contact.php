<?php 
 require '../constants/check-login.php';


?>


<!DOCTYPE html>



<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <title>contact us</title>
    <style>
        /* Google Font CDN Link */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins" , sans-serif;
  color: black;
}
body{
  min-height: 100vh;
  width: 100%;
  background-image: linear-gradient(to right, #0f0c29, #302b63, #24243e);
  display: flex;
  align-items: center;
  justify-content: center;
}
.container{
    margin-top: 05rem;
  width: 85%;
  background: #fff;
  border-radius: 6px;
  padding: 20px 60px 30px 40px;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
}
.container .content{
  display: flex;
  align-items: center;
  justify-content: space-between;
}
.container .content .left-side{
  width: 25%;
  height: 100%;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  margin-top: 15px;
  position: relative;
}
.content .left-side::before{
  content: '';
  position: absolute;
  height: 70%;
  width: 2px;
  right: -15px;
  top: 50%;
  transform: translateY(-50%);
  background: #afafb6;
}
.content .left-side .details{
  margin: 14px;
  text-align: center;
}
.content .left-side .details i{
  font-size: 30px;
  color: #3e2093;
  margin-bottom: 10px;
}
.content .left-side .details .topic{
  font-size: 18px;
  font-weight: 500;
}
.content .left-side .details .text-one,
.content .left-side .details .text-two{
  font-size: 14px;
  color: #afafb6;
}


.container .content .right-side{
  width: 75%;
  margin-left: 75px;
}
.content .right-side .topic-text{
  font-size: 23px;
  font-weight: 600;
  color: #3e2093;
}
.right-side .input-box{
  height: 50px;
  width: 100%;
  margin: 12px 0;
}
.right-side .input-box input,
.right-side .input-box textarea{
  height: 100%;
  width: 100%;
  border: none;
  outline: none;
  font-size: 16px;
  background: #F0F1F8;
  border-radius: 6px;
  padding: 0 15px;
  resize: none;
}
.right-side .message-box{
  min-height: 110px;
}
.right-side .input-box textarea{
  padding-top: 6px;
}
.right-side .submit{
  display: inline-block;
  margin-top: 12px;
}
.right-side .submit input[type="submit"]{
  color: #fff;
  font-size: 18px;
  outline: none;
  border: none;
  padding: 8px 16px;
  border-radius: 6px;
  background: #3e2093;
  cursor: pointer;
  transition: all 0.3s ease;
}
.submit input[type="submit"]:hover{
  background: #5029bc;
}

@media (max-width: 950px) {
  .container{
    width: 90%;
    padding: 30px 40px 40px 35px ;
  }
  .container .content .right-side{
   width: 75%;
   margin-left: 55px;
}
}
@media (max-width: 820px) {
  .container{
    margin: 40px 0;
    height: 100%;
  }
  .container .content{
    flex-direction: column-reverse;
  }
 .container .content .left-side{
   width: 100%;
   flex-direction: row;
   margin-top: 40px;
   justify-content: center;
   flex-wrap: wrap;
 }
 .container .content .left-side::before{
   display: none;
 }
 .container .content .right-side{
   width: 100%;
   margin-left: 0;
 }
}

/* /// */

    </style>
</head>
<body>
<nav id="navbar">

<div class="navbar-logo">
    <a href="./"><img src="../img/large_jobguy.png" alt=""></a>
</div>
<div class="nav-links">

    <a href="./index.php">
        <div class="nav-link"><span>Home</span></div>

    </a>
    <a href="./job-list.php">
        <div class="nav-link"><span>Find Jobs</span></div>
    </a>
    <a href="contact.php">
        <div class="nav-link"><span>Contact</span></div>
    </a>
</div>
<div class="buttons">
<?php
                if ($user_online) {
                    print '
                            <a href="../login/logout.php">
                                 <div class="button log-out-btn"><button>Log out</button></div>
                            </a>
                            <a href="' .isset($_SESSION['role']). '">
                                <div class="button profile-btn"><a href="../home/profile.php"><button>Profile</button></a></div>
                             </a>
                        ';
                } else {
                    print '
                            <a href="../login/login.php">
                                 <div class="button log-in"><button>Log in</button></div>
                            </a>

                        ';
                }
            ?>
</div>


</nav>

<div class="container">
    <div class="content">
      <div class="left-side">
        <div class="address details">
          <i class="fas fa-map-marker-alt"></i>
          <div class="topic">Address</div>
          <div class="text-one">Kathmandu</div>
          <div class="text-two">Nepal</div>
        </div>
        <div class="phone details">
          <i class="fas fa-phone-alt"></i>
          <div class="topic">Phone</div>
          <div class="text-one">9876543210</div>
          <div class="text-two">9876543210</div>
        </div>
        <div class="email details">
          <i class="fas fa-envelope"></i>
          <div class="topic">Email</div>
          <div class="text-one">jobguy222@gmail.com</div>
          <div class="text-two"></div>
        </div>
      </div>
      <div class="right-side">
        <div class="topic-text">Send us a message</div>
        <p>feel free to reach out to us</p>
      <form action="mailto:jobguy222@gmail.com">
        <div class="input-box">
          <input type="text" placeholder="Enter your name">
        </div>
        <div class="input-box">
          <input type="text" placeholder="Enter your email">
        </div>
        <div class="input-box message-box">
          <textarea placeholder="Enter your message"></textarea>
        </div>
        <div class="submit">
          <input type="submit" value="Send Now" >
        </div>
      </form>
    </div>
    </div>
  </div>
</body>
</html>