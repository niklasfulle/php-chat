<?php
 /**
  * class_dbconfig ist die Klasse die die anbindung zur Datenbank erledigt.
  * $db ist das für andere Datei anzusprechende Objekt um Query befehle auszuführen.
  */
 class Class_DbConfig
 {
   public $db;
   /*
   * Der Consturctor gibt $db eine mysqli Datenbank verbindung.
   */
   function __construct()
   {
     $this->db = new mysqli('localhost','root','','chat');
   }
 }
?>