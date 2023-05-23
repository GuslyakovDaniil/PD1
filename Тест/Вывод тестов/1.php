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

<style>
.result-window {
    width: 593px;
    overflow-y: auto;
    z-index: 10000;
    position: relative;
    top: 225px;
    left: 758px;
    height: 433px;
}

/* Стили для таблицы */
table {
    width: 100%;
    border-collapse: collapse;
}

table th,
table td {
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

<?php
$dbHost = 'localhost';
$dbName = 'testingsystem';
$dbUser = 'postgres';
$dbPass = 'mysql';

try {
    $pdo = new PDO("pgsql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Выполнение запроса
    $query = "SELECT test_name, questions FROM info";
    $stmt = $pdo->query($query);
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Вывод результатов
    if (count($rows) > 15) {
        echo '<div class="result-window">';
    }

    echo '<table>';
    echo '<thead>';
    echo '<tr><th>Название теста</th><th>Количество вопросов</th></tr>';
    echo '</thead>';
    echo '<tbody>';

    foreach ($rows as $row) {
        echo '<tr>';
        echo '<td>' . $row['test_name'] . '</td>';
        echo '<td>' . $row['questions'] . '</td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';

    if (count($rows) > 15) {
        echo '</div>'; // Закрытие окна с полосой прокрутки
    }
} catch (PDOException $e) {
    die("Ошибка подключения к базе данных: " . $e->getMessage());
}
?>
