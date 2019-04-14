<?php
    include '../db_connection.php';
    include './Kata.php';

    $document = new Document($conn, $kata);

    class Document {
        public function __construct($conn, $kata){
            $this->conn = $conn;
            $this->kata = $kata;
        }


        public function create($doc){
          $result = "INSERT INTO document (document) VALUES ('$doc')";
          if (mysqli_query($this->conn, $result)){
            $id_doc = mysqli_insert_id($this->conn);
              $arr1= strtolower($doc);
              $item= ['','.','-',',','!','@','#','$','%','^','&','*','(',')','[',']','{','}','<','>','“','"','”',':',';', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];

              $remove = array("\n", "\r\n", "\r");
              $arr1 = (str_replace($remove, ' ', $arr1));

              $arr2= explode(" ",$arr1);
              $arr2 = str_replace($item,"",$arr2);
              $arr = ["id" => $id_doc, 'array' => $arr2];

              $this->checkDB($arr);
          } else {
            echo 'gagal memasukan database';
          }
        }

        public function checkDB($arr){
          foreach ($arr['array'] as $i) {
            if ($i != ' ' && $i != ''){
              $cek = $this->readKata($i);
              if ($cek){
                if (mysqli_num_rows($cek) > 0){
                  $id_doc = $arr['id'];
                  $row = mysqli_fetch_assoc($cek) or die(mysql_error());
                  $id_kata = $row['id'];

                  $val = ['id_kata' => $id_kata, 'id_doc' => $id_doc];
                  $this->updateFrekuensi($val);
                  // echo $row['id'];
                } else {
                  $id_doc = $arr['id'];
                  $this->createKata($i);
                  $id_kata = mysqli_insert_id($this->conn);

                  $val = ['id_kata' => $id_kata, 'id_doc' => $id_doc];
                  $this->createDocumentKata($val);
                }
              }
            }
          }
          $this->conn->close();
          header("Location: /list-document.php");
          die();
        }

        public function createDocumentKata($arr){
          $id_kata = $arr['id_kata'];
          $id_doc = $arr['id_doc'];
          $sql = "INSERT INTO document_kata (id_kata, id_document, frekuensi) VALUES ('$id_kata', '$id_doc', 1)";
          return mysqli_query($this->conn, $sql);
        }

        public function createKata($val){
          $sql = "INSERT INTO kata (kata) VALUES ('$val')";
          return mysqli_query($this->conn, $sql);
        }

        public function updateFrekuensi($arr){
          $id_kata = $arr['id_kata'];
          $id_doc = $arr['id_doc'];
          $sql = "UPDATE document_kata SET frekuensi = frekuensi + 1 WHERE id_kata='$id_kata' AND id_document='$id_doc'";
          $cek = mysqli_query($this->conn, $sql);

          if ($cek){
            if (mysqli_num_rows($cek) == 0){
              $this->createDocumentKata($arr);
            }
          }
        }

        public function readKata($val){
          $sql = "SELECT * FROM kata WHERE (kata='$val')";
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
