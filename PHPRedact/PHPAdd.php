<?php
session_start();
$addr = $_SESSION['order'];
$block = $_SESSION['block'];
$head = $_POST['head'];
$text = $_POST['text'];
$img = $_POST['img'];
include "../LogBD/connectbd.php";
if(!selectTitle($head, "?id=".$addr))
{
   if($_SESSION['check_text']=="-1" && $_SESSION['check_img']!="-1")
   {
       echo AddRecord($addr, $block, $head, "qazwsx" ,$img);
   } elseif($_SESSION['check_img']=="-1" && $_SESSION['check_text']!="-1")
   {
        echo AddRecord($addr, $block, $head, $text);
   }elseif($_SESSION['check_img']=="-1" && $_SESSION['check_text'] == "-1")
   {
        echo AddRecord($addr, $block, $head);
   }else 
   {
       echo AddRecord($addr, $block, $head, $text, $img);
   }

   if ($addr == "-news") 
   {
       echo AddRecordLink($head, "новость","-news-");
   }
   if ($addr == "-product") 
   {
       echo AddRecordLink($head, "продукт", "-product-");
   }
} else
{
    echo "Такой заголовок существует. ";
}
?>