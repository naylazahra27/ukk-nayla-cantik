<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tanggapan;
use App\Pengaduan;

class TanggapanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengaduan = \App\Pengaduan::all();
        $tanggapan = Tanggapan::all();
        return view('tanggapan.index', compact('tanggapan','pengaduan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tanggapan = \App\Tanggapan::all();
        //$pemohon = Pemohon::all();
        $pengaduan = Pengaduan::select('id_pengaduan', 'isi_laporan')->where('status', '=', '1')->get();

        return view('tanggapan.create', compact('tanggapan','pengaduan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = ([
            'unique' => "This NIK has been taken",
            'required' => "Data is required!",
            'numeric' => "Harus berupa angka!",
            'min' => "Minimal 16 Angka!"
        ]);

       $this->validate($request,[
            'id_pengaduan' => 'required',
    		'tgl_tanggapan' => 'required',
            'tanggapan' => 'required',
            'nik' => 'required'
        ], $message);

       Tanggapan::create([
        'id_pengaduan' => $request->id_pengaduan,
        'tgl_tanggapan' => $request->tgl_tanggapan,
        'tanggapan' => $request->tanggapan,
        'nik' => $request->nik
       ]);

        return redirect()->route('tanggapan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
