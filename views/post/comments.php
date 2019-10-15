<?php

use yii\helpers\Url;
use app\models\ReplaceDate;
// Url::to() вызывает UrlManager::createUrl() для создания URL
use \yii\helpers\Html;
use yii\widgets\LinkPager;
$this->title = 'About';
$this->registerCssFile('/css/post.css');
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
            <a href="#">Категория</a>
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

                </div>
            </div>


        <?php  endforeach; ?>

        <div class="white-block">
            <p class="prev">Комментарии <span> &nbsp13</span></p>

            <div class="comment-item">
                <div class="user-info">
                    <a href="#">
                        <img src="<?php echo('img'.$value->ownedByUser->img); ?>" alt="123">
                        <span class="user-name"><?php echo($value->ownedByUser->username); ?></span>
                    </a>

                    <span class="date-comment">27/09/96</span>
                </div>
                <p>Спасибо за статью. Было интересно! Сам недавно столкнулся с этим, простая загрузка аватарки в браузере — давала странные результаты в виде развернутых изображений и так простая загрузка аватарки — превратилась в не очень простую — с разбором EXIF.</p>
                <a href="#" class="responseto"><span>Ответить</span></a>
                <a href="#" class="responseto bookmark"><span><i class="fas fa-bookmark"></i></span></a>
            </div>

            <div class="comment-item">
                <div class="user-info">
                    <a href="#">
                        <img src="<?php echo('img'.$value->ownedByUser->img); ?>" alt="123">
                        <span class="user-name"><?php echo($value->ownedByUser->username); ?></span>
                    </a>

                    <span class="date-comment">27/09/96</span>
                </div>
                <p>Спасибо за статью. Было интересно! Сам недавно столкнулся с этим, простая загрузка аватарки в браузере — давала странные результаты в виде развернутых изображений и так простая загрузка аватарки — превратилась в не очень простую — с разбором EXIF.</p>
                <a href="#" class="responseto"><span>Ответить</span></a>
                <a href="#" class="responseto bookmark"><span><i class="fas fa-bookmark"></i></span></a>
            </div>

            <div class="type-comment">
                <p class="prev">Написать комментарий</p>
                <textarea></textarea>
                <button class="preview">Предпросмотр</button>
                <button  class="send preview">Отправить</button>
            </div>

        </div>


</section>
