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
    <a href="<?= base_url()?>plogin" class="ml-2 badge badge-primary text-white">Pegawai</a>
    <a href="" class="ml-2 badge badge-primary text-white jam">Jam</a>
    </div>
  </nav>

  <div class="container">
    <div class="card mx-auto mt-5" style="width: 40rem;">
      <div class="card-header">Formulir Pengecekan</div>
      <div class="card-body">
      <form action="<?= base_url('login/login_kapal')?>" method="post">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <div class="form-label-group">
                  <input type="text" id="namakapal" name="namakapal" class="form-control" placeholder="Nama Kapal" required="required" autofocus="autofocus">
                  <label for="namakapal">Nama Kapal</label>
                </div>
              </div>
            </div>
          </div>
        <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <div class="form-label-group">
                  <input type="text" id="nokapal" name="nokapal" class="form-control" placeholder="Nomor Sertifikat Registrasi" required="required" autofocus="autofocus">
                  <label for="nokapal">Nomor Sertifikat Registrasi</label>
                </div>
              </div>
            </div>
          </div>
       
          <button type="submit" class="btn btn-primary btn-block">Search</button>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="<?= base_url('login/register')?>">Daftarkan Kapal Baru</a>
        </div>
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
