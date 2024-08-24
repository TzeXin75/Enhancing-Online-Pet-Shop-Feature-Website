document.addEventListener('DOMContentLoaded', () => {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    const cartItemsContainer = document.getElementById('cart-items-container');
    const cartTotalElement = document.getElementById('cart-total');
    const checkoutButton = document.getElementById('checkout-btn');
    const applyDiscountButton = document.getElementById('apply-discount');
    let discount = 0;

    function updateCart() {
      cartItemsContainer.innerHTML = '';
      let total = 0;
  
      cart.forEach((item, index) => {
          const itemElement = document.createElement('div');
          itemElement.classList.add('card', 'rounded-3', 'mb-4');
          itemElement.innerHTML = `
              <div class="card-body p-4">
                <div class="row d-flex justify-content-between align-items-center">
                  <div class="col-md-3 col-lg-3 col-xl-3">
                    <p class="lead fw-normal mb-2">${item.name}</p>
                  </div>
                  <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                    <button class="btn btn-link px-2" onclick="changeQuantity(${index}, -1)">
                      <i class="fas fa-minus"></i>
                    </button>
                    <input min="1" name="quantity" value="${item.quantity}" type="number" class="form-control form-control-sm" readonly />
                    <button class="btn btn-link px-2" onclick="changeQuantity(${index}, 1)">
                      <i class="fas fa-plus"></i>
                    </button>
                  </div>
                  <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                    <h5 class="mb-0">RM${(item.price * item.quantity).toFixed(2)}</h5>
                  </div>
                  <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                    <a href="#!" class="text-danger" onclick="removeItem(${index})"><i class="fas fa-trash fa-lg"></i></a>
                  </div>
                </div>
              </div>
          `;
          cartItemsContainer.appendChild(itemElement);
          total += item.price * item.quantity;
      });
  
      total -= discount; 
      cartTotalElement.textContent = total.toFixed(2);
    }

    window.changeQuantity = function(index, change) {
        cart[index].quantity += change;
        if (cart[index].quantity <= 0) {
            removeItem(index);
        } else {
            saveCart();
            updateCart();
        }
    };

    window.removeItem = function(index) {
        cart.splice(index, 1);
        saveCart();
        updateCart();
    };

    function saveCart() {
        localStorage.setItem('cart', JSON.stringify(cart));
    }

    function checkout() {
      if (cart.length === 0) {
          alert("Your cart is empty!");
          return;
      }
  
      localStorage.removeItem('cart');
      alert("Thank you for your purchase! Your order has been placed.");
      window.location.href = 'index.html'; 
  }

  function applyDiscount() {
        const discountCode = document.getElementById('discount-code').value;
        if (discountCode === 'SAVE10') {
            discount = 10;
            alert('Discount applied: RM10 off!');
        } else {
            alert('Invalid discount code!');
        }
        updateCart();
    }

    checkoutButton.addEventListener('click', checkout);
    applyDiscountButton.addEventListener('click', applyDiscount);

    updateCart();
});
