<?php

include 'config.php';
include 'headers.php';

$sql = "SELECT * FROM news";
$result = $connect->query($sql);
echo $connect->error;

$response['code'] = 200;
$response['response'] = 'All news'; 

echo json_encode($response);
