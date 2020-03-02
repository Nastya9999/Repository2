<?php
$title="Добавление поста";
require_once __DIR__ . "/../parts/header.php" ?>
    <h2 class="offset-3">Пост...</h2>
    <div class="card mt-3 col-8 offset-2">
        <img src="<?=$post->photo ? 'uploads/' . $post->photo : ''?>"
             class="card-img-top img-big" alt="Фото">
        <div class="card-body">
            <h5 class="card-title"><?=$post->title ?></h5>
            <p class="card-text">
                <?=date_format(new DateTime($post->datePublication),
                    'd.m.Y')?></p>

            <span class="likebtn-wrapper" data-theme="likebtn" data-lang="ru" data-i18n_like="Мне нравится" data-ef_voting="heartbeat" data-identifier="item_1" data-show_dislike_label="true" data-counter_frmt="km"></span>
            <script>(function(d,e,s){if(d.getElementById("likebtn_wjs"))return;a=d.createElement(e);m=d.getElementsByTagName(e)[0];a.async=1;a.id="likebtn_wjs";a.src=s;m.parentNode.insertBefore(a, m)})(document,"script","//w.likebtn.com/js/w/widget.js");</script>
            <ul></ul>
            <a class="btn btn-outline-danger" href='deletePost.php?id=<?=$post->id;?>'>Удалить</a>
            <ul></ul>
            <a class="btn btn-outline-primary" href='updatePost.php?id=<?=$post->id;?>'>Изменить</a>
            <ul></ul>
            <a class="btn btn-outline-info" href='index.php?id='>Назад</a>
        </div>
    </div>
<?php require_once __DIR__ . "parts/footer.php" ?>