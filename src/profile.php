<?php
  if ($_SESSION['SignUp']) {
    include "Profile/signup.php";
  } else {
    if(($_SESSION['LogIn'])) {
      include "Profile/profileView.php";
    } else if (!$_SESSION['LogIn']) {
      include "Profile/login.php";
    }
  }


  echo $_SESSION['username'];
?>