
<main>
    ЗАДАНИЕ 1
    <form method="post">
        <label>Первое значение:<input type="text" name="firstNumber" value="<?=$_POST['firstNumber'] ?>" required></label><br><br>
        <label>Второе значение:<input type="text" name="secondNumber" value="<?=$_POST['secondNumber'] ?>" required></label><br><br>
        <select name="calcButton" id="">
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
        </select>
        <button type="submit"> РАССЧИТАТЬ </button><br>
        <span> Результат: <?= $resultCalculate; ?></span><br><br>
    </form>

    ЗАДАНИЕ 2


    <form method="post">
        <label>Первое значение:<input type="text" name="firstNumber" value="<?=$_POST['firstNumber'] ?>" required></label><br><br>
        <label>Второе значение:<input type="text" name="secondNumber" value="<?=$_POST['secondNumber'] ?>" required></label><br><br>
        <button type="submit" value="+" name="calcButton"> + </button>
        <button type="submit" value="-" name="calcButton"> - </button>
        <button type="submit" value="*" name="calcButton"> * </button>
        <button type="submit" value="/" name="calcButton"> / </button><br>
        <label>Результат: <input type="text" value="<?= $resultCalculate; ?>"></label><br><br>
    </form>
</main>


