<?php 
  namespace App\Controllers;

  use App\DB\DatabaseConnection;

  abstract class Controller {
    private $db;
    
    public function __construct(DatabaseConnection &$db) {
      $this->db = $db;
    }

    public function &getDBConnection(): DatabaseConnection {
      return $this->db;
    }
  }