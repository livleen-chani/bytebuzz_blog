<?php 
  ob_start();
  include "../Component/topBar.php";

  if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_SPECIAL_CHARS);
    $username = filter_var($_POST['username'], FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_SPECIAL_CHARS);

    $username = strtolower($username);

    if(
        (strlen($email)< 3 || strlen($email)> 255) && 
        (strlen($username)< 5 || strlen($username)> 15) &&
        (strlen($password)< 8 || strlen($password)> 255)) {
      header("Location: errorPage.php");
    } else {
      //Prepare the Insertion
      $stmt = $conn->prepare("INSERT INTO account (username, password, email) VALUES (?, ?, ?)");
      
      //Bind Values
      $stmt->bind_param("sss", $username, $password, $email);
      
      // Check for any unwanted exception and redirect to errorPage
      try {
        $stmt->execute();
      } catch (mysqli_sql_exception $e) {
        header("Location: errorPage.php");
        die("Connection failed: " . $e->getMessage());
      }

      header("Location: login.php");
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
        <p>SignUp</p>
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