<?php
  namespace App\Controllers;

  use App\Models\UserModel;
  use App\DB\DatabaseConnection;

  class LoginController {

  private $db;
    
    public function __construct(DatabaseConnection &$db) {
      $this->db = $db;
    }

    public function &getDBConnection(): DatabaseConnection {
      return $this->db;
    }

    public function login(){

      $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
      $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

      $userModel = new UserModel($this->getDBConnection());
      $user = $userModel->getByEmail($email);

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