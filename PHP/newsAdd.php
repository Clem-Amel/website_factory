<?php
echo "<div class=\"management\">";
include "../LogBD/connectbd.php";
[$rowImage, $rowTitle] = select("?id=-news", "новости");
session_start();
$i = $_SESSION['news'] ;
for ($i, $j=0; $i!=-1 && $j<>12; $i--, $j++) 
{
     if ($j%3==0) 
     {
         echo "<div class=\"allManagem\">";
     }
     $row = selectLink($rowTitle[$i]['tt']);
     echo "<div class=\"management_members\">
           <img src=\"" . $rowImage[$i]['address'] . "\" alt=\"Фото новости\" class=\"foto\" />
           <a href=\"../index.php". $row[0]."\" class=\"FullName\">" . $rowTitle[$i]['tt'] . "</a>
           </div>";
     if(($j+1)%3==0 && $j<>0) 
     {
         echo "</div>";
     }
}
echo "</div>";
$_SESSION['news'] = $i;
?>
   