<?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ЧС Кати</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="main-content">
        <div class="carousel-container">
            <div class="carousel">
                <?php
                include('db_connection.php');
                $results = pg_query($db, 'SELECT photo FROM blacklist WHERE photo IS NOT NULL LIMIT 4');
                while ($row = pg_fetch_assoc($results)) {
                    echo "<img src='{$row['photo']}' alt='Фото'>";
                }
                ?>
            </div>
        </div>
        <div class="details">
            <?php
            $results = pg_query($db, 'SELECT * FROM blacklist LIMIT 1');
            if ($row = pg_fetch_assoc($results)) {
                echo "<p>⛔ <span>ФИО:</span> {$row['name']}</p>";
                echo "<p>⛔ <span>Телефон:</span> {$row['phone']}</p>";
                echo "<p>⛔ <span>Город:</span> {$row['city']}</p>";
                echo "<p>⛔ <span>Фейк под которыми работала:</span> {$row['fake_name']}</p>";
                echo "<p>⛔ <span>Долг:</span> {$row['debt']} руб</p>";
                echo "<p>⛔ <span>Причина внесения в ЧС:</span> {$row['reason']}</p>";
            } else {
                echo "<p>Список пуст</p>";
            }
            pg_close($db);
            ?>
        </div>
    </div>

    <div class="navigation">
        <a href="#">Назад</a>
        <a href="#">1</a>
        <a href="#">2</a>
        <a href="#">3</a>
        ...
        <a href="#">998</a>
        <a href="#">999</a>
        <a href="#">1000</a>
        <a href="#">Вперёд</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script src="scripts.js"></script>
</body>
</html>