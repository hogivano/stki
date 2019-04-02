<?php
    include '../db_connection.php';
    $artikel = new Document($conn);

    class Document {
        public function __construct($conn){
            $this->conn = $conn;
        }

        public function create($arr){
            $title = $arr['title'];
            $deskripsi = $arr['deskripsi'];
            $sql = "INSERT INTO artikel (title, deskripsi) VALUES ('$title', '$deskripsi')";
            return mysqli_query($this->conn, $sql);
        }

        public function update($arr){
            $id = $arr['id'];
            $deskripsi = $arr['deskripsi'];
            $title = $arr['title'];
            $sql = "UPDATE artikel SET title = '$title', deskripsi = '$deskripsi' WHERE id = '$id'";
            return mysqli_query($this->conn, $sql);
        }

        public function read(){
            $sql = "SELECT * FROM artikel";
            $artikel = $this->conn->query($sql);
            return $artikel;
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
