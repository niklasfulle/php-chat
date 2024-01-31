<?php

include_once 'class_DbConfig.php';
class class_Chat
{
  public $db;
  /**
   *  Der Consturctor gibt $db eine mysqli Datenbank verbindung.
  */
  function __construct()
  {
    $this->db = new Class_DbConfig();
  }

  /**
   *  neueNachricht fügt eine neue Nachricht in die Datenbank ein.
   */
  function neueNachricht($nachricht, $typ){
    $Benutzername = $_SESSION["Benutzername"];
    $sql = "SELECT * FROM Benutzer WHERE BenutzerName = '$Benutzername' AND BenutzerStatus=1";
    $sql2 = "";
    if ($this->db->db->query($sql)->fetch_row()[0] != NULL && $nachricht != ""){
      $nr = htmlspecialchars($nachricht);
      $sql = "INSERT INTO nachricht (Von, Nachricht, Typ, Time, Status) VALUES ('$Benutzername','$nr', '$typ', now(), '1')";
      return $this->db->db->query($sql);
    }
  }

  /**
   *  getChat gibt alle Nachrichten der letzten 5 Minuten zurück.
   */
  function getChat(){
    $sql = "SELECT Nachricht.Nachricht, Nachricht.Von, Nachricht.Typ, Nachricht.Time, benutzer.Vorname, benutzer.Nachname, benutzer.ProfilBild, benutzer.BenutzerKlasse, Nachricht.NachrichtenNr, benutzer.Last_IP FROM nachricht INNER JOIN benutzer ON Nachricht.Von=Benutzer.BenutzerName WHERE Time > DATE_SUB( CURRENT_TIME(), INTERVAL 5 MINUTE) AND Status = 1 ORDER BY Time DESC";
    $result = $this->db->db->query($sql);
    $array = array();
    while ($row = $result->fetch_assoc()){
      array_push($array, array($row["Von"],$row["Nachricht"],$row["Vorname"],$row["Nachname"],$row["ProfilBild"],$row["BenutzerKlasse"],$row["Typ"],$row["NachrichtenNr"],$row["Time"],$row["Last_IP"]));
    }
    return $array;
  }

  /**
   * deleteNachricht löscht eine Nachricht aus der Datenbank.
   */
  function deletNachricht($NachrichtNr, $Time)
  {
    //$SQL = "UPDATE `nachricht` SET `Nachricht` = 'Diese Nachricht wurde von einem Admin gelöscht' WHERE `nachricht`.`NachrichtenNr` = $NachrichtNr AND `nachricht`.`Time` = $Time;";
    return $this->db->db->query($SQL);
  }
}
?>