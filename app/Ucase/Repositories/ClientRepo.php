<?php

namespace App\Ucase\Repositories;

use App\Models\ClientModels;
use App\Ucase\Interfaces\ClientInterface;

class ClientRepo implements ClientInterface {

  public function getAllData() {
    try {
      $dbCon = new ClientModels();
      $client = array(
        'message' => 'Success to get data',
        'code' => 200,
        'data' => $dbCon->all()
      );
    } catch (\Throwable $th) {
      $client = array(
        'message' => $th->getMessage(),
        'code' => 500
      );
    }

    return $client;
  }

  public function getDataById($id)
  {
    try {
      $dbCon = new ClientModels();
      $dataList = $dbCon->whereId($id)->first();

      if ($dataList) {
        $client = array(
          'message' => 'Success to get data',
          'code' => 200,
          'data' => $dataList
        );
      } else {
        $client = array(
          'message' => 'Not found',
          'code' => 404
        );
      }
      
    } catch (\Throwable $th) {
      $client = array(
        'message' => $th->getMessage(),
        'code' => 500
      );
    }

    return $client;
  }

  public function upsertData($id, array $detail)
  {
    try {
      $dbCon = new ClientModels();
      if ($id) {
        $client = array(
          'message' => 'Success to update data',
          'code' => 200,
          'data' => $dbCon->whereId($id)->update($detail)
        );
      } else {
        $client = array(
          'message' => 'Success to insert data',
          'code' => 200,
          'data' => $dbCon->create($detail)
        );
      }
    } catch (\Throwable $th) {
      $client = array(
        'message' => $th->getMessage(),
        'code' => 500
      );
    }

    return $client;
  }

  public function deleteData($id)
  {
    try {
      $dbCon = new ClientModels();
      $dataList = $dbCon->whereId($id);

      if ($dataList->first()) {
        $client = array(
          'message' => 'Deleting data successfully',
          'code' => 200,
          'data' => $dataList->delete()
        );
      } else {
        $client = array(
          'message' => 'Not found',
          'code' => 404
        );
      }
    } catch (\Throwable $th) {
      $client = array(
        'message' => $th->getMessage(),
        'code' => 500
      );
    }

    return $client;
  }
}