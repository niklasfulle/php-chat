
<?php
error_reporting(false);
session_start();
include_once "include/class_load.php";
$load = new class_load();

$result111 = $load->CountNewBugReports();

if ($result111 > 0 && $result111 < 100) {
  $count = $result111;
  echo"<a id=newbugreportscountadmin>$count</a>";
}elseif ($result111 > 99) {
  $count = "99+";
  echo"<a id=newbugreportscountadmin>$count</a>";
}else {
  $count = "";
  echo"<a id=newbugreportscountadmin>$count</a>";
}
?>
