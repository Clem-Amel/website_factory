<!DOCTYPE html>
<html lang="en">
<?php
[$rowImage, $rowTitle] = select("?id=" . $_GET['id'], "сотрудники");
$rowText = selectText($rowTitle[0]['tt']);
?>
<head>
    <title>
        <?php echo $rowTitle[0]['pt']; ?>
    </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
    <script src="./js/main.js" defer></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js" defer></script>
    <script type="text/javascript" src="./js/scroll.js" defer></script>
</head>
<body>
    <div class="block_disc">
      <?php
      session_start();
      if(isset($_SESSION['ID']))
      {
          echo "<div class=\"ard_butons\">
                <a href=\"../index.php?id=-update&order=".$_GET['id']."&block=сотрудники&check_titel=-1\" class=\"ard ard_1\">
                <img src=\"./img/обновление.png\" class=\"img-close\" title=\"Изменение элементов\"
                                  style=\"width: 50px;\" /></a>

                </div>";
      }
      ?>
        <h1 class="titleSotr">СОТРУДНИКАМ</h1>    
        <div class="text-disc">
            <p class="sotr_text">
                <?php echo $rowText[0]; ?>
            </p>
        </div>
        <img src="<?php echo $rowImage[0]['address']; ?>" alt="Фото работы" width="550px" class="img_sotr" />
    </div>
    <div class="city_life">
        <div class="between"></div>
      <?php
      session_start();
      if(isset($_SESSION['ID']))
      {
          echo "<div class=\"ard_butons\">
                <a href=\"../index.php?id=-update&order=".$_GET['id']."&block=сотрудникам\" class=\"ard ard_1\"> <img src=\"./img/обновление.png\" class=\"img-close\" title=\"Изменение элементов\"
                                  style=\"width: 50px;\" /></a>
                <a href=\"../index.php?id=-add&order=" . $_GET['id'] . "&block=сотрудникам\" class=\"ard ard_2\"><img src=\"./img/добавление.png\" class=\"img-close\" title=\"Добавление элементов\"
                                  style=\"width: 50px;\" /></a>
                <a href=\"../index.php?id=-delete&order=" . $_GET['id'] . "&block=сотрудникам\" class=\"ard ard_3\"><img src=\"./img/удаление.png\" class=\"img-close\" title=\"Удаление элементов\"
                                  style=\"width: 50px;\" /></a>
                </div>";
      }
      ?>
        <div class="wrapper">
            <i id="left" class="fa-solid fa-angle-left"></i>
            <ul class="carousel">
                <?php
                [$rowImage, $rowTitle] = select("?id=" . $_GET['id'], "сотрудникам");
                for ($i = 0; !empty($rowTitle[$i]); $i++)
                {
                     echo "<li class=\"card\">
                           <div class=\"img\">
                           <img src=\"" . $rowImage[$i]['address'] . "\" alt=\"img\" draggable=\"false\" />
                           </div>
                           <h2>" . $rowTitle[$i]['tt'] . "</h2>";
                     $row = selectText($rowTitle[$i]['tt']);
                     echo "<span>". $row[0]."</span>
                           </li>";
                }
                ?>
            </ul>
            <i id="right" class="fa-solid fa-angle-right"></i>
        </div>
    </div>
    <a id="button" href="#block_disc">
        <img width="50" height="50" src="./img/arrow-up-svgrepo-com.png" />
    </a>
</body>
</html>