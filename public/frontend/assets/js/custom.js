// document.addEventListener('DOMContentLoaded', function () {
//     const serviceSelect = document.getElementById('service');
//     const kitchenExtras = document.querySelectorAll('.kitchen-extras');
//     const bedroomExtras = document.querySelectorAll('.bedroom-extras');

//     function toggleExtras() {
//         const service = serviceSelect.value;
//         kitchenExtras.forEach(extra => extra.style.display = service === 'Kitchen Cleaning' ? 'block' : 'none');
//         bedroomExtras.forEach(extra => extra.style.display = service === 'Bedroom Cleaning' ? 'block' : 'none');
//     }

//     // Initial toggle on page load
//     toggleExtras();

//     // Toggle on service change
//     serviceSelect.addEventListener('change', toggleExtras);
// });

// document.querySelectorAll('.form-check-input').forEach(function(checkbox) {
//     checkbox.addEventListener('change', function() {
//         var extraId = checkbox.id;
//         var overlay = document.getElementById('overlay-' + extraId);
        
//         if (checkbox.checked) {
//             // Show the overlay when selected
//             overlay.style.display = 'flex';
//             overlay.style.opacity = 1;
//         } else {
//             // Hide the overlay when unchecked
//             overlay.style.opacity = 0;
//             setTimeout(function() {
//                 overlay.style.display = 'none';
//             }, 300); // Delay to allow fade-out effect
//         }
//     });
// });

// let totalPrice = 0;
// let selectedExtras = [];

// function updateTotalPrice() {
//     document.getElementById('total-price').innerText = "$" + totalPrice.toFixed(2);
// }

// function updateExtrasSummary() {
//     const extrasSummaryContainer = document.getElementById('selected-extras-summary');
//     extrasSummaryContainer.innerHTML = '';

//     if (selectedExtras.length > 0) {
//         document.getElementById('extras-heading').style.display = 'block';

//         selectedExtras.forEach(extra => {
//             const extraElement = document.createElement('p');
//             extraElement.innerHTML = `${extra.name} (x${extra.quantity}): <span>$${(extra.price * extra.quantity).toFixed(2)}</span>`;
//             extrasSummaryContainer.appendChild(extraElement);
//         });
//     } else {
//         document.getElementById('extras-heading').style.display = 'none';
//     }
// }

// document.getElementById('service').addEventListener('change', function() {
//     var selectedOption = this.options[this.selectedIndex];
//     var serviceName = selectedOption.getAttribute('data-name');
//     var servicePrice = parseFloat(selectedOption.getAttribute('data-price'));

//     document.getElementById('service-name').innerText = serviceName;
//     document.getElementById('service-price').innerText = "$" + servicePrice.toFixed(2);

//     totalPrice = servicePrice;
//     updateTotalPrice();
// });

// document.querySelectorAll('input[type="checkbox"][name="extras[]"]').forEach(function(checkbox) {
//     checkbox.addEventListener('change', function() {
//         var extraId = this.id;
//         var extraName = this.getAttribute('data-name');
//         var extraPrice = parseFloat(this.getAttribute('data-price'));
//         var overlay = document.getElementById('overlay-' + extraId);

//         if (this.checked) {
//             overlay.style.display = 'flex';
//             overlay.style.opacity = 1;

//             let quantityInput = document.createElement('input');
//             quantityInput.type = 'number';
//             quantityInput.min = 1;
//             quantityInput.value = 1;
//             quantityInput.classList.add('extra-quantity');
//             quantityInput.setAttribute('data-extra-id', extraId);
//             quantityInput.setAttribute('data-price', extraPrice);
//             overlay.innerHTML = '';
//             overlay.appendChild(quantityInput);

//             selectedExtras.push({ id: extraId, name: extraName, price: extraPrice, quantity: 1 });
//             totalPrice += extraPrice;

//             quantityInput.addEventListener('input', function() {
//                 let newQuantity = parseInt(this.value) || 1;
//                 let extra = selectedExtras.find(e => e.id === extraId);
//                 if (extra) {
//                     totalPrice -= extra.price * extra.quantity;
//                     extra.quantity = newQuantity;
//                     totalPrice += extra.price * newQuantity;
//                     updateExtrasSummary();
//                     updateTotalPrice();
//                 }
//             });

//         } else {
//             overlay.style.opacity = 0;
//             setTimeout(function() {
//                 overlay.style.display = 'none';
//             }, 300);

//             let extra = selectedExtras.find(e => e.id === extraId);
//             if (extra) {
//                 totalPrice -= extra.price * extra.quantity;
//             }
//             selectedExtras = selectedExtras.filter(e => e.id !== extraId);
//         }

//         updateExtrasSummary();
//         updateTotalPrice();
//     });
// });
let servicePrice = 0; // Store the selected service price
let totalPrice = 0;   // Store the final total price
let selectedExtras = [];

function updateTotalPrice() {
    let extrasTotal = selectedExtras.reduce((sum, extra) => sum + (extra.price * extra.quantity), 0);
    totalPrice = servicePrice + extrasTotal;
    document.getElementById('total-price').innerText = "$" + totalPrice.toFixed(2);
}

function updateExtrasSummary() {
    const extrasSummaryContainer = document.getElementById('selected-extras-summary');
    extrasSummaryContainer.innerHTML = '';

    if (selectedExtras.length > 0) {
        document.getElementById('extras-heading').style.display = 'block';
        selectedExtras.forEach(extra => {
            const extraElement = document.createElement('p');
            extraElement.innerHTML = `${extra.name} (x${extra.quantity}): <span>$${(extra.price * extra.quantity).toFixed(2)}</span>`;
            extrasSummaryContainer.appendChild(extraElement);
        });
    } else {
        document.getElementById('extras-heading').style.display = 'none';
    }
}

// ✅ Update service price and total price when service is selected
document.getElementById('service').addEventListener('change', function() {
    var selectedOption = this.options[this.selectedIndex];

    if (selectedOption.value) {
        servicePrice = parseFloat(selectedOption.getAttribute('data-price')) || 0;
    } else {
        servicePrice = 0;
    }

    document.getElementById('service-name').innerText = selectedOption.getAttribute('data-name') || "N/A";
    document.getElementById('service-price').innerText = "$" + servicePrice.toFixed(2);

    updateTotalPrice();
});

// ✅ Handle extra selection & deselection
document.querySelectorAll('.extra-checkbox').forEach(function(checkbox) {
    checkbox.addEventListener('change', function() {
        var extraId = this.id.replace('extra-', '');
        var extraName = this.getAttribute('data-name');
        var extraPrice = parseFloat(this.getAttribute('data-price'));
        var overlay = document.getElementById('overlay-extra-' + extraId);
        var qtyDisplay = document.getElementById('overlay-qty-' + extraId);
        var qtyInput = document.getElementById('extra-qty-' + extraId);

        if (this.checked) {
            overlay.style.display = 'flex';
            overlay.style.opacity = 1;

            selectedExtras.push({ id: extraId, name: extraName, price: extraPrice, quantity: 1 });

            qtyDisplay.innerText = "1";
            qtyInput.value = "1";
        } else {
            overlay.style.opacity = 0;
            setTimeout(() => { overlay.style.display = 'none'; }, 300);

            let extra = selectedExtras.find(e => e.id === extraId);
            if (extra) {
                selectedExtras = selectedExtras.filter(e => e.id !== extraId);
            }

            // Reset quantity to 0
            qtyDisplay.innerText = "0";
            qtyInput.value = "0";
        }

        updateExtrasSummary();
        updateTotalPrice();
    });
});

// ✅ Handle quantity changes
document.querySelectorAll('.qty-btn').forEach(button => {
    button.addEventListener('click', function() {
        var extraId = this.getAttribute('data-extra-id');
        var extra = selectedExtras.find(e => e.id === extraId);
        if (!extra) return;

        var qtyDisplay = document.getElementById('overlay-qty-' + extraId);
        var qtyInput = document.getElementById('extra-qty-' + extraId);

        if (this.classList.contains('increase')) {
            extra.quantity++;
        } else if (this.classList.contains('decrease') && extra.quantity > 1) {
            extra.quantity--;
        }

        qtyDisplay.innerText = extra.quantity;
        qtyInput.value = extra.quantity;

        updateExtrasSummary();
        updateTotalPrice();
    });
});
