<?php

include_once 'class_DbConfig.php';
class class_User
{
  public $db;
  /*
  *
  */
  function __construct()
  {
    $this->db = new Class_DbConfig();
  }

  function GetIP()
  {
    if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown"))
    $ip = getenv("HTTP_CLIENT_IP");
    else if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown"))
    $ip = getenv("HTTP_X_FORWARDED_FOR");
    else if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown"))
    $ip = getenv("REMOTE_ADDR");
    else if (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown"))
    $ip = $_SERVER['REMOTE_ADDR'];
    else
    $ip = "unknown";
    return($ip);
  }

  function selectKlasse($Benutzername)
  {
    $SQL = "SELECT `BenutzerKlasse` FROM `benutzer` WHERE `benutzer`.`BenutzerName` = '$Benutzername' AND `Vorname` != '';";
    $result = $this->db->db->query($SQL);
    $row = $result->fetch_row();
    return $row[0];

  }

  function selectStatus($Benutzername)
  {
    $SQL = "SELECT `BenutzerStatus` FROM `benutzer` WHERE `benutzer`.`BenutzerName` = '$Benutzername' AND `Vorname` != '';";
    $result = $this->db->db->query($SQL);
    $row = $result->fetch_row();
    return $row[0];

  }

  function selectProfilBild($Benutzername)
  {
    $SQL = "SELECT ProfilBild FROM benutzer WHERE BenutzerName = '$Benutzername';";
    $result = $this->db->db->query($SQL);
    $row = $result->fetch_row();
    return $row[0];

  }

  function UpdateProfilbild($username, $bild){
    /*
     * UPDATE Abfrag um das Userprofilbild zu ändern.
     */

    $sql = "UPDATE `benutzer` SET `ProfilBild` = '$bild' WHERE `benutzer`.`BenutzerName` = '$username';";
    $updatebild1 = $this->db->db->query($sql);

    if ($updatebild1  == true) {
      return 1;
    }else{
      return -1;
    }
  }


  function SelectUserforUserliste()
  {
    $SQL = "SELECT `BenutzerName`, `Vorname`, `Nachname`, `Last_IP`, `ProfilBild` FROM `benutzer` WHERE `Vorname` != '';";
    $result = $this->db->db->query($SQL);

    return $result;
  }

  function SelectUsernameforUserliste()
  {
    $SQL = "SELECT `BenutzerName` FROM `benutzer` ORDER BY `BenutzerName` ASC;";
    $result = $this->db->db->query($SQL);

    return $result;
  }

  function selectUserStatus($benutzername)
  {
    $SQL = "SELECT `BenutzerStatus` FROM `benutzer` WHERE `benutzer`.`BenutzerName` = '$benutzername' AND `Vorname` != '';";
    $result = $this->db->db->query($SQL);

    return $result;
  }

  function selectUserKlasse($benutzername)
  {
    $SQL = "SELECT `BenutzerKlasse` FROM `benutzer` WHERE `benutzer`.`BenutzerName` = '$benutzername' AND `Vorname` != '';";
    $result = $this->db->db->query($SQL);

    return $result;
  }

  function updateUserStatus($benutzername, $newStatus)
  {
    $SQL = "UPDATE `benutzer` SET `BenutzerStatus` = '$newStatus' WHERE `benutzer`.`BenutzerName` = '$benutzername' AND `Vorname` != '';";
    $result = $this->db->db->query($SQL);
  }

  function updateUserKlasse($benutzername, $newStatus)
  {
    $SQL = "UPDATE `benutzer` SET `BenutzerKlasse` = '$newStatus' WHERE `benutzer`.`BenutzerName` = '$benutzername' AND `Vorname` != '';";
    $result = $this->db->db->query($SQL);
  }

  function selectUserProfil($Username)
  {
    $SQL = "SELECT BenutzerName, Vorname, Nachname, ProfilBild FROM benutzer WHERE BenutzerName = '$Username'";
    $result = $this->db->db->query($SQL);

    return $result;
  }

  function SelectUserforUserlisteFunktion()
  {
    $SQL = "SELECT `Warnungen`, `BenutzerKlasse`, `BenutzerStatus` FROM `benutzer` WHERE `Vorname` != '';";
    $result = $this->db->db->query($SQL);

    return $result;
  }

  function SelectUserMain()
  {
    $SQL = "SELECT BenutzerName FROM benutzer WHERE Vorname != ''";
    $result = $this->db->db->query($SQL);

    if ($result) {
      return $result;
    }else {
      return -1;
    }
  }

  function Userbannen($User)
  {
    $SQL = "UPDATE `benutzer` SET `BenutzerStatus` = '0' WHERE `benutzer`.`BenutzerName` = '$User';";
    $result = $this->db->db->query($SQL);

    if ($result) {
      return $result;
    }else {
      return -1;
    }
  }

  function Userentbannen($User)
  {
    $SQL = "UPDATE `benutzer` SET `BenutzerStatus` = '1' WHERE `benutzer`.`BenutzerName` = '$User';";
    $result = $this->db->db->query($SQL);

    if ($result) {
      return $result;
    }else {
      return -1;
    }
  }

  function UserzumAdmin($User)
  {
    $SQL = "UPDATE `benutzer` SET `BenutzerKlasse` = '2' WHERE `benutzer`.`BenutzerName` = '$User';";
    $result = $this->db->db->query($SQL);

    if ($result) {
      return $result;
    }else {
      return -1;
    }
  }

  function UserzumUser($User)
  {
    $SQL = "UPDATE `benutzer` SET `BenutzerKlasse` = '1' WHERE `benutzer`.`BenutzerName` = '$User';";
    $result = $this->db->db->query($SQL);

    if ($result) {
      return $result;
    }else {
      return -1;
    }
  }

  function Userhinzufügen($User)
  {
    $SQL = "SELECT `BenutzerName` FROM `benutzer` WHERE `BenutzerName` = '$User'";
    $USER1 = $this->db->db->query($SQL);

    if ($USER1->num_rows == "1") {
      return 3;
    }else {
      $SQL = "INSERT INTO `benutzer` (`BenutzerName`, `Vorname`, `Nachname`, `Password`, `Last_IP`, `ProfilBild`, `Warnungen`, `BenutzerKlasse`, `BenutzerStatus`) VALUES ('$User', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);";

      $result = $this->db->db->query($SQL);
      if ($result) {
        return 1;
      }else {
        return 2;
      }
    }
  }

  function SelectUser()
  {
    $SQL = "SELECT BenutzerName FROM benutzer";

    $result = $this->db->db->query($SQL);

    if ($result) {
      return $result;
    }
  }

  function Userlöschen($User)
  {
    $SQL = "DELETE FROM `benutzer` WHERE `benutzer`.`BenutzerName` = '$User'";

    $result = $this->db->db->query($SQL);

    if ($result) {
      return 1;
    }else {
      return -1;
    }
  }

  function Warnungenzurücksetzten($User)
  {
    $SQL = "UPDATE `benutzer` SET `Warnungen` = '0' WHERE `benutzer`.`BenutzerName` = '$User';";

    $result = $this->db->db->query($SQL);

    if ($result) {
      return 1;
    }else {
      return -1;
    }
  }

  function BugreportAbschicken($Seite, $SeitenFunktion, $Ueberschrift, $Fehlerbeschreibung)
  {

    $SQL = "INSERT INTO `bugreports` (`Seite`, `Funktion`, `Ueberschrift`, `Fehlerbeschreibung`, `Status`, `Zeit`) VALUES ('$Seite', '$SeitenFunktion', '$Ueberschrift', '$Fehlerbeschreibung', '0', now());";

    $result = $this->db->db->query($SQL);

    if ($result) {
      return 1;
    }else {
      return -1;
    }

  }

}
