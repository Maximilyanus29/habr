<?php
$this->registerCssFile('/css/user.css');
$this->registerCssFile('/css/post.css');

use yii\helpers\Html;
use yii\helpers\Url;
$this->registerCssFile('/css/help.css');
?>
<section class="content-wrap">
    <div class="tm-page tm-page_narrow">
        <div class="tm-section-name">
            <h1 class="tm-section-name__text">
                Информация
            </h1>
        </div>
        <div id='scroll' class="scroll"><span class="tm-tab tm-tabs-list__tab"><a href="/ru/info/help/rules" class="tm-tab__link">
         Правила <span class="tm-tab__counter"></span></a></span><span class="tm-tab tm-tabs-list__tab"><a href="/ru/info/help/registration" class="tm-tab__link">
         Регистрация и приглашения <span class="tm-tab__counter"></span></a></span><span class="tm-tab tm-tabs-list__tab"><a href="/ru/info/help/sandbox" class="tm-tab__link">
         Песочница <span class="tm-tab__counter"></span></a></span><span class="tm-tab tm-tabs-list__tab"><a href="/ru/info/help/habracentre" class="tm-tab__link">
         Хабрацентр <span class="tm-tab__counter"></span></a></span><span class="tm-tab tm-tabs-list__tab"><a href="/ru/info/help/karma" class="tm-tab__link">
         Карма и рейтинг <span class="tm-tab__counter"></span></a></span><span class="tm-tab tm-tabs-list__tab"><a href="/ru/info/help/settings" class="tm-tab__link">
         Настройки <span class="tm-tab__counter"></span></a></span><span class="tm-tab tm-tabs-list__tab"><a href="/ru/info/help/hubs" class="tm-tab__link">
         Хабы <span class="tm-tab__counter"></span></a></span><span class="tm-tab tm-tabs-list__tab"><a href="/ru/info/help/lenta" class="tm-tab__link">
         Ленты <span class="tm-tab__counter"></span></a></span><span class="tm-tab tm-tabs-list__tab"><a href="/ru/info/help/posts" class="tm-tab__link">
         Публикации <span class="tm-tab__counter"></span></a></span><span class="tm-tab tm-tabs-list__tab"><a href="/ru/info/help/tracker" class="tm-tab__link">
         Трекер <span class="tm-tab__counter"></span></a></span><span class="tm-tab tm-tabs-list__tab"><a href="/ru/info/help/habramail" class="tm-tab__link">
         Диалоги <span class="tm-tab__counter"></span></a></span><span class="tm-tab tm-tabs-list__tab"><a href="/ru/info/help/companies" class="tm-tab__link">
         Компании <span class="tm-tab__counter"></span></a></span><span class="tm-tab tm-tabs-list__tab"><a href="/ru/info/help/problems" class="tm-tab__link">
         Проблемы с почтой <span class="tm-tab__counter"></span></a></span><span class="tm-tab tm-tabs-list__tab"><a href="/ru/info/help/sponsorshipinfo" class="tm-tab__link">
         Спонсорство <span class="tm-tab__counter"></span></a></span><span class="tm-tab tm-tabs-list__tab"><a href="/ru/info/help/other" class="tm-tab__link">
         Разное <span class="tm-tab__counter"></span></a></span>
        </div>
    </div>
    <div class="tm-page_info">
        <div class="tm-page__content">
            <div class="info_page h-info">
                <div class="white-block" id="root">
                    <p><i>Последнее редактирование&nbsp;— 27 июня 2017 года.</i></p>
                    <p>Данный сайт представляет собой платформу для информационного обмена между участниками пользовательского сообщества. Сообщество пользователей сайта является саморегулируемым, поэтому разобраться во всех нюансах работы проекта с первого раза получается далеко не у всех. Чтобы объяснить, как всё устроено, мы подготовили данный справочный раздел. Справа представлен рубрикатор справочного раздела. Для получения разъяснений выберите соответствующий пункт рубрикатора и ознакомьтесь с предложенной информацией. Если вам не удалось найти ответ на интересующий вопрос, пожалуйста, воспользуйтесь формой обратной связи.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<script>

    function link(e){


        e.preventDefault();
        resetmenu();
        e.currentTarget.children[0].classList.add('active');


        httpGet(e.currentTarget.href)
            .then(
                response => inserToRoot(response));
    }

    function inserToRoot(data) {
        var root = document.getElementById('root');
        root.innerHTML=data;
        console.log('success');
    }

    function resetmenu() {
        var user_menu = document.getElementById('scroll').children;

        for(var val of user_menu){

            val.children[0].children[0].classList.remove('active');

        }
    }

    var a = document.getElementsByClassName('tm-tab__link');

    for(b of a){
        b.addEventListener('click', link);

    }


</script>