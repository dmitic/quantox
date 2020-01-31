<?php
  namespace App\Models;

  use \PDO;

  class UsersModel extends Model {

    /**
     * return user if email address is alreadi registered
     *
     * @param string $email
     * @return void
     */
    public function getByEmail(string $email) {
      return $this->getByFieldName("email", $email);
    }

    /**
     * Return users based on user_type
     *
     * @param integer $type
     * @return array
     */
    public function getAllByType(int $type): array {
      return $this->getAllByFieldName('user_type', $type);
    }

    /**
     * Return number of existing searched users per user type table
     *
     * @param integer $type
     * @param string $str
     * @return integer
     */
    public function countSearchedUsersByType(int $type, string $str): int {
      $query = "SELECT type_id,
                  (SELECT count(*) FROM `users`
                          WHERE `users`.user_type = type_id
                          AND (`users`.name LIKE CONCAT('%', :str, '%') OR `users`.email LIKE CONCAT('%', :str, '%'))) AS broj
                FROM user_type WHERE type_id = :type;";
      $stmt = $this->getConnection()->prepare($query);
      $result =  $stmt->execute(['str' => $str, 'type' => $type]);

      $res = NULL;
      if($result) {
        $res = $stmt->fetch(PDO::FETCH_OBJ);
      }
      return $res->broj;
    }

    /**
     * Returns number od all users by user type
     *
     * @param integer $type
     * @return integer
     */
    public function countUsersByType(int $type): int {
      return count($this->getAllByType($type));
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

    public function search(string $query, $arr){
      $stmt = $this->getConnection()->prepare($query);
      $result = $stmt->execute($arr);
      $res = [];
      if($result) {
        $res = $stmt->fetchAll(PDO::FETCH_OBJ);
      }
      return $res;
    }
    public function searchDefault(string $str, int $type){
      $query = "SELECT * FROM users WHERE user_type LIKE CONCAT(:type, '%') AND (name LIKE CONCAT('%', :str, '%') OR email LIKE CONCAT('%', :str, '%'))";
      return $this->search($query, ['str' => $str, 'type' => $type]);
    }

    public function searchByType(string $str, int $type){
      $query = "SELECT * FROM users WHERE user_type = :type AND (name LIKE CONCAT('%', :str, '%') OR email LIKE CONCAT('%', :str, '%'))";
      return $this->search($query, ['str' => $str, 'type' => $type]);
    }

    public function delete(int $id){
      $query = "DELETE FROM users WHERE id = :id LIMIT 1";
      $stmt = $this->getConnection()->prepare($query);
      $result = $stmt->execute(['id' => $id]);

      if (!$result) {
        return false;
      }

      return true;
    }
  }