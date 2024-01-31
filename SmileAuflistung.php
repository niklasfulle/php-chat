<?php
error_reporting(false);
session_start();
include_once "include/class_Nachrichtencheck.php";
$check = new class_Nachrichtencheck();


$result = $check->SelectSmilealles();
if ($result != "-1") {
  ?>
    <table id=SelectSmilealles cellspacing="0">
      <tr id=SelectSmilealles>
        <td id=SelectSmilealles1>Nr</td><td id=SelectSmilealles2>Name</td><td id=SelectSmilealles3>Bild</td><td id=SelectSmilealles4>Status</td>
      </tr>
  <?php
  while ($row = $result->fetch_row()) {

    $smile1 = str_replace("</a><div id=Admin class=dropdown7>", "", $row["2"]);
    $smile2 = str_replace("<div class=dropdown7-content><p id=Smile>$row[1]</p></div></div><a id=chatNachricht>", "", $smile1);
    $smilebild = str_replace("id=Smile", "id=SmileAuflistung", $smile1);
    ?>
    <tr id=SelectSmilealles>
      <td id=SelectSmilealles1><?php echo $row["0"]; ?></td><td id=SelectSmilealles2><?php echo $row["1"]; ?></td><td id=SelectSmilealles3><?php echo $smilebild; ?></td><?php
      if ($row["3"] == "2") {
        echo "<td id=SelectSmilealles4deaktiviert>deaktiviert</td>";
      }else {
        echo "<td id=SelectSmilealles4aktiviert>aktiviert</td>";
      }
      ?>
    </tr>
    <?php
  }
  ?>
    </table>
  <?php
}
?>
