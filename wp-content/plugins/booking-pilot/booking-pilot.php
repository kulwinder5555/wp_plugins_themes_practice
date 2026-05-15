<?php
/**
 * Plugin Name: Booking Pilot
 * Description: Booking Plugin
 * Version: 1.0.0
 */

if (!defined('ABSPATH')) exit;


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

        <label>
            <p>Total Nights</p>
            <input type="text" id="nights" name="nights" readonly>
        </label>
    </form>

    <!-- Flatpickr CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <!-- Flatpickr JS -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <script>
    document.addEventListener("DOMContentLoaded", function() {

        function calculateNights(checkin, checkout) {
            if (checkin && checkout) {
                let diffTime = checkout - checkin;
                let nights = diffTime / (1000 * 60 * 60 * 24);
                document.getElementById("nights").value = nights + " Nights";
            }
        }

        let checkoutPicker = flatpickr("#checkout", {
            dateFormat: "Y-m-d",
            minDate: "today",
            onChange: function(selectedDates) {
                if (selectedDates.length > 0) {
                    calculateNights(checkinPicker.selectedDates[0], selectedDates[0]);
                }
            }
        });

        let checkinPicker = flatpickr("#checkin", {
            dateFormat: "Y-m-d",
            minDate: "today",
            onChange: function(selectedDates) {

                if (selectedDates.length > 0) {
                    let checkinDate = selectedDates[0];

                    // add 1 day
                    let nextDay = new Date(checkinDate);
                    nextDay.setDate(nextDay.getDate() + 1);

                    // update checkout rules
                    checkoutPicker.set("minDate", nextDay);
                    checkoutPicker.setDate(nextDay);

                    // auto open checkout
                    checkoutPicker.open();

                    // calculate nights
                    calculateNights(checkinDate, nextDay);
                }
            }
        });

    });
    </script>

    <?php
    return ob_get_clean();
}

add_shortcode('booking_form', 'booking_form_shortcode');

