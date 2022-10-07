<?php
ini_set('display_errors', true);
error_reporting(E_ALL);

include "config.php";

$user = $_POST['user'];
$passwd = $_POST['passwd'];
$action = $_POST['action'];
$totoken = $_POST['data'];
$name = $_POST['name'];
$template = $_POST['template'];

$sucesso = array(
	'status' => 'sucesso',
	'mensagem' => 'Usuario cadastrado com sucesso.'
);
$erro = array(
	'status' => 'erro',
	'mensagem' => 'Aconteceu um erro no cadastro , tente novamente!'
);

$data = array(
    'tokengroup' => '$tokengroup',
    'data' => '$totoken',
    'tokentemplate' => '$template'
);

// $command="curl -tlsv1.2 -k -X POST -H 'Content-Type: application/json' -u $user:$passwd -d '{\"tokengroup\" : \"$tokengroup\" , \"data\" : \"$totoken\", \"tokentemplate\" : \"$template\" }' $tokurl";

// $output = shell_exec($command);
// print_r($output);
// $obj = json_decode($output);
// $token = $obj->{'token'};
// echo $token;
$token = "123456789";
$PDO = db_connect();

try {
  $query = "
    INSERT INTO customer (
        name, 
        cardnumber, 
        template
    ) VALUES (
        :name, 
        :cardnumber, 
        :template
    )";
  //bind para o PDO Insert
  $stmt = $PDO->prepare($query);

  $stmt->bindParam( ":name", $name );
  $stmt->bindParam( ":cardnumber", $token );
  $stmt->bindParam( ":template", $template );

  if($stmt->execute()){
    //echo json_decode($output);
    echo json_encode($sucesso);
    // print_r($output);
    
  }
  
} catch (Exception $e) {
    echo json_encode($erro);
}

