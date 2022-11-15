<?php

namespace App\Http\Controllers;

use App\Ucase\Interfaces\AnakInterface;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AnakController extends Controller
{
    private AnakInterface $anakRepo;
    public function __construct(AnakInterface $anakRepo)
    {
        $this->anakRepo = $anakRepo;
    }

    public function getData(): JsonResponse
    {
        $params = request('gugatan', null);
        $client = $this->anakRepo->getAllData($params);
        return response()->json($client, $client['code']);
    }

    public function getById($id): JsonResponse
    {
        $client = $this->anakRepo->getDataById($id);
        return response()->json($client, $client['code']);
    }

    public function upsert(Request $request): JsonResponse
    {
        $id = $request->id | null;
        $date = Carbon::now();

        $detail = array(
            'id_gugatan' => $request->id_gugatan,
            'nama' => $request->nama,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'updated_at' => $date
        );
        $client = $this->anakRepo->upsertData($id, $detail);
        return response()->json($client, $client['code']);
    }

    public function delete($id): JsonResponse
    {
        $client = $this->anakRepo->deleteData($id);
        return response()->json($client, $client['code']);
    }
}
