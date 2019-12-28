     
        <!-- DataTables Example -->
        <div>
        <a href="<?= base_url('jnt/tambah')?>" class='btn btn-primary mb-3'>Tambah Data</a>
        </div>
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Data Tarif dan Jenis Kapal</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Jenis Kapal</th>
                    <th>Tarif</th>
                    <th>Satuan</th>
                    <th>Mata Uang</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach($jnt as $nk) { ?>
                  <tr>
                    <td><?= $nk->jenis?></td>
                    <td><?= $nk->tarif?></td>
                    <td><?= $nk->satuan?></td>
                    <td><?= $nk->currency?></td>
                    </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
  