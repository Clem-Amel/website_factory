<?php
[$rowImage, $rowTitle] = select("?id=" . $_GET['id']);
$rowText = selectText($rowTitle[0]['tt']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo $rowTitle[0]['pt']; ?></title>
</head>
<body>  
  <main>
      <?php
        session_start();
        if (isset($_SESSION['ID'])) 
        {
            echo "<div class=\"ard_butons\">
                  <a href=\"../index.php?id=-update&order=" . $_GET['id'] . "&block=политика&check_titel=-1&check_img=-1\" class=\"ard ard_1\">
                  <img src=\"./img/обновление.png\" class=\"img-close\" title=\"Изменение элементов\"
                                  style=\"width: 50px;\" /></a>
                  </div>";
        }
      ?>
    <h1>Политика конфиденциальности</h1>
    <div class="create-line-1"></div>
      <div class="text">        
        <p class="usl_text">
            <?php echo $rowText[0]; ?>
        </p>     
    </div>
  </main>  
</body>
</html>