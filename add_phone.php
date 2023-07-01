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

// Получение данных из формы
$phone_name = $_POST['phone_name'];
$brand = $_POST['brand'];
$description = $_POST['description'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];
$photo = $_POST['photo'];

// Вставка данных в таблицу Phone
$sql = "INSERT INTO Phone (Name, Brand, Description, Price, Quantity, Photo) 
        VALUES ('$phone_name', '$brand', '$description', '$price', '$quantity', '$photo')";

if ($conn->query($sql) === TRUE) {
    echo "Телефон успешно добавлен.";
} else {
    echo "Ошибка при добавлении телефона: " . $conn->error;
}

$conn->close();
?>
