<?php
session_start(); // Начало сессии
?>
<?php
// Получение значения параметра division из сессии
$division = isset($_SESSION['division']) ? $_SESSION['division'] : '';

// Запоминание значения в сессию
$_SESSION['division'] = $division;

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

// Получение значений параметров test_name и username из сессии
$testName = isset($_SESSION['testName']) ? $_SESSION['testName'] : '';
$username = isset($_SESSION['username']) ? $_SESSION['username'] : '';

try {
    // Подготовка SQL-запроса для выборки значения поля questions из таблицы info
    $infoSql = "SELECT questions FROM info WHERE test_name = :testName";
    $infoStmt = $pdo->prepare($infoSql);
    $infoStmt->bindParam(':testName', $testName, PDO::PARAM_STR);

    // Выполнение запроса
    $infoStmt->execute();
    
    // Получение результата запроса
    $infoResult = $infoStmt->fetch(PDO::FETCH_ASSOC);

    // Подготовка SQL-запроса для подсчета количества строк
    $countSql = "SELECT COUNT(*) as count FROM results WHERE test_name = :testName AND username = :username AND is_correct = :isCorrect";
    $countStmt = $pdo->prepare($countSql);
    $countStmt->bindParam(':testName', $testName, PDO::PARAM_STR);
    $countStmt->bindParam(':username', $username, PDO::PARAM_STR);
    $isCorrect = 1;
    $countStmt->bindParam(':isCorrect', $isCorrect, PDO::PARAM_INT);

    // Выполнение запроса
    $countStmt->execute();

    // Получение результата запроса
    $countResult = $countStmt->fetch(PDO::FETCH_ASSOC);

    // Сохранение количества строк, username, test_name и значения поля questions в таблице student_result
    $saveSql = "INSERT INTO student_result (result, username, test_name, questions, division) VALUES (:result, :username, :testName, :questions::varchar, :division)";
    $saveStmt = $pdo->prepare($saveSql);
    $saveStmt->bindParam(':result', $countResult['count'], PDO::PARAM_INT);
    $saveStmt->bindParam(':username', $username, PDO::PARAM_STR);
    $saveStmt->bindParam(':testName', $testName, PDO::PARAM_STR);
    $saveStmt->bindParam(':questions', $infoResult['questions'], PDO::PARAM_INT); // Преобразование в тип integer
    $saveStmt->bindParam(':division', $division, PDO::PARAM_STR); // Сохранение значения division
    $saveStmt->execute();

} catch (PDOException $e) {
    die("Ошибка выполнения запроса: " . $e->getMessage());
}

// Получение значения поля "questions" из таблицы "student_result"
$studentResultSql = "SELECT questions FROM student_result WHERE result = :result";
$studentResultStmt = $pdo->prepare($studentResultSql);
$studentResultStmt->bindParam(':result', $countResult['count'], PDO::PARAM_INT);
$studentResultStmt->execute();

// Получение результата запроса
$studentResult = $studentResultStmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
    <head>
        <link href="https://fonts.googleapis.com/css?family=Inter&display=swap" rel="stylesheet" />
        <link href="./css/main.css" rel="stylesheet" />
        <title>Результат</title>
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
  background: url(/PD1/images/Тест/photo_2023-05-03_14-40-40.jpg);
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
      width: 731px;
    height: 454px;
    background: rgba(217,217,217,1);
    opacity: 1;
    position: absolute;
    top: 176px;
    left: 387px;
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


.v1_175 {
  width: 267px;
    height: 82px;
    background: rgba(19,21,87,1);
    opacity: 1;
    position: absolute;
    top: 534px;
    left: 630px;
    border-radius: 20px;
}
.v1_176 {
      position: absolute;
    width: 267px;
    height: 82px;
    left: calc(50% - 183px/2 - 110px);
    top: 534px;
    left: 630px;
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
    top: 336px;
    left: 457px;
    border-radius: 18px;
    width: 596px;
    height: 149px;
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
    height: 149px;
    background: rgba(192,192,192,1);
    opacity: 1;
    position: absolute;
    top: 336px;
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
  top: 245px;
  left: 615px;
  font-family: 'Forum';
  font-weight: 'Regular';
  font-size: 35px;
  opacity: 1;
  text-align: left;
    text-align: center;
}
        </style>
    </head>
    <body>
        <div class="v1_167">
            <div class="v1_168"></div>
            <div class="v1_169"></div>
            <div class="box_result"></div>
            <div class="rezult_name">Результаты:</div>
            <div class="v1_175"></div>
            <form method="get" action="/PD1/ЛК/index_lk_student.php">
                <input type="submit" class="v1_176" value="Личный кабинет">
            </form>
            <div class="inp_result"><?php echo "Правильных ответов: " . $countResult['count'];?> <br> <?php echo "Количество вопросов: " . $studentResult['questions'];?></div>
            <div class="v1_177"></div>
            <a href="/PD1/exit.php" class="v1_178">Выход</a>      
        </div>
</body>
</html>

