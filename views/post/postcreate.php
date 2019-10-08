

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
            <?= $form->field($model, 'text')->textInput(['style'=>['width'=>'90%',
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