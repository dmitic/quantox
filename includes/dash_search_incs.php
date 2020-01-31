<?php
  use App\Models\UsersModel;
  use App\Models\UserTypeModel;

  use App\Controllers\UserController;

  $usersModel = new UsersModel($dbConnection);
  $typeModel = new UserTypeModel($dbConnection);
  $usersController = new UserController($dbConnection);
  $user = $usersModel->getById($_SESSION['user_id']);