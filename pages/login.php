<?php


  if ($_COOKIE['user'] == "True") {
    // logout
    setcookie("user", "True", time() - 3600, '/');
  } else {
    // login
    setcookie("user", "True", time() + 3600, '/');
  }

  header("Location: ../index.php");
//  setcookie("", "true");
?>