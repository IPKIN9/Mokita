<?php

namespace App\Ucase\Interfaces;

interface JadwalSidangInterface
{
  public function getAllData($limit, $page, $search);
  public function getDataById($id);
  public function upsertData($id, array $detail);
  public function deleteData($id);
}
