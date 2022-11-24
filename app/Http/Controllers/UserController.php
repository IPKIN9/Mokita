<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUserList()
    {
        $search = request('nama');
        try {
            $con = new User();
            $list = array(
                'code' => 200,
                'message' => 'Success',
                'data' => $con->search($search)->get()
            );
        } catch (\Throwable $th) {
            $list = array(
                'code' => 500,
                'message' => $th->getMessage()
            );
        }
        return response()->json($list, $list['code']);
    }
}
