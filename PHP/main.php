<?php
[$rowImage, $rowTitle] = select("", "заставка");
$rowText = selectText($rowTitle[0]['tt']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo $rowTitle[0]['pt']; ?></title> 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
  <script src="./js/main.js" defer></script>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js" defer></script>
  <script type="text/javascript" src="./js/scroll.js" defer></script>
</head>
<body>
  <main>
      <div id="main_background" style=" background-image: url(<?php echo $rowImage[0]['address']; ?>);">
        <?php
        session_start();
        if (isset($_SESSION['ID'])) {
            echo "<div class=\"line-but\" > </div>";
            echo "<div class=\"ard_butons\">
                  <a href=\"../index.php?id=-update&order=" . $_GET['id'] . "&block=заставка&check_titel=-3\" class=\"ard ard_1\">
                  <img src=\"./img/обновление.png\" class=\"img-close\" title=\"Изменение элементов\"
                                  style=\"width: 50px;\" /></a>
                  </div>";
        }
        ?>
          <div class="block_text_disc">
              <h1 class="title"><?php echo $rowTitle[0]['tt']; ?></h1>
              <p class="main_discription">
                  <?php echo $rowText['text']; ?>
              </p>
          </div>
      </div>
      <?php
        session_start();
        if (isset($_SESSION['ID'])) {
            echo "<div class=\"ard_butons\">
                  <a href=\"../index.php?id=-update&order=" . $_GET['id'] . "&block=продукты&check_titel=-2&check_text=-1\" class=\"ard ard_1\">
                  <img src=\"./img/обновление.png\" class=\"img-close\" title=\"Изменение элементов\"
                                  style=\"width: 50px;\" /></a>
                  </div>";
        }
      ?>
    <div class="block_photo">
      <table border="0" class="photo_main">
        <tr>
          <td rowspan="2">
              <?php
              [$rowImage, $rowTitle] = select("", "продукты");
              
              session_start();
              if (isset($_SESSION['ID']))
              {
                echo "<div class=\"ard_butons\">
                      <img src=\"./img/1.png\" class=\"img-close\" title=\"1\"
                                  style=\"width: 50px;\" />
                      </div>";
              }
              ?>
              <img src="<?php echo $rowImage[0]['address']; ?>" alt="" class="tabImg" />             
          </td>
          <td style="vertical-align: top;">
              <?php        
              session_start();
              if (isset($_SESSION['ID']))
              {
                 echo "<div class=\"ard_butons\">
                       <img src=\"./img/2.png\" class=\"img-close\" title=\"2\"
                                  style=\"width: 50px;\" />
                       </div>";
              }
              ?>
              <img src="<?php echo $rowImage[1]['address']; ?>" alt="" class="tabImg miniImg" />
          </td>
        </tr>
        <tr>
          <td style="vertical-align: bottom;">
              <img src="<?php echo $rowImage[2]['address']; ?>" alt="" class="tabImg miniImg" />
              <?php
              session_start();
              if (isset($_SESSION['ID']))
              {
                  echo "<div class=\"ard_butons\">
                  <img src=\"./img/3.png\" class=\"img-close\" title=\"3\"
                                  style=\"width: 50px;\" />
                  </div>";
              }
              ?>
          </td>
        </tr>
        <tr class="betweenTab">
          <td colspan="2"></td>
        </tr>
        <tr>
          <td style="vertical-align: top;">     
              <img src="<?php echo $rowImage[3]['address']; ?>" alt="" class="tabImg miniImg" />
              <?php              
              if (isset($_SESSION['ID'])) 
              {
                  echo "<div class=\"ard_butons\">
                        <img src=\"./img/4.png\" class=\"img-close\" title=\"4\"
                                  style=\"width: 50px;\" />
                        </div>";
              }
              ?>
          </td>
          <td rowspan="2">
              <img src="<?php echo $rowImage[4]['address']; ?>" alt="" class="tabImg" />
              <?php              
              session_start();
              if (isset($_SESSION['ID'])) 
              {
                  echo "<div class=\"ard_butons\">
                        <img src=\"./img/5.png\" class=\"img-close\" title=\"5\"
                                  style=\"width: 50px;\" />
                        </div>";
              }
              ?>
          </td>
        </tr>
        <tr>
          <td style="vertical-align: bottom ;">
              <img src="<?php echo $rowImage[5]['address']; ?>" alt="" class="tabImg miniImg" />
              <?php              
              session_start();
              if (isset($_SESSION['ID']))
              {
                  echo "<div class=\"ard_butons\">
                  <img src=\"./img/6.png\" class=\"img-close\" title=\"6\"
                                  style=\"width: 50px;\" />
                  </div>";
              }
              ?>
          </td>
        </tr>
      </table>
    </div>
    <div class="city_life">
      <h3>Новости и события</h3>
      <div class="wrapper">
        <i id="left" class="fa-solid fa-angle-left"></i>
        <ul class="carousel">
            <?php
            [$rowImage, $rowTitle] = select("?id=-news", "новости");

            for ($i = 0; !empty($rowTitle[$i]); $i++)
            {
                $row = selectLink($rowTitle[$i]['tt']);
                echo "<li class=\"card\"> <a href=\"../index.php" . $row[0] . "\" >
                      <div class=\"img\">
                      <img src=\"" . $rowImage[$i]['address'] . "\" alt=\"img\" draggable=\"false\" />
                      </div></a>
                      <h3>" . $rowTitle[$i]['tt'] . "</h3>";
                $row = selectText($rowTitle[$i]['tt']); //       ПРИДУМАТЬ ЧТО СДЕЛАТЬ ВМЕСТО ОПИСАНИЯ КРАТА
                echo "<span></span>
                      </li>";
            }
            ?>      
        </ul>
        <i id="right" class="fa-solid fa-angle-right"></i>
      </div>
      <a href="../index.php?id=-news" class="News_a">Все новости</a>
    </div>
        <?php
        session_start();
        if (isset($_SESSION['ID']))
        {
            echo "<div class=\"ard_butons\">
                  <a href=\"../index.php?id=-update&order=" . $_GET['id'] . "&block=партнеры&check_titel=-1\" class=\"ard ard_1\">
                  <img src=\"./img/обновление.png\" class=\"img-close\" title=\"Изменение элементов\"
                                  style=\"width: 50px;\" /></a>
                  </div>";
        }
      ?>
    <div>
      <h3 class="Partner_main_title">Наши партнёры</h3>
        <?php
        [$rowImage, $rowTitel] = select("", "партнеры");
        $rowText = selectText($rowTitel[0]['tt']);
        ?>
      <p class="partner_discription">
          <?php
          echo $rowText['text']; 
          ?>
      </p>

      <div class="partner_rect">
          <img class="rect-v" src="
          <?php
          echo $rowImage[0]['address']; 
          ?>"
              alt="фото партнеров" width="100%" />
      </div>
    </div>
  </main>
<a id="button" href="#main_background">
  <img width="50" height="50" src="./img/arrow-up-svgrepo-com.png">
</a>
</body>
</html>