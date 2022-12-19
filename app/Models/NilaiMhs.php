<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class NilaiMhs extends Model
{
  protected $table = 'nilai_mhs';
  public $timestamps = false;
  protected $fillable = [
      'nama', 'quiz', 'tugas', 'absensi', 'praktek', 'uas'
  ];
}