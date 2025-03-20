document.addEventListener('DOMContentLoaded', function () {
    const serviceSelect = document.getElementById('service');
    const kitchenExtras = document.querySelectorAll('.kitchen-extras');
    const bedroomExtras = document.querySelectorAll('.bedroom-extras');

    function toggleExtras() {
        const service = serviceSelect.value;
        kitchenExtras.forEach(extra => extra.style.display = service === 'Kitchen Cleaning' ? 'block' : 'none');
        bedroomExtras.forEach(extra => extra.style.display = service === 'Bedroom Cleaning' ? 'block' : 'none');
    }

    // Initial toggle on page load
    toggleExtras();

    // Toggle on service change
    serviceSelect.addEventListener('change', toggleExtras);
});

document.querySelectorAll('.form-check-input').forEach(function(checkbox) {
    checkbox.addEventListener('change', function() {
        var extraId = checkbox.id;
        var overlay = document.getElementById('overlay-' + extraId);
        
        if (checkbox.checked) {
            // Show the overlay when selected
            overlay.style.display = 'flex';
            overlay.style.opacity = 1;
        } else {
            // Hide the overlay when unchecked
            overlay.style.opacity = 0;
            setTimeout(function() {
                overlay.style.display = 'none';
            }, 300); // Delay to allow fade-out effect
        }
    });
});


// code for booking summary
let totalPrice = 0;
let selectedExtras = [];

function updateTotalPrice() {
    // Update the total price (service price + selected extras)
    document.getElementById('total-price').innerText = "$" + totalPrice.toFixed(2);
}

// Update the selected extras summary in the Booking Summary
function updateExtrasSummary() {
    const extrasSummaryContainer = document.getElementById('selected-extras-summary');
    extrasSummaryContainer.innerHTML = ''; // Clear previous extras

    if (selectedExtras.length > 0) {
        // Show the extras heading and divider
        document.getElementById('extras-heading').style.display = 'block';

        selectedExtras.forEach(extra => {
            const extraElement = document.createElement('p');
            extraElement.innerHTML = `${extra.name}: <span>$${extra.price.toFixed(2)}</span>`;
            extrasSummaryContainer.appendChild(extraElement);
        });
    } else {
        // Hide the extras heading if no extras are selected
        document.getElementById('extras-heading').style.display = 'none';
    }
}

document.getElementById('service').addEventListener('change', function() {
    var selectedOption = this.options[this.selectedIndex];
    var serviceName = selectedOption.getAttribute('data-name');
    var servicePrice = parseFloat(selectedOption.getAttribute('data-price'));

    // Update the service name and price
    document.getElementById('service-name').innerText = serviceName;
    document.getElementById('service-price').innerText = "$" + servicePrice.toFixed(2);

    // Update the total price
    totalPrice = servicePrice;
    updateTotalPrice();
});

// Listen to change on extras checkboxes
document.querySelectorAll('input[type="checkbox"][name="extras[]"]').forEach(function(checkbox) {
    checkbox.addEventListener('change', function() {
        var extraName = this.getAttribute('data-name');
        var extraPrice = parseFloat(this.getAttribute('data-price'));

        // If the checkbox is checked, add the extra to selected extras and to the total price
        if (this.checked) {
            selectedExtras.push({ name: extraName, price: extraPrice });
            totalPrice += extraPrice;
        } else {
            // Remove the extra from the selected extras and subtract from total price
            selectedExtras = selectedExtras.filter(extra => extra.name !== extraName);
            totalPrice -= extraPrice;
        }

        // Update the selected extras summary and total price
        updateExtrasSummary();
        updateTotalPrice();
    });
});