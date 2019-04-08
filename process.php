<?php
include './ehcs.php';
$ehcs = new Ehcs();
// if ($ehcs->checkStem('nyanyi')){
//   echo 'true||';
// } else {
//   echo 'false';
// }

$stemming = $ehcs->deleteDerivationPeC1erC2("mengutuk");
echo $stemming['stem'];
echo "\n";
if ($stemming['root']) {
	echo "true";
} else{
	echo "false";
}
?>
