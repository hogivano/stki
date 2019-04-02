<?php
    include '../db_connection.php';
    include './Kata.php';

    $document = new Document($conn);

    class Document {
        public function __construct($conn){
            $this->conn = $conn;
        }

        public function create($arr){
            $title = $arr['title'];
            $deskripsi = $arr['deskripsi'];
            $sql = "INSERT INTO artikel (title, deskripsi) VALUES ('$title', '$deskripsi')";

            //check DB
            $kata = new Kata($this->conn);
            $kata->checkDB(['id' => 20, 'arrya' => $att]);
            return mysqli_query($this->conn, $sql);
        }

        public function read(){
            $sql = "SELECT * FROM artikel";
            $artikel = $this->conn->query($sql);
            return $artikel;
        }

        public function delete($id){
            $sql = "DELETE FROM artikel WHERE id = '$id'";
            return mysqli_query($this->conn, $sql);
        }
    }
?>
