<?php
error_reporting(false);
session_start();
include_once "include/class_Freunde.php";
$freunde = new class_Freunde();


$result = $freunde->SelectFreundschaftsanfragenbekommen($_SESSION["Benutzername"]);
if ($result != "-1") {
  while ($row = $result->fetch_row()) {
    if ($row["0"] != "") {
      echo"
      <div class='Anfrage1 dropdown5' id=Anfrage2>
        <a class='Anfrage1'>$row[0]</a>
        <div class='dropdown5-content'>
          <div id=SelectFreundschaftsanfragenbekommenannehmen>
            <a id=SelectFreundschaftsanfragenbekommenannehmen href='?Anfrage_annehmen=$row[0]'>annehmen</a>
          </div>
          <div id=SelectFreundschaftsanfragenbekommenablehnen>
            <a id=SelectFreundschaftsanfragenbekommenablehnen href='?Anfrage_ablehnen=$row[0]'>ablehnen</a>
          </div>
          <!--<form action='?Anfrage_annehmen=$row[0]' method=post>
            <input type=submit name=annehmen value='annehmen' id=SelectFreundschaftsanfragenbekommenannehmen>
          </form>
          <form action='?Anfrage_ablehnen=$row[0]' method=post>
            <input type=submit name=ablehnen value='ablehnen' id=SelectFreundschaftsanfragenbekommenablehnen>
          </form>-->
        </div>
      </div>";
    }
  }
}else {
  echo"
  <div class=Anfrage1 id=Anfrage2>
    <a class='Anfrage1'>Keine Anfrage gefunden</a>
  </div>";
}
?>
