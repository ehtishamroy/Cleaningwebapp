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
