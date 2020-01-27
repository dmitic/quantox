<?php
  namespace App\DB;

  class DatabaseConfig {
    private $db_host;
    private $db_user;
    private $db_name;
    private $db_pass;

    public function __construct(string $db_host, string $db_user, string $db_pass, string $db_name){
      $this->db_host = $db_host;
      $this->db_user = $db_user;
      $this->db_name = $db_name;
      $this->db_pass = $db_pass;
    }

    public function getDsn(): string {
      return "mysql:host={$this->db_host};dbname={$this->db_name};charset=utf8";
    }

    public function getUser(): string {
      return $this->db_user;
    }

    public function getPass(): string {
      return $this->db_pass;
    }
  }