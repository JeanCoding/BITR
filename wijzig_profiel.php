<?php
include "verbinding.php";
error_reporting(0);
session_start();
if (empty($_SESSION["userID"])) {
    header('Location: login.php');
}
?>
<head>
<link rel='stylesheet' href='css/profile.css'>
</head>
<?php
$username = $_GET['user'];
$sqlquery = "SELECT * FROM users WHERE gebruikersnaam = '$username'";
$stmtpdo3 = $connect->prepare($sqlquery);
$stmtpdo3->execute();
$sqlrow = $stmtpdo3->fetchAll(PDO::FETCH_ASSOC);
foreach ($sqlrow as $pdoquery) {
    $id = $pdoquery['id'];
    if ($id == $_SESSION["userID"]) {
        
    } else {
        header("Location: profiel.php?user=$username");
        exit;
    }
}
$datapdo2 = "SELECT * FROM users WHERE gebruikersnaam = '$username'";
$stmtpdo2 = $connect->prepare($datapdo2);
$stmtpdo2->execute();
$rowpdo2 = $stmtpdo2->fetchAll(PDO::FETCH_ASSOC);
echo "<table width='10%'>";
foreach ($rowpdo2 as $users) {
    $omschrijving = $users['omschrijving'];
    echo "<form method='POST'>";
    if (empty($omschrijving)) {
        $omschrijving = "Deze gebruiker heeft geen omschrijving ingesteld.";
    }
    $gebruikersnaam = $users['gebruikersnaam'];
    $datum = $users['datum'];
    $email = $users['email'];
    $datum = date("j F Y", strtotime($datum));
    $id = $users['id'];
    echo "<tr>";
    echo "<th>Gebruikersnaam</th>";
    echo "<td>" . $gebruikersnaam . "";
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
    $profile_views = $users['profile_views'];
    echo "<td>" . $profile_views . "x</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<th>Email</th>";
    echo "<td><input type='email' name='updatedemail' value='" . $email . "'></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<th>Omschrijving</th>";
    echo "<td><textarea name='updatedomschrijving'>" . $omschrijving . "</textarea></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<th>Geslacht</th>";
    if ($users['geslacht'] == "Man") {
        echo "<td><input type='radio' id='man' checked name='geslacht' value='Man'>Man";
        echo "<td><input type='radio' id='vrouw' name='geslacht' value='Vrouw'>Vrouw";
        echo "<td><input type='radio' id='vrouw' name='geslacht' value=''>Verbergen";
    } elseif ($users['geslacht'] == "Vrouw") {
        echo "<td><input type='radio' id='man'  name='geslacht' value='Man'>Man";
        echo "<td><input type='radio' id='vrouw'  checked name='geslacht' value='Vrouw'>Vrouw";
        echo "<td><input type='radio' id='vrouw' name='geslacht' value=''>Verbergen";
    } else {
        echo "<td><input type='radio' id='man'  name='geslacht' value='Man'>Man";
        echo "<td><input type='radio' id='vrouw'  name='geslacht' value='Vrouw'>Vrouw";
        echo "<td><input type='radio' id='vrouw' checked name='geslacht' value=''>Verbergen";
    }
    echo "</tr>";
    echo "<tr>";
    echo "<th>Email weergeven op de profiel pagina</th>";
    if ($users['show_email'] == "true") {
        echo "<td><input type='checkbox' checked name='emailcheckbox'></td>";
    } else {
        echo "<td><input type='checkbox' name='emailcheckbox'></td>";
    }
    echo "</tr>";
    echo "<tr>";
    echo "<td><br><input type='submit' name='change' value='Wijzigen'></td>";
    echo "</form>";
    echo "</tr>";
    echo "<a href='profiel.php?user=$username'>Terug</a>";
}
echo "</table>";

if (isset($_POST['change'])) {
    $updatedomschrijving = $_POST['updatedomschrijving'];
    $updatedemail = $_POST['updatedemail'];
    $geslacht = $_POST['geslacht'];
    if (isset($_POST['emailcheckbox'])) {
        $showemail = 'true';
    } else {
        $showemail = 'false';
    }
    $updatequery = "UPDATE users SET omschrijving=:updatedomschrijving,email=:updatedemail, show_email=:showemail, geslacht=:geslacht WHERE id = " . $_SESSION["userID"] . "";
    $updateprepare = $connect->prepare($updatequery);
    $updateprepare->execute(array(":updatedomschrijving" => $updatedomschrijving, ":updatedemail" => $updatedemail, ":showemail" => $showemail, ":geslacht" => $geslacht));
    header("Location: profiel.php?user=$username");
}
?>