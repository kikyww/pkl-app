<?php

session_start();
if(!isset($_SESSION['id_user'])){
  header('location:login/halaman_login.php');
} else {
  header('location:header/dashboard.php');
  
}

?>