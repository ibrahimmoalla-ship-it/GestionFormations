<?php
$nom = "ibrahim";
$prenom = "moalla";
$email = "ibrahimmmoalla33@email.com";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<p>Date : <?= date("H:i:s") ?></p>
<title>Profil utilisateur</title>
</head>
<body>
<h1>Profil utilisateur</h1>
<p><strong>Nom :</strong> <?= $nom ?></p>
<p><strong>Prénom :</strong> <?= $prenom ?></p>
<p><strong>Email :</strong> <?= $email ?></p>
</body>
</html>