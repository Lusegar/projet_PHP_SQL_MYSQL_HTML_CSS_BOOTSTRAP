<?php
$servername = "localhost";
$username = "root";
$conn_mysqli = new mysqli($servername, $username, "", "pizza");

if (isset($_GET["id"])) {
    $cli_id = $_GET["id"];

    $sql = "SELECT * FROM client WHERE NROCLIE=$cli_id";
    $result = $conn_mysqli->query($sql);

    if ($result->num_rows > 0) {
        $cli_details = $result->fetch_assoc();
    } else {
        echo "Aucun livreur trouvée avec cet identifiant.";
        exit();
    }
} else {
    echo "ID du livreur non spécifié.";
    exit();
}
$conn_mysqli->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du client</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        img {
            width: 300px;
            height: 300px;
        }
    </style>
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

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <img class="img-fluid" src="images_cli/<?php echo $cli_details['NROCLIE']; ?>.jpg" alt="Client Image">
        </div>
        <div class="col-md-6">
            <h2><?php echo $cli_details['TITRECLIE']; ?></h2>
            <p><strong>Nom :</strong> <?php echo $cli_details['NOMCLIE']; ?></p>
            <p><strong>Prenom :</strong> <?php echo $cli_details['PRENOMCLIE'] ?></p>
            <p><strong>Adresse :</strong> <?php echo $cli_details['ADRESSECLIE']; ?></p>
            <p><strong>Ville :</strong> <?php echo $cli_details['VILLECLIE'] ?></p>
            <p><strong>Code Postal :</strong> <?php echo $cli_details['CODEPOSTALCLIE']; ?></p>
            <p><strong>Tel :</strong> <?php echo $cli_details['NROTELCLI']; ?></p>
        </div>
    </div>
</div>
</body>
</html>