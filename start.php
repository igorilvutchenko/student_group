<?php  

ini_set('display_errors', '1');
error_reporting(E_ALL);

require_once "classes/StudentGroup.php";


try {
$name = new StudentGroup('group.txt');
// $name->all('1', '10000000');


echo '<pre>';
	var_dump($name->all(0,5));
	echo '</pre>';
}

catch(Exception $e)
{
	$message = $e->getMessage();
	echo $message;
}