const client = contentful.createClient({
    space: 'e8cszf82luhj',
    accessToken: '93O9aSLHhv7i-HIHhhTEttq0-8Rpp22vOoNLz8i3KTk',
});

async function fetchEntry(id) {
    try {
        const entry = await client.getEntry(id);
        console.log(entry);
        displayContent(entry);
    } catch (error) {
        console.error('Error fetching entry:', error);
    }
}

function displayContent(entry) {
    const fish_details = document.getElementById('fish-details');

    if (!fish_details) {
        console.error('fish-details container not found');
        return;
    }

    const imageUrl = entry.fields.image?.fields.file.url;
    const name = entry.fields.name;
    const description = entry.fields.description;
    const company_name = entry.fields.companyName;
    const price = entry.fields.price;
    const rating = entry.fields.rating;
    const id = entry.sys.id;

    if (imageUrl && name && company_name && price && rating !== undefined) {
        let stars = '';
        for (let i = 0; i < 5; i++) {
            stars += i < rating ? '<ion-icon name="star"></ion-icon>' : '<ion-icon name="star-outline"></ion-icon>';
        }

        fish_details.innerHTML = `
        <div class="details-top">
        <div>
        <img src="https:${imageUrl}" alt="fish">
        </div>
        <div >
        <h2>${name}</h2>
        <div class="details-bottom">
        <ul>
        <li>Company Name : ${company_name}</li>
           <li>Rating : ${stars}
           <li>Price : Rs ${price}/kg </li>
           <li>Enter Total Weight Of The Fish : <input type ="Text" id="fish-weight" placeholder="Enter weight"></input> <a href="cart.html?id=${id}"><button id="button">Submit</button></a></li>
        </div>
        <p class="description">${description}</p>
    </div>
    </div>
    `;
    const addToCartButton = document.getElementById('button');
    if (addToCartButton) {
        addToCartButton.addEventListener('click', () => {
            const weight = parseFloat(document.getElementById('fish-weight').value);
            if (!isNaN(weight) && weight > 0) {
                addToCart({ id, imageUrl, name, companyName: company_name, price, weight });
            } else {
                alert('Please enter a valid weight');
            }
        });
    } else {
        console.error('add-to-cart button not found');
    }
} else {
    console.error('Missing data for entry:', entry);
}
}

function addToCart(item) {
let cart = JSON.parse(localStorage.getItem('cart')) || [];
cart.push(item);
localStorage.setItem('cart', JSON.stringify(cart));
alert('Item added to cart');
window.location.href = 'cart.html';
}
    
 

// Get the fish ID from the URL query parameters
const urlParams = new URLSearchParams(window.location.search);
const fishId = urlParams.get('id');


if (fishId) {
    fetchEntry(fishId);
} else {
    console.error('No fish ID found in URL');
}

document.addEventListener('DOMContentLoaded', () => {
    const cartItems = JSON.parse(localStorage.getItem('cart')) || [];
    const cartContainer = document.getElementById('cart-items');
    const cartTotal = document.getElementById('cart-total');
    let totalAmount = 0;

    function updateCart() {
        cartContainer.innerHTML = '';
        totalAmount = 0;

        if (cartItems.length === 0) {
            cartContainer.innerHTML = '<p>Your cart is empty</p>';
        } else {
            cartItems.forEach((item, index) => {
                const itemTotal = item.price * item.weight;
                totalAmount += itemTotal;

                const div = document.createElement('div');
                div.classList.add('cart-item');

                div.innerHTML = `
               
                    <img src="https:${item.imageUrl}" alt="fish">
                   
                    <div class="cart-item-details">
                       <div> 
                       <h4>${item.name}</h4>
                        <p>Company Name: ${item.companyName}</p>
                        <p>Price: Rs ${item.price}/kg</p>
                        <p>Weight: ${item.weight} kg</p>
                        <p>Total: Rs ${itemTotal}</p>
                        </div>

                        <div>
                        <button class="remove-item" data-index="${index}">Remove</button>
                        </div>
                    </div>
                `;

                cartContainer.appendChild(div);
            });

            cartTotal.innerHTML = `<p>Total Amount: Rs ${totalAmount}</p>`;
        }
    }

    cartContainer.addEventListener('click', (event) => {
        if (event.target.classList.contains('remove-item')) {
            const index = event.target.getAttribute('data-index');
            cartItems.splice(index, 1);
            localStorage.setItem('cart', JSON.stringify(cartItems));
            updateCart();
        }
    });

    updateCart();
});
