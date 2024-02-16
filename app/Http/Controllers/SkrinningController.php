<?php

namespace App\Http\Controllers;

use App\Models\BagianSkrinning;
use App\Models\BagianSkrinningUser;
use App\Models\HasilSkrinning;
use App\Models\JawabanSkrinning;
use App\Models\RiwayatHasilSkrinning;
use App\Models\RiwayatSkrinning;
use App\Models\Skrinning;
use App\Models\SkrinningUser;
use App\Models\SoalSkrinning;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SkrinningController extends Controller
{
    public function allSkrinning()
    {
        $status = '';
        $message = '';
        $data = '';
        $status_code = 200;
        try {
            $allSkrinning = Skrinning::all();
            if (count($allSkrinning) > 0) {
                $message = 'data jenis skrinning tersedia';
            } else {
                $message = 'data jenis skrinning tidak tersedia';
            }
            $status = 'success';
            $data = $allSkrinning;
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

    public function addSkrinning(Request $request)
    {
        $status = '';
        $message = '';
        $data = '';
        $status_code = 200;
        try {
            $addSkrinning = Skrinning::create([
                'jenis_skrinning' => $request->jenis_skrinning,
                'deskripsi_skrinning' => $request->deskripsi_skrinning
            ]);
            if ($addSkrinning) {
                $status = 'success';
                $message = 'Data skrining berhasil ditambah.';
                $data = $addSkrinning;
            } else {
                $status_code = 400;
                $status = 'failed';
                $message = 'Data skrining gagal ditambah.';
            }
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

    // public function addSkrinningUser($id)
    // {
    //     $status = '';
    //     $message = '';
    //     $data = '';
    //     $status_code = 200;
    //     try {
    //         $user = auth()->user();
    //         $newSkrinningUser = SkrinningUser::create([
    //             'tgl_pengisian' => date('Y-m-d'),
    //             'skrinning_id' => $id,
    //             'user_id' => $user->id_user
    //         ]);
    //         if ($newSkrinningUser) {
    //             $message = 'Skrining user berhasil ditambah';
    //             $status = 'success';
    //             $data = $newSkrinningUser;
    //         }else{
    //             $message = 'Skrining user gagal ditambah';
    //             $status = 'failed';
    //             $status_code = 400;            
    //         } 
    //     } catch (\Exception $e) {
    //         $status = 'failed';
    //         $message = 'Gagal menjalankan request. ' . $e->getMessage();
    //         $status_code = $e->getCode();
    //     } catch (\Illuminate\Database\QueryException $e) {
    //         $status = 'failed';
    //         $message = 'Gagal menjalankan request. ' . $e->getMessage();
    //         $status_code = $e->getCode();
    //     } finally {
    //         return response()->json([
    //             'status' => $status,
    //             'message' => $message,
    //             'data' => $data
    //         ], $status_code);
    //     }
    // } 

    public function getDetailSkrinning($id)
    {
        $status = '';
        $message = '';
        $data = '';
        $status_code = 200;
        try {
            $user = auth()->user();
            $newSkrinningUser = SkrinningUser::create([
                'tgl_pengisian' => date('Y-m-d'),
                'skrinning_id' => $id,
                'user_id' => $user->id_user
            ]);

            $detail= [];
            $bagian = BagianSkrinning::where('skrinning_id', $id)->orderBy('urutan_bagian', 'ASC')->get();
            for ($a=0; $a < count($bagian); $a++) {   
                $detail['bagian_'.$bagian[$a]->urutan_bagian][0] = ['id_bagian_skrining' => $bagian[$a]->id_bagian_skrinning, 'nama_bagian' => $bagian[$a]->nama_bagian];
                $soal = SoalSkrinning::where('bagian_skrinning_id', $bagian[$a]->id_bagian_skrinning)->orderBy('no_soal', 'ASC')->get();
                for ($b=0; $b < count($soal) ; $b++) { 
                    $detail['bagian_'.$bagian[$a]->urutan_bagian][1]['soal_jawab_no_'.$soal[$b]->no_soal]['soal'] = ['id_soal' => $soal[$b]->id_soal_skrinning, 'soal' => $soal[$b]->soal];
                    $jawaban = JawabanSkrinning::where('soal_skrinning_id', $soal[$b]->id_soal_skrinning)->orderBy('poin_jawaban', 'ASC')->get();
                    for ($c=0; $c < count($jawaban); $c++) { 
                        $detail['bagian_'.$bagian[$a]->urutan_bagian][1]['soal_jawab_no_'.$soal[$b]->no_soal]['jawaban'][$c] = ['id_jawaban_skrinning' =>  $jawaban[$c]->id_jawaban_skrinning, 'jawaban' => $jawaban[$c]->jawaban, 'poin_jawaban' => $jawaban[$c]->poin_jawaban];
                    }
                }
            }
            if (count($detail) > 0) {
                $message = 'data terkait skrining tersedia';
            } else {
                $message = 'data terkait skrining tidak tersedia';
            }
            $status = 'success';
            $data = $detail;
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
                'data' => $data, 
                'skrin_user' => $newSkrinningUser->id_skrin_user 
            ], $status_code);
        }
    }

    public function submitBagianSkrinningUser(Request $request)
    {
        $status = '';
        $message = '';
        $data = '';
        $status_code = 200;
        try {
            $user = auth()->user();
            $newBagianSkrinningUser = BagianSkrinningUser::create([
                'skrin_user_id' => $request->id_skrin_user,
                'bagian_skrinning_id' => $request->id_bagian_user,
            ]);
            $positif = False;
            $soal = SoalSkrinning::where('bagian_skrinning_id', $request->id_bagian_user)->orderBy('no_soal', 'ASC')->get();
            $id_jawaban = $request->id_jawaban;
            for ($i=0; $i < count($soal) ; $i++) { 
                $jawaban = JawabanSkrinning::where('id_jawaban_skrinning', $id_jawaban[$i])->first();
                $newRIwayatSkrinning = RiwayatSkrinning::create([
                    'soal' => $soal[$i]->soal,
                    'jawaban' => $jawaban->jawaban,
                    'poin_jawaban' => $jawaban->poin_jawaban,
                    'tgl_pengisian' => date('Y-m-d'),
                    'bag_skrin_user_id' => $newBagianSkrinningUser->id_bag_skrin_user
                ]);
                if ($positif == False) {
                    if ($jawaban->hasil_jawaban == 'positif') {
                        $positif == True;
                    }
                }
            }
            if ($positif == True) {
                $gethasil = HasilSkrinning::where('bagian_skrinning_id', $request->id_bagian_user)
                                            ->where('jenis_hasil', 'positif')
                                            ->first();
            } else {
                $gethasil = HasilSkrinning::where('bagian_skrinning_id', $request->id_bagian_user)
                                            ->where('jenis_hasil', 'negatif')
                                            ->first();
            }
            $newRiwayatHasilSkrinning = RiwayatHasilSkrinning::create([
                'hasil' => $gethasil->hasil,
                'tgl_pengisian' => date('Y-m-d'),
                'bag_skrin_user_id' => $newBagianSkrinningUser->id_bag_skrin_user,
                'user_id' => $user->id_user
            ]);

            $message = 'Submit skrinngin berhasil';
            $status = 'success';
            $data = [$gethasil->jenis_hasil, $gethasil->hasil];
            
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

    // public function getHasilSkrinning($id)
    // {
    //     $status = '';
    //     $message = '';
    //     $data = '';
    //     $status_code = 200;
    //     try {
    //         $hasilSkrinning = HasilSkrinning::all();
    //         if (count($hasilSkrinning) > 0) {
    //             $message = 'data jenis skrinning tersedia';
    //         } else {
    //             $message = 'data jenis skrinning tidak tersedia';
    //         }
    //         $status = 'success';
    //         $data = $hasilSkrinning; 
    //     } catch (\Exception $e) {
    //         $status = 'failed';
    //         $message = 'Gagal menjalankan request. ' . $e->getMessage();
    //         $status_code = $e->getCode();
    //     } catch (\Illuminate\Database\QueryException $e) {
    //         $status = 'failed';
    //         $message = 'Gagal menjalankan request. ' . $e->getMessage();
    //         $status_code = $e->getCode();
    //     } finally {
    //         return response()->json([
    //             'status' => $status,
    //             'message' => $message,
    //             'data' => $data
    //         ], $status_code);
    //     }
    // }

    public function getRiwayatSkrinning()
    {
        $status = '';
        $message = '';
        $data = '';
        $status_code = 200;
        try {
            $user = auth()->user();
            $allSkrinning = DB::table('skrinning_users')
                                ->where('user_id', $user->id_user)
                                ->join('users', 'skrinning_users.user_id', '=', 'users.id_user')
                                ->join('skrinnings', 'skrinning_users.skrinning_id', '=', 'skrinnings.id_skrinning')
                                ->orderBy('tgl_pengisian', 'ASC')
                                ->get();
            if (count($allSkrinning) > 0) {
                $message = 'data jenis skrinning tersedia';
            } else {
                $message = 'data jenis skrinning tidak tersedia';
            }
            $status = 'success';
            $data = $allSkrinning;
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

    public function getDetailRiwayatSkrinning($id)
    {
        {
            $status = '';
            $message = '';
            $data = [];
            $status_code = 200;
            try {
                $detail = [];
                $bagian = BagianSkrinningUser::join('skrinning_users', 'bagian_skrinning_users.skrin_user_id', '=', 'skrinning_users.id_skrin_user')
                                                ->join('bagian_skrinnings', 'bagian_skrinning_users.bagian_skrinning_id', '=', 'bagian_skrinnings.id_bagian_skrinning')
                                                ->where('skrin_user_id', $id)
                                                ->get();
                for ($a=0; $a < $bagian; $a++) { 
                    $detail[$a][0] = [$bagian[$a]->nama_bagian, $bagian[$a]->tgl_pengisian] ;
                    $riwayat = RiwayatSkrinning::where('bag_skrin_user_id', $bagian[$a]->id_bag_skrin_user)->get();
                    for ($b=0; $b < $riwayat; $b++) { 
                        $detail[$a][1][$b] = [$riwayat[$b]->soal, $riwayat[$b]->jawaban];
                    }
                    $riwayathasil = RiwayatHasilSkrinning::where('bag_skrin_user_id', $bagian[$a]->id_bag_skrin_user)->first();
                    $detail[$a][2] = $riwayathasil->hasil;
                }

                if (count($detail) > 0) {
                    $message = 'data terkait skrining tersedia';
                } else {
                    $message = 'data terkait skrining tidak tersedia';
                }
                $status = 'success';
                $data = $detail;
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
}
