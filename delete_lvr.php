<?php
//connect to mysql
$servername = "localhost";
$username = "root";

    if(isset($_GET["id"])){
        $livr_id = $_GET["id"];
        
        $conn_mysqli = new mysqli($servername, $username, "", "pizza");
        if ($conn_mysqli->connect_error) {
            die("La connexion a échoué : " . $conn_mysqli->connect_error);
        }

    $sql = "DELETE FROM `livreur` WHERE NROLIVR=$livr_id";
   // $result = $conn_mysqli->query($sql);

    if ($conn_mysqli->query($sql)) {
        header("Location: livreur.php");
    } else {
        echo "Erreur : " . $sql . "<br>" . $conn_mysqli->error;
    }

    // Fermer la connexion
    $conn_mysqli->close();


} else {
    echo "ID du livreur non spécifié.";
}

// Rediriger vers la liste des pizzas
exit();
?>