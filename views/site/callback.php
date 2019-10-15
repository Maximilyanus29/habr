
<?php
$this->registerCssFile('/css/user.css');
$this->registerCssFile('/css/post.css');

use yii\helpers\Html;
?>

<section class="content-wrap">
    <div class="white-block display-flex white-block_row">


<div class="tm-page tm-feedback__container tm-page_narrow"><!----> <div><div class="tm-section-name"><h1 class="tm-section-name__text">
                Обратная связь
            </h1></div> <div class="tm-feedback"><form><div class="tm-fieldset tm-feedback__fieldset"><div class="tm-fieldset__header"><span class="tm-fieldset__title">Укажите тему обращения:</span></div> <div class="tm-fieldset__container"><div class="tm-select__container"><select class="tm-select"><option value="1">
                                    Общие вопросы
                                </option><option value="2">
                                    Ошибка в работе сайта
                                </option><option value="3">
                                    Уязвимость на сайте
                                </option><option value="4">
                                    Нарушение правил сайта
                                </option><option value="5">
                                    Блокировка аккаунта
                                </option><option value="6">
                                    Смена данных (имя пользователя или email)
                                </option><option value="7">
                                    Удаление аккаунта
                                </option><option value="8">
                                    Гениальная идея
                                </option><option value="9">
                                    Предложение сотрудничества
                                </option></select></div></div> <!----></div> <div class="tm-fieldset tm-feedback__fieldset"><div class="tm-fieldset__header"><span class="tm-fieldset__title">Ваш адрес электронной почты:</span></div> <div class="tm-fieldset__container"><div class="tm-input-text-plain" type="email"><input type="email" class="tm-input-text-plain__input"></div></div> <p class="tm-fieldset__description"><span class="">На этот адрес будет отправлен ответ службы поддержки</span></p></div> <div class="tm-fieldset tm-feedback__fieldset"><div class="tm-fieldset__header"><span class="tm-fieldset__title">Текст вашего сообщения:</span></div> <div class="tm-fieldset__container"><textarea class="tm-textarea"></textarea></div> <!----></div> <div class="tm-fieldset tm-feedback__fieldset"><!----> <div class="tm-fieldset__container"><p class="tm-lang-form__input-wrapper"><span class="tm-labeled-checkbox"><span class="tm-labeled-checkbox__container"><div class="tm-checkbox tm-labeled-checkbox__input"><input type="checkbox" id="personal" class="tm-checkbox__real"> <span class="tm-checkbox__fake"></span></div> <label class="tm-labeled-checkbox__label" for="personal"><span class="">Даю согласие на</span> <a href="https://account.habr.com/info/confidential/" target="_blank" class="tm-feedback__link"><span class="">обработку своих персональных данных</span></a></label></span></span></p></div> <!----></div> <div class="tm-feedback__controls"><!----> <button type="submit" disabled="disabled" class="tm-feedback__submit btn btn_solid btn_large"><span class="">Отправить</span></button> <!----></div></form></div></div></div>



    </div></section>