<?php
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

// Обработка формы поиска
if (isset($_POST['search'])) {
    $testName = $_POST['test_name'];
    $username = $_POST['username'];
    $division = $_POST['division'];

    $query = "SELECT test_name, username, questions, result, division FROM student_result WHERE 1 = 1";

    if (!empty($division)) {
        $query .= " AND division = :division";
    }

    if (!empty($username)) {
        $query .= " AND username = :username";
    }

    if (!empty($testName)) {
        $query .= " AND test_name = :test_name";
    }

    $stmt = $pdo->prepare($query);

    if (!empty($division)) {
        $stmt->bindValue(':division', $division);
    }

    if (!empty($username)) {
        $stmt->bindValue(':username', $username);
    }

    if (!empty($testName)) {
        $stmt->bindValue(':test_name', $testName);
    }

    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Поиск результата теста</title>
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
  background: url(/PD1/images/photo_2023-05-22_20-55-16.jpg);
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
  width:1281px;
  height: 523px;
  background: rgba(217,217,217,1);
  opacity: 1;
  position: absolute;
  top: 178px;
  left: 119px;
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
  left:217px;
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
  left: 335px;
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
  left: 369px;
    border-radius: 20px;
}
.v1_176 {
  position: absolute;
width: 180px;
height: 82px;
left: calc(50% - 183px/2 - 110px);
top: 573px;
left: 369px;
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
left: 217px;
            }
            .inp_name_test{
position: absolute;
top:263px;
left: 217px;
            }
            .inp_result{
    border: 2px solid black;
    position: absolute;
    top: 223px;
    left: 757px;
    
    width: 596px;
    height: 438px;
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
    width: 597px;
    height: 437px;
    background: rgba(192,192,192,1);
    opacity: 1;
    position: absolute;
    top: 224px;
    left: 757px;
    
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
        .box_out{
        width: 143px;
    height: 61px;
    background: rgba(217,217,217,1);
    opacity: 1;
    position: absolute;
    top: 62px;
    left: 68px;
    border-radius: 20px;
        }
    .result-window {
        width: 593px;
            
            overflow-y: auto;
            z-index: 10000;
            position:relative;
            top: 225px;
    left: 758px;
    height: 433px;
        }

        /* Стили для таблицы */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th, table td {
            border: 1px solid #ccc;
            padding: 8px;
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
            
            <div class="grup_up">Группа:</div>
            <div class="grup"></div>
            
            <div class="name_up">Имя студента:</div>
            <div class="name"></div>
            
            <div class="box_result"></div>
            <div class="v1_175"></div>
            <div class="box_out"></div>
    <form method="post" action="">
        <div class="inp_name_test">
                     <input style="text-align: center;border-radius: 18px; width: 496px;height: 58px;background: transparent;"type="text" id="test_name" name="test_name">
                </div>
                
                 <div class="inp_name">
                    <input style = "text-align: center;border-radius: 18px; width: 496px;height: 58px;background: transparent;" type="text" id="division" name="division">
                </div>
                
                <div class="inp_grup">
                    <input style="text-align: center;border-radius: 18px; width: 496px;height: 58px;background: transparent;" type="text" id="username" name="username">
                </div>

        <input type="submit" class="v1_176" value="Поиск" name="search">
        <a href="/PD1/exit.php" class="v1_178">Выход</a>
    </form>
        <div class="inp_result">
                    
        </div>
            <div class="box_lk_out"></div>
            <a href="/PD1/ЛК/index_lk_teacher.php" class="lk_out">Личный кабинет</a>
            <?php if (isset($results)): ?>
                <?php if (count($results) > 0): ?>
                    <div class="result-window">
                        <table>
                            <thead>
                                <tr>
                                    <th>Название теста</th>
                                    <th>Имя пользователя</th>
                                    <th>Группа</th>
                                    <th>Кол-во вопросов</th>
                                    <th>Результат</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($results as $row): ?>
                                    <tr>
                                        <td><?php echo $row['test_name']; ?></td>
                                        <td><?php echo $row['username']; ?></td>
                                        <td><?php echo $row['division']; ?></td>
                                        <td><?php echo $row['questions']; ?></td>
                                        <td><?php echo $row['result']; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <p>Нет результатов.</p>
                <?php endif; ?>
            <?php endif; ?>
    </div>
</body>
</html>

