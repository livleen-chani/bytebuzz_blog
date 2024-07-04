<?php 
  ob_start();
  include "../Component/topBar.php";

  if(!isset($_SESSION['username'])) {
    header("Location: login.php");
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
                <img src="../Component/Style/topBar/Resource/Logo.png">
              </div>
              <div id="UserData">
                <p id="Username"><?php echo $_SESSION['username']; ?></p>
                <p id="Blogs">BLOGS: 10</p>
              </div>
            </div>
            <div id="ProfileMiddle">
              <div id="ProfileDecor"></div>
              <div id="ProfileDecor"></div>
              <div id="ProfileDecor"></div>
              <div id="ProfileDecor"></div>
              <div id="ProfileButton">
                <img src="Style/profileView/Resource/edit.png">
              </div>
            </div>
            <div id="ProfileEnd">
              <p id="AboutText">ABOUT:</p>
              <p id="AboutData">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo molestias illo ea ex recusandae magni libero nihil laudantium blanditiis delectus?</p>
            </div>
          </div>
        </div>
      <div class="UserPost">
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
            <p id="HeadlineData"><b>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente</b></p>
            <p id="ReadTime">5m read time</p>
          </div>
          <div id="ImageHolder">
            <div id="CoverImage">
              <img src="../Component/Style/BlogCard/Resource/PostBG.jpg">
            </div>
          </div>
          <div id="Tags">
            <div class="TagData">
              <p>CSS</p>
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