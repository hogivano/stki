<?php
include './ehcs.php';
$ehcs = new Ehcs();
if ($ehcs->checkStem('nyanyi')){
  echo 'true';
} else {
  echo 'false';
}

echo $ehcs->checkParticle("blah")['stem'];
?>
