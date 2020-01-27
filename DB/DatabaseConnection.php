<?php
  namespace App\DB;

  use \PDO;

  class DatabaseConnection {
    private $connection;
    private $config;

    public function __construct(DatabaseConfig $dbConfig) {
      $this->config = $dbConfig;
    }

    public function getConnection(): PDO {
      if($this->connection === NULL){
        $this->connection = new PDO($this->config->getDsn(), $this->config->getUser(), $this->config->getPass());
      }
      return $this->connection;
    }
  }