<?php
include '../Model/Document.php';

if (isset($_POST['id'])){
  //inisialissi model document ke dalam controller
  $document->delete($_POST['id']);
} else {
  echo 'dokumen belum diisi';
}

?>
