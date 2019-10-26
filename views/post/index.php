

<?php
    $this->registerCssFile('/css/post.css');
    use app\models\ReplaceDate;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\Response;
use app\models\User;


$user = $model->ownedByUser->is_admin;
if ($user==1){
    $isAdmin="Администратор";
}
else{
     $isAdmin="Пользователь";
}

$this->title = strip_tags($model->h1);


?>

<section class="content-wrap" id="content-wrap">


<!--    <div class="filter-line">-->
<!---->
<!--        <a href="#" class="active">Лучшие</a>-->
<!--        <a href="#">Все подряд</a>-->
<!--        <a href="#"><i class="fas fa-filter"></i></a>-->
<!---->
<!--    </div>-->
    <div class="content">


        <!-- 				<div class="item-counters">
                                <span><i class="fas fa-gem"></i> +53</span>
                                <span><i class="fas fa-eye"></i> 7,3k</span>
                                <span><i class="fas fa-bookmark"></i> 81</span>
                                <span><i class="fas fa-comment-alt"></i> 18</span>
                            </div>
         -->



        <div class="item">
            <div class="item-top">
                <a href="#" class="user-avatar-icon"><img src="/img/24x24.jpg" alt=""></a>
                <a href="#" class="user-nickname"><?php echo($model->ownedByUser->username); ?></a>
                <span><?= \yii\helpers\Html::encode(ReplaceDate::par_date($model->date))  ?></span>
            </div>
            <h2 class="item-content-preview"><a href="#"><?php echo $model->h1;?></a></h2>
<!--            <div class="item-tags"><a href="#">Tutorial</a></div>-->
            <?php echo $model->pageText;   ?>
<hr />
            <div class="item-counters">
                <span class="rating" id="rating"><a href="<?= Url::to(['post/ratingplus/'.Html::encode($model->id)]) ?>">+ </a><i class="fas fa-gem"></i>&nbsp<?= Html::encode($model->rating) ?><a
                            href="<?= Url::to(['post/ratingminus/'.Html::encode($model->id)]) ?>"> -</a></span>
                <span><i class="fas fa-eye"></i>&nbsp<?= Html::encode($model->count_view) ?></span>
                <a
                        id="fav"
                        rel="sidebar"
                        href=""
                        onclick="bookmark(this);return false"
                        class="link"><span><i class="fas fa-bookmark"></i>&nbsp<?= Html::encode($model->count_bookmarked) ?></span></a>
            </div>

        </div>

    </div>

    <div class="white-block display-flex white-block_row">
        <div class="users-info-wrap display-flex">
            <div class="user-block user-block_64 user-block_default-img"><img src="/img/<?php echo($model->ownedByUser->img); ?>" alt=""></div>
            <div class="user-block user-block_64 user-block_rating">
                <span class="user-block__rating-id"><?php echo($model->ownedByUser->karma); ?></span>
                <div class="user-block__rating-name">Карма</div>
            </div>
            <div class="user-block user-block_64 user-block_rating">
                <span class="user-block__rating-id"><?php echo($model->ownedByUser->rating); ?></span>
                <div class="user-block__rating-name">Рейтинг</div>
            </div>
        </div>


        <div class="user-info">
            <span class="user-info__name"><?php echo($model->ownedByUser->name); ?></span>
            <a href="user/<?php echo($model->ownedByUser->id); ?>"><span class="user-info__link">@<?php echo($model->ownedByUser->username); ?></span></a>
        </div>

        <div class="white-block__who">
            <span class="user-info__name"><?php echo($isAdmin) ?></span>
        </div>

        <a href="#" class="button button_material"><span>Подписаться</span></a>
    </div>

    <div class="white-block display-flex white-block_row">


        <div class="white-block__share-desc">Поделиться публикацией</div>

        <div class="sharing">
            <span class="sharing__item-share sharing__item-share_32"><i class="fab fa-twitter-square"></i></span>
            <span class="sharing__item-share sharing__item-share_32"><i class="fab fa-twitter-square"></i></span>
            <span class="sharing__item-share sharing__item-share_32"><i class="fab fa-twitter-square"></i></span>
            <span class="sharing__item-share sharing__item-share_32"><i class="fab fa-twitter-square"></i></span>
            <span class="sharing__item-share sharing__item-share_32"><i class="fab fa-twitter-square"></i></span>
            <span class="sharing__item-share sharing__item-share_32"><i class="fab fa-twitter-square"></i></span>
        </div>



    </div>


    <div class="white-block display-flex white-block_row">


        <a href="<?= Url::to('/post/'.$model->id.'/comments')  ?>" class="button button_center"><span><i class="fas fa-comment-alt"></i>&nbspКомментарии <?php echo count($model->comments)  ; ?></span></a>
    </div>
</section>


















