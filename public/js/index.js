// Get the button:
let mybutton = document.querySelector("#myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function () {
    scrollFunction();
};

function scrollFunction() {
    if (
        document.body.scrollTop > 20 ||
        document.documentElement.scrollTop > 20
    ) {
        mybutton.style.display = "block";
    } else {
        mybutton.style.display = "none";
    }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0; // For Safari
    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}
//NO UI Range Slider
var pipsSlider = document.getElementById("slider");
if (pipsSlider) {
    noUiSlider.create(pipsSlider, {
        start: [0, 250],
        step: 50,
        connect: [false, true, false],
        range: {
            min: 0,
            max: 250,
        },
        pips: {
            mode: "steps",
            density: 250,
            format: wNumb({
                prefix: "€",
            }),
        },
    });
    var pipsSlider1 = document.getElementById("slider1");
    noUiSlider.create(pipsSlider1, {
        start: [0, 250],
        step: 50,
        connect: [false, true, false],
        range: {
            min: 0,
            max: 250,
        },
        pips: {
            mode: "steps",
            density: 250,
            format: wNumb({
                prefix: "€",
            }),
        },
    });
}

// Get the quantity input field and increment/decrement buttons
const quantityInput = document.getElementById("quantity");
const incrementButton = document.getElementById("increment");
const decrementButton = document.getElementById("decrement");
const productPrice = document.getElementById("price");
if (quantityInput) {
    const maxQuantity = parseInt(quantityInput.getAttribute("max"));
    // Add click event listeners to the increment/decrement buttons
    incrementButton.addEventListener("click", function () {
        // Get the current value of the quantity input field
        let currentValue = parseInt(quantityInput.value);
        console.log(maxQuantity);
        if (currentValue < maxQuantity) {
            // Increment the value by 1
            currentValue++;
            console.log("test");
            // Calculating the total price
            const price = parseFloat(productPrice.innerText);

            const total = currentValue * price;
            document.getElementById("total-price").innerText = total.toFixed(2);
        }

        // Set the new value of the quantity input field
        quantityInput.value = currentValue;
    });

    decrementButton.addEventListener("click", function () {
        // Get the current value of the quantity input field
        let currentValue = parseInt(quantityInput.value);

        // Decrement the value by 1, but don't go below 1
        if (currentValue > 1) {
            currentValue--;
        } else {
            currentValue = 1;
        }
        // Set the new value of the quantity input field
        quantityInput.value = currentValue;

        // Calculating the total price
        const quantity = parseInt(quantityInput.value);
        const price = parseFloat(productPrice.innerText);
        const total = quantity * price;
        document.getElementById("total-price").innerText = total.toFixed(2);
    });

    quantityInput.addEventListener("change", function () {
        // Calculating the total price
        const quantity = parseInt(quantityInput.value);
        if (quantity <= maxQuantity && quantity > 1) {
            const price = parseFloat(productPrice.innerText);
            const total = quantity * price;
            document.getElementById("total-price").innerText = total.toFixed(2);
        } else {
            quantityInput.value = 1;
            document.getElementById("total-price").innerText =
                productPrice.innerText;
        }
    });
    quantityInput.addEventListener("keypress", function (event) {
        if (event.keyCode === 13) {
            event.preventDefault();
        }
    });
}
