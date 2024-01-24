<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Ahli;
use App\Models\Guru;
use App\Models\Kader;
use App\Models\Orangtua;
use App\Models\Remaja;
use Illuminate\Http\Request;

class MeController extends Controller
{
    public function getMe()
    {
        try {
            $user = auth()->user();
            $role = $user->role;
            $allData = '';

            switch ($role) {
                case 'remaja':
                    $allData = $this->dataRemaja();
                    break;
                case 'guru':
                    $allData = $this->dataGuru();
                    break;
                case 'orangtua':
                    $allData = $this->dataOrangtua();
                    break;
                case 'kader':
                    $allData = $this->dataKader();
                    break;
                case 'ahli':
                    $allData = $this->dataAhli();
                    break;
                default:
                    throw new \Exception('Invalid user role');
            }

            return response()->json(['message' => 'Detail data user tersedia', 'data' => $allData], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    private function dataRemaja()
    {
        return Remaja::join('users', 'remajas.user_id', '=', 'users.id_user')
            ->select('remajas.*', 'users.*')
            ->get();
    }
    private function dataGuru()
    {
        return Guru::join('users', 'gurus.user_id', '=', 'users.id_user')
            ->select('gurus.*', 'users.*')
            ->get();
    }
    private function dataOrangtua()
    {
        return Orangtua::join('users', 'orangtuas.user_id', '=', 'users.id_user')
            ->select('orangtuas.*', 'users.*')
            ->get();
    }
    private function dataKader()
    {
        return Kader::join('users', 'kaders.user_id', '=', 'users.id_user')
            ->select('kaders.*', 'users.*')
            ->get();
    }
    private function dataAhli()
    {
        return Ahli::join('users', 'ahlis.user_id', '=', 'users.id_user')
            ->select('ahlis.*', 'users.*')
            ->get();
    }
}
