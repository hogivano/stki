<?php
include '../Model/Document.php';

if (isset($_POST['dokumen'])){
  //inisialissi model document ke dalam controller
  $create = new CreateController($document);
  $create->createDocument($_POST['dokumen']);
} else {
  echo 'dokumen belum diisi';
}

class CreateController {
  public function __construct($func){
      $this->func = $func;
  }

  public function createDocument($post){
    //Meamangi; model document untuk ditambahkan value post
    $this->func->create($post);
  }

  public function createKata(){

  }
}

?>
