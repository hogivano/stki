<?php
    // include '../db_connection.php';
    // include './DocumentKata.php';

    $kata = new Kata();

    class Kata {
      protected $conn;
        public function __construct(){
          $servername = "localhost";
          $username = "root";
          $password = "op";
          $dbname = "stki";

          $this->conn = mysqli_connect($servername, $username, $password);
          $find_db = mysqli_select_db($conn, $dbname);

          if($conn->connect_error){
            die("Connection failed: ".$conn->connect_error);
          } else {
            echo "DB Connected";
          }
            // $this->conn = $conn;
        }

        public function read(){
          $sql = "SELECT id FROM kata";
          $cek = mysqli_query($this->conn, $sql);
          if ($cek){
            $cek = mysqli_fetch_all($cek,MYSQLI_ASSOC);
            return mysqli_free_result($cek);
          } else {
            return $this->conn;
          }
        }
    }
?>
