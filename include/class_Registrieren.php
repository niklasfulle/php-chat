<?php

include_once 'class_DbConfig.php';
class class_Registrieren
{
  public $db;
  /*
  *
  */
  function __construct()
  {
    $this->db = new Class_DbConfig();
  }


  function register($benutzername, $vorname, $nachname, $pw1, $pw2){
    $ip = $this->GetIP();
    $pw = hash('sha256', $pw1);
    if ($pw1 == $pw2 && $pw1 != ""){
      $SQL = "SELECT Vorname FROM benutzer WHERE Benutzername = '$benutzername'";
      $SELECT1 = $this->db->db->query($SQL);
      $row = $SELECT1->fetch_assoc();
      if ($row["Vorname"] == ""){
        $SQL = "UPDATE `benutzer` SET `Vorname` = '$vorname', `Nachname` = '$nachname', `Password` = '$pw', `Last_IP` = '$ip', `ProfilBild` = 'default.png', `Warnungen` = '0', `BenutzerKlasse` = '1', `BenutzerStatus` = '0'
                WHERE `benutzer`.`BenutzerName` = '$benutzername';";
        $UPDATE = $this->db->db->query($SQL);
        if ($UPDATE) {
          $error = "2";
          return "$error";
        }
      }else {
        $error = "3";
        return "$error";
      }
    }else{
      $error = "2";
      return "$error";
    }
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
}
