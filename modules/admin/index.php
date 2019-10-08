<?php
 require ('phpQuery.php');






// var_dump(key($_GET));
function parsing()
{
	set_time_limit(0);
	$user=11;

	$category=1;

	$baseUri='https://oskol.city';

	$endNumber=61582;

	$numberNews=file_get_contents('count.txt');
	if ($numberNews==0) {
		return;
	}



	$url="/news/in-stary-oskol-and-region/".$numberNews."/";

	$hbr = file_get_contents($baseUri.$url);

	$document = phpQuery::newDocument($hbr);

	$content= $document->find('.b_news-itm__txt');

	

	$h1 = $document->find('.h1');

	$rewriteimg = $content->find('img');

	foreach ($rewriteimg as $key => $value) {
		$img=pq($value);
		$pq=pq($value)->attr('src');
		 $img->attr('src', $baseUri.$pq);

	}

$contentHtml=$content->html();

$dbh = new PDO('mysql:host=localhost;dbname=oskolnews', 'root', '',array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

$search="SELECT h1 from posts where h1='".$h1."'";


$sth = $dbh->prepare($search);


$sth->execute();

$res = $sth->fetchAll();


		$fd = fopen("count.txt", 'w') or die("не удалось создать файл");
		$str = $numberNews-1;
		fwrite($fd, $str);
		fclose($fd);



if (empty($res)) {

		try {
		

		$sql="INSERT INTO posts (h1, pageText, in_category, owned_by_user)

		VALUES ('".$h1."', '".$contentHtml."', '".$category."', '".$user."')";

		$sth = $dbh->prepare($sql);

		$sth->execute();

		$dbh = null;



	} catch (Exception $e) {
		echo('ne polushilos,'. $e->getMessege);
	}
}
else {

	echo('est v baze ');


}




	




				echo($h1);
	// echo($content->html());

	// echo('dobavleno');


	
parsing();

}


	parsing();


	



?>