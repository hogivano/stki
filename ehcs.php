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

    if ($json == null){
      return false;
    }
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

  //turn 1
  public function checkLenghtStem($stem){
    return strlen($stem) > 3;
  }

  //turn 2
  public function checkStemSame($stem){
    $arr = explode("-", $stem);
    if (sizeof($arr) <= 1){
      return $stem;
    } else {
      if ($arr[0] == null || $arr[0] == ''){
        if ($this->checkStem($arr[1])){
          return ['root' => true, 'stem' => $arr[1]];
        } else {
          return ['root' => false, 'stem' => $arr[1]];
        }
      } else if ($arr[1] == null || $arr[1] == ''){
        if ($this->checkStem($arr[0])){
          return ['root' => true, 'stem' => $arr[0]];
        } else {
          return ['root' => false, 'stem' => $arr[0]];
        }
      }
    }
  }

  //turn 3
  public function checkRulePrecedence($stem){
    // return strlen($stem);
    if (substr($stem, 0, 2) == "be" && substr($stem, (strlen($stem)-3) , 3) == "lah"){
      // return 'oke';
      return $this->deleteDerivationBeC1C2($stem);
    } else if (substr($stem, 0, 2) == "be" && substr($stem, strlen($stem) - 2, 2) == "an"){
      return $this->deleteDerivationBeC1C2($stem);
    } else if (substr($stem, 0, 2) == "di" && substr($stem, strlen($stem) - 1, 1) == "i"){
      return $this->deleteDerivationDi($stem);
    } else if (substr($stem, 0, 2) == "pe" && substr($stem, strlen($stem) - 1, 1) == "i"){
      return $this->deleteDerivationPe($stem);
    } else if (substr($stem, 0, 2) == "te" && substr($stem, strlen($stem) - 1, 1) == "i"){
      return $this->deleteDerivationTeC1C2($stem);
    } else if (substr($stem, 0, 2) == "me" && substr($stem, strlen($stem) - 1, 1) == "i"){
      return $this->deleteDerivationMeV($stem);
    } else {
      return ['root' => false, 'stem' => $stem];
    }
  }

  //trun 4
  public function checkParticle($stem){
    if (substr($stem, strlen($stem) - 3, 3) == "lah"){
      return $this->deleteParticle($stem);
    } else if (substr($stem, strlen($stem) - 3, 3) == "tah"){
      return $this->deleteParticle($stem);
    } else if (substr($stem, strlen($stem) - 3, 3) == "kah"){
      return $this->deleteParticle($stem);
    } else if (substr($stem, strlen($stem) - 3, 3) == "pun"){
      return $this->deleteParticle($stem);
    } else {
      return ['root' => false, 'stem' => $stem];
    }
  }

  //turn 5
  public function checkProssesivePronoun($stem){
    if (substr($stem, strlen($stem) - 2, 2) == "ku"){
      return $this->deleteProccessivePronoun($stem, 2);
    } else if (substr($stem, strlen($stem) - 2, 2) == "pu"){
      return $this->deleteProccessivePronoun($stem, 2);
    } else if (substr($stem, strlen($stem) - 3, 3) == "nya"){
      return $this->deleteProccessivePronoun($stem, 3);
    } else {
      return ['root' => false, 'stem' => $stem];
    }
  }

  //turn 6
  public function checkNotCombineSurfix($stem){
    if (substr($stem, 0, 2) == "be" && substr($stem, (strlen($stem)-1) , 1) == "i"){
      // return 'oke';
      return ['root' => true, 'stem' => $stem];
    } else if (substr($stem, 0, 2) == "di" && substr($stem, strlen($stem) - 2, 2) == "an"){
      return ['root' => true, 'stem' => $stem];
    } else if (substr($stem, 0, 2) == "ke" && substr($stem, strlen($stem) - 1, 1) == "i"){
      return ['root' => true, 'stem' => $stem];
    } else if (substr($stem, 0, 2) == "ke" && substr($stem, strlen($stem) - 3, 3) == "kan"){
      return ['root' => true, 'stem' => $stem];
    } else if (substr($stem, 0, 2) == "me" && substr($stem, strlen($stem) - 2, 2) == "an"){
      return ['root' => true, 'stem' => $stem];
    } else if (substr($stem, 0, 2) == "se" && substr($stem, strlen($stem) - 1, 1) == "i"){
      return ['root' => true, 'stem' => $stem];
    } else if (substr($stem, 0, 2) == "se" && substr($stem, strlen($stem) - 3, 3) == "kan"){
      return ['root' => true, 'stem' => $stem];
    } else if (substr($stem, 0, 2) == "te" && substr($stem, strlen($stem) - 2, 2) == "an"){
      return ['root' => true, 'stem' => $stem];
    } else {
      return ['root' => false, 'stem' => $stem];
    }
  }

  //turn 7
  public function checkDerivationSurfix($stem){
    if (substr($stem, strlen($stem) - 1, 1) == "i"){
      return $this->deleteDerivationSurfix($stem, 1);
    } else if (substr($stem, strlen($stem) - 3, 3) == "kan"){
      return $this->deleteDerivationSurfix($stem, 3);
    } else if (substr($stem, strlen($stem) - 2, 2) == "an"){
      return $this->deleteDerivationSurfix($stem, 2);
    } else {
      return ['root' => false, 'stem' => $stem];
    }
  }

  //turn 8
  public function checkDerivationPrefix($stem){
    
  }

  public function deleteDerivationSurfix($stem, $length){
    $stem = substr($stem, 0, strlen($stem) - $length);
    if ($this->checkStem($stem)){
      return ['root' => true, 'stem' => $stem];
    } else {
      return ['root' => false, 'stem' => $stem];
    }
  }

  public function deleteProccessivePronoun($stem, $length){
    $stem = substr($stem, 0, strlen($stem) - $length);
    if ($this->checkStem($stem)){
      return ['root' => true, 'stem' => $stem];
    } else {
      return ['root' => false, 'stem' => $stem];
    }
  }

  public function deleteParticle($stem){
    $stem = substr($stem, 0, strlen($stem) - 3);
    if ($this->checkStem($stem)){
      return ['root' => true, 'stem' => $stem];
    } else {
      return ['root' => false, 'stem' => $stem];
    }
  }

  public function deleteDerivationMeV($stem){
    if (substr($stem, 2, 1) == "w" || substr($stem, 2, 1) == "y" || substr($stem, 2, 1) == "r" || substr($stem, 2, 1) == "l"){
      if (substr($stem, 3, 1) == "a" || substr($stem, 3, 1) == "i" || substr($stem, 3, 1) == "u" ||
        substr($stem, 3, 1) == "e" || substr($stem, 3, 1) == "o"){
          $stem = substr($stem, 2, strlen($stem));
          if ($this->checkStem($stem)){
            return ['root' => true,'stem' => $stem];
          } else {
            return ['root' => false, 'stem' => $stem];
          }
        } else {
          if ($this->checkStem($stem)){
            return ['root' => true,'stem' => $stem];
          } else {
            return ['root' => false, 'stem' => $stem];
          }
        }
    } else {
      if ($this->checkStem($stem)){
        return ['root' => true,'stem' => $stem];
      } else {
        return ['root' => false, 'stem' => $stem];
      }
    }
  }

  public function deleteDerivationTeC1C2($stem){
    if (substr($stem, 2, 1) != "r"){
      if (strlen($stem) >= 6){
        if (substr($stem, 5, 1) != "a" && substr($stem, 5, 1) != "i" && substr($stem, 5, 1) != "u" &&
          substr($stem, 5, 1) != "e" && substr($stem, 5, 1) != "o" && substr($stem, 3, 2) == "er"){
            $stem = substr($stem, 2, strlen($stem));
              // return ['root' => true,'stem' => $stem];
            if ($this->checkStem($stem)){
              return ['root' => true,'stem' => $stem];
            } else {
              return ['root' => false, 'stem' => $stem];
            }
          } else {
            if ($this->checkStem($stem)){
              return ['root' => true, 'stem' => $stem];
            } else {
              return ['root' => false, 'stem' => $stem];
            }
          }
      } else {
        if ($this->checkStem($stem)){
          return ['root'=> true, 'stem' => $stem];
        } else {
          return ['root' => false, 'stem' => $stem];
        }
      }
    } else {
      // return ['root' => true, 'stem' => 'fail'];
      if ($this->checkStem($stem)){
        return ['root' => true, 'stem' => $stem];
      } else {
        return ['root' => false, 'stem' => $stem];
      }
    }
  }

  public function deleteDerivationPe($stem){
    if (substr($stem, 2, 1) == "w" || substr($stem, 2, 1) == "y"){
      if (substr($stem, 3, 1) == "a" || substr($stem, 3, 1) == "i" || substr($stem, 3, 1) == "u" ||
        substr($stem, 3, 1) == "e" || substr($stem, 3, 1) == "o"){
          $stem = substr($stem, 2, strlen($stem));
          if ($this->checkStem($stem)){
            return ['root' => true,'stem' => $stem];
          } else {
            return ['root' => false, 'stem' => $stem];
          }
        } else {
          if ($this->checkStem($stem)){
            return ['root' => true,'stem' => $stem];
          } else {
            return ['root' => false, 'stem' => $stem];
          }
        }
    } else {
      if ($this->checkStem($stem)){
        return ['root' => true,'stem' => $stem];
      } else {
        return ['root' => false, 'stem' => $stem];
      }
    }
  }

  public function deleteDerivationDi($stem){
    $stem = substr($stem, 2, strlen($stem));
    if ($this->checkStem($stem)){
      return ['root' => true, 'stem' => $stem];
    } else {
      return ['root' => false, 'stem' => $stem];
    }
  }

  public function deleteDerivationBeC1C2($stem){
    if (substr($stem, 2, 1) != "r" && substr($stem, 2, 1) != "l"){
      if (strlen($stem) >= 6){
        if (substr($stem, 5, 1) != "a" && substr($stem, 5, 1) != "i" && substr($stem, 5, 1) != "u" &&
          substr($stem, 5, 1) != "e" && substr($stem, 5, 1) != "o" && substr($stem, 3, 2) == "er"){
            $stem = substr($stem, 2, strlen($stem));
              // return ['root' => true,'stem' => $stem];
            if ($this->checkStem($stem)){
              return ['root' => true,'stem' => $stem];
            } else {
              return ['root' => false, 'stem' => $stem];
            }
          } else {
            if ($this->checkStem($stem)){
              return ['root' => true, 'stem' => $stem];
            } else {
              return ['root' => false, 'stem' => $stem];
            }
          }
      } else {
        if ($this->checkStem($stem)){
          return ['root'=> true, 'stem' => $stem];
        } else {
          return ['root' => false, 'stem' => $stem];
        }
      }
    } else {
      // return ['root' => true, 'stem' => 'fail'];
      if ($this->checkStem($stem)){
        return ['root' => true, 'stem' => $stem];
      } else {
        return ['root' => false, 'stem' => $stem];
      }
    }
  }

  public function deleteDerivation($stem, $length){

  }

  public function proccess($stem){
    if ($this->checkStem($stem)){
      return ['root' => true, 'stem' => $stem];
    } else {
      //langkah 1
      if ($this->checkLenghtStem($stem)){
        //langkah 2
        $result = $this->checkStemSame($stem);
        if ($result['root']){
          return $result;
        } else {
          $stem = $result['stem'];
          //langkah 3
          $result = $this->checkRulePrecedence($stem);
          if ($result['root']){
            return $result;
          } else {
            $stem = $result['stem'];

            //langkah 4
            $result = $this->checkParticle($stem);
          }
        }
      } else {
        return ['root' => false, 'stem' => $stem];
      }
    }
  }
}
?>
