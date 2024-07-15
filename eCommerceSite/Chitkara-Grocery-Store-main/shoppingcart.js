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
    const buyButtons = document.querySelectorAll('.buy');
    const removeButtons = document.querySelectorAll('.remove');
    const totalPriceElement = document.getElementById('totalPrice');
    const totalItemsElement = document.getElementById('totalItems');
    const discountElement = document.getElementById('discount');
    const reducedAmountElement = document.getElementById('reducedAmount');
    
    let totalPrice = 0; // Initial total price (Change as needed)
    let totalItems = 0; // Initial number of items
    let discountPercentage = 40; // Discount percentage
    
    // Function to update total price, total items, discount, and reduced amount
    function updateTotals() {
      totalPriceElement.textContent = `Rs. ${totalPrice}`;
      totalItemsElement.textContent = totalItems;
      
      // Calculate discount and reduced amount
      const discountAmount = totalPrice * (discountPercentage / 100);
      const reducedAmount = totalPrice - discountAmount;
  
      discountElement.textContent = `Rs. ${discountAmount} (${discountPercentage}% off)`;
      reducedAmountElement.textContent = `Rs. ${reducedAmount}`;
    }
  
    // Function to handle buy button click
    function handleBuyClick(price) {
      totalPrice += price; // Add item price to total price
      totalItems++; // Increment number of items
      updateTotals(); // Update displayed totals
    }
  
    // Function to handle remove button click
    function handleRemoveClick(price) {
      totalPrice -= price; // Deduct item price from total price
      totalItems--; // Decrement number of items
      updateTotals(); // Update displayed totals
    }
  
    // Add click event listeners to buy buttons
    buyButtons.forEach(function(buyButton) {
      const productPrice = parseFloat(buyButton.closest('.product').querySelector('.product-price').textContent.replace('Rs. ', ''));
      buyButton.addEventListener('click', function() {
        handleBuyClick(productPrice);
      });
    });
  
    // Add click event listeners to remove buttons
    removeButtons.forEach(function(removeButton) {
      const productPrice = parseFloat(removeButton.closest('.product').querySelector('.product-price').textContent.replace('Rs. ', ''));
      removeButton.addEventListener('click', function() {
        handleRemoveClick(productPrice);
      });
    });
  
    // Initial update of totals
    updateTotals();
  });
  