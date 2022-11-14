<?php

namespace App\Ucase\Repositories;

use App\Models\HakimModels;
use App\Ucase\Interfaces\HakimInterface;

class HakimRepo implements HakimInterface
{

  public function getAllData($limit, $page)
  {
    try {
      $dbCon = new HakimModels;
      $count = $dbCon->count();
      $hakim = array(
        'message' => 'Success to get data',
        'code' => 200,
        'data' => $dbCon->HakimList($limit, $page)->get(),
        'meta' => array(
          'limit' => $limit,
          'page' => $page,
          'page_of' => ceil($count / $limit),
          'total' => $count
        )
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
    try {
      $dbCon = new HakimModels;
      $dataList = $dbCon->whereId($id)->first();

      if ($dataList) {
        $hakim = array(
          'message' => 'Success to get data',
          'code' => 200,
          'data' => $dataList
        );
      } else {
        $hakim = array(
          'message' => 'Not found',
          'code' => 404
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
    try {
      $dbCon = new HakimModels;
      $dataList = $dbCon->whereId($id);

      if ($dataList->first()) {
        $hakim = array(
          'message' => 'Deleting data successfully',
          'code' => 200,
          'data' => $dataList->delete()
        );
      } else {
        $hakim = array(
          'message' => 'Not found',
          'code' => 404
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
}
