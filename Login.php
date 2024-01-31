<?php
error_reporting();
session_start();

require "include/class_Chat.php";
require "include/class_Login.php";
require "include/class_User.php";
require 'include/class_Load.php';

$load = new class_Load();
$chat = new class_Chat();
$login = new class_Login();
$user = new class_User();

$_SESSION["SeitenName"] = "Login.php";

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
              header("Location: Login.php");
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
    <div id=LoginMain>
      <h1 id=Loginh1>Login</h1>

      <form method="post">
        <table id=LoginTable>
          <tr>
            <td id=Logintd><a id=Logina>Benutzername:</a>     <div class="dropdown1"><a id=Logina class=dropdown1>?</a>
            <div class="dropdown1-content">
              <a id=Loginb>Die Benutzernamen sind schon vorgegeben!<br>Bsp: Maximilian Mustermann = Mustermann.Max </a>
            </div>
            </div></td>
          </tr>
          <tr>
            <td id=Logintd><input id=Logintext type="text" name="benutzername" autofocus required></td>
          </tr>
          <tr>
            <td id=Logintd><a id=Logina>Passwort:</a></td>
          </tr>
          <tr>
            <td id=Logintd><input id=Logintext type="password" name="pw" required></td>
          </tr>
          <tr>
            <td id=Logintd><input id=Loginsubmit type="submit" name="sub" value="Login"> </td>
          </tr>
          <tr>
            <td id=Logintd1><a id=Logina1>Noch nicht registriert?</a><a id=Logina1 href="Register.php">   Hier entlang</a></td>
          </tr>
          <tr>
            <td id=Logintd1><a id=Logina1>Wollen sie zurück zur Startseite?</a><a id=Logina1 href="Index.php">   Hier entlang</a></td>
          </tr>
            <tr>
              <td id=Logintd1>

    <?php
    if (isset($_POST["sub"])){
      $result =  $login->login($_POST["benutzername"], $_POST["pw"]);
      if ($result == 1) {
        $result1 = $login->selectBenutzername($_POST["benutzername"]);
      $_SESSION["Benutzername"] = $result1;
      $result1 = $user->selectKlasse($_SESSION["Benutzername"]);
      $_SESSION["BenutzerKlasse"] = $result1;

      $result2 = $user->selectStatus($_SESSION["Benutzername"]);
      $_SESSION["BenutzerStatus"] = $result2;
      header("Location: Index.php");
      }else{
        echo"<a id=LoginRegisterERROR>Es gab ein Fehler beim anmelden</a>";
      }
    }

  ?>
          </td>
        </tr>
      </table>
     </form>
    </div>
  </body>
</html>
