<?php
require_once "bootstrap.php";
if(!isset($_GET['id'])||empty($_GET['id'])){
    exit;
}
if($newPost->deletePost($_GET['id'])){header("Location: /"); exit;}
