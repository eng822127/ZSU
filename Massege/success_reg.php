<?php

if (isset($_SESSION['success_reg'])) {
    echo "<div style='color: white;     background-color: green;'>" . $_SESSION['success_reg'] . "</div>";
    unset($_SESSION['success_reg']);
}

?>