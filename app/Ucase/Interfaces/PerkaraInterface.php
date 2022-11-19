<?php

namespace App\Ucase\Interfaces;

interface PerkaraInterface
{
  public function getAllData($limit, $page);
  public function getDataById($id);
  public function upsertData($id, array $detail);
  public function deleteData($id);
}
