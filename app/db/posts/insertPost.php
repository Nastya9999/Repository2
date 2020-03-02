<?php

require_once "bootstrap.php";
/*if(count($_POST)>0){
    $_POST["id"]=date("Y-m-d");
    $id= $newPost->insertPost($_POST);
    header("Location: /");
    exit;
}*/


if (isset($_POST['btnPost'])) {
    $_POST['datePublication'] = date("Y-m-d");

    $fileName = $_FILES['photo']['name'];
    $fileTemp = $_FILES['photo']['tmp_name'];
    $fileSize = $_FILES['photo']['size'];
    $fileError = $_FILES['photo']['error'];
    $fileEt = strtolower(end(explode('.', $fileName)));
    $fileName = explode('.', $fileName)[0];
    $extensions = ['jpg', 'jpeg', 'png'];
    if (in_array($fileEt, $extensions)) {
        if ($fileSize <= 50000) {
            if ($fileError == 0) {
                $_POST['photo'] = implode('.', [$fileName, $fileEt]);
            }
        }
    } else {
        $_POST['photo'] = "5.jpg";
    }

    $id = $newPost->insertPost($_POST);
    if ($id != null) {
        $fileDestination = "uploads/" . $_POST['photo'];
        move_uploaded_file($fileTemp, $fileDestination);
    }
    header("Location:/");
    exit;
}
require_once "posts/insertPost.view.php";