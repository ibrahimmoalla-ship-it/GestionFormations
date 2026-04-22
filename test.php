<?php

$nom = "ibrahim";
$prenom = "moalla";
$age = 21;


$etudiant = [
    "nom" => $nom,
    "prenom" => $prenom,
    "age" => $age
];


echo "<h2>Informations de l'étudiant</h2>";
echo $etudiant["nom"] . "<br>";
echo $etudiant["prenom"] . "<br>";
echo $etudiant["age"] . "<br>";

echo "<hr>";


echo "<h2>Parcours du tableau étudiant</h2>";
foreach ($etudiant as $cle => $valeur) {
    echo $cle . " : " . $valeur . "<br>";
}
?> ?
<?php
$etudiant = array("ibrahim", "moalla", 21);

echo "<h3>Syntaxe 1</h3>";
echo $etudiant[0] . "<br>";
echo $etudiant[1] . "<br>";
echo $etudiant[2] . "<br>";
?>
<?php
$etudiant = array();
$etudiant[] = "ibrahim";
$etudiant[] = "moalla";
$etudiant[] = 21;

echo "<h3>Syntaxe 2</h3>";
foreach ($etudiant as $valeur) {
    echo $valeur . "<br>";
}
?>
<?php
$etudiant = ["ibrahim", "moalla", 21];

echo "<h3>Syntaxe 3</h3>";
for ($i = 0; $i < count($etudiant); $i++) {
    echo $etudiant[$i] . "<br>";
}
?>
<?php
$etudiant = array();
$etudiant[0] = "ibrahim";
$etudiant[6] = "moalla";
$etudiant[5] = 21;

echo "<h3>Syntaxe 4</h3>";
print_r($etudiant);
?>