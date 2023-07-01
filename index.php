<!DOCTYPE html>
<html>
<head>
    <title>Phone Store</title>
    <link rel="stylesheet" type="text/css" href="style.css">
   
</head>
<body>
     <header>
        <nav class="navig">
            <ul class="navi">
                <li class=logo><img class="logo" src="img/logo.png" alt="Логотип"></li>
                <li><a href="About_as.php">О нас</a></li>
                <li><a href="index.php">Каталог</a></li>
                <li><a href="bascet.php">Корзина</a></li>
            </ul>
            <ul class="avor"
            <li><a href="Authorization.php"><img class="Authorization" src="img/Authorization.png" alt="Авторизоваться"></a></ul>
        </nav>
    </header>


    <main>
        <div class="galaxy">
            <div class="text-overlay">
                <h2>Самый прочный складной Galaxy</h2>
                <h4>Galaxy Внутри и снаружи, Samsung Galaxy Z Fold4 создан из материалов, которые не только потрясающе выглядят, но и готовы к любым испытаниям. Передняя и задняя панели выполнены из самого прочного стекла, когда-либо использованном в складном устройстве – Corning Gorilla Glass Victus+, а в сочетании с защитной алюминиевой рамкой Galaxy Z Fold4 можно назвать самым прочным складным устройством в мире.</h4>
            </div>
             <img src="img/galaxy.png" alt="Phone" style="width: 70%;">
        </div>
        <div class="stripe1">
            Рекомендуем 
        </div>
    </main>

<?php
  include 'connectBD.php'
?>
<?php
  include 'ViewCatalog.php'
?>
  <div class="stripe1">
            О компании 
        </div>
        <div class="text">
            <h3>Мы – первый омниканальный ритейлер бытовой техники и электроники в России, лидер по эффективности отрасли.</h3>
            <h3>По состоянию на февраль 2020 года сеть насчитывает 92 современных магазина нового формата. DBStore.ru входит в топ-3 крупнейших</h3>
            <h3>онлайн-игроков рынка. </h3>
            <h3>Юридическая информация: ОБЩЕСТВО С ОГРАНИЧЕННОЙ ОТВЕТСТВЕННОСТЬЮ «DBStore»</h3>
            <h3>Идентификационный код 36962487</h3> 
            <h3>Местонахождение: 15600, Город Кострома, улица Свердова, дом 27, квартира 7</h3>
            <h3>Адрес электронной почты: DBStore@mail.ru</h3> 
            <h3>Деятельность не лицензируется </h3>
        </div>
    <footer>
       <div class="footer">
    <div class="links">
      <a href="#">О нас</a>
      <a href="#">Каталог</a>
      <a href="#">Корзина</a>
    </div>
    <div class="info">
      <p><h4>Контакты</h4>
        <h4>8(800) 555-24-99</h4>
        <h4>Город Кострома, улица</h4>
        <h4>Свердова, дом 27, квартира 7</h4>
        <h4>E-mail: DBStore@mail.ru </h4>
    </p>
    </div>
    <div class="images">
      <img src="img/vk.png" alt="Vkontacte"><a href=#>
      <img src="img/fc.png" alt="Facebook"><a href=#>
      <img src="img/tw.png" alt="Twitter"><a href=#>
    </div>
  </div>
    </footer>
</body>
</html>
