<?php
    include '../db_connection.php';


    $document = new Document($conn);

    class Document {
        public function __construct($conn){
            $this->conn = $conn;
        }

        public function create($doc){
          $result = "INSERT INTO document (document) VALUES ('$doc')";
          if (mysqli_query($this->conn, $result)){
            $id_doc = mysqli_insert_id($this->conn);

              // $arr1= strtolower($document);
              // $item=[" ",".","-",",","!","@","#","$","%","^","&","*","(",")","[","]","{","}","<",">"];
              // $arr2= explode(" ",$arr1);
              // str_replace($item,"",$arr2);



              //check DB
              // $kata = new Kata($this->conn);
              // $kata->checkDB(['id' => 20, 'arrya' => $att]);
              // return mysqli_query($this->conn, $sql);
          } else {
            echo 'gagal memasukan database';
          }
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
