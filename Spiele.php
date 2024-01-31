<?php
error_reporting(false);
session_start();

require "include/class_Chat.php";
require "include/class_User.php";
require 'include/class_Load.php';
require 'include/class_Spiele.php';
require "include/class_Nachrichtencheck.php";

$load = new class_Load();
$Spiele = new class_Spiele();
$chat = new class_Chat();
$user = new class_User();
$check = new class_Nachrichtencheck();

$_SESSION["SeitenName"] = "Spiele.php";

if (!isset($_SESSION["Benutzername"])) {
  header("Location: Login.php");
}else {
  $result1 = $user->selectKlasse($_SESSION["Benutzername"]);
  $_SESSION["BenutzerKlasse"] = $result1;
}

?>
<html>
<head>
  <?php
  $Version = $load->head();
  echo"$Version";
  ?>
</head>
  <body>
    <form method="post">
      <input type="submit" name="back" value="Zurück" id=ProfilBackButton1>
      <?php
        if ($_POST["back"]) {
          header("Location: Index.php");
        }
      ?>
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
              header("Location: Spiele.php");
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
    <div id=SpieleMain>
      <h1 id=ProfilMain122>Spiele</h1>
      <div id="SpieleSeite">
        <form id=SpieleSeiten method="post">
          <?php
            if ($_GET["Seite"] == "Singelplayer") {
              ?>
                <input type="submit" id="SpieleSeite12" name="Seite1" value="Singelplayer">
              <?php
            }else {
              ?>
                <input type="submit" id="SpieleSeite11" name="Seite1" value="Singelplayer">
              <?php
            }
            if ($_GET["Seite"] == "Multiplayer") {
              ?>
                <input type="submit" id="SpieleSeite22" name="Seite2" value="Multiplayer">
              <?php
            }else {
              ?>
                <input type="submit" id="SpieleSeite21" name="Seite2" value="Multiplayer">
              <?php
            }
            if ($_GET["Seite"] == "Bestenliste") {
              ?>
                <input type="submit" id="SpieleSeite32" name="Seite3" value="Bestenliste">
              <?php
            }else {
              ?>
                <input type="submit" id="SpieleSeite31" name="Seite3" value="Bestenliste">
              <?php
            }
          ?>



        </form>

        <?php
          if (isset($_POST["Seite1"])) {
            header("Location: Spiele.php?Seite=Singelplayer");
          }
          if (isset($_POST["Seite2"])) {
            header("Location: Spiele.php?Seite=Multiplayer");
          }
          if (isset($_POST["Seite3"])) {
            header("Location: Spiele.php?Seite=Bestenliste");
          }


          if ($_GET["Seite"] == "Singelplayer") {
            ?>
              <div id=MainSpieleSeite>
                <?php
                  $Singelplayer = $Spiele->Singelplayer();

                  echo"$Singelplayer";
                ?>
              </div>
            <?php
          }elseif ($_GET["Seite"] == "Multiplayer") {
            ?>
              <div id=MainSpieleSeite>
                <?php
                  $Multilplayer = $Spiele->Multilplayer();

                  echo"$Multilplayer";
                ?>
              </div>
            <?php
          }elseif ($_GET["Seite"] == "Bestenliste") {
            ?>
              <div id=MainSpieleSeite>

              </div>
            <?php
          }else {
            ?>
              <div id=MainSpieleSeite>

              </div>
            <?php
          }
        ?>
      </div>

    </div>
  </body>
</html>
