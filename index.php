<?php

#require_once "bootstrap.php";
#$posts=$newPost ->getAllPosts();
#require_once "posts/index.view.php";

require_once  'vendor/autoload';
$route=$_GET['route'];
switch($route){
    case 'insertPost': require_once 'app/db/posts/insertPost.php';
        break;
    case 'deletePost': require_once 'app/db/posts/deletePost.php';
        break;
    case 'updatePost': require_once 'app/db/posts/updatePost.php';
        break;
}
