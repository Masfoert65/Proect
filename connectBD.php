<?php
      // Подключаемся к базе данных
      $mysqli = new mysqli("localhost", "root", "", "Phone_store");

      // Проверяем соединение
      if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
      }
?>