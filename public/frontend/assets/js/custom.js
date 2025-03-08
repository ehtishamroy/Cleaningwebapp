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