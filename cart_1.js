document.addEventListener('DOMContentLoaded', () => {
    const addToCartButtons = document.querySelectorAll('.add-to-cart');
    const cartItemsContainer = document.querySelector('.cart-items');
    const totalPriceElement = document.querySelector('.total-price');

    let cart = [];

    addToCartButtons.forEach(button => {
        button.addEventListener('click', addToCart);
    });

    function addToCart(event) {
        userValue = prompt("Please enter Fish In Kg:");
        const productElement = event.target.closest('.product');
        const productName = productElement.getAttribute('data-name');
        console.log(productElement);
        const productPrice = parseFloat(productElement.getAttribute('data-price'));
          
        const existingProduct = cart.find(item => item.name === productName);
        if (existingProduct) {
            existingProduct.quantity += 1;
        } else {
            cart.push({
                name: productName,
                price: productPrice,
                quantity: 1
            });
        }

        renderCart();
    }

    function renderCart() {
        cartItemsContainer.innerHTML = '';
        cart.forEach(item => {
            const cartItem = document.createElement('li');
            cartItem.innerHTML = `
                <p>${item.name} x${userValue} - Rs${(item.price * userValue).toFixed(2)}</p>
                <button class="remove-from-cart" data-name="${item.name}">Remove</button>
            `;
            cartItemsContainer.appendChild(cartItem);

            cartItem.querySelector('.remove-from-cart').addEventListener('click', removeFromCart);
        });

        updateTotalPrice();
    }

    function removeFromCart(event) {
        const productName = event.target.getAttribute('data-name');
        cart = cart.filter(item => item.name !== productName);

        renderCart();
    }

    function updateTotalPrice() {
        const total = cart.reduce((acc, item) => acc + (item.price * userValue), 0);
        totalPriceElement.textContent = total.toFixed(2);
    }
});
