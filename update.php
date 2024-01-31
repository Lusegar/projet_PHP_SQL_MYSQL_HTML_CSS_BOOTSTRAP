<?php
    $servername = "localhost";
    $username = "root";
    $conn_mysqli = new mysqli($servername, $username, "", "pizza");

    if (isset($_GET["id"])) {
        $pizza_id = $_GET["id"];
        $sql = "SELECT * FROM pizza WHERE NROPIZZ=$pizza_id";
        $result = $conn_mysqli->query($sql);
        if ($result->num_rows > 0) {
            $pizza_details = $result->fetch_assoc();
        } else {
            echo "Aucune pizza trouvée avec cet identifiant.";
            exit();
        }
    } else {
        echo "ID de la pizza non spécifié.";
        exit();
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $newDesignPizza = $_POST["newDesignPizza"];
        $newTarifPizza = $_POST["newTarifPizza"];
        $update_sql = "UPDATE pizza SET DESIGNPIZZ='$newDesignPizza', TARIFPIZZ='$newTarifPizza' WHERE NROPIZZ=$pizza_id";
        if ($conn_mysqli->query($update_sql)) {
            header("Location: php_pizza.php");
        } else {
            echo "Erreur : " . $update_sql . "<br>" . $conn_mysqli->error;
        }
    }
    $conn_mysqli->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Modifier Pizza</title>
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
    <h2>Modifier une pizza</h2>
    <form method="post" action="">
        <div class="mb-3">
            <label for="newDesignPizza" class="form-label">Nouvelle designation :</label>
            <input class="form-control me-2" type="text" name="newDesignPizza" value="<?php echo $pizza_details['DESIGNPIZZ']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="newTarifPizza" class="form-label">Nouveau tarif :</label>
            <input class="form-control me-2" type="text" name="newTarifPizza" value="<?php echo $pizza_details['TARIFPIZZ']; ?>" required>
        </div>
        <input class="btn btn-primary" type="submit" value="Modifier">
    </form>
</div> 
</body>
</html>
