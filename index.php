<?php
include "verbinding.php";
session_start();
if (empty($_SESSION["userID"])) {
    header('Location: login.php');
}
?>
<!doctype html>
<html lang="en">
<head>
    <title>Bitr. | HomePage</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="HandheldFriendly" content="true">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body id="body">
<?php
$datapdo = "SELECT * FROM users WHERE id =" . $_SESSION['userID'] . "";
$stmtpdo = $connect->prepare($datapdo);
$stmtpdo->execute();
$rowpdo = $stmtpdo->fetch(PDO::FETCH_ASSOC);
$gebruikersnaam = $rowpdo['gebruikersnaam'];
echo "<h2 id='username'><a href='profiel.php?user=" . $rowpdo['gebruikersnaam'] . "'>" . $rowpdo['gebruikersnaam'] . "</h2>";
?>
    <div id="navbar">
        <img id="home" src="images/logow.png" alt="Home logo">
        <img id="start" src="images/house.png" alt="start logo">
        <p id="startt"><a href="#" id="a1">Startpagina</a></p>
        <img id="download" src="images/download.png" alt="download logo">
        <p id="downloadt"><a href="changelog.php" id="a2">Changelog</a></p>
        <img id="faq" src="images/faq.png" alt="faq logo">
        <p id="faqt"><a href="faq.php" id="a3">FAQ</a></p>
    </div>

    <div id="login">
        <span onclick="window.location.href='logout.php'"><button id="loginbt">Uitloggen</button></span>
    </div>

    <div id="twitterbox">
        <p id="naamtag">Startpagina</p>
    </div>
    <form id='form' method="POST">
    <textarea id="tweet-input" placeholder="Vertel wat over je dag" name='bericht' required></textarea>
    <button id="active" name="tweet">Tweet</button>
    </form>
    <img id="imageadd" src="images/image.png" alt="image logo">
    <img id="darkmodebutton" src="images/magicb.png" alt="magic logo" onclick="changeMode();">
    <img id="darkmodebutton2" src="images/magicb2.png" alt="magic logo" onclick="changeMode2();">
    <img id="gifbutton" src="images/gif.png" alt="gif logo">
    <table id='table' width=29%;>
    <?php
        $datapdo2 = "SELECT * FROM messages ORDER BY id DESC LIMIT 8";
        $stmtpdo2 = $connect->prepare($datapdo2);
        $stmtpdo2->execute();
        $rowpdo2 = $stmtpdo2->fetchAll(PDO::FETCH_ASSOC);
        foreach ($rowpdo2 as $berichten) {
            echo "<tr>";
            echo "<th><a href='profiel.php?user=" . $berichten['afzender'] . "' target='blank'>" . $berichten['afzender'] . "</a></th>";
            echo "<td>" . $berichten['bericht'] . "</td>";
            echo "</tr>";
        }
    ?>
    </table>
    <div id='zoekbalk'>
        <form method='POST'>
            <input type='text' name='zoekgebruiker' placeholder='Zoek een gebruiker'><br>
            <input type='submit' name='search' value='Zoek'>
        </form>
    </div>
    <div id="box"></div>
    <p id="volg">Wie te volgen</p>

    <div id="namen">
        <p id="jt">Jean Kalo</p>
        <p id="mt">Mauro Scheltens</p>
        <p id="st">Sezgin Karaduman</p>
        <p id="st1">Simon Sandberg</p>
    </div>

    <div id="darknamen">
        <p id="jtd">@JeanKalo</p>
        <p id="mtd">@MauroScheltens</p>
        <p id="std">@SezginKaraduman</p>
        <p id="st1d">@SimonSandberg</p>
    </div>

    <img id="personf" src="images/person.png" alt="Jean logo">
    <img id="personf1" src="images/person.png" alt="Jean logo">
    <img id="personf2" src="images/person.png" alt="Jean logo">
    <img id="personf3" src="images/person.png" alt="Jean logo">

    <button id="followbutton" onclick="followUser1();">Volgen</button>
    <button id="followbuttonn" onclick="followUser11();">Volgend</button>
    <button id="followbutton1" onclick="followUser2();">Volgen</button>
    <button id="followbutton11" onclick="followUser22();">Volgend</button>
    <button id="followbutton2" onclick="followUser3();">Volgen</button>
    <button id="followbutton22" onclick="followUser33();">Volgend</button>
    <button id="followbutton3" onclick="followUser4();">Volgen</button>
    <button id="followbutton33" onclick="followUser44();">Volgend</button>
    <script src="js/index.js"></script>
</body>
</html>

<?php
if (isset($_POST['tweet'])) {
    $naam = $rowpdo['gebruikersnaam'];
    $bericht = $_POST['bericht'];

    $sql = "INSERT INTO messages (afzender, bericht) 
    VALUES ('$naam', '$bericht')";
    $connect->exec($sql);
    $xpquery = "UPDATE users SET xp = xp + 1 WHERE id = " . $_SESSION["userID"] . "";
    $xpquery2 = $connect->prepare($xpquery);
    $viewxpquery2 = $xpquery2->execute();
    header("Refresh: 0");
}

if (isset($_POST['search'])) {
    $data = $connect->query("SELECT * FROM users WHERE gebruikersnaam='" . $_POST['zoekgebruiker'] . "'");
    foreach ($data as $row) {
        echo "
        <tr>
        <td>
        <p id='zoeknaam'><a href='profiel.php?user=" . $_POST['zoekgebruiker'] . "' target='blank'>" . $row['gebruikersnaam'] . "</a></p>
        </td>
        </tr>
        ";
    }
}
?>