<?php
$servername = "localhost";
$username = "root";

    if(isset($_GET["id"])){
        $pizza_id = $_GET["id"];
        
        $conn_mysqli = new mysqli($servername, $username, "", "pizza");
        if ($conn_mysqli->connect_error) {
            die("La connexion a échoué : " . $conn_mysqli->connect_error);
        }

    $sql = "DELETE FROM `pizza` WHERE NROPIZZ=$pizza_id";

    if ($conn_mysqli->query($sql)) {
        header("Location: php_pizza.php");
    } else {
        echo "Erreur : " . $sql . "<br>" . $conn_mysqli->error;
    }
    $conn_mysqli->close();

} else {
    echo "ID de la pizza non spécifié.";
}
exit();
?>