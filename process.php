<?php
include './db_connection.php';
include './ehcs.php';
include './tala.php';
// include './Model/Kata.php';
$kata = new Kata();
$result = $kata->read($conn);

$ehcs = new Ehcs();
$tala = new Tala();

foreach ($result as $i) {
  # code...

  $start_timeTala = microtime(true);
  $val = $tala->process($i['kata']);
  $cekTala = $ehcs->checkStem($val);
  $end_timeTala = microtime(true);

  $execution_timeTala = ($end_timeTala - $start_timeTala);
  $timeTala = number_format($execution_timeTala, 4, '.', '');
  if ($cekTala){
    $arr = ['id' => $i['id'], 'waktu' => $timeTala, 'kataDasar' => $val, 'status' => 1];
    $kata->updateTala($arr, $conn);
  } else {
    $arr = ['id' => $i['id'], 'waktu' => $timeTala, 'kataDasar' => $val, 'status' => 0];
    $kata->updateTala($arr, $conn);
  }


  $start_time = microtime(true);
  $stemming = $ehcs->proccess($i['kata']);
  $end_time = microtime(true);

  $execution_time = ($end_time - $start_time);
  $time = number_format($execution_time, 4, '.', '');

  if ($stemming['root']) {
    $arr = ['id' => $i['id'], 'waktu' => $time, 'kataDasar' => $stemming['stem'], 'status' => 1];
    $kata->updateEhcs($arr, $conn);
  } else{
    $arr = ['id' => $i['id'], 'waktu' => $time, 'kataDasar' => $stemming['stem'], 'status' => 0];
    $kata->updateEhcs($arr, $conn);
  }
}

header("Location: /stem.php");
die();

class Kata {
  public function read($conn){
    $sql = "SELECT * FROM kata";
    $cek = mysqli_query($conn, $sql);
    if ($cek){
      return mysqli_fetch_all($cek,MYSQLI_ASSOC);
    } else {
      return [];
    }
  }

  public function updateTala($arr, $conn){
    $id = $arr['id'];
    $kataDasar = $arr['kataDasar'];
    $waktu = $arr['waktu'];
    $status = $arr['status'];
    $sql = "UPDATE kata SET kata_dasar_1 = '$kataDasar', waktu_1 = '$waktu', status_1 = '$status' WHERE id='$id'";
    mysqli_query($conn, $sql);
  }

  public function updateEhcs($arr, $conn){$id = $arr['id'];
    $kataDasar = $arr['kataDasar'];
    $waktu = $arr['waktu'];
    $status = $arr['status'];
    $sql = "UPDATE kata SET kata_dasar_2 = '$kataDasar', waktu_2 = '$waktu', status_2 = '$status' WHERE id='$id'";
    mysqli_query($conn, $sql);
  }
}
?>
