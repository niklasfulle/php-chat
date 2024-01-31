<?php
error_reporting(false);
session_start();
include_once "include/class_PrivatChat.php";
$privatchat = new class_PrivatChat();
include_once "include/class_Nachrichtencheck.php";
$check = new class_Nachrichtencheck();

if ($_SESSION["Benutzername"] != "" && $_SESSION["PrivatChat3"] != "") {
  $array = $privatchat->getPrivatChat($_SESSION["Benutzername"], $_SESSION["PrivatChat3"]);
  if (isset($_SESSION["PrivatChat3"]) && $_SESSION["PrivatChat3"] != "") {
    $privatchat->Nachrichtgelesen($_SESSION["Benutzername"], $_SESSION["PrivatChat3"]);
  }
  if ($array != "-666") {
    foreach($array as $a){
      $nachrichtencheck = $check->Nachrichtenaftercheck($a[2], $a[3],"privat");
      foreach ($nachrichtencheck as $b) {
        $linkNachricht = $check->Linkcheck($b[0], $b[2]);
        $smilechat = $check->SmileCheck($linkNachricht);
        if ($a["0"] == $_SESSION["Benutzername"]) {
          if ($a["4"] == "0") {
            ?>
              <div id=PrivatChatFrame2ungelesen>
                <?php echo "<a id=privatchatNachricht> $smilechat </a>"; ?>
              </div>
            <?php
          }elseif ($a["4"] == "1") {
            ?>
              <div id=PrivatChatFrame2gelesen>
                <?php echo "<a id=privatchatNachricht> $smilechat </a>"; ?>
              </div>
            <?php
          }
        }elseif ($a["0"] == $_SESSION["PrivatChat3"]) {
          ?>
            <div id=PrivatChatFrame1>
              <?php echo "<a id=privatchatNachricht> $smilechat </a>"; ?>
            </div>
          <?php
        }
      }
    }
  }else {
    ?>
      <div id=PrivatChatFrame>
        <?php echo "<a id=privatchatNachricht>Es wurde noch nichts in diesem Chat geschrieben</a>"; ?>
      </div>
    <?php
  }
}

?>
