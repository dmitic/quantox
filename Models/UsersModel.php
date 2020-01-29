<?php
  namespace App\Models;

  use App\DB\DatabaseConnection;
  use \PDO;

  class UsersModel extends Model {
 
    /**
     * GetUser helper function
     *
     * @param string $field
     * @param [type] $val
     * @return void
     */
    public function getUser(string $field, $val) {
      $query = "SELECT * FROM users WHERE " . $field . " = :str;";
      $stmt = $this->getConnection()->prepare($query);
      $result = $stmt->execute(['str' => $val]);

      $user = NULL;
      if($result) {
        $user = $stmt->fetch(PDO::FETCH_OBJ);
      }
      return $user;
    }

    /**
     * Returns all users
     *
     * @return array
     */
    public function getAll(): array {
      $query = "SELECT * FROM users;";
      $stmt = $this->getConnection()->prepare($query);
      $result = $stmt->execute();

      $users = [];
      if ($result){
        $users = $stmt->fetchAll(PDO::FETCH_OBJ);
      }

      return $users;
    }

    /**
     * Return number of users by user type
     *
     * @param integer $type
     * @return integer
     */
    public function countUsersByType(int $type): int {
      $query = "SELECT * FROM users WHERE user_type = :user_type;";
      $stmt = $this->getConnection()->prepare($query);
      $result = $stmt->execute(['user_type' => $type]);

      $users = [];
      if ($result) {
        $users = $stmt->fetchAll(PDO::FETCH_OBJ);
      }
      return count($users);
    }

    /**
     * Returns user by user's ID
     *
     * @param integer $userId
     * @return void
     */
    public function getById(int $userId) {
      return $this->getUser("id", $userId);
    }

    /**
     * Returns user by user's email
     *
     * @param string $email
     * @return void
     */
    public function getByEmail(string $email) {
      return $this->getUser("email", $email);
    }

    /**
     * Return user by name
     *
     * @param string $name
     * @return void
     */
    public function getByName(string $name) {
      return $this->getUser("name", $name);
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