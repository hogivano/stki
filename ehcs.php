<?php
class Ehcs {
  public function checkStem($stem){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://kateglo.com/api.php?format=json&phrase=" . $stem);

    // return the transfer as a string
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    $output = curl_exec($ch);
    $output = json_decode(json_encode($output));
    curl_close($ch);
    $json = json_decode($output);

    if ($json->kateglo == null){
      return false;
    } else {
      if (sizeof($json->kateglo->root) == 0){
        return true;
      } else {
        return false;
      }
    }
  }
}
?>
