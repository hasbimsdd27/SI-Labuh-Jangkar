     
        <!-- DataTables Example -->
        <div>
        <a href="<?= base_url('pegawai/tambah')?>" class='btn btn-primary mb-3'>Tambah Pegawai</a>
        </div>
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Data Pegawai</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>Level</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach($pegawai as $nk) { ?>
                  <tr>
                    <td><?= $nk->nip?></td>
                    <td><?= $nk->nama?></td>
                    <td><?= $nk->level?></td>
                    <td><a href="#" class="badge badge-primary">Reset Password</a>
                    </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
  