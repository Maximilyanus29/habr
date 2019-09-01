<?php 

// class Path
// {
// 	public $base;
// 	public $css;
// 	public $img;
// 	public $js;
// 	public $lib;
// 	function __construct()
// 	{
// 		$this->base='/';
// 		$this->css='css/';
// 		$this->css='img/';
// 		$this->js='js/';
// 		$this->lib='lib/';
// 	}
// }


// require 'parser.php';
class gettData
{
	public $dateForPage;
	public $recomended;
	public $soon;

	function __construct($template, $request)
	{
		
		$sqlRecomended="SELECT * FROM films LIMIT 2";
		$sqlSoon="SELECT * FROM films WHERE is_prod = 0 LIMIT 4";
		$this->recomended=new Db($sqlRecomended);
		$this->soon= new Db($sqlSoon);


		if ($template=='general.php') {

			$sql="SELECT * FROM films LIMIT 10";
			// $sendParams=array(':janr'=>$request[1]);

			$this->dateForPage=new Db($sql);
		}




			if ($template=='watch.php') {
				$table=$request[0];

			$sql="SELECT $table.*, janr.name as janr_name from $table INNER JOIN janr ON janr.name = :janr WHERE $table.link = :name LIMIT 10";


			$sendParams=array('janr'=>$request[1],
				'name'=>$request[2]
			);


			$this->dateForPage=new Db($sql, $sendParams);
		}

		if ($template=='list.php') {
			$sql="SELECT films.*, janr.name as janr_name from films INNER JOIN janr ON janr.name = :janr LIMIT 10";
			$sendParams=array(':janr'=>$request[1]);

			$this->dateForPage=new Db($sql, $sendParams);
		}
	}
}



class Controller
{	
	public $app;
	public $request;
	function __construct()
	{
		$request=new Request();

		if (count($request->reqArray)==0){

			$ret = new gettData('general.php','');

			require 'general.php';
		}
		if (count($request->reqArray)==1){

			if (!in_array($request->reqArray[0], $this->accessArray)) {
				throw new Exception("1ый элемент запроса не найден в массиве", 1);	
			}

			echo "spisok po categorii fimi multfilmi";
		}
		if (count($request->reqArray)==2){
			echo "spisok po janru";
		}
		if (count($request->reqArray)==3){
			$ret = new gettData('watch.php',$request->reqArray);
			require 'watch.php';
		}
		if (count($request->reqArray)>3){
			echo "bolshe 3";
		}


	}
}
$xui=new controller();



class Db
{
	public $data;
	
	function __construct($sql, $param='')	
	{
		try {

		    $dbh = new PDO('mysql:host=localhost;dbname=kinofs', 'root', '');

		    $sth = $dbh->prepare($sql);
			
			// $sth->bindValue(1, $param->janr);

		    if ($param=='') {

		    		$sth->execute();

		    	
		    }
		    else {
		    		$sth->execute($param);}


			
			
			$this->data = $sth->fetchAll(PDO::FETCH_ASSOC);
		    $dbh = null;

		} catch (PDOException $e) {
		    print "Error!: " . $e->getMessage() . "<br/>";
		    die();
		}
	}
}

class Request
{
	public $reqArray;
	function __construct()
	{
		$regexp = "/[a-zA-Z0-9]+/ui";
		preg_match_all($regexp, $_SERVER['REQUEST_URI'], $match);
		$this->reqArray = $match[0];
	}
}



 ?>