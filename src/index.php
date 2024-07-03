<?php
include "connectdb.php";

if ($connectionSuccess) {
  session_start();
  include "core.php";
  // session_destroy();
}
?>