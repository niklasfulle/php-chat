<?php

include_once 'class_DbConfig.php';
class class_Login
{
  public $db;
  /*
  *
  */
  function __construct()
  {
    $this->db = new Class_DbConfig();
  }


  function login($benutzername, $passwort){
    $ip = $this->GetIP();
    $pw = hash('sha256', $passwort);
    $sql = "SELECT BenutzerName FROM benutzer WHERE BenutzerName='$benutzername' AND Password='$pw';";
    $res = $this->db->db->query($sql);
    if ($res->num_rows == "1") {
      $SQL = "UPDATE `benutzer` SET `Last_IP` = '$ip' WHERE `benutzer`.`BenutzerName` = '$benutzername';";
      $res1 = $this->db->db->query($SQL);
      if ($res1) {
        return 1;
      }else {
        return 2;
      }
    }else {
      return 2;
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

  function selectBenutzername($name)
  {
    $SQL = "SELECT BenutzerName FROM benutzer WHERE BenutzerName = '$name';";
    $res1 = $this->db->db->query($SQL);

    $row = $res1->fetch_row();

    return $row["0"];
  }

}
