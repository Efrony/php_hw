window.onload = function () {
    $addToCartButtons = document.getElementsByClassName('addToCart')
    for (var i = 0; i < $addToCartButtons.length; i++) {
        $addToCartButtons[i].addEventListener('click', addToCart)
    }
    
    $buttons = document.getElementsByName('calculateButton') // калькулятор
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
        document.getElementById('cartCount').innerHTML = res['countCart']
    })
    /*$.ajax({
        url: "/api/?action=addToCart&id_product=" + id_product,
        type: "POST",
        dataType : "json",

        error: (a,b,c) => {
          alert("Что-то пошло не так...")
          console.log(c)
        },
        success: response => {
            document.getElementById('cartCount').value = response['countCart']
        }
      });*/

}
