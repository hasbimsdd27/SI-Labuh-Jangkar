     
        <!-- DataTables Example -->
        <div>
        <a href="<?= base_url('pelabuhan/tambah')?>" class='btn btn-primary mb-3'>Tambah Data</a>
        </div>
        <div>
        <a href="<?= base_url('/a')?>"></a>
        </div>
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Data Pelabuhan</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Nama</th>
                    <th>Long</th>
                    <th>Lat</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach($pelabuhan as $nk) { ?>
                  <tr>
                    <td><?= $nk->nama?></td>
                    <td><?= $nk->longitude?></td>
                    <td><?= $nk->latitude?></td>
                    </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
  