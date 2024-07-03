<?php 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ByteBuzz</title>

  <!-- JS Files -->
  <script src="JS/core.js" defer></script>

  <link rel="stylesheet" href="Style/core.css">

  <!-- Profile CSS -->
  <link rel="stylesheet" href="Style/Profile/login.css">
</head>
<body>
  <div id="MainWrapper">
    <div id="MainTopBar">
      <!-- Top Bar -->
      <div id="MainTopWebsiteName">
        <!-- Website Logo & Name -->
        <a href="?location=feed">
          <img src="Style/Resources/Logo.png" alt="Logo">
          <img src="Style/Resources/bytebuzz.png" alt="bytebuzz">
        </a>
      </div>
      <div id="MainTopAccountControl">
        <a href="?location=post"><img src="Style/Resources/AddButton.png" alt="AddPost"></a>
        <a href="?location=profile"><div id="MainTopAccountProfile"></div></a>
      </div>
    </div>
    <div id="MainFeedBox">
      <?php 
        $_SESSION['username'] = null;

        if(empty($_GET['location'])) {
          $_GET['location'] = "feed";
        }
        switch($_GET['location']) {
          case "feed":
            include "feed.php";
            break;
          case "profile":
            include "profile.php";
            break;
          case "post":
            include "post.php";
            break;
        }
      ?>
    </div>
  </div>
</body>
</html>