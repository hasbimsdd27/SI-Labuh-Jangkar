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
    <a href="" class="ml-2 text-white jam"></a>
    </div>
  </nav>

  <div class="container">
  <div class="card mx-auto" style="width: 30rem;">
  <div class="card-body">
    <h5 class="card-title text-center">Data Kapal</h5>
    <h6>Nama Kapal</h6>
    <p><?= $namakapal?></p>
    <h6>Nomor Sertifikat Registrasi</h6>
    <p><?= $nokapal?></p>
    <h6>Asal</h6>
    <p><?= $asal?></p>
    <h6>Tujuan</h6>
    <p><?= $tujuan?></p>
    <h6>Tonase Kotor</h6>
    <p><?= $gt?></p>
    <h6>Permintaan Izin Mulai Labuh Jangkar</h6>
    <?php
        $data1 = array(
          'uniqid' => $uniqid,
          'approved' => 'yes'
      );
        $data2 = array(
          'uniqid' => $uniqid,
          'approved' => ''
      );
        $cari = $this->Db->caridata('tb_req_lajang', $data1)->num_rows();
        if($cari > 0){
            $dd = $this->Db->ambildata('tb_req_lajang', $data1);
            $tanggal = $dd->tanggal;
            $linkmap = base_url('login/lokasi/').$uniqid;

            echo '<a type="button"class="btn btn-primary" href='.$linkmap.'>Lihat Lokasi</a><br>    Diizinkan pada '.$tanggal;
        }else{
          $cari = $this->Db->caridata('tb_req_lajang', $data2)->num_rows();
          if($cari > 0){
              $dd = $this->Db->ambildata('tb_req_lajang', $data2);
              $tanggal = $dd->tanggal;
  
              echo 'Dalam Proses';
        }else{
          
          $link = base_url('izinka/perizinm/').$uniqid;
          echo '<a type="button"class="btn btn-primary" href='.$link.'>Ajukan Permintaan Izin</a>';   
        }   
        }
    ?>
    <h6>Permintaan Izin Selesai Labuh Jangkar</h6>
    <?php
       $data1 = array(
        'uniqid' => $uniqid,
        'approved' => 'yes'
    );
      $data2 = array(
        'uniqid' => $uniqid,
        'approved' => ''
    );
        $cari = $this->Db->caridata('tb_req_ajang', $data1)->num_rows();
        if($cari > 0){
            $dd = $this->Db->ambildata('tb_req_ajang', $data1);
            $tanggal = $dd->tanggal;
            echo 'Diizinkan Pada '.$tanggal;
        }else{
          $cari = $this->Db->caridata('tb_req_ajang', $data2)->num_rows();
          if($cari > 0){
              $dd = $this->Db->ambildata('tb_req_ajang', $data2);
              $tanggal = $dd->tanggal;
  
              echo 'On Process';
          }else{

            $link = base_url('izinka/perizink/').$uniqid;
            echo '<a type="button"class="btn btn-primary" href='.$link.'>Ajukan Permintaan Izin</a>';
          }

        }   
    ?>
    <h6>Status Pembayaran</h6>
    <?php
        $data1 = array(
          'uniqid' => $uniqid,
          'konfirmasi' => 'yes',
          'approved' => 'yes'
      );
        $data2 = array(
          'uniqid' => $uniqid,
          'konfirmasi' => 'yes'
      );
        $data3 = array(
          'uniqid' => $uniqid
      );
        $cari = $this->Db->caridata('tb_invoice', $data1)->num_rows();
        $cari2 = $this->Db->caridata('tb_invoice', $data2)->num_rows();
        $cari3 = $this->Db->caridata('tb_invoice', $data3)->num_rows();
        if($cari !== 0){
            $dd = $this->Db->ambildata('tb_invoice', $data1);
            $tanggal = $dd->tanggal;
            $linkinv = base_url('invoice/view/').$uniqid;

            echo 'Sudah '.$tanggal;
            echo '<br><a target="_blank"href='.$linkinv.'>Lihat Invoice</a>';
        }else{
          if($cari2 !== 0){
            $linkinv = base_url('invoice/view/').$uniqid;
            echo 'Sedang Diproses';
            echo '<br><a target="_blank"href='.$linkinv.'>Lihat Invoice</a>';
          }else{
            if($cari3 !==0){
              echo '<a class="btn btn-primary" target="_blank"href='.base_url('pembayaran/payment/'.$uniqid).'>Lihat Detail Keperluan Pembayaran</a>';
            }else{
              echo '-';
            }}}

      
    ?>
    <h6>Persetujuan Untuk Berlayar Kembali</h6>
    <?php
       $data1 = array(
        'uniqid' => $uniqid,
        'approved' => 'yes'
    );
      $data2 = array(
        'uniqid' => $uniqid,
        'approved' => ''
    );
        $cari = $this->Db->caridata('tb_invoice', $data1)->num_rows();
        if($cari > 0){
            $dd = $this->Db->ambildata('tb_invoice', $data1);
            $tanggal = $dd->tanggalapp;
            echo 'Diizinkan Pada '.$tanggal;
        }else{

            echo '-';
          }
 
    ?>
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
