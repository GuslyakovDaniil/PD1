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

// Обработка удаления
if (isset($_POST['delete'])) {
    $testName = $_POST['test_name'];
    
    // Удаление из таблицы "tests"
    $deleteTestsStmt = $pdo->prepare("DELETE FROM tests WHERE test_name = :test_name");
    $deleteTestsStmt->bindParam(':test_name', $testName);
    $deleteTestsStmt->execute();
    
    // Удаление из таблицы "инфо"
    $deleteInfoStmt = $pdo->prepare("DELETE FROM info WHERE test_name = :test_name");
    $deleteInfoStmt->bindParam(':test_name', $testName);
    $deleteInfoStmt->execute();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Удаление теста</title>
</head>
<body>
    <h2>Удаление теста</h2>
    <form method="POST" action="">
        <label for="test_name">Название теста:</label>
        <input type="text" name="test_name" id="test_name" required>
        <input type="submit" name="delete" value="Удалить">
    </form>
</body>
</html>
