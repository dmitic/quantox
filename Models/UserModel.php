<?php
  namespace App\Models;

  use App\DB\DatabaseConnection;
  use \PDO;

  class UserModel {
    private $db;

    public function __construct(DatabaseConnection $db) {
      $this->db = $db;
    }

    public function getAll(): array {
      $query = "SELECT * FROM users;";
      $stmt = $this->db->getConnection()->prepare($query);
      $result = $stmt->execute();

      $users = [];
      if ($result){
        $users = $stmt->fetchAll(PDO::FETCH_OBJ);
      }

      return $users;
    }

    public function getById(int $userId){
      $query = "SELECT * FROM users WHERE id = :id;";
      $stmt = $this->db->getConnection()->prepare($query);
      $result = $stmt->execute(['id' => $userId]);

      $user = NULL;
      if ($result){
        $user = $stmt->fetch(PDO::FETCH_OBJ);
      }

      return $user;
    }

    public function getByEmail(string $email){
      $query = "SELECT * FROM users WHERE email = :email;";
      $stmt = $this->db->getConnection()->prepare($query);
      $result = $stmt->execute(['email' => $email]);

      $user = NULL;
      if($result) {
        $user = $stmt->fetch(PDO::FETCH_OBJ);
      }
      return $user;
    }
  }