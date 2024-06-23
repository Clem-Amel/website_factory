<?php
session_start();
$addr = $_SESSION['order'];
$block = $_SESSION['block'];
$head1 = $_POST['head1'];
$head2 = $_POST['head2'];
include "../LogBD/connectbd.php";
if(!selectTitle($head2, "?id=".$addr))
{
    if ($addr == "-news-" || $addr == "-product-") 
    {
        [$rowImage, $rowTitle] = select("?id=" . $addr . "&order=" . $block);
        echo UPRecordT($rowTitle[0]['tt'], $head2);
        echo UPRecordTLinck($rowTitle[0]['tt'], $head2);
    } else
    {
        switch ($block) {
            case "заставка":
                 [$rowImage, $rowTitle] = select("", $block);
                 echo UPRecordT($rowTitle[0]['tt'], $head2);
            break;
            case "карьера":
            case "завод":
                [$rowImage, $rowTitle] = select("?id=" . $addr, $block);
                echo UPRecordT($rowTitle[0]['tt'], $head2);
            break;
            default:
                if(!selectTitle($head2, "?id=".$addr) && $head1!= $head2 && selectTitle($head1, "?id=".$addr)){
                    echo UPRecordT($head1, $head2);
                    if ($addr == "-news" || $addr == "-product") 
                    {
                        echo UPRecordTLinck($head1, $head2);
                    }
                } else
                {
                echo "Выбранный заголовок не существует. ";
                }
            break;
        }
    }
}else
{
   echo "Заголовок существует. ";
}
?>