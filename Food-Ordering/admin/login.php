<?php include ('../config/constants.php'); ?>

<html>
  <head>
    <title>Login - Ordering System</title>
    <link rel="stylesheet" href="../css/admin.css">
  </head>
  <body>

      <div class="login">
          <h1 class="text-center">Login</h1>
          <br><br>

          <?php
              if (isset($_SESSION['login']))
              {
                echo $_SESSION['login'];
                unset ($_SESSION['login']);
              }

              if (isset($_SESSION['no-login-message']))
              {
                echo $_SESSION['no-login-message'];
                unset($_SESSION['no-login-message']);
              }
          ?>
          <br><br>

          <!-- Login Form Starts Here -->
          <form action="" method="POST" class="text-center">
          Username:
          <input type="text" name="username" placeholder="Enter Username"> <br><br>

          Password:
          <input type="password" name="password" placeholder="Enter Password"> <br><br>

          <input type="submit" name="submit" value="Login" class="btn-primary">
          <br><br>
          </form>
          <!-- Login Form Ends Here -->

          <p class="text-center">Created By - <a href="#">TEAM 3</a> </p>
      </div>
  </body>
</html>

<?php

    //Check whether the Submit Buttin is Clicked or // NOTE:
    if (isset($_POST['submit']))
    {
      //Process for login
      //1. Get the data from Login Form
      echo $username = $_POST['username'];
      echo $password = md5($_POST['password']);

      //2. SQL to check whether the user with username and password exist or not
      $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

      //3. Execute the dbx_query
      $res = mysqli_query($conn, $sql);

      //4. Count rows to check whether the user exist or not
      $count = mysqli_num_rows($res);

      if ($count==1)
      {
        //User available and Log in sucess
        $_SESSION['login'] = "<div class='success'>Login Successful.</div>";
        $_SESSION['user'] = $username; //to check whether the user is logged in or not and logout will unset it

        //Redirect to homepage dashboard
        header('location:'.SITEURL.'admin/');
      }
      else
      {
        //User not available and Login fail
        $_SESSION['login'] = "<div class='error'>Username or Password did not match.</div>";
        //Redirect to homepage dashboard
        header('location:'.SITEURL.'admin/login.php');
      }
    }

 ?>
