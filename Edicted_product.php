<!DOCTYPE html>
<html>
<head>
    <title>Каталог товаров</title>
<link rel="stylesheet" type="text/css" href="style1.css">
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
    <?php
    // Подключение к базе данных
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Phone_store";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Ошибка подключения к базе данных: " . $conn->connect_error);
    }

    // Обработка сохранения изменений
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Обработка данных, отправленных из формы
        foreach ($_POST["price"] as $productId => $price) {
            $price = $conn->real_escape_string($price);
            $quantity = $conn->real_escape_string($_POST["quantity"][$productId]);

            // Обновление цены и количества товара в базе данных
            $sql = "UPDATE Phone SET Price = '$price', Quantity = '$quantity' WHERE ID = $productId";
            $conn->query($sql);
        }
    }

    // Запрос на получение каталога товаров
    $sql = "SELECT * FROM Phone";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<form method='post'>";
        echo "<table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Brand</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Photo</th>
                    <th>Actions</th>
                </tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>".$row["ID"]."</td>
                    <td>".$row["Name"]."</td>
                    <td>".$row["Brand"]."</td>
                    <td>".$row["Description"]."</td>
                    <td><input type='text' class='edit-input' name='price[".$row["ID"]."]' value='".$row["Price"]."'></td>
                    <td><input type='text' class='edit-input' name='quantity[".$row["ID"]."]' value='".$row["Quantity"]."'></td>
                    <td>".$row["Photo"]."</td>
                    <td>
                        <button class='delete-button' onclick='deleteProduct(".$row["ID"].")'>Удалить</button>
                    </td>
                </tr>";
        }
        echo "</table>";
        echo "<button class='save-button' type='submit'>Сохранить изменения</button>";
        echo "</form>";
    } else {
        echo "Каталог товаров пуст.";
    }

    $conn->close();
    ?>

    <script>
        function deleteProduct(productId) {
            if (confirm("Вы действительно хотите удалить товар?")) {
                // Отправить запрос на удаление товара
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "delete_product.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        // Обновить страницу после успешного удаления товара
                        location.reload();
                    }
                };
                xhr.send("productId=" + productId);
            }
        }
    </script>
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
