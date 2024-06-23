<?php
[$rowImage, $rowTitle] = select("?id=" . $_GET['id'], "завод");
$rowText = selectText($rowTitle[0]['tt']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title><?php echo $rowTitle[0]['pt']; ?></title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
  <script src="./JS/main.js" defer></script>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js" defer></script>
  <script type="text/javascript" src="./js/scroll.js" defer></script>
</head>

<body> 
  <div class="info" id="info">
    <h1 class="hOne">О ЗАВОДЕ</h1>
      <?php
        session_start();
        if (isset($_SESSION['ID'])) 
        {
            echo "<div class=\"ard_butons\">
                  <a href=\"../index.php?id=-update&order=" . $_GET['id'] . "&block=завод&check_titel=-3\" class=\"ard ard_1\">
                  <img src=\"./img/обновление.png\" class=\"img-close\" title=\"Изменение элементов\"
                                  style=\"width: 50px;\" /></a>
                  </div>";
        }
      ?>
    <img src="<?php echo $rowImage[0]['address']; ?>" alt="Фото завода 'AURORA'" width="650px" class="imgAbout" />
    <div class="textAbout">
      <h3><?php echo $rowTitle[0]['tt']; ?></h3>
      <p class="oooo">
          <?php echo $rowText['text']; ?>
      </p>
    </div>
  </div>

  <div class="specialization">

    <h3 class="specH">Предприятие специализируется на производстве</h3>
      <?php
        session_start();
        if (isset($_SESSION['ID'])) 
        {
            echo "<div class=\"ard_butons\">
                  <a href=\"../index.php?id=-update&order=" . $_GET['id'] . "&block=специализация&check_text=-1&check_img=-1\" class=\"ard ard_1\">
                  <img src=\"./img/обновление.png\" class=\"img-close\" title=\"Изменение элементов\"
                                  style=\"width: 50px;\" /></a>
                  </div>";
        }
      ?>
    <table>
        <?php
        [$rowImage, $rowTitle] = select("?id=" . $_GET['id'], "специализация");
        ?>
      <tr>
        <td class="specTab">
          <p><?php echo $rowTitle[0]['tt']; ?></p>
        </td>
        <td class="specTab">
          <p><?php echo $rowTitle[1]['tt']; ?></p>
        </td>
      </tr>
      <tr>
        <td class="specTab">
          <p><?php echo $rowTitle[2]['tt']; ?></p>
        </td>
        <td class="specTab">
          <p><?php echo $rowTitle[3]['tt']; ?></p>
        </td>
      </tr>
    </table>
  </div>

  <div class="management">
    <h3>Руководство</h3>
      <?php
      session_start();
      if(isset($_SESSION['ID']))
      {
          echo "<div class=\"ard_butons\">
                <a href=\"../index.php?id=-update&order=".$_GET['id']."&block=руководство\" class=\"ard ard_1\"> <img src=\"./img/обновление.png\" class=\"img-close\" title=\"Изменение элементов\"
                                  style=\"width: 50px;\" /></a>
                <a href=\"../index.php?id=-add&order=" . $_GET['id'] . "&block=руководство\" class=\"ard ard_2\"><img src=\"./img/добавление.png\" class=\"img-close\" title=\"Добавление элементов\"
                                  style=\"width: 50px;\" /></a>
                <a href=\"../index.php?id=-delete&order=" . $_GET['id'] . "&block=руководство\" class=\"ard ard_3\"><img src=\"./img/удаление.png\" class=\"img-close\" title=\"Удаление элементов\"
                                  style=\"width: 50px;\" /></a>
                </div>";
      }
     
      [$rowImage, $rowTitle] = select("?id=" . $_GET['id'], "руководство");

      for ($i = 0; !empty($rowTitle[$i]); $i++) 
      {
            if ($i%4==0) {
                echo "<div class=\"allManagem\">";
            }
            $row = selectText($rowTitle[$i]['tt']);
            echo "<div class=\"management_members\">
                  <img src=\"" . $rowImage[$i]['address'] . "\" alt=\"Фото члена руководств\" class=\"foto\" />
                  <div class=\"FullName\">". $rowTitle[$i]['tt']."</div>
                  </div>";
            if(($i+1)%4==0 && $i<>0) {
                echo "</div>";
            }
        }
      ?>      
  </div>
  <div class="raw_material">
    <h3 class="rawH">Перерабытываемое сырьё</h3>
      <?php
      session_start();
      if(isset($_SESSION['ID'])) 
      {
          echo "<div class=\"ard_butons\">
                <a href=\"../index.php?id=-update&order=".$_GET['id']."&block=сырье&check_text=-1\" class=\"ard ard_1\"> <img src=\"./img/обновление.png\" class=\"img-close\" title=\"Изменение элементов\"
                                  style=\"width: 50px;\" /></a>
                <a href=\"../index.php?id=-add&order=" . $_GET['id'] . "&block=сырье&check_text=-1\" class=\"ard ard_2\"><img src=\"./img/добавление.png\" class=\"img-close\" title=\"Добавление элементов\"
                                  style=\"width: 50px;\" /></a>
                <a href=\"../index.php?id=-delete&order=" . $_GET['id'] . "&block=сырье\" class=\"ard ard_3\"><img src=\"./img/удаление.png\" class=\"img-close\" title=\"Удаление элементов\"
                                  style=\"width: 50px;\" /></a>
                </div>";
      }
     
      [$rowImage, $rowTitle] = select("?id=" . $_GET['id'], "сырье");

      for ($i = 0; !empty($rowTitle[$i]); $i++)
      {
            if ($i%2==0) 
            {
                echo "<div class=\"matraw\">";
            }
            $row = selectText($rowTitle[$i]['tt']);
            echo "<div class=\"raw\">
                  <p class=\"textraw\"><b class=\"numberraw\">".($i+1)."</b> " . $rowTitle[$i]['tt'] . "</p>
                  <br />
                  <img src=\"" . $rowImage[$i]['address'] . "\" alt=\"" . $rowTitle[$i]['tt'] . "\" class=\"imgraw\" />
                  </div>";
                          
            if(($i+1)%2==0 && $i<>0) 
            {
                echo "</div>";
            }
        }
      ?>   
  </div>
  <div class="was_became">
    <div class="piece_was_became">
        <?php
        [$rowImage, $rowTitle] = select("?id=" . $_GET['id'], "ранее");
        ?>
      <h3 class="titlefoto">AURORA ранее</h3>
        <?php
        session_start();
        if (isset($_SESSION['ID'])) 
        {
            echo "<div class=\"ard_butons\">
                  <a href=\"../index.php?id=-update&order=" . $_GET['id'] . "&block=ранее&check_titel=-2&check_text=-1\" class=\"ard ard_1\">
                  <img src=\"./img/обновление.png\" class=\"img-close\" title=\"Изменение элементов\"
                                  style=\"width: 50px;\" /></a>
                  </div>";
        }
        ?>              
        <img src="<?php echo $rowImage[0]['address']; ?>" alt="Фото 1" class="was_became_foto_mini" /> 
        <img src="<?php echo $rowImage[1]['address']; ?>" alt="Фото 2" class="was_became_foto" /> 
        <img src="<?php echo $rowImage[2]['address']; ?>" alt="Фото 3" class="was_became_foto_mini" />     
    </div>
    <div class="piece_was_became">
        <?php
        [$rowImage, $rowTitle] = select("?id=" . $_GET['id'], "сейчас");
        ?>
      <h3 class="titlefoto">AURORA сейчас</h3>
        <?php
        session_start();
        if (isset($_SESSION['ID']))
        {
            echo "<div class=\"ard_butons\">
                  <a href=\"../index.php?id=-update&order=" . $_GET['id'] . "&block=сейчас&check_titel=-2&check_text=-1\" class=\"ard ard_1\">
                  <img src=\"./img/обновление.png\" class=\"img-close\" title=\"Изменение элементов\"
                                  style=\"width: 50px;\" /></a>
                  </div>";
        }
        ?>
      <!-- <div class="wbphotos"> -->
        <img src="<?php echo $rowImage[0]['address']; ?>" alt="Фото 1" class="was_became_foto_mini" />   
        <img src="<?php echo $rowImage[1]['address']; ?>" alt="Фото 2" class="was_became_foto" />
        <img src="<?php echo $rowImage[2]['address']; ?>" alt="Фото 3" class="was_became_foto_mini" />
    </div>
  </div>
  <div class="city_​life">
    <h3 class="titlefoto">Участие "AURORA" в жизни города</h3>
      <?php
      session_start();
      if(isset($_SESSION['ID']))
      {
          echo "<div class=\"ard_butons\">
                <a href=\"../index.php?id=-update&order=".$_GET['id']."&block=участие\" class=\"ard ard_1\"> <img src=\"./img/обновление.png\" class=\"img-close\" title=\"Изменение элементов\"
                                  style=\"width: 50px;\" /></a>
                <a href=\"../index.php?id=-add&order=" . $_GET['id'] . "&block=участие\" class=\"ard ard_2\"><img src=\"./img/добавление.png\" class=\"img-close\" title=\"Добавление элементов\"
                                  style=\"width: 50px;\" /></a>
                <a href=\"../index.php?id=-delete&order=" . $_GET['id'] . "&block=участие\" class=\"ard ard_3\"><img src=\"./img/удаление.png\" class=\"img-close\" title=\"Удаление элементов\"
                                  style=\"width: 50px;\" /></a>
                </div>";
      }
      ?>
    <div class="wrapper">
      <i id="left" class="fa-solid fa-angle-left"></i>
      <ul class="carousel">
          <?php
          [$rowImage, $rowTitle] = select("?id=" . $_GET['id'], "участие");
            for ($i = 0; !empty($rowTitle[$i]); $i++) 
            {
                echo "<li class=\"card\">
                      <div class=\"img\">
                      <img src=\"" . $rowImage[$i]['address'] . "\" alt=\"img\" draggable=\"false\" />
                      </div>
                      <h2>" . $rowTitle[$i]['tt'] . "</h2>";
                $rowText = selectText($rowTitle[$i]['tt']);
                echo "<span>".$rowText["text"] ."</span>
                      </li>";
            }
          ?>       
      </ul>
      <i id="right" class="fa-solid fa-angle-right"></i>
    </div>
  </div>
  <a id="button" href="#info">
  <img width="50" height="50" src="./img/arrow-up-svgrepo-com.png">
</a>
</body>
</html>