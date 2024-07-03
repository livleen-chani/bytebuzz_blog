<?php 
  if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['signupbutton'])) {
    // Clean Input to prevent SQL Injection
    $username = filter_var($_POST['username'], FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_SPECIAL_CHARS);

    $sql = "INSERT INTO account (username, password) VALUES ('$username', '$password');";

    $result = mysqli_query($conn, $sql);
    $_SESSION['SignUp'] = 0;
    $_SESSION['LogIn'] = 1;
  }

  if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['returnButton'])) {
    $_SESSION['SignUp'] = 0;
  }
?>

<div id="LoginWrapper">
  <div id="LoginBox">
    <div>
      <div id="LoginLogo">
        <img src="Style/Resources/Logo.png" alt="">
      </div>
      <form action="" method="post" id="LoginForm">
        <div id="Username">
          <p>Username</p>
          <input type="text" required name="username">
        </div>
        <div id="Password">
          <p>Password</p>
          <input type="password" required name="password"> 
        </div>
        <div id="SubmitButton">
          <input type="submit" value="SignUp" name="signupbutton">
        </div>
      </form>
      <form action="" method="post">
        <input type="submit" value="Return to LogIn" name="returnButton">
      </form>
    </div>
  </div>
</div>