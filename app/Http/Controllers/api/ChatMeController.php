<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\Remaja;
use App\Models\RiwayatChat;
use App\Models\RoomChatMe;
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
                $roomChat = RoomChatMe::where('id_remaja', $remaja->id_remaja)
                    ->where('id_guru', $guru->id_guru)
                    ->first();
                if ($roomChat) {
                    $chat = RiwayatChat::create([
                        'pesan' => $request->pesan,
                        'user_id' => $user->id_user,
                        'tgl_chat' => $request->tgl_chat,
                        'waktu_chat' => $request->waktu_chat,
                        'room_chat_me_id' => $roomChat->id_room_chat_me
                    ]);
                    if ($chat) {
                        $message = 'pesan berhasil dikirim';
                    } else {
                        $message = 'pesan gagal dikirim';
                    }
                } else {
                    $newRoom = RoomChatMe::create([
                        'remaja_id' => $remaja->id_remaja,
                        'guru_id' => $guru->id_guru,
                    ]);
                    if ($newRoom) {
                        $chat = RiwayatChat::create([
                            'pesan' => $request->pesan,
                            'user_id' => $user->id_user,
                            'tgl_chat' => $request->tgl_chat,
                            'waktu_chat' => $request->waktu_chat,
                            'room_chat_me_id' => $roomChat->id_room_chat_me
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
                $roomChat = RoomChatMe::where('id_remaja', $remaja->id_remaja)
                    ->where('id_guru', $guru->id_guru)
                    ->first();
                if ($roomChat) {
                    $chat = RiwayatChat::create([
                        'pesan' => $request->pesan,
                        'user_id' => $user->id_user,
                        'tgl_chat' => $request->tgl_chat,
                        'waktu_chat' => $request->waktu_chat,
                        'room_chat_me_id' => $roomChat->id_room_chat_me
                    ]);
                    if ($chat) {
                        $message = 'pesan berhasil dikirim';
                    } else {
                        $message = 'pesan gagal dikirim';
                    }
                } else {
                    $newRoom = RoomChatMe::create([
                        'remaja_id' => $remaja->id_remaja,
                        'guru_id' => $guru->id_guru,
                    ]);
                    if ($newRoom) {
                        $chat = RiwayatChat::create([
                            'pesan' => $request->pesan,
                            'user_id' => $user->id_user,
                            'tgl_chat' => $request->tgl_chat,
                            'waktu_chat' => $request->waktu_chat,
                            'room_chat_me_id' => $roomChat->id_room_chat_me
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
    public function getAllChat()
    {
        $status = '';
        $message = '';
        $data = '';
        $status_code = 200;
        try {
            $roomChat = RoomChatMe::all();
            if ($roomChat) {
                $message = 'riwayat chat tersedia';
            } else {
                $message = 'riwayat chat tidak tersedia';
            }
            $status = 'success';
            $data = $roomChat;
        } catch (\Exception $e) {
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
    public function getChatById($id)
    {
        $status = '';
        $message = '';
        $data = '';
        $status_code = 200;
        try {
            $roomChat = RoomChatMe::where('id_room_chat_me', $id);
            if ($roomChat) {
                $riwayatChat = RiwayatChat::where('room_chat_me_id', $roomChat->id_room_chat_me);
                $message = 'riwayat chat tersedia';
            } else {
                $message = 'riwayat chat tidak tersedia';
            }
            $status = 'success';
            $data = $riwayatChat;
        } catch (\Exception $e) {
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
}