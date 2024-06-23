<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/footer.css" />
  <link rel="stylesheet" href="css/header.css" />
  <link rel="stylesheet" href="css/buttonRedact.css" />
  <link href="./img/logo.png" rel="icon" type="image/x-icon" />
</head>
<body>
    <?php
    session_start();
    include "LogBD/connectbd.php";
    include "blocks/header.php";
    include "dinamic.php";
    include "blocks/footer.html" 
    ?>
</body>
</html>