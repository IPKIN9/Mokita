<?php

namespace App\Ucase\Interfaces;

interface ClientInterface {
  public function getAllData();
  public function getDataById($id);
  public function upsertData($id, array $detail);
  public function deleteData($id);
}