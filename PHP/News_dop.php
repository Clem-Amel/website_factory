<?php
[$rowImage, $rowTitle] = select("?id=" . $_GET['id'] . "&order=". $_GET['order']);
$rowText = selectText($rowTitle[0]['tt']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo $rowTitle[0]['pt']; ?></title>
</head>
<body>  
  <div class="block_news_dop">
      <?php
        session_start();
        if (isset($_SESSION['ID'])) 
        {
            echo "<div class=\"ard_butons\">
                  <a href=\"../index.php?id=-update&order=" . $_GET['id'] . "&block=" . $_GET['order'] . "&check_titel=-3\" class=\"ard ard_1\">
                  <img src=\"./img/обновление.png\" class=\"img-close\" title=\"Изменение элементов\"
                                  style=\"width: 50px;\" /></a>
                  </div>";
        }
      ?>
    <h1><?php echo $rowTitle[0]['pt']; ?></h1>
    <div class="create-line-1"></div>
    <div class="photo_text">
      <img src="<?php echo $rowImage[0]['address']; ?>" alt="Фото новости" class="Photo">
      <div class="text">        
        <p class="usl_text">
            <?php echo $rowText[0]; ?>
        </p>
      </div>
    </div>
  </div>  
</body>
</html>