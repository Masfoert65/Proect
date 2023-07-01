<?php
// Получаем данные из формы
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];

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

// Подготавливаем SQL-запрос для выборки пользователя из таблицы
$stmt = $conn->prepare("SELECT * FROM Users WHERE Email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

// Проверяем наличие пользователя в базе данных
if ($result->num_rows > 0) {
    // Пользователь найден, проверяем пароль
    $row = $result->fetch_assoc();
    echo $row['Password_hash'];
    if ($password == $row['Password_hash']) {
        echo "Авторизация успешна!";
        
        // Проверяем email пользователя
        if ($email === 'root@bk.ru') {
            // Перенаправление в админку
            header("Location: admin.php");
        } else {
            // Перенаправление на обычную главную страницу
            header("Location: index.php");
        }
        exit();
    } else {
        // Пароль неверный
        echo "Неверный пароль!";
    }
} else {
    // Пользователь не найден
    echo "Пользователь не найден!";
}

// Закрываем подготовленный запрос и соединение с базой данных
$stmt->close();
$conn->close();
?>
