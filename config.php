<?php
// session_start();

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'root');
define('DB_NAME', 'vtsdemo');

function db_connect(){
	$PDO = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
	$PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	return $PDO;
}

//$cardnumber = "1111222233334444";

//Edit These to fit your enviroment
$tokengroup= 'ctsgroup';
$template= 'ctstemplate';
$tokenserver = '10.20.60.186';
//end edits. please dont edit anything else below
$tokurl="https://" . $tokenserver . "/vts/rest/v2.0/tokenize/";
$detokurl="https://". $tokenserver . "/vts/rest/v2.0/detokenize/";

// //$id = $_POST['id'];
// $user = $_POST['user'];
// $passwd = $_POST['password'];

// $_SESSION['user'] = $user;
// $_SESSION['passwd'] = $passwd;

// $USR = $_SESSION['user'];
// $PWD = $_SESSION['passwd'];

// if ($user == ""){
// //	echo "enter IF";	
// 	$user = $_GET['user'];
// 	$passwd = $_GET['password'];
// }
?>

