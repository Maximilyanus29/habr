<?php

use yii\helpers\Url;
use app\models\ReplaceDate;
// Url::to() вызывает UrlManager::createUrl() для создания URL
use \yii\helpers\Html;
use yii\widgets\LinkPager;
$this->title = 'OskolNews | Новости Старого Оскола, бесплатная публикация новостей и статей';



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
	<a href="#" onclick="gofilter()"><i class="fas fa-filter"></i></a>
</div>

        <div id="toggle"  class="filter-line close">
            <a href="<?= Url::to(['index']) ?>">Этот фильтр пока не работает</a>
        </div>












        <?php
        foreach ($model as $value): ?>

        			<div class="item">
        					<div class="item-top">
        						<a href="<?= Url::to(['user/'.$value->ownedByUser->id]) ?>" class="user-avatar-icon"><img src="<?php echo('img'.$value->ownedByUser->img); ?>" alt=""></a>
        						<a href="<?= Url::to(['user/'.$value->ownedByUser->id]) ?>" class="user-nickname"><?php echo($value->ownedByUser->username); ?></a>
        						<span><?php echo(ReplaceDate::par_date($value->date)); ?></span>
        					</div>
        					<h2 class="item-content-preview"><a href="<?= Url::to(['post/'.$value->id]) ?>"><?php echo($value->h1); ?></a></h2>
<!--        					<div class="item-tags"><a href="#">Tutorial</a></div>-->
        					<div class="item-counters">
        						<span><i class="fas fa-gem"></i>&nbsp<?= Html::encode($value->rating) ?></span>
        						<span><i class="fas fa-eye"></i>&nbsp<?= Html::encode($value->count_view) ?></span>
                                <a
                                        id="fav"
                                        rel="sidebar"
                                        href="<?php
                                        if (Yii::$app->user->isGuest){
                                            $bookmarkhref = '/login';
                                        }
                                        else{
                                            $bookmarkhref = '/addbookmark/'.$value->id;
                                        }
                                        echo $bookmarkhref;

                                        ?>"
                                        onclick="bookmark(this);return false"
                                        class="link"><span><i class="fas fa-bookmark"></i>&nbsp<?= Html::encode($value->count_bookmarked) ?></span></a>
                                <a href="<?= Url::to(['post/'.$value->id.'/comments']) ?>"><span><i class="fas fa-comment-alt"></i>&nbsp<?= Html::encode(count($value->comments)) ?></span></a>
        					</div>
        			</div>


        <?php  endforeach; ?>




<?php


        // отображаем постраничную разбивку
        echo LinkPager::widget([
        'pagination' => $pages,
            'maxButtonCount'=>3,
            'prevPageLabel'=>'&lsaquo;',
           'nextPageLabel'=>'&rsaquo;',
            'class' => '\yii\widgets\LinkPager',
//        'pager' => [
//
//
//
//        ]
        ]);

?>
</section>

<script>

    function gofilter(){
        var toggle = document.getElementById('toggle');

        if ('close' == toggle.classList[1]) {
            console.log(toggle.classList[1]);
            toggle.classList.remove('close');
        }
        else {
            toggle.classList.add('close');
        }
    }



</script>