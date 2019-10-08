

<?php
    $this->registerCssFile('/css/post.css');
    use app\models\ReplaceDate;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\Response;

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
            <div class="item-tags"><a href="#">Tutorial</a></div>
            <?php echo $model->pageText;   ?>

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
                <a href="<?= Url::to(['post/'.$model->id.'#comments']) ?>"><span><i class="fas fa-comment-alt"></i>&nbsp<?= Html::encode(count($model->comments)) ?></span></a>
            </div>

















            <h1>Comments</h1>


            <?php $form = ActiveForm::begin([
                'id' => 'comment-form']); ?>




            <p>Оставить комментарий</p>

            <?= $form->field($comment, 'text')->textarea(['style'=>['width'=>'90%',
                'height'=>'300px']]) ?>




            <div class="form-group">
                <div class="col-lg-offset-1 col-lg-11">
                    <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>

            <?php
            if (empty($comments)){
                echo 'комментариев нет';
            }
            else{
            foreach ($comments as $value):    ?>

            <div class="comment-list" id="comments">
                <div class="user">Кто: <?php echo $value->user->username ?></div>
                <div class="date">Когда: <?= \yii\helpers\Html::encode(ReplaceDate::par_date($value->date))  ?></div>
                <div class="text">Текст: <?php echo $value->messege ?></div></br>
            </div>

            <?php  endforeach; }?>

<?php var_dump(Yii::$app->response->isNotFound)  ?>

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


