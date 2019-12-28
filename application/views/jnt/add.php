<div class="card" style="width: 40rem;">
  <div class="card-body">
    <h5 class="card-title">Input Data Pelabuhan</h5>
    <form action="<?= base_url('jnt/tjnt')?>" method="post">
  <div class="form-group">
    <label for="jenis">Jenis Kapal</label>
    <input type="text" class="form-control" id="jenis" name="jenis" placeholder="Jenis">
  </div>
  <div class="form-group">
    <label for="tarif">Tarif</label>
    <input type="text" min="0" step="1000"class="form-control" id="tarif" name="tarif" placeholder="tarif">
  </div>
  <div class="form-group">
    <label for="satuan">Satuan</label>
    <input type="text" class="form-control" id="satuan" name="satuan" placeholder="satuan">
  </div>
  <div class="form-group">
    <label for="currency">Mata Uang</label>
    <input type="text" class="form-control" id="currency" name="currency" placeholder="currency">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
  </div>
</div>