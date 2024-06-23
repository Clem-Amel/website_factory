<!DOCTYPE html>
<html lang="en">
<?php
    [$rowImage, $rowTitle] = select("?id=". $_GET['id'], "новости");
?>
<head>
    <title>
        <?php echo $rowTitle[0]['pt']; ?>
    </title>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js" defer></script>
    <script type="text/javascript" src="./js/scroll.js" defer></script>
    <script type="text/javascript" src="./js/news.js" defer></script>
</head>
<body>
    <div class="block_news">
        <h1 id="t1" class="title">НОВОСТИ</h1>
        <?php
        session_start();
        if(isset($_SESSION['ID'])) 
        {
           echo "<div class=\"ard_butons\">
                 <a href=\"../index.php?id=-update&order=".$_GET['id']."&block=новости&check_text=-1\" class=\"ard ard_1\"> <img src=\"./img/обновление.png\" class=\"img-close\" title=\"Изменение элементов\"
                                  style=\"width: 50px;\" /></a>
                 <a href=\"../index.php?id=-add&order=" . $_GET['id'] . "&block=новости&check_text=-1\" class=\"ard ard_2\"><img src=\"./img/добавление.png\" class=\"img-close\" title=\"Добавление элементов\"
                                  style=\"width: 50px;\" /></a>
                 <a href=\"../index.php?id=-delete&order=" . $_GET['id'] . "&block=новости\" class=\"ard ard_3\"><img src=\"./img/удаление.png\" class=\"img-close\" title=\"Удаление элементов\"
                                  style=\"width: 50px;\" /></a>
                 </div>";
        }
        ?>   
        <div class="management">
        <?php           
        for ($i = count($rowTitle)-1, $j=0; $i!=-1 && $j<>12; $i--, $j++) 
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
            if(($j+1)%3==0 && $j<> 0) 
            {
                echo "</div>";
            }
        }
        ?>
        </div>
        <div class="create-line-1"></div>
        <?php
        if ($j == 12)
        {
          echo "<button class=\"glow-on-hover\" id=\"glow-on-hover\">Показать еще</button>";
        }
        session_start();
        $_SESSION['news'] = $i;
        ?>        
    </div>
    <a id="button" href="#t1">
        <img width="50" height="50" src="./img/arrow-up-svgrepo-com.png" />
    </a>
</body>
</html>