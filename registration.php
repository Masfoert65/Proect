<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Окно регистрации</title>
    <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #222; /* Темный фон */
    }
    
    .container {
      width: 300px;
      margin: 0 auto;
      margin-top: 100px;
      background-color: #fff;
      border: 1px solid #ccc;
      padding: 20px;
      box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.3);
      color: #222; /* Цвет текста на темном фоне */
    }
    
    .container h2 {
      text-align: center;
    }
    
    .form-group {
      margin-bottom: 15px;
    }
    
    .form-group label {
      display: block;
      font-weight: bold;
    }
    
    .form-group input[type="text"],
    .form-group input[type="password"],
    .form-group input[type="email"] {
      width: 100%;
      padding: 5px;
      font-size: 16px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }
    
    .form-group input[type="submit"] {
      width: 100%;
      padding: 10px;
      font-size: 16px;
      border-radius: 5px;
      border: none;
      background-color: #FFD700;
      color: #fff;
      cursor: pointer;
    }
    
    .form-group input[type="submit"]:hover {
      background-color: #FFD700;
    }
    
    .container p {
      color: #fff; /* Цвет текста ссылки на темном фоне */
    }
    
    .container a {
      color: #FFD700; /* Цвет ссылки на темном фоне */
    }
    
    .container a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Регистраиция</h2>
    <form action="regis.php" method="POST">
      <div class="form-group">
        <label for="username">Имя пользователя:</label>
        <input type="text" id="username" name="username" placeholder="Введите имя пользователя">
      </div>
      <div class="form-group">
        <label for="password">Пароль:</label>
        <input type="password" id="password" name="password" placeholder="Введите пароль">
      </div>
      <div class="form-group">
        <label for="password">Повторите пароль:</label>
        <input type="password" id="password" name="password" placeholder="Введите пароль">
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Введите email">
      </div>
      <div class="form-group">
        <input type="submit" <a href="" value="Войти">
      </div>
    </form>
    <p>Уже зарегистрированы ? <a href="Authorization.php">Авторизируйтесь</a></p>
  </div>
</body>
</html>
