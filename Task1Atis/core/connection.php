<?php
try {
    return new PDO('mysql:host=localhost:3306;dbname=task1', 'phpmyadmin', 'hoho');
} catch (PDOException $e) {
    die('Something went wrong');
}
