<?php
$sql = "SELECT * FROM Phone";
$result = $mysqli->query($sql);

while ($row = $result->fetch_assoc()) {
  echo "<div class='conteiner_card'>";
  echo "<div class='card'>";
  $productId = $row['ID'];
  $productName = $row['Name'];
  $productPrice = $row['Price'];
  $productQuantity = $row['Quantity'];
  $productPhoto = $row['Photo'];

  echo '<a href="product.php?id=' . $productId . '" class="card__link">';
  echo '<img src="' . $productPhoto . '" alt="' . $productName . '" class="card__image">';
  echo '<h3 class="card__title">' . $productName . '</h3>';
  echo '<p class="card__price">Цена: ' . $productPrice . '</p>';
  echo '<p class="card__quantity">Количество: ' . $productQuantity . '</p>';
  echo '</a>';

  echo "</div>"; // Закрываем <div class='card'>
  echo "</div>"; // Закрываем <div class='container_card'>
}

// Закрытие соединения с базой данных
$mysqli->close();
?>
