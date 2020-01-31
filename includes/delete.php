<?php
session_start();
require_once('../db.php');

use App\Controllers\UserController;

if(isset($_POST['delete'])){
  $id = $_POST['user_del_id'];
  $userCtrl = new UserController($dbConnection);
  $res = $userCtrl->delete($id);
  ob_clean();
  if ($res){
    $_SESSION['poruka'] = ['status' => 'greska', 'msg' =>'User deleted!'];
    header('Location: ' . $_SERVER['HTTP_REFERER']);
  } else {
    $_SESSION['poruka'] = ['status' => 'greska', 'msg' =>'There was an error, please try again!'];
    header('Location: ' . $_SERVER['HTTP_REFERER']);
  }
}