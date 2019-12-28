<div class="card" style="width: 40rem;">
  <div class="card-body">
    <h5 class="card-title">Input Data Pelabuhan</h5>
    <form action="<?= base_url('pelabuhan/tpelabuhan')?>" method="post">
  <div class="form-group">
    <label for="nama">Nama Pelabuhan</label>
    <input type="text" class="form-control" id="nama" name="nama" placeholder="nama">
  </div>
  <div class="form-group">
    <label for="longitude">Longitude</label>
    <input type="text" class="form-control" id="longitude" name="longitude" placeholder="longitude">
  </div>
  <div class="form-group">
    <label for="latitude">Latitude</label>
    <input type="text" class="form-control" id="latitude" name="latitude" placeholder="latitude">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
  </div>
</div>