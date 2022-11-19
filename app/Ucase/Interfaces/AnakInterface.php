<?php

namespace App\Ucase\Interfaces;

interface AnakInterface
{
  public function getAllData($params, $limit, $page);
  public function getDataById($id);
  public function upsertData($id, array $detail);
  public function deleteData($id);
}
