     
        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Data Permintaan Izin Masuk Kapal</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Nama Kapal</th>
                    <th>Nomor Dokumen</th>
                    <th>Asal</th>
                    <th>Tujuan</th>
                    <th>Gross Ton</th>
                    <th>Durasi</th>
                    <th>Pendapatan</th>
                    <th>Telah Dibayar</th>
                    <th>Tindakan</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach($kapal as $nk) { ?>
                  <tr>
                    <td><?= $nk->namakapal?></td>
                    <td><?= $nk->nokapal?></td>
                    <td><?= $nk->asal?></td>
                    <td><?= $nk->tujuan?></td>
                    <td><?= $nk->gt?></td>
                    <td><?= $nk->durasi?></td>
                    <td><?= $nk->pendapatan?></td>
                    <td><?= $nk->konfirmasi?></td>
                    <td><a href="<?= base_url('perizinan/viewp/').$nk->uniqid?>" class="badge badge-primary">Setujui</a>
                    </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
  