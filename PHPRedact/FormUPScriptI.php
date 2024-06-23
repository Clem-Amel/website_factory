<?php
session_start();
$addr = $_SESSION['order'];
$block = $_SESSION['block'];
$head1 = $_POST['head1'];
$image = $_POST['image'];
include "../LogBD/connectbd.php";
if ($_SESSION['check_titel'] == "-1") 
{
    if($block . "123")
    echo UPRecordI($block . "123", $image);
} elseif($addr=="-news-" || $addr == "-product-")
{
    [$rowImage, $rowTitle] = select("?id=" . $addr ."&order=".$block);
    echo UPRecordI($rowTitle[0]['tt'], $image);
}else
{
    switch ($block) 
    {
        case "продукты":
            echo UPRecordI("изображение" . $head1, $image);
            break;
        case "ранее":
            echo UPRecordI("изобр" . $head1, $image);
            break;
        case "сейчас":
            echo UPRecordI("изо" . $head1, $image);
            break;
        case "заставка":
            [$rowImage, $rowTitle] = select("", $block);
            echo UPRecordI($rowTitle[0]['tt'], $image);
            break;
        case "карьера":
        case "завод":
            [$rowImage, $rowTitle] = select("?id=" . $addr, $block);
            echo UPRecordI($rowTitle[0]['tt'], $image);
            break;
        default:
             if (selectTitle($head1, "?id=".$addr)) 
             {
                 echo UPRecordI($head1, $image);
             } else {
                 echo "Такой записи не существует. ";
             }
            break;
    }
}
?>