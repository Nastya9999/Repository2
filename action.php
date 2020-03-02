<?php
session_start();
require_once "connect.php";
$_SESSION["name"]=trim(filter_var($_POST["name"]??"",FILTER_SANITIZE_STRING));
$_SESSION["login"]=trim(filter_var($_POST["login"]??"",FILTER_SANITIZE_STRING));
/*$_SESSION["email"]=trim(filter_var($_POST["email"]??"",FILTER_SANITIZE_EMAIL));*/
$_SESSION["password"]=trim(filter_var($_POST["password"]??"",FILTER_SANITIZE_STRING));
/*$_SESSION["age"]=trim(filter_var($_POST["age"]??"",FILTER_SANITIZE_NUMBER_INT));*/
/*$_SESSION["phone"]=trim(filter_var($_POST["phone"]??"",FILTER_SANITIZE_STRING));*/
$_SESSION["auth"]=false;

$error=[];
if(isset($_POST["go"])){
    $stmt=$pdo->prepare("select * from users where password=:pass");
    $stmt->execute(['pass'=>$_SESSION['password']]);

    if(!filter_var($_SESSION['login'],FILTER_VALIDATE_EMAIL)){
        $error[]="Login({$_SESSION['login']})-некорректно";
        $_SESSION["alert"]="alert-danger";
        echo"HELLO!";
    }
    if($stmt->rowCount()>0){
        $error[]="Данный пароль уже имеется в БД!!!\n";
        $_SESSION["alert"]="alert-danger";
    }
    if(count($error)==0){
        $_SESSION["auth"]=true;
    }
    if(!$_SESSION["auth"]){
        header("Location:index.php");

    }
    else{
        $_SESSION["msg"]="Ваши данные корректны!!!\n";
        $stmt=$pdo->prepare("INSERT INTO users(`name_user`,login,password,id)
        VALUES(?,?,?,?)");
        $stmt->execute([$_SESSION['name'],$_SESSION['login'],
                $_SESSION['password']
                // $_SESSION['age']
            ]
        );
        header("Location:index.php");

    }
    if(strlen($_SESSION["password"])<4){
        $_SESSION["msg"]="Пароль слишком короткое\n";
        $_SESSION["alert"]="alert-danger";
    }
    else{
        $_SESSION["msg"]="Вы успешно зарегистрировались!";
        $_SESSION["alert"]="alert-success";
        $_SESSION["auth"]=true;
    }
    if(!$_SESSION["auth"]) {
        header("Location:index.php");
    }else{
        header("Location:showPost.php");
    }
}
