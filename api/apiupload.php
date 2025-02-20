<?php
include('db_connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $city = $_POST['city'];
    $fake_name = $_POST['fake_name'];
    $debt = $_POST['debt'];
    $reason = $_POST['reason'];

    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === 0) {
        $photo = $_FILES['photo'];
        $photo_path = 'uploads/' . basename($photo['name']);
        move_uploaded_file($photo['tmp_name'], $photo_path);
    } else {
        $photo_path = NULL;
    }

    $result = pg_query_params($db, 
        "INSERT INTO blacklist (name, phone, city, fake_name, debt, reason, photo) 
         VALUES ($1, $2, $3, $4, $5, $6, $7)", 
        array($name, $phone, $city, $fake_name, $debt, $reason, $photo_path)
    );

    if ($result) {
        header('Location: main.php');
        exit();
    } else {
        echo "Ошибка: " . pg_last_error($db);
    }

    pg_close($db);
}
?>