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

          $arr = array(3,7,1,5,3,8,3); //misal array kata2 dokumen
            $db = $query = "SELECT * FROM kata WHERE";
            $conds = array();
            foreach ($words as $val) {
                $conds[] = "kata.keywords LIKE '%".$val."%'";
            }
            $query .= implode(' OR ', $conds);			//misal kata2 yang sudah ada di DB
            $frekuensi =0;  			//misal frekuensi kata yg sama muncul berapa kali
            $sama = 0;					//indikator waktu pengecekan (0=sama, 1=beda)
            $temp = 0;					//buat simpen urutan array keberapa kata di $arr yang gaada di DB
        for($i=0; $i< count($arr); $i++){		
	        for($j=0; $j< count($db); $j++){
		
		    if($arr[$i]==$db[$j]){			//membandingkan isi di array dokumen dan yang ada di DB
			        //kalau sama, tarik id dokumen, sama id kata
			        //echo $j;					//disini $j ini index dari array kata sama, kl penerapan yg asli yg diambil id dari kata yg sama trus dimasukin tabel document_kata
			$frekuensi += 1;			//parameter yang dipake i buat index dokumen, j buat indeks kata
			break;
		    }
		    else{
			    $sama = 1;				
			    $temp = $i;					//buat menyimpan index dr array dokumen yang kata2nya tidak ada di DB
		    }
	        }
	        if ($sama==1){
		        $db[]= $arr[$temp];				//aslinya ini fungsi nambah kata di tabel kata
		        $temp = 0;						
		        $sama = 0;						//reset
	        }
        }
        }

        public function create($arr){
            $kata = $arr['kata'];
            $sql = "INSERT INTO kata (kata) VALUES ('$kata')";
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
