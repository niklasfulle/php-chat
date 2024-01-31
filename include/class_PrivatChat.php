<?php

include_once 'class_DbConfig.php';
class class_PrivatChat
{
  public $db;
  /*
  *
  */
  function __construct()
  {
    $this->db = new Class_DbConfig();
  }

  function neuePrivatNachricht($Von, $An, $Nachricht, $Typ){
    $nr = htmlspecialchars($Nachricht);
    $sql = "SELECT * FROM Benutzer WHERE BenutzerName = '$Von' AND BenutzerStatus = 1";
    $result = $this->db->db->query($sql);
    if ($result->num_rows >= "1") {
      $SQL = "INSERT INTO `privatnachricht` (`NachrichtenNr`, `Von`, `An`, `Nachricht`, `Typ`, `Status`, `Time`) VALUES (NULL, '$Von', '$An', '$nr', '$Typ', '0', now());";
      $result1 = $this->db->db->query($SQL);
    }
  }

  function getPrivatChat($Von, $An){
    //$sql = "SELECT Von, An, Nachricht, Typ, Status, Time FROM `privatnachricht` WHERE (Von = '$Von' OR Von = '$An') AND (AN = '$Von' OR AN = '$An') ORDER BY Time ASC";
    $sql = "SELECT Von, An, Nachricht, Typ, Status, Time FROM `privatnachricht` WHERE (Von = '$Von' OR Von = '$An') AND (AN = '$Von' OR AN = '$An') ORDER BY Time DESC";
    $result = $this->db->db->query($sql);
    if ($result->num_rows >= "1") {
      $array = array();
      while ($row = $result->fetch_assoc()){
        array_push($array, array($row["Von"],$row["An"],$row["Nachricht"],$row["Typ"],$row["Status"],$row["Time"]));
      }
    }else {
      $array = "-666";
    }

    return $array;
  }

  function Nachrichtgelesen($Von, $An)
  {
    $SQL = "UPDATE `privatnachricht` SET `Status`= 1 WHERE `Von` = '$An' AND `An` = '$Von' AND `Status` = 0";
    $result1 = $this->db->db->query($SQL);
  }

  function ungeleseneNachrichtencount($Von, $An)
  {
    $SQL = "SELECT COUNT(NachrichtenNr) FROM privatnachricht WHERE Von = '$Von' AND An = '$An' AND `Status` = 0";
    $result = $this->db->db->query($SQL);
    if ($result) {
      $row = $result->fetch_row();

      return $row["0"];
    }else {
      return 0;
    }

  }

}
