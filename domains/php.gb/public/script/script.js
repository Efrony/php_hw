window.onload = function () {
    $addToCartButtons = document.getElementsByClassName('addToCart')
    for (var i = 0; i < $addToCartButtons.length; i++) {
        $addToCartButtons[i].addEventListener('click', addToCart)
    }
    $deleteToCartButtons = document.getElementsByClassName('deleteButton')
    for (var i = 0; i < $deleteToCartButtons.length; i++) {
        $deleteToCartButtons[i].addEventListener('click', deleteToCart)
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
                id_cart_item: id_cart_item,
            })
        })
        .then(response => response.json())
        .then(res => {
            document.getElementById('cartCount').innerHTML = res['countCart']
        })
}

function addToCart(event) {
    id_product = event.target.dataset.id
    fetch('/api/?action=deleteToCart', {
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
}


