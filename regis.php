<?php
// Получаем данные из формы
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];

// Хешируем пароль
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Подключаемся к базе данных
$servername = "localhost";
$username_db = "root";
$password_db = "";
$dbname = "Phone_store";

$conn = new mysqli($servername, $username_db, $password_db, $dbname);

// Проверяем соединение на ошибки
if ($conn->connect_error) {
    die("Ошибка подключения к базе данных: " . $conn->connect_error);
}

// Подготавливаем SQL-запрос для вставки нового пользователя в таблицу
$stmt = $conn->prepare("INSERT INTO users (Name_user, Password_hash, Email) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $username, $password, $email);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    // Перенаправление на главную страницу
        header("Location: index.php");
        exit();
} else {
    // Ошибка при добавлении пользователя
    echo "Ошибка регистрации!";
}

// Закрываем подготовленный запрос и соединение с базой данных
$stmt->close();
$conn->close();
?>
