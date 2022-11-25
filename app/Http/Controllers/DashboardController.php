<?php

namespace App\Http\Controllers;

use App\Models\ClientModels;
use App\Models\GugatanModels;
use App\Models\JadwalSidangModels;
use App\Models\PerkaraModels;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(): JsonResponse
    {
        try {
            $id = Auth::user()->id;
            $user = new User();
            $listCount = array(
                'code' => 200,
                'message' => 'success',
                'data' => array(
                    'client' => ClientModels::count(),
                    'gugatan' => GugatanModels::count(),
                    'perkara' => PerkaraModels::count(),
                    'jadwal' => JadwalSidangModels::count()
                ),
                'progress' => $user->Dashboard($id)
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
