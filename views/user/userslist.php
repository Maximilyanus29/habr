<?php

use yii\helpers\Html;
$this->registerCssFile('/css/user.css');
$this->registerCssFile('/css/post.css');

?>
<section class="content-wrap">



    <div class="white-block display-flex white-block_row">


        <?php foreach ($model as $value):  ?>

        <div class="users-info-wrap display-flex">
            <a href="user/<?= Html::encode($value->id); ?>"><div class="user-block user-block_32 user-block_default-img">H</div></a>
            <div class="user-info">
                <span class="user-info__name"><?= Html::encode($value->name); ?></span>
                <a href="user/<?= Html::encode($value->id); ?>"><span class="user-info__link">@<?= Html::encode($value->username); ?></span></a>
<br>
                    <span class="user-info__name">Пользователь</span>

            </div>


        </div>




        <?php  endforeach; ?>

</section>