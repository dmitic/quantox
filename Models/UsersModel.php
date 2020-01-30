<?php
  namespace App\Models;

  use App\DB\DatabaseConnection;
  use \PDO;

  class UsersModel extends Model {

    public function getByEmail(string $email) {
      return $this->getByFieldName("email", $email);
    }

    public function getByName(string $name) {
      return $this->getByFieldName("name", $name);
    }

    public function countUsersByType(int $type): int {
      return count($this->getAllByFieldName('user_type', $type));
    }


    /**
     * Store new user into database and returns last inserted id
     *
     * @param array $userArray
     * @return void
     */
    public function store(array $userArray) {
      $query = "INSERT INTO users (`user_type`, `name`, `email`, `password`) 
                VALUES(:user_type, :name, :email, :passwordhash)";
      $stmt = $this->getConnection()->prepare($query);
      
      $result =  $stmt->execute([
          'user_type' => $userArray['user_type'], 
          'name' => $userArray['name'], 
          'email' => $userArray['email'], 
          'passwordhash' => $userArray['passwordhash']
          ]);

      if (!$result) {
        return false;
      }

      return $this->getConnection()->lastInsertId();
    }
  }