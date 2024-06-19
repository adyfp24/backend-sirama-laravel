<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function getAllUser(){
        $status = '';
        $message = '';
        $data = '';
        $status_code = 200;
        try {
            $remajasUsers = User::join('remajas', 'users.id_user', '=', 'remajas.user_id')
                    ->get();

            $gurusUsers = User::join('gurus', 'users.id_user', '=', 'gurus.user_id')
                  ->get();

            $ahlisUsers = User::join('ahlis', 'users.id_user', '=', 'ahlis.user_id')
                  ->get();

            $allUser = $remajasUsers->merge($gurusUsers)->merge($ahlisUsers);
            
            if (count($allUser) > 0) {
                $status = 'success';
                $message = 'data user berhasil didapat';
                $data = $allUser;
            }else{
                $status = 'failed';
                $message = 'data user tidak tersedia';
                $status_code = 404;
            }
        } catch (\Exception $e) {
            $status = 'failed';
            $message = 'Gagal menjalankan request. ' . $e->getMessage();
            $status_code = 500;
        } catch (\Illuminate\Database\QueryException $e) {
            $status = 'failed';
            $message = 'Gagal menjalankan request. ' . $e->getMessage();
            $status_code = 500;
        } finally {
            return response()->json([
                'status' => $status,
                'message' => $message,
                'data' => $data
            ], $status_code);
        }
    }

}
