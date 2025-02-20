<?php
$db = pg_connect(getenv('DATABASE_URL'));
if (!$db) {
    die("Ошибка подключения к базе");
}
pg_query($db, 'CREATE TABLE IF NOT EXISTS blacklist (
    id SERIAL PRIMARY KEY,
    name TEXT,
    phone TEXT,
    city TEXT,
    fake_name TEXT,
    debt TEXT,
    reason TEXT,
    photo TEXT
)');
?>