<?php

use yii\helpers\Url;

// Url::to() вызывает UrlManager::createUrl() для создания URL
use \yii\helpers\Html;
use yii\widgets\LinkPager;
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
	<a href="<?= Url::to(['index']) ?>">Лучшие</a>
	<a href="<?= Url::to(['all']) ?>">Все подряд</a>
	<a href="/filter"><i class="fas fa-filter"></i></a>
</div>












        <?php
        foreach ($model as $value): ?>

        			<div class="item">
        					<div class="item-top">
        						<a href="#" class="user-avatar-icon"><img src="<?php echo('img'.$value->ownedByUser->img); ?>" alt=""></a>
        						<a href="#" class="user-nickname"><?php echo($value->ownedByUser->username); ?></a>
        						<span><?php echo($value->date); ?></span>
        					</div>
        					<h2 class="item-content-preview"><a href="<?= Url::to(['post/'.$value->id]) ?>"><?php echo($value->h1); ?></a></h2>
        					<div class="item-tags"><a href="#">Tutorial</a></div>
        					<div class="item-counters">
        						<span><i class="fas fa-gem"></i><?= Html::encode($value->rating) ?></span>
        						<span><i class="fas fa-eye"></i><?= Html::encode($value->count_view) ?></span>
        						<span><i class="fas fa-bookmark"></i><?= Html::encode($value->count_bookmarked) ?></span>
        						<span><i class="fas fa-comment-alt"></i><?= Html::encode($value->rating) ?></span>
        					</div>
        			</div>

        <?php  endforeach; ?>




<?php


        // отображаем постраничную разбивку
        echo LinkPager::widget([
        'pagination' => $pages,
        ]);

?>
</section>

