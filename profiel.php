<?php
include "verbinding.php";
session_start();
if (empty($_SESSION["userID"])) {
    header('Location: login.php');
}
?>