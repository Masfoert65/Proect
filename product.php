<!-- product.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Карточка товара</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <header>
        <nav class="navig">
            <ul class="navi">
                <li class=logo><img class="logo" src="img/logo.png" alt="Логотип"></li>
                <li><a href="About_as.php">О нас</a></li>
                <li><a href="index.php">Каталог</a></li>
                <li><a href="#">Корзина</a></li>
            </ul>
            <ul class="avor"
            <li><a href="Authorization.php"><img class="Authorization" src="img/Authorization.png" alt="Авторизоваться"></a></ul>
        </nav>
    </header>
    <?php
        // Получение идентификатора товара из параметров URL
        $productId = $_GET['id'];

        // Подключение к базе данных
        $mysqli = new mysqli("localhost", "root", "", "Phone_store");
        if ($mysqli->connect_errno) {
            echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }

        // Запрос к базе данных для получения информации о товаре
        $result = $mysqli->query("SELECT * FROM Phone WHERE ID = " . $productId);

        // Проверка наличия товара с указанным идентификатором
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $productName = $row['Name'];
            $productPrice = $row['Price'];
            $productQuantity = $row['Quantity'];
            $productDescription = $row['Description'];
            $productPhoto = $row['Photo'];

            echo '<div class="product-page">';
            echo '<div class="product-image">';
            echo '<img src="' . $productPhoto . '" alt="' . $productName . '">';
            echo '</div>';
            echo '<div class="product-details">';
            echo '<h2>' . $productName . '</h2>';
            echo '<p>Цена: ' . $productPrice . '</p>';
            echo '<p>Количество: ' . $productQuantity . '</p>';
            echo '<p>' . $productDescription . '</p>';
            echo '<button class="add-to-cart" onclick="addToCart(' . $productId . ')">Добавить в корзину</button>';
            echo '</div>';
            echo '</div>';
        } else {
            echo 'Товар не найден.';
        }

        // Закрытие соединения с базой данных
        $mysqli->close();
    ?>
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
