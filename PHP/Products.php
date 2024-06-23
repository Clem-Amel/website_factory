<?php
[$rowImage, $rowTitle] = select("?id=" . $_GET['id'], "продукция");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo $rowTitle[0]['pt']; ?></title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
  <script src="./js/main.js" defer></script>
</head>
<body> 
  <div class="block_product">
    <h1 class="title">ПРОДУКЦИЯ</h1>   
    <div class="create-line-1"></div>
      <?php
      session_start();
      if(isset($_SESSION['ID'])) 
      {
          echo "<div class=\"ard_butons\">
                <a href=\"../index.php?id=-update&order=".$_GET['id']."&block=продукция&check_text=-1\" class=\"ard ard_1\"> <img src=\"./img/обновление.png\" class=\"img-close\" title=\"Изменение элементов\"
                                  style=\"width: 50px;\" /></a>
                <a href=\"../index.php?id=-add&order=" . $_GET['id'] . "&block=продукция&check_text=-1\" class=\"ard ard_2\"><img src=\"./img/добавление.png\" class=\"img-close\" title=\"Добавление элементов\"
                                  style=\"width: 50px;\" /></a>
                <a href=\"../index.php?id=-delete&order=" . $_GET['id'] . "&block=продукция\" class=\"ard ard_3\"><img src=\"./img/удаление.png\" class=\"img-close\" title=\"Удаление элементов\"
                                  style=\"width: 50px;\" /></a>
                </div>";
      }
      ?>
    <div class="city_ life">
      <div class="wrapper">
        <i id="left" class="fa-solid fa-angle-left"></i>
        <ul class="carousel">  
            <?php
            for ($i = 0; !empty($rowTitle[$i]); $i++) 
            {
                $row = selectLink($rowTitle[$i]['tt']);
                echo "<li class=\"card\"> <a href=\"../index.php" . $row[0] . "\" >
                      <div class=\"img\">
                      <img src=\"" . $rowImage[$i]['address'] . "\" alt=\"img\" draggable=\"false\" />
                      </div></a>
                      <h2>" . $rowTitle[$i]['tt'] . "</h2><span></span>
                      </li>";
            }
            ?>        
        </ul>
        <i id="right" class="fa-solid fa-angle-right"></i>
      </div>
    </div>
  </div>  
</body>
</html>