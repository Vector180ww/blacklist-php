<?php
header('Content-Type: application/json');
include('db_connection.php');

if (isset($_GET['name'])) {
    $name = $_GET['name'];
    $results = pg_query($db, "SELECT name, reason, photo FROM blacklist WHERE name LIKE '%$name%'");
    $models = [];

    while ($row = pg_fetch_assoc($results)) {
        $models[] = [
            'name' => $row['name'],
            'description' => $row['reason'],
            'image_url' => $row['photo'] ?: ''
        ];
    }

    echo json_encode($models);
} else {
    echo json_encode([]);
}

pg_close($db);
?>