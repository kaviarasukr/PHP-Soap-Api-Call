<?php

set_time_limit(0);
session_start();

if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] == true) {
    header("Location:home.php");
} else {
    header("Location:login.php");
}
?>