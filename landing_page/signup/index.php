<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    include("db.php");

    // Login processing
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (!empty($email) && !empty($password) && !is_numeric($email)) {
            $query = "SELECT * FROM formsignup WHERE email='$email' LIMIT 1";
            $result = mysqli_query($con, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                $user_data = mysqli_fetch_assoc($result);
                if ($user_data['password'] == $password) {
                    redirect("connect.php");
                }
            }

            showAlert("Wrong username or password");
        } else {
            showAlert("Please enter valid information");
        }
    }

    // Signup processing
    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (!empty($email) && !empty($password) && !is_numeric($email)) {
            $query = "INSERT INTO formsignup (name, email, password) VALUES ('$name', '$email', '$password')";
            mysqli_query($con, $query);
            showAlert("Successfully Registered");
        } else {
            showAlert("Please enter valid information");
        }
    }
}

function redirect($location) {
    header("Location: $location");
    exit();
}

function showAlert($message) {
    echo "<script type='text/javascript'> alert('$message')</script>";
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!--<title> Login and Registration Form </title>-->
    <link rel="stylesheet" href="./assets/style.css">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container">
    <input type="checkbox" id="flip">
    <div class="cover">
      <div class="front">
        <img src="assets/img/pc.jpg" alt="">
        <div class="text">
          <span class="text-1">The best way to predict<br>your future is to create it</span>
          <span class="text-2">Let's get connected</span>
        </div>
      </div>
      <div class="back">
        <img class="backImg" src="assets/img/pc.jpg" alt="">
        <div class="text">
          <span class="text-1">You are never too old to set<br> another goal or to dream a new dream</span>
          <span class="text-2">Let's get started</span>
        </div>
      </div>
    </div>
    <div class="forms">
        <div class="form-content">
          <div class="login-form">
            <div class="title">Login</div>
          <form method="POST" action="">
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="text" placeholder="Enter your email" name='email' required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Enter your password" name='password' required>
              </div>
              <div class="text"><a href="#">Forgot password?</a></div>
              <div class="button input-box">
                <input type="submit" value="Submit">
              </div>
              <div class="text sign-up-text">Don't have an account? <label for="flip">Signup now</label></div>
            </div>
        </form>
      </div>
      
        <div class="signup-form">
          <div class="title">Signup</div>
        <form method="POST" action="">
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="Enter your name" name='name' required>
              </div>
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="text" placeholder="Enter your email" name='email' required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Enter your password" name='password' required>
              </div>
              <div class="button input-box">
                <input type="submit" value="Submit">
              </div>
              <div class="text sign-up-text">Already have an account? <label for="flip">Login now</label></div>
            </div>
        </form>
    </div>
    </div>
    </div>
  </div>
</body>
</html>
