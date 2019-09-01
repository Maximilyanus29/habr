<?php 
		    $dbh = new PDO('mysql:host=localhost;dbname=kinofs', 'root', '');



for ($i=0; $i <10 ; $i++) { 
	$table='films';
	$janr='boevik';
$value1=1;
$value2='name'.$i;
$value3='lorem imsum'.$i;
$value4='warcraft'.$i;
$value5=$table.'/'.$janr.'/'.$value4;
$value6=0;
$value7="https://www.youtube.com/embed/HTenCph8CkU";

$add="INSERT INTO $table (janr, name, description, link, full_link, is_prod, video_link)
VALUES ($value1, $value2, $value3, $value4, $value5, $value6, $value7,";

		    $sth = $dbh->prepare($sql);
$sth->execute();
			

}







		    $dbh = null;


 ?>