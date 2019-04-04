<?php
    include '../db_connection.php';
    

    $document = new Document($conn);

    class Document {
        public function __construct($conn){
            $this->conn = $conn;
        }

        public function create($document){   
            echo $document;
         


            $arr1= strtolower($document);
            $item=[" ",".","-",",","!","@","#","$","%","^","&","*","(",")","[","]","{","}","<",">"];
            print_r($arr2= explode(" ",$arr1));
            print_r(str_replace($item,"",$arr2));

            $result = "INSERT INTO stki(document) VALUES('$document')";
            return mysqli_query($this->conn, $result);

            
            
            //check DB
            // $kata = new Kata($this->conn);
            // $kata->checkDB(['id' => 20, 'arrya' => $att]);
            // return mysqli_query($this->conn, $sql);
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
