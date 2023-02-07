/**
 * Reprenez le code de l'exercice précédent et transformez vos requêtes pour utiliser les requêtes préparées
 * la méthode de bind du paramètre et du choix du marqueur de données est à votre convenance.
 */

<html>
<head>
 <body>
<div class="container">
    <h1>Inscrivez vous</h1>
    <form action="index.php" method="post">
        <input type="text" name="nom" placeholder="nom">
        <input type="text" name="prenom" placeholder="prenom">
        <input type="text" name="email" placeholder="email">
        <input type="text" name="password" placeholder="password">
        <input type="text" name="adresse" placeholder="adresse">
        <input type="text" name="code_postal" placeholder="code_postal">
        <input type="text" name="pays" placeholder="pays">

        <input type="submit" name="submit" value="S'enregistrer">
    </form>
</div>
</body>
</head>
</html>

<?php

$username = 'root';
$password = '';

if (isset($_POST["nom"]) & isset($_POST["prenom"]) & isset($_POST["email"]) & isset($_POST["password"])
    & isset($_POST["adresse"]) & isset($_POST["code_postal"]) & isset($_POST["pays"])){
    try {
        $db = new PDO('mysql:host=localhost;dbname=test;charset=utf8', $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $nom = ($_POST['nom']);
        $prenom = ($_POST['prenom']);
        $email = ($_POST['email']);
        $password = ($_POST['password']);
        $adresse = ($_POST['adresse']);
        $code_postal = ($_POST['code_postal']);
        $pays = ($_POST['pays']);

        $sql = " INSERT INTO utilisateurs (nom, prenom, email, password, adresse, code_postal, pays)
             VALUES ('$nom', '$prenom', '$email', '$password', '$adresse', '$code_postal', '$pays')
             ";

        $db->exec($sql);


        echo "requête validé !";
    }
    catch (PDOException $exception) {
        echo $exception->getMessage();

    }
}

else {
    header('Location : index.php');
}
