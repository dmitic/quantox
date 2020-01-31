<?php
  namespace App\Controllers;

  use App\Models\UsersModel;

  use App\Validators\PasswordValidator;
  use App\Validators\MailValidator;
  
  class RegisterController extends Controller{
    
    public function register(){
      $user_type = filter_input(INPUT_POST, 'userType', FILTER_SANITIZE_STRING);
      $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
      $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
      $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
      $confirmed_password = filter_input(INPUT_POST, 'confirmed_password', FILTER_SANITIZE_STRING);

      // Validacije
      $mailValidator = new MailValidator($this->getDBConnection());
      $validated = $mailValidator->validate($email);
      if($validated === true){
        $passValidator = new PasswordValidator($this->getDBConnection());
        $validated = $passValidator->validate_register($password, $confirmed_password);
      }

      // Ako prođe validaciju pravi niz sa podacima i snima ih u DB, u suprotnom prikazuje poruku koju su vratili validatori
      if($validated === true){
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $usersModel = new UsersModel($this->getDBConnection());
        $userArray = [
          'user_type' => $user_type,
          'name' => $name,
          'email' => $email,
          'passwordhash' => $passwordHash
        ];

        $user = $usersModel->store($userArray);

        // Ako uspešno snimi redirektuje u dashboard ili search.php zavisno da li je upotrebljen search (nelogovan) ili ne
        if ($user){
          $_SESSION['is_logged'] = true;
          $_SESSION['user_id'] = $user;
          ob_clean();
          if($_SESSION['str']){
            header("Location: search.php?str=" . $_SESSION['str'] . "&userType=" . $_SESSION['userType']);
          } else {
            header("Location: dashboard.php");
          }
        } else {
          $_SESSION['poruka'] = ['status' => 'greska', 'msg' =>'Error: Unknown error, please try again later!'];
          return;
        }
      } else {
        $_SESSION['poruka'] = $validated;
      }
    }

  }

 