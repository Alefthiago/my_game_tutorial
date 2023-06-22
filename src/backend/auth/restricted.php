<?php
    require '../functions.php';

    if (!isset($_SERVER['HTTP_AUTHENTICATION'])) {
        unauthorized();
    }