<?php
error_reporting(false);
session_start();

require "include/class_Chat.php";
require "include/class_PrivatChat.php";
require "include/class_User.php";
require "include/class_Freunde.php";
require 'include/class_Load.php';
require 'include/class_Nachrichtencheck.php';

$load = new class_Load();
$chat = new class_Chat();
$privatchat = new class_PrivatChat();
$user = new class_User();
$freunde = new class_Freunde();
$check = new class_Nachrichtencheck();


$_SESSION["SeitenName"] = "Index.php";
if (!isset($_SESSION["Benutzername"])) {
  header("Location: Login.php");
}else {
  $result1 = $user->selectKlasse($_SESSION["Benutzername"]);
  $_SESSION["BenutzerKlasse"] = $result1;

  $result2 = $user->selectStatus($_SESSION["Benutzername"]);
  $_SESSION["BenutzerStatus"] = $result2;
}

?>
<html>
  <head>
    <?php
    $Head = $load->head();
    echo"$Head";
    ?>
  </head>
  <body onload="eventschat(), loadChat(), showChat(),
                showFreunde(), showFreundschaftsanfragebekommen(), showFreundschaftsanfragegeschickt(), loadFreunde(), loadFreundschaftsanfragebekommen(), loadFreundschaftsanfragegeschickt(),
                loadPrivatChat1(), loadPrivatChat2(), loadPrivatChat3(), loadPrivatChat4(), showPrivatChat1(), showPrivatChat2(), showPrivatChat3(), showPrivatChat4()">
<script type="text/javascript">
$(document).ready(function () {
        if (!$.browser.webkit) {
            $('.wrapper').html('<p>Sorry! Non webkit users. :(</p>');
        }
    });
</script>
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
          header("Location: Index.php");
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
    <div id=chatMain>
      <form method="post">
        <textarea id=chatfeld type="text" name=chat maxlength="512" autofocus></textarea>
        <!--<input id=chatfeld type="text" name="chat" maxlength="512" placeholder="Bitte eine Nachricht eingeben" value="" autofocus>-->
        <div id="chatoptionen">
            <!--<input id=chatoptionenoption1 type="submit" name="Bild" value="Bild">
            <input id=chatoptionenoption2 type="submit" name="Datei" value="Datei">-->

        </div>
        <!--<input id=chatsubmit type="button" name="neueNachricht" value="Senden" onclick="ajax_post()">-->
        <input id=chatsubmit type="submit" name="neueNachricht" value="Senden">
        <?php
          if (!isset($_SESSION["Benutzername"])) $_SESSION["Benutzername"] = NULL;
          if (isset($_POST["neueNachricht"])){
            $Von = "normal";
            $msg = preg_replace("#[\r\n]#", '', $_POST["chat"]);
            if ($msg != "") {
              $result = $check->Nachrichtenbeforecheck($msg, $Von, $_SESSION["Benutzername"]);
              if ($result) {
                foreach ($result as $a) {
                  $result1 = $chat->neueNachricht($a[0], $a[1]);
                }

              }else {

              }
            }

          }
        ?>
        <div id="chat" class="style-1">

        </div>
      </form>
    </div>
    <div id=profil>
      <div id=profilhedder>
        <form action="Logout.php" method="post">
          <input id="Logout" type="submit" name="Logout" value="Logout">
        </form>
        <form action="Profil.php" method="post">
          <input id="Profil" type="submit" name="Profil" value="Profil">
        </form>
        <form action="Spiele.php" method="post">
          <input id="Spiele" type="submit" name="Spiele" value="Spiele">
        </form>
        <form action="Tools.php" method="post">
          <input id="Tools" type="submit" name="Tools" value="Tools">
        </form>
        <form action="Post.php" method="post">
          <input id="Post" type="submit" name="Post" value="Post">
        </form>
        <?php
          if ($_SESSION["BenutzerKlasse"] == "2") {
            echo '
            <form action="Admin.php" method="post">
              <input type="submit" name="Admin" value="Admin" id="Admin" >
            </form>';
          }
        ?>
      </div>
      <div id=profilMain>
        <div id="ProfilFreunde">
          <div id="ProfilFreundeAnfragebekommen">
            <div id="ProfilFreundeAnfragebekommenhedder">
              <h2 id="ProfilFreundeAnfragebekommenhedder">Anfragen bekommen</h2>
              <div id="ProfilFreundeAnfragebekommen1">

              </div>
            </div>
          </div>
          <div id="ProfilFreundeAnfragegechickt">
            <div id="ProfilFreundeAnfragegechickthedder">
              <h2 id="ProfilFreundeAnfragegechickthedder">Anfragen geschickt</h2>
              <div id="ProfilFreundeAnfragegechickt1">

              </div>
            </div>
          </div>
          <div id="ProfilFreundeliste" >
            <div id="ProfilFreundelistehedder">
              <h2 id="ProfilFreundelistehedder">Freunde</h2>
              <div id="ProfilFreundeliste1" class="style-2">

              </div>
            </div>
          </div>
          <?php
          if (isset($_GET["Anfrage_zurückziehen"])) {
            $result = $freunde->Anfrage_zurückziehen($_SESSION["Benutzername"], $_GET["Anfrage_zurückziehen"]);

            if ($result == 1) {
              header("Location: Index.php");
            }
          }
          if (isset($_GET["Anfrage_ablehnen"])) {
            $result = $freunde->Anfrage_ablehnen($_SESSION["Benutzername"], $_GET["Anfrage_ablehnen"]);

            if ($result == 1) {
              header("Location: Index.php");
            }
          }
          if (isset($_GET["Anfrage_annehmen"])) {
            $result = $freunde->Anfrage_annehmen($_SESSION["Benutzername"], $_GET["Anfrage_annehmen"]);
            if ($result == 1) {
              header("Location: Index.php");
            }
          }
          if (isset($_GET["Freund_löschen"])) {
            $result = $freunde->Anfrage_löschen($_SESSION["Benutzername"], $_GET["Freund_löschen"]);

            if ($result == 1) {
              header("Location: Index.php");
            }
          }
          ?>
        </div>
          <div id="NewPostdiv">


          </div>
          <div id=Privat>
            <div id=PrivatChatFrame1index>

            </div>
            <div id=PrivatChatFrame2index>

            </div>
            <div id=PrivatChatFrame3index>

            </div>
            <div id=PrivatChatFrame4index>

            </div>
          </div>
            <?php
              if (isset($_GET["New_Chat"])) {
                if ($_GET["New_Chat"] != $_SESSION["Benutzername"]) {
                  $result = $freunde->SelectFreundecheck($_SESSION["Benutzername"], $_GET["New_Chat"]);
                  if ($result == "1") {
                    if (($_SESSION["PrivatChat1"] == "" && $_SESSION["PrivatChat2"] == "" && $_SESSION["PrivatChat3"] == "" && $_SESSION["PrivatChat4"] == "") ||
                        ($_SESSION["PrivatChat1"] == "" && $_SESSION["PrivatChat2"] != "" && $_SESSION["PrivatChat3"] == "" && $_SESSION["PrivatChat4"] == "") ||
                        ($_SESSION["PrivatChat1"] == "" && $_SESSION["PrivatChat2"] == "" && $_SESSION["PrivatChat3"] != "" && $_SESSION["PrivatChat4"] == "") ||
                        ($_SESSION["PrivatChat1"] == "" && $_SESSION["PrivatChat2"] == "" && $_SESSION["PrivatChat3"] == "" && $_SESSION["PrivatChat4"] != "") ||
                        ($_SESSION["PrivatChat1"] == "" && $_SESSION["PrivatChat2"] != "" && $_SESSION["PrivatChat3"] != "" && $_SESSION["PrivatChat4"] == "") ||
                        ($_SESSION["PrivatChat1"] == "" && $_SESSION["PrivatChat2"] == "" && $_SESSION["PrivatChat3"] != "" && $_SESSION["PrivatChat4"] != "") ||
                        ($_SESSION["PrivatChat1"] == "" && $_SESSION["PrivatChat2"] != "" && $_SESSION["PrivatChat3"] == "" && $_SESSION["PrivatChat4"] != "") ||
                        ($_SESSION["PrivatChat1"] == "" && $_SESSION["PrivatChat2"] != "" && $_SESSION["PrivatChat3"] != "" && $_SESSION["PrivatChat4"] != "")) {
                          if ($_SESSION["PrivatChat2"] != $_GET["New_Chat"] && $_SESSION["PrivatChat3"] != $_GET["New_Chat"] && $_SESSION["PrivatChat4"] != $_GET["New_Chat"]) {
                            $_SESSION["PrivatChat1"] = $_GET["New_Chat"];
                            header("Location: Index.php");
                          }
                    }elseif (($_SESSION["PrivatChat1"] != "" && $_SESSION["PrivatChat2"] == "" && $_SESSION["PrivatChat3"] == "" && $_SESSION["PrivatChat4"] == "") ||
                             ($_SESSION["PrivatChat1"] != "" && $_SESSION["PrivatChat2"] == "" && $_SESSION["PrivatChat3"] != "" && $_SESSION["PrivatChat4"] == "") ||
                             ($_SESSION["PrivatChat1"] != "" && $_SESSION["PrivatChat2"] == "" && $_SESSION["PrivatChat3"] != "" && $_SESSION["PrivatChat4"] != "") ||
                             ($_SESSION["PrivatChat1"] != "" && $_SESSION["PrivatChat2"] == "" && $_SESSION["PrivatChat3"] == "" && $_SESSION["PrivatChat4"] != "")) {
                      if ($_SESSION["PrivatChat1"] != $_GET["New_Chat"] && $_SESSION["PrivatChat3"] != $_GET["New_Chat"] && $_SESSION["PrivatChat4"] != $_GET["New_Chat"]) {
                        $_SESSION["PrivatChat2"] = $_GET["New_Chat"];
                        header("Location: Index.php");
                      }
                    }elseif (($_SESSION["PrivatChat1"] != "" && $_SESSION["PrivatChat2"] != "" && $_SESSION["PrivatChat3"] == "" && $_SESSION["PrivatChat4"] == "") ||
                              ($_SESSION["PrivatChat1"] != "" && $_SESSION["PrivatChat2"] != "" && $_SESSION["PrivatChat3"] == "" && $_SESSION["PrivatChat4"] != "")) {
                      if ($_SESSION["PrivatChat1"] != $_GET["New_Chat"] && $_SESSION["PrivatChat2"] != $_GET["New_Chat"] && $_SESSION["PrivatChat4"] != $_GET["New_Chat"]) {
                        $_SESSION["PrivatChat3"] = $_GET["New_Chat"];
                        header("Location: Index.php");
                      }
                    }elseif ($_SESSION["PrivatChat1"] != "" && $_SESSION["PrivatChat2"] != "" && $_SESSION["PrivatChat3"] != "" && $_SESSION["PrivatChat4"] == "") {
                      if ($_SESSION["PrivatChat1"] != $_GET["New_Chat"] && $_SESSION["PrivatChat2"] != $_GET["New_Chat"] && $_SESSION["PrivatChat3"] != $_GET["New_Chat"]) {
                        $_SESSION["PrivatChat4"] = $_GET["New_Chat"];
                        header("Location: Index.php");
                      }
                    }elseif ($_SESSION["PrivatChat1"] != "" && $_SESSION["PrivatChat2"] != "" && $_SESSION["PrivatChat3"] != "" && $_SESSION["PrivatChat4"] != "") {
                      header("Location: Index.php");
                    }
                  }
                }
              }

              /***************************Privat Chat schließen */

              if (isset($_GET["Chat_beenden"]) && $_GET["Chat_beenden"] == "1") {
                unset($_SESSION["PrivatChat1"]);
                $_SESSION["PrivatChat1"] = $_SESSION["PrivatChat2"];
                $_SESSION["PrivatChat2"] = $_SESSION["PrivatChat3"];
                $_SESSION["PrivatChat3"] = $_SESSION["PrivatChat4"];
                unset($_SESSION["PrivatChat4"]);
                $true = true;
                if ($true) {
                  header("Location: Index.php?1");
                }

              }elseif (isset($_GET["Chat_beenden"]) && $_GET["Chat_beenden"] == "2") {
                unset($_SESSION["PrivatChat2"]);
                $_SESSION["PrivatChat2"] = $_SESSION["PrivatChat3"];
                $_SESSION["PrivatChat3"] = $_SESSION["PrivatChat4"];
                unset($_SESSION["PrivatChat4"]);
                $true = true;
                if ($true) {
                  header("Location: Index.php");
                }
              }elseif (isset($_GET["Chat_beenden"]) && $_GET["Chat_beenden"] == "3") {
                unset($_SESSION["PrivatChat3"]);
                $_SESSION["PrivatChat3"] = $_SESSION["PrivatChat4"];
                unset($_SESSION["PrivatChat4"]);
                $true = true;
                if ($true) {
                  header("Location: Index.php");
                }
              }elseif (isset($_GET["Chat_beenden"]) && $_GET["Chat_beenden"] == "4") {
                unset($_SESSION["PrivatChat4"]);
                $true = true;
                if ($true) {
                  header("Location: Index.php");
                }
              }

              /***************************Privat Chat Nachricht absenden*/

              if (isset($_POST["PrivatChatBottominput1"]) && $_POST["PrivatChatBottomtextarea1"] != "" && isset($_SESSION["PrivatChat1"]) && $_SESSION["PrivatChat1"] != "") {
                $Von = "privat";
                $msg = preg_replace("#[\r\n]#", '', $_POST["PrivatChatBottomtextarea1"]);
                if ($msg != "") {
                  $result = $check->Nachrichtenbeforecheck($msg, $Von, $_SESSION["Benutzername"]);

                  if ($result) {
                    foreach ($result as $b) {
                    $privatchat->neuePrivatNachricht($_SESSION["Benutzername"], $_SESSION["PrivatChat1"], $b[0], $b[1]);
                    }
                  }else {

                  }
                }

              }
              if (isset($_POST["PrivatChatBottominput2"]) && $_POST["PrivatChatBottomtextarea2"] != "" && isset($_SESSION["PrivatChat2"]) && $_SESSION["PrivatChat2"] != "") {
                $Von = "privat";
                $msg = preg_replace("#[\r\n]#", '', $_POST["PrivatChatBottomtextarea2"]);
                if ($msg != "") {
                  $result = $check->Nachrichtenbeforecheck($msg, $Von, $_SESSION["Benutzername"]);

                  if ($result) {
                    foreach ($result as $b) {
                    $privatchat->neuePrivatNachricht($_SESSION["Benutzername"], $_SESSION["PrivatChat2"], $b[0], $b[1]);
                    }
                  }else {

                  }
                }
              }
              if (isset($_POST["PrivatChatBottominput3"]) && $_POST["PrivatChatBottomtextarea3"] != "" && isset($_SESSION["PrivatChat3"]) && $_SESSION["PrivatChat3"] != "") {
                $Von = "privat";
                $msg = preg_replace("#[\r\n]#", '', $_POST["PrivatChatBottomtextarea3"]);
                if ($msg != "") {
                  $result = $check->Nachrichtenbeforecheck($msg, $Von, $_SESSION["Benutzername"]);

                  if ($result) {
                    foreach ($result as $b) {
                    $privatchat->neuePrivatNachricht($_SESSION["Benutzername"], $_SESSION["PrivatChat3"], $b[0], $b[1]);
                    }
                  }else {

                  }
                }
              }
              if (isset($_POST["PrivatChatBottominput4"]) && $_POST["PrivatChatBottomtextarea4"] != "" && isset($_SESSION["PrivatChat4"]) && $_SESSION["PrivatChat4"] != "") {
                $Von = "privat";
                $result = $check->Nachrichtenbeforecheck($_POST["PrivatChatBottomtextarea4"], $Typ, $Von);
                $msg = preg_replace("#[\r\n]#", '', $_POST["PrivatChatBottomtextarea4"]);
                if ($msg != "") {
                  $result = $check->Nachrichtenbeforecheck($msg, $Von, $_SESSION["Benutzername"]);

                  if ($result) {
                    foreach ($result as $b) {
                    $privatchat->neuePrivatNachricht($_SESSION["Benutzername"], $_SESSION["PrivatChat4"], $b[0], $b[1]);
                    }
                  }else {

                  }
                }
              }

            ?>
        </div>
      </div>
    </div>

  </body>
</html>
