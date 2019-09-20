<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>


<div class="hidden-menu" id="list" style="display: none;">
    <div class="overlay" id="overlay" style="display: none;"></div>
    <ul>
        <a href="#" class="search"><li><span>Поиск</span><i class="fas fa-search"></i></li></a>
        <a href="/"><li>Публикации</li></a>
        <div class="thread">
            <span>Потоки</span>
            <a href="#"><li>Старый Оскол и область</li></a>
            <a href="#"><li>Происшествия</li></a>
            <a href="#"><li>Общество</li></a>
            <a href="#"><li>Спорт</li></a>
            <a href="#"><li>Транспорт</li></a>
            <a href="#"><li>Медицина</li></a>
            <a href="#"><li>Культура</li></a>
            <a href="#"><li>ЖКХ</li></a>
            <a href="#"><li>Мнения</li></a>
            <a href="#"><li>Экономика</li></a>
            <a href="#"><li>Образование</li></a>
            <a href="#"><li>Политика</li></a>
            <a href="#"><li>Фоторепортаж</li></a>
            <a href="#"><li>Туризм</li></a>
            <a href="#"><li>Промышленность</li></a>
            <a href="#"><li>Религия</li></a>
            <a href="#"><li>ОЭМК 45</li></a>
            <a href="#"><li>Народные новости</li></a>
        </div>

        <a href="#"><li>Пользователи</li></a>
        <a href="#"><li>Компании</li></a>
        <a href="#"><li>Помощь</li></a>
        <a href="#"><li>Обратная связь</li></a>
    </ul>
</div>

<header>
    <div class="container-header">
        <nav id="nav"><i class="fas fa-bars"></i></nav>
        <div class="logo"><a href="<?= Url::to(['/']) ?>">Oskol News</a></div>
        <div class="lk"><a href="<?= Url::to(['/lk']) ?>"><i class="far fa-user"></i></a></div>
    </div>
</header>










        <?= $content ?>


<footer>
    <div class="container">
        <h6><a href="/">Habr</a></h6>
        <div class="connection">
            <span><i class="fab fa-twitter-square"></i></span>
            <span><i class="fab fa-google-plus-square"></i></span>
            <span><i class="fab fa-facebook-square"></i></span>
            <span><i class="fas fa-share-alt-square"></i></span>
            <span><i class="fab fa-instagram"></i></span>
            <span><i class="fab fa-vk"></i></span>

        </div>
        <div class="footer__link"><i class="fas fa-globe-europe"></i> &nbsp Настройки языка</div>
        <a href="#" class="footer__link">Полная версия</a>
    </div>
    <div class="link-app">
        <img src="/img/app-store.svg" alt="">
        <img src="/img/google-play.svg" alt="">
    </div>
    <div class="footer_info">© 2006–2019 «TM»</div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
