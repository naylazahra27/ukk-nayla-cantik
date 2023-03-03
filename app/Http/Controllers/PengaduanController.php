<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengaduan;
// use Carbon\Carbon;

class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengaduan = Pengaduan::all();
        return view('pengaduan.index', compact('pengaduan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengaduan.create');
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
            'tgl_pengaduan' => 'required',
    		'nik' => 'required|numeric|min:16',
            'isi_laporan' => 'required',
            'foto.*' => 'image|mimes:doc,docx,PDF,pdf,jpg,jpeg,png|max:1024|required'
        ], $message);

        $nm = $request->foto;
        $item = time().rand(100,999).".".$nm->getClientOriginalName();

        $data = new Pengaduan;
        //$data->id_pengaduan = $request->id_pengaduan;
        $data->tgl_pengaduan = $request->tgl_pengaduan;
        $data->nik = $request->nik;
        $data->isi_laporan = $request->isi_laporan;
        $data['foto']=
        $request->file('foto')->store('assets/pengaduan','public');

        $data->save();
        return redirect()->route('pengaduan');
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
        $pengaduan = Pengaduan::where('id_pengaduan',$id)->first(); 
        return view('pengaduan.edit', compact('pengaduan'));
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
        $this->validate($request,[
            'tgl_pengaduan' => 'required',
            'nik' => 'required|numeric',
            'isi_laporan'  => 'required',
            'foto' => 'required'
        ]);

        Pengaduan::where('id_pengaduan',$id)->update([
            'tgl_pengaduan' => $request->tgl_pengaduan,
            'nik'       => $request->nik,
            'isi_laporan'  => $request->isi_laporan,
            'foto' =>  $request->file('foto')->store('assets/pengaduan','public')
        ]);
        
        return redirect()->route('pengaduan')->with('Data diedit','Data berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pengaduan::where('id_pengaduan',$id)->delete();
        return redirect()->route('pengaduan')->with('Data dihapus','Data berhasil dihapus!');
    }

    public function status($id)
    {
        $pengaduan = Pengaduan::where('id_pengaduan',$id)->first();

        $status_sekarang = $pengaduan->status;

        If($status_sekarang == 1){
            Pengaduan::where('id_pengaduan',$id)->update([
                'status'=>0
            ]);
        }else{
            Pengaduan::where('id_pengaduan',$id)->update([
                'status'=>1
            ]);
        }
        
         return redirect()->route('pengaduan')->with('Data diubah','Data berhasil diubah!');
        }
}
