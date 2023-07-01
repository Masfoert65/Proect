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

// Получение и проверка идентификатора товара
$productId = $_POST["productId"];
if (!is_numeric($productId)) {
    die("Неверный идентификатор товара.");
}

// Удаление товара из базы данных
$sql = "DELETE FROM Phone WHERE ID = ".$productId;

if ($conn->query($sql) === TRUE) {
    echo "Товар успешно удален.";
} else {
    echo "Ошибка при удалении товара: " . $conn->error;
}

$conn->close();
?>
