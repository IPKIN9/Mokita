<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

    public function upsertUser(Request $request)
    {
        $userId = $request->id | null;
        $date = Carbon::now();

        $payload = array(
            'nama' => $request->nama,
            'email' => $request->email,
            'role' => 'see-list',
            'password' => Hash::make($request->password),
            'updated_at' => $date
        );

        try {
            $con = new User();
            $user = array(
                'code' => 200,
                'message' => 'Success'
            );
            if ($userId) {
                $user['data'] =  $con->whereId($userId)->update($payload);
            } else {
                $user['data'] =  $con->create($payload);
            }
        } catch (\Throwable $th) {
            $user = array(
                'code' => 500,
                'message' => $th->getMessage()
            );
        }

        return response()->json($user, $user['code']);
    }

    public function userDelete($id)
    {
        try {
            $con = new User();
            $find = $con->whereId($id);

            if ($find->count() >= 1) {
                $user = array(
                    'code' => 200,
                    'message' => 'Success to delete',
                    'data' => $find->delete()
                );
            }
        } catch (\Throwable $th) {
            $user = array(
                'code' => 500,
                'message' => $th->getMessage()
            );
        }

        return response()->json($user, $user['code']);
    }
}
