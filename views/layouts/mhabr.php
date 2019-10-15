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



if (Yii::$app->user->isGuest){
    $href='login';
    $userid=null;
    $user="Авторизуйтесь";
    $userhref='';
}
else{
    $user='Привет '.Yii::$app->user->identity->username;
    $userhref=Yii::$app->user->identity->id;
    $userid='lk';
    $href='#';
}



AppAsset::register($this);
$this->registerLinkTag([
    'rel' => 'shortcut icon',
    'type' => 'image/x-icon',
    'href' => '../../web/favicon.png',]);
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


<div class="hidden-menu hidden-menu-left" id="list">
    <div class="overlay" id="overlay""></div>
    <ul>
        <a href="/search" class="search"><li><span>Поиск</span><i class="fas fa-search"></i></li></a>
        <a href="/"><li>Публикации</li></a>
        <div class="thread">
            <span>Потоки</span>
            <a href="<?=  Url::to(['category/1']) ?>"><li>Старый Оскол и область</li></a>
            <a href="<?=  Url::to(['category/2']) ?>"><li>Происшествия</li></a>
            <a href="<?=  Url::to(['category/3']) ?>"><li>Общество</li></a>
            <a href="<?=  Url::to(['category/4']) ?>"><li>Спорт</li></a>
            <a href="<?=  Url::to(['category/5']) ?>"><li>Транспорт</li></a>
            <a href="<?=  Url::to(['category/6']) ?>"><li>Медицина</li></a>
            <a href="<?=  Url::to(['category/7']) ?>"><li>Культура</li></a>
            <a href="<?=  Url::to(['category/8']) ?>"><li>ЖКХ</li></a>
            <a href="<?=  Url::to(['category/9']) ?>"><li>Мнения</li></a>
            <a href="<?=  Url::to(['category/10']) ?>"><li>Экономика</li></a>
            <a href="<?=  Url::to(['category/11']) ?>"><li>Образование</li></a>
            <a href="<?=  Url::to(['category/12']) ?>"><li>Политика</li></a>
            <a href="<?=  Url::to(['category/13']) ?>"><li>Фоторепортаж</li></a>
            <a href="<?=  Url::to(['category/14']) ?>"><li>Туризм</li></a>
            <a href="<?=  Url::to(['category/15']) ?>"><li>Промышленность</li></a>
            <a href="<?=  Url::to(['category/16']) ?>"><li>Религия</li></a>
            <a href="<?=  Url::to(['category/17']) ?>"><li>ОЭМК 45</li></a>
            <a href="<?=  Url::to(['category/18']) ?>"><li>Народные новости</li></a>
        </div>

        <a href="/users"><li>Пользователи</li></a>
        <a href="/companyes"><li>Компании</li></a>
        <a href="/help"><li>Помощь</li></a>
        <a href="/callback"><li>Обратная связь</li></a>
    </ul>
</div>


<div class="hidden-menu hidden-menu-right" id="lkList" style="display: none;">
    <div class="overlay" id="overlay" style="display: none;"></div>
    <ul>

        <a href="#"><li><?php echo $user;?></li></a>
        <?= Html::a("<li>Выйти</li>", ['/site/logout'], [
            'data' => ['method' => 'post']
        ]);?>



        <a href="<?= Url::to(['user/'.$userhref]) ?>"><li>Мои посты</li></a>
        <a href="<?= Url::to(['post/postcreate'])  ?>"><li>Создать пост</li></a>

    </ul>
</div>

<header>
    <div class="container-header">
        <nav id="nav"><i class="fas fa-bars"></i></nav>
        <div class="logo"><a href="<?= Url::to(['/']) ?>">Oskol News</a></div>
        <div class="lk" id="<?php echo $userid ?>"><a href="<?php  echo $href ?>"><i class="far fa-user"></i></a></div>
    </div>
</header>









        <?= $content ?>


<footer>
    <div class="container">
        <h6><a href="/">OskolNews</a></h6>
        <div class="connection">
            <a href="https://twitter.com/Maximilyan29"><span><i class="fab fa-twitter-square"></i></span></a>
            <a href="https://www.facebook.com/profile.php?id=100001819157953"><span><i class="fab fa-facebook-square"></i></span></a>
            <a href="https://www.instagram.com/sani.tar.gz/?hl=ru"><span><i class="fab fa-instagram"></i></span></a>
            <a href="https://vk.com/ryabchik29"><span><i class="fab fa-vk"></i></span></a>

        </div>
<!--        <div class="footer__link"><i class="fas fa-globe-europe"></i> &nbsp Настройки языка</div>-->
<!--        <a href="#" class="footer__link">Полная версия</a>-->
<!--    </div>-->
<!--    <div class="link-app">-->
<!--        <img src="/img/app-store.svg" alt="">-->
<!--        <img src="/img/google-play.svg" alt="">-->
<!--    </div>-->
    <div class="footer_info">© 2006–2019 «TM»</div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
