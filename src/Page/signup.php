<?php 
  ob_start();
  include "../Component/topBar.php";

  if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_SPECIAL_CHARS);
    $username = filter_var($_POST['username'], FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_SPECIAL_CHARS);

    $username = strtolower($username);
    $email = strtolower($email);

    if(
        (strlen($email)< 3 || strlen($email)> 255) && 
        (strlen($username)< 5 || strlen($username)> 15) &&
        (strlen($password)< 8 || strlen($password)> 255)) {
      header("Location: errorPage.php");
    } else {

      $_SESSION['tempUsername'] = $username;
      $_SESSION['tempEmail'] = $email;
      $_SESSION['tempPassword'] = $password;

      header("Location: devKey.php");
    }
  }
  ob_end_flush();
?>

  <head>
    <link rel="stylesheet" href="Style/signup/signup.css">
  </head>
  
  <div id="SignupWrapper">
    <div id="SignupBox">
      <div id="CompanyLogo">
        <img src="../Component/Style/topBar/Resource/Logo.png" hidden>
        <p id="FormHead">SignUp</p>
      </div>
      <div>
        <form action="" method="post">
          <ul id="SignupForm">
            <li><p>EMAIL</p></li>
            <li><input type="email" maxlength="255" minlength="3" name="email" required></li>
            <li><p>USERNAME</p></li>
            <li><input type="text" maxlength="15" minlength="5" name="username" required></li>
            <li><p>PASSWORD</p></li>
            <li><input type="password" maxlength="255" minlength="8" name="password" required></li>
            <li><input type="submit" value="Signup" id="SubmitButton"></li>
          </ul>
        </form>
      </div>
      <div id="LinkToSignUp">
        <p>Have an accountt?<b onclick="TopBarNavigation('login.php')"> Login</b></p> 
      </div>
    </div>
  </div>

<!-- End Div for topBar (Do not remove); -->
</div> 