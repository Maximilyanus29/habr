<?php
use yii\helpers\Html;
use app\models\ReplaceDate;
?>


<section class="content-wrap" id="content-wrap">


    <div class="content">
<div class="white-block">
    <p class="prev">Комментарии <span> &nbsp13</span></p>

<!--    <div class="comment-item">-->
<!--        <div class="user-info">-->
<!--            <a href="#">-->
<!--                <img src="" alt="123">-->
<!--                <span class="user-name">terhrt</span>-->
<!--            </a>-->
<!---->
<!--            <span class="date-comment">sfdgfh</span>-->
<!--        </div>-->
<!--        <p>awesgdhtfy</p>-->
<!--        <a href="#" class="responseto"><span>Ответить</span></a>-->
<!--        <a href="#" class="responseto bookmark"><span><i class="fas fa-bookmark"></i></span></a>-->
<!--    </div>-->

    <?php  foreach ($model as $value):  ?>
    <div class="comment-item">
        <div class="user-info">
            <a href="#">
                <img src="/img<?= Html::encode($value->user->img) ?>" alt="123">
                <span class="user-name"><?= Html::encode($value->user->username) ?></span>
            </a>

            <span class="date-comment"><?php echo(ReplaceDate::par_date($value->date)) ?></span>
        </div>
        <p><?= Html::encode($value->messege) ?></p>
        <a href="#" class="responseto"><span>Ответить</span></a>
        <a href="#" class="responseto bookmark"><span><i class="fas fa-bookmark"></i></span></a>
    </div>

    <?php endforeach; ?>

</div>


</section>