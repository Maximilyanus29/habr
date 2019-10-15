<?php


use app\models\ReplaceDate;
use yii\helpers\Html;
use yii\helpers\Url; ?>
<section class="content-wrap" id="content-wrap">


    <div class="content">






        <?php
        foreach ($model as $value): ?>

            <div class="item">
                <div class="item-top">
                    <a href="#" class="user-avatar-icon"><img src="<?php echo('img'.$value->ownedByUser->img); ?>" alt=""></a>
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




</section>

