<?php
error_reporting(false);
session_start();
include_once "include/class_Freunde.php";
include_once "include/class_PrivatChat.php";

$freunde = new class_Freunde();
$privatchat = new class_PrivatChat();


$result = $freunde->SelectFreunde($_SESSION["Benutzername"]);
if ($result != "-1") {
  while ($row = $result->fetch_row()) {
    if ($row["0"] != "") {
      $result1 = $privatchat->ungeleseneNachrichtencount($row["0"], $_SESSION["Benutzername"]);
      if ($result1 > "0" && $result1 < "100") {
        $count = $result1;
      }elseif ($result1 > "99") {
        $count = "99+";
      }else {
        $count  = "";
      }

      if ($_SESSION["PrivatChat1"] == $row[0] || $_SESSION["PrivatChat2"] == $row[0] || $_SESSION["PrivatChat3"] == $row[0] || $_SESSION["PrivatChat4"] == $row[0]) {
        if ($_SESSION["PrivatChat1"] == $row[0]) {
          $a = "<div id=SelectFreundschaftsanfragenbekommenNew_Chat>
                  <a id=SelectFreundschaftsanfragenbekommenNew_Chat href='?Chat_beenden=1'>Chat stoppen</a>
                </div>";
        }elseif ($_SESSION["PrivatChat2"] == $row[0]) {
          $a = "<div id=SelectFreundschaftsanfragenbekommenNew_Chat>
                  <a id=SelectFreundschaftsanfragenbekommenNew_Chat href='?Chat_beenden=2'>Chat stoppen</a>
                </div>";
        }elseif ($_SESSION["PrivatChat3"] == $row[0]) {
          $a = "<div id=SelectFreundschaftsanfragenbekommenNew_Chat>
                  <a id=SelectFreundschaftsanfragenbekommenNew_Chat href='?Chat_beenden=3'>Chat stoppen</a>
                </div>";
        }elseif ($_SESSION["PrivatChat4"] == $row[0]) {
          $a = "<div id=SelectFreundschaftsanfragenbekommenNew_Chat>
                  <a id=SelectFreundschaftsanfragenbekommenNew_Chat href='?Chat_beenden=4'>Chat stoppen</a>
                </div>";
        }


      }else {
        if ($_SESSION["PrivatChat1"] == "" && $_SESSION["PrivatChat2"] == "" && $_SESSION["PrivatChat3"] == "" && $_SESSION["PrivatChat4"] == "") {
          $a = "<div id=SelectFreundschaftsanfragenbekommenNew_Chat>
                  <a id=SelectFreundschaftsanfragenbekommenNew_Chat href='?New_Chat=$row[0]'>Chat öffnen</a>
                </div>";
        }elseif ($_SESSION["PrivatChat1"] != "" && $_SESSION["PrivatChat2"] == "" && $_SESSION["PrivatChat3"] == "" && $_SESSION["PrivatChat4"] == "") {
          if ($_SESSION["PrivatChat1"] != $row["0"]) {
            $a = "<div id=SelectFreundschaftsanfragenbekommenNew_Chat>
                    <a id=SelectFreundschaftsanfragenbekommenNew_Chat href='?New_Chat=$row[0]'>Chat öffnen</a>
                  </div>";
          }
        }elseif ($_SESSION["PrivatChat1"] != "" && $_SESSION["PrivatChat2"] != "" && $_SESSION["PrivatChat3"] == "" && $_SESSION["PrivatChat4"] == "") {
          if ($_SESSION["PrivatChat1"] != $row["0"] && $_SESSION["PrivatChat2"] != $row["0"]) {
            $a = "<div id=SelectFreundschaftsanfragenbekommenNew_Chat>
                    <a id=SelectFreundschaftsanfragenbekommenNew_Chat href='?New_Chat=$row[0]'>Chat öffnen</a>
                  </div>";
          }
        }elseif ($_SESSION["PrivatChat1"] != "" && $_SESSION["PrivatChat2"] != "" && $_SESSION["PrivatChat3"] != "" && $_SESSION["PrivatChat4"] == "") {
          if ($_SESSION["PrivatChat1"] != $row["0"] && $_SESSION["PrivatChat2"] != $row["0"] && $_SESSION["PrivatChat3"] != $row["0"]) {
            $a = "<div id=SelectFreundschaftsanfragenbekommenNew_Chat>
                    <a id=SelectFreundschaftsanfragenbekommenNew_Chat href='?New_Chat=$row[0]'>Chat öffnen</a>
                  </div>";
            }
        }elseif ($_SESSION["PrivatChat1"] != "" && $_SESSION["PrivatChat2"] != "" && $_SESSION["PrivatChat3"] != "" && $_SESSION["PrivatChat4"] != "" ) {
          $a = "<div id=SelectFreundschaftsanfragenbekommenNew_Chat>
                  <a id=SelectFreundschaftsanfragenbekommenNew_Chat>Chatmaximum</a>
                </div>";
        }

      }
      echo"
      <div class='Anfrage dropdown5' id=Anfrage2>
        <a class='Anfrage'>$row[0]</a><a id=ungeleseneNachrichten>$count</a>
        <div class='dropdown5-content'>
            <div id=SelectFreundschaftsanfragenbekommenlöschen>
              <a id=SelectFreundschaftsanfragenbekommenlöschen href='?Freund_löschen=$row[0]'>löschen</a>
            </div>
            $a
          <!--<form action='?Anfrage_löschen=$row[0]' method=post>
            <input type=button name=löschen value='löschen' id=SelectFreundschaftsanfragenbekommenlöschen>
          </form>
          <form action='?New_Chat=$row[0]' method=post>
            <input type=button name=New_Chat value='Chat starten' id=SelectFreundschaftsanfragenbekommenNew_Chat>
          </form>-->
        </div>
      </div>";
    }
  }
  echo"
  <div class='Anfrage' id=Anfrage1>

  </div>";
}else {
  echo"
  <div class=Anfrage id=Anfrage2>
    <a class='Anfrage'>Keine Freunde gefunden</a>
  </div>";
}

?>
