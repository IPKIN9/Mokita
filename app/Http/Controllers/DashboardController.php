<?php

namespace App\Http\Controllers;

use App\Models\ClientModels;
use App\Models\GugatanModels;
use App\Models\JadwalSidangModels;
use App\Models\PerkaraModels;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(): JsonResponse
    {
        try {
            $listCount = array(
                'code' => 200,
                'message' => 'success',
                'data' => array(
                    'client' => ClientModels::count(),
                    'gugatan' => GugatanModels::count(),
                    'perkara' => PerkaraModels::count(),
                    'jadwal' => JadwalSidangModels::count()
                ),
            );
        } catch (\Throwable $th) {
            $listCount = array(
                'code' => 500,
                'message' => $th->getMessage()
            );
        }

        return response()->json($listCount, $listCount['code']);
    }
}
