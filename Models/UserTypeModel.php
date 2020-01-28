<?php
  namespace App\Models;

  use App\DB\DatabaseConnection;
  use \PDO;

  class UserTypeModel {
    private $db;

    public function __construct(DatabaseConnection $db) {
      $this->db = $db;
    }
    /**
     * Returns all user types
     *
     * @return array
     */
    public function getAll(): array {
      $query = "SELECT * FROM user_type;";
      $stmt = $this->db->getConnection()->prepare($query);
      $result = $stmt->execute();

      $types = [];
      if ($result){
        $types = $stmt->fetchAll(PDO::FETCH_OBJ);
      }

      return $types;
    }

    /**
     * Returns user type by usertype Id
     *
     * @param integer $id
     * @return string
     */
    public function getTypeById(int $id): string {
      $query = "SELECT * FROM user_type;";
      $stmt = $this->db->getConnection()->prepare($query);
      $result = $stmt->execute();

      $type = NULL;
      if ($result){
        $type = $stmt->fetch(PDO::FETCH_OBJ);
      }

      return $type;
    }
  }