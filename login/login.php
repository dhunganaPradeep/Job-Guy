<?php
require('../constants/connect.php');
session_start();
if (isset($_GET['error'])) {
  echo '
      <script>alert("$_GET[error]")</script>
    ';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>

  <link rel="stylesheet" href="../css/login.css">

  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Quicksand:300,500">

</head>
<a href="./">
  <div class="close-btn" style="position: absolute;top:10rem; right:15rem ;z-index:100;"><i class="fa-solid fa-circle-xmark "></i></div>
</a>

<body>
  <div class="cont" id="cont">
    <div class="form sign-in">
      <h2>Welcome</h2>
      <form method="POST" action="sign.php">

        <div>
          <label for="email">Email</label>
          <input type="text" id="email" name="email" required/>
        </div>
        <div>
          <label for="password">Password</label>
          <input type="password" id="password" name="password" required min="6"/>
        </div>
        <p class="forgot-pass"><u><a href="forgotpass/forgotpassword.php">Forgot password</a></u> ?</p>
        <button type="submit" class="submit" id="signin" name="signin">Sign In</button>
        <h1>Or Sign up Using</h1>
        <div class="social-container1">
          <a href="https://facebook.com" target="_blank">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-facebook" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3" />
            </svg>
          </a>
          <a href="https://twitter.com" target="_blank">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-twitter" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <path d="M22 4.01c-1 .49 -1.98 .689 -3 .99c-1.121 -1.265 -2.783 -1.335 -4.38 -.737s-2.643 2.06 -2.62 3.737v1c-3.245 .083 -6.135 -1.395 -8 -4c0 0 -4.182 7.433 4 11c-1.872 1.247 -3.739 2.088 -6 2c3.308 1.803 6.913 2.423 10.034 1.517c3.58 -1.04 6.522 -3.723 7.651 -7.742a13.84 13.84 0 0 0 .497 -3.753c-.002 -.249 1.51 -2.772 1.818 -4.013z" />
            </svg>
          </a>
          <a href="https://gmail.com" target="_blank">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-mail" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
              <rect x="3" y="5" width="18" height="15" rx="2"></rect>
              <polyline points="3 7 12 13 21 7"></polyline>
            </svg>
          </a>
        </div>
      </form>

    </div>

    <div class="sub-cont">
      <div class="img">
        <div class="img__text m--up">

          <h3>Don't have an account ? Don't Worry you're just one click away from getting a job. Please Sign up!<h3>
        </div>
        <div class="img__text m--in">

          <h3>If you already have an account, just sign in.<h3>
        </div>
        <div class="img__btn">
          <span class="m--up">Sign Up</span>
          <span class="m--in">Sign In</span>
        </div>
      </div>

      <div class="form sign-up">

        <h2>Create your Account</h2>
        <form method="POST" action="sign.php">

          <div>

            <label for="fname">First name</label>
            <input type="text" id="fname" name="fname" required />
          </div>
          <div>

            <label for="lname">Last name (Optional for employer registration)</label>
            <input type="text" id="lname" name="lname" />
          </div>
          <div>
            <label for="email2">Email</label>
            <input type="text" id="email2" name="email" required/>
          </div>
          <div>
            <label for="password2">Password</label>
            <input type="password" id="password2" name="password" required min="6"/><span class="mtext">(minimum 6 characters)</span>
          </div>
          <div>
          </div>
          <div>
            <h2 class="role">Select account type</h2>
            <div class="choose">
            <label for="">Employer:<input type="radio" name="role" value="employer"></label>
            <label for="">Employee:<input type="radio" name="role" value="employee" checked></label>
            </div>
          </div>
          <button type="submit" class="submit" id="signup" name="signup">Sign Up</button>


        </form>
      </div>
    </div>
  </div>


  <script src="https://kit.fontawesome.com/58b14362d6.js" crossorigin="anonymous"></script>
  <script>
    document.querySelector('.img__btn').addEventListener('click', function() {
      document.querySelector('.cont').classList.toggle('s--signup');
    });
  </script>
</body>

</html>