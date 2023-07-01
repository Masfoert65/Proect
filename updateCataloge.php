<?php
// Обработка POST-запроса для добавления товара в базу данных
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['Name'];
    $image = $_POST['Photo'];
    $description = $_POST['Description'];
    $price = $_POST['Prise'];

    $sql = "INSERT INTO Телефоны (Name, Photo, Description, Prise)
            VALUES ('$name', '$image', '$description', '$price')";


// Если все проверки прошли успешно, попытаться загрузить файл на сервер
} else {
    if (move_uploaded_file($image_tmp, $target_file)) {
        // Файл успешно загружен, добавляем данные в базу данных
        $sql = "INSERT INTO Телефоны (Name, Photo, Description, Prise)
                VALUES ('$name', '$image', '$description', '$price')";
        if (mysqli_query($conn, $sql)) {
            echo "Карточка товара успешно добавлена!";
        } else {
            echo "Ошибка: " . $sql . "<br>" . mysqli_error($conn);
        }
    } else {
        echo "Ошибка: возникла ошибка при загрузке файла.";
    }
}
?>