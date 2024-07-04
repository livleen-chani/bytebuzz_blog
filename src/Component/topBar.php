<?php 
  ob_start();
  include "../connectdb.php";
  ob_end_flush();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ByteBuzz</title>

  <link rel="stylesheet" href="../Component/Style/topBar/topBar.css">
  <script src="../JS/topBar.js" defer></script>
</head>
<body>
  <div id="MainWrapper">
    <div id="TopBar">
      <!-- Top Bar -->
      <div id="WebsiteName" onclick="TopBarNavigation('feed.php')">
        <!-- Website Logo & Name -->
          <img src="../Component/Style/topBar/Resource/Logo.png" alt="Logo">
          <img src="../Component/Style/topBar/Resource/bytebuzz.png" alt="bytebuzz">
      </div>
      <div id="AccountControl">
        <img src="../Component/Style/topBar/Resource/AddButton.png" alt="AddPost" onclick="TopBarNavigation('post.php')">
        <div id="AccountProfile" onclick="TopBarNavigation('profileView.php')"></div>
      </div>
    </div>
</body>
</html>