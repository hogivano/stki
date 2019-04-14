<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <title>
     STKI - Algoritma Stemming Tala & EHCS
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <!-- Nucleo Icons -->
  <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="assets/css/blk-design-system.css?v=1.0.0" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="Datatables/datatables.css">
  <link rel="stylesheet" type="text/css" href="Datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" type="text/css" href="Datatables/css/jquery.dataTables.min.css">

  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assets/demo/demo.css" rel="stylesheet" />
  <style>
    #example tbody td {
      color: #525f7f !important;
    }

    label {
      color: white;
    }

    .dataTables_info {
      color: white !important;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button {
      color: white !important;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button.previous.disabled {
      color: white !important;
    }
  </style>
</head>

<body class="profile-page">


  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg fixed-top navbar-transparent " color-on-scroll="100">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="index.php" rel="tooltip" title="STKI S1 Sistem Informasi" data-placement="bottom" target="_blank">
          <span>Algoritma Stemming•</span> Tala & EHCS
        </a>
        <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-bar bar1"></span>
          <span class="navbar-toggler-bar bar2"></span>
          <span class="navbar-toggler-bar bar3"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse justify-content-end" id="navigation">
        <div class="navbar-collapse-header">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a>
                Algoritma Stemming•
              </a>
            </div>
            <div class="col-6 collapse-close text-right">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <i class="tim-icons icon-simple-remove"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->
  <div class="wrapper">
    <div class="page-header">
      <img src="assets/img/dots.png" class="dots">
      <img src="assets/img/path4.png" class="path">
      <div class="container align-items-center">
        <div class="">
            <a type="button" href="/document.php" class="btn btn-light" name="button">Baru</a>
            <a type="button" class="btn btn-light" href="/list-document.php" name="button">List Dokumen</a>
            <a type="button" class="btn btn-light" href="/process.php" name="button">Proses</a>
        </div>
        <div class="row">
          <div class="col-lg-6 col-md-6">
            <h1 class="profile-title text-left">Tala</h1>
            <h5 class="text-on-back">01</h5>
            <p class="profile-description">Hasil Stemming dengan Algoritma Tala</p>
          </div>
          <div class="col-lg-12">
              <?php
$db_host = 'localhost'; // Nama Server
$db_user = 'root'; // User Server
$db_pass = 'op'; // Password Server
$db_name = 'stki'; // Nama Database

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
    die ('Gagal terhubung MySQL: ' . mysqli_connect_error());
}

$sql = 'SELECT id, kata, kata_dasar_1, waktu_1, status_1
        FROM kata';

$rataWaktuTala = 'SELECT AVG(waktu_1) FROM kata';

$rataStatus = 'SELECT AVG(status_1) FROM kata';

$query = mysqli_query($conn, $sql);
$queryWaktu = mysqli_query($conn, $rataWaktuTala);
$queryStatus = mysqli_query($conn, $rataStatus);

if (!$query) {
    die ('SQL Error: ' . mysqli_error($conn));
}
if (!$queryWaktu) {
    die ('SQL Error: ' . mysqli_error($conn));
}
if (!$queryStatus) {
    die ('SQL Error: ' . mysqli_error($conn));
}

$rowRataWaktu = mysqli_fetch_array($queryWaktu);
$rowRataStatus = mysqli_fetch_array($queryStatus);

echo'<br><p class="profile-description">Rata - Rata Waktu yang digunakan = ' . number_format($rowRataWaktu['AVG(waktu_1)'], 6, '.', '') .'</p>';
echo'<br><p class="profile-description">Rata - Rata Keberhasilan = ' . $rowRataStatus['AVG(status_1)'] * 100 .'%</p>';

echo '<table id="example" class="display" ">
        <thead>
            <tr>
                <th>Id</th>
                <th>Kata</th>
                <th>Kata Dasar</th>
                <th>Waktu</th>
                <th>Status</th>
                <th>Frekuensi</th>
            </tr>
        </thead>
        <tbody>';

while ($row = mysqli_fetch_array($query))
{
    $status = '';
    if ($row['status_1'] == 1){
      $status = 'berhasil';
    } else if ($row['status_1'] == 0){
      $status = 'gagal';
    }

    $id = $row['id'];
    $q = "SELECT SUM(frekuensi) FROM document_kata WHERE id_kata='$id'";
    $cek = mysqli_query($conn, $q);
    $frekuensi = 0;
    if ($cek){
      $frekuensi =  mysqli_fetch_array($cek);
    }

    echo '<tr>
            <td>'.$row['id'].'</td>
            <td>'.$row['kata'].'</td>
            <td>'.$row['kata_dasar_1'].'</td>
            <td>'.$row['waktu_1'].'</td>
            <td>'.$status.'</td>
            <td>'.$frekuensi['SUM(frekuensi)'].'</td>
        </tr>';
}
echo '
    </tbody>
</table>';
?>

          </div>
        </div>
      </div>
    </div>
  </div>

    <div class="section">
      <img src="assets/img/path4.png" class="path">
      <div class="container align-items-center">
        <div class="row">
          <div class="col-lg-6 col-md-6">
            <h1 class="profile-title text-left">EHCS</h1>
            <h5 class="text-on-back">02</h5>
            <p class="profile-description">Hasil Stemming dengan Algoritma EHCS</p>
          </div>
          <div class="col-lg-12">

  <?php
$db_host = 'localhost'; // Nama Server
$db_user = 'root'; // User Server
$db_pass = 'op'; // Password Server
$db_name = 'stki'; // Nama Database

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
    die ('Gagal terhubung MySQL: ' . mysqli_connect_error());
}

$sql = 'SELECT id, kata, kata_dasar_2, waktu_2, status_2
        FROM kata';

$rata = 'SELECT AVG(waktu_2) FROM kata';

$rataStatus = 'SELECT AVG(status_2) FROM kata';

$query = mysqli_query($conn, $sql);
$rataquery = mysqli_query($conn, $rata);
$rataStatus = mysqli_query($conn, $rataStatus);

if (!$query) {
    die ('SQL Error: ' . mysqli_error($conn));
}
if (!$rataquery) {
    die ('SQL Error: ' . mysqli_error($conn));
}
if (!$rataStatus) {
    die ('SQL Error: ' . mysqli_error($conn));
}

$rowRataQuery = mysqli_fetch_array($rataquery);
$rowRataStatus = mysqli_fetch_array($rataStatus);

echo'<br><p class="profile-description">Rata - Rata Waktu yang digunakan = '.number_format($rowRataQuery['AVG(waktu_2)'], 6, '.', '').'</p>';
echo'<br><p class="profile-description">Rata - Rata Keberhasilan = '. $rowRataStatus['AVG(status_2)'] * 100 .'%</p>';

echo '<table id="example2" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>Kata</th>
                <th>Kata Dasar</th>
                <th>Waktu</th>
                <th>Status</th>
                <th>Frekuensi</th>
            </tr>
        </thead>
        <tbody>';

while ($row = mysqli_fetch_array($query))
{
  $status = '';
  if ($row['status_2'] == 1){
    $status = 'berhasil';
  } else if ($row['status_2'] == 0){
    $status = 'gagal';
  }
  $id = $row['id'];
  $q = "SELECT SUM(frekuensi) FROM document_kata WHERE id_kata='$id'";
  $cek = mysqli_query($conn, $q);
  $frekuensi = 0;
  if ($cek){
    $frekuensi =  mysqli_fetch_array($cek);
  }

    echo '<tr>
            <td>'.$row['id'].'</td>
            <td>'.$row['kata'].'</td>
            <td>'.$row['kata_dasar_2'].'</td>
            <td>'.$row['waktu_2'].'</td>
            <td>'.$status.'</td>
            <td>'.$frekuensi['SUM(frekuensi)'].'</td>
        </tr>';
}
echo '
    </tbody>
</table>';
?>


            </div>
          </div>
        </div>
      </div>
    </div>


  </div>
  <!--   Core JS Files   -->
  <script src="assets/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="assets/js/jquery-3.3.1.js" type="text/javascript"></script>
  <script src="assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="assets/js/core/bootstrap.min.js" type="text/javascript"></script>
  <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
  <script src="assets/js/plugins/bootstrap-switch.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
  <!-- Chart JS -->
  <script src="assets/js/plugins/chartjs.min.js"></script>
  <!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
  <script src="assets/js/plugins/moment.min.js"></script>
  <script src="assets/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>
  <!-- Black Dashboard DEMO methods, don't include it in your project! -->
  <script src="assets/demo/demo.js"></script>
  <!-- Control Center for Black UI Kit: parallax effects, scripts for the example pages etc -->
  <script type="text/javascript" charset="utf8" src="Datatables/datatables.js"></script>
  <script type="text/javascript" charset="utf8" src="Datatables/js/jquery.dataTables.min.js"></script>
  <script src="assets/js/blk-design-system.min.js?v=1.0.0" type="text/javascript"></script>

  <script type="text/javascript">
  $(document).ready(function(){
    $('#example').DataTable();
    $('#example2').DataTable();
  });
</script>

</body>

</html>
