<?php
$servername = "localhost";
$username = "root";
$conn_mysqli = new mysqli($servername, $username, "", "pizza");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom_livr = $_POST["nom_livr"];
    $prenom_livr = $_POST["prenom_livr"];
    $date_livr = $_POST["date_livr"];

    $create_sql = "INSERT INTO livreur (NOMLIVR, PRENOMLIVR, DATEEMBAUCHLIVR) VALUES ('$nom_livr', '$prenom_livr', '$date_livr')";

    if ($conn_mysqli->query($create_sql)) {
        header("Location: livreur.php");
    } else {
        echo "Erreur : " . $create_sql . "<br>" . $conn_mysqli->error;
    }
}
$conn_mysqli->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Créer un livreur</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="javascript:void(0)">Logo</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mynavbar">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="php_pizza.php">Pizzas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="livreur.php">Livreurs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="client.php">Clients</a>
                </li>
            </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="text" placeholder="Search">
                <button class="btn btn-primary" type="button">Search</button>
            </form>
        </div>
    </div>
</nav>
 <style>
        img {
            width: 300px;
            height: 300px;
        }
    </style>
<div class="container">
    <h2>Créer un nouveau livreur</h2>
    <form method="post" action="">
        <div class="mb-3">
            <label for="nom_livr" class="form-label">Nom :</label>
            <input class="form-control me-2" type="text" name="nom_livr" required>
        </div>
        <div class="mb-3">
            <label for="prenom_livr" class="form-label">Prenom :</label>
            <input class="form-control me-2" type="text" name="prenom_livr" required>
        </div>
        <div class="mb-3">
            <label for="date_livr" class="form-label">Date embauche :</label>
            <input class="form-control me-2" type="text" name="date_livr" required>
        </div>
        <input class="btn btn-primary" type="submit" value="Valider">
    </form>
</div>
</body>
</html>
