<?php

use yii\helpers\Url;
use app\models\ReplaceDate;
// Url::to() вызывает UrlManager::createUrl() для создания URL
use \yii\helpers\Html;
use yii\widgets\LinkPager;
$this->title = 'About';

?>
<section class="content-wrap" id="content-wrap">


    <div class="content">
        <!-- 			<div class="item">
                            <div class="item-top">
                                <a href="#" class="user-avatar-icon"><img src="img/24x24.jpg" alt=""></a>
                                <a href="#" class="user-nickname">MagisterLudi</a>
                                <span>вчера в 18:24</span>
                            </div>
                            <h2 class="item-content-preview"><a href="/watchPost.html">Пишем на Rust + CUDA C</a></h2>
                            <div class="item-tags"><a href="#">Tutorial</a></div>
                            <div class="item-counters">
                                <span><i class="fas fa-gem"></i> +53</span>
                                <span><i class="fas fa-eye"></i> 7,3k</span>
                                <span><i class="fas fa-bookmark"></i> 81</span>
                                <span><i class="fas fa-comment-alt"></i> 18</span>
                            </div>
                    </div>
         -->
        <div class="filter-line">
            <a href="<?= Url::to(['index']) ?>">Его посты</a>
            <a href="<?= Url::to(['all']) ?>">Его Фото</a>
            <a href="/filter"><i class="fas fa-filter"></i></a>
        </div>












        <?php
        foreach ($model as $value): ?>

            <div class="item">
                <div class="item-top">
                    <a href="#" class="user-avatar-icon"><img src="<?php echo('/img'.$value->ownedByUser->img); ?>" alt=""></a>
                    <a href="#" class="user-nickname"><?php echo($value->ownedByUser->username); ?></a>
                    <span><?php echo(ReplaceDate::par_date($value->date)); ?></span>
                </div>
                <h2 class="item-content-preview"><a href="<?= Url::to(['post/'.$value->id]) ?>"><?php echo($value->h1); ?></a></h2>
                <div class="item-tags"><a href="#">Tutorial</a></div>
                <div class="item-counters">
                    <span><i class="fas fa-gem"></i>&nbsp<?= Html::encode($value->rating) ?></span>
                    <span><i class="fas fa-eye"></i>&nbsp<?= Html::encode($value->count_view) ?></span>
                    <a
                        id="fav"
                        rel="sidebar"
                        href=""
                        onclick="bookmark(this);return false"
                        class="link"><span><i class="fas fa-bookmark"></i>&nbsp<?= Html::encode($value->count_bookmarked) ?></span></a>
                    <a href="<?= Url::to(['post/'.$value->id.'#comments']) ?>"><span><i class="fas fa-comment-alt"></i>&nbsp<?= Html::encode(count($value->comments)) ?></span></a>
                </div>
            </div>


        <?php  endforeach; ?>

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





</section>

