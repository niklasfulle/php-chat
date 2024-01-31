 <?php
error_reporting(false);
session_start();
include_once "include/class_Chat.php";
include_once "include/class_Nachrichtencheck.php";
$chat = new class_Chat();
$check = new class_Nachrichtencheck();

  $array = $chat->getChat();
  foreach($array as $a){

  /*
    $a[0] = von
    $a[1] = Nachricht
    $a[2] = Vorname
    $a[3] = Nachname
    $a[4] = Profil Bild
    $a[5] = Benutzer Klasse
    $a[6] = Typ
    $a[7] = Nachrichten Nr
    $a[8] = Time
    $a[9] = Last IP
  */

  $newNachricht = $check->Nachrichtenaftercheck($a[1], $a[6], "normal");
  foreach($newNachricht as $b){
    $linkNachricht = $check->Linkcheck($b[0], "normal");

    $newsmileNachricht = $check->SmileCheck($linkNachricht, "normal");

  ?>

  <div id=chatframe>
    <div id=chattextframename>
      <?php
      if ($a[5] == "1") {
        echo "";
      }elseif ($a[5] == "2") {
        ?>
        <div id=Admin class="dropdown3" >
          <img id=chatframenamefinalAdminBild src=Bilder/Admin.png></img>
          <div class="dropdown3-content">
            <p id=Admin>Admin</p>
          </div>
        </div>
        <?php
      }
      ?>
      <div class="dropdown2">
      <?php
        if ($a[5] == "1") {
          if ($a[0] != $_SESSION["Benutzername"]) {
            if (isset($_SESSION["BenutzerStatus"]) && $_SESSION["BenutzerStatus"] == "1") {
              echo "<a id=chatframenamefinalBenutzername1 href=UserProfil.php?User=$a[0]> $a[0] </a>";
            }else {
              echo "<a id=chatframenamefinalBenutzername1> $a[0] </a>";
            }
          }elseif ($a[0] == $_SESSION["Benutzername"]) {
            echo "<a id=chatframenamefinalBenutzername1 > $a[0] </a>";
          }

        }elseif ($a[5] == "2") {
          if ($a[0] != $_SESSION["Benutzername"]) {
            if (isset($_SESSION["BenutzerStatus"]) && $_SESSION["BenutzerStatus"] == "1") {
              echo "<a id=chatframenamefinalBenutzername2 href=UserProfil.php?User=$a[0]> $a[0] </a>";
            }else {
              echo "<a id=chatframenamefinalBenutzername2> $a[0] </a>";
            }
          }elseif ($a[0] == $_SESSION["Benutzername"]) {
            echo "<a id=chatframenamefinalBenutzername2 > $a[0] </a>";
          }

        }
        if ($a[5] == "1") {
          ?>
          <div class="dropdown2-content1">
            <img src="Bilder/ProfilBilder/<?php echo $a[4]; ?>" id=chatframenameProfilBild>
            <a id=chatframenamefinalVorname><?php echo $a[2]; ?></a>
            <a id=chatframenamefinalNachname><?php echo $a[3]; ?></a>
            <a id=chatframenamefinalBenutzername12 ><?php echo $a[0]; ?></a>
            <a id=chatframenamefinalCurrentIPa>Aktuelle IP:</a>
            <a id=chatframenamefinalCurrentIPb><?php echo $a[9]; ?></a>
          </div>
          <?php
        }elseif ($a[5] == "2") {
          ?>
          <div class="dropdown2-content2">
            <img src="Bilder/ProfilBilder/<?php echo $a[4]; ?>" id=chatframenameProfilBild>
            <a id=chatframenamefinalVorname><?php echo $a[2]; ?></a>
            <a id=chatframenamefinalNachname><?php echo $a[3]; ?></a>
            <a id=chatframenamefinalBenutzername22><?php echo $a[0]; ?></a>
            <a id=chatframenamefinalCurrentIPa>Aktuelle IP:</a>
            <a id=chatframenamefinalCurrentIPb><?php echo $a[9]; ?></a>
          </div>
          <?php
        }
      ?>
      </div>
    </div>
    <div id=chattextframetext>
      <?php
        if ($b[1] == "Text") {
          echo "<a id=chatNachricht> $newsmileNachricht </a>";
        }elseif ($b[1] == "Link") {
          echo "<a id=chatNachrichtlink href=$newsmileNachricht target=_blank> $newsmileNachricht </a>";
        }
      ?>
    </div>
    <div id=chattextframeoption>
      <?php
      if ($_SESSION["BenutzerKlasse"] == "2") {

          ?>
            <form method="post">
              <input id=chattextframeoptiondeletNachricht type="image" src="Bilder/delet_Mülleimer.png" name="deletNachricht" >
            </form>
          <?php

      }
      ?>
      <div id=chattextframeoptionnachrichtennr>
        <a id=chattextframeoptionnachrichtennr> <?php echo $a[7]; ?></a>
      </div>
    </div>
  </div>
  <?php
  }

  }
?>
