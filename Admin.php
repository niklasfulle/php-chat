<?php
error_reporting(false);
session_start();

require "include/class_Chat.php";
require "include/class_User.php";
require 'include/class_Load.php';
require 'include/class_Nachrichtencheck.php';

$load = new class_Load();
$chat = new class_Chat();
$user = new class_User();
$check = new class_Nachrichtencheck();

$_SESSION["SeitenName"] = "Admin.php";

if (!isset($_SESSION["Benutzername"])) {
  header("Location: Login.php");
}else {
  $result1 = $user->selectKlasse($_SESSION["Benutzername"]);
  $_SESSION["BenutzerKlasse"] = $result1;
}
if ($_SESSION["BenutzerKlasse"] != "2") {
  header("Location: Index.php");
}
?>
<html>
<head>
  <?php
  $Version = $load->head();
  echo"$Version";
  ?>
</head>
  <body onload="loadUserliste(), showTest(), loadTest(), showUserliste(), loadUserlisteFunktion(), showUserlisteFunktion(), loadFilterliste(), showFilterliste(), loadSmileliste(), showSmileliste(), showChatStatistiken(), loadChatStatistiken()">
    <script type="text/javascript">
    $(document).ready(function () {
            if (!$.browser.webkit) {
                $('.wrapper').html('<p>Sorry! Non webkit users. :(</p>');
            }
        });
    </script>
    <form method="post">
      <input type="submit" name="back" value="Zurück" id=ProfilBackButton1>
      <?php
        if ($_POST["back"]) {
          unset($_SESSION["AdminSeite1"]);
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
              header("Location: Admin.php");
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
    <div id=AdminMain>
      <h1 id=ProfilMain12>Admin</h1>
      <div id=AdminMain1>
        <div id=AdminSeite>
          <form  method="post">
            <?php

              if ($_SESSION["AdminSeite1"] == "1") {
                ?>
                  <input id="AdminSeite12" type="submit" name="Seite1" value="Seite 1">
                <?php
              }else {
                ?>
                  <input id="AdminSeite1" type="submit" name="Seite1" value="Seite 1">
                <?php
              }

              if ($_SESSION["AdminSeite1"] == "2") {
                ?>
                  <input id="AdminSeite22" type="submit" name="Seite2" value="Seite 2">
                <?php
              }else {
                ?>
                  <input id="AdminSeite2" type="submit" name="Seite2" value="Seite 2">
                <?php
              }

              if ($_SESSION["AdminSeite1"] == "3") {
                ?>
                  <input id="AdminSeite32" type="submit" name="Seite3" value="Seite 3">
                <?php
              }else {
                ?>
                  <input id="AdminSeite3" type="submit" name="Seite3" value="Seite 3">
                <?php
              }

              if ($_SESSION["AdminSeite1"] == "4") {
                ?>
                  <input id="AdminSeite42" type="submit" name="Seite4" value="Seite 4">
                <?php
              }else {
                ?>
                  <input id="AdminSeite4" type="submit" name="Seite4" value="Seite 4">
                <?php
              }

              if ($_SESSION["AdminSeite1"] == "5") {
                ?>
                  <input id="AdminSeite52" type="submit" name="Seite5" value="Seite 5">
                <?php
              }else {
                ?>
                  <input id="AdminSeite5" type="submit" name="Seite5" value="Seite 5">
                <?php
              }

              if ($_SESSION["AdminSeite1"] == "6") {
                ?>
                  <input id="AdminSeite62" type="submit" name="Seite6" value="Seite 6">
                <?php
              }else {
                ?>
                  <input id="AdminSeite6" type="submit" name="Seite6" value="Seite 6">
                <?php
              }
              ?>
                <div id=test></div>
              <?php
              
              if (isset($_POST["Seite1"])) {
                $_SESSION["AdminSeite1"] = 1;
                header("Location: Admin.php");
              }
              if (isset($_POST["Seite2"])) {
                $_SESSION["AdminSeite1"] = 2;
                header("Location: Admin.php");
              }
              if (isset($_POST["Seite3"])) {
                $_SESSION["AdminSeite1"] = 3;
                header("Location: Admin.php");
              }
              if (isset($_POST["Seite4"])) {
                $_SESSION["AdminSeite1"] = 4;
                header("Location: Admin.php");
              }
              if (isset($_POST["Seite5"])) {
                $_SESSION["AdminSeite1"] = 5;
                header("Location: Admin.php");
              }
              if (isset($_POST["Seite6"])) {
                $_SESSION["AdminSeite1"] = 6;
                header("Location: Admin.php");
              }

              if ($_SESSION["AdminSeite1"] == "1") {
                ?>
                <div id=AdminMainFrame>
                  <div id=AdminMainFrameleft>
                    <div id=AdminMainFrameleftfunc>
                      <h1 id=AdminMainFrameleftfunch1>User Liste</h1>
                      <div id=AdminMainFramerightfunction>

                        <div id=AdminMainFrameleftfunctionUserliste class="style-3">

                        </div>
                      </div>
                    </div>
                  </div>
                  <div id=AdminMainFrameright>
                    <div id=AdminMainFramerightfunc>
                      <h1 id=AdminMainFramerightfunch1>User</h1>
                      <div id=AdminMainFramerightfunction>
                          <div id=AdminMainFrameleftfunctionchatUser class="style-3">


                          </div>

                          <div id=AdminMainFrameleftfunctionchatFunktionen>
                            <div id=User1>
                              <form method="post">
                                <input id="Filterhinzufügen" type="text" name="Userhinzufügen" value="">
                                <input id="Filterhinzufügen1" type="submit" name="Userhinzufügensubmit" value="User hinzufügen">
                              </form>
                              <?php
                              if (isset($_POST["Userhinzufügensubmit"])) {
                                if ($_POST["Userhinzufügen"] != "") {
                                  if (!empty($_POST["Userhinzufügen"])) {
                                    if (substr($_POST["Userhinzufügen"],0,1) == ' ') {
                                      ?>
                                        <div id=>
                                          <a id=AdminFilterERRORa>Bitte einene neuen User eingeben der hinzugefügt werden soll!</a>
                                        </div>
                                      <?php
                                    }else {
                                      $result = $user->Userhinzufügen($_POST["Userhinzufügen"]);
                                      if ($result == "1") {
                                        ?>
                                          <div id=>
                                            <a id=AdminFilterERRORa>Der User "<?php echo$_POST["Userhinzufügen"]; ?>" wurde erfolgreich hinzugefügt!</a>
                                          </div>
                                        <?php
                                      }elseif ($result == "2") {
                                        ?>
                                          <div id=>
                                            <a id=AdminFilterERRORa>Es gab ein Fehler beim hinzufügen des Users!</a>
                                          </div>
                                        <?php
                                      }elseif ($result == "3") {
                                        ?>
                                          <div id=>
                                            <a id=AdminFilterERRORa>Der User "<?php echo$_POST["Userhinzufügen"]; ?>" ist schon vorhanden!</a>
                                          </div>
                                        <?php
                                      }
                                    }
                                  }else {
                                    ?>
                                      <div id=>
                                        <a id=AdminFilterERRORa>Bitte einene neuen User eingeben der hinzugefügt werden soll!</a>
                                      </div>
                                    <?php
                                  }
                                }else {
                                  ?>
                                    <div id=>
                                      <a id=AdminFilterERRORa>Bitte einene neuen User eingeben der hinzugefügt werden soll!</a>
                                    </div>
                                  <?php
                                }
                              }
                              ?>
                            </div>
                            <div id=User2>
                              <form method="post">
                                <select id="Filterlöschen" name="Filterlöschen1">
                                  <option id="Filterdeaktivieren" value="None">----------------------------------</option>
                                  <?php
                                   $result = $user->SelectUser();
                                   while ($row = $result->fetch_assoc()) {
                                     ?>
                                      <option id="Filterlöschen" value="<?php echo $row["BenutzerName"]; ?>"><?php echo $row["BenutzerName"]; ?></option>
                                     <?php
                                   }
                                  ?>
                                </select>
                                <input id="Filterlöschen" type="submit" name="Userlöschen" value="User löschen">
                              </form>
                              <?php
                              if (isset($_POST["Filterlöschen1"])) {
                                if ($_POST["Filterlöschen1"] != "None") {
                                  $result = $user->Userlöschen($_POST["Filterlöschen1"]);
                                  if ($result) {
                                    ?>
                                      <div id=>
                                        <a id=AdminFilterERRORa>Der User wurde erfolgreich gelöscht!</a>
                                      </div>
                                    <?php
                                  }else {
                                    ?>
                                      <div id=>
                                        <a id=AdminFilterERRORa>Es gab ein Fehler beim löschen des Users!</a>
                                      </div>
                                    <?php
                                  }
                                }else {
                                  ?>
                                    <div id=>
                                      <a id=AdminFilterERRORa>Bitte wählen Sie einen Users aus!</a>
                                    </div>
                                  <?php
                                }
                              }
                              ?>
                            </div>
                            <div id=User3>
                              <form method="post">
                                <select id="Filterdeaktivieren" name="Username1">
                                  <option id="Filterdeaktivieren" value="None">----------------------------------</option>
                                  <?php
                                   $result = $user->SelectUserMain();
                                   while ($row = $result->fetch_assoc()) {
                                     ?>
                                      <option id="Filterdeaktivieren" value="<?php echo $row["BenutzerName"]; ?>"><?php echo $row["BenutzerName"]; ?></option>
                                     <?php
                                   }
                                  ?>
                                </select>
                                <input id="Filterdeaktivieren" type="submit" name="Bannen" value="User Bannen">
                                <input id="Filteraktivieren" type="submit" name="Username" value="User Entbannen">
                              </form>
                              <?php
                              if (isset($_POST["Bannen"])) {
                                if ($_POST["Username1"] != "None") {
                                  $result = $user->Userbannen($_POST["Username1"]);
                                  if ($result) {
                                    ?>
                                      <div id=>
                                        <a id=AdminFilterERRORa>Der User "<?php echo $_POST["Username1"]; ?>" wurde erfolgreich gebannt!</a>
                                      </div>
                                    <?php
                                  }else {
                                    ?>
                                      <div id=>
                                        <a id=AdminFilterERRORa>Es gab ein Fehler beim bannen des Users "<?php echo $_POST["Username1"]; ?>"!</a>
                                      </div>
                                    <?php
                                  }
                                }else {
                                  ?>
                                    <div id=>
                                      <a id=AdminFilterERRORa>Bitte wählen Sie einen User aus!</a>
                                    </div>
                                  <?php
                                }
                              }
                              if (isset($_POST["Username"])) {
                                if ($_POST["Username1"] != "None") {
                                  $result = $user->Userentbannen($_POST["Username1"]);
                                  if ($result) {
                                    ?>
                                      <div id=>
                                        <a id=AdminFilterERRORa>Der User "<?php echo $_POST["Username1"]; ?>" wurde erfolgreich entbannt!</a>
                                      </div>
                                    <?php
                                  }else {
                                    ?>
                                      <div id=>
                                        <a id=AdminFilterERRORa>Es gab ein Fehler beim entbannen des Users "<?php echo $_POST["Username1"]; ?>"!</a>
                                      </div>
                                    <?php
                                  }
                                }else {
                                  ?>
                                    <div id=>
                                      <a id=AdminFilterERRORa>Bitte wählen Sie einen User aus!</a>
                                    </div>
                                  <?php
                                }
                              }
                              ?>
                            </div>
                            <div id=User4>
                              <form method="post">
                                <select id="Filterdeaktivieren" name="Username2">
                                  <option id="Filterdeaktivieren" value="None">----------------------------------</option>
                                  <?php
                                   $result = $user->SelectUserMain();
                                   while ($row = $result->fetch_assoc()) {
                                     ?>
                                      <option id="Filterdeaktivieren" value="<?php echo $row["BenutzerName"]; ?>"><?php echo $row["BenutzerName"]; ?></option>
                                     <?php
                                   }
                                  ?>
                                </select>
                                <input id="Filterdeaktivieren" type="submit" name="Admin" value="Admin">
                                <input id="Filteraktivieren" type="submit" name="User" value="User">
                              </form>
                              <?php
                              if (isset($_POST["Admin"])) {
                                if ($_POST["Username2"] != "None") {
                                  $result = $user->UserzumAdmin($_POST["Username2"]);
                                  if ($result) {
                                    ?>
                                      <div id=>
                                        <a id=AdminFilterERRORa>Der User "<?php echo $_POST["Username2"]; ?>" wurde vom User zum Admin!</a>
                                      </div>
                                    <?php
                                  }else {
                                    ?>
                                      <div id=>
                                        <a id=AdminFilterERRORa>Es gab ein Fehler beim ändern der Klasse des Users "<?php echo $_POST["Username2"]; ?>"!</a>
                                      </div>
                                    <?php
                                  }
                                }else {
                                  ?>
                                    <div id=>
                                      <a id=AdminFilterERRORa>Bitte wählen Sie einen User aus!</a>
                                    </div>
                                  <?php
                                }
                              }
                              if (isset($_POST["User"])) {
                                if ($_POST["Username2"] != "None") {
                                  $result = $user->UserzumUser($_POST["Username2"]);
                                  if ($result) {
                                    ?>
                                      <div id=>
                                        <a id=AdminFilterERRORa>Der User "<?php echo $_POST["Username2"]; ?>" wurde vom Admin zum User!</a>
                                      </div>
                                    <?php
                                  }else {
                                    ?>
                                      <div id=>
                                        <a id=AdminFilterERRORa>Es gab ein Fehler beim ändern der Klasse des Users "<?php echo $_POST["Username2"]; ?>"!</a>
                                      </div>
                                    <?php
                                  }
                                }else {
                                  ?>
                                    <div id=>
                                      <a id=AdminFilterERRORa>Bitte wählen Sie einen User aus!</a>
                                    </div>
                                  <?php
                                }
                              }
                              ?>
                            </div>
                            <div id=User5>
                              <form method="post">
                                <select id="Filterlöschen1" name="Warnungenvon">
                                  <option id="Filterdeaktivieren" value="None">----------------------------------</option>
                                  <?php
                                   $result = $user->SelectUserMain();
                                   while ($row = $result->fetch_assoc()) {
                                     ?>
                                      <option id="Filterlöschen" value="<?php echo $row["BenutzerName"]; ?>"><?php echo $row["BenutzerName"]; ?></option>
                                     <?php
                                   }
                                  ?>
                                </select>
                                <input id="Filterlöschen1" type="submit" name="Warnungenlöschen" value="Warnungen zurücksetzten">
                              </form>
                              <?php
                              if (isset($_POST["Warnungenlöschen"])) {
                                if ($_POST["Warnungenvon"] != "None") {
                                  $result = $user->Warnungenzurücksetzten($_POST["Warnungenvon"]);
                                  if ($result) {
                                    ?>
                                      <div id=>
                                        <a id=AdminFilterERRORa>Die Warnungen von dem User "<?php echo $_POST["Warnungenvon"]; ?>" wurden auf "0" gesetzt!</a>
                                      </div>
                                    <?php
                                  }else {
                                    ?>
                                      <div id=>
                                        <a id=AdminFilterERRORa>Es gab ein Fehler beim zurücksetzten der Warnungen von dem User "<?php echo $_POST["Warnungenvon"]; ?>"!</a>
                                      </div>
                                    <?php
                                  }
                                }else {
                                  ?>
                                    <div id=>
                                      <a id=AdminFilterERRORa>Bitte wählen Sie einen Users aus!</a>
                                    </div>
                                  <?php
                                }
                              }
                              ?>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <?php
              }elseif ($_SESSION["AdminSeite1"] == "2") {
                ?>
                <div id=AdminMainFrame>
                  <div id=AdminMainFrameleft>
                    <div id=AdminMainFrameleftfunc>
                      <h1 id=AdminMainFramerightfunch1>Smiles</h1>
                      <div id=AdminMainFramerightfunction>
                        <div id=AdminMainFramerightfunctionchatSmile>
                          <div id=Smileauflistung class="style-3">

                          </div>
                        </div>
                        <div id=AdminMainFramerightfunctionSmileFunktionen>
                          <div id=Smilehinzufügen>
                            <form method="post" enctype="multipart/form-data">
                              <input type="text" id="SmileName" name="SmileName" value="" >
                              <input type="file" name="userfile" id="file1" class="inputfile1" value="">
                              <label for="file1">Choose a file</label>
                              <input id="Filterhochladen" type="submit" name="Smilehinzufügen" value="Filter hochladen">
                            </form>
                            <?php
                              if (isset($_POST["Smilehinzufügen"])) {
                                $bildname = $_FILES['userfile']['name'];
                                $bildtmp = $_FILES['userfile']['tmp_name'];
                                $bildtyp = $_FILES['userfile']['type'];
                                $bildsize = $_FILES['userfile']['size'];
                                $max_size = 500*1024;
                                $max_hoehe = 121;
                                $max_breite = 121;
                                $png = "image/png";
                                $size = getimagesize($bildtmp);
                                $breite = $size['0'];
                                $hoehe = $size['1'];

                                if($bildtyp == $png){
                                  if($bildsize < $max_size){
                                    if($hoehe < $max_hoehe && $breite < $max_breite){
                                      if($bildname != '' && $bildtmp != ''){
                                        $pfad = "Bilder/Smile/".$bildname;
                                        move_uploaded_file($bildtmp, $pfad);

                                        $SmileCode = "</a><div id=Admin class=dropdown7><img id=Smile src=Bilder/Smile/$bildname></img><div class=dropdown7-content><p id=Admin>$_POST[SmileName]</p></div></div><a id=chatNachricht>";
                                        $SmileCode1 = "</a><img id=Smile1 src=Bilder/Smile/$bildname></img><a id=chatNachricht>";
                                        $result = $check->Smilehinzufügen($_POST["SmileName"], $SmileCode, $SmileCode1);

                                        if ($result == "1") {
                                          ?>
                                            <div id=AdminFilterERRORdiv2>
                                              <a id=AdminFilterERRORa>Der Smile wurde erfolgreich hinzugefügt.</a>
                                            </div>
                                          <?php
                                        }else {
                                          ?>
                                            <div id=AdminFilterERRORdiv2>
                                              <a id=AdminFilterERRORa>ERROR! Es ist ein Fehler passiert beim hinzufügen des Smiles.</a>
                                            </div>
                                          <?php
                                        }
                                      }else {
                                        ?>
                                          <div id=AdminFilterERRORdiv2>
                                            <a id=AdminFilterERRORa>ERROR! Das Bild ist zu groß! Es darf Maximal 120*120 Pixel haben.</a>
                                          </div>
                                        <?php
                                      }
                                    }else {
                                      ?>
                                        <div id=AdminFilterERRORdiv2>
                                          <a id=AdminFilterERRORa>ERROR! Das Bild ist zu groß! Es darf Maximal 120*120 Pixel haben.</a>
                                        </div>
                                      <?php
                                    }
                                  }else {
                                    ?>
                                      <div id=AdminFilterERRORdiv2>
                                        <a id=AdminFilterERRORa>ERROR! Die Dateigröße ist zu groß!</a>
                                      </div>
                                    <?php
                                  }
                                }else {
                                  ?>
                                    <div id=AdminFilterERRORdiv2>
                                      <a id=AdminFilterERRORa>ERROR! Bitte eine Bild vom Typ PNG auswählen!</a>
                                    </div>
                                  <?php
                                }
                              }
                            ?>
                          </div>
                          <div id=Smiledeaktivieren>
                            <form method="post">
                              <select id="Smiledeaktivieren" name="Smiledeaktivieren">
                                <option id="Smiledeaktivieren" value="None">---------------</option>
                                <?php
                                 $result = $check->SelectSmileMain();
                                 while ($row = $result->fetch_assoc()) {
                                   ?>
                                    <option id="Smiledeaktivieren" value="<?php echo $row["SmileCode"]; ?>"><?php echo $row["SmileCode"]; ?></option>
                                   <?php
                                 }
                                ?>
                              </select>
                              <input id="Smiledeaktivieren" type="submit" name="Smiledeaktivieren1" value="Smile deaktivieren">
                              <input id="Smileaktivieren" type="submit" name="Smileaktivieren" value="Smile aktivieren">
                            </form>
                            <?php
                            if (isset($_POST["Smiledeaktivieren1"])) {
                              if ($_POST["Smiledeaktivieren"] != "None") {
                                $result = $check->Smiledeaktivieren($_POST["Smiledeaktivieren"]);
                                if ($result) {
                                  ?>
                                    <div id=>
                                      <a id=AdminFilterERRORa>Der Smile "<?php echo $_POST["Smiledeaktivieren"]; ?>" wurde erfolgreich deaktiviert!</a>
                                    </div>
                                  <?php
                                }else {
                                  ?>
                                    <div id=>
                                      <a id=AdminFilterERRORa>Es gab ein Fehler beim deaktivieren des Smiles "<?php echo $_POST["Smiledeaktivieren"]; ?>"!</a>
                                    </div>
                                  <?php
                                }
                              }else {
                                ?>
                                  <div id=>
                                    <a id=AdminFilterERRORa>Bitte wählen Sie einen Smile aus!</a>
                                  </div>
                                <?php
                              }
                            }
                            if (isset($_POST["Smileaktivieren"])) {
                              if ($_POST["Smiledeaktivieren"] != "None") {
                                $result = $check->Smileaktivieren($_POST["Smiledeaktivieren"]);
                                if ($result) {
                                  ?>
                                    <div id=>
                                      <a id=AdminFilterERRORa>Der Smile "<?php echo $_POST["Smiledeaktivieren"]; ?>" wurde erfolgreich aktiviert!</a>
                                    </div>
                                  <?php
                                }else {
                                  ?>
                                    <div id=>
                                      <a id=AdminFilterERRORa>Es gab ein Fehler beim aktivieren des Smiles "<?php echo $_POST["Smiledeaktivieren"]; ?>"!</a>
                                    </div>
                                  <?php
                                }
                              }else {
                                ?>
                                  <div id=>
                                    <a id=AdminFilterERRORa>Bitte wählen Sie einen Smile aus!</a>
                                  </div>
                                <?php
                              }
                            }
                            ?>
                          </div>
                          <div id=Smilelöschen>
                            <form method="post">
                              <select id="Smilelöschen" name="Smilelöschen">
                                <option id="Smiledeaktivieren" value="None">---------------</option>
                                <?php
                                 $result = $check->SelectSmileMain();
                                 while ($row = $result->fetch_assoc()) {
                                   ?>
                                    <option id="Smilelöschen" value="<?php echo $row["SmileCode"]; ?>"><?php echo $row["SmileCode"]; ?></option>
                                   <?php
                                 }
                                ?>
                              </select>
                              <input id="Smilelöschen" type="submit" name="Smilelöschen1" value="Smile löschen">
                            </form>
                            <?php
                            if (isset($_POST["Smilelöschen"])) {
                              if ($_POST["Smilelöschen"] != "None") {
                                $result = $check->Smilelöschen($_POST["Smilelöschen"]);
                                if ($result) {
                                  ?>
                                    <div id=>
                                      <a id=AdminFilterERRORa>Der Filter wurde erfolgreich gelöscht!</a>
                                    </div>
                                  <?php
                                }else {
                                  ?>
                                    <div id=>
                                      <a id=AdminFilterERRORa>Es gab ein Fehler beim löschen des Filters!</a>
                                    </div>
                                  <?php
                                }
                              }else {
                                ?>
                                  <div id=>
                                    <a id=AdminFilterERRORa>Bitte wählen Sie einen Filter aus!</a>
                                  </div>
                                <?php
                              }
                            }
                            ?>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div id=AdminMainFrameright>
                    <div id=AdminMainFramerightfunc>
                      <h1 id=AdminMainFramerightfunch1>Filter</h1>
                      <div id=AdminMainFramerightfunction>
                        <div id=Filterauflistung>
                          <div id=Filterauflistung1 class="style-3">

                          </div>
                        </div>
                        <div id=Filterhinzufügen>
                          <form method="post">
                            <input id="Filterhinzufügen" type="text" name="Filter" value="">
                            <input id="Filterhinzufügen1" type="submit" name="submitFilter" value="Filter hinzufügen">
                          </form>
                          <?php
                            if (isset($_POST["submitFilter"])) {
                              if ($_POST["Filter"] != "") {
                                if (!empty($_POST["Filter"])) {
                                  if (substr($_POST["Filter"],0,1) == ' ') {
                                    ?>
                                      <div id=>
                                        <a id=AdminFilterERRORa>Bitte einene Filter eingeben der hinzugefügt werden soll!</a>
                                      </div>
                                    <?php
                                  }else {
                                    $result = $check->Filterhinzufuegen($_POST["Filter"], 1);
                                    if ($result == "1") {
                                      ?>
                                        <div id=>
                                          <a id=AdminFilterERRORa>Der Filter "<?php echo$_POST["Filter"]; ?>" wurde erfolgreich hinzugefügt!</a>
                                        </div>
                                      <?php
                                    }elseif ($result == "2") {
                                      ?>
                                        <div id=>
                                          <a id=AdminFilterERRORa>Es gab ein Fehler beim hinzufügen des Filters!</a>
                                        </div>
                                      <?php
                                    }elseif ($result == "3") {
                                      ?>
                                        <div id=>
                                          <a id=AdminFilterERRORa>Der Filter "<?php echo$_POST["Filter"]; ?>" ist schon vorhanden!</a>
                                        </div>
                                      <?php
                                    }
                                  }
                                }else {
                                  ?>
                                    <div id=>
                                      <a id=AdminFilterERRORa>Bitte einene Filter eingeben der hinzugefügt werden soll!</a>
                                    </div>
                                  <?php
                                }
                              }else {
                                ?>
                                  <div id=>
                                    <a id=AdminFilterERRORa>Bitte einene Filter eingeben der hinzugefügt werden soll!</a>
                                  </div>
                                <?php
                              }
                            }
                          ?>
                        </div>
                        <div id=Filterdeaktivieren>
                          <form method="post">
                            <select id="Filterdeaktivieren" name="Filterdeaktivieren">
                              <option id="Filterdeaktivieren" value="None">----------------------------------</option>
                              <?php
                               $result = $check->SelectFilterMain();
                               while ($row = $result->fetch_assoc()) {
                                 ?>
                                  <option id="Filterdeaktivieren" value="<?php echo $row["FilterWort"]; ?>"><?php echo $row["FilterWort"]; ?></option>
                                 <?php
                               }
                              ?>
                            </select>
                            <input id="Filterdeaktivieren" type="submit" name="Filterdeaktivieren1" value="Filter deaktivieren">
                            <input id="Filteraktivieren" type="submit" name="Filteraktivieren" value="Filter aktivieren">
                          </form>
                          <?php
                          if (isset($_POST["Filterdeaktivieren1"])) {
                            if ($_POST["Filterdeaktivieren"] != "None") {
                              $result = $check->Filterdeaktivieren($_POST["Filterdeaktivieren"]);
                              if ($result) {
                                ?>
                                  <div id=>
                                    <a id=AdminFilterERRORa>Der Filter "<?php echo $_POST["Filterdeaktivieren"]; ?>" wurde erfolgreich deaktiviert!</a>
                                  </div>
                                <?php
                              }else {
                                ?>
                                  <div id=>
                                    <a id=AdminFilterERRORa>Es gab ein Fehler beim deaktivieren des Filters "<?php echo $_POST["Filterdeaktivieren"]; ?>"!</a>
                                  </div>
                                <?php
                              }
                            }else {
                              ?>
                                <div id=>
                                  <a id=AdminFilterERRORa>Bitte wählen Sie einen Filter aus!</a>
                                </div>
                              <?php
                            }
                          }
                          if (isset($_POST["Filteraktivieren"])) {
                            if ($_POST["Filterdeaktivieren"] != "None") {
                              $result = $check->Filteraktivieren($_POST["Filterdeaktivieren"]);
                              if ($result) {
                                ?>
                                  <div id=>
                                    <a id=AdminFilterERRORa>Der Filter "<?php echo $_POST["Filterdeaktivieren"]; ?>" wurde erfolgreich aktiviert!</a>
                                  </div>
                                <?php
                              }else {
                                ?>
                                  <div id=>
                                    <a id=AdminFilterERRORa>Es gab ein Fehler beim aktivieren des Filters "<?php echo $_POST["Filterdeaktivieren"]; ?>"!</a>
                                  </div>
                                <?php
                              }
                            }else {
                              ?>
                                <div id=>
                                  <a id=AdminFilterERRORa>Bitte wählen Sie einen Filter aus!</a>
                                </div>
                              <?php
                            }
                          }
                          ?>
                        </div>
                        <div id=Filterlöschen>
                          <form method="post">
                            <select id="Filterlöschen" name="Filterlöschen">
                              <option id="Filterdeaktivieren" value="None">----------------------------------</option>
                              <?php
                               $result = $check->SelectFilterMain();
                               while ($row = $result->fetch_assoc()) {
                                 ?>
                                  <option id="Filterlöschen" value="<?php echo $row["FilterWort"]; ?>"><?php echo $row["FilterWort"]; ?></option>
                                 <?php
                               }
                              ?>
                            </select>
                            <input id="Filterlöschen" type="submit" name="Filterlöschen1" value="Filter löschen">
                          </form>
                          <?php
                          if (isset($_POST["Filterlöschen1"])) {
                            if ($_POST["Filterlöschen"] != "None") {
                              $result = $check->Filterlöschen($_POST["Filterlöschen"]);
                              if ($result) {
                                ?>
                                  <div id=>
                                    <a id=AdminFilterERRORa>Der Filter wurde erfolgreich gelöscht!</a>
                                  </div>
                                <?php
                              }else {
                                ?>
                                  <div id=>
                                    <a id=AdminFilterERRORa>Es gab ein Fehler beim löschen des Filters!</a>
                                  </div>
                                <?php
                              }
                            }else {
                              ?>
                                <div id=>
                                  <a id=AdminFilterERRORa>Bitte wählen Sie einen Filter aus!</a>
                                </div>
                              <?php
                            }
                          }
                          ?>
                        </div>
                        <div id=Filterhochladen>
                          <form method="post">
                            <input type="file" name="userfile" id="file" class="inputfile" />
                            <label for="file">Choose a file</label>
                            <input id="Filterhochladen" type="submit" name="Filterhochladen1" value="Filter hochladen">
                          </form>
                          <?php
                          if (isset($_POST["Filterhochladen1"])) {

                          }
                          ?>
                        </div>

                      </div>
                    </div>
                  </div>
                </div>
                <?php
              }elseif ($_SESSION["AdminSeite1"] == "3") {
                ?>
                <div id=AdminMainFrame>
                  <div id=AdminMainFrameleft>
                    <div id=AdminMainFrameleftfunc>
                      <h1 id=AdminMainFrameleftfunch1>Chat</h1>
                      <div id=AdminMainFrameleftfunction>
                        <div id=AdminMainFrameleftfunctionchatStatistiken>


                        </div>

                        <div id=AdminMainFrameleftfunctionchatFunktionen>
                          <div id=chatlöschen>
                            <form method="post">
                              <input id=inputChatlöschen type="submit" name="Chatlöschen" value="Chat Löschen">
                            </form>
                            <?php
                              if (isset($_POST["Chatlöschen"])) {
                                $result = $check->Chatlöschen();

                                if ($result == "1") {
                                  ?>
                                    <div id=>
                                      <a id=AdminFilterERRORa>Der Chat wurde gelöscht!</a>
                                    </div>
                                  <?php
                                }else {
                                  ?>
                                    <div id=>
                                      <a id=AdminFilterERRORa>Es gab ein Fehler beim löschen des Chats</a>
                                    </div>
                                  <?php
                                }
                              }
                            ?>
                          </div>
                          <div id=privatchatlöschen>
                            <form method="post">
                              <input id=inputPrivatchatlöschen type="submit" name="PrivatChatlöschen" value="Privatchat Löschen">
                            </form>
                            <?php
                              if (isset($_POST["PrivatChatlöschen"])) {
                                $result = $check->PrivatChatlöschen();

                                if ($result == "1") {
                                  ?>
                                    <div id=>
                                      <a id=AdminFilterERRORa>Der Privatchat wurde gelöscht!</a>
                                    </div>
                                  <?php
                                }else {
                                  ?>
                                    <div id=>
                                      <a id=AdminFilterERRORa>Es gab ein Fehler beim löschen des Privatchats</a>
                                    </div>
                                  <?php
                                }
                              }
                            ?>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div id=AdminMainFrameright>
                    <div id=AdminMainFramerightfunc>
                      <h1 id=AdminMainFramerightfunch1>Spiele</h1>
                      <div id=AdminMainFramerightfunction>
                          <div id=AdminMainFrameleftfunctionchatSpiele>


                          </div>

                          <div id=AdminMainFrameleftfunctionchatFunktionen>
                            <div id=chatlöschen>

                            </div>
                            <div id=privatchatlöschen>

                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <?php
              }elseif ($_SESSION["AdminSeite1"] == "4") {
                ?>
                <div id=AdminMainFrame>
                  <div id=AdminMainFrameleft>
                    <div id=AdminMainFrameleftfunc>
                      <h1 id=AdminMainFrameleftfunch1>_</h1>
                      <div id=AdminMainFrameleftfunction>

                      </div>
                    </div>
                  </div>
                  <div id=AdminMainFrameright>
                    <div id=AdminMainFramerightfunc>
                      <h1 id=AdminMainFramerightfunch1>_</h1>
                        <div id=AdminMainFramerightfunction>

                        </div>
                    </div>
                  </div>
                </div>
                <?php
              }elseif ($_SESSION["AdminSeite1"] == "5") {
                ?>
                <div id=AdminMainFrame>
                  <div id=AdminMainFrameleft>
                    <div id=AdminMainFrameleftfunc>
                      <h1 id=AdminMainFrameleftfunch1>_</h1>
                      <div id=AdminMainFrameleftfunction>

                      </div>
                    </div>
                  </div>
                  <div id=AdminMainFrameright>
                    <div id=AdminMainFramerightfunc>
                      <h1 id=AdminMainFramerightfunch1>_</h1>
                        <div id=AdminMainFramerightfunction>

                        </div>
                    </div>
                  </div>
                </div>
                <?php
              }elseif ($_SESSION["AdminSeite1"] == "6") {
                ?>
                <div id=AdminMainFrame>
                  <div id=AdminMainFrame1>
                    <div id=AdminMainFrame1func>
                      <h1 id=AdminMainFrame1funch1>Bugreports</h1>
                      <div id=AdminMainFrame1function>

                      </div>
                    </div>
                  </div>
                </div>
                <?php
              }else {
                ?>
                <div id=AdminMainFrame>
                  <div id=AdminMainFrameleft>
                    <div id=AdminMainFrameleftfunc>
                      <h1 id=AdminMainFrameleftfunch1>User Liste</h1>
                      <div id=AdminMainFramerightfunction>

                        <div id=AdminMainFrameleftfunctionUserliste class="style-3">

                        </div>
                      </div>
                    </div>
                  </div>
                  <div id=AdminMainFrameright>
                    <div id=AdminMainFramerightfunc>
                      <h1 id=AdminMainFramerightfunch1>User</h1>
                      <div id=AdminMainFramerightfunction>
                          <div id=AdminMainFrameleftfunctionchatUser class="style-3">


                          </div>

                          <div id=AdminMainFrameleftfunctionchatFunktionen>
                            <div id=User1>
                              <form method="post">
                                <input id="Filterhinzufügen" type="text" name="Userhinzufügen" value="">
                                <input id="Filterhinzufügen1" type="submit" name="Userhinzufügensubmit" value="User hinzufügen">
                              </form>
                              <?php
                              if (isset($_POST["Userhinzufügensubmit"])) {
                                if ($_POST["Userhinzufügen"] != "") {
                                  if (!empty($_POST["Userhinzufügen"])) {
                                    if (substr($_POST["Userhinzufügen"],0,1) == ' ') {
                                      ?>
                                        <div id=>
                                          <a id=AdminFilterERRORa>Bitte einene neuen User eingeben der hinzugefügt werden soll!</a>
                                        </div>
                                      <?php
                                    }else {
                                      $result = $user->Userhinzufügen($_POST["Userhinzufügen"]);
                                      if ($result == "1") {
                                        ?>
                                          <div id=>
                                            <a id=AdminFilterERRORa>Der User "<?php echo$_POST["Userhinzufügen"]; ?>" wurde erfolgreich hinzugefügt!</a>
                                          </div>
                                        <?php
                                      }elseif ($result == "2") {
                                        ?>
                                          <div id=>
                                            <a id=AdminFilterERRORa>Es gab ein Fehler beim hinzufügen des Users!</a>
                                          </div>
                                        <?php
                                      }elseif ($result == "3") {
                                        ?>
                                          <div id=>
                                            <a id=AdminFilterERRORa>Der User "<?php echo$_POST["Userhinzufügen"]; ?>" ist schon vorhanden!</a>
                                          </div>
                                        <?php
                                      }
                                    }
                                  }else {
                                    ?>
                                      <div id=>
                                        <a id=AdminFilterERRORa>Bitte einene neuen User eingeben der hinzugefügt werden soll!</a>
                                      </div>
                                    <?php
                                  }
                                }else {
                                  ?>
                                    <div id=>
                                      <a id=AdminFilterERRORa>Bitte einene neuen User eingeben der hinzugefügt werden soll!</a>
                                    </div>
                                  <?php
                                }
                              }
                              ?>
                            </div>
                            <div id=User2>
                              <form method="post">
                                <select id="Filterlöschen" name="Filterlöschen1">
                                  <option id="Filterdeaktivieren" value="None">----------------------------------</option>
                                  <?php
                                   $result = $user->SelectUser();
                                   while ($row = $result->fetch_assoc()) {
                                     ?>
                                      <option id="Filterlöschen" value="<?php echo $row["BenutzerName"]; ?>"><?php echo $row["BenutzerName"]; ?></option>
                                     <?php
                                   }
                                  ?>
                                </select>
                                <input id="Filterlöschen" type="submit" name="Userlöschen" value="User löschen">
                              </form>
                              <?php
                              if (isset($_POST["Filterlöschen1"])) {
                                if ($_POST["Filterlöschen1"] != "None") {
                                  $result = $user->Userlöschen($_POST["Filterlöschen1"]);
                                  if ($result) {
                                    ?>
                                      <div id=>
                                        <a id=AdminFilterERRORa>Der User wurde erfolgreich gelöscht!</a>
                                      </div>
                                    <?php
                                  }else {
                                    ?>
                                      <div id=>
                                        <a id=AdminFilterERRORa>Es gab ein Fehler beim löschen des Users!</a>
                                      </div>
                                    <?php
                                  }
                                }else {
                                  ?>
                                    <div id=>
                                      <a id=AdminFilterERRORa>Bitte wählen Sie einen Users aus!</a>
                                    </div>
                                  <?php
                                }
                              }
                              ?>
                            </div>
                            <div id=User3>
                              <form method="post">
                                <select id="Filterdeaktivieren" name="Username1">
                                  <option id="Filterdeaktivieren" value="None">----------------------------------</option>
                                  <?php
                                   $result = $user->SelectUserMain();
                                   while ($row = $result->fetch_assoc()) {
                                     ?>
                                      <option id="Filterdeaktivieren" value="<?php echo $row["BenutzerName"]; ?>"><?php echo $row["BenutzerName"]; ?></option>
                                     <?php
                                   }
                                  ?>
                                </select>
                                <input id="Filterdeaktivieren" type="submit" name="Bannen" value="User Bannen">
                                <input id="Filteraktivieren" type="submit" name="Username" value="User Entbannen">
                              </form>
                              <?php
                              if (isset($_POST["Bannen"])) {
                                if ($_POST["Username1"] != "None") {
                                  $result = $user->Userbannen($_POST["Username1"]);
                                  if ($result) {
                                    ?>
                                      <div id=>
                                        <a id=AdminFilterERRORa>Der User "<?php echo $_POST["Username1"]; ?>" wurde erfolgreich gebannt!</a>
                                      </div>
                                    <?php
                                  }else {
                                    ?>
                                      <div id=>
                                        <a id=AdminFilterERRORa>Es gab ein Fehler beim bannen des Users "<?php echo $_POST["Username1"]; ?>"!</a>
                                      </div>
                                    <?php
                                  }
                                }else {
                                  ?>
                                    <div id=>
                                      <a id=AdminFilterERRORa>Bitte wählen Sie einen User aus!</a>
                                    </div>
                                  <?php
                                }
                              }
                              if (isset($_POST["Username"])) {
                                if ($_POST["Username1"] != "None") {
                                  $result = $user->Userentbannen($_POST["Username1"]);
                                  if ($result) {
                                    ?>
                                      <div id=>
                                        <a id=AdminFilterERRORa>Der User "<?php echo $_POST["Username1"]; ?>" wurde erfolgreich entbannt!</a>
                                      </div>
                                    <?php
                                  }else {
                                    ?>
                                      <div id=>
                                        <a id=AdminFilterERRORa>Es gab ein Fehler beim entbannen des Users "<?php echo $_POST["Username1"]; ?>"!</a>
                                      </div>
                                    <?php
                                  }
                                }else {
                                  ?>
                                    <div id=>
                                      <a id=AdminFilterERRORa>Bitte wählen Sie einen User aus!</a>
                                    </div>
                                  <?php
                                }
                              }
                              ?>
                            </div>
                            <div id=User4>
                              <form method="post">
                                <select id="Filterdeaktivieren" name="Username2">
                                  <option id="Filterdeaktivieren" value="None">----------------------------------</option>
                                  <?php
                                   $result = $user->SelectUserMain();
                                   while ($row = $result->fetch_assoc()) {
                                     ?>
                                      <option id="Filterdeaktivieren" value="<?php echo $row["BenutzerName"]; ?>"><?php echo $row["BenutzerName"]; ?></option>
                                     <?php
                                   }
                                  ?>
                                </select>
                                <input id="Filterdeaktivieren" type="submit" name="Admin1" value="Admin">
                                <input id="Filteraktivieren" type="submit" name="User" value="User">
                              </form>
                              <?php
                              if (isset($_POST["Admin1"])) {
                                if ($_POST["Username2"] != "None") {
                                  $result = $user->UserzumAdmin($_POST["Username2"]);
                                  if ($result) {
                                    ?>
                                      <div id=>
                                        <a id=AdminFilterERRORa>Der User "<?php echo $_POST["Username2"]; ?>" wurde vom User zum Admin!</a>
                                      </div>
                                    <?php
                                  }else {
                                    ?>
                                      <div id=>
                                        <a id=AdminFilterERRORa>Es gab ein Fehler beim ändern der Klasse des Users "<?php echo $_POST["Username2"]; ?>"!</a>
                                      </div>
                                    <?php
                                  }
                                }else {
                                  ?>
                                    <div id=>
                                      <a id=AdminFilterERRORa>Bitte wählen Sie einen User aus!</a>
                                    </div>
                                  <?php
                                }
                              }
                              if (isset($_POST["User"])) {
                                if ($_POST["Username2"] != "None") {
                                  $result = $user->UserzumUser($_POST["Username2"]);
                                  if ($result) {
                                    ?>
                                      <div id=>
                                        <a id=AdminFilterERRORa>Der User "<?php echo $_POST["Username2"]; ?>" wurde vom Admin zum User!</a>
                                      </div>
                                    <?php
                                  }else {
                                    ?>
                                      <div id=>
                                        <a id=AdminFilterERRORa>Es gab ein Fehler beim ändern der Klasse des Users "<?php echo $_POST["Username2"]; ?>"!</a>
                                      </div>
                                    <?php
                                  }
                                }else {
                                  ?>
                                    <div id=>
                                      <a id=AdminFilterERRORa>Bitte wählen Sie einen User aus!</a>
                                    </div>
                                  <?php
                                }
                              }
                              ?>
                            </div>
                            <div id=User5>
                              <form method="post">
                                <select id="Filterlöschen1" name="Warnungenvon">
                                  <option id="Filterdeaktivieren" value="None">----------------------------------</option>
                                  <?php
                                   $result = $user->SelectUserMain();
                                   while ($row = $result->fetch_assoc()) {
                                     ?>
                                      <option id="Filterlöschen" value="<?php echo $row["BenutzerName"]; ?>"><?php echo $row["BenutzerName"]; ?></option>
                                     <?php
                                   }
                                  ?>
                                </select>
                                <input id="Filterlöschen1" type="submit" name="Warnungenlöschen" value="Warnungen zurücksetzten">
                              </form>
                              <?php
                              if (isset($_POST["Warnungenlöschen"])) {
                                if ($_POST["Warnungenvon"] != "None") {
                                  $result = $user->Warnungenzurücksetzten($_POST["Warnungenvon"]);
                                  if ($result) {
                                    ?>
                                      <div id=>
                                        <a id=AdminFilterERRORa>Die Warnungen von dem User "<?php echo $_POST["Warnungenvon"]; ?>" wurden auf "0" gesetzt!</a>
                                      </div>
                                    <?php
                                  }else {
                                    ?>
                                      <div id=>
                                        <a id=AdminFilterERRORa>Es gab ein Fehler beim zurücksetzten der Warnungen von dem User "<?php echo $_POST["Warnungenvon"]; ?>"!</a>
                                      </div>
                                    <?php
                                  }
                                }else {
                                  ?>
                                    <div id=>
                                      <a id=AdminFilterERRORa>Bitte wählen Sie einen Users aus!</a>
                                    </div>
                                  <?php
                                }
                              }
                              ?>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <?php
              }
            ?>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
