<?php
[$rowImage, $rowTitle] = select("?id=" . $_GET['id'], "карьера");
$rowText = selectText($rowTitle[0]['tt']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo $rowTitle[0]['pt']; ?></title>
    <script src="../JS/FormOut.js" defer></script> <!-- скрипт для правильной отправки формы -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js" defer></script>
  <script type="text/javascript" src="./js/scroll.js" defer></script>
  </head>
<body>
  <div class="info" id="info">
    <h1 class="titleCareer">КАРЬЕРА</h1>
      <?php
        session_start();
        if (isset($_SESSION['ID'])) 
        {
            echo "<div class=\"ard_butons\">
                  <a href=\"../index.php?id=-update&order=" . $_GET['id'] . "&block=карьера&check_titel=-3\" class=\"ard ard_1\">
                  <img src=\"./img/обновление.png\" class=\"img-close\" title=\"Изменение элементов\"
                                  style=\"width: 50px;\" /></a>
                  </div>";
        }
      ?>
      <img src="<?php echo $rowImage[0]['address']; ?>" alt="Фото завода 'FACTORY'" class="imgAbout" />
    <div class="titleAndOpenBtn">
      <div class="textAbout">
        <h3><?php echo $rowTitle[0]['tt']; ?></h3>
        <p class="inf">
            <?php echo $rowText['text']; ?>
        </p>
      </div>
      <a href="#all_vac" class="open_vak">Открыть вакансии</a>
    </div>
  </div>
  <div class="raw_material">
    <h3 class="rawH">Что мы предлагаем соискателям?</h3>
      <?php
      session_start();
      if(isset($_SESSION['ID'])) 
      {
          echo "<div class=\"ard_butons\">
                <a href=\"../index.php?id=-update&order=".$_GET['id']."&block=соискатели&check_img=-1\" class=\"ard ard_1\"> <img src=\"./img/обновление.png\" class=\"img-close\" title=\"Изменение элементов\"
                                  style=\"width: 50px;\" /></a>
                <a href=\"../index.php?id=-add&order=" . $_GET['id'] . "&block=соискатели&check_img=-1\" class=\"ard ard_2\"><img src=\"./img/добавление.png\" class=\"img-close\" title=\"Добавление элементов\"
                                  style=\"width: 50px;\" /></a>
                <a href=\"../index.php?id=-delete&order=" . $_GET['id'] . "&block=соискатели\" class=\"ard ard_3\"><img src=\"./img/удаление.png\" class=\"img-close\" title=\"Удаление элементов\"
                                  style=\"width: 50px;\" /></a>
                </div>";
      }
    
      [$rowImage, $rowTitle] = select("?id=" . $_GET['id'], "соискатели");

      for ($i = 0; !empty($rowTitle[$i]); $i++) 
      {
            if ($i%2==0) {
                echo "<div class=\"matraw\">";
            }

            $row = selectText($rowTitle[$i]['tt']);
            echo "<div class=\"raw\">
                  <p class=\"titleraw\"><b class=\"numberraw\">".($i+1)."</b> ".$rowTitle[$i]['tt']."</p>
                  <br />";
             $rowText=selectText($rowTitle[$i]['tt']);
            echo "<div class=\"textraw\">". $rowText["text"]."</div>
                  </div>";

            if(($i+1)%2==0 && $i<>0)
            {
                echo "</div>";
            }
      }
       if($i % 2 != 0 && $i <> 0) 
       {
          echo "</div>";      
       }
      ?>
  </div>
  <div class="all_vac" id="all_vac">
    <h3>Открытые вакансии</h3>
      <?php
      session_start();
      if(isset($_SESSION['ID']))
      {
          echo "<div class=\"ard_butons\">
                <a href=\"../index.php?id=-update&order=".$_GET['id']."&block=вакансии&check_text=-1&check_img=-1\" class=\"ard ard_1\"> <img src=\"./img/обновление.png\" class=\"img-close\" title=\"Изменение элементов\"
                                  style=\"width: 50px;\" /></a>
                <a href=\"../index.php?id=-add&order=" . $_GET['id'] . "&block=вакансии&check_text=-1&check_img=-1\" class=\"ard ard_2\"><img src=\"./img/добавление.png\" class=\"img-close\" title=\"Добавление элементов\"
                                  style=\"width: 50px;\" /></a>
                <a href=\"../index.php?id=-delete&order=" . $_GET['id'] . "&block=вакансии\" class=\"ard ard_3\"><img src=\"./img/удаление.png\" class=\"img-close\" title=\"Удаление элементов\"
                                  style=\"width: 50px;\" /></a>
                </div>";
      }
      ?>  
    <div class="vacancy">
      <?php
      [$rowImage, $rowTitle] = select("?id=" . $_GET['id'], "вакансии");
      for ($i = 0; !empty($rowTitle[$i]); $i++) {
            echo "<div class=\"wind_vac\">
                  <div class=\"title_vac\">". $rowTitle[$i]['tt']."</div>
                  <div class=\"buttons_vac\">
                  <a href=\"#join_us\" class=\"btn_vac\">ОТКЛИКНУТЬСЯ</a>
                  </div>
                  </div>";
      }
      ?>  
    </div>
  </div>
  <div class="join_us" id="join_us">
    <h3>ПРИСОЕДИНЯЙСЯ К НАМ</h3>
      <?php
        session_start();
        if (isset($_SESSION['ID'])) 
        {
            echo "<div class=\"ard_butons\">
                  <a href=\"../index.php?id=-update&order=" . $_GET['id'] . "&block=присоединение&check_titel=-1&check_img=-1\" class=\"ard ard_1\">
                  <img src=\"./img/обновление.png\" class=\"img-close\" title=\"Изменение элементов\"
                                  style=\"width: 50px;\" /></a>
                  </div>";
        }
      ?>
    <div class="textForm">
      <div class="textImg">
        <div class="text_join">
            <?php
            [$rowImage, $rowTitle] = select("?id=" . $_GET['id'], "присоединение");     
            ?>
          <p class="tj">
              <?php
              $rowText = selectText($rowTitle[0]['tt']);
              echo $rowText[0];  
              ?>
          </p>
        </div>
        <img src="./img/peoplesitting.png" alt="" class="imgPeople" />
      </div>
        <!-- форма -->
      <form id="feedback-form" class="form_join" action="" method="post" enctype="multipart/form-data">
        <div class="input_field">
          <input type="text" class="field" name="name" placeholder="ФИО" />
        </div>

        <div class="input_field">
          <input type="text" class="field" name="number" placeholder="Телефон" />
        </div>

        <div class="input_field">
          <textarea type="text" class="field fieldKomm" name="message" placeholder="Комментарий"></textarea>
        </div>
           
        <div class="attach_rez">
          <h6>Прикрепить резюме</h6>
          <div class="upload-file__wrapper">
           
            <label class="upload-file__label">
                <img src="./img/plusfile.png" class="upload-file__icon" />
                 <input type="file" name="files[]" id="upload-file__input_1" class="upload-file__input" accept=".doc, .docx, .pdf, .txt" multiple />           
              <span class="upload-file__text">Прикрепить файл</span>                
            </label>         
          </div>
        </div>
        <button class="sendRez">Отправить</button>
      </form>
        <!-- форма конец -->
        <!-- скрипты для формы -->
   <script src="https://snipp.ru/cdn/jquery/2.1.1/jquery.min.js"></script>  <!-- скрипты для отображения прикрепления файла -->
    <script>
     $('.upload-file__label input[type=file]').on('change', function(){
	let file = this.files[0];
	$(this).next().html(file.name);
    });
    </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>  <!-- скрипт для правильной отправки формы -->       
         <!-- скрипты для формы конец -->
    </div>
  </div>
  <div class="map">
    <div class="mapMap">
      <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Ac1c3f97156609bfe87de8d422214bdc5ba7fe2c22aca42838dafd46e8dc63f5e&amp;width=100%25&amp;height=350&amp;lang=ru_RU&amp;scroll=true"></script>
    </div>
  </div>
  <a id="button" href="#info">
  <img width="50" height="50" src="./img/arrow-up-svgrepo-com.png">
</a>
</body>
</html>