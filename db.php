<?php

  require_once('vendor\autoload.php');

  use App\DB\Config;
  use App\DB\DatabaseConfig;
  use App\DB\DatabaseConnection;

  $dbConfig = new DatabaseConfig(
      Config::DB_HOST,
      Config::DB_USER,
      Config::DB_PASS,
      Config::DB_NAME
    );

  $dbConnection = new DatabaseConnection($dbConfig);