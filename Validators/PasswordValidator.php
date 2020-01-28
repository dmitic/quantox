<?php
  namespace App\Validators;


  class PasswordValidator {

    /**
     * Validating password
     *
     * @param string $password
     * @param string $confirmed_password
     * @return void
     */
    public function validate(string $password, string $confirmed_password){
      if (empty(trim($password))){
        return ['status' => 'greska', 'msg' =>'Error: Password field is required and it can not be empty string!'];
      }

      if (strlen(trim($password)) < 3){
        return ['status' => 'greska', 'msg' =>'Error: Password must be atleast 3 chars!'];
      }

      if (trim($password) !== $confirmed_password){
        return ['status' => 'greska', 'msg' =>'Error: Confirmation password does not match!'];
      }

      return true;
    }
  }