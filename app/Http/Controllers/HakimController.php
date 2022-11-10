<?php

namespace App\Http\Controllers;

use App\Ucase\Interfaces\HakimInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class HakimController extends Controller
{
    private HakimInterface $HakimRepo;
    public function __construct(HakimInterface $HakimRepo)
    {
        $this->HakimRepo = $HakimRepo;
    }

    public function getData():JsonResponse
    {
        $hakim = $this->HakimRepo->getAllData();
        return response()->json($hakim, $hakim['code']);
    }
}
