<?php
$db = pg_connect('postgresql://neondb_owner:npg_uNx61pWBvDLC@ep-orange-waterfall-a89m7agu-pooler.eastus2.azure.neon.tech/neondb?sslmode=require');
if (!$db) {
    die("Ошибка подключения: " . pg_last_error());
}
echo "Подключение успешно!";
?>