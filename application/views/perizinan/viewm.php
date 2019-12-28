<h4 class="text-center">Detail Informasi Kapal</h4>
<h5 class="text-center">Detail Informasi Untuk Melakukan Perizinan</h5>
<div class="card mx-auto" style="width: 45rem;">
  <div class="card-body">
    <div mt-2>
        <h6>Nama Kapal : <?= $kapal->namakapal?></h6>
        <h6>Nomor Registrasi Kapal : <?= $kapal->nokapal?></h6>
        <h6>Kebangsaan Kapal : <?= $kapal->asal?></h6>
        <h6>Nama Nahkoda :  <?= $kapal->nahkoda?></h6>
        <h6>Berat Kapal :  <?= $kapal->gt?> Ton</h6>
        <h6>Barang yang Dibawa :  <?= $kapal->goods?></h6>
        <h6>Rencana Operasi :  <?= $kapal->plan?></h6>
        <h6>Pelabuhan yang Dituju :  <?= $kapal->tujuan?></h6>
        <h6>Jenis Kapal :  <?= $kapal->jeniskapal?></h6>
        <h6>Tanggal Permintaan Izin : <?= $kapal->tanggal?></h6>
        <h6>Tanggal Diizinkan Izin : <?= $kapal->tanggalapp?></h6>
    </div>
    <?php if($kapal->approved == ''){?>
    <a href="<?= base_url('perizinan/izinkanm/').$kapal->uniqid?>" class="card-link btn btn-success btn-lg btn-block">Izinkan</a>
    <?php }?>
  </div>
</div>
