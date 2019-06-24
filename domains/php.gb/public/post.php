<?php
include '../engine/calculate.php';

$data = json_decode(file_get_contents('php://input'));

$firstNumber = $data->firstNumber;
$secondNumber = $data->secondNumber;
$operator = $data->operator;
$result = calculate($firstNumber, $secondNumber, $operator);

$response = [
    'firstNumber' => $firstNumber,
    'secondNumber' => $secondNumber ,
    'result' => $result
];

header("Content-type: application/json");
echo json_encode($response);
