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

// Проверка метода запроса
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получение данных заказа
    $total = $_POST["total"];
    // Получите другие параметры заказа, если они присутствуют

    // Подготовка и выполнение SQL-запроса для вставки данных заказа в таблицу Order_users
    $sql = "INSERT INTO Phone_store.Order_users (ID_users, ID_product, Quantily, Order_Date, Order_Status, Develiry_adress)
            VALUES (1, 1, 1, NOW(), 'в процессе', 'Адрес доставки')"; // Здесь вы должны указать реальные значения для ID_users, ID_product и т.д.
    $result = $conn->query($sql);

    if ($result) {
        echo "Заказ успешно сохранен!";
    } else {
        echo "Ошибка при сохранении заказа: " . $conn->error;
    }
}

$conn->close();
?>
