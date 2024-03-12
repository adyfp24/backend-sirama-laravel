<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Ahli;
use App\Models\Guru;
use App\Models\Kader;
use App\Models\Orangtua;
use App\Models\Remaja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MeController extends Controller
{
    public function changePassword(Request $request){
        $status = '';
        $message = '';
        $data = '';
        $status_code = 200;
        try{
            $user = auth()->user();
            $passwordLama = $request->password_lama;
            $passwordBaru = $request->password_baru; 
            if(Hash::check($passwordLama, $user->password)){
                $user->update([
                    'password' => Hash::make($passwordBaru)
                ]);
                $status = 'success';
                $message = 'password behasil diperbarui';
            }else{
                $status = 'failed';
                $message = 'password tidak sesuai, gagal diperbarui';
                $status_code = 400;
            }        
        }catch (\Exception $e) {
            $status = 'failed';
            $message = 'Gagal menjalankan request. ' . $e->getMessage();
            $status_code = $e->getCode();
        } catch (\Illuminate\Database\QueryException $e) {
            $status = 'failed';
            $message = 'Gagal menjalankan request. ' . $e->getMessage();
            $status_code = $e->getCode();
        } finally {
            return response()->json([
                'status' => $status,
                'message' => $message,
                'data' => $data
            ], $status_code);
        }
    }
    public function getMe()
    {
        try {
            $user = auth()->user();
            $role = $user->role;
            $allData = '';

            switch ($role) {
                case 'remaja':
                    $allData = $this->dataRemaja($user);
                    break;
                case 'guru':
                    $allData = $this->dataGuru($user);
                    break;
                case 'orangtua':
                    $allData = $this->dataOrangtua($user);
                    break;
                case 'kader':
                    $allData = $this->dataKader($user);
                    break;
                case 'ahli':
                    $allData = $this->dataAhli($user);
                    break;
                default:
                    throw new \Exception('Invalid user role');
            }

            return response()->json(['message' => 'Detail data user tersedia', 'data' => $allData], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    private function dataRemaja($user)
    {
        return Remaja::join('users', 'remajas.user_id', '=', 'users.id_user')
            ->where('remajas.user_id', '=', $user->id_user)
            ->select('remajas.*', 'users.*')
            ->get();
    }
    private function dataGuru($user)
    {
        return Guru::join('users', 'gurus.user_id', '=', 'users.id_user')
            ->where('gurus.user_id', '=', $user->id_user)
            ->select('gurus.*', 'users.*')
            ->get();
    }
    private function dataOrangtua($user)
    {
        return Orangtua::join('users', 'orangtuas.user_id', '=', 'users.id_user')
            ->where('orangtuas.user_id', '=', $user->id_user)
            ->select('orangtuas.*', 'users.*')
            ->get();
    }
    private function dataKader($user)
    {
        return Kader::join('users', 'kaders.user_id', '=', 'users.id_user')
            ->where('kaders.user_id', '=', $user->id_user)
            ->select('kaders.*', 'users.*')
            ->get();
    }
    private function dataAhli($user)
    {
        return Ahli::join('users', 'ahlis.user_id', '=', 'users.id_user')
            ->where('ahlis.user_id', '=', $user->id_user)
            ->select('ahlis.*', 'users.*')
            ->get();
    }
}
