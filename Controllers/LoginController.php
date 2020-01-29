<?php
  namespace App\Controllers;

  use App\Models\UsersModel;

  class LoginController extends Controller {

    public function login(){

      $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
      $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

      $usersModel = new UsersModel($this->getDBConnection());
      $user = $usersModel->getByEmail($email);

      if (!$user){
        $_SESSION['poruka'] = ['status' => 'greska', 'msg' =>'Error: User with email address ' . $email . ' is not registered!'];
        return;
      }

      if(!password_verify($password, $user->password)){
        $_SESSION['poruka'] = ['status' => 'greska', 'msg' =>'Error: Incorrect password!'];
        sleep(1);
        return;
      }

      $_SESSION['is_logged'] = true;
      $_SESSION['user_id'] = $user->id;
      
      ob_clean();
      if($_SESSION['str']){
        header("Location: search.php?str=" . $_SESSION['str'] . "&userType=" . $_SESSION['userType']);
      } else {
        header("Location: dashboard.php");
      }
      exit;
    }
    
    public function logout() {

      session_destroy();
      unset($_SESSION['is_logged']);
      unset($_SESSION['user_id']);
      unset($_SESSION['str']);
      unset($_SESSION['userType']);
      
      ob_clean();
      header("Location: index.php");
      exit;
    }
  }