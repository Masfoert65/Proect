<!DOCTYPE html>
<html>
<head>
    <title>Добавление заказов и телефонов</title>
  <link rel="stylesheet" type="text/css" href="style1.css">
    <head>
    <title>Добавление заказов и телефонов</title>
</head>
<body>
     <header>
        <nav class="navig">
            <ul class="navi">
                <li class=logo><img class="logo" src="img/logo.png" alt="Логотип"></li>
                <li><a href="#">О нас</a></li>
                <li><a href="index.php">Каталог</a></li>
                <li><a href="#">Корзина</a></li>
                <li><a href="#">Доставка и оплата</a></li>
            </ul>
            <ul class="avor"
            <li><a href="Authorization.php"><img class="Authorization" src="img/Authorization.png" alt="Авторизоваться"></a></ul>
        </nav>
    </header>
    <h1>Добавление заказа поставщику</h1>
    <form action="add_order.php" method="POST">
        <label for="item_id">ID товара:</label>
        <input type="text" name="item_id" id="item_id" required><br>
        
        <label for="supplier_id">ID поставщика:</label>
        <input type="text" name="supplier_id" id="supplier_id" required><br>
        
        <label for="quantity">Количество:</label>
        <input type="number" name="quantity" id="quantity" required><br>
        
        <label for="order_date">Дата заказа:</label>
        <input type="datetime-local" name="order_date" id="order_date" required><br>
        
        <label for="order_status">Статус заказа:</label>
        <select name="order_status" id="order_status" required>
            <option value="выполнен">выполнен</option>
            <option value="ожидает исполнения">ожидает исполнения</option>
            <option value="отменен">отменен</option>
        </select><br>
        
        <input type="submit" value="Добавить заказ">
    </form>

    <hr>

    <h1>Добавление нового телефона</h1>
    <form action="add_phone.php" method="POST">
        <label for="phone_name">Название телефона:</label>
        <input type="text" name="phone_name" id="phone_name" required><br>
        
        <label for="brand">Бренд:</label>
        <input type="text" name="brand" id="brand" required><br>
        
        <label for="description">Описание:</label>
        <textarea name="description" id="description" required></textarea><br>
        
        <label for="price">Цена:</label>
        <input type="number" name="price" id="price" required><br>
        
        <label for="quantity">Количество:</label>
        <input type="number" name="quantity" id="quantity" required><br>
        
        <label for="photo">Фото:</label>
        <input type="text" name="photo" id="photo" required><br>
        
        <input type="submit" value="Добавить телефон">
    </form>
    <footer>
       <div class="footer">
    <div class="links">
      <a href="#">О нас</a>
      <a href="#">Каталог</a>
      <a href="#">Корзина</a>
    </div>
    <div class="info">
      <p><h4>Контакты</h4>
        <h4>8(800) 555-24-99</h4>
        <h4>Город Кострома, улица</h4>
        <h4>Свердова, дом 27, квартира 7</h4>
        <h4>E-mail: DBStore@mail.ru </h4>
    </p>
    </div>
    <div class="images">
      <img src="img/vk.png" alt="Vkontacte"><a href=#>
      <img src="img/fc.png" alt="Facebook"><a href=#>
      <img src="img/tw.png" alt="Twitter"><a href=#>
    </div>
  </div>
    </footer>
</body>
</html>
