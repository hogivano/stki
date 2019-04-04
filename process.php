<?php
include './ehcs.php';
$ehcs = new Ehcs();
if ($ehcs->checkStem('makan')){
  echo 'true';
} else {
  echo 'false';
}
// $this->chcekStem('as');
?>
