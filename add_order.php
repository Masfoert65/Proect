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
// Получение списка товаров из таблицы Phone
$sql_products = "SELECT ID, Name FROM Phone";
$result_products = $conn->query($sql_products);
$product_options = '';

if ($result_products->num_rows > 0) {
    // Формирование HTML-кода для вариантов выбора товаров
    while ($row = $result_products->fetch_assoc()) {
        $product_id = $row['ID'];
        $product_name = $row['Name'];
        $product_options .= "<option value='$product_id'>$product_name</option>";
    }
} else {
    echo "Нет доступных товаров.";
    exit;
}

// Получение данных из формы
$item_id = $_POST['ID_item'];
$supplier_id = $_POST['ID_supplier'];
$quantity = $_POST['quantity'];
$order_date = $_POST['order_date'];
$order_status = $_POST['order_status'];
if (empty($item_id)) {
    echo "Ошибка: Не выбран товар.";
    exit;
}
// Вставка данных в таблицу Orders to suppliers
$sql = "INSERT INTO `Orders_to_suppliers` (ID_item, ID_suppliers, Quantity, `Order_date`, `Order_status`) 
        VALUES ('$item_id', '$supplier_id', '$quantity', '$order_date', '$order_status')";

if ($conn->query($sql) === TRUE) {
    echo "Заказ успешно добавлен.";
} else {
    echo "Ошибка при добавлении заказа: " . $conn->error;
}

$conn->close();
?>