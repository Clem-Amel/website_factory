<!DOCTYPE html>
<html lang="en">
<?php
[$rowImage, $rowTitel] = select("?id=" . $_GET['id'], "услуга");
$rowText = selectText($rowTitel[0]['tt']);
?>
<head>
    <title><?php echo $rowTitle[0]['pt']; ?> </title>
    <script src="../JS/FormOut.js" defer></script><!-- скрипт для правильной отправки формы -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js" defer></script>
    <script type="text/javascript" src="./js/scroll.js" defer></script>
</head>
        <body>           
            <div class="block_disc" id="block_disc">
                <?php
                session_start();
                if (isset($_SESSION['ID']))
                {
                    echo "<div class=\"ard_butons\">
                          <a href=\"../index.php?id=-update&order=".$_GET['id']."&block=услуга&check_titel=-1\" class=\"ard ard_1\">
                          <img src=\"./img/обновление.png\" class=\"img-close\" title=\"Изменение элементов\"
                                  style=\"width: 50px;\" /></a>
                         </div>";
                }
                ?>
                <h1 class="title">УСЛУГИ "FACTORY"</h1>       
                <div class="text-disc">
                    <p class="usl_text">
                        <?php echo $rowText[0]; ?>
                    </p>
                </div>
                <img src="<?php echo $rowImage[0]['address']; ?>" class="img_usl" />
            </div>
            <div class="photo_usl">
                <?php
                session_start();
                if (isset($_SESSION['ID']))
                {
                    echo "<div class=\"ard_butons\">
                          <a href=\"../index.php?id=-update&order=".$_GET['id']."&block=услуги&check_text=-1\" class=\"ard ard_1\"> <img src=\"./img/обновление.png\" class=\"img-close\" title=\"Изменение элементов\"
                                  style=\"width: 50px;\" /></a>
                          <a href=\"../index.php?id=-add&order=" . $_GET['id'] . "&block=услуги&check_text=-1\" class=\"ard ard_2\"><img src=\"./img/добавление.png\" class=\"img-close\" title=\"Добавление элементов\"
                                  style=\"width: 50px;\" /></a>
                          <a href=\"../index.php?id=-delete&order=" . $_GET['id'] . "&block=услуги\" class=\"ard ard_3\"><img src=\"./img/удаление.png\" class=\"img-close\" title=\"Удаление элементов\"
                                  style=\"width: 50px;\" /></a>
                          </div>";
                }
                ?>
                <div class="management">
                    <?php
                    [$rowImage, $rowTitle] = select("?id=" . $_GET['id'], "услуги");
                    for ($i = 0; !empty($rowTitle[$i]); $i++) 
                    {
                        if ($i % 4 == 0) 
                        {
                            echo "<div class=\"allManagem\">";
                        }                        
                        echo "<div class=\"management_members\">
                              <img src=\"" . $rowImage[$i]['address'] . "\" alt=\"Фото новости\" class=\"foto\" />
                              <div class=\"FullName\">" . $rowTitle[$i]['tt'] . "</div>
                              </div>";
                        if (($i + 1) % 4 == 0 && $i <> 0) 
                        {
                            echo "</div>";
                        }
                    }
                    ?>
                </div>
                <h3>ОБРАТНАЯ СВЯЗЬ</h3>
                <h3 style="font-size: 14px;">Свяжитесь с нами, если возникли вопросы и мы обязательно Вам ответим</h3>
                <div class="contacts_inform">
                    <form id="contacts_form" action="" class="contacts_form">
                        <input type="text" class="contacts_form_input" placeholder="ФИО" /><br />
                        <input type="tel" class="contacts_form_input" placeholder="Телефон для связи" /><br />
                        <textarea type="textarea" class="contacts_form_input contacts_form_opis" maxlength="2000" placeholder="Ваш вопрос..."></textarea>
                        <input type="submit" class="contacts_form_submit" value="Отправить" /><br />
                    </form>
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script><!-- скрипт для правильной отправки формы -->
                </div>
            </div>
            <a id="button" href="#block_disc">
                <img width="50" height="50" src="./img/arrow-up-svgrepo-com.png" />
            </a>
        </body>
</html>