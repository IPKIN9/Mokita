<?php

namespace App\Http\Controllers;

use App\Ucase\Interfaces\GugatanInterface;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GugatanController extends Controller
{
    private GugatanInterface $gugatanRepo;
    public function __construct(GugatanInterface $gugatanRepo)
    {
        $this->gugatanRepo = $gugatanRepo;
    }

    public function getData(): JsonResponse
    {
        $limit = request('limit');
        $page = request('page');
        $client = $this->gugatanRepo->getAllData($limit, $page);
        return response()->json($client, $client['code']);
    }

    public function getById($id): JsonResponse
    {
        $client = $this->gugatanRepo->getDataById($id);
        return response()->json($client, $client['code']);
    }

    public function upsert(Request $request): JsonResponse
    {
        $id = $request->id | null;
        $date = Carbon::now();

        $detail = array(
            'id_penggugat' => $request->id_penggugat,
            'id_tergugat' => $request->id_tergugat,
            'tgl_pernikahan' => $request->tgl_pernikahan,
            'kec' => $request->kec,
            'kab' => $request->kab,
            'akta_nikah' => $request->akta_nikah,
            'tinggal1' => $request->tinggal1,
            'tinggal2' => $request->tinggal2,
            'tgl_tidak_rukun' => $request->tgl_tidak_rukun,
            'penyebab' => $request->penyebab,
            'puncak_konflik' => $request->puncak_konflik,
            'lama_pisah' => $request->lama_pisah,
            'updated_at' => $date
        );
        $client = $this->gugatanRepo->upsertData($id, $detail);
        return response()->json($client, $client['code']);
    }

    public function delete($id): JsonResponse
    {
        $client = $this->gugatanRepo->deleteData($id);
        return response()->json($client, $client['code']);
    }
}
