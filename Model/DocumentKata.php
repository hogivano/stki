<?php
    include '../db_connection.php';

    class DocumentKata {
        public function __construct($conn){
            $this->conn = $conn;
        }

        public function create($arr){
            $title = $arr['id_kata'];
            $deskripsi = $arr['deskripsi'];
            $sql = "INSERT INTO artikel (title, deskripsi) VALUES ('$title', '$deskripsi')";
            return mysqli_query($this->conn, $sql);
        }

        public function updateFrekuensi($arr){
          
        }

        public function read(){
            $sql = "SELECT * FROM artikel";
            $documentKata = $this->conn->query($sql);
            return $artikel;
        }

        public function delete($id){
            $sql = "DELETE FROM artikel WHERE id = '$id'";
            return mysqli_query($this->conn, $sql);
        }
    }
?>
