<?php

namespace App\Http\Controllers;

use App\Ucase\Interfaces\HakimInterface;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class HakimController extends Controller
{
    private HakimInterface $HakimRepo;
    public function __construct(HakimInterface $HakimRepo)
    {
        $this->HakimRepo = $HakimRepo;
    }

    public function getData(): JsonResponse
    {
        $limit = request('limit');
        $page = request('page');
        $hakim = $this->HakimRepo->getAllData($limit, $page);
        return response()->json($hakim, $hakim['code']);
    }

    public function getById($id): JsonResponse
    {
        $hakim = $this->HakimRepo->getDataById($id);
        return response()->json($hakim, $hakim['code']);
    }

    public function upsert(Request $request): JsonResponse
    {
        $id = $request->id || null;
        $date = Carbon::now();

        $detail = array(
            'nama' => $request->nama,
            'nip' => $request->nip,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'jabatan' => $request->jabatan,
            's1' => $request->s1,
            's2' => $request->s2,
            's3' => $request->s3,
            'sertifikat' => $request->sertifikat,
            'updated_at' => $date
        );
        $hakim = $this->HakimRepo->upsertData($id, $detail);
        return response()->json($hakim, $hakim['code']);
    }

    public function delete($id): JsonResponse
    {
        $hakim = $this->HakimRepo->deleteData($id);
        return response()->json($hakim, $hakim['code']);
    }
}
