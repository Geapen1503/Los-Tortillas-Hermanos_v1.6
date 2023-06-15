<?php

try {
    $db = new PDO('mysql:host=localhost;charset=utf8;dbname=tortillashermanos', 'root', '');
}catch (Exception $e) {
    die('Error connection database ' . $e->getMessage());
}
