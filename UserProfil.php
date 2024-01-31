<?php
error_reporting(false);
session_start();

require "include/class_Chat.php";
require "include/class_User.php";
require "include/class_Freunde.php";
require 'include/class_Load.php';

$load = new class_Load();
$chat = new class_Chat();
$user = new class_User();
$freunde = new class_Freunde();

$_SESSION["SeitenName"] = "UserProfil.php";

if (!isset($_SESSION["Benutzername"])) {
  header("Location: Login.php");
}else {
  $result1 = $user->selectKlasse($_SESSION["Benutzername"]);
  $_SESSION["BenutzerKlasse"] = $result1;

  $result2 = $user->selectStatus($_SESSION["Benutzername"]);
  $_SESSION["BenutzerStatus"] = $result2;
}
if ($_SESSION["Benutzername"] == $_GET["User"]) {
  header("Location: Profil.php");
}
header("Refresh:30");
?>
<html>
<head>
  <?php
  $Version = $load->head();
  echo"$Version";
  ?>
</head>
  <body onload="loadUserStatistik()">
    <form action="Index.php" method="post">
      <input type="submit" name="back" value="Zurück" id=ProfilBackButton5>
    </form>
    <form method="post">
      <input type="submit" name="Bugreport" value="Fehler melden" id=Bugreport>
    </form>
    <?php
      if (isset($_POST["Bugreport"])) {
        $_SESSION["Bugreport"] = "1";
      }
      if ($_SESSION["Bugreport"] == "1") {
        ?>
          <div id=Bugreportbackround>

          </div>
          <div id=BugreportMain>
            <form method="post">
              <input type="submit" name="Bugreportclose" value="X" id=Bugreportclose>
            </form>
            <?php
            if (isset($_POST["Bugreportclose"])) {
              $_SESSION["Bugreport"] = "0";
              header("Location: UserProfil.php");
            }
            ?>
            <h1 id=BugreportMain>Fehler melden</h1>

            <form method="post">
              <table id=Bugreport>
                <tr id=Bugreport>
                  <td id=Bugreport>Seitenname:</td>
                </tr>
                <tr id=Bugreport>
                  <td><input id=Bugreport1 type="text" name="SeitenName" value="<?php echo$_SESSION["SeitenName"];?>" readonly required></td>
                </tr>
                <tr id=Bugreport>
                  <td id=Bugreport>Seitenfunktion:</td>
                </tr>
                <tr id=Bugreport>
                  <td>
                    <?php
                      $result = $load->LoadBugreportSeitenFunktionen($_SESSION["SeitenName"]);

                      echo"$result";
                    ?>
                  </td>
                </tr>
                <tr id=Bugreport>
                  <td id=Bugreport>Überschrift:</td>
                </tr>
                <tr id=Bugreport>
                  <td><input id=Bugreport3  type="text" name="Ueberschrift" value="" required></td>
                </tr>
                <tr id=Bugreport>
                  <td><textarea id=Bugreport4 name="Fehlerbeschreibung" required></textarea></td>
                </tr>
                <tr id=Bugreport>
                  <td><input id=Bugreport5 type="submit" name="Bugreportabschickenres" value="Abschicken"></td>
                </tr>
              </table>
            </form>
            <?php
              if (isset($_POST["Bugreportabschickenres"])) {
                if ($_POST["SeitenFunktion"] != "None" &&  $_POST["Ueberschrift"] != "" && $_POST["Fehlerbeschreibung"] != "") {
                  $result = $user->BugreportAbschicken($_POST["SeitenName"], $_POST["SeitenFunktion"], $_POST["Ueberschrift"], $_POST["Fehlerbeschreibung"]);
                  if ($result == "1") {
                    ?>
                      <a id="BugreportInfo">Der Bericht wurde erfolgreich abgesendet.</a>
                    <?php
                  }
                }
              }
            ?>
          </div>
        <?php
      }
    ?>
    <div id=UserProfilMain>
      <h1 id=ProfilMain124><?php echo $_GET["User"]; ?></h1>
      <div id=UserProfil>
        <div id=UserProfil1>
          <?php
          $result2 = $user->selectStatus($_SESSION["Benutzername"]);
          $_SESSION["BenutzerStatus"] = $result2;
            if (isset($_SESSION["BenutzerStatus"]) && $_SESSION["BenutzerStatus"] == "1") {
              $result = $user->selectUserProfil($_GET["User"]);

              $row = $result->fetch_row();
              ?>
              <table id=UserProfil>
                <tr id=UserProfil>
                  <td id=UserProfil1>Benutzername:</td><td id=UserProfil21><?php echo $_GET["User"]?></td>
                </tr>
                <tr id=UserProfil>
                  <td id=UserProfil1>Vorname:</td><td id=UserProfil21><?php echo $row[1];?></td>
                </tr>
                <tr id=UserProfil>
                  <td id=UserProfil1>Nachname:</td><td id=UserProfil21><?php echo $row[2];?></td>
                </tr>
              </table>
              <img id=UserProfil src=Bilder/ProfilBilder/<?php echo $row[3];?>></img>
              <div id=Freunsdschaftsanfragediv>
                <?php
                if ($_GET["User"] != ""){
                $res  = $freunde->SelectFreundecheck($_SESSION["Benutzername"], $_GET["User"]);
                $res1 = $freunde->SelectFreundschaftsanfragenbekommencheck($_SESSION["Benutzername"], $_GET["User"]);
                $res2 = $freunde->SelectFreundschaftsanfragengeschicktcheck($_SESSION["Benutzername"], $_GET["User"]);

                if ($res == "2") {
                  if ($res1 == "2") {
                    if ($res2 == "2") {
                      //$result   = $freunde->CountoffeneFreundschaftsanfragengeschickt($_GET["User"]); //Freunschaftsanfragen die der User des Profils geschickt hat
                      $result1  = $freunde->CountoffeneFreundschaftsanfragengeschickt($_SESSION["Benutzername"]); //Freunschaftsanfragen die der Benutzer geschickt hat
                      $result2  = $freunde->CountoffeneFreundschaftsanfragenbekommen($_GET["User"]); //Freunschaftsanfragen die der User des Profils bekommen hat
                      //$result3  = $freunde->CountoffeneFreundschaftsanfragenbekommen($_SESSION["Benutzername"]); //Freunschaftsanfragen die der Benutzer bekommen hat

                      //if ($result >= 0 && $result <5) {
                        if ($result1 >= 0 && $result1 <5) {
                          if ($result2 >= 0 && $result2 <5) {
                            ?>
                              <form action="?User=<?php echo $_GET["User"];?>&Freunschaftsanfrage=<?php echo $_GET["User"];?>" method="post">
                                <input id=Freunschaftsanfragesenden type="submit" name="Freunschaftsanfrage" value="Freunschaftsanfrage senden">
                              </form>
                            <?php
                            /*if ($result3 >= 0 && $result3 <5) {

                            }else {
                              echo"<a id=Freunsdschaftsanfragea></a>";
                            }*/
                          }else {
                            echo"<a id=Freunsdschaftsanfragea>ERROR! $_GET[User] hat zu viele Freunschaftsanfragen bekommen</a>";
                          }
                        }else {
                          echo"<a id=Freunsdschaftsanfragea>ERROR! Sie haben zu viele Freunschaftsanfragen verschickt</a>";
                        }
                      /*}else {
                        echo"<a id=Freunsdschaftsanfragea></a>";
                      }*/
                    }else {
                      ?>
                        <form action="?User=<?php echo $_GET["User"];?>&zurücknehmen=<?php echo $_GET["User"];?>" method="post">
                          <input id=Freunschaftsanfragesenden type="submit" name="Freunschaftsanfrage" value="Freunschaftsanfrage zurücknehmen">
                        </form>
                      <?php
                    }
                  }else {
                    ?>
                    <form action="?User=<?php echo $_GET["User"];?>&annehmen=<?php echo $_GET["User"];?>" method="post">
                      <input id=Freunschaftsanfragesenden type="submit" name="Freunschaftsanfrage" value="Freunschaftsanfrage annehmen">
                    </form>
                      <form action="?User=<?php echo $_GET["User"];?>&ablehnen=<?php echo $_GET["User"];?>" method="post">
                        <input id=Freunschaftsanfragesenden type="submit" name="Freunschaftsanfrage" value="Freunschaftsanfrage ablehnen">
                      </form>
                    <?php
                  }
                }else {
                  ?>
                    <form action="?User=<?php echo $_GET["User"];?>&löschen=<?php echo $_GET["User"];?>" method="post">
                      <input id=Freunschaftsanfragesenden type="submit" name="Freunschaftsanfrage" value="Freunschaft beenden">
                    </form>
                  <?php
                }

                if (isset($_GET["Freunschaftsanfrage"]) && $_GET["Freunschaftsanfrage"] == $_GET["User"]) {
                  $result = $freunde->Anfrage_senden($_SESSION["Benutzername"], $_GET["User"]);
                  if ($result) {
                    header("Location: UserProfil.php?User=$_GET[User]");
                  }
                }

                if (isset($_GET["annehmen"]) && $_GET["annehmen"] == $_GET["User"]) {
                  $result = $freunde->Anfrage_annehmen($_SESSION["Benutzername"], $_GET["User"]);
                  if ($result) {
                    header("Location: UserProfil.php?User=$_GET[User]");
                  }
                }

                if (isset($_GET["zurücknehmen"]) && $_GET["zurücknehmen"] == $_GET["User"]) {
                  $result = $freunde->Anfrage_zurückziehen($_SESSION["Benutzername"], $_GET["User"]);
                  if ($result) {
                    header("Location: UserProfil.php?User=$_GET[User]");
                  }
                }

                if (isset($_GET["ablehnen"]) && $_GET["ablehnen"] == $_GET["User"]) {
                  $result = $freunde->Anfrage_ablehnen($_SESSION["Benutzername"], $_GET["User"]);
                  if ($result) {
                    header("Location: UserProfil.php?User=$_GET[User]");
                  }
                }

                if (isset($_GET["löschen"]) && $_GET["löschen"] == $_GET["User"]) {
                  $result = $freunde->Anfrage_löschen($_SESSION["Benutzername"], $_GET["User"]);
                  if ($result) {
                    header("Location: UserProfil.php?User=$_GET[User]");
                  }
                }
              }
            ?>
              </div>

        </div>
        <div id=UserProfil2>

        </div>
        <?php
          }
        ?>
      </div>
    </div>
  </body>
</html>
