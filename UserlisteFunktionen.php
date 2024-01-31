<?php
error_reporting(false);
session_start();
include_once "./include/class_User.php";
$user = new class_User();

$result = $user->SelectUserforUserlisteFunktion();
?>
  <table id=Userlistetable border="1" cellspacing="0">
    <tr id=Userlistetr1>
      <td id=UserlistetdWarnung10>Warnungen</td><td id=UserlistetdKlasse1>Klasse</td><td id=UserlistetdStatus1>Status</td>
    </tr>

<?php
while ($row = $result->fetch_assoc()) {

  if ($row["BenutzerKlasse"] == "1") {
    $Klasse = "User";
  }elseif ($row["BenutzerKlasse"] == "2") {
    $Klasse = "Admin";
  }

  if ($row["BenutzerStatus"]  == "0") {
    $Status = "Ban";
  }elseif ($row["BenutzerStatus"] == "1") {
    $Status = "no-Ban";
  }

  if ($row["Warnungen"] == "0") {
    $Warnung = "<td id=UserlistetdWarnung1><a id=UserlistetdWarnung>$row[Warnungen]</a></td>";
  }elseif ($row["Warnungen"] == "1") {
    $Warnung = "<td id=UserlistetdWarnung2><a id=UserlistetdWarnung>$row[Warnungen]</a></td>";
  }elseif ($row["Warnungen"] == "2" || $row["Warnungen"] == "3") {
    $Warnung = "<td id=UserlistetdWarnung3><a id=UserlistetdWarnung>$row[Warnungen]</a></td>";
  }elseif ($row["Warnungen"] == "4") {
    $Warnung = "<td id=UserlistetdWarnung4><a id=UserlistetdWarnung>$row[Warnungen]</a></td>";
  }elseif ($row["Warnungen"] == "5") {
    $Warnung = "<td id=UserlistetdWarnung5><a id=UserlistetdWarnung>$row[Warnungen]</a></td>";
  }
  ?>
  <tr id=Userlistetr>
    <?php echo $Warnung; ?>
    <td id=UserlistetdKlasse><?php echo $Klasse; ?></td>
    <td id=UserlistetdStatus><?php echo $Status; ?></td>
  </tr>
  <?php
}
?>
