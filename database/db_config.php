<?php

// Nastavenia pripojenia k databáze
define('DB_HOST', 'localhost');
define('DB_NAME', 'project_database');
define('DB_PORT', 3306);
define('DB_USER', 'root');
define('DB_PASSWORD', '');

// Možnosti PDO
define('PDO_OPTIONS', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
]);

