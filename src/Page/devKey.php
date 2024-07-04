<?php 
  ob_start();
  include "../Component/topBar.php";

  if(empty($_SESSION['tempUsername']) || empty($_SESSION['tempPassword']) || empty($_SESSION['tempEmail'])) {
    if(!isset($_SESSION['username'])) {
      header("Location: profileView.php");
      exit();
    }
  }

  if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['devkey'] == $devKey) {
    //Prepare the Insertion
    $stmt = $conn->prepare("INSERT INTO account (username, password, email) VALUES (?, ?, ?)");
        
    //Bind Values
    $stmt->bind_param("sss", $_SESSION['tempUsername'], $_SESSION['tempPassword'], $_SESSION['tempEmail']);
    
    // Check for any unwanted exception and redirect to errorPage
    try {
      $stmt->execute();
    } catch (mysqli_sql_exception $e) {
      header("Location: errorPage.php");
      die("Connection failed: " . $e->getMessage());
    }

    header("Location: login.php");
    exit();
  }
  ob_end_flush()
?>
  <head>
    <link rel="stylesheet" href="Style/devKey/devKey.css">
  </head>

  <div id="MainContainer">
    <div id="DevKey">
      <form action="" method="post">
        <div id="DevLogo">
          <img src="Style/devKey/Resource/code.png">
        </div>
        <div id="DevText">
          <p>DEVKEY</p>
        </div>
        <div id="KeyInput"> 
          <input type="text" placeholder="Dev Key" required minlength="4" maxlength="255" name="devkey">
        </div>
        <div id="SubmitButton">
          <input type="submit" value="Submit">
        </div>
      </form>
    </div>
  </div>

<!-- End Div for topBar (Do not remove); -->
</div> 