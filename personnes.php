<?php

include 'config.php';
include 'headers.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') :
if( isset($_GET['id_personnes'])) :
  $sql = sprintf("SELECT * FROM personnes WHERE id_personnes = %d", $_GET['id_personnes']
  );

  $response['response'] = 'One person with id '.$_GET['id_personnes']; 
  else :
    $sql = "SELECT * FROM personnes ORDER BY nom, prenom ASC";
    $response['response'] = 'All personnes'; 
  endif;

$result = $connect->query($sql);
echo $connect->error;

$response = $result->fetch_all(MYSQLI_ASSOC);
endif;

if($SERVER['REQUEST_METHOD'] == 'DELETE') :
  myPrint_r($GET['id_personnes']);
  $sql = sprintf("DELETE FROM personnes WHERE id_personnes=%d", $_GET['id_personnes']);
  $connect->query($sql);
  echo $connect->error;
  $response['response'] = "Suppresion personne id'.$_GET[id_personnes'];
  // exit;
endif;


$response['code'] = 200;

$response['nb_hits'] = '$result->num_rows'; 
$response['time'] = date('Y-m-d-H:i:s'); 

echo json_encode($response);
?>




