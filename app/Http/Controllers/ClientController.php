<?php

namespace App\Http\Controllers;

use App\Ucase\Interfaces\ClientInterface;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    private ClientInterface $ClientRepo;
    public function __construct(ClientInterface $ClientRepo)
    {
        $this->ClientRepo = $ClientRepo;
    }

    public function getData():JsonResponse
    {
        $client = $this->ClientRepo->getAllData();
        return response()->json($client, $client['code']);
    }

    public function getById($id):JsonResponse
    {
        $client = $this->ClientRepo->getDataById($id);
        return response()->json($client, $client['code']);
    }

    public function upsert(Request $request):JsonResponse
    {
        $id = $request->id || null;
        $date = Carbon::now();

        $detail = array(
            'nama' => $request->nama, 
            'status' => $request->status, 
            'marga' => $request->marga, 
            'tempat_lahir' => $request->tempat_lahir, 
            'tgl_lahir' => $request->tgl_lahir, 
            'agama' => $request->agama,
            'pendidikan' => $request->pendidikan, 
            'pekerjaan' => $request->pekerjaan, 
            'alamat' => $request->alamat, 
            'kel' => $request->kel,
            'kec' => $request->kec,
            'kab' => $request->kab,
            'updated_at' => $date
        );
        $client = $this->ClientRepo->upsertData($id, $detail);
        return response()->json($client, $client['code']);
    }
    
    public function delete($id):JsonResponse
    {
        $client = $this->ClientRepo->deleteData($id);
        return response()->json($client, $client['code']);
    }
}
