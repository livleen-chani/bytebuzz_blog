<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if(isset($_POST['register'])) {
    $_SESSION['SignUp'] = 1;
  }

  if(isset($_POST['login'])) {

    // Clean Input to prevent SQL Injection
    $username = filter_var($_POST['username'], FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_SPECIAL_CHARS);

    $sql = "SELECT * FROM account WHERE username = '$username'";
    $data = mysqli_query($conn, $sql);

    if($data->num_rows == 1) {
      $row = $data->fetch_assoc();
      echo $row['username'];
      $_SESSION['username'] = $row['username'];
    }

    $_SESSION['LogIn'] = 1;
  }
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
          <input type="submit" value="LogIn" name="login">
        </div>
      </form>
        <div id="Register">
          <p>Don't have an account yet? </p>
          <form action="" method="post">
            <input type="submit" value="Register" name="register">
          </form>
        </div>
    </div>
  </div>
</div>