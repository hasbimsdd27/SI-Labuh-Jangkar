<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SILAJANG</title>

  <!-- Custom fonts for this template-->
  <link href="<?= base_url('assets/')?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="<?= base_url('assets/')?>css/sb-admin.css" rel="stylesheet">

  <style>
      body{
        background: url("<?= base_url()?>assets/img/b1.jpg") ;
        background-size: 100% 100%;
      }
  </style>
</head>

<script type="text/javascript">
    function jam() {
    var time = new Date(),
        hours = time.getHours(),
        minutes = time.getMinutes(),
        seconds = time.getSeconds();
    document.querySelectorAll('.jam')[0].innerHTML = harold(hours) + ":" + harold(minutes) + ":" + harold(seconds);
      
    function harold(standIn) {
        if (standIn < 10) {
          standIn = '0' + standIn
        }
        return standIn;
        }
    }
    setInterval(jam, 1000);
</script>

<body>
<!-- Image and text -->
<nav class="navbar navbar-expand navbar-primary bg-white-50 static-top">
<div class="container">
    <a class="navbar-brand mr-1 rounded text-white" href="<?= base_url()?>"><img src="<?= base_url()?>assets/img/logooo.png" height="48px" alt="">SILAJANG</a>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      
    </form>

    <!-- Navbar -->
    <a href="<?= base_url()?>" class="ml-2 badge badge-primary text-white">Kembali</a>
    <a href="" class="ml-2 text-white jam">Jam</a>
    </div>
  </nav>

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Total Pembayaran</div>
      <div class="card-body">
        <form action="<?= base_url('pembayaran/kpembayaran/').$invoice->uniqid?>" method="post">
            <h6>Nama Kapal</h6>
            <p class="text-right"><?= $invoice->namakapal?></p>
            <h6>Nomor Kapal</h6>
            <p class="text-right"><?= $invoice->nokapal?></p>
            <h6>Lama Labuh Jangkar</h6>
            <p class="text-right"><?= $invoice->durasi?> hari</p>
            <h6>Tarif per Gross Ton/Kunjungan/Hari</h6>
            <p class="text-right"><?= $invoice->currency?> <?= $invoice->tarif?></p>
            <h6>Total yang dibayar</h6>
            <p class="text-right"><?= $invoice->currency?> <?= $invoice->pendapatan?></p>
            <p class="text-center"><a href="<?= base_url('invoice/view/'.$invoice->uniqid)?>" target="_blank">Lihat Invoice</a></p>
            <input class="btn btn-primary btn-block text-white" type="submit" Value="Konfirmasi Pembayaran">
        </form>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url('assets/')?>vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url('assets/')?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url('assets/')?>vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
