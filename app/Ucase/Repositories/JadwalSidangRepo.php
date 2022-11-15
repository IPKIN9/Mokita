<?php

namespace App\Ucase\Repositories;

use App\Models\JadwalSidangModels;
use App\Ucase\Interfaces\JadwalSidangInterface;

class JadwalSidangRepo implements JadwalSidangInterface
{

  public function getAllData($limit, $page)
  {
    try {
      $dbCon = new JadwalSidangModels;
      $count = $dbCon->count();
      $jadwalSidang = array(
        'message' => 'Success to get data',
        'code' => 200,
        'data' => $dbCon->JadwalList($limit, $page)->get(),
        'meta' => array(
          'limit' => (int)$limit,
          'page' => (int)$page,
          'page_of' => ceil($count / $limit),
          'total' => $count
        )
      );
    } catch (\Throwable $th) {
      $jadwalSidang = array(
        'message' => $th->getMessage(),
        'code' => 500
      );
    }

    return $jadwalSidang;
  }

  public function getDataById($id)
  {
    try {
      $dbCon = new JadwalSidangModels();
      $dataList = $dbCon->whereId($id)->first();

      if ($dataList) {
        $jadwalSidang = array(
          'message' => 'Success to get data',
          'code' => 200,
          'data' => $dataList
        );
      } else {
        $jadwalSidang = array(
          'message' => 'Not found',
          'code' => 404
        );
      }
    } catch (\Throwable $th) {
      $jadwalSidang = array(
        'message' => $th->getMessage(),
        'code' => 500
      );
    }

    return $jadwalSidang;
  }

  public function upsertData($id, array $detail)
  {
    try {
      $dbCon = new JadwalSidangModels();
      if ($id) {
        $jadwalSidang = array(
          'message' => 'Success to update data',
          'code' => 200,
          'data' => $dbCon->whereId($id)->update($detail)
        );
      } else {
        $jadwalSidang = array(
          'message' => 'Success to insert data',
          'code' => 200,
          'data' => $dbCon->create($detail)
        );
      }
    } catch (\Throwable $th) {
      $jadwalSidang = array(
        'message' => $th->getMessage(),
        'code' => 500
      );
    }

    return $jadwalSidang;
  }

  public function deleteData($id)
  {
    try {
      $dbCon = new JadwalSidangModels();
      $dataList = $dbCon->whereId($id);

      if ($dataList->first()) {
        $jadwalSidang = array(
          'message' => 'Deleting data successfully',
          'code' => 200,
          'data' => $dataList->delete()
        );
      } else {
        $jadwalSidang = array(
          'message' => 'Not found',
          'code' => 404
        );
      }
    } catch (\Throwable $th) {
      $jadwalSidang = array(
        'message' => $th->getMessage(),
        'code' => 500
      );
    }

    return $jadwalSidang;
  }
}
