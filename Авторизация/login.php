<?php
session_start(); // Начало сессии
            
// Подключение к базе данных PgAdmin4
$dbhost = 'localhost'; // адрес хоста базы данных
$dbname = 'testingsystem'; // имя базы данных
$dbuser = 'postgres'; // имя пользователя базы данных
$dbpass = 'mysql'; // пароль пользователя базы данных
            
try {
    $dbh = new PDO("pgsql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Подключение не удалось: ' . $e->getMessage());
}
            
// Обработка отправленной формы входа
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Получение данных из формы
    $username = $_POST['username'];
    $password = $_POST['password'];
            
    // Проверка наличия пользователя в базе данных
    $stmt = $dbh->prepare("SELECT password, access_level, division FROM users WHERE username = :username LIMIT 1");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
            
    if ($row) {
        // Проверка пароля
        $hashedPassword = $row['password'];
        if (password_verify($password, $hashedPassword)) {
            // Установка имени пользователя в сессии
            $_SESSION['username'] = $username;
            
            // Сохранение значения division в сессии
            $_SESSION['division'] = $row['division'];
            
            echo 'Вы успешно вошли на сайт.';
            
            // Редирект на защищенную страницу
            if ($row['access_level'] == 1) {
                header('Location: /PD1/ЛК/index_lk_teacher.php');
            } else {
                header('Location: /PD1/ЛК/index_lk_student.php');
            }
            
            exit();
        } else {
            echo 'Неверный пароль.';
        }
    } else {
        echo 'Пользователь не найден.';
    }
}
?>
            
<!DOCTYPE html>
<html>
<head>
    <title>Авторизация</title>
    <style>
      html, body {
  margin: 0;
  overflow-y: hidden;
  overflow-x: hidden;
}
body{
position: relative;
width: 1519px;
height: 726px;
background: #FFFFFF;
        }
input{
font-family: 'Forum';
font-style: normal;
font-weight: 400;
font-size: 30px;
text-align: center;
}
.background{
  width: 100%;
  height: 726px;
  background: url(/PD1/images/изм2.png);
  background-repeat: no-repeat;
  background-position: center center;
  background-size: cover;
  opacity: 1;
  position: absolute;
  top: 5px;
  left: 0px;
  overflow: hidden;
}

.same_main{
position: absolute;
width: 599px;
height: 545px;
left: 480px;
top: 69px;
background: #D9D9D9;
border-radius: 30px;
        }

.same_one{
position: absolute;
width: 512px;
height: 57px;
left: calc(50% - 512px/2 + 23.5px);
top: 336px;
background: #C1C1C1;
border-radius: 20px;
        }

.same_two{
position: absolute;
width: 512px;
height: 57px;
left: calc(50% - 519px/2 + 27px);
top: 438px;
background: #C1C1C1;
border-radius: 20px;
        }

.login_title{
position: absolute;
width: 88px;
height: 32px;
left: 558px;
top: 293px;
font-family: 'Forum';
font-style: normal;
font-weight: 400;
font-size: 30px;
line-height: 33px;
display: flex;
align-items: center;
text-transform: capitalize;
color: #000000;
        }

.pass_title{
position: absolute;
width: 104px;
height: 45px;
left: 558px;
top: 393px;
font-family: 'Forum';
font-style: normal;
font-weight: 400;
font-size: 30px;
line-height: 33px;
display: flex;
align-items: center;
text-transform: capitalize;
color: #000000;
        }

.logo{
position: absolute;
width: 100%;
height: 100%;
left: calc(50% - 239px/2 + 14px);
top: 44px;
left: 553px;
background: url(/PD1/images/logotip.png) no-repeat;
}

.button-container1{
position: absolute;
width: 203px;
height: 63px;
left: 260px;
top: 478px;
background: #131557;
border-radius: 20px;
}

.login-button{
position: absolute;
width: 203px;
height: 62px;
left: calc(50% - 183px/2 - 110px);
top: 478px;
left: 260px;
font-family: 'Forum';
font-style: normal;
font-weight: 400;
font-size: 35px;
line-height: 39px;    
align-items: center;
text-align: center;
text-transform: capitalize;
color: #CACACA;
background: rgba( 0,0,0,0);
border-radius: 22px;
}

.button-container2{
position: absolute;
width: 183px;
height: 65px;
left: 10px;
top: 476px;
background: #131557;
border-radius: 20px;
}

.back-button{
position: absolute;
width: 183px;
height: 65px;
left: 10px;
top: 488px;
font-family: 'Forum';
font-style: normal;
font-weight: 400;
font-size: 35px;
line-height: 39px;
text-decoration: none;
align-items: center;
text-align: center;
text-transform: capitalize;
color: #CACACA;
background: rgba( 0,0,0,0);
border-radius: 18px;
}
        
.form-group_up{
position: absolute;
top:291px;
left: -27px;
border-radius: 150px;
}
.form-group_down{
position: absolute;
top:394px;
left: -27px;
}
    </style>
</head>
<body>
    <div class="background"></div>
    <div class = "same_main"></div>
    <div class = "same_one"></div>
    <div class = "same_two"></div>
    <div class= "login_title">Логин:</div>
    <div class= "pass_title">Пароль:</div>
    <div class="login-container"></div>
    <div class="logo">
      <form method="POST" action="" >
        <div class="form-group_up">
          <input style = "border-radius: 15px; width: 506px;height: 52px;background: transparent;border:none ;" type="text" name="username"required><br><br>
        </div>
        <div class="form-group_down">
          <input style = "border-radius: 15px; width: 506px;height: 52px;background: transparent;border: none;" type="password"  name="password"required><br><br>
        </div>
        <div class="button-container1"></div>
          <input type="submit" class="login-button" value="Авторизация">
        <div class="button-container2">  </div>
          <a type="button" href="/PD1/exit.php" class="back-button">Назад</a>
      </form>
    </div>
  </body>
</html>