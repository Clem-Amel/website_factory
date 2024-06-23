<?php
session_start();
$addr = $_SESSION['order'];
$block = $_SESSION['block'];
$head1 = $_POST['head1'];
$text = $_POST['text'];
include "../LogBD/connectbd.php";
if ($_SESSION['check_titel'] == "-1") 
{
    echo UPRecordText($block . "123", $text);
} elseif ($addr == "-news-" || $addr == "-product-") 
{
        [$rowImage, $rowTitle] = select("?id=" . $addr . "&order=" . $block);
        echo UPRecordText($rowTitle[0]['tt'], $text);
} else 
{
    switch ($block) {
        case "заставка":
            [$rowImage, $rowTitle] = select("", $block);
            echo UPRecordText($rowTitle[0]['tt'], $text);
            break;
        case "карьера":
        case "завод":
            [$rowImage, $rowTitle] = select("?id=" . $addr, $block);
            echo UPRecordText($rowTitle[0]['tt'], $text);

            break;
        default:
             if (selectTitle($head1, "?id=".$addr)) {
            echo UPRecordText($head1, $text);
            } else {
                echo "Такой записи не существует. ";
            }
            break;
    }
}
?>