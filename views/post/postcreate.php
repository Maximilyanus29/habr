

<?php
$this->registerCssFile('/css/post.css');


use app\models\ReplaceDate;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html; ?>
<section class="content-wrap" id="content-wrap">


    <div class="content">

        <div class="item">

            <?php $form = ActiveForm::begin([
                'id' => 'post-form']); ?>

<h1>Создать пост</h1>



            <p>Выбрать категорию</p>
            <?= $form->field($model, 'product_category')->dropdownList(
            \app\models\Category::find()->select(['name', 'id'])->indexBy('id')->column(),
            ['prompt'=>'Select Category']
            )->label(false); ?>

            <p>Главный заголовок для статьи</p>
            <?= $form->field($model, 'h1')->label(false) ?>


            <p>Напишите текст</p>
            <div class="linebuttons">
                <button onclick="createLink()">Ссылка</button>
                <button onclick="bolder()">Жирный</button>
                <button onclick="header(1)">h1</button>
                <button onclick="header(2)">h2</button>
                <button onclick="header(3)">h3</button>
                <button onclick="header(4)">h4</button>
                <button onclick="header(5)">h5</button>
                <button onclick="header(6)">h6</button>
                <button onclick="abzats()">Абзац</button>
                <button onclick="br()">Отступ 1 строки</button>
                <button onclick="img()">Изображене</button>
                <button onclick="u()">Подеркнутый текст</button>
                <button onclick="i()">Курсив</button>
                <button onclick="strike()">Зачеркнутый текст</button>

            </div>
            <?= $form->field($model, 'text')->textarea()->label(false) ?>

            <p>Результат:</p>
            <div class="item">
                <div class="item-top">
                    <a href="#" class="user-avatar-icon"><img src="/img/24x24.jpg" alt=""></a>
                    <a href="#" class="user-nickname">Ваш никнейм</a>
                    <span>Дата создания</span>
                </div>
                <h2 class="item-content-preview"><a href="#" id="h1res">Заголовок</a></h2>
            <div id="result">

            </div>
            </div>

            <p>введите описание</p>
            <?= $form->field($model, 'description')->textInput()->label(false) ?>



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

    // var bolder = document.querySelector('.bolder');
    // var what_doing = document.querySelector('#what_doing');


    var textarea = document.querySelector('textarea');
    var result = document.querySelector('#result');
    var buttons = document.querySelectorAll('button');
    var h1 = document.querySelector('#createpost-h1');
    var h1res = document.querySelector('#h1res');

    for (button of buttons){
        button.addEventListener('click',update());
    }


function createLink() {
    var linkcode= "<a href='адрес ссылки'>Текст ссылки</a>";
    textarea.value+=linkcode;
}
    function bolder() {
        var linkcode= "<b>Жирный текст</b>";
        textarea.value+=linkcode;
    }

    function header(val) {
        var linkcode= "<h"+val+">Заголовок</h"+val+">";
        textarea.value+=linkcode;
    }

    function abzats() {
        var linkcode= "<p>Новый абзац</p>";
        textarea.value+=linkcode;
    }

    function br() {
        var linkcode= "<br />";
        textarea.value+=linkcode;
    }


    function img() {
        var linkcode= "<img src='ссылка на картинку' alt='описание картинки'>";
        textarea.value+=linkcode;
    }

    function u() {
        var linkcode= "<u>Подчеркнутый текст</u>";
        textarea.value+=linkcode;
    }

    function i() {
        var linkcode= "<i>Курсив</i>";
        textarea.value+=linkcode;
    }

    function strike() {
        var linkcode= "<s>Зачеркнутый текст</s>";
        textarea.value+=linkcode;
    }


function update() {
    result.innerHTML=textarea.value;
}

    function updateh() {
        console.log(h1res);
        h1res.innerHTML=h1.value;
    }


    h1.addEventListener('keyup',updateh);
    textarea.addEventListener('keyup',update);

</script>