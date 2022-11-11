<?php

namespace App\Http\Controllers;

use App\Ucase\Interfaces\UserInterface;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    private UserInterface $userRepo;
    public function __construct(UserInterface $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function getData():JsonResponse
    {
        $client = $this->userRepo->getAllData();
        return response()->json($client, $client['code']);
    }

    public function getById($id):JsonResponse
    {
        $client = $this->userRepo->getDataById($id);
        return response()->json($client, $client['code']);
    }

    public function upsert(Request $request):JsonResponse
    {
        $id = $request->id || null;
        $date = Carbon::now();

        $detail = array(
            'nama' => $request->nama,
            'email' => $request->username,
            'password' => Hash::make($request->password),
            'updated_at' => $date
        );
        $client = $this->userRepo->upsertData($id, $detail);
        return response()->json($client, $client['code']);
    }
    
    public function delete($id):JsonResponse
    {
        $client = $this->userRepo->deleteData($id);
        return response()->json($client, $client['code']);
    }
}
