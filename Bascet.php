<!DOCTYPE html>
<html>
<head>
    <title>Корзина</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table td, table th {
            border: 1px solid black;
            padding: 8px;
        }

        table th {
            text-align: left;
        }

        .total {
            font-weight: bold;
            text-align: right;
        }

        .checkout-btn {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <h1>Корзина</h1>


    <?php
    // Подключение к базе данных
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "Phone_store";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Ошибка подключения: " . $conn->connect_error);
    }

    // Получение товаров из корзины
    $sql = "SELECT P.ID, P.Name, P.Price, O.Quantily
            FROM Phone_store.Phone P
            JOIN Phone_store.Order_users O ON P.ID = O.ID_product";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo '<table>';
        echo '<tr><th>Название</th><th>Цена</th><th>Количество</th><th>Сумма</th></tr>';

        $total = 0;

        while ($row = $result->fetch_assoc()) {
            $productTotal = $row['Price'] * $row['Quantily'];
            $total += $productTotal;

            echo '<tr>';
            echo '<td>' . $row['Name'] . '</td>';
            echo '<td>' . $row['Price'] . '</td>';
            echo '<td>' . $row['Quantily'] . '</td>';
            echo '<td>' . $productTotal . '</td>';
            echo '</tr>';
        }

        echo '<tr class="total"><td colspan="3">Общая стоимость:</td><td>' . $total . '</td></tr>';
        echo '</table>';

        // Кнопка записи данных заказа
        echo '<button class="checkout-btn" onclick="saveOrder()">Записать данные заказа</button>';
    } else {
        echo 'Корзина пуста.';
    }

    $conn->close();
    ?>
    <form method="post" action="сохранить_заказ.php">
    <label for="address">Адрес доставки:</label>
    <input type="text" id="address" name="address" required>

    <label for="userID">ID покупателя:</label>
    <input type="text" id="userID" name="userID" required>

    <button type="submit">Записать данные заказа</button>
</form>

    <script>
        function saveOrder() {
            // AJAX запрос для сохранения данных заказа
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "сохранить_заказ.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

            // Параметры заказа
            var params = "total=" + encodeURIComponent(<?php echo $total; ?>);
            // Добавьте другие параметры заказа, если необходимо

            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Заказ успешно сохранен
                    alert("Данные заказа успешно сохранены!");
                    // Очистка корзины
                    window.location.href = "очистить_корзину.php";
                }
            };

            // Отправка запроса
            xhr.send(params);
        }
    </script>
</body>
</html>
