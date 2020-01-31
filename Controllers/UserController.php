<?php
  namespace App\Controllers;

  use App\Models\UsersModel;

  class UserController extends Controller {

    public function delete($id){
      $userModel = new UsersModel($this->getDBConnection());
      $res = $userModel->delete($id);

      if($res){
        return true;
      }
      return false;
    }
  }