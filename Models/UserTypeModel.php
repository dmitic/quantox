<?php
  namespace App\Models;

  use \PDO;

  class UserTypeModel extends Model {
    
   public function getTypeNameByTypeId($typeId){
    return $this->getByFieldName("type_id", $typeId);
   }

   /**
    * returns types from database table user_type
    *
    * @return array
    */
   public function getAllTypes(): array {
     $result = $this->getAll();
     usort($result, function ($a, $b){
        return strcmp($a->type_id, $b->type_id);
     });
     return $result;
   }

   /**
    * returns types for search page depending on search criteria
    *
    * @param integer $typeSearch
    * @return array
    */
   public function getTypesByTypeSearch(int $typeSearch): array {
    $query = "SELECT * FROM user_type WHERE type_id LIKE CONCAT(:typeSearch, '%');";
      $stmt = $this->getConnection()->prepare($query);
      $result = $stmt->execute(['typeSearch' => $typeSearch]);

      $res = [];
      if($result) {
        $res = $stmt->fetchAll(PDO::FETCH_OBJ);
      }
      return $res;
   }

  }