<?php
  namespace App\Models;

  use App\DB\DatabaseConnection;
  use \PDO;
  
  abstract class Model {
    private $db;

    public function __construct(DatabaseConnection &$db) {
      $this->db = $db;
    }

    protected function getConnection(){
      return $this->db->getConnection();
    }

    /**
     * Extract table name in DB from a class name
     *
     * @return string
     */
    private function tableName(): string {
      $matches= [];
      preg_match('|^.*\\\((?:[A-Z][a-z]+)+)Model$|', static::class, $matches);
      $classNameUnder = preg_replace('|[A-Z]|', '_$0', $matches[1] ?? '');
      return substr(strtolower($classNameUnder), 1);
    }

    public function getById(int $id) {
      $query = "SELECT * FROM " . $this->tableName() . " WHERE id = :id;";
      $stmt = $this->getConnection()->prepare($query);
      $result = $stmt->execute(['id' => $id]);

      $res = NULL;
      if($result) {
        $res = $stmt->fetch(PDO::FETCH_OBJ);
      }
      return $res;
    }

    public function getAll(): array {
      $query = "SELECT * FROM " . $this->tableName() . ";";
      $stmt = $this->getConnection()->prepare($query);
      $result = $stmt->execute();

      $res = [];
      if ($result){
        $res = $stmt->fetchAll(PDO::FETCH_OBJ);
      }

      return $res;
    }

    private function isValidFieldName(string $fieldName){
      return boolval(preg_match('|^[a-z][a-z_0-9]+[a-z0-9]$|', $fieldName));
    }

    public function getByFieldName(string $fieldName, $val) {
      if(!$this->isValidFieldName($fieldName)){
        throw new Exception('Invalid field name: ' . $fieldName);
      }
      $query = "SELECT * FROM " . $this->tableName() . " WHERE " . $fieldName . " = :val;";
      $stmt = $this->getConnection()->prepare($query);
      $result = $stmt->execute(['val' => $val]);

      $res = NULL;
      if($result) {
        $res = $stmt->fetch(PDO::FETCH_OBJ);
      }
      return $res;
    }

    public function getAllByFieldName(string $fieldName, $val) {
      if(!$this->isValidFieldName($fieldName)){
        throw new Exception('Invalid field name: ' . $fieldName);
      }
      $query = "SELECT * FROM " . $this->tableName() . " WHERE " . $fieldName . " = :val;";
      $stmt = $this->getConnection()->prepare($query);
      $result = $stmt->execute(['val' => $val]);

      $res = [];
      if($result) {
        $res = $stmt->fetchAll(PDO::FETCH_OBJ);
      }
      return $res;
    }
  }