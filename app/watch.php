<?php 

$css="<link rel='stylesheet' href='/css/style2.css'>";
require 'head.php';
require 'layout.php';
 ?>


		<div class="section flex">
			<div class="col-left">
				<div class="img-box m-img"><img src="/img/1.jpg" alt=""></div>
				<div class="m-info">
					<div class="mi-item clearfix">
						<div class="mi-label">Качество:</div>
						<div class="mi-desc"><span class="quality">TS</span></div> 
					</div>


					<div class="mi-item clearfix">
						<div class="mi-label">Год:</div>
						<div class="mi-desc" itemprop="copyrightYear">2019</div>
					</div>

<div class="mi-item clearfix">
<div class="mi-label">Страна:</div>
<div class="mi-desc">США</div>
</div>


<div class="mi-item clearfix">
<div class="mi-label">Время:</div>
<div class="mi-desc" itemprop="duration">02:45:42</div>
</div>


<div class="mi-item clearfix">
<div class="mi-label">Жанр:</div>
<div class="mi-desc"><span id="cats_list">
<a href="/load/18"><span itemprop="genre">фантастика</span>,</a>
<a href="/load/2"><span itemprop="genre">боевик</span>,</a>
<a href="/load/13"><span itemprop="genre">приключения</span>,</a>
<a href="/load/19"><span itemprop="genre">фэнтези</span></a>
</span>
</div>
</div>

<div class="mi-item clearfix">
<div class="mi-label">Перевод:</div>
<div class="mi-desc">Профессиональный (многоголосый)</div>
</div>


<div class="mi-item clearfix">
<div class="mi-label">В ролях:</div>
<div class="mi-desc" itemprop="actor"><noindex><a href="/search/%D0%9F%D0%BE%D0%BB%20%D0%A0%D0%B0%D0%B4%D0%B4/" rel="nofollow" class="eTag">Пол Радд</a>, <a href="/search/%D0%9A%D1%80%D0%B8%D1%81%20%D0%AD%D0%B2%D0%B0%D0%BD%D1%81/" rel="nofollow" class="eTag">Крис Эванс</a>, <a href="/search/%D0%A0%D0%BE%D0%B1%D0%B5%D1%80%D1%82%20%D0%94%D0%B0%D1%83%D0%BD%D0%B8%20%D0%BC%D0%BB./" rel="nofollow" class="eTag">Роберт Дауни мл.</a>, <a href="/search/%D0%A1%D0%BA%D0%B0%D1%80%D0%BB%D0%B5%D1%82%D1%82%20%D0%99%D0%BE%D1%85%D0%B0%D0%BD%D1%81%D1%81%D0%BE%D0%BD/" rel="nofollow" class="eTag">Скарлетт Йоханссон</a>, <a href="/search/%D0%9A%D1%80%D0%B8%D1%81%20%D0%A5%D0%B5%D0%BC%D1%81%D0%B2%D0%BE%D1%80%D1%82/" rel="nofollow" class="eTag">Крис Хемсворт</a>, <a href="/search/%D0%91%D1%80%D1%8D%D0%B4%D0%BB%D0%B8%20%D0%9A%D1%83%D0%BF%D0%B5%D1%80/" rel="nofollow" class="eTag">Брэдли Купер</a>, <a href="/search/%D0%91%D1%80%D0%B8%20%D0%9B%D0%B0%D1%80%D1%81%D0%BE%D0%BD/" rel="nofollow" class="eTag">Бри Ларсон</a></noindex></div>
</div>


<div class="mi-item clearfix">
<div class="mi-label">Режиссер:</div>
<div class="mi-desc" itemprop="director">Энтони Руссо, Джо Руссо</div> 
</div>










				</div>
			</div>



			<div class="col-right">
				<h1><?php $gettedData=$ret->dateForPage->data;
								echo $gettedData[0]["name"]; ?></h1>
				<h4><?php $gettedData=$ret->dateForPage->data;
								echo $gettedData[0]["link"]; ?></h4>
				<br>
				<p><?php $gettedData=$ret->dateForPage->data;
								echo $gettedData[0]["description"]; ?></p>




			</div>
		</div>

<div class="section watch">
	<h2>СМОТРЕТЬ ОНЛАЙН <?php $gettedData=$ret->dateForPage->data;
								echo $gettedData[0]["name"]; ?> В ХОРОШЕМ КАЧЕСТВЕ</h2>
	<div class="player-section">
		<ul class="tabs nowrap"> 
			<li class="playli current">Смотреть онлайн</li>
			<li class="playli">Трейлер</li>
			<a href="javascript://" onclick="trane73.report()" class="tabs">Жалоба?</a> 
		</ul>
		<div class="player-box visible">


			<iframe width="873" height="490" src="<?php $gettedData=$ret->dateForPage->data;
								echo $gettedData[0]["video_link"]; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
<!-- <video

    id="my-player"
    class="video-js vjs-big-play-centered"
    controls
    preload="auto"
    poster="//vjs.zencdn.net/v/oceans.png"
    data-setup='{}'>
  <source src="http://185.38.12.60/sec/1557105791/32353633acc824c08c4ebbd159fc2d46b4e8a47b2db86fe3/ivs/94/29/c93ac8ce1d27/480.mp4" type="video/mp4"></source>
  <p class="vjs-no-js">
    To view this video please enable JavaScript, and consider upgrading to a
    web browser that
    <a href="https://videojs.com/html5-video-support/" target="_blank">
      supports HTML5 video
    </a>
  </p>
</video> -->
<!-- <video src="https://www.youtube.com/watch&v=b3s2-D4QN0M" type="video/webm" controls></video>  -->
</div>
	</div>
</div>
















</div>

</div>
</div></div>

<script type="text/javascript" src="video/video.min.js"></script>
</body>
</html>