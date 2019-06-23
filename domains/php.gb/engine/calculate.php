<?php
function resultCalculate()
{
    if (isset($_POST["calcButton"])) {
        $firstNumber = $_POST["firstNumber"];
        $secondNumber = $_POST["secondNumber"]; 

        if (!is_numeric($firstNumber) or !is_numeric($secondNumber)){
            return 'Операции должны выполняться только с числами.';
        } 
        switch ($_POST["calcButton"]) {
            case '+':
                $result = $firstNumber + $secondNumber;
                break;
            case '-':
                $result = $firstNumber - $secondNumber;
                break;
            case '*':
                $result = $firstNumber * $secondNumber;
                break;
            case '/':
                if ($secondNumber == 0) {
                    $result ="На ноль делить нельзя";
                } else {
                    $result = $firstNumber / $secondNumber;
                }
                break;
        }
    } else {
        $result = 'Выберите действие';
    }
    return $result;
}
