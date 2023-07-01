<!DOCTYPE html>
<html>
<head>
    <title>Страница заказов</title>
    <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
         <header>
        <nav class="navig">
            <ul class="navi">
                <li class=logo><img class="logo" src="img/logo.png" alt="Логотип"></li>
                <li><a href="#">О нас</a></li>
                <li><a href="index.php">Каталог</a></li>
                <li><a href="#">Корзина</a></li>
                <li><a href="#">Доставка и оплата</a></li>
            </ul>
            <ul class="avor"
            <li><a href="Authorization.php"><img class="Authorization" src="img/Authorization.png" alt="Авторизоваться"></a></ul>
        </nav>
    </header>
    
    <h1 class="container12">Заказы покупателей</h1>
    <div class="container11">
   <?php
    // Подключение к базе данных
    $db_host = 'localhost';
    $db_user = 'root';
    $db_password = '';
    $db_name = 'Phone_store';

    $conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);

    // Проверка подключения к базе данных
    if (!$conn) {
        die("Ошибка подключения: " . mysqli_connect_error());
    }

    // Обработка закрытия заказа
    if (isset($_GET['close_order'])) {
        $order_id = $_GET['close_order'];

        // Запрос на обновление статуса заказа
        $sql = "UPDATE заказы SET статус='Закрыт' WHERE id=$order_id";
        if (mysqli_query($conn, $sql)) {
            echo "Заказ #$order_id успешно закрыт.";
        } else {
            echo "Ошибка при закрытии заказа: " . mysqli_error($conn);
        }
    }

    // Получение данных из базы данных
    $sql = "SELECT * FROM Order_users";
    $result = mysqli_query($conn, $sql);
    // Вывод заказов в виде карточек
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="card11">';
            echo '<h2>Заказ #' . $row['ID'] . '</h2>';
            echo '<p>id пользователя: ' . $row['ID_users'] . '</p>';
            echo '<p>id продукта: ' . $row['ID_product'] . '</p>';
            echo '<p>Количество: ' . $row['Quantily'] . '</p>';
            echo '<p>Дата заказа: ' . $row['Order_Date'] . '</p>';
            echo '<p>Статус заказа: ' . $row['Order_Status'] . '</p>';
            echo '<p>Адресс заказа: ' . $row['Develiry_adress'] . '</p>';
            echo '</div>';
     // Кнопка закрытия заказа
            $orderID = 1; // Замените на фактический ID заказа
            $sql = "UPDATE Order_users SET Order_Status = 'выполнен' WHERE ID = $orderID";

            if ($conn->query($sql) === TRUE) {
            
} else {
    echo "Ошибка при закрытии заказа: " . $conn->error;
}

            echo '</div>';
        }
    } else {
        echo "Нет доступных заказов.";
    }

    // Закрытие соединения с базой данных
    mysqli_close($conn);
    ?>
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