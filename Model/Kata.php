<?php
    include '../db_connection.php';
    include './DocumentKata.php';

    $artikel = new Kata($conn);

    class Kata {
        public function __construct($conn){
            $this->conn = $conn;
        }

        // [
        //   "id",
        //   "array"
        // ]
        public function checkDB($rr){
          $arr["array"] = [""];
          $id_document = $arr["id"];
          $array = $arr["array"];


          $documentKata = new DocumentKata($this->conn);

          $createFrekuensi = $documentKata->create($arr);
          $createDocumentKata = $documentKata->updateFrekuensi($arr);
        }

        public function create($arr){
            $title = $arr['title'];
            $deskripsi = $arr['deskripsi'];
            $sql = "INSERT INTO artikel (title, deskripsi) VALUES ('$title', '$deskripsi')";
            return mysqli_query($this->conn, $sql);
        }

        public function createFrekuensi($arr){

        }

        public function read(){

        }

        public function edit($id){
            $sql = "SELECT * FROM artikel WHERE id = '$id'";
            $artikel = $this->conn->query($sql);
            return $artikel;
        }

        public function delete($id){
            $sql = "DELETE FROM artikel WHERE id = '$id'";
            return mysqli_query($this->conn, $sql);
        }
    }
?>
