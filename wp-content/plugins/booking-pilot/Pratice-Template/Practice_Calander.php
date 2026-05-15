<?php
function booking_form_shortcode() {
    ob_start();
    ?>

    <form>
        <label>
            <p>Check In Date</p>
            <input type="text" id="checkin" name="checkin" placeholder="Select check-in">
        </label>

        <label>
            <p>Check Out Date</p>
            <input type="text" id="checkout" name="checkout" placeholder="Select check-out">
        </label>
    </form>

    <!-- Flatpickr CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <!-- Flatpickr JS -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <script>
document.addEventListener("DOMContentLoaded", function() {

    let checkinPicker = flatpickr("#checkin", {
        dateFormat: "Y-m-d",
        minDate: "today",
        onChange: function(selectedDates, dateStr) {

            if (selectedDates.length > 0) {
                let checkinDate = selectedDates[0];

                // Add 1 day
                let nextDay = new Date(checkinDate);
                nextDay.setDate(nextDay.getDate() + 1);
                // Set checkout minimum to next day
                checkoutPicker.set("minDate", nextDay);

                // Optional: auto-set checkout date
                checkoutPicker.setDate(nextDay);

                // Optional: open checkout calendar
                checkoutPicker.open();
            }
        }
    });

    let checkoutPicker = flatpickr("#checkout", {
        dateFormat: "Y-m-d",
        minDate: "today"
    });

});
</script>

    <?php
    return ob_get_clean();
}

add_shortcode('booking_form', 'booking_form_shortcode');