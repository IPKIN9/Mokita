<?php

namespace App\Ucase\Repositories;

use App\Models\PerkaraModels;
use App\Ucase\Interfaces\PerkaraInterface;

class PerkaraRepo implements PerkaraInterface
{

  public function getAllData($limit, $page)
  {
    try {
      $dbCon = new PerkaraModels();
      $count = $dbCon->count();
      $perkara = array(
        'message' => 'Success to get data',
        'code' => 200,
        'data' => $dbCon->PerkaraList($limit, $page)->get(),
        'meta' => array(
          'limit' => (int)$limit,
          'page' => (int)$page,
          'page_of' => ceil($count / $limit),
          'total' => $count
        )
      );
    } catch (\Throwable $th) {
      $perkara = array(
        'message' => $th->getMessage(),
        'code' => 500
      );
    }

    return $perkara;
  }

  public function getDataById($id)
  {
    try {
      $dbCon = new PerkaraModels();
      $dataList = $dbCon->whereId($id)->first();

      if ($dataList) {
        $perkara = array(
          'message' => 'Success to get data',
          'code' => 200,
          'data' => $dataList
        );
      } else {
        $perkara = array(
          'message' => 'Not found',
          'code' => 404
        );
      }
    } catch (\Throwable $th) {
      $perkara = array(
        'message' => $th->getMessage(),
        'code' => 500
      );
    }

    return $perkara;
  }

  public function upsertData($id, array $detail)
  {
    try {
      $dbCon = new PerkaraModels();
      if ($id) {
        $perkara = array(
          'message' => 'Success to update data',
          'code' => 200,
          'data' => $dbCon->whereId($id)->update($detail)
        );
      } else {
        $perkara = array(
          'message' => 'Success to insert data',
          'code' => 200,
          'data' => $dbCon->create($detail)
        );
      }
    } catch (\Throwable $th) {
      $perkara = array(
        'message' => $th->getMessage(),
        'code' => 500
      );
    }

    return $perkara;
  }

  public function deleteData($id)
  {
    try {
      $dbCon = new PerkaraModels();
      $dataList = $dbCon->whereId($id);

      if ($dataList->first()) {
        $perkara = array(
          'message' => 'Deleting data successfully',
          'code' => 200,
          'data' => $dataList->delete()
        );
      } else {
        $perkara = array(
          'message' => 'Not found',
          'code' => 404
        );
      }
    } catch (\Throwable $th) {
      $perkara = array(
        'message' => $th->getMessage(),
        'code' => 500
      );
    }

    return $perkara;
  }
}
