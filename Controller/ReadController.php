<?php
define('_root',$_SERVER['DOCUMENT_ROOT']);
include(_root.'/db_connection.php');

$sql = "SELECT * FROM kata";
$cek = mysqli_query($conn, $sql);
$kata = mysqli_fetch_all($cek, MYSQLI_ASSOC);

?>
