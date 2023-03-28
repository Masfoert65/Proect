<!DOCTYPE html>
<html>
  <head>
    <title>Магазин телефонов</title>
    <link rel='stylesheet' href="style.css" type='text/css'/>
  </head>
  <body>
    <?php
      // Подключаемся к базе данных
      $mysqli = new mysqli("localhost", "root", "", "Phone_store");

      // Проверяем соединение
      if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
      }

      // Запрашиваем список телефонов
      $sql = "SELECT * FROM Телефоны";
      $result = $mysqli->query($sql);

      // Выводим карточки товаров
      while($row = $result->fetch_assoc()) {
        echo "<div class='card'>";
        echo "<img src='" . $row['Фотография'] . "' alt='" . $row['Название'] . "'>";
        echo "<h3>" . $row['Название'] . "</h3>";
        echo "<h5>" . $row['Описание'] . "</h5>";
        echo "<p class='price'>" . $row['Цена'] . " руб.</p>";
        echo "<p class='quantity'>В наличии: " . $row['Количество'] . "</p>";
        echo "</div>";
      }



// Обработка POST-запроса для добавления товара в базу данных
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['Название'];
    $image = $_POST['Фотография'];
    $description = $_POST['Описание'];
    $price = $_POST['Цена'];

    $sql = "INSERT INTO phones (Название, Фотография, Описание, Цена)
            VALUES ('$name', '$image', '$description', '$price')";

$target_dir = "uploads/";
$target_file = $target_dir . basename($image);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Проверка, является ли файл изображением
if(isset($_POST["submit"])) {
    $check = getimagesize($image_tmp);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "Ошибка: файл не является изображением.";
        $uploadOk = 0;
    }
}
// Проверка, существует ли уже файл с таким именем
if (file_exists($target_file)) {
    echo "Ошибка: файл с таким именем уже существует.";
    $uploadOk = 0;
}
// Проверка размера файла
if ($_FILES["image"]["size"] > 500000) {
    echo "Ошибка: размер файла превышает 500КБ.";
    $uploadOk = 0;
}
// Разрешить только определенные типы файлов
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Ошибка: разрешены только JPG, JPEG, PNG и GIF файлы.";
    $uploadOk = 0;
}
// Проверка на наличие ошибок
if ($uploadOk == 0) {
    echo "Ошибка: файл не был загружен.";
// Если все проверки прошли успешно, попытаться загрузить файл на сервер
} else {
    if (move_uploaded_file($image_tmp, $target_file)) {
        // Файл успешно загружен, добавляем данные в базу данных
        $sql = "INSERT INTO phones (name, image, description, price)
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
}
?>
<!-- HTML-форма для добавления карточки товара -->
<form method="post">
    <label>Название товара:</label>
    <input type="text" name="name"><br>
    <label>Изображение товара:</label>
    <input type="text" name="image"><br>
    <label>Описание товара:</label>
    <textarea name="description"></textarea><br>
    <label>Цена товара:</label>
    <input type="text" name="price"><br>
    <button type="submit">Добавить товар</button>
</form>



  </body>
</html>