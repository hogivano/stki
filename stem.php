<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    include './Controller/ReadController.php';
    foreach ($kata as $i) {
      # code...
      echo $i['kata'];
      echo "\n";
    }
    ?>
  </body>
</html>
