<?php 
  ob_start();
  include "../Component/topBar.php";

  if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = filter_var($_POST['username'], FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_SPECIAL_CHARS);

    $username = strtolower($username);

    //Prepare for Binding
    $stmt = $conn->prepare("SELECT * FROM account WHERE username = ?");
    
    //Bind Parameters
    $stmt->bind_param("s", $username);

    try {
      $stmt->execute();
      $stmt->bind_result($id, $user, $pass, $mail, $profile);
    } catch (mysqli_sql_exception $e) {
      header("Location: errorPage.php");
      die("Connection failed: " . $e->getMessage());
    }

    while($stmt->fetch()) {
      if($user == $username && $pass == $password) {
        $_SESSION['username'] = $user;
        echo $_SESSION['username'];
        header("Location: profileView.php");
      }
    }

  }

  ob_end_flush();
?>

  <head>
    <link rel="stylesheet" href="Style/login/login.css">
  </head>
  
  <div id="LoginWrapper">
    <div id="LoginBox">
      <div id="CompanyLogo">
        <img src="../Component/Style/topBar/Resource/Logo.png">
      </div>
      <div>
        <form action="" method="post">
          <ul id="LoginForm">
            <li><p>USERNAME</p></li>
            <li><input type="text" maxlength="15" minlength="5" name="username" required></li>
            <li><p>PASSWORD</p></li>
            <li><input type="password" maxlength="255" minlength="8" name="password" required></li>
            <li><input type="submit" value="LogIn" id="SubmitButton"></li>
          </ul>
        </form>
      </div>
      <div id="LinkToSignUp">
        <p>Don't have an account yet?<b onclick="TopBarNavigation('signup.php')"> Register</b></p>
      </div>
    </div>
  </div>

<!-- End Div for topBar (Do not remove); -->
</div> 