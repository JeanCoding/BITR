<!doctype html>
<html lang="en">

<?php
include "verbinding.php";
session_start();
?>

<head>
    <title>Bitr. | Registreer</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="HandheldFriendly" content="true">
    <link rel="stylesheet" type="text/css" href="css/registreer_bitr.css">
</head>
<body id="body">
<form method="POST">
    <div id="login">

    <div id="box1"></div>
    
    <img id="log" src="images/bitr2.png" alt="Jean logo">
    <h1 id="h2">CREËER EEN ACCOUNT.</h1>

    <label id="label1" for="name"><b>GEBRUIKERSNAAM.</b></label>
    <input id="usern" type="text" placeholder="Gebruikersnaam" name="gebruikersnaam" maxlength="25"  required>

    <label id="label2" for="name2"><b>WACHTWOORD.</b></label>
    <input id="passw" type="password" placeholder="Wachtwoord" name="wachtwoord" required>

    <label id="label3" for="name2"><b>E-MAIL.</b></label>
    <input id="email" type="email" placeholder="Email" name="email" required>

    <button class="submit" name="registreren">REGISTREREN.</button>
    </div>
</form>

<p id="registreer">HEB JE AL EEN ACCOUNT?   <a id="href" href='login.php'>LOGIN!</a></span></p>
</body>

<?php
  if (isset($_POST['registreren'])) {
    $email = $_POST['email'];
    $user = $_POST['gebruikersnaam'];
    $wachtwoord = $_POST['wachtwoord'];
    $sql = "SELECT COUNT(gebruikersnaam) AS num FROM users WHERE gebruikersnaam = :gebruikersnaam";
    $stmt = $connect->prepare($sql);
    $stmt->bindValue(':gebruikersnaam', $user);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    $sql1 = "SELECT COUNT(email) AS num FROM users WHERE email = :email";
    $stmt1 = $connect->prepare($sql1);
    $stmt1->bindValue(':email', $email);
    $stmt1->execute();
    $row1 = $stmt1->fetch(PDO::FETCH_ASSOC);

    if ($row['num'] > 0) {
      echo '<script>alert("Gebruikersnaam bestaat all")</script>';
    } elseif ($row1['num'] > 0) {
      echo '<script>alert("Email bestaat all")</script>';
    } else {
      $sql = "INSERT INTO `users` (`gebruikersnaam`, `email`, `wachtwoord`) 
    VALUES (:gebruikersnaam, :email, :wachtwoord) ";
      $sql_run = $connect->prepare($sql);
      $result = $sql_run->execute(array(
        ":gebruikersnaam" => $user,
        ":email" => $email, ":wachtwoord" => $wachtwoord
      ));
      header("Location: login.php");
    }
  }
?>
</html>