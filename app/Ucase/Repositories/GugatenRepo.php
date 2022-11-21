<?php

namespace App\Ucase\Repositories;

use App\Models\GugatanModels;
use App\Ucase\Interfaces\GugatanInterface;

class GugatenRepo implements GugatanInterface
{

  public function getAllData($limit, $page, $search)
  {
    try {
      $dbCon = new GugatanModels;
      $count = $dbCon->count();
      $gugatan = array(
        'message' => 'Success to get data',
        'code' => 200,
        'data' => $dbCon->GugatanList($limit, $page, $search)->get(),
        'meta' => array(
          'limit' => (int)$limit,
          'page' => (int)$page,
          'page_of' => ceil($count / $limit),
          'total' => $count
        )
      );
    } catch (\Throwable $th) {
      $gugatan = array(
        'message' => $th->getMessage(),
        'code' => 500
      );
    }

    return $gugatan;
  }

  public function getDataById($id)
  {
    try {
      $dbCon = new GugatanModels();
      $dataList = $dbCon->whereId($id)->first();

      if ($dataList) {
        $gugatan = array(
          'message' => 'Success to get data',
          'code' => 200,
          'data' => $dataList
        );
      } else {
        $gugatan = array(
          'message' => 'Not found',
          'code' => 404
        );
      }
    } catch (\Throwable $th) {
      $gugatan = array(
        'message' => $th->getMessage(),
        'code' => 500
      );
    }

    return $gugatan;
  }

  public function upsertData($id, array $detail)
  {
    try {
      $dbCon = new GugatanModels();
      if ($id) {
        $gugatan = array(
          'message' => 'Success to update data',
          'code' => 200,
          'data' => $dbCon->whereId($id)->update($detail)
        );
      } else {
        $gugatan = array(
          'message' => 'Success to insert data',
          'code' => 200,
          'data' => $dbCon->create($detail)
        );
      }
    } catch (\Throwable $th) {
      $gugatan = array(
        'message' => $th->getMessage(),
        'code' => 500
      );
    }

    return $gugatan;
  }

  public function deleteData($id)
  {
    try {
      $dbCon = new GugatanModels();
      $dataList = $dbCon->whereId($id);

      if ($dataList->first()) {
        $gugatan = array(
          'message' => 'Deleting data successfully',
          'code' => 200,
          'data' => $dataList->delete()
        );
      } else {
        $gugatan = array(
          'message' => 'Not found',
          'code' => 404
        );
      }
    } catch (\Throwable $th) {
      $gugatan = array(
        'message' => $th->getMessage(),
        'code' => 500
      );
    }

    return $gugatan;
  }
}
