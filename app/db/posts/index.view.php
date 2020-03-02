<?php
$title="Главная страница";
require_once __DIR__."/../parts/header.php"?>
<?php
    $title="Шаг № 2";
    require_once __DIR__."/../parts/header.php";
    ?>
    <? $_SESSION["alert"]?>
    <?= nl2br($_SESSION["msg"])?>
    <?=$_SESSION["name"]?>
    <?=$_SESSION["Login"]?>
    <?=$_SESSION["password"]?>

<h2>Посты</h2>

<a class="btn btn-primary mt-3 mb-3 p-2" href="../../insertPost.php">
Добавить новую запись
</a>
<div class="row">
    <?php $i=1;
    foreach ($posts as $post): ?>
    <div class="card mt-2 p-2 col-md-4 col-sm-6">
        <img src="<?=$post->photo ? 'uploads/' . $post->photo : ''?>"
             class="card-img-top img-small" alt="фото">
        <div class="card-body">
            <h5 class="card-title">
                <?=$post->title ?>
            </h5>
            <p class="card-text">
                <?=date_format(new DateTime($post->datePublication),'d.m.Y')?>
            </p>
            <a class="btn btn-info p-2" style="width:100%;"
               href='../showPost.php?id=<?=$post->id;?>'>
               Подробно</a>

               <span class="likebtn-wrapper" data-theme="likebtn" data-lang="ru" data-i18n_like="Мне нравится" data-ef_voting="heartbeat" data-identifier="item_1" data-show_dislike_label="true" data-counter_frmt="km"></span>
<script>(function(d,e,s){if(d.getElementById("likebtn_wjs"))return;a=d.createElement(e);m=d.getElementsByTagName(e)[0];a.async=1;a.id="likebtn_wjs";a.src=s;m.parentNode.insertBefore(a, m)})(document,"script","//w.likebtn.com/js/w/widget.js");</script>
<a href="insertPost" class="btn btn-outline-info ml-3">Кнопка на index.view!</a>
        </div>
    </div>
<?php endforeach;?>