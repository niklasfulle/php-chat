<?php
error_reporting(false);
session_start();
include_once "./include/class_User.php";
$user = new class_User();

$result = $user->SelectUserforUserliste();
?>
  <table id=Userlistetable border="1" cellspacing="0">
    <tr id=Userlistetr1>
      <td id=UserlistetdBenutzername1>Benutzername</td><td id=UserlistetdVorname1>Vorname</td><td id=UserlistetdNachname1>Nachname</td><td id=UserlistetdIPAdresse1>IP-Adresse</td>
    </tr>

<?php
while ($row = $result->fetch_assoc()) {

  echo "
  <tr id=Userlistetr>
    <td id=UserlistetdBenutzername>
      <div class=dropdown4><a id=UserlistetdBenutzername>$row[BenutzerName]</a>
      <div class=dropdown4-content>
        <img src='Bilder/ProfilBilder/$row[ProfilBild]' id=chatframenameProfilBild1>
      </div>
      </div>
    </td>
    <td id=UserlistetdVorname><a id=UserlistetdVorname>$row[Vorname]</a></td>
    <td id=UserlistetdNachname><a id=UserlistetdNachname>$row[Nachname]</a></td>
    <td id=UserlistetdIPAdresse><a id=UserlistetdIPAdresse>$row[Last_IP]</a></td>

  </tr>";
}
?>
  </table>
