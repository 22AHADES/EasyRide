<?php
require 'includes/init.php';
// IF USER MAKING LOGIN REQUEST
if(isset($_POST['email']) && isset($_POST['password'])){
  $result = $user_obj->loginUser($_POST['email'],$_POST['password']);
}
// IF USER ALREADY LOGGED IN
if(isset($_SESSION['email'])){
  header('Location: profile.php');
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="./style.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<h2 class="text-center pb-5">Easy Ride</h2>
  <div class="d-flex justify-content-center">
  <div class="main_container login_signup_container">
    <h1>Login</h1>
    <form action="" method="POST">
      <label for="email">Email</label>
      <input type="email" id="email" name="email" spellcheck="false" placeholder="Enter your email address" required>
      <label for="password">Password</label>
      <input type="password" id="password" name="password" placeholder="Enter your password" required>
      <input type="submit" value="Login">
      <a href="signup.php" class="form_link">Sign Up</a>
      <br></br>
      <a href="employee_index.php" class="form_link">Employee Login</a>
      <div>  
      <?php
        if(isset($result['errorMessage'])){
          echo '<p class="errorMsg">'.$result['errorMessage'].'</p>';
        }
        if(isset($result['successMessage'])){
          echo '<p class="successMsg">'.$result['successMessage'].'</p>';
        }
      ?>    
    </div>
    </form>
    
  </div>
      </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>