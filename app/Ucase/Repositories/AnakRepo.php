<?php

namespace App\Ucase\Repositories;

use App\Models\AnakModels;
use App\Ucase\Interfaces\AnakInterface;

class AnakRepo implements AnakInterface
{

  public function getAllData($params, $limit, $page)
  {
    try {
      $dbCon = new AnakModels;
      $count = $dbCon->count();
      $dataList = $dbCon->gugatan($params);
      $anak = array(
        'message' => 'Success to get data',
        'code' => 200,
        'data' => $dataList->AnakList($limit, $page)->get(),
        'meta' => array(
          'limit' => (int)$limit,
          'page' => (int)$page,
          'page_of' => ceil($count / $limit),
          'total' => $count
        )
      );
    } catch (\Throwable $th) {
      $anak = array(
        'message' => $th->getMessage(),
        'code' => 500
      );
    }

    return $anak;
  }

  public function getDataById($id)
  {
    try {
      $dbCon = new AnakModels();
      $dataList = $dbCon->whereId($id)->first();

      if ($dataList) {
        $anak = array(
          'message' => 'Success to get data',
          'code' => 200,
          'data' => $dataList
        );
      } else {
        $anak = array(
          'message' => 'Not found',
          'code' => 404
        );
      }
    } catch (\Throwable $th) {
      $anak = array(
        'message' => $th->getMessage(),
        'code' => 500
      );
    }

    return $anak;
  }

  public function upsertData($id, array $detail)
  {
    try {
      $dbCon = new AnakModels();
      if ($id) {
        $anak = array(
          'message' => 'Success to update data',
          'code' => 200,
          'data' => $dbCon->whereId($id)->update($detail)
        );
      } else {
        $anak = array(
          'message' => 'Success to insert data',
          'code' => 200,
          'data' => $dbCon->create($detail)
        );
      }
    } catch (\Throwable $th) {
      $anak = array(
        'message' => $th->getMessage(),
        'code' => 500
      );
    }

    return $anak;
  }

  public function deleteData($id)
  {
    try {
      $dbCon = new AnakModels();
      $dataList = $dbCon->whereId($id);

      if ($dataList->first()) {
        $anak = array(
          'message' => 'Deleting data successfully',
          'code' => 200,
          'data' => $dataList->delete()
        );
      } else {
        $anak = array(
          'message' => 'Not found',
          'code' => 404
        );
      }
    } catch (\Throwable $th) {
      $anak = array(
        'message' => $th->getMessage(),
        'code' => 500
      );
    }

    return $anak;
  }
}
