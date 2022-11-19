<?php

namespace App\Http\Controllers;

use App\Ucase\Interfaces\JadwalSidangInterface;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class JadwalSidangController extends Controller
{
    private JadwalSidangInterface $jadwalSidangRepo;
    public function __construct(JadwalSidangInterface $jadwalSidangRepo)
    {
        $this->jadwalSidangRepo = $jadwalSidangRepo;
    }

    public function getData(): JsonResponse
    {
        $limit = request('limit');
        $page = request('page');
        $jadwalSidang = $this->jadwalSidangRepo->getAllData($limit, $page);
        return response()->json($jadwalSidang, $jadwalSidang['code']);
    }

    public function getById($id): JsonResponse
    {
        $jadwalSidang = $this->jadwalSidangRepo->getDataById($id);
        return response()->json($jadwalSidang, $jadwalSidang['code']);
    }

    public function upsert(Request $request): JsonResponse
    {
        $id = $request->id | null;
        $date = Carbon::now();

        $detail = array(
            'tgl_waktu_mulai' => $request->tgl_waktu_mulai,
            'tgl_waktu_berakhir' => $request->tgl_waktu_berakhir,
            'ket' => $request->ket,
            'updated_at' => $date
        );
        $jadwalSidang = $this->jadwalSidangRepo->upsertData($id, $detail);
        return response()->json($jadwalSidang, $jadwalSidang['code']);
    }

    public function delete($id): JsonResponse
    {
        $jadwalSidang = $this->jadwalSidangRepo->deleteData($id);
        return response()->json($jadwalSidang, $jadwalSidang['code']);
    }
}
