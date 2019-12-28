<div class="card" style="width: 40rem;">
  <div class="card-body">
    <h5 class="card-title">Input Data Pegawai</h5>
    <form action="<?= base_url('pegawai/tpegawai')?>" method="post">
  <div class="form-group">
    <label for="nip">NIP</label>
    <input type="text" class="form-control" id="nip" name="nip" placeholder="NIP">
  </div>
  <div class="form-group">
    <label for="nama">Nama</label>
    <input type="text" class="form-control" id="nama" name="nama" placeholder="nama">
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="level">Status</label>
    <select class="form-control" id="level" name="level">
      <option>Pegawai</option>
      <option>Admin</option>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
  </div>
</div>