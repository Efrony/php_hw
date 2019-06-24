<style>
      button,
      select,
      input {
          font-size: 20px;
          padding: 7px 12px;
          margin: 10px 15px;
          width: 150px;
        } 
    input {
          width: 500px;
        } 

</style>
<main>
    ЗАДАНИЕ 1
    <form method="post">
        <label>Первое значение:<input type="text" name="firstNumber" value="<?= $_POST['firstNumber'] ?>" required></label><br><br>
        <label>Второе значение:<input type="text" name="secondNumber" value="<?= $_POST['secondNumber'] ?>" required></label><br><br>
        <select name="calcButton" id="">
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
        </select>
        <button type="submit"> РАССЧИТАТЬ </button><br>
        <span> Результат: <?= $resultCalculate; ?></span><br><br>
    </form><br><br><br>

    ЗАДАНИЕ 2
    <br>
    <label>Первое значение:<input type="text" name="firstNumber" id="firstNumber" required></label><br><br>
    <label>Второе значение:<input type="text" name="secondNumber" id="secondNumber" required></label><br><br>
    <button value="+" name="calculateButton"> + </button>
    <button value="-" name="calculateButton"> - </button>
    <button value="*" name="calculateButton"> * </button>
    <button value="/" name="calculateButton"> / </button><br>
    <label>Результат: <input type="text" id="result"></label><br><br>
</main>

<script>
    window.onload = function() {
        $buttons = document.getElementsByName('calculateButton')
        for (var i = 0; i < $buttons.length; i++) {
            $buttons[i].addEventListener('click', sendOperator)
        }
    }

    function sendOperator(event) {
        firstNumber = document.getElementById('firstNumber').value
        secondNumber = document.getElementById('secondNumber').value
        operator = event.target.value
        fetch('post.php', {
                method: 'POST',
                headers: {
                    'Content-type': 'application/json'
                },
                body: JSON.stringify({
                    firstNumber: firstNumber,
                    secondNumber: secondNumber,
                    operator: operator
                })
            })
            .then(response => response.json())
            .then(res => {
                console.log(res)
                document.getElementById('result').value = res['result']
            })
    }
</script>