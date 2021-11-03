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
        <link rel="stylesheet" href="css/style2.css">
    </head>
    <body id="body">
    <?php
        $datapdo = "SELECT * FROM users WHERE id =" . $_SESSION['userID'] . "";
        $stmtpdo = $connect->prepare($datapdo);
        $stmtpdo->execute();
        $rowpdo = $stmtpdo->fetch(PDO::FETCH_ASSOC);
        echo "<h2 id='username'><a href='profiel.php?user=" . $rowpdo['gebruikersnaam'] . "'>" . $rowpdo['gebruikersnaam'] . "</h2>";
    ?>
        <div id="navbar">
            <a href="index.php"><img id="home" src="images/logow.png" alt="Home logo"></a>
            <img id="start" src="images/house.png" alt="start logo">
            <p id="startt"><a href="index.php" id="a1">Startpagina</a></p>
            <img id="download" src="images/download.png" alt="download logo">
            <p id="downloadt"><a href="changelog.php" id="a2">Changelog</a></p>
            <img id="faq" src="images/faq.png" alt="faq logo">
            <p id="faqt"><a href="faq.php" id="a3">FAQ</a></p>
        </div>
        <div id="login">
        <span onclick="window.location.href='logout.php'"><button id="loginbt">Uitloggen</button></span>
        </div>
        <div id="box">
            <h1 id="header">What's new on BITR.</h1>
            <p id="undertext">See all the updates of BITR.</p>
            <h2 id="insideh2">Version 1.0 | The beginning of BITR.</h2>
            <h3 id="new"><b>New</b></h3>
            <ul id="ul1">
                <li id="li1">Added login page</li>
                <li id="li2">Added register page</li>
                <li id="li3">Added FAQ</li>
            </ul>
            <h3 id="bugfixes"><b>Bugfixes</b></h3>
            <ul id="ul2">
                <li id="li4">Dark mode bugs</li>
            </ul>
            <button onclick="nextText();" id="next">Next</button>
        </div>
        <img id="darkmodebutton" src="images/magicb.png" alt="magic logo" onclick="changeMode();">
        <img id="darkmodebutton2" src="images/magicb2.png" alt="magic logo" onclick="changeMode2();">
        <script src="js/changelog.js"></script>
    </body>
</html>