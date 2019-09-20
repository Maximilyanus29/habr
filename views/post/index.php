

<?php
    $this->registerCssFile('/css/post.css');
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
                <a href="#" class="user-nickname">Ryaba</a>
                <span>вчера в весь день ебался</span>
            </div>
            <h2 class="item-content-preview"><a href="#"><?php echo $model->h1;?></a></h2>
            <div class="item-tags"><a href="#">Tutorial</a></div>
            <?php echo $model->pageText;   ?>

        </div>








        <!-- 			<div class="item">
                            <div class="item-top">
                                <a href="#" class="user-avatar-icon"><img src="img/24x24.jpg" alt=""></a>
                                <a href="#" class="user-nickname">MagisterLudi</a>
                                <span>вчера в 18:24</span>
                            </div>
                            <h2 class="item-content-preview"><a href="#">Пишем на Rust + CUDA C</a></h2>
                            <div class="item-tags"><a href="#">Tutorial</a></div>
                            <div class="item-counters">
                                <span><i class="fas fa-gem"></i> +53</span>
                                <span><i class="fas fa-eye"></i> 7,3k</span>
                                <span><i class="fas fa-bookmark"></i> 81</span>
                                <span><i class="fas fa-comment-alt"></i> 18</span>
                            </div>
                    </div> -->

</section>
</div>










<script>

    window.onload= function(){





        const open_menu=()=>{
            console.log('gwaf');
            let list=document.getElementById('list'),
                nav=document.getElementById('nav'),
                overlay=document.getElementById('overlay');

            if (list.style.display=='none') {
                list.style.left='0';
                list.style.display='block';
                overlay.style.display='block';

            }
            else {
                list.style.left='-70%';
                list.style.display='none';
                overlay.style.display='none';
            }



        };

        nav.addEventListener('click', open_menu);
        overlay.addEventListener('click', open_menu);
        window.addEventListener('fetch', ()=>'получение');





    };
</script>
</body>
</html>