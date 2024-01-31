<?php
error_reporting(false);
session_start();

require "include/class_Chat.php";
require "include/class_User.php";
require 'include/class_Load.php';

$load = new class_Load();
$chat = new class_Chat();
$user = new class_User();

$_SESSION["SeitenName"] = "Profil.php";

if (!isset($_SESSION["Benutzername"])) {
  header("Location: Login.php");
}else {
  $result1 = $user->selectKlasse($_SESSION["Benutzername"]);
  $_SESSION["BenutzerKlasse"] = $result1;
  $result2 = $user->selectProfilBild($_SESSION["Benutzername"]);
  $_SESSION["ProfilBild"] = $result2;
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
    <form action="Index.php" method="post">
      <input type="submit" name="back" value="Zurück" id=ProfilBackButton3>
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
              header("Location: Profil.php");
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
    <div id=ProfilMain1>
      <div id=ProfilMain13>
        <h1 id=ProfilMain13>Profil</h1>
        <img src="Bilder/ProfilBilder/<?php echo $_SESSION["ProfilBild"]; ?>" id=ProfilMain13ProfilBild>
      </div>
      <div id=ProfilMain12>
        <h1 id=ProfilMain121>Einstellungen</h1>
        <div id=profilMain12option1>
          <a id="profilbildbearbeitena">Profilbild bearbeiten:</a>
          <form method="post" action="" enctype="multipart/form-data">
            <input id="ProfilBildaendernfile" type="file" name="bild" value="">
            <input id="ProfilBildaendernUpload" type="submit" name="upload" value="Upload">
          </form>
          <?php
            if(isset($_POST['upload'])){
              $bildname = $_FILES['bild']['name'];
              $bildtmp = $_FILES['bild']['tmp_name'];
              $bildtyp = $_FILES['bild']['type'];
              $bildsize = $_FILES['bild']['size'];
              $max_size = 500*1024;
              $max_hoehe = 257;
              $max_breite = 193;
              $png = "image/png";
              $jpeg = "image/jpeg";
              $size = getimagesize($bildtmp);
              $breite = $size['0'];
              $hoehe = $size['1'];

              if($bildtyp == $jpeg || $bildtyp == $png){
                if($bildsize < $max_size){
                  if($hoehe < $max_hoehe && $breite < $max_breite){
                    $bildname = $_SESSION["Benutzername"].'.png';

                    if($bildname != '' && $bildtmp != ''){
                      $pfad = "Bilder/ProfilBilder/".$bildname;
                      move_uploaded_file($bildtmp, $pfad);

                      $result = $user->UpdateProfilbild($_SESSION["Benutzername"], $bildname);
                      if($result == 1 ){
                        echo"<a id=>Das Profilbild wurde erfolgreich geändert.</a>";
                      }else{
                        echo"<a id=>Es gab ein Fehler beim ändern des Profilbild, bitte erneut versuchen.</a>";
                      }
                    }
                  }else {
                    echo"<a id=>Das Bild ist zu Groß, das Bild darf Maximal 192x256 Pixel Groß sein!</a>";
                  }
                }else {
                  echo"<a id=>Die Dateigröße ist zu groß!</a>";
                }
              }else {
                echo"<a id=>Die Datei hat die falsche Endung, es sind nur JPEG oder PNG erlaubt!</a>";
              }
            }

          ?>
        </div>
      </div>
    </div>
  </body>
</html>
