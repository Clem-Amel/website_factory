<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">    
   
</head>
<body>
  <header>
    <!-- Hamburger -->
    <nav role="navigation">
      <div id="menuToggle">
      <input type="checkbox"/>
      <span></span>
      <span></span>
      <span></span>
      <ul id="menu">
        <a href="../index.php?id=-product" class="a"><li>Продукция</li></a>
        <a href="../index.php?id=-news" class="a"><li>Новости и события</li></a>
        <a href="../index.php?id=-about" class="a"><li>О заводе</li></a>
        <a href="../index.php?id=-career" class="a"><li>Карьера</li></a>
        <a href="../index.php?id=-sotr" class="a"><li>Сотрудникам</li></a>
        <a href="../index.php?id=-uslugi" class="a"><li>Услуги</li></a>
        <a href="#" class="a"><li>Политика конфиденциальности</li></a>
      </ul>
      </div>
  </nav>
    <!-- Hamburger -->
    <div id="logo">
      <a href="../index.php" title="На главную">
        <img src="./img/logo.png" title="На главную" alt="Логотип"/>
      <h1 id="Name">FACTORY</h1>
      </a>
    </div>

    <div id="about">
      <p id="text1" class="Header_text">+7 888 888-88-88</p>
      <p class="Header_text">г.Орел, ул.Ленина, д. 1</p>
      <br />
  
      <div class="one">
        <a href="../index.php?id=-product" class="Header_btn btn_1">Продукция</a>
        <a href="../index.php?id=-news" class="Header_btn btn_1">Новости и события</a>
        <div class="dropdown">
          <a class="Header_btn btn_1">О нас</a>
          <div class="dropdown-content">
            <a href="../index.php?id=-about" style="text-align: left">О заводе</a>
            <a href="../index.php?id=-career" style="text-align: left">Карьера</a>
            <a href="../index.php?id=-sotr" style="text-align: left">Сотрудникам</a>
          </div>
        </div>
        <a href="../index.php?id=-uslugi" class="Header_btn btn_1">Услуги</a>
          <a class="open-model-btn-1 Header_btn" id="open-model-btn-1">
              <?php
              if (!isset($_SESSION['ID'])) {
                echo "Войти";
              } else {
              echo "Аккаунт";
              }
              ?>
              </a>
              <div class="modal-win" id="modal-win">
                  <div class="modal-win-box">
                      <div class="vhod">
                          <button class="modal-win-box-btn" id="modal-win-box-btn">
                              <img src="./img/cross-svgrepo-com (1).svg" class="img-close"
                                  style="width: 25px;" />

                          </button>
                          <form class="vhod-1" action="" id="form-input">                         
               <?php
                  if(isset($_SESSION['ID']) && $_SESSION['TYPE']=="Администратор") {
                   echo "<p class=\"vvod\">Введите данные нового/старого</br> пользователя</p>
                    <input class=\"login-password\" name=\"login\" placeholder=\"Введите логин\" required>
                    <input type=\"password\" class=\"login-password\" name=\"password\" placeholder=\"Введите пароль\" required>
                    <input type=\"password\" class=\"login-password\" name=\"password1\" placeholder=\"Повторите пароль\" required>
                    <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js\"></script>
                    <div class=\"login-password\">
                    <label>
                    <input type=\"checkbox\" class=\"radio\" value=\"1\" name=\"adm\" id=\"ch\"/>Администратор</label>
                    <label>
                    <input type=\"checkbox\" class=\"radio\" value=\"1\" name=\"mod\" id=\"ch\"/>Модератор</label>
                    </div>
                    <button type=\"button\" class=\"submit-add\" id=\"button-add\">Добавить</button>
                    <button type=\"button\" class=\"submit\" id=\"button-del\">Удалить</button>
                    <button type=\"button\" class=\"submit-out\" id=\"button-out\">Выйти</button>";
                  } elseif(isset($_SESSION['ID']) && $_SESSION['TYPE']=="Модератор") {
                    echo "<p class=\"vvod\">Вы вошли как модератор</p>
                          <button type=\"button\" class=\"submit-out\" id=\"button-out\">Выйти</button>";
                  }else{
                    echo  "<p class=\"vvod\">Введите свои данные</p>
                           <input class=\"login-password\" name=\"login\" placeholder=\"Введите логин\" required>
                           <input type=\"password\" class=\"login-password\" name=\"password\" placeholder=\"Введите пароль\" required>
                           <button type=\"submit\" class=\"submit\" id=\"button-submit\">Войти</button>";
                  }
                              ?>
                          </form>
                          <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script><!-- скрипт для правильной отправки формы -->
                          <script src="../JS/FormInput.js" defer></script><!-- скрипт для правильной отправки формы -->
                      </div>

                  </div>
              </div>
              <script src="./JS/Vhod.js"></script>
      </div>      
    </div>
      <div id="cookie_note">
    <p>
        Мы используем файлы cookies для улучшения работы сайта. Оставаясь на нашем сайте, вы соглашаетесь с условиями
        использования файлов cookies. Чтобы ознакомиться с нашими Положениями о конфиденциальности и об использовании
        файлов cookie, <a href="../index.php?id=-politics" target="_blank">нажмите здесь</a>.
    </p>
          <div class="button-c">
              <button class="cookie_accept">Я согласен</button>
          </div>
      </div>
      <script src="../JS/Cookies.js"></script>
  </header>
  
</body>
</html>