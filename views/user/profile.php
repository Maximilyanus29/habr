

<?php
$this->registerCssFile('/css/user.css');
$this->registerCssFile('/css/post.css');

use yii\helpers\Html;
?>
		
<section class="content-wrap">
	<div class="white-block display-flex white-block_row bottomnone">
		<div class="users-info-wrap display-flex">
			<div class="user-block user-block_64 user-block_default-img">H</div>
			<div class="user-block user-block_64 user-block_rating">
				<span class="user-block__rating-id"><?= Html::encode($model->karma); ?></span>
				<div class="user-block__rating-name">Карма</div>
			</div>
			<div class="user-block user-block_64 user-block_rating">
				<span class="user-block__rating-id"><?= Html::encode($model->rating); ?></span>
				<div class="user-block__rating-name">Рейтинг</div>
			</div>
		</div>
		

		<div class="user-info user-info_theme">
			<span class="user-info__name"><?= Html::encode($model->name); ?></span>
			<a href="#"><span class="user-info__link">@<?= Html::encode($model->username); ?></span></a>
		</div>

		<div class="white-block__who">
			<span class="user-info__name">Пользователь</span>
		</div>

		<a href="#" class="button button_material"><span>Подписаться</span></a>

		<ul class="menu-user" id="menu-user">
				<a href="<?= Html::encode($model->id); ?>/profile" onclick="link(event)"><li class="active">Профиль</li></a>
				<a href="<?= Html::encode($model->id); ?>/posts" onclick="link(event)"><li>Публикации</li></a>
				<a href="<?= Html::encode($model->id); ?>/comments" onclick="link(event)"><li>Комментарии</li></a>
				<a href="<?= Html::encode($model->id); ?>/bookmarks" onclick="link(event)"><li>Закладки</li></a>
		</ul>
	</div>


</section>

<div id="root">
<section class="content-wrap">
	<div class="white-block ">
		<div class="usr_info">
			<span class="name">Зарегестрирован</span>
			<span class="value">25 июля 2017</span>
		</div>
		<div class="usr_info">
			<span class="name">Приглашен</span>
			<span class="value">12 февраля по приглашению от НЛО</span>
		</div>
		<div class="usr_info">
			<span class="name">Контактная информация</span>
			<span class="value">Github	mxmvshnvsk</span>
		</div>
		<div class="usr_info">
			<span class="name">Состоит в хабах</span>
			<span class="value hubs">
				<a href="#" class="button">Ajax</a>
				<a href="#" class="button">Ajax</a>
				<a href="#" class="button">Ajax</a>
				<a href="#" class="button">Ajax</a>
				<a href="#" class=""><span>Показать все</span></a>
			</span>
		</div>
	</div>


</section>






</div>



<script>

function httpGet(url) {

  return new Promise(function(resolve, reject) {

    var xhr = new XMLHttpRequest();
    xhr.open('GET', url, true);

    xhr.onload = function() {
      if (this.status == 200) {
        resolve(this.response);
      } else {
        var error = new Error(this.statusText);
        error.code = this.status;
        reject(error);
      }
    };

    xhr.onerror = function() {
      reject(new Error("Network Error"));
    };

    xhr.send();
  });

}



function link(e){
	resetmenu();
	e.preventDefault();
	e.currentTarget.children[0].classList.add('active');

	httpGet(e.currentTarget.href)
		  .then(
		    response => inserToRoot(response));
}

function resetmenu() {
	var user_menu = document.getElementById('menu-user').children;
	for(var val of user_menu){
			val.children[0].classList.remove('active');
		}
}






function inserToRoot(data) {
	var root = document.getElementById('root');
	root.innerHTML=data;
	console.log('success');
}







		







</script>
