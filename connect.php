<?php
$host="localhost";
$db="practice_posts";
$login="root";
$password="";

$dsn="mysql:host=$host;dbname=$db";

$pdo=[
    PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_OBJ
];
$pdo=new PDO($dsn,$login,$password,$pdo);