<?php
session_start();

// Проверяем, авторизован ли пользователь
$username = isset($_SESSION['username']) ? $_SESSION['username'] : '';

// Подключение к базе данных
$dbHost = 'localhost';
$dbName = 'testingsystem';
$dbUser = 'postgres';
$dbPass = 'mysql';

try {
    $pdo = new PDO("pgsql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Ошибка подключения к базе данных: " . $e->getMessage());
}

// Обработка формы при нажатии на кнопку поиска
if (isset($_POST['search'])) {
    $testName = $_POST['test_name'];

    // Подготовленный запрос для получения данных из таблицы
    $stmt = $pdo->prepare("SELECT test_name, questions, result FROM student_result WHERE username = :username AND test_name = :testName");
    $stmt->execute(array(':username' => $username, ':testName' => $testName));
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Страница поиска теста</title>
    <style>
        * {
  box-sizing: border-box;
}
body {
  font-size: 14px;
}
.v1_167 {
  width: 100%;
  height: 726px;
  background: rgba(255,255,255,1);
  opacity: 1;
  position: absolute;
  top: 0px;
  left: 0px;
  overflow: hidden;
}
.v1_168 {
  width: 1519px;
  height: 726px;
  background: url(v1_168.png);
  background-repeat: no-repeat;
  background-position: center center;
  background-size: cover;
  opacity: 1;
  position: absolute;
  top: 5px;
  left: 0px;
  overflow: hidden;
}
.v1_169 {
  width: 881px;
    height: 523px;
    background: rgba(217,217,217,1);
    opacity: 1;
    position: absolute;
    top: 178px;
    left: 319px;
    border-top-left-radius: 30px;
    border-top-right-radius: 30px;
    border-bottom-left-radius: 30px;
    border-bottom-right-radius: 30px;
    overflow: hidden;
}
.v1_170 {
  width: 497px;
  height: 57px;
  background: rgba(192,192,192,1);
  opacity: 1;
  position: absolute;
  top: 264px;
  left:517px;
  border-top-left-radius: 20px;
  border-top-right-radius: 20px;
  border-bottom-left-radius: 20px;
  border-bottom-right-radius: 20px;
  overflow: hidden;
}

.v1_172 {
  width:276px;
  color: rgba(0,0,0,1);
  position: absolute;
  top: 219px;
  left: 615px;
  font-family: 'Forum';
  font-weight: 'Regular';
  font-size: 35px;
  opacity: 1;
  text-align: left;
    text-align: center;
}

.v1_175 {
  width: 179px;
  height: 82px;
  background: rgba(19,21,87,1);
  opacity: 1;
  position: absolute;
  top: 573px;
  left: 669px;
    border-radius: 20px;
}
.v1_176 {
  position: absolute;
width: 180px;
height: 82px;
left: calc(50% - 183px/2 - 110px);
top: 573px;
left: 669px;
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
.v1_177 {
  width: 156px;
  height: 61px;
  background: rgba(217,217,217,1);
  opacity: 1;
  position: absolute;
  top: 62px;
  left: 62px;
    border-radius: 20px;
}
.v1_178 {
  width: 156px;
  color: rgba(0,0,0,1);
  position: absolute;
  top: 72px;
  left: 62px;
  font-family: 'Forum';
  font-weight: 'Regular';
  font-size: 30px;
  opacity: 1;
  text-align: center;
    text-decoration: none;
}
input{
font-family: 'Forum';
font-style: normal;
font-weight: 400;
font-size: 30px;
}
            
.inp_name{  
position: absolute;
top:363px;
left: 217px;
}
            .inp_grup{
position: absolute;
top:463px;
left: 507px;
            }
            .inp_name_test{
position: absolute;
top:263px;
left: 517px;
            }
            .inp_result{
    border: 2px solid black;
    position: absolute;
    top: 423px;
    left: 457px;
    border-radius: 18px;
    width: 596px;
    height: 98px;
    background: transparent;
    font-family: 'Forum';
    font-style: normal;
    font-weight: 400;
    font-size: 30px;
    padding: 20px;
    word-break: break-all;
            }
            .grup{
                
  width: 497px;
  height: 57px;
  background: rgba(192,192,192,1);
  opacity: 1;
  position: absolute;
  top: 364px;
  left:217px;
  border-top-left-radius: 20px;
  border-top-right-radius: 20px;
  border-bottom-left-radius: 20px;
  border-bottom-right-radius: 20px;
  overflow: hidden;

            }
            .name{
  width: 497px;
  height: 57px;
  background: rgba(192,192,192,1);
  opacity: 1;
  position: absolute;
  top: 464px;
  left:217px;
  border-top-left-radius: 20px;
  border-top-right-radius: 20px;
  border-bottom-left-radius: 20px;
  border-bottom-right-radius: 20px;
  overflow: hidden;
            }
            .grup_up{
  width:276px;
  color: rgba(0,0,0,1);
  position: absolute;
  top: 319px;
  left: 335px;
  font-family: 'Forum';
  font-weight: 'Regular';
  font-size: 35px;
  opacity: 1;
  text-align: left;
  text-align: center;
            }
            .name_up{
                width:276px;
  color: rgba(0,0,0,1);
  position: absolute;
  top: 419px;
  left: 335px;
  font-family: 'Forum';
  font-weight: 'Regular';
  font-size: 35px;
  opacity: 1;
  text-align: left;
    text-align: center;
            }
            .box_result{
    width: 596px;
    height: 98px;
    background: rgba(192,192,192,1);
    opacity: 1;
    position: absolute;
    top: 423px;
    left: 457px;
    border-top-left-radius: 20px;
    border-top-right-radius: 20px;
    border-bottom-left-radius: 20px;
    border-bottom-right-radius: 20px;
    overflow: hidden;
            }
            .lk_out{
    width: 296px;
    color: rgba(0,0,0,1);
    position: absolute;
    top: 72px;
    left: 212px;
    font-family: 'Forum';
    font-weight: 'Regular';
    font-size: 30px;
    opacity: 1;
    text-align: center;
    text-decoration: none
}
            .box_lk_out{
    width: 223px;
    height: 61px;
    background: rgba(217,217,217,1);
    opacity: 1;
    position: absolute;
    top: 62px;
    left: 248px;
    border-radius: 20px;
            }
    .rezult_name{
  width:276px;
  color: rgba(0,0,0,1);
  position: absolute;
  top: 319px;
  left: 615px;
  font-family: 'Forum';
  font-weight: 'Regular';
  font-size: 35px;
  opacity: 1;
  text-align: left;
    text-align: center;
}
         /* Стили для таблицы */
         table {
    width: 55%;
    border-collapse: collapse;
    z-index: 1000;
    position: relative;
    top: 425px;
    left: 459px;
    height: 263px;
    border-radius: 20px;
}

        table th, table td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: center;
        }

        /* Стили для ползунка */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background-color: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background-color: #888;
        }

        ::-webkit-scrollbar-thumb:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <div class="v1_167">
            <div class="v1_168"></div>
            <div class="v1_169"></div>
            <span class="v1_172">Название теста:</span>
            <div class="v1_170"></div>
            <div class="box_result"></div>
            <div class="rezult_name">Результат:</div>
            <div class="v1_175"></div>
            <div class="v1_177"></div>
            <div class="box_lk_out"></div>
            <a href="" class="lk_out">Личный кабинет</a>
            <div class="inp_result"></div>
    <form method="POST">
        <div class="inp_name_test">
            <input type="text" style="text-align: center;border-radius: 18px; width: 496px;height: 58px;background: transparent;" name="test_name" id="test_name">
        </div>
        <input type="submit" class="v1_176" name="search" value="Поиск">
        <a href="/PD1/exit.php" class="v1_178" >Выход</a>
    </form>
    <?php if (isset($results)): ?>
        <h2>Результаты поиска:</h2>
        <?php if (count($results) > 0): ?>
            <table>
                <tr>
                    <th>Название теста</th>
                    <th>Вопросы</th>
                    <th>Результат</th>
                </tr>
                <?php foreach ($results as $row): ?>
                    <tr>
                        <td><?php echo $row['test_name']; ?></td>
                        <td><?php echo $row['questions']; ?></td>
                        <td><?php echo $row['result']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>Нет результатов для отображения.</p>
        <?php endif; ?>
    <?php endif; ?>
    </div>
</body>
</html>
