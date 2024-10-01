document.addEventListener('DOMContentLoaded', function () {
        // Get references to the checkboxes
        const openFoodCheckbox = document.getElementById('openfood');
        const openDrinksCheckbox = document.getElementById('opendrinks');

        // Get all food and drink cards
        const foodCards = document.querySelectorAll('.restaurant-card[id="food"]');
        const drinkCards = document.querySelectorAll('.restaurant-card[id="drinks"]');

        // Function to update the display of food cards
        function updateFoodCards() {
            foodCards.forEach(card => {
                card.style.display = openFoodCheckbox.checked ? 'block' : 'none';
            });
        }

        // Function to update the display of drink cards
        function updateDrinkCards() {
            drinkCards.forEach(card => {
                card.style.display = openDrinksCheckbox.checked ? 'block' : 'none';
            });
        }

        // Initial update of card displays
        updateFoodCards();
        updateDrinkCards();

        // Event listeners for checkbox changes
        openFoodCheckbox.addEventListener('change', updateFoodCards);
        openDrinksCheckbox.addEventListener('change', updateDrinkCards);
    });

