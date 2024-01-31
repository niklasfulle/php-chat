<?php
error_reporting(false);
session_start ();
if($_SESSION["Benutzername"] == true){
  unset($_SESSION["Benutzername"]);
  unset($_SESSION["BenutzerKlasse"]);
  unset($_SESSION["ProfilBild"]);
  unset($_SESSION["PrivatChat1"]);
  unset($_SESSION["PrivatChat2"]);
  unset($_SESSION["PrivatChat3"]);
  unset($_SESSION["PrivatChat4"]);
  unset($_SESSION["AdminSeite1"]);
  header("Location: index.php");
  exit;
}else{
  header("Location: index.php");
}
?>
