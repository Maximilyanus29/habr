<?php

use yii\helpers\Url;

// Url::to() вызывает UrlManager::createUrl() для создания URL

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
            <a href="/top" class="active">Лучшие</a>
            <a href="<?=Url::to('all') ?>">Все подряд</a>
            <a href="/filter"><i class="fas fa-filter"></i></a>
        </div>




        <div class="item">
            <div class="item-top">
                <a href="#" class="user-avatar-icon"><img src="/img/24x24.jpg" alt=""></a>
                <a href="#" class="user-nickname">MagisterLudi</a>
                <span>вчера в 18:24</span>
            </div>
            <h2 class="item-content-preview"><a href="<?=Url::to('post') ?>">post</a></h2>
            <div class="item-tags"><a href="#">Tutorial</a></div>
            <div class="item-counters">
                <span><i class="fas fa-gem"></i> +53</span>
                <span><i class="fas fa-eye"></i> 7,3k</span>
                <span><i class="fas fa-bookmark"></i> 81</span>
                <span><i class="fas fa-comment-alt"></i> 18</span>
            </div>
        </div>


</section>

