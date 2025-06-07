<div class="container mt-3">

    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash(); ?>
        </div>
    </div>

    <div class="col-lg-6 mb-3">
        <button type="button" class="btn btn-primary tombolTambahData" data-toggle="modal" data-target="#formModal">
                Tambah Data Mahasiswa
        </button>
    </div>


    <div class="col-lg-6">
        <form action="<?= BASEURL; ?>/mahasiswa/cari" method="post">
            <div class="input-group mb-3">
  <input type="text" class="form-control" placeholder="Cari Mahasiswa..." name="keyword" autocomplete="off">
  <div class="input-group-append">
    <button class="btn btn-primary" type="submit" id="tombolCari">CARI</button>
  </div>
</div>
        </form>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <h3>Daftar Mahasiswa</h3>
                    <ul class="list-group">
                        <?php foreach ($data['mhs'] as $mhs) : ?>
                        <li class="list-group-item "><?= $mhs['nama']; ?>
                        <a href="<?= BASEURL;?>/mahasiswa/hapus/<?= $mhs['id'];?>" class="badge badge-pill badge-danger float-right ml-2" onclick="return confirm('Yakin mau hapus?');">Hapus</a>
                        <a href="<?= BASEURL;?>/mahasiswa/ubah/<?= $mhs['id'];?>" class="badge badge-pill badge-warning float-right ml-2 tampilModalUbah" data-toggle="modal" data-target="#formModal" data-id="<?= $mhs['id']; ?>">Ubah</a>
                        <a href="<?= BASEURL;?>/mahasiswa/detail/<?= $mhs['id'];?>" class="badge badge-pill badge-primary float-right ml-2">Details</a>
                    </li>
                        <?php endforeach; ?>
                    </ul>
                
            
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModalLabel">Tambah data Mahasiswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <form action="<?= BASEURL; ?>/mahasiswa/tambah" method="post">
            <input type="hidden" name="id" id="id">

            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" class="form-control" id="nama" name="nama">
            </div>

            <div class="form-group">
                <label for="nim">Nim:</label>
                <input type="number" class="form-control" id="nim" name="nim">
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="@example.com">
            </div>

            <div class="form-group">
                <label for="jurusan">Jurusan:</label>
                <select class="form-control" id="jurusan" name="jurusan">
                    <option value="Teknik Informatika">Teknik Informatika</option>
                    <option value="Sistem Informasi">Sistem Informasi</option>
                </select>
            </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Tambah Data</button>
        </form>
      </div>
    </div>
  </div>
</div>