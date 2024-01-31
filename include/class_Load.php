<?php

include_once 'class_DbConfig.php';
class class_Load
{
  public $db;
  /**
   *  Der Consturctor gibt $db eine mysqli Datenbank verbindung.
   */
  function __construct()
  {
    $this->db = new Class_DbConfig();
  }

  function head()
  {
    $icon = "
    <title>Klassen Chat</title>
    <meta charset='utf-8'>
    <meta name='Version' content='1.8.7.1'>
    <link rel='shortcut icon' href='Bilder/favicon.ico' type='image/x-icon'>
    <link rel='stylesheet' type='text/css' href='style/style.css'/>
    <link rel='stylesheet' type='text/css' href='style/chat_style.css'/>
    <link rel='stylesheet' type='text/css' href='style/dropdown_style.css'/>
    <link rel='stylesheet' type='text/css' href='style/seitenstruktur_style.css'/>
    <script src='javascript/chatscript.js'></script>
    <script src='javascript/freundescript.js'></script>
    <script src='javascript/adminscript.js'></script>
    <script src='javascript/userscript.js'></script>

";
    return $icon;

  }

  function LoadBugreportSeitenFunktionen($SeitenName)
  {
    if ($SeitenName == "Index.php") {
      $Funktion = "
        <select id=Bugreport2 name='SeitenFunktion'>
          <option id=Bugreport2 value='None'>---------------------------------------------------------------------------</option>
          <option id=Bugreport2 value='Nachricht schreiben'>Nachricht schreiben</option>
          <option id=Bugreport2 value='Smile schreiben'>Smile schreiben</option>
          <option id=Bugreport2 value='Link schreiben'>Link schreiben</option>
          <option id=Bugreport2 value='Privatchat: Nachricht schrieben'>Privatchat: Nachricht schrieben</option>
          <option id=Bugreport2 value='Privatchat: Smile schrieben'>Privatchat: Smile schrieben</option>
          <option id=Bugreport2 value='Privatchat: Link schrieben'>Privatchat: Link schrieben</option>
          <option id=Bugreport2 value='Privatchat öffnen oder schließen'>Privatchat öffnen oder schließen</option>
          <option id=Bugreport2 value='Seitenverlinkung'>Seitenverlinkung</option>
          <option id=Bugreport2 value='Freunsdschaftsanfrage geschickt'>Freunsdschaftsanfrage geschickt</option>
          <option id=Bugreport2 value='Freunsdschaftsanfrage bekommen'>Freunsdschaftsanfrage bekommen</option>
          <option id=Bugreport2 value='Freunde'>Freunde</option>
          <option id=Bugreport2 value='Logout'>Logout</option>
        </select>
      ";
    }elseif ($SeitenName == "Register.php") {
      $Funktion = "
        <select id=Bugreport2 name='SeitenFunktion'>
          <option id=Bugreport2 value='None'>---------------------------------------------------------------------------</option>
          <option id=Bugreport2 value='Fehler Beim registrien'>Fehler Beim registrien</option>
        </select>
      ";
    }elseif ($SeitenName == "Login.php") {
      $Funktion = "
        <select id=Bugreport2 name='SeitenFunktion'>
          <option id=Bugreport2 value='None'>---------------------------------------------------------------------------</option>
          <option id=Bugreport2 value='Fehler beim einlogen'>Fehler beim einlogen</option>
        </select>
      ";
    }elseif ($SeitenName == "Admin.php") {
      $Funktion = "
        <select id=Bugreport2 name='SeitenFunktion'>
          <option id=Bugreport2 value='None'>---------------------------------------------------------------------------</option>
          <option id=Bugreport2 value='Admin Seite 1: Die optik der Seite'>Admin Seite 1: Die optik der Seite</option>
          <option id=Bugreport2 value='Admin Seite 1: Anzeigen der User'>Admin Seite 1: Anzeigen der User</option>
          <option id=Bugreport2 value='Admin Seite 1: User hinzufügen'>Admin Seite 1: User hinzufügen</option>
          <option id=Bugreport2 value='Admin Seite 1: User löschen'>Admin Seite 1: User löschen</option>
          <option id=Bugreport2 value='Admin Seite 1: User Bannen'>Admin Seite 1: User Bannen</option>
          <option id=Bugreport2 value='Admin Seite 1: User Entbannen'>Admin Seite 1: User Entbannen</option>
          <option id=Bugreport2 value='Admin Seite 1: User zum Admin machen'>Admin Seite 1: User zum Admin machen</option>
          <option id=Bugreport2 value='Admin Seite 1: User zum User machen'>Admin Seite 1: User zum User machen</option>
          <option id=Bugreport2 value='Admin Seite 1: Warnungen zurücksetzten'>Admin Seite 1: Warnungen zurücksetzten</option>
          <option id=Bugreport2 value='Admin Seite 2: Die optik der Seite'>Admin Seite 2: Die optik der Seite</option>
          <option id=Bugreport2 value='Admin Seite 2: Anzeigen der Smiles'>Admin Seite 2: Anzeigen der Smiles</option>
          <option id=Bugreport2 value='Admin Seite 2: Smile hinzufügen'>Admin Seite 2: Smile hinzufügen</option>
          <option id=Bugreport2 value='Admin Seite 2: Smile deaktivieren'>Admin Seite 2: Smile deaktivieren</option>
          <option id=Bugreport2 value='Admin Seite 2: Smile aktivieren'>Admin Seite 2: Smile aktivieren</option>
          <option id=Bugreport2 value='Admin Seite 2: Smile löschen'>Admin Seite 2: Smile löschen</option>
          <option id=Bugreport2 value='Admin Seite 2: Die optik der Seite'>Admin Seite 3: Die optik der Seite</option>
          <option id=Bugreport2 value='Admin Seite 2: Anzeigen der Filter'>Admin Seite 3: Anzeigen der Filter</option>
          <option id=Bugreport2 value='Admin Seite 2: Filter hinzufügen'>Admin Seite 3: Filter hinzufügen</option>
          <option id=Bugreport2 value='Admin Seite 2: Filter deaktivieren'>Admin Seite 3: Filter deaktivieren</option>
          <option id=Bugreport2 value='Admin Seite 2: Filter aktivieren'>Admin Seite 3: Filter aktivieren</option>
          <option id=Bugreport2 value='Admin Seite 2: Filter löschen'>Admin Seite 3: Filter löschen</option>
          <option id=Bugreport2 value='Admin Seite 2: Filter hochladen'>Admin Seite 3: Filter hochladen</option>
          <option id=Bugreport2 value='Admin Seite 3: Die optik der Seite'>Admin Seite 4: Die optik der Seite</option>
          <option id=Bugreport2 value='Admin Seite 3: Anzeigen der Statistiken'>Admin Seite 4: Anzeigen der Statistiken</option>
          <option id=Bugreport2 value='Admin Seite 3: Chat löschen'>Admin Seite 4: Chat löschen</option>
          <option id=Bugreport2 value='Admin Seite 3: Privatchat löschen'>Admin Seite 4: Privatchat löschen</option>
          <option id=Bugreport2 value='Admin Seite 4: Die optik der Seite'>Admin Seite 5: Die optik der Seite</option>
          <option id=Bugreport2 value='Admin Seite 5: Die optik der Seite'>Admin Seite 6: Die optik der Seite</option>
          <option id=Bugreport2 value='Admin Seite 6: Die optik der Seite'>Admin Seite 6: Die optik der Seite</option>
        </select>
      ";
    }elseif ($SeitenName == "UserProfil.php") {
      $Funktion = "
        <select id=Bugreport2 name='SeitenFunktion'>
          <option id=Bugreport2 value='None'>---------------------------------------------------------------------------</option>
        </select>
      ";
    }elseif ($SeitenName == "Profil.php") {
      $Funktion = "
        <select id=Bugreport2 name='SeitenFunktion'>
          <option id=Bugreport2 value='None'>---------------------------------------------------------------------------</option>
        </select>
      ";
    }elseif ($SeitenName == "Spiele.php") {
      $Funktion = "
        <select id=Bugreport2 name='SeitenFunktion'>
          <option id=Bugreport2 value='None'>---------------------------------------------------------------------------</option>
        </select>
      ";
    }elseif ($SeitenName == "Tools.php") {
      $Funktion = "
        <select id=Bugreport2 name='SeitenFunktion'>
          <option id=Bugreport2 value='None'>---------------------------------------------------------------------------</option>
        </select>
      ";
    }elseif ($SeitenName == "Post.php") {
      $Funktion = "
        <select id=Bugreport2 name='SeitenFunktion'>
          <option id=Bugreport2 value='None'>---------------------------------------------------------------------------</option>
        </select>
      ";
    }

    return $Funktion;
  }

  function CountNewBugReports()
  {
    $SQL = "SELECT Count(*) FROM bugreports WHERE Status = 0";

    $result = $this->db->db->query($SQL);

    $row = $result->fetch_row();

    return $row[0];
  }



}
