<?php

namespace App\Http\Controllers;

use App\Ucase\Interfaces\PerkaraInterface;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PerkaraController extends Controller
{
    private PerkaraInterface $perkaraRepo;
    public function __construct(PerkaraInterface $perkaraRepo)
    {
        $this->perkaraRepo = $perkaraRepo;
    }

    public function getData(): JsonResponse
    {
        $limit = request('limit');
        $page = request('page');
        $search = request('search');
        $perkara = $this->perkaraRepo->getAllData($limit, $page, $search);
        return response()->json($perkara, $perkara['code']);
    }

    public function getById($id): JsonResponse
    {
        $perkara = $this->perkaraRepo->getDataById($id);
        return response()->json($perkara, $perkara['code']);
    }

    public function upsert(Request $request): JsonResponse
    {
        $id = $request->id | null;
        $date = Carbon::now();

        if (!$request->no_perkara) {
            $no_perkara = Carbon::now()->format('YmdHi');
        } else {
            $no_perkara = $request->no_perkara;
        }

        $detail = array(
            'no_perkara' => $no_perkara,
            'id_hakim' => $request->id_hakim,
            'pengacara' => $request->pengacara,
            'penitra' => $request->penitra,
            'id_gugatan' => $request->id_gugatan,
            'status' => $request->status,
            'id_jadwal' => $request->id_jadwal,
            'updated_at' => $date
        );
        $perkara = $this->perkaraRepo->upsertData($id, $detail);
        return response()->json($perkara, $perkara['code']);
    }

    public function delete($id): JsonResponse
    {
        $perkara = $this->perkaraRepo->deleteData($id);
        return response()->json($perkara, $perkara['code']);
    }
}
