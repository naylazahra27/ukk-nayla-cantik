<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet">
        <title>Tanggapan Masyarakat</title>
    </head>
    <body>
        <div class="container">
            <div class="card mt-5">
                <div class="card-header text-center">
                TAMBAH DATA
                </div>
                <div class="card-body">
                    <a href="/tanggapan" class="btn btn-primary">Kembali</a>
                    <br/>
                    <br/>
                    
                    <form method="post" action="/tanggapan/store" enctype="multipart/form-data">
 
                        {{ csrf_field() }}
 
                        <div class="form-group">
                            <label>Nik</label>
                            <input type="text" name="nik" class="form-control" placeholder="nik">
 
                            @if($errors->has('nik'))
                                <div class="text-danger">
                                    {{ $errors->first('nik')}}
                                </div>
                            @endif
 
                        </div>

                        <!-- <div class="form-group">
                            <label>Pengaduan</label>
                            <input type="Text" name="id_pengaduan" class="form-control" placeholder="id_pengaduan">
 
                             @if($errors->has('id_pengaduan'))
                                <div class="text-danger">
                                    {{ $errors->first('id_pengaduan')}}
                                </div>
                            @endif
 
                        </div> -->

                        <div class="form-group">
                    <label for="id_pengaduan"> Pengaduan </label>
                      <select name="id_pengaduan" class="form-control">
                        @foreach($pengaduan as $key => $val):
                        <option value="<?= $val['id_pengaduan'] ?>">{{$val['id_pengaduan']}} || {{$val['isi_laporan']}}</option>
                        @endforeach
                      </select>
                    </div>

 
                        <div class="form-group">
                            <label>Tanggal Tanggapan</label>
                            <input type="date" name="tgl_tanggapan" class="form-control" placeholder="tgl_tanggapan">
 
                             @if($errors->has('tgl_tanggapan'))
                                <div class="text-danger">
                                    {{ $errors->first('tgl_tanggapan')}}
                                </div>
                            @endif
 
                        </div>

                        <div class="form-group">
                            <label>Tanggapan</label>
                            <textarea name="tanggapan" class="form-control" placeholder="tanggapan"></textarea>
 
                             @if($errors->has('tanggapan'))
                                <div class="text-danger">
                                    {{ $errors->first('tanggapan')}}
                                </div>
                            @endif
 
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-success" value="Simpan">
                        </div>
 
                    </form>
 
                </div>
            </div>
        </div>
    </body>
</html>