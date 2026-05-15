<?php

class password_form {
    public function render() {
        ob_start();
        ?>
        <form method="post">
            <label for="password">Enter Password:</label>
            <input type="password" id="password" name="password" required>
            <input type="submit" value="Submit">
        </form>
        <?php
        return ob_get_clean();
    }
}
