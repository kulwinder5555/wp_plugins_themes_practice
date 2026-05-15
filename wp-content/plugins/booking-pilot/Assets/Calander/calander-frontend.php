<?php
function booking_form_shortcode() {
    ob_start(); // start output buffering
    ?>
    
    <form>
        <label>
            <p>Check In Date</p>
            <input type="date" name="checkin" id="checkin">
        </label>

        <label>
            <p>Check Out Date</p>
            <input type="date" name="checkout" id="checkout">
        </label>
    </form>

    <?php
    return ob_get_clean(); // return HTML properly
}

add_shortcode('booking_form', 'booking_form_shortcode');
