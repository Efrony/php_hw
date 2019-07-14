window.onload = function () {
    $addToCartButtons = document.getElementsByClassName('addToCart')
    for (var i = 0; i < $addToCartButtons.length; i++) {
        $addToCartButtons[i].addEventListener('click', addToCart)
    }
    $deleteToCartButtons = document.getElementsByClassName('deleteButton')
    for (var i = 0; i < $deleteToCartButtons.length; i++) {
        $deleteToCartButtons[i].addEventListener('click', deleteToCart)
    }
    //$registrationButton = document.getElementById('registrationButton')
    // $registrationButton.addEventListener('click', registration)

    fromProduct = 24
    countProduct = 100
    $showMoreButton = document.getElementById('showMore')
    $showMoreButton.addEventListener('click', showMore)
}

function showMore() {
    fetch('/api/?action=showMore', {
            method: 'POST',
            headers: {
                'Content-type': 'application/json'
            },
            body: JSON.stringify({
                fromProduct: fromProduct,
                countProduct: countProduct
            })
        })
        .then(response => {
            return response.text();
        })
        .then(text => {
            catalogField = document.getElementById('catalogField')
            catalogField.innerHTML += text

            fromProduct += countProduct
        })
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
            document.getElementById('summAllCart').innerHTML = res['summCart']
            document.getElementById('grandTotal').innerHTML = res['summCart']
        })
}

function deleteToCart(event) {
    id_cart_item = event.target.dataset.id
    fetch('/api/?action=deleteToCart', {
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
            cart_number = 'cart_number_' + res['id_deleted']
            deleted_item = document.getElementById(cart_number)
            deleted_item.remove()
            document.getElementById('cartCount').innerHTML = res['countCart']

            document.getElementById('summAllCart').innerHTML = res['summCart']
            document.getElementById('grandTotal').innerHTML = res['summCart']
        })
}


function registration() {
    $registrForm = document.getElementById('registr')
    $name = $registrForm.name.value
    $email = $registrForm.email.value
    $password = $registrForm.password.value
    $phone = $registrForm.phone.value
    fetch('/api/?action=registration', {
            method: 'POST',
            headers: {
                'Content-type': 'application/json'
            },
            body: JSON.stringify({
                name: $name,
                email: $email,
                password: $password,
                phone: $phone,
            })
        })
        .then(response => response.json())
        .then(res => {
            $message = document.getElementById('messageRegistr')
            $message.innerHTML = res['message']
            $message.className = res['classValid']
        })
}