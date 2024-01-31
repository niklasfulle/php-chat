<?php

include_once 'class_DbConfig.php';
class class_Freunde
{
  public $db;
  /*
  *
  */
  function __construct()
  {
    $this->db = new Class_DbConfig();
  }

  function SelectFreunde($benutzername)
  {
    $SQL = "SELECT `BenutzerNameFreund` FROM `freunde` WHERE `BenutzerName` = '$benutzername' AND `Status` = 1";
    $result = $this->db->db->query($SQL);

    if ($result->num_rows >= "1") {
      return $result;
    }else {
      return -1;
    }

  }

  function SelectFreundschaftsanfragenbekommen($benutzername)
  {
    $SQL = "SELECT `BenutzerName` FROM `freunde` WHERE `BenutzerNameFreund` = '$benutzername' AND `Status` = 0";
    $result = $this->db->db->query($SQL);

    if ($result->num_rows >= "1") {
      return $result;
    }else {
      return -1;
    }
  }

  function SelectFreundschaftsanfragengeschickt($benutzername)
  {
    $SQL = "SELECT `BenutzerNameFreund` FROM `freunde` WHERE `BenutzerName` = '$benutzername' AND `Status` = 0";
    $result = $this->db->db->query($SQL);

    if ($result->num_rows >= "1") {
      return $result;
    }else {
      return -1;
    }
  }

  function Anfrage_zurückziehen($benutzername, $zulöschen)
  {
    $SQL1 = "DELETE FROM `freunde` WHERE `BenutzerName` = '$benutzername' AND `BenutzerNameFreund` = '$zulöschen'";

    $result1 = $this->db->db->query($SQL1);

    if ($result1) {
      return 1;
    }
  }

  function Anfrage_ablehnen($benutzername, $zulöschen)
  {
    $SQL2 = "DELETE FROM `freunde` WHERE `BenutzerName` = '$zulöschen' AND `BenutzerNameFreund` = '$benutzername'";

    $result2 = $this->db->db->query($SQL2);

    if ($result2) {
      return 1;
    }
  }

  function Anfrage_annehmen($benutzername, $freund)
  {
    $SQL1 = "UPDATE `freunde` SET `Status`= 1 WHERE `BenutzerName` = '$freund' AND `BenutzerNameFreund` = '$benutzername'";
    $SQL2 = "INSERT INTO `freunde` (`BenutzerName`, `BenutzerNameFreund`, `Status`) VALUES ('$benutzername', '$freund', '1');";

    $result1 = $this->db->db->query($SQL1);
    $result2 = $this->db->db->query($SQL2);

    if ($result1 && $result2) {
      return 1;
    }
  }

  function Anfrage_löschen($benutzername, $zulöschen)
  {
    $SQL1 = "DELETE FROM `freunde` WHERE `BenutzerName` = '$benutzername' AND `BenutzerNameFreund` = '$zulöschen'";
    $SQL2 = "DELETE FROM `freunde` WHERE `BenutzerName` = '$zulöschen' AND `BenutzerNameFreund` = '$benutzername'";

    $result1 = $this->db->db->query($SQL1);
    $result2 = $this->db->db->query($SQL2);

    if ($result1 && $result2) {
      return 1;
    }
  }

  function Anfrage_senden($benutzername, $User)
  {
    /*$SQL = "";
    if ($result->num_rows >= "1") {
      return $result;
    }*/
    $SQL2 = "INSERT INTO `freunde` (`BenutzerName`, `BenutzerNameFreund`, `Status`) VALUES ('$benutzername', '$User', '0');";

    $result2 = $this->db->db->query($SQL2);

    if ($result2) {
      return 1;
    }
  }

  function CountoffeneFreundschaftsanfragengeschickt($Benutzername)
  {
    $SQL = "SELECT COUNT(`BenutzerNameFreund`) FROM `freunde` WHERE `BenutzerName` = '$Benutzername' AND `Status` = 0";

    $result = $this->db->db->query($SQL);
    $row = $result->fetch_row();

    return $row["0"];

  }

  function CountoffeneFreundschaftsanfragenbekommen($Username)
  {
    $SQL = "SELECT COUNT(`BenutzerName`) FROM `freunde` WHERE `BenutzerNameFreund` = '$Username' AND `Status` = 0";

    $result = $this->db->db->query($SQL);
    $row = $result->fetch_row();

    return $row["0"];

  }

  function SelectFreundecheck($benutzername, $user)
  {
    $SQL = "SELECT * FROM `freunde` WHERE `BenutzerName` = '$benutzername' AND `BenutzerNameFreund` = '$user' AND `Status` = 1";
    $result = $this->db->db->query($SQL);

    if ($result->num_rows >= "1") {
      return 1;
    }else {
      return 2;
    }
  }

  function SelectFreundschaftsanfragenbekommencheck($benutzername, $user)
  {
    $SQL = "SELECT * FROM `freunde` WHERE `BenutzerNameFreund` = '$benutzername' AND `BenutzerName` = '$user' AND `Status` = 0";
    $result = $this->db->db->query($SQL);

    if ($result->num_rows >= "1") {
      return 1;
    }else {
      return 2;
    }
  }

  function SelectFreundschaftsanfragengeschicktcheck($benutzername, $user)
  {
    $SQL = "SELECT * FROM `freunde` WHERE `BenutzerName` = '$benutzername' AND `BenutzerNameFreund` = '$user' AND `Status` = 0";
    $result = $this->db->db->query($SQL);

    if ($result->num_rows >= "1") {
      return 1;
    }else {
      return 2;
    }
  }

}

?>
