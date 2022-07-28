<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register as employer</title>
    <link rel="stylesheet" href="login.css">
</head>

<body>
<div class="cont" id="cont">
    

   

      <div class="form sign-up">

        <h2>Create your Account</h2>
        <form method="POST" action="sign.php">
        
          <div>
           
            <label for="fname">first name</label>
            <input type="text" id="fname" name="fname" />
          </div>
          <div>
           
           <label for="lname">last name</label>
           <input type="text" id="fname" name="lname" />
         </div>
          <div>
            <label for="email2">Email</label>
            <input type="text" id="email2" name="email" />
          </div>
          <div>
            <label for="password2">Password</label>
            <input type="password" id="password2" name="password" /><span class="mtext">(minimum 6 characters)</span>
          </div>
          <div>
          </div>
          <button type="submit" class="submit" id="signup" name="signup">Sign Up</button>

        </form>
      </div>
    </div>
  </div>

</body>

</html>