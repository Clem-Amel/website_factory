 <?php
  if (array_key_exists('id', $_GET)) 
  {
    $page = $_GET['id'];
  } else 
  {
    $page = "";
  }
  switch ($page) 
  {
    case "-product":
      include "PHP/Products.php";
      include "SPHP/Sproduct.php";
    break;

    case "-news":
      include "PHP/News.php";
      include "SPHP/Snews.php";
    break;

    case "-about":
      include "PHP/aboutfactory.php";
      include "SPHP/Sabout.php";
    break;

    case "-career":
      include "PHP/career.php";
      include "SPHP/Scareer.php";
    break;

    case "-sotr":
      include "PHP/Sotrudnikam.php";
      include "SPHP/Ssotr.php";
    break;

    case "-uslugi":
      include "PHP/Uslugi.php";
      include "SPHP/Suslugi.php";
    break;  

    case "-news-":
      include "PHP/News_dop.php";
      include "SPHP/Snews_dop.php";
    break;

     case "-product-":
       include "PHP/News_dop.php";
       include "SPHP/Snews_dop.php";
     break;

     case "-update":
       include "PHP/update.php";
       include "SPHP/Supdate.php";
     break;

     case "-add":
       include "PHP/add.php";
       include "SPHP/Sadd.php";
     break;

     case "-delete":
       include "PHP/delete.php";
       include "SPHP/Sdelete.php";
     break;

     case "-politics":
       include "PHP/politics.php";
       include "SPHP/SPolitics.php";
     break;

     default:
       include "PHP/main.php";
       include "SPHP/Smain.php";
     break;
  }
?>