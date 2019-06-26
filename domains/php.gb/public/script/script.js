window.onload = function () {
    $addToCartButtons = document.getElementsByClassName('addToCart')
    for (var i = 0; i < $addToCartButtons.length; i++) {
        $addToCartButtons[i].addEventListener('click', addToCart)
    }
    // калькулятор-----------------------------------------------------------------
    $buttons = document.getElementsByName('calculateButton')
    for (var i = 0; i < $buttons.length; i++) {
        $buttons[i].addEventListener('click', sendOperator)
    }
}

function addToCart(event) {
    id_product = event.target.dataset.id
    fetch('/api/?action=addToCart', {
            method: 'POST',
            headers: {
                'Content-type': 'application/json'
            },
            body: JSON.stringify({
                id_product: id_product,
            })
        })
        .then(response => response.json())
        .then(res => {
            document.getElementById('result').value = res['result']
        })
}


function sendOperator(event) {
    firstNumber = document.getElementById('firstNumber').value
    secondNumber = document.getElementById('secondNumber').value
    operator = event.target.value
    fetch('/api/?action=calculate', {
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
            document.getElementById('result').value = res['result']
        })
}