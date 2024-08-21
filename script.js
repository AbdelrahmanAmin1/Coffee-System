let menu = document.querySelector('#menu-btn');
let navbar = document.querySelector('.navbar');

menu.onclick = () => {
    menu.classList.toggle('fa-times');
    navbar.classList.toggle('active');
};

window.onscroll = () => {
    menu.classList.remove('fa-times');
    navbar.classList.remove('active');
};

document.querySelectorAll('.image-slider img').forEach(images => {
    images.onclick = () => {
        var src = images.getAttribute('src');
        document.querySelector('.main-home-image').src = src;
    };
});

var swiper = new Swiper(".review-slider", {
    spaceBetween: 20,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    loop: true,
    grabCursor: true,
    autoplay: {
        delay: 7500,
        disableOnInteraction: false,
    },
    breakpoints: {
        0: {
            slidesPerView: 1
        },
        768: {
            slidesPerView: 2
        }
    },
});

const addToCartButtons = document.querySelectorAll('.add-to-cart');

addToCartButtons.forEach(button => {
  button.addEventListener('click', (event) => {
    // Prevent the default behavior of the button click
    event.preventDefault();

    const itemName = button.dataset.name;
    const itemPrice = button.dataset.price;

    // Create a new cart item object
    const cartItem = {
      name: itemName,
      price: itemPrice,
      quantity: 1
    };

    // Check if the cart already exists in local storage
    let cart = localStorage.getItem('carts');
    if (cart) {
      // If the cart already exists, parse it from JSON
      cart = JSON.parse(cart);
    } else {
      // If the cart doesn't exist yet, create a new empty object
      cart = {};
    }

    // Add the new cart item to the cart object
    if (cart[itemName]) {
      // If the item already exists in the cart, increment its quantity
      cart[itemName].quantity += 1;
    } else {
      // If the item doesn't exist in the cart yet, add it with a quantity of 1
      cart[itemName] = cartItem;
    }

    // Save the updated cart object to local storage
    localStorage.setItem('carts', JSON.stringify(cart));

    // Show a success message with the item name
    alert(`${itemName} added to cart successfully!`);
  });
});

document.addEventListener("DOMContentLoaded", function() {
  // Get all buttons with the class "view-nutritional-info"
  var viewNutritionalInfoButtons = document.querySelectorAll(".view-nutritional-info");

  // Loop through each button and attach click event listeners
  viewNutritionalInfoButtons.forEach(function(button) {
      button.addEventListener("click", function(event) {
          event.preventDefault(); // Prevent the default behavior

          // Get the target ID from the button's data attribute
          var targetId = this.getAttribute("data-target");

          // Get the corresponding popup using the target ID
          var nutritionalInfoPopup = document.getElementById(targetId);

          // Display the popup
          nutritionalInfoPopup.style.display = "block";
      });
  });

  // Get all elements with the class "close"
  var closeButtons = document.querySelectorAll(".close");

  // Loop through each close button and attach click event listeners
  closeButtons.forEach(function(button) {
      button.addEventListener("click", function() {
          // Hide the corresponding popup
          this.closest(".modal").style.display = "none";
      });
  });

  // When the user clicks anywhere outside of a popup, close it
  window.onclick = function(event) {
      if (event.target.classList.contains("modal")) {
          event.target.style.display = "none";
      }
  }
});

