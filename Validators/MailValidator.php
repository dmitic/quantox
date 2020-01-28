<?php
  namespace App\Validators;

  use App\Models\UserModel;
  use App\DB\DatabaseConnection;
  
  class MailValidator {
    private $db;
    
    public function __construct(DatabaseConnection &$db) {
      $this->db = $db;
    }

    public function &getDBConnection(): DatabaseConnection {
      return $this->db;
    }

    /**
     * Check if email is already registered
     *
     * @param string $email
     * @return void
     */
    public function validate(string $email){
      $userModel = new UserModel($this->getDBConnection());
      $user = $userModel->getByEmail($email);
      if ($user){
        return ['status' => 'greska', 'msg' =>'Error: Email address is already taken!'];
      }

      return true;

    }
  }