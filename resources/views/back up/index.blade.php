<div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Tambah Data Laporan</h4>
                  <p class="card-description">
                    Masukkan data dengan lengkap!
                  </p>

                  <form method="post" action="/pengaduan/store" enctype="multipart/form-data">
 
                        {{ csrf_field() }}
                    <div class="form-group">
                      <label for="tgl_pengaduan">Tanggal Pengaduan</label>
                      <input type="date" class="form-control" name="tgl_pengaduan">
                    </div>
                    <div class="form-group">
                      <label for="nik">NIK Pelapor</label>
                      <input type="text" class="form-control" name="nik" placeholder="nik">
                    </div>
                    <div class="form-group">
                      <label for="isi_laporan">Isi Laporan</label>
                      <textarea class="form-control" name="isi_laporan" rows="4"></textarea>
                    </div>
                    <div class="form-group">
                    <label class="control-label col-sm-2">Foto</label>
                    <div class="input-group mb-3">
                      <tr>
                        <td>
                          <input type="file" name="foto" id="inputGroupFile">
                        </td>
                      </tr>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
            </div>