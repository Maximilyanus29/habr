<?php 
$css="<link rel='stylesheet' href='/css/style.css'>";
require 'head.php'; ?>
<?php require 'layout.php'; ?>


		<div class="section">
			<div class="section-title">
				<div class="title-sect">НОВИНКИ КИНО</div>
				<a href="/load/novinki/46" class=""><i class="fas fa-plus"></i> Все новинки</a>
			</div>

			<div class="car-movies">


						<?php 
						$gettedData=$ret->dateForPage->data;

							for ($i=0; $i < count($gettedData); $i++):
						 ?>
						<div class="movie-item">
							<div class="movie-item__movie-img movie-item__movie-img_car"><img src="/img/<?php echo $i; ?>.jpg" alt=""></div>
							<a class="movie-item__desc movie-item__desc_car" href="<?php echo $gettedData[$i]['full_link'] ?>"><?php echo $gettedData[$i]['name']; ?></a>
						</div>


						<?php 
						endfor; ?>

			</div>
		</div>
















	</div>
</div>

	</div>
</div>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="slick/slick.js"></script>
<script type="text/javascript" src="js/lib.js"></script>

</body>
</html>