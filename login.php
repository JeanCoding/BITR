<!doctype html>
<html lang="en">

<?php
include "verbinding.php";
session_start();
?>

<head>
    <title>Bitr. | login</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="HandheldFriendly" content="true">
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body id="body">
<form method="POST">
    <div id="login">

    <div id="box1"></div>
    
    <img id="log" src="images/bitr2.png" alt="Jean logo">
    <h1 id="h2">INLOGGEN BIJ BITR.</h1>

    <label id="label1" for="name"><b>GEBRUIKERSNAAM.</b></label>
    <input id="usern" type="text" placeholder="Gebruikersnaam" name="gebruikersnaam" maxlength="25" required>

    <label id="label2" for="name2"><b>WACHTWOORD.</b></label>
    <input id="passw" type="password" placeholder="Wachtwoord" name="wachtwoord" required>

    <button class="submit" name="login">INLOGGEN.</button>
    </div>
</form>

<p id="registreer">NOG GEEN ACCOUNT?   <a id="href" href='registreer.php'>REGISTREER NU!</a></span></p>
</body>

<?php
if (isset($_POST['login'])) {
    $gebruikersnaam = trim($_POST['gebruikersnaam']);
    $wachtwoord = trim($_POST['wachtwoord']);
    if ($gebruikersnaam != "" && $wachtwoord != "") {
        $query = "SELECT * FROM `users` WHERE `gebruikersnaam`=:gebruikersnaam AND `wachtwoord`=:wachtwoord";
        $stmt = $connect->prepare($query);
        $stmt->bindParam('gebruikersnaam', $gebruikersnaam, PDO::PARAM_STR);
        $stmt->bindParam('wachtwoord', $wachtwoord, PDO::PARAM_STR);
        $stmt->execute();
        $count = $stmt->rowCount();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($count == 1 && !empty($row)) {
            echo "<script type='text/javascript'>alert('Je bent succesvol ingelogd!');</script>";
            $id = $row['id'];
            $_SESSION['userID'] = $id;
            header('Location: index.php');
        } else {
            echo "<p id='verkeerd'>VERKEERD GEBRUIKERSNAAM OF WACHTWOORD!<p>";
        }
    }
}
?>

</html>