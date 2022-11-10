<?php

namespace App\Ucase\Repositories;

use App\Models\HakimModels;
use App\Ucase\Interfaces\HakimInterface;

class HakimRepo implements HakimInterface {

  public function getAllData() {
    try {
      $dbCon = new HakimModels;
      $hakim = array(
        'message' => 'Success to get data',
        'code' => 200,
        'data' => $dbCon->all()
      );
    } catch (\Throwable $th) {
      $hakim = array(
        'message' => $th->getMessage(),
        'code' => 500
      );
    }

    return $hakim;
  }

  public function getDataById($id)
  {
    
  }

  public function upsertData($id, array $detail)
  {
    try {
      $dbCon = new HakimModels;
      if ($id) {
        $hakim = array(
          'message' => 'Success to update data',
          'code' => 200,
          'data' => $dbCon->whereId($id)->update($detail)
        );
      } else {
        $hakim = array(
          'message' => 'Success to insert data',
          'code' => 200,
          'data' => $dbCon->create($detail)
        );
      }
    } catch (\Throwable $th) {
      $hakim = array(
        'message' => $th->getMessage(),
        'code' => 500
      );
    }

    return $hakim;
  }

  public function deleteData($id)
  {
    
  }
}