<?php

if (isset($_SESSION['success_logout'])) {
    echo "<div style='color: white; background-color: red;'>" . $_SESSION['success_logout'] . "</div>";
    unset($_SESSION['success_logout']);
}

?>