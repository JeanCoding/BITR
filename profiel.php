<?php
include "verbinding.php";
error_reporting(0);
session_start();
if (empty($_SESSION["userID"])) {
    header('Location: login.php');
}

$username = $_GET['user'];
$datapdo20 = "SELECT gebruikersnaam FROM users WHERE gebruikersnaam = '$username'";
$stmtpdo20 = $connect->prepare($datapdo20);
$stmtpdo20->execute();
$rowpdo20 = $stmtpdo20->fetchAll(PDO::FETCH_ASSOC);
foreach ($rowpdo2 as $users) {
    $gebruikersnaam = $users['gebruikersnaam'];
    if (empty($gebruikersnaam)) {
        echo "Profiel niet gevonden!";
    }
}

$username = $_GET['user'];
$datapdo2 = "SELECT * FROM users WHERE gebruikersnaam = '$username'";
$stmtpdo2 = $connect->prepare($datapdo2);
$stmtpdo2->execute();
$rowpdo2 = $stmtpdo2->fetchAll(PDO::FETCH_ASSOC);
echo "<table width='40%'>";
foreach ($rowpdo2 as $users) {
    $omschrijving = $users['omschrijving'];
    if (empty($omschrijving)) {
        $omschrijving = "Deze gebruiker heeft geen omschrijving ingesteld.";
    }
    $gebruikersnaam = $users['gebruikersnaam'];
    $datum = $users['datum'];
    $geslacht = $users['geslacht'];
    $show_email = $users['show_email'];
    if ($show_email == "true") {
        $email = $users['email'];
    } elseif ($show_email == "false" && $geslacht == "Man") {
        $email = "Deze gebruiker heeft zijn email verborgen";
    } elseif ($show_email == "false" && $geslacht == "Vrouw") {
        $email = "Deze gebruiker heeft haar email verborgen";
    } else {
        $email = "Deze gebruiker heeft zijn/haar email verborgen";
    }
    $datum = date("j F Y", strtotime($datum));
    $id = $users['id'];
    if ($_SESSION['userID'] == $id) {
        $edit = "<a href='wijzig_profiel.php?user=$username'>Wijzig profiel</a>";
    } else {
        $edit = "";
    }
    echo "<tr>";
    echo "<th>Gebruikersnaam</th>";
    echo "<td><b>" . $gebruikersnaam . "</b></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<th>Registreer datum</th>";
    echo "<td>" . $datum . "</td>";
    echo "</tr>";
    $query = "SELECT COUNT(afzender) AS aantal FROM messages WHERE afzender = '$username'";
    $querypdo = $connect->prepare($query);
    $querypdo->execute();
    $row = $querypdo->fetchAll(PDO::FETCH_ASSOC);
    foreach ($row as $row1) {
        echo "<tr>";
        echo "<th>Aantal tweets</th>";
        echo "<td>" . $row1['aantal'] . "</td>";
        echo "</tr>";
    }
    echo "<tr>";
    echo "<th>Aantal keer bekeken</th>";
    $profile_views = $users['profile_views'] + 1;
    $views = "UPDATE users SET profile_views = profile_views + 1 WHERE id = " . $id . "";
    $views2 = $connect->prepare($views);
    $views2 = $views2->execute();
    echo "<td>" . $profile_views . "x</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<th>Email</th>";
    echo "<td>" . $email . "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<th>Geslacht</th>";
    if (empty($geslacht)) {
        echo "<td>Geslacht is verborgen</td>";
    } else {
        echo "<td>" . $geslacht . "</td>";
    }
    echo "</tr>";
    echo "<tr>";
    echo "<th>Omschrijving</th>";
    echo "<td>" . $omschrijving . "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td><br>" . $edit . "</td>";
    echo "</tr>";
    $querybadge = "SELECT COUNT(afzender) AS aantal FROM messages WHERE afzender = '$username'";
    $querypdobadge = $connect->prepare($querybadge);
    $querypdobadge->execute();
    $rowbadge = $querypdobadge->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rowbadge as $badgerow) {
        $aantal = $badgerow['aantal'];
    }
        echo "<tr>";
        if ($aantal >= 50) {
            echo "<td><img src='images/50tweets.png' width='60%'></img></td>";
        }
        if ($omschrijving != "Deze gebruiker heeft geen omschrijving ingesteld.") {
            echo "<td><img src='images/certified.png' width='60%'></img></td>";
        }
        echo "</tr>";
    echo "<a href='index.php'>Terug</a>";
    echo "<tr>";
    echo "<td><input type='submit' name='tweets' value='Bekijk recente tweets'></td>";
    echo "</tr>";
}
echo "</table>";

if (isset($_POST['tweets'])) {

}
?>