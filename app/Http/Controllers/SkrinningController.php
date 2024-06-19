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
            $status_code = 400;
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
            $status_code = 400;
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
    //         $status_code = 500;
    //     } catch (\Illuminate\Database\QueryException $e) {
    //         $status = 'failed';
    //         $message = 'Gagal menjalankan request. ' . $e->getMessage();
    //         $status_code = 500;
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
            $SkrinningUser = SkrinningUser::create([
                'tgl_pengisian' => date('Y-m-d'),
                'skrinning_id' => $id,
                'user_id' => $user->id_user
            ]);
            // dd($SkrinningUser);
            // $newSkrinningUser = [
            //     "tgl_pengisian" => $SkrinningUser->tgl_pengisian,
            //     "skrinning_id" => $id,
            //     "user_id" => $user->id_user,
            //     "updated_at" => $SkrinningUser->updated_at,
            //     "created_at" => $SkrinningUser->created_at,
            //     "id_skrin_user" => $SkrinningUser->id_skrin_user
            // ];
            // dd();

            // $coba = [];
            // $coba['kata'] = 'ok';
            // $coba['kata 1'] = 'yaa';
            // $detail = array($coba);

            $bagian = BagianSkrinning::where('skrinning_id', $id)->orderBy('urutan_bagian', 'ASC')->get();
            for ($a = 0; $a < count($bagian); $a++) {
                // $detail[$a]['bagian_'.$bagian[$a]->urutan_bagian]['id_bagian_skrinning'] = $bagian[$a]->id_bagian_skrinning;
                // $detail[$a]['bagian_'.$bagian[$a]->urutan_bagian]['nama_bagian'] = $bagian[$a]->nama_bagian;
                // $detail[$a] = ['bagian_'.$bagian[$a]->urutan_bagian => [['id_bagian_skrining'] = $bagian[$a]->id_bagian_skrinning, ['nama_bagian'] = $bagian[$a]->nama_bagian]];
                // $detail['bagian_'.$bagian[$a]->urutan_bagian][0] = ['id_bagian_skrining' => $bagian[$a]->id_bagian_skrinning, 'nama_bagian' => $bagian[$a]->nama_bagian];
                // $soal = SoalSkrinning::where('bagian_skrinning_id', $bagian[$a]->id_bagian_skrinning)->orderBy('no_soal', 'ASC')->get();
                // for ($b=0; $b < count($soal) ; $b++) { 
                //     $detail['bagian_'.$bagian[$a]->urutan_bagian][1]['soal_jawab_no_'.$soal[$b]->no_soal]['soal'] = ['id_soal' => $soal[$b]->id_soal_skrinning, 'soal' => $soal[$b]->soal];
                //     $jawaban = JawabanSkrinning::where('soal_skrinning_id', $soal[$b]->id_soal_skrinning)->orderBy('poin_jawaban', 'ASC')->get();
                //     for ($c=0; $c < count($jawaban); $c++) { 
                //         $detail['bagian_'.$bagian[$a]->urutan_bagian][1]['soal_jawab_no_'.$soal[$b]->no_soal]['jawaban'][$c] = ['id_jawaban_skrinning' =>  $jawaban[$c]->id_jawaban_skrinning, 'jawaban' => $jawaban[$c]->jawaban, 'poin_jawaban' => $jawaban[$c]->poin_jawaban];
                //     } 
                // }
                // $detail[$a] = ['id_bagian_skrining' => $bagian[$a]->id_bagian_skrinning, 'nama_bagian' => $bagian[$a]->nama_bagian];
                // $soal = SoalSkrinning::where('bagian_skrinning_id', $bagian[$a]->id_bagian_skrinning)->orderBy('no_soal', 'ASC')->get();
                // for ($b=0; $b < count($soal) ; $b++) { 
                //     $detail[$a]['soal_jawab'][0] = array(['id_soal' => $soal[$b]->id_soal_skrinning, 'soal' => $soal[$b]->soal]);
                //     $jawaban = JawabanSkrinning::where('soal_skrinning_id', $soal[$b]->id_soal_skrinning)->orderBy('poin_jawaban', 'ASC')->get();
                //     for ($c=0; $c < count($jawaban); $c++) { 
                //         $detail[$a]['soal_jawab'][1][$c] = ['id_jawaban_skrinning' =>  $jawaban[$c]->id_jawaban_skrinning, 'jawaban' => $jawaban[$c]->jawaban, 'poin_jawaban' => $jawaban[$c]->poin_jawaban];
                //     }
                // }

                $detail[$a] = ['id_bagian_skrining' => $bagian[$a]->id_bagian_skrinning, 'nama_bagian' => $bagian[$a]->nama_bagian];
                $soal = SoalSkrinning::where('bagian_skrinning_id', $bagian[$a]->id_bagian_skrinning)->orderBy('no_soal', 'ASC')->get();
                for ($b = 0; $b < count($soal); $b++) {

                    $jawaban = JawabanSkrinning::where('soal_skrinning_id', $soal[$b]->id_soal_skrinning)->orderBy('poin_jawaban', 'ASC')->get();
                    for ($c = 0; $c < count($jawaban); $c++) {
                        $jawaban[$c] = ['id_jawaban_skrinning' => $jawaban[$c]->id_jawaban_skrinning, 'jawaban' => $jawaban[$c]->jawaban, 'poin_jawaban' => $jawaban[$c]->poin_jawaban];
                    }
                    $detail[$a]['soal_jawab'][$b] = ['id_soal' => $soal[$b]->id_soal_skrinning, 'soal' => $soal[$b]->soal, 'jawaban' => $jawaban];
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
            $status_code = 400;
        } catch (\Illuminate\Database\QueryException $e) {
            $status = 'failed';
            $message = 'Gagal menjalankan request. ' . $e->getMessage();
            $status_code = 500;
        } finally {
            return response()->json([
                'status' => $status,
                'message' => $message,
                'data' => $data,
                'skrin_user' => array($SkrinningUser)
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
                'skrin_user_id' => $request->skrin_user,
                'bagian_skrinning_id' => $request->id_bagian_skrining,
            ]);

            $jangkauan = DB::table('jangkauan_hasil_skrinnings')->where('bagian_skrinning_id', $request->id_bagian_skrining)->get();

            if (count($jangkauan) > 0) {
                $soal = SoalSkrinning::where('bagian_skrinning_id', $request->id_bagian_skrining)->orderBy('no_soal', 'ASC')->get();
                $id_jawaban = $request->id_jawaban_skrinning;
                for ($i = 0; $i < count($id_jawaban); $i++) {
                    $jawaban = JawabanSkrinning::where('id_jawaban_skrinning', $id_jawaban[$i])->first();
                    $newRIwayatSkrinning = RiwayatSkrinning::create([
                        'soal' => $soal[$i]->soal,
                        'jawaban' => $jawaban->jawaban,
                        'poin_jawaban' => $jawaban->poin_jawaban,
                        'tgl_pengisian' => date('Y-m-d'),
                        'bag_skrin_user_id' => $newBagianSkrinningUser->id_bag_skrin_user
                    ]);
                }
                $poin = DB::table('riwayat_skrinnings')->where('bag_skrin_user_id', $newBagianSkrinningUser->id_bag_skrin_user)->select('poin_jawaban')->sum('poin_jawaban');
                for ($j = 0; $j < count($jangkauan); $j++) {
                    if ($poin >= $jangkauan[$j]->jangkauan_awal && $poin <= $jangkauan[$j]->jangkauan_akhir) {
                        $newRiwayatHasilSkrinning = RiwayatHasilSkrinning::create([
                            'jenis_hasil' => $jangkauan[$j]->jenis_hasil,
                            'hasil' => $jangkauan[$j]->hasil,
                            'tgl_pengisian' => date('Y-m-d'),
                            'bag_skrin_user_id' => $newBagianSkrinningUser->id_bag_skrin_user,
                            'user_id' => $user->id_user
                        ]);
                        break;
                    }
                }


            } else {
                $positif = False;
                $soal = SoalSkrinning::where('bagian_skrinning_id', $request->id_bagian_skrining)->orderBy('no_soal', 'ASC')->get();
                $id_jawaban = $request->id_jawaban_skrinning;
                // dd($id_jawaban);
                for ($i = 0; $i < count($id_jawaban); $i++) {
                    $jawaban = JawabanSkrinning::where('id_jawaban_skrinning', $id_jawaban[$i])->first();
                    $newRIwayatSkrinning = RiwayatSkrinning::create([
                        'soal' => $soal[$i]->soal,
                        'jawaban' => $jawaban->jawaban,
                        'poin_jawaban' => $jawaban->poin_jawaban,
                        'tgl_pengisian' => date('Y-m-d'),
                        'bag_skrin_user_id' => $newBagianSkrinningUser->id_bag_skrin_user
                    ]);
                    if (strtolower($jawaban->jenis_jawaban) == 'positif') {
                        $positif = True;
                    }
                }
                if ($positif == True) {
                    $gethasil = HasilSkrinning::where('bagian_skrinning_id', $request->id_bagian_skrining)
                        ->where('jenis_hasil', 'positif')
                        ->first();
                    $newRiwayatHasilSkrinning = RiwayatHasilSkrinning::create([
                        'jenis_hasil' => 'positif',
                        'hasil' => $gethasil->hasil,
                        'tgl_pengisian' => date('Y-m-d'),
                        'bag_skrin_user_id' => $newBagianSkrinningUser->id_bag_skrin_user,
                        'user_id' => $user->id_user
                    ]);
                } elseif ($positif == False) {
                    $gethasil = HasilSkrinning::where('bagian_skrinning_id', $request->id_bagian_skrining)
                        ->where('jenis_hasil', 'negatif')
                        ->first();

                    $newRiwayatHasilSkrinning = RiwayatHasilSkrinning::create([
                        'jenis_hasil' => 'negatif',
                        'hasil' => $gethasil->hasil,
                        'tgl_pengisian' => date('Y-m-d'),
                        'bag_skrin_user_id' => $newBagianSkrinningUser->id_bag_skrin_user,
                        'user_id' => $user->id_user
                    ]);
                }
                $poin = DB::table('riwayat_skrinnings')->where('bag_skrin_user_id', $newBagianSkrinningUser->id_bag_skrin_user)->select('poin_jawaban')->sum('poin_jawaban');
            }

            $message = 'Submit skrinning berhasil';
            $status = 'success';
            $data = ['jenis_hasil' => $newRiwayatHasilSkrinning->jenis_hasil, 'deskripsi' => $newRiwayatHasilSkrinning->hasil, 'poin' => $poin];
        } catch (\Exception $e) {
            $status = 'failed';
            $message = 'Gagal menjalankan request. ' . $e->getMessage();
            $status_code = 400;
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
    //         $status_code = 500;
    //     } catch (\Illuminate\Database\QueryException $e) {
    //         $status = 'failed';
    //         $message = 'Gagal menjalankan request. ' . $e->getMessage();
    //         $status_code = 500;
    //     } finally {
    //         return response()->json([
    //             'status' => $status,
    //             'message' => $message,
    //             'data' => $data
    //         ], $status_code);
    //     }
    // }

    public function getAllReport()
    {
        $status = '';
        $message = '';
        $data = [];
        $status_code = 200;
        try {
            // Mengambil semua data skrining dari semua pengguna
            $allSkrinning = DB::select(DB::raw("
            SELECT 
                skrinning_users.id_skrin_user,
                users.id_user,
                users.username,
                skrinnings.id_skrinning,
                bagian_skrinning_users.id_bag_skrin_user,
                skrinning_users.tgl_pengisian,
                skrinnings.jenis_skrinning,
                bagian_skrinnings.nama_bagian,
                bagian_skrinnings.deskripsi_bagian
            FROM 
                skrinning_users
            JOIN 
                users ON skrinning_users.user_id = users.id_user
            JOIN 
                skrinnings ON skrinning_users.skrinning_id = skrinnings.id_skrinning
            RIGHT JOIN 
                bagian_skrinning_users ON bagian_skrinning_users.skrin_user_id = skrinning_users.id_skrin_user
            JOIN 
                bagian_skrinnings ON bagian_skrinning_users.bagian_skrinning_id = bagian_skrinnings.id_bagian_skrinning
            ORDER BY 
                skrinning_users.tgl_pengisian DESC;
        "));
        
        // Debug statement
        

            // Mengonversi hasil query ke array untuk manipulasi lebih lanjut
            $allSkrinning = json_decode(json_encode($allSkrinning), true);

            // Mengumpulkan data hasil skrining berdasarkan id_user
            $groupedData = [];
            foreach ($allSkrinning as $skrinning) {
                $hasil = DB::table('riwayat_hasil_skrinnings')->select('bag_skrin_user_id', 'jenis_hasil', 'hasil')->where('bag_skrin_user_id', $skrinning['id_bag_skrin_user'])->first();
                $sumpoin = DB::table('riwayat_skrinnings')->select('poin_jawaban')->where('bag_skrin_user_id', $skrinning['id_bag_skrin_user'])->sum('poin_jawaban');

                // Mengonversi hasil query ke array
                $hasil = json_decode(json_encode($hasil), true);

                // Menambahkan data hasil dan poin ke dalam array skrining
                $skrinning['jenis_hasil'] = $hasil['jenis_hasil'];
                $skrinning['hasil'] = $hasil['hasil'];
                $skrinning['poin_jawaban'] = (int) $sumpoin;

                // Mengelompokkan data berdasarkan id_user
                $username = $skrinning['username'];
                if (!isset($groupedData[$username])) {
                    $groupedData[$username] = [];
                }
                $groupedData[$username][] = $skrinning;
            }

            if (count($groupedData) > 0) {
                $message = 'data jenis skrinning tersedia';
            } else {
                $message = 'data jenis skrinning tidak tersedia';
            }
            $status = 'success';
            $data = $groupedData;
        } catch (\Exception $e) {
            $status = 'failed';
            $message = 'Gagal menjalankan request. ' . $e->getMessage();
            $status_code = 400;
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
                                ->rightJoin('bagian_skrinning_users', 'bagian_skrinning_users.skrin_user_id', '=', 'skrinning_users.id_skrin_user')
                                ->join('bagian_skrinnings', 'bagian_skrinning_users.bagian_skrinning_id', '=', 'bagian_skrinnings.id_bagian_skrinning')
                                ->select('skrinning_users.id_skrin_user', 'users.id_user', 'skrinnings.id_skrinning', 'bagian_skrinning_users.id_bag_skrin_user', 'tgl_pengisian', 'jenis_skrinning', 'nama_bagian', 'deskripsi_skrinning' )
                                ->orderBy('tgl_pengisian', 'ASC')
                                ->get();
            for ($a=0; $a < count($allSkrinning); $a++) { 
                $hasil = DB::table('riwayat_hasil_skrinnings')->select('bag_skrin_user_id', 'jenis_hasil', 'hasil')->where('bag_skrin_user_id', $allSkrinning[$a]->id_bag_skrin_user)->first();
                $sumpoin = DB::table('riwayat_skrinnings')->select('poin_jawaban')->where('bag_skrin_user_id', $allSkrinning[$a]->id_bag_skrin_user)->sum('poin_jawaban');
                $allSkrinning[$a] = [
                    'id_skrin_user' => $allSkrinning[$a]->id_skrin_user ,
                    'id_user' => $allSkrinning[$a]->id_user ,
                    'id_skrinning' => $allSkrinning[$a]->id_skrinning ,
                    'id_bag_skrin_user' => $allSkrinning[$a]->id_bag_skrin_user ,
                    'tgl_pengisian' => $allSkrinning[$a]->tgl_pengisian ,
                    'jenis_skrinning' => $allSkrinning[$a]->jenis_skrinning ,
                    'nama_bagian' => $allSkrinning[$a]->nama_bagian ,
                    'deskripsi_skrinning' => $allSkrinning[$a]->deskripsi_skrinning ,
                    'jenis_hasil' => $hasil->jenis_hasil, 
                    'hasil' => $hasil->hasil, 
                    'poin_jawaban' => (int)$sumpoin
                ];
            }

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
            $status_code = 400;
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

    public function getDetailRiwayatSkrinning($id)
    { {
            $status = '';
            $message = '';
            $data = [];
            $status_code = 200;
            try {
                $detail = [];
                $user = auth()->user();
                $skrinning = DB::table('skrinning_users')
                    ->where('user_id', $user->id_user)
                    ->join('users', 'skrinning_users.user_id', '=', 'users.id_user')
                    ->join('skrinnings', 'skrinning_users.skrinning_id', '=', 'skrinnings.id_skrinning')
                    ->rightJoin('bagian_skrinning_users', 'bagian_skrinning_users.skrin_user_id', '=', 'skrinning_users.id_skrin_user')
                    ->join('bagian_skrinnings', 'bagian_skrinning_users.bagian_skrinning_id', '=', 'bagian_skrinnings.id_bagian_skrinning')
                    ->where('id_bag_skrin_user', $id)
                    ->select('skrinning_users.id_skrin_user', 'users.id_user', 'skrinnings.id_skrinning', 'bagian_skrinning_users.id_bag_skrin_user', 'tgl_pengisian', 'jenis_skrinning', 'nama_bagian', 'deskripsi_skrinning')
                    ->orderBy('tgl_pengisian', 'ASC')
                    ->first();
                $sumpoin = DB::table('riwayat_skrinnings')->select('poin_jawaban')->where('bag_skrin_user_id', $id)->sum('poin_jawaban');
                $hasil = DB::table('riwayat_hasil_skrinnings')->select('bag_skrin_user_id', 'jenis_hasil', 'hasil')->where('bag_skrin_user_id', $id)->first();
                $detail = [
                    'id_skrinning' => $skrinning->id_skrinning,
                    'id_bag_skrin_user' => $skrinning->id_bag_skrin_user,
                    'jenis_skrinning' => $skrinning->jenis_skrinning,
                    'nama_bagian' => $skrinning->nama_bagian,
                    'tgl_pengisian' => $skrinning->tgl_pengisian,
                    'jenis_hasil' => $hasil->jenis_hasil,
                    'hasil' => $hasil->hasil,
                    'poin_total' => $sumpoin,
                ];

                $riwayat = RiwayatSkrinning::where('bag_skrin_user_id', $id)->get();
                for ($a = 0; $a < count($riwayat); $a++) {
                    $detail['soal_jawab'][$a] = ['no_soal' => $a + 1, 'soal' => $riwayat[$a]->soal, 'jawaban' => $riwayat[$a]->jawaban, 'poin_jawaban' => $riwayat[$a]->poin_jawaban];
                }

                if (count($detail) > 0) {
                    $message = 'data terkait skrining tersedia';
                } else {
                    $message = 'data terkait skrining tidak tersedia';
                }
                $status = 'success';
                $data = array($detail);
            } catch (\Exception $e) {
                $status = 'failed';
                $message = 'Gagal menjalankan request. ' . $e->getMessage();
                $status_code = 400;
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

    
}
