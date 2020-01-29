<?php
  namespace App\Models;

  use App\DB\DatabaseConnection;
  use \PDO;
  
  class Model {
    private $db;

    public function __construct(DatabaseConnection &$db) {
      $this->db = $db;
    }

    protected function getConnection(){
      return $this->db->getConnection();
    }
    
  }