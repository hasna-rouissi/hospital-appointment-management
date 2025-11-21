<?php
require_once("connection.php"); 

$id = $_POST["id"];

$rq = $connexion->prepare("select * from chat where fromC='admin' and toC='$id' or fromC='$id' and toC='admin'");
$rq->execute();
$rs = $rq->fetchAll();

$chat_html = "";
if (count($rs) >= 1) {
  foreach ($rs as $v) {
    if ($v['fromC'] == 'admin') {
      $chat_html .= "<div class='text-end' style='background-color:green;margin:5px;border-radius:7px;color:white;'>{$v['conten']}/<spane style='font-size: 10px;'>{$v['dateC']}</sapne></div>";
    } else {
      $chat_html .= "<div class='text-start' style='background-color:#00bfff;margin:5px;border-radius:7px;color:white;'>{$v['conten']}/<spane style='font-size: 10px;'>{$v['dateC']}</sapne></div>";
    }
  }
}

echo $chat_html;
?>
