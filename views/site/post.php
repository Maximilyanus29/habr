
<?php require 'head.php'; ?>
<?php require 'header.php'; ?>


	<section class="content-wrap" id="content-wrap">


		<div class="filter-line">

				<a href="#" class="active">Лучшие</a>
				<a href="#">Все подряд</a>
				<a href="#"><i class="fas fa-filter"></i></a> 

		</div>
		<div class="content">


<!-- 				<div class="item-counters">
						<span><i class="fas fa-gem"></i> +53</span>
						<span><i class="fas fa-eye"></i> 7,3k</span>
						<span><i class="fas fa-bookmark"></i> 81</span>
						<span><i class="fas fa-comment-alt"></i> 18</span>
					</div> 
 -->

			<?php 
				 
try {
    $dbh = new PDO('mysql:host=localhost;dbname=oskolnews', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    

$sql="SELECT * FROM posts";

        $sth = $dbh->prepare($sql);
$sth->execute();
$res=$sth->fetchAll(PDO::FETCH_ASSOC);
// var_dump($res);


    $dbh = null;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}



			 ?>

			<div class="item">
					<div class="item-top">
						<a href="#" class="user-avatar-icon"><img src="img/24x24.jpg" alt=""></a>
						<a href="#" class="user-nickname">Ryaba</a>
						<span>вчера в весь день ебался</span>
					</div>
					<h2 class="item-content-preview"><a href="#"><?php echo $res[3]['h1']; ?></a></h2>
					<div class="item-tags"><a href="#">Tutorial</a></div>
					<?php echo($res[3]['pageText']) ?>

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








	
	<footer>
		<div class="container">
		<h6><a href="/">Habr</a></h6>
		<div class="connection">
			<span><i class="fab fa-twitter-square"></i></span>
			<span><i class="fab fa-google-plus-square"></i></span>
			<span><i class="fab fa-facebook-square"></i></span>
			<span><i class="fas fa-share-alt-square"></i></span>
			<span><i class="fab fa-instagram"></i></span>
			<span><i class="fab fa-vk"></i></span>
			
		</div>
		<div class="footer__link"><i class="fas fa-globe-europe"></i> &nbsp Настройки языка</div>
		<a href="#" class="footer__link">Полная версия</a>
		</div>
		<div class="link-app">
			<img src="img/app-store.svg" alt="">
			<img src="img/google-play.svg" alt="">
		</div>
		<div class="footer_info">© 2006–2019 «TM»</div>
	</footer>

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