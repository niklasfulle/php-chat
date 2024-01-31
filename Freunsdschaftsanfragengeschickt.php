<?php
error_reporting(false);
session_start();
include_once "include/class_Freunde.php";
$freunde = new class_Freunde();


$result = $freunde->SelectFreundschaftsanfragengeschickt($_SESSION["Benutzername"]);
if ($result != "-1") {
  while ($row = $result->fetch_row()) {
    if ($row["0"] != "") {
      echo"
      <div class='Anfrage2 dropdown5' id=Anfrage2>
        <a class='Anfrage2'>$row[0]</a>
        <div class='dropdown5-content'>
          <div id=SelectFreundschaftsanfragenbekommenzurückziehen>
            <a id=SelectFreundschaftsanfragenbekommenzurückziehen href='?Anfrage_zurückziehen=$row[0]'>zurückziehen</a>
          </div>
          <!--<form action='?Anfrage_zurückziehen=$row[0]' method=post>
            <input type=submit name=löschen value='zurückziehen' id=SelectFreundschaftsanfragenbekommenzurückziehen>
          </form>-->
        </div>
      </div>";
    }
  }
}else {
  echo"
  <div class=Anfrage2 id=Anfrage2>
    <a class='Anfrage2'>Keine Anfrage gefunden</a>
  </div>";
}
?>
