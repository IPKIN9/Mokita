<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function getRole()
    {
        $email = request('email');

        try {
            $con = new User();
            $res = array(
                'code' => 200,
                'data' => $con->where('email', $email)->select('role')->first()
            );
        } catch (\Throwable $th) {
            $res = array(
                'code' => 500,
                'message' => $th->getMessage()
            );
        }

        return response()->json($res, $res['code']);
    }
}
