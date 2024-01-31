<?php
error_reporting(false);
session_start();
include_once "include/class_Nachrichtencheck.php";
$check = new class_Nachrichtencheck();


$result = $check->SelectFilteralles();
if ($result != "-1") {
  ?>
    <table id=SelectFilteralles cellspacing="0">
      <tr id=SelectFilteralles>
        <td id=SelectFilteralles1>Nr</td><td id=SelectFilteralles2>Name</td><td id=SelectFilteralles3>Status</td>
      </tr>
  <?php
  while ($row = $result->fetch_row()) {
    ?>
    <tr id=SelectFilteralles>
      <td id=SelectFilteralles1><?php echo $row["0"]; ?></td><td id=SelectFilteralles2><?php echo $row["1"]; ?></td><?php
      if ($row["2"] == "2") {
        echo "<td id=SelectFilteralles31deaktiviert>deaktiviert</td>";
      }else {
        echo "<td id=SelectFilteralles31aktiviert>aktiviert</td>";
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
