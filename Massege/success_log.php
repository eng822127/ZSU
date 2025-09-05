<?php

if (isset($_SESSION['success_log'])) {
    echo "<div style='color: white; background-color: green;'>" . $_SESSION['success_log'] . "</div>";
    unset($_SESSION['success_log']);
}

?>