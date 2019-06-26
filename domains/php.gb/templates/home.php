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
<main class="home_page">
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
