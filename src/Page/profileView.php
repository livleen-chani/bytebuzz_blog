<?php 
  ob_start();
  include "../Component/topBar.php";

  if(!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
  }

  $personalAccount = true;

  if(isset($_GET['user']) && !empty($_GET['user'])) {
    if($_SESSION['username'] == $_GET['user']) {
      $personalAccount = true;
    } else {
      $personalAccount = false;
    }
  } else {
    $redirect = "profileView.php?user=".$_SESSION['username'];
    header("Location: $redirect");
    exit();
  }

  $user = filter_var($_GET['user'], FILTER_SANITIZE_SPECIAL_CHARS);

  //Prepare For Bind
  $stmt = $conn->prepare("SELECT username, about, profilePic, blogCount FROM account WHERE username = ?");
  
  //Bind Parameters
  $stmt->bind_param("s", $user);
  $stmt->bind_result($profileName, $about, $profilePic, $blogCount);

  $stmt->execute();


  $stmt->store_result();
  $num_rows = $stmt->num_rows;
  
  if($num_rows == 0) {
    header("Location: errorPage.php");
  }
  
  //Fetch and Process Data
  $stmt->fetch();


  // Getting Profile View Ready!
  if(empty($profilePic)) {
    $profilePic = "../Component/Style/topBar/Resource/Logo.png";
  }
    
  ob_end_flush();
?>

  <head>
    <link rel="stylesheet" href="Style/profileView/profileView.css">
  </head>

  <div id="ProfileViewWrapper">
    <div id="ContentContainer">
      <div id="Profile">
          <div id="ProfileHolder">
            <div id="ProfileHead">
              <div id="DP">
                <img src= <?php echo $profilePic; ?> >
              </div>
              <div id="UserData">
                <p id="Username"> <?php echo $profileName; ?> </p>
                <p id="Blogs">Blogs: <?php echo $blogCount; ?></p>
              </div>
            </div>
            <div id="ProfileMiddle">
              <div id="ProfileDecor"></div>
              <div id="ProfileDecor"></div>

              <div id="ProfileLogout" onclick="TopBarNavigation('logout.php')">
                <img src="Style/profileView/Resource/logout.png">
              </div>
              <div id="ProfileButton">
                <img src="Style/profileView/Resource/edit.png">
              </div>
            </div>
            <div id="ProfileEnd">
              <p id="AboutText">ABOUT:</p>
              <p id="AboutData"> <?php echo $about; ?> </p>
            </div>
          </div>
        </div>
      <div class="UserPost" onclick="TopBarNavigation('postView.php?postId=')">
        <div id="Content">
          <div id="PostUser">
            <div id="DP">
              <img src="../Component/Style/topBar/Resource/Logo.png">
            </div>
            <div id="PostHead">
              <p id="Username"><b>CHANI</b></p>
              <p id="Date">June 10</p>
            </div>
          </div>
          <div id="PostHeadline">
            <p id="HeadlineData">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente gdsqw</p>
            <p id="ReadTime">5m read time</p>
          </div>
          <div id="ImageHolder">
            <div id="CoverImage">
              <img src="../Component/Style/BlogCard/Resource/PostBG.jpg">
            </div>
          </div>
          <div id="Tags">
            <div class="TagData">
              <p>lkihnsadjhasvdas</p>
            </div>
            <div class="TagData">
              <p>lkihnsadjhasvdas</p>
            </div>
            <div class="TagData">
              <p>lkihnsadjhasvdas</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="ProfileFooter">
    </div>
  </div>

<!-- End Div for topBar (Do not remove); -->
</div> 