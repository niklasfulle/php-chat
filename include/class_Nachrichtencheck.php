<?php

include_once 'class_DbConfig.php';
class class_Nachrichtencheck
{
  public $db;
  /*
  *
  */
  function __construct()
  {
    $this->db = new Class_DbConfig();
  }

  function Nachrichtenbeforecheck($Nachricht, $von, $user)
  {
      if ($von == "normal") {
        preg_match_all('#\bhttps?://[^,\s()<>]+(?:\([\w\d]+\)|([^,[:punct:]\s]|/))#', $Nachricht, $match);

        $link = $match[0][0];
        if ($link) {

          $Nachrichttrue = $link;

          $true1234 = $this->LetzeNachrichtcheck($link, $von);
          if ($true1234) {
            $return = array();
            array_push($return, array($Nachrichttrue, "Link"));

            return $return;
          }

        }else {

          if ($Nachricht != "") {
            $true1234 = $this->LetzeNachrichtcheck($Nachricht, $von);
            if ($true1234) {
              $true123 = $this->zulangeZeichenkette($Nachricht);
              if (substr($Nachricht,0,1) == ' ') {

              }elseif ($true123 == "2"){

              }else {
                $filter = $this->Schimpfwoerter();
                $test = "[/found/]";
                $found =  str_replace($filter, $test, $Nachricht);
                $found1 = stristr($found, $test);

                if($found1) {
                  $SQL = "SELECT `Warnungen` FROM benutzer WHERE `BenutzerName` = '$user'";

                  $result = $this->db->db->query($SQL);

                  $row = $result->fetch_row();

                  if ($row[0] == "0") {
                    $SQL1 = "UPDATE `benutzer` SET `Warnungen` = '1' WHERE `benutzer`.`BenutzerName` = '$user';";
                  }elseif ($row[0] == "1") {
                    $SQL1 = "UPDATE `benutzer` SET `Warnungen` = '2' WHERE `benutzer`.`BenutzerName` = '$user';";
                  }elseif ($row[0] == "2") {
                    $SQL1 = "UPDATE `benutzer` SET `Warnungen` = '3' WHERE `benutzer`.`BenutzerName` = '$user';";
                  }elseif ($row[0] == "3") {
                    $SQL1 = "UPDATE `benutzer` SET `Warnungen` = '4' WHERE `benutzer`.`BenutzerName` = '$user';";
                  }elseif ($row[0] == "4") {
                    $SQL1 = "UPDATE `benutzer` SET `Warnungen` = '5' WHERE `benutzer`.`BenutzerName` = '$user';";
                  }

                  $result = $this->db->db->query($SQL1);

                  if ($result) {
                    $SQL2 = "SELECT `Warnungen` FROM benutzer WHERE `BenutzerName` = '$user';";

                    $result = $this->db->db->query($SQL2);

                    $row = $result->fetch_row();

                    if ($row[0] == "5") {
                      $SQL3 = "UPDATE `benutzer` SET `BenutzerStatus` = '0' WHERE `benutzer`.`BenutzerName` = '$user';";

                      $result = $this->db->db->query($SQL3);

                      $return = array();
                      array_push($return, array($Nachricht, "Text"));

                      return $return;
                    }else {
                      $return = array();
                      array_push($return, array($Nachricht, "Text"));

                      return $return;
                    }

                  }


                }else {
                  $return = array();
                  array_push($return, array($Nachricht, "Text"));

                  return $return;
                }

              }
            }
          }
        }

      }elseif ($von == "privat") {

        preg_match_all('#\bhttps?://[^,\s()<>]+(?:\([\w\d]+\)|([^,[:punct:]\s]|/))#', $Nachricht, $match);


        $link = $match[0][0];
        if ($link) {

        }else {

          if ($Nachricht != "") {

            $true1234 = $this->LetzeNachrichtcheck($Nachricht, $von);
            if ($true1234) {
              $true123 = $this->zulangeZeichenkette($Nachricht);
              if (substr($Nachricht,0,1) == ' ') {

              }elseif ($true123 == "2"){

              }else {
                $filter = $this->Schimpfwoerter();
                $test = "[/found/]";
                $found =  str_replace($filter, $test, $Nachricht);
                $found1 = stristr($found, $test);

                if($found1) {
                  $SQL = "SELECT `Warnungen` FROM benutzer WHERE `BenutzerName` = '$user'";

                  $result = $this->db->db->query($SQL);

                  $row = $result->fetch_row();

                  if ($row[0] == "0") {
                    $SQL1 = "UPDATE `benutzer` SET `Warnungen` = '1' WHERE `benutzer`.`BenutzerName` = '$user';";
                  }elseif ($row[0] == "1") {
                    $SQL1 = "UPDATE `benutzer` SET `Warnungen` = '2' WHERE `benutzer`.`BenutzerName` = '$user';";
                  }elseif ($row[0] == "2") {
                    $SQL1 = "UPDATE `benutzer` SET `Warnungen` = '3' WHERE `benutzer`.`BenutzerName` = '$user';";
                  }elseif ($row[0] == "3") {
                    $SQL1 = "UPDATE `benutzer` SET `Warnungen` = '4' WHERE `benutzer`.`BenutzerName` = '$user';";
                  }elseif ($row[0] == "4") {
                    $SQL1 = "UPDATE `benutzer` SET `Warnungen` = '5' WHERE `benutzer`.`BenutzerName` = '$user';";
                  }

                  $result = $this->db->db->query($SQL1);

                  if ($result) {
                    $SQL2 = "SELECT `Warnungen` FROM benutzer WHERE `BenutzerName` = '$user';";

                    $result = $this->db->db->query($SQL2);

                    $row = $result->fetch_row();

                    if ($row[0] == "5") {
                      $SQL3 = "UPDATE `benutzer` SET `BenutzerStatus` = '0' WHERE `benutzer`.`BenutzerName` = '$user';";

                      $result = $this->db->db->query($SQL3);

                      $return = array();
                      array_push($return, array($Nachricht, "Text"));

                      return $return;
                    }else {
                      $return = array();
                      array_push($return, array($Nachricht, "Text"));

                      return $return;
                    }

                  }


                }else {
                  $return = array();
                  array_push($return, array($Nachricht, "Text"));

                  return $return;
                }

              }
            }
          }
        }
      }
  }

  function Nachrichtenaftercheck($Nachricht, $typ, $von){
      if ($_SESSION["BenutzerKlasse"] == "1") /*none-Admin*/ {
        if ($typ == "Text") {
          if ($von == "normal") {
            $filter = $this->Schimpfwoerter();
            $ersetzen = "********";
            $Nachrichttrue = str_replace($filter, $ersetzen, $Nachricht);
            $array = array();
            array_push($array, array($Nachrichttrue, $typ, $von));
          }else {
            $filter = $this->Schimpfwoerter();
            $ersetzen = "********";
            $Nachrichttrue = str_replace($filter, $ersetzen, $Nachricht);
            $array = array();
            array_push($array, array($Nachrichttrue, $typ, $von));
          }
        }else {
          $array = array();
          array_push($array, array($Nachricht, $typ, $von));
        }

      }elseif ($_SESSION["BenutzerKlasse"] == "2") /*Admin*/ {
        if ($typ == "Text") {
          if ($von == "normal") {
            $filter = $this->Schimpfwoerter();
            $filter2 = $this->Replaceer();

            $Nachrichttrue = str_replace($filter, $filter2, $Nachricht);
            $array = array();
            array_push($array, array($Nachrichttrue, $typ, $von));
          }else {
            $filter = $this->Schimpfwoerter();
            $ersetzen = "********";
            $Nachrichttrue = str_replace($filter, $ersetzen, $Nachricht);
            $array = array();
            array_push($array, array($Nachrichttrue, $typ, $von));
          }
        }else {
          $array = array();
          array_push($array, array($Nachricht, $typ, $von));
        }
      }
    return $array;
  }

  function Linkcheck($Nachricht, $von)
  {
      if ($von == "normal") {
        preg_match_all('#\bhttps?://[^,\s()<>]+(?:\([\w\d]+\)|([^,[:punct:]\s]|/))#', $Nachricht, $match);

          $match1 = $match[0];

          $Nachrichttrue = str_replace($match1, $match1, $Nachricht);

        return $Nachrichttrue;
      }elseif ($von == "privat") {
        preg_match_all('#\bhttps?://[^,\s()<>]+(?:\([\w\d]+\)|([^,[:punct:]\s]|/))#', $Nachricht, $match);

        $macht1 = $match[0];

        $Nachrichttrue = str_replace($macht1, "deleted", $Nachricht);
        return $Nachrichttrue;
      }

  }

  function SmileCheck($Nachricht, $von)
  {

    $smile = $this->Smile();
    $smileBild = $this->SmileBild();
    $smileBild1 = $this->SmileBild1();
    if ($von == "normal") {
      if ($smile && $smileBild) {
        $Nachrichttrue = str_replace($smile, $smileBild, $Nachricht);
        return $Nachrichttrue;
      }else {
        $Nachrichttrue = $Nachricht;
        return $Nachrichttrue;
      }
    }else {
      if ($smile && $smileBild) {
        $Nachrichttrue = str_replace($smile, $smileBild1, $Nachricht);
        return $Nachrichttrue;
      }else {
        $Nachrichttrue = $Nachricht;
        return $Nachrichttrue;
      }
    }

  }

  function Schimpfwoerter()
  {
    $SQL = "SELECT FilterWort FROM filter WHERE Status = 1";
    $filter1 = $this->db->db->query($SQL);
    $filter = array();
    while ($row = $filter1->fetch_row()) {
      $filter[] = $row["0"];
    }
    return $filter;
  }

  function Replaceer()
  {
    $SQL = "SELECT Replaceer2 FROM filter WHERE Status = 1";
    $filter1 = $this->db->db->query($SQL);
    $replace = array();
    while ($row = $filter1->fetch_row()) {
      $replace[] = $row["0"];
    }
    return $replace;
  }

  function Smile()
  {
    $SQL = "SELECT SmileCode FROM Smile WHERE Status = 1";
    $smile = $this->db->db->query($SQL);
    $smile1 = array();
    while ($row = $smile->fetch_row()) {
      $smile1[] = $row["0"];
    }
    return $smile1;
  }

  function SmileBild()
  {
    $SQL = "SELECT SmileBild FROM Smile WHERE Status = 1";
    $smile2 = $this->db->db->query($SQL);
    $smileBild = array();
    while ($row = $smile2->fetch_row()) {
      $smileBild[] = $row["0"];
    }
    return $smileBild;
  }

  function SmileBild1()
  {
    $SQL = "SELECT SmileBild1 FROM Smile WHERE Status = 1";
    $smile2 = $this->db->db->query($SQL);
    $smileBild = array();
    while ($row = $smile2->fetch_row()) {
      $smileBild[] = $row["0"];
    }
    return $smileBild;
  }

  function zulangeZeichenkette($Nachricht)
  {
      $lenght = strlen($Nachricht);
      if ($lenght > 10) {
        $nachchecken = ' ';
        $check1 = stristr($Nachricht, $nachchecken, true);
        if ($check1) {
          $pos = strpos($Nachricht, ' ', 1);
          if ($pos < 1) {
            return "2";
          } else {
            return "1";
          }
        }else {
          return "2";
        }
      }else {
        return "1";
      }
  }

  function LetzeNachrichtcheck($Nachricht, $von)
  {
    if ($von == "normal") {
      $SQL = "SELECT `Nachricht` FROM `nachricht` WHERE Time > DATE_SUB( CURRENT_TIME(), INTERVAL 1 MINUTE) ORDER BY Time DESC LIMIT 1";
      $LetzeNachrichtcheck = $this->db->db->query($SQL);
      $row = $LetzeNachrichtcheck->fetch_row();
      if ($row["0"] != $Nachricht) {
        return true;
      }else {
        return false;
      }
    }elseif ($von == "privat") {
      $SQL = "SELECT `Nachricht` FROM `privatnachricht` WHERE Time > DATE_SUB( CURRENT_TIME(), INTERVAL 1 MINUTE) ORDER BY Time DESC LIMIT 1";
      $LetzeNachrichtcheck = $this->db->db->query($SQL);
      $row = $LetzeNachrichtcheck->fetch_row();
      if ($row["0"] != $Nachricht) {
        return true;
      }else {
        return false;
      }
    }

  }

  function Filterhinzufuegen($Filter, $Status)
  {
    $SQL = "SELECT FilterWort FROM filter WHERE FilterWort = '$Filter';";
    $filter1 = $this->db->db->query($SQL);

    if ($filter1->num_rows >= "3") {
      return 3;
    }else {
      $Filter1 = $Filter;
      $Filter2 = strtoupper($Filter);
      $Filter3 = strtolower($Filter);
      $SQL1 = "INSERT INTO `filter` (`FilterWort`, `Replaceer2`, `Status`, `Klasse`) VALUES ('$Filter1', '</a><div class=dropdown6 ><a id=chatNachricht1>********</a><div class=dropdown6-content><p id=Admin1>$Filter1</p></div></div><a id=chatNachricht>', '$Status', '1');";
      $SQL2 = "INSERT INTO `filter` (`FilterWort`, `Replaceer2`, `Status`, `Klasse`) VALUES ('$Filter2', '</a><div class=dropdown6 ><a id=chatNachricht1>********</a><div class=dropdown6-content><p id=Admin1>$Filter2</p></div></div><a id=chatNachricht>', '$Status', '2');";
      $SQL3 = "INSERT INTO `filter` (`FilterWort`, `Replaceer2`, `Status`, `Klasse`) VALUES ('$Filter3', '</a><div class=dropdown6 ><a id=chatNachricht1>********</a><div class=dropdown6-content><p id=Admin1>$Filter3</p></div></div><a id=chatNachricht>', '$Status', '2');";
      $a1 = $this->db->db->query($SQL1);
      $a2 = $this->db->db->query($SQL2);
      $a3 = $this->db->db->query($SQL3);

      if ($a1 && $a2 && $a3) {
        return 1;
      }else {
        return 2;
      }
    }
  }


  function SelectFilterMain()
  {
    $SQL = "SELECT FilterWort FROM filter WHERE Klasse = 1 ORDER BY Nr";
    $result = $this->db->db->query($SQL);

    if ($result) {
      return $result;
    }else {
      return -1;
    }
  }

  function SelectSmileMain()
  {
    $SQL = "SELECT `SmileCode` FROM `Smile` ORDER BY Nr";
    $result = $this->db->db->query($SQL);

    if ($result) {
      return $result;
    }else {
      return -1;
    }
  }

  function SelectFilteralles()
  {
    $SQL = "SELECT `Nr`, `FilterWort`, `Status` FROM filter ORDER BY Nr";
    $result = $this->db->db->query($SQL);

    if ($result) {
      return $result;
    }else {
      return -1;
    }

  }

  function SelectSmilealles()
  {
    $SQL = "SELECT `Nr`, `SmileCode`, `SmileBild`, `Status` FROM smile ORDER BY Nr";
    $result = $this->db->db->query($SQL);

    if ($result) {
      return $result;
    }else {
      return -1;
    }

  }

  function Filterdeaktivieren($Filter)
  {
      $Filter1 = $Filter;
      $Filter2 = strtoupper($Filter);
      $Filter3 = strtolower($Filter);

      $SQL1 = "UPDATE `filter` SET `Status` = '2' WHERE `filter`.`FilterWort` = '$Filter1';";
      $SQL2 = "UPDATE `filter` SET `Status` = '2' WHERE `filter`.`FilterWort` = '$Filter2';";
      $SQL3 = "UPDATE `filter` SET `Status` = '2' WHERE `filter`.`FilterWort` = '$Filter3';";

      $result1 = $this->db->db->query($SQL1);
      $result2 = $this->db->db->query($SQL2);
      $result3 = $this->db->db->query($SQL3);

      if ($result1 && $result2 && $result3) {
        return 1;
      }else {
        return 2;
      }


  }

  function Filteraktivieren($Filter)
  {
      $Filter1 = $Filter;
      $Filter2 = strtoupper($Filter);
      $Filter3 = strtolower($Filter);

      $SQL1 = "UPDATE `filter` SET `Status` = '1' WHERE `filter`.`FilterWort` = '$Filter1';";
      $SQL2 = "UPDATE `filter` SET `Status` = '1' WHERE `filter`.`FilterWort` = '$Filter2';";
      $SQL3 = "UPDATE `filter` SET `Status` = '1' WHERE `filter`.`FilterWort` = '$Filter3';";

      $result1 = $this->db->db->query($SQL1);
      $result2 = $this->db->db->query($SQL2);
      $result3 = $this->db->db->query($SQL3);

      if ($result1 && $result2 && $result3) {
        return 1;
      }else {
        return 2;
      }
  }

  function Smiledeaktivieren($Smile)
  {

      $SQL = "UPDATE `smile` SET `Status` = '2' WHERE `smile`.`SmileCode` = '$Smile';";

      $result = $this->db->db->query($SQL);

      if ($result) {
        return 1;
      }else {
        return 2;
      }


  }

  function Smileaktivieren($Smile)
  {
    $SQL = "UPDATE `smile` SET `Status` = '1' WHERE `smile`.`SmileCode` = '$Smile';";

    $result = $this->db->db->query($SQL);

    if ($result) {
      return 1;
    }else {
      return 2;
    }
  }

  function Smilehinzufügen($SmileCode, $SmileBild, $SmileBild1)
  {
    $SQL = "INSERT INTO `smile` (`Nr`, `SmileCode`, `SmileBild`, `SmileBild1`, `Status`) VALUES (NULL, '$SmileCode', '$SmileBild', '$SmileBild1', '1');";

    $result = $this->db->db->query($SQL);

    if ($result) {
      return 1;
    }else {
      return 2;
    }
  }

  function Filterlöschen($Filter)
  {
      $Filter1 = $Filter;
      $Filter2 = strtoupper($Filter);
      $Filter3 = strtolower($Filter);

      $SQL1 = "DELETE FROM `filter` WHERE `filter`.`FilterWort` = '$Filter1';";
      $SQL2 = "DELETE FROM `filter` WHERE `filter`.`FilterWort` = '$Filter2';";
      $SQL3 = "DELETE FROM `filter` WHERE `filter`.`FilterWort` = '$Filter3';";

      $result1 = $this->db->db->query($SQL1);
      $result2 = $this->db->db->query($SQL2);
      $result3 = $this->db->db->query($SQL3);

      if ($result1 && $result2 && $result3) {
        return 1;
      }else {
        return 2;
      }
  }

  function Smilelöschen($Filter)
  {
      $SQL = "DELETE FROM `smile` WHERE `smile`.`SmileCode` = '$Filter';";

      $result = $this->db->db->query($SQL);

      if ($result) {
        return 1;
      }else {
        return 2;
      }
  }

  function SelectChatStatistiken()
  {
    $SQL1 = "SELECT COUNT(*) FROM `nachricht`";
    $SQL2 = "SELECT COUNT(*) FROM `privatnachricht`";
    $SQL3 = "SELECT COUNT(*) FROM `nachricht` WHERE `Typ` = 'Text'";
    $SQL4 = "SELECT COUNT(*) FROM `nachricht` WHERE `Typ` = 'Link'";
    $SQL5 = "SELECT COUNT(*) FROM `nachricht` WHERE `Typ` = 'Bild'";
    $SQL6 = "SELECT COUNT(*) FROM `nachricht` WHERE `Typ` = 'Datei'";
    $SQL7 = "SELECT COUNT(*) FROM `privatnachricht` WHERE `Typ` = 'Text'";
    $SQL8 = "SELECT COUNT(*) FROM `privatnachricht` WHERE `Typ` = 'Link'";
    $SQL9 = "SELECT COUNT(*) FROM `privatnachricht` WHERE `Typ` = 'Bild'";
    $SQL10 = "SELECT COUNT(*) FROM `privatnachricht` WHERE `Typ` = 'Datei'";

    $result1 = $this->db->db->query($SQL1);
    $result2 = $this->db->db->query($SQL2);
    $result3 = $this->db->db->query($SQL3);
    $result4 = $this->db->db->query($SQL4);
    $result5 = $this->db->db->query($SQL5);
    $result6 = $this->db->db->query($SQL6);
    $result7 = $this->db->db->query($SQL7);
    $result8 = $this->db->db->query($SQL8);
    $result9 = $this->db->db->query($SQL9);
    $result10 = $this->db->db->query($SQL10);

    if ($result1) {
      $row1 = $result1->fetch_row();
    }
    if ($result2) {
      $row2 = $result2->fetch_row();
    }
    if ($result3) {
      $row3 = $result3->fetch_row();
    }
    if ($result4) {
      $row4 = $result4->fetch_row();
    }
    if ($result5) {
      $row5 = $result5->fetch_row();
    }
    if ($result6) {
      $row6 = $result6->fetch_row();
    }
    if ($result7) {
      $row7 = $result7->fetch_row();
    }
    if ($result8) {
      $row8 = $result8->fetch_row();
    }
    if ($result9) {
      $row9 = $result9->fetch_row();
    }
    if ($result10) {
      $row10 = $result10->fetch_row();
    }

    $return = array();

    array_push($return, array($row1[0], $row2[0], $row3[0], $row4[0], $row5[0], $row6[0], $row7[0], $row8[0], $row9[0], $row10[0]));

    return $return;
  }

  function Chatlöschen()
  {
    $SQL = "TRUNCATE TABLE `nachricht`";
    $SQL1 = "ALTER TABLE tablename AUTO_INCREMENT = 1";

    $result = $this->db->db->query($SQL);
    $result1 = $this->db->db->query($SQL1);

    if ($result) {
      return 1;
    }else {
      return 2;
    }
  }

  function PrivatChatlöschen()
  {
    $SQL = "TRUNCATE TABLE `privatnachricht`";
    $SQL1 = "ALTER TABLE tablename AUTO_INCREMENT = 1";

    $result = $this->db->db->query($SQL);
    $result1 = $this->db->db->query($SQL1);

    if ($result) {
      return 1;
    }else {
      return 2;
    }
  }


}
