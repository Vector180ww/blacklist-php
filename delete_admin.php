<?php
session_start();
include('db_connection.php');

if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['password'])) {
        if ($_POST['password'] === 'admin123') {
            $_SESSION['admin'] = true;
        } else {
            echo "Неверный пароль!";
            exit();
        }
    } else {
        echo '<form method="POST"><input type="password" name="password" placeholder="Пароль"><button type="submit">Войти</button></form>';
        exit();
    }
}

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    pg_query($db, "DELETE FROM blacklist WHERE id = $id");
    header('Location: delete_admin.php');
    exit();
}

$results = pg_query($db, 'SELECT id, name FROM blacklist');
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Удаление записей</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="delete-admin-container">
        <h1>Удаление записей</h1>
        <ul>
            <?php
            while ($row = pg_fetch_assoc($results)) {
                echo "<li>{$row['name']} ";
                echo "<form method='POST' style='display:inline;'>";
                echo "<input type='hidden' name='id' value='{$row['id']}'>";
                echo "<button type='submit'>Удалить</button>";
                echo "</form></li>";
            }
            pg_close($db);
            ?>
        </ul>
        <a href="main.php">Вернуться на главную</a>
    </div>
</body>
</html>