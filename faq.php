<?php
include "verbinding.php";
session_start();
if (empty($_SESSION["userID"])) {
    header('Location: login.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="css/style3.css">
    </head>
    <body id="body">
    <?php
        $datapdo = "SELECT * FROM users WHERE id =" . $_SESSION['userID'] . "";
        $stmtpdo = $connect->prepare($datapdo);
        $stmtpdo->execute();
        $rowpdo = $stmtpdo->fetch(PDO::FETCH_ASSOC);
        echo "<h2 id='username'><a href='profiel.php?user=" . $rowpdo['gebruikersnaam'] . "'>" . $rowpdo['gebruikersnaam'] . "</a></h2>";
    ?>
        <img id="darkmodebutton" src="images/magicb.png" alt="magic logo" onclick="changeMode();">
        <img id="darkmodebutton2" src="images/magicb2.png" alt="magic logo" onclick="changeMode2();">
        <div id="navbar">
            <img id="home" src="images/logow.png" alt="Home logo">
            <img id="start" src="images/house.png" alt="start logo">
            <p id="startt"><a href="index.php" id="a1">Startpagina</a></p>
            <img id="download" src="images/download.png" alt="download logo">
            <p id="downloadt"><a href="changelog.php" id="a2">Changelog</a></p>
            <img id="faq" src="images/faq.png" alt="faq logo">
            <p id="faqt"><a href="#" id="a3">FAQ</a></p>
        </div>
        <div id="login">
        <span onclick="window.location.href='logout.php'"><button id="loginbt">Uitloggen</button></span>
        </div>
        <h1 id="h1">Frequently asked questions (FAQ)</h1>
        <div id="box">
        <div id="question1">
            <img src="images/letterqwit.png" id="letterqwit">
            <h2 id="h2">Wat maakt BITR anders dan Twitter?</h2>
        </div>
        <div id="answer1">
            <img src="images/letterazwart.png" id="letterazwart">
            <p id="p1">BITR is beter dan Twitter omdat BITR gewoon een stuk mooier eruit ziet!</p>
        </div>
        <script src="js/faq.js"></script>
    </body>
</html>