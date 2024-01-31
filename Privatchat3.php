<?php
error_reporting(false);
session_start();
include_once "include/class_Freunde.php";
include_once "include/class_PrivatChat.php";

$freunde = new class_Freunde();
$privatchat = new class_PrivatChat();

if ($_SESSION["PrivatChat3"] != "") {
  $result = $freunde->SelectFreundecheck($_SESSION["Benutzername"], $_SESSION["PrivatChat3"]);
  if ($result == "1") {
  ?>
    <div class="PrivatChat" id="PrivatChat3" <?php if ($_SESSION["PrivatChat3"] != "") {

    } ?>>
      <?php
      if (isset($_SESSION["PrivatChat3"]) && $_SESSION["PrivatChat3"] != "") {
        $privatchat->Nachrichtgelesen($_SESSION["Benutzername"], $_SESSION["PrivatChat3"]);
      }

      ?>
      <div id=PrivatChathedder>
        <a id="PrivatChathedderName" href="UserProfil.php?User=<?php echo $_SESSION["PrivatChat3"]; ?>"><?php echo $_SESSION["PrivatChat3"]; ?></a>
          <div id=chatbeenden>
            <a id=chatbeenden href='?Chat_beenden=3'>X</a>
          </div>
        <!--<form method="post" action="?Chat_beenden=1">
          <input id=chatbeenden type="submit" name="unset1" value="X">
        </form>-->
      </div>
      <div id=PrivatChatMain>
        <div id="PrivatChatMainChat3" class="style-1">

        </div>
        <script type="text/javascript">
        window.setInterval(function() {
          var elem = document.getElementById('PrivatChatMainChat1');
          elem.scrollBottom = elem.scrollHeight;
        }, 5000);
        </script>
      </div>
      <div id=PrivatChatBottom>
        <form method="post">
          <textarea name="PrivatChatBottomtextarea3" id=PrivatChatBottomtextarea1 maxlength="512"></textarea>
          <input type="submit" name="PrivatChatBottominput3" value="Senden" id="PrivatChatBottom1input">
        </form>
      </div>
    </div>
  <?php
  }else {
    unset($_SESSION["PrivatChat3"]);
    $_SESSION["PrivatChat3"] = $_SESSION["PrivatChat4"];
    unset($_SESSION["PrivatChat4"]);
    header("Location: Index.php");
  }
}
?>
