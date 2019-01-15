<?php
session_start();

if( (isset($_POST['short_title']) && $_POST['short_title'] != "")) {
    sleep(5);
    unlink($_POST['short_title'] . '.pdf');
}