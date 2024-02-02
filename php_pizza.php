<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Exo récup pizza mysql</title>
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
<?php
$servername = "localhost";
$username = "root";
try {
    $conn_mysqli = new mysqli($servername, $username, "", "pizza");
} catch (Exception $e) {
    die("probleme d'application , veullez contacter votre administrateur : ");
}
$sql_pizza_all = "SELECT * FROM pizza";
?>
<div class="container">
    <div class="mt-4 p-5 bg-secondary text-white rounded">
    <h1>Bootstrap Tutorial avec pizzabox mysql</h1>
    <p>liste de mes pizzas.</p>
        <button type="button" class="btn btn-dark"><a href='create.php'>créer une pizza</a></button>
  </div>
</div>
<br>
<?php
$result = $conn_mysqli->query($sql_pizza_all);
echo ("<div class='container-fluid'>");
echo("<div class='row'>");
while ($ligne = $result->fetch_assoc()) {
    echo("<div class=' card col-sm-3 col-md-3'>");
    echo'<img class="card-img-top" src="images_pizza/'.$ligne['NROPIZZ'].'.jpg" alt="Card image">';
    echo("<div class='card-body'>");
    echo("<h4 class='card-title'>".$ligne['DESIGNPIZZ']."</h4>");
     echo("<p class='card-text'>"."<p><u>Prix :</u> ".$ligne['TARIFPIZZ']." euros</p>"."</p>");
    echo("<a href='display.php?id= ".$ligne['NROPIZZ']."' class='btn btn-secondary'>détail  </a> ");
    echo("<a href='delete.php?id= ".$ligne['NROPIZZ']."' class='btn btn-danger'> supprimer  </a> ");
    echo("<a href='update.php?id= ".$ligne['NROPIZZ']."' class='btn btn-secondary'> update  </a> ");
    echo("</div>");
    echo("</div>");
}
 echo("</div>");
echo("</div>");
?>
</body>
</html>