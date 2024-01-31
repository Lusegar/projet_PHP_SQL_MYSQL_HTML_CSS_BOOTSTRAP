<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Exo récup pizza mysql</title>
    <meta charset="utf-8">
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

<?php
//connect to mysql
$servername = "localhost";
$username = "root";

//mysqli_report(MYSQLI_REPORT_STRICT | MYSQLI_REPORT_ALL);
// msqli est seulement pour mysql
try {


    $conn_mysqli = new mysqli($servername, $username, "", "pizza");
} catch (Exception $e) {
    die("probleme d'application , veullez contacter votre administrateur : ");

}

// je suis connecté à la base de données
//echo "Connected successfully";

// je fais une requete sql
$sql_pizza_all = "SELECT * FROM livreur";
?>
<div class="container">
    <div class="mt-4 p-5 bg-secondary text-white rounded">
    <h1>Bootstrap Tutorial avec pizzabox mysql</h1>
    <p>Liste de mes livreurs.</p>
        <button type="button" class="btn btn-dark"><a href='create_lvr.php'>créer un livreur</a></button>

  </div>

</div>
<br>
<?php
// j'execute la requete
$result = $conn_mysqli->query($sql_pizza_all);
echo ("<div class='container-fluid'>");

// je recupere les données en faisant un boucle
echo("<div class='row'>");

while ($ligne = $result->fetch_assoc()) {
    echo("<div class=' card col-sm-3 col-md-3'>");
    echo'<img class="card-img-top" src="images_livreur/'.$ligne['NROLIVR'].'.jpg" alt="Card image">';
    echo("<div class='card-body'>");
    echo("<h4 class='card-title'>".$ligne['NOMLIVR']." ".$ligne['PRENOMLIVR']."</h4>");
    echo("<p class='card-text'>"."<p><u>Date embauche :</u> ".$ligne['DATEEMBAUCHLIVR']."</p>"."</p>");
    echo("<a href='display_lvr.php?id= ".$ligne['NROLIVR']."' class='btn btn-secondary'>détail  </a> ");
    echo("<a href='delete_lvr.php?id= ".$ligne['NROLIVR']."' class='btn btn-danger'> supprimer  </a> ");
    echo("<a href='update_lvr.php?id= ".$ligne['NROLIVR']."' class='btn btn-secondary'> update  </a> ");
    echo("</div>");
    echo("</div>");
}// fin du while
 echo("</div>");
echo("</div>");
?>
</body>
</html>