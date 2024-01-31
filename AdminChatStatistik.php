<?php
error_reporting(false);
session_start();
include_once "include/class_Nachrichtencheck.php";
$check = new class_Nachrichtencheck();

$result = $check->SelectChatStatistiken();

foreach ($result as $a) {
  ?>
  <table id=AdminMainFrameleftfunctionchatStatistikentable>
    <tr id=AdminMainFrameleftfunctionchatStatistikentr1>
      <td id=AdminMainFrameleftfunctionchatStatistikentd11>Nachrichten Anzahl</td>
    </tr>
    <tr id=AdminMainFrameleftfunctionchatStatistikentr2>
      <td id=AdminMainFrameleftfunctionchatStatistikentd21>Normaler Chat:</td><td id=AdminMainFrameleftfunctionchatStatistikentd22><?php echo $a[0]; ?></td><td id=AdminMainFrameleftfunctionchatStatistikentd23>Privat Nachrichten:</td><td id=AdminMainFrameleftfunctionchatStatistikentd24><?php echo $a[1]; ?></td>
    </tr>
    <tr id=AdminMainFrameleftfunctionchatStatistikentr3>
      <td id=AdminMainFrameleftfunctionchatStatistikentd31>Normale Chat Nachrichtenarten</td>
    </tr>
    <tr id=AdminMainFrameleftfunctionchatStatistikentr4>
      <td id=AdminMainFrameleftfunctionchatStatistikentd41>Text:</td><td id=AdminMainFrameleftfunctionchatStatistikentd42>Link:</td><td id=AdminMainFrameleftfunctionchatStatistikentd43>Bild:</td><td id=AdminMainFrameleftfunctionchatStatistikentd44>Datei:</td>
    </tr>
    <tr id=AdminMainFrameleftfunctionchatStatistikentr5>
      <td id=AdminMainFrameleftfunctionchatStatistikentd51><?php echo $a[2]; ?></td><td id=AdminMainFrameleftfunctionchatStatistikentd52><?php echo $a[3]; ?></td><td id=AdminMainFrameleftfunctionchatStatistikentd53><?php echo $a[4]; ?></td><td id=AdminMainFrameleftfunctionchatStatistikentd54><?php echo $a[5]; ?></td>
    </tr>
    <tr id=AdminMainFrameleftfunctionchatStatistikentr6>
      <td id=AdminMainFrameleftfunctionchatStatistikentd61>Privater Chat Nachrichtenarten</td>
    </tr>
    <tr id=AdminMainFrameleftfunctionchatStatistikentr7>
      <td id=AdminMainFrameleftfunctionchatStatistikentd71>Text:</td><td id=AdminMainFrameleftfunctionchatStatistikentd72>Link:</td><td id=AdminMainFrameleftfunctionchatStatistikentd73>Bild:</td><td id=AdminMainFrameleftfunctionchatStatistikentd74>Datei:</td>
    </tr>
    <tr id=AdminMainFrameleftfunctionchatStatistikentr8>
      <td id=AdminMainFrameleftfunctionchatStatistikentd81><?php echo $a[6]; ?></td><td id=AdminMainFrameleftfunctionchatStatistikentd82><?php echo $a[7]; ?></td><td id=AdminMainFrameleftfunctionchatStatistikentd83><?php echo $a[8]; ?></td><td id=AdminMainFrameleftfunctionchatStatistikentd84><?php echo $a[9]; ?></td>
    </tr>
  </table>
  <?php
}
?>
