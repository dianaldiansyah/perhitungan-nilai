<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Models\NilaiMhs;
use Illuminate\Support\Facades\DB;

class NilaiController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function insertNilai(Request $request) {
        $nilaiMhs = new NilaiMhs;
        $nilaiMhs->nama = $request->nama;
        $nilaiMhs->quiz = $request->quiz;
        $nilaiMhs->tugas = $request->tugas;
        $nilaiMhs->absensi = $request->absensi;
        $nilaiMhs->praktek = $request->praktek;
        $nilaiMhs->uas = $request->uas;

        $nilaiMhs->save();

        return redirect('/');
    }

    public function semuaNilai() {
        $nilai = DB::table('nilai_mhs')->get();
        $avgInt = array();
        $avgStr = [
            0 => 0,
            1 => 0,
            2 => 0,
            3 => 0,
        ];

        foreach($nilai as $n) {
            $t = $n->quiz + $n->tugas + $n->absensi + $n->praktek + $n->uas;
            array_push($avgInt, $t/5);
        }

        foreach($avgInt as $a) {
            switch ($a) {
                case $a <= 65:
                    $avgStr[3]++;
                    break;
                case $a <= 75:
                    $avgStr[2]++;
                    break;
                case $a <= 85:
                    $avgStr[1]++;
                    break;
                case $a <= 100:
                    $avgStr[0]++;
                    break;
            }
        }

        return view('index', ['semuaNilai' => $avgStr]);
    }
}