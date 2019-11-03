

<?php
$this->registerCssFile('/css/post.css');


use yii\bootstrap\ActiveForm;
use yii\helpers\Html; ?>
<section class="content-wrap" id="content-wrap">


    <div class="content">

        <div class="item">

            <h1>Создание Нового Поста, использовать html разметку</h1>
            <p>Что бы добавить картинку используйте тег < img  src="путь к изображению"  ></p>
            <h1>Для заголовка оборачивайте текст в < h1 > текст < /h1 ></h1>
            <p>Для обзаца оборачивайте текст в < p > текст < /p ></p>


            <?php $form = ActiveForm::begin([
                'id' => 'post-form']); ?>

            <?= $form->field($model, 'product_category')->dropdownList(
            \app\models\Category::find()->select(['name', 'id'])->indexBy('id')->column(),
            ['prompt'=>'Select Category']
            ); ?>


            <?= $form->field($model, 'h1')->textInput() ?>

            <input type="text" id="what_doing" placeholder="Введите сюда текст">
            <p>и нажмите одну из кнопок определющих действие</p>
            <button class="bolder">bolder</button>
            <?= $form->field($model, 'text')->textarea(['style'=>['width'=>'90%',
                'height'=>'300px']]) ?>
            <?= $form->field($model, 'description')->textInput() ?>



            <div class="form-group">
                <div class="col-lg-offset-1 col-lg-11">
                    <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>


        </div>

    </div>

</section>

<script>

    var bolder = document.querySelector('.bolder');
    var what_doing = document.querySelector('#what_doing');
    var textarea = document.querySelector('textarea');
    bolder.onclick=function () {
        textarea.value+='<h1>'+what_doing.value+'</h1>';
    }



</script>