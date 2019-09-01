<body>
<div class="wrapper" id="wrapper">
<div class="wr-center">
	<header class="top clearfix">
		<div class="robik flex"><a href="/" title="На главную">Kino-<span>FS</span></a></div>

		<ul class="top-menu clearfix">
			<li><a href="/films">Фильмы</a></li>
			<li><a href="/novinki">Новинки</a></li> 
			<li><a href="/serialy">Сериалы</a></li>
			<li><a href="/teleperedachi">Передачи</a></li>
			<li><a href="/multfilmy">Мультфильмы</a></li>
		</ul>

		<div class="top-buts clearfix">
			<div class="show-login" id="show-login">
				<span class="fas fa-sign-out-alt"></span> 
				<span>Войти</span> 
			</div>

			<div class="search-wrap">
				<form onsubmit="this.sfSbm.disabled=true" method="post" action="/load/" autocomplete="off">
					<div class="search-box">
					<input type="text" class="srch_fld" name="query" maxlength="100" onblur="if(this.value =='') this.value='Поиск...'" onfocus="if (this.value == 'Поиск...') this.value=''" placeholder="Поиск..." id="querys">
					<input name="a" value="2" type="hidden"> 
					<button type="submit" title="Найти"><i class="fas fa-search"></i></button>
					<div id="poisk2"></div>
					</div>
				</form>
			</div>
		</div>
	</header>

	<nav class="nav">
		<ul>
			<li><a href="/films/anime">Аниме</a></li> 
			<li><a href="/films/boeviki">Боевики</a></li>
			<li><a href="/films/vesterny">Вестерны</a></li>
			<li><a href="/films/voennye">Военные</a></li>
			<li><a href="/films/detektivy">Детективы</a></li>
			<li><a href="/films/dramy">Драмы</a></li>
			<li><a href="/films/istoricheskie">Исторические</a></li>
			<li><a href="/films/komedii">Комедии</a></li>
			<li><a href="/films/kriminalnye">Криминальные</a></li>
			<li><a href="/films/melodramy">Мелодрамы</a></li>
			<li><a href="/films/multfilmy">Мультфильмы</a></li>
			<li><a href="/films/mjuzikly">Мюзиклы</a></li>
			<li><a href="/films/prikljuchenija">Приключения</a></li>
			<li><a href="/films/semejnye">Семейные</a></li>
			<li><a href="/films/sportivnye">Спортивные</a></li>
			<li><a href="/films/trillery">Триллеры</a></li>
			<li><a href="/films/uzhasy">Ужасы</a></li>
			<li><a href="/films/fantastika">Фантастика</a></li>
			<li><a href="/films/fehntezi">Фэнтези</a></li>
			<li><a href="/films/biografija">Биография</a></li>
			<li><a href="/soon">Скоро в кино</a></li>
			<li><a href="/podborki_filmov">Подборки</a></li>
			<li><a href="/top_100_luchshikh_filmov">ТОП-100</a></li> 
			<li><a href="http://kino-fs.me/load/filmy/dramy/viking_2016/6-1-0-705"><i class="fas fa-random"></i> Случайный фильм</a></li>
		</ul>
		<div class="show-bigmenu" id="show-bigmenu"><i class="fas fa-bars"></i>Меню</div>
	</nav>

<div class="line">
	<a class="add-fav" href="#" onclick="alert('Нажмите комбинацию клавиш Ctrl+D, чтобы добавить страницу в закладки'); return false;">
		<i class="fas fa-star"></i><span>Добавить в закладки</span>
	</a>

	<div class="speedbar nowrap"><i class="fas fa-arrow-right"></i> 
		<span id="speedbar">Смотреть фильмы и сериалы онлайн в хорошем качестве HD 720</span> 
	</div>
</div>
<div class="content clearfix">
	<aside class="col-sidebar">

		<div class="recomended">
			<p>Рекомендуемые</p>

			<div class="items">
				<?php 

				$dateArray=$ret->recomended->data;
					for ($i=0; $i < count($dateArray); $i++):

				 ?>

				<div class="movie-item movie-item_recomended">
					<div class="movie-item__movie-img movie-item__movie-img_recomended"><img src="/img/1.jpg" alt="img"></div>
					<a class="movie-item__desc movie-item__desc_recomended" href="<?php echo $dateArray[$i]['full_link']; ?>"><?php echo $dateArray[$i]['name']; ?></a>
				</div>


			<?php    endfor;
 ?>

		</div>
	</div>

		<div class="recomended">
			<p>Скоро появятся</p>
			<div class="items">
<!-- 				<div class="item">
					<img src="img/1.jpg" alt="">
					<a class="desc">Патруль (2012)</a>
				</div> -->

				<?php 

				$dateArray=$ret->soon->data;

					for ($i=0; $i < count($dateArray); $i++):

				 ?>
<!-- <div class="item">
					<img src="img/1.jpg" alt="">
					<a class="desc">dqdw</a>
				</div> -->
				<div class="movie-item movie-item_recomended">
					<div class="movie-item__movie-img movie-item__movie-img_recomended"><img src="/img/1.jpg" alt="img"></div>
					<a class="movie-item__desc movie-item__desc_recomended" href="<?php echo $dateArray[$i]['full_link']; ?>"><?php echo $dateArray[$i]['name']; ?></a>
				</div>


			<?php    endfor;
 ?>
			</div>
		</div>


	</aside>

	<div class="col-content">



