<?php
        include ('../engine/calculate.php');
        $data = json_decode(file_get_contents('php://input'));
        $result = calculate($data->firstNumber, $data->secondNumber, $data->operator);
        $response = [
            'result' => $result
        ];

        header("Content-type: application/json");
        echo json_encode($response);
