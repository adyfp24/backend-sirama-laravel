<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\Remaja;
use App\Models\RiwayatChat;
use App\Models\RoomChatMe;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ChatMeController extends Controller
{
    public function createChat(Request $request, $id)
    {
        $status = '';
        $message = '';
        $data = '';
        $status_code = 200;
        try {
            $user = auth()->user();
            if ($user->role === 'remaja') {
                $remaja = Remaja::where('user_id', $user->id_user)->first();
                $guru = Guru::where('id_guru', $id)->first();
                $roomChat = RoomChatMe::where('remaja_user_id', $remaja->id_remaja)
                    ->where('guru_user_id', $guru->id_guru)
                    ->first();
                if ($roomChat) {
                    $chat = RiwayatChat::create([
                        'pesan' => $request->pesan,
                        'user_id' => $user->id_user,
                        'tgl_chat' => Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s'),
                        'waktu_chat' => Carbon::now('Asia/Jakarta')->format('H:i:s'),
                        'room_chat_id' => $roomChat->id_room_chat_me
                    ]);
                    if ($chat) {
                        $message = 'pesan berhasil dikirim';
                    } else {
                        $message = 'pesan gagal dikirim';
                    }
                } else {
                    $newRoom = RoomChatMe::create([
                        'remaja_user_id' => $remaja->id_remaja,
                        'guru_user_id' => $guru->id_guru,
                    ]);
                    if ($newRoom) {
                        $chat = RiwayatChat::create([
                            'pesan' => $request->pesan,
                            'user_id' => $user->id_user,
                            'tgl_chat' => Carbon::now()->format('Y-m-d H:i:s'),
                            'waktu_chat' => Carbon::now()->format('H:i:s'),
                            'room_chat_id' => $newRoom->id_room_chat_me
                        ]);
                        if ($chat) {
                            $message = 'pesan berhasil dikirim';
                        } else {
                            $message = 'pesan gagal dikirim';
                        }
                    }
                }
            } elseif ($user->role === 'guru') {
                $remaja = Remaja::where('id_remaja', $id)->first();
                $guru = Guru::where('user_id', $user->id_user)->first();
                $roomChat = RoomChatMe::where('remaja_user_id', $remaja->id_remaja)
                    ->where('guru_user_id', $guru->id_guru)
                    ->first();
                if ($roomChat) {
                    $chat = RiwayatChat::create([
                        'pesan' => $request->pesan,
                        'user_id' => $user->id_user,
                        'tgl_chat' => Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s'),
                        'waktu_chat' => Carbon::now('Asia/Jakarta')->format('H:i:s'),
                        'room_chat_id' => $roomChat->id_room_chat_me
                    ]);
                    if ($chat) {
                        $message = 'pesan berhasil dikirim';
                    } else {
                        $message = 'pesan gagal dikirim';
                    }
                } else {
                    $newRoom = RoomChatMe::create([
                        'remaja_user_id' => $remaja->id_remaja,
                        'guru_user_id' => $guru->id_guru,
                    ]);
                    if ($newRoom) {
                        $chat = RiwayatChat::create([
                            'pesan' => $request->pesan,
                            'user_id' => $user->id_user,
                            'tgl_chat' => Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s'),
                            'waktu_chat' => Carbon::now('Asia/Jakarta')->format('H:i:s'),
                            'room_chat_id' => $roomChat->id_room_chat_me
                        ]);
                        if ($chat) {
                            $message = 'pesan berhasil dikirim';
                        } else {
                            $message = 'pesan gagal dikirim';
                        }
                    }
                }
            }
            $status = 'success';
            $data = $chat;
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


    public function getAllChat()
    {
        $status = '';
        $message = '';
        $data = '';
        $status_code = 200;
        try {
            $user = auth()->user();
            if($user->role == 'remaja'){
                $remaja = Remaja::where('user_id', $user->id_user)->first();
                $roomChat = RoomChatMe::join('gurus', 'room_chat_mes.guru_user_id', '=', 'gurus.id_guru')
                ->where('remaja_user_id', $remaja->id_remaja)
                ->select('room_chat_mes.*', 'gurus.nama', 'gurus.foto_profile')
                ->get();
                if ($roomChat) {
                    $message = 'riwayat chat tersedia';
                    $status = 'success';
                    $data = $roomChat;
                } else {
                    $message = 'riwayat chat tidak tersedia';
                }
            }else{
                $guru = Guru::where('user_id', $user->id_user)->first();
                $roomChat = RoomChatMe::join('remajas', 'room_chat_mes.remaja_user_id', '=', 'remajas.id_remaja')
                ->where('guru_user_id', $guru->id_guru)
                ->select('room_chat_mes.*', 'remajas.nama', 'remajas.foto_profile')
                ->get();
                if ($roomChat) {
                    $message = 'riwayat chat tersedia';
                    $status = 'success';
                    $data = $roomChat;
                } else {
                    $message = 'riwayat chat tidak tersedia';
                }
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
    public function getChatById($id)
    {
        $status = '';
        $message = '';
        $data = '';
        $status_code = 200;
        try {
            $roomChat = RoomChatMe::find($id);
            if ($roomChat) {
                $riwayatChat = RiwayatChat::where('room_chat_id', $roomChat->id_room_chat_me)->get();
                $message = 'room dan riwayat chat tersedia';
                $status = 'success';
                $data = $riwayatChat;
            } else {
                $message = 'room chat tidak tersedia';
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

    public function listGuru(){
        $status = '';
        $message = '';
        $data = '';
        $status_code = 200;
        try {
            $allGuru = Guru::all();
            if ($allGuru) {
                $message = 'daftar guru tersedia';
                $status = 'success';
                $data = $allGuru;
            } else {
                $message = 'daftar guru tidak tersedia';
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

    public function listMurid(){
        $status = '';
        $message = '';
        $data = '';
        $status_code = 200;
        try {
            $allRemaja = Remaja::all();
            if ($allRemaja) {
                $message = 'daftar remaja tersedia';
                $status = 'success';
                $data = $allRemaja;
            } else {
                $message = 'daftar remaja tidak tersedia';
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