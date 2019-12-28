<h4 class="text-center">Detail Informasi Kapal</h4>
<h5 class="text-center">Detail Informasi Untuk Melakukan Perizinan</h5>
<div class="card mx-auto" style="width: 30rem;">
  <div class="card-body">
    <div mt-2>
        <h6>Nama Kapal : </h6>
        <p class="text-right"><?= $kapal->namakapal?></p>
        <h6>Nomor Registrasi Kapal : </h6>
        <p class="text-right"><?= $kapal->nokapal?></p>
        <h6>Kebangsaan Kapal :</h6>
        <p class="text-right"> <?= $kapal->asal?></p>
        <h6>Nama Nahkoda :  </h6>
        <p class="text-right"><?= $kapal->nahkoda?></p>
        <h6>Berat Kapal : </h6>
        <p class="text-right"> <?= $kapal->gt?> Ton</p>
        <h6>Barang yang Dibawa : </h6>
        <p class="text-right"> <?= $kapal->goods?></p>
        <h6>Rencana Operasi :  </h6>
        <p class="text-right"><?= $kapal->plan?></p>
        <h6>Pelabuhan yang Dituju :  </h6>
        <p class="text-right"><?= $kapal->tujuan?></p>
        <h6>Jenis Kapal : </h6>
        <p class="text-right"> <?= $kapal->jeniskapal?></p>
        <h6>Lama Labuh Jangkar : </h6>
        <p class="text-right"><?= $kapal->durasi?></p>
        <h6>Total Pembayaran : </h6>
        <p class="text-right"><?= $kapal->currency.' '.$kapal->pendapatan?></p>
        <h6>Sudah Dibayar : </h6>
        <p class="text-right"><?= $kapal->konfirmasi?></p>
    </div>
    <?php if($kapal->approved == ''){?>
    <a href="<?= base_url('perizinan/izinkanin/').$kapal->uniqid?>" class="card-link btn btn-success btn-lg btn-block">Izinkan</a>
    <?php }?>
  </div>
</div>
