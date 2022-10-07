<?php
ini_set('display_errors', true);
error_reporting(E_ALL);

include "config.php";

$sucesso = array(
	'status' => 'sucesso',
	'mensagem' => 'Usuario deletado com sucesso.'
);
$erro = array(
	'status' => 'erro',
	'mensagem' => 'Aconteceu um erro ao deletar seu dado, tente novamente!'
);

$PDO = db_connect();

$ID_USER = $_POST['id'];

try {
    $query = "DELETE FROM customer WHERE id = :id";

    //bind para o PDO Insert
    $stmt = $PDO->prepare($query);
  
    $stmt->bindParam( ":id", $ID_USER );
  
    if($stmt->execute()){
      //echo json_decode($output);
      echo json_encode($sucesso);
    }
  } catch (Exception $e) {
    echo json_encode($erro);
  };

?>