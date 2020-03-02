<?php
require_once "bootstrap.php";
$title="Просмотр информации";
$post=$newPost->getPostId($_GET['id']);
if(!$post){
    header("Location:/");
    exit;
}
require_once "/../posts/showPost.view.php";