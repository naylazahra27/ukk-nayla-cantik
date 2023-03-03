<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    public $timestamps = false;
    protected $table = 'pengaduan';
    protected $fillable = ['tgl_pengaduan','nik','isi_laporan','foto','status'];

    public function Tanggapan() {
        return $this->hasMany('App\Tanggapan');
    }
}
