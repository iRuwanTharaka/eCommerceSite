document.addEventListener('DOMContentLoaded', function() {
    // Select the buy button elements
    const buyButtons = document.querySelectorAll('.buy');
  
    // Add click event listeners to all buy buttons
    buyButtons.forEach(function(buyButton) {
      buyButton.addEventListener('click', function() {
        // Show an alert when any buy button is clicked
        alert('Item added to cart!');
      });
    });
  });
  
  
  document.addEventListener('DOMContentLoaded', function() {
    // Select all add to cart buttons
    const addToCartButtons = document.querySelectorAll('.cart-btn');
  
    // Add click event listener to each add to cart button
    addToCartButtons.forEach(function(addToCartButton) {
      addToCartButton.addEventListener('click', function(event) {
        event.preventDefault(); // Prevent default action of the link
  
        // Get the product details
        const productBox = addToCartButton.closest('.product-box');
        const productName = productBox.querySelector('strong').textContent;
        const productQuantity = productBox.querySelector('.quantity').textContent;
        const productPrice = productBox.querySelector('.price').textContent;
  
        // Create a new product element in the shopping cart
        const cartProducts = document.querySelector('.cart .products');
        const newProduct = document.createElement('div');
        newProduct.classList.add('product');
        newProduct.innerHTML = `
          <img src="${productBox.querySelector('img').src}" />
          <div class="product-info">
            <h3 class="product-name">${productName}</h3>
            <h4 class="product-price">${productPrice}</h4>
            <p class="product-quantity">${productQuantity}</p>
            <p class="product-buy">
            <i class="fas fa-trash-alt"></i>
              <span class="buy"> Buy</span>
            </p>
            <p class="product-remove">
              <i class="fas fa-trash-alt"></i>
              <span class="remove"> Remove </span>
            </p>
          </div>
        `;
  
        // Append the new product to the shopping cart
        cartProducts.appendChild(newProduct);
  
        // Update total price and total items
        updateTotals();
        
        // Show success message
        alert('Item added to cart!');
      });
    });
  });
  