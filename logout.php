<?php
session_start();
require_once('db.php');

use App\Controllers\LoginController;

if(isset($_POST['logout'])){
      $logout = new LoginController($dbConnection);
      $logout->logout(); 
  }
