<?php

namespace App\Ucase\Repositories;

use App\Models\User;
use App\Ucase\Interfaces\UserInterface;

class UserRepo implements UserInterface {

  public function getAllData() {
    try {
      $dbCon = new User();
      $user = array(
        'message' => 'Success to get data',
        'code' => 200,
        'data' => $dbCon->all()
      );
    } catch (\Throwable $th) {
      $user = array(
        'message' => $th->getMessage(),
        'code' => 500
      );
    }

    return $user;
  }

  public function getDataById($id)
  {
    try {
      $dbCon = new User();
      $dataList = $dbCon->whereId($id)->first();

      if ($dataList) {
        $user = array(
          'message' => 'Success to get data',
          'code' => 200,
          'data' => $dataList
        );
      } else {
        $user = array(
          'message' => 'Not found',
          'code' => 404
        );
      }
      
    } catch (\Throwable $th) {
      $user = array(
        'message' => $th->getMessage(),
        'code' => 500
      );
    }

    return $user;
  }

  public function upsertData($id, array $detail)
  {
    try {
      $dbCon = new User();
      if ($id) {
        $user = array(
          'message' => 'Success to update data',
          'code' => 200,
          'data' => $dbCon->whereId($id)->update($detail)
        );
      } else {
        $user = array(
          'message' => 'Success to insert data',
          'code' => 200,
          'data' => $dbCon->create($detail)
        );
      }
    } catch (\Throwable $th) {
      $user = array(
        'message' => $th->getMessage(),
        'code' => 500
      );
    }

    return $user;
  }

  public function deleteData($id)
  {
    try {
      $dbCon = new User();
      $dataList = $dbCon->whereId($id);

      if ($dataList->first()) {
        $user = array(
          'message' => 'Deleting data successfully',
          'code' => 200,
          'data' => $dataList->delete()
        );
      } else {
        $user = array(
          'message' => 'Not found',
          'code' => 404
        );
      }
    } catch (\Throwable $th) {
      $user = array(
        'message' => $th->getMessage(),
        'code' => 500
      );
    }

    return $user;
  }
}