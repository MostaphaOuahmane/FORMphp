<?php require_once('config.php'); ?>


<?php $connection = new PDO($dsn, $database_user, $database_user_password, $option);
// contacte la base de donnée
?>

<?php
// pour crier un table avec php et sql
// $sql = " CREATE TABLE IF NOT EXISTS
// Donnees_de_paiement( id INT UNSIGNED AUTO_INCREMENT,
// nam VARCHAR(30) NOT NULL , 
// prenome VARCHAR(30) NOT NULL , 
// texte TEXT NOT NULL, 
// PRIMARY KEY(id) );";
// 
?>
// <?php
    // $connection->exec($sql);

    echo "congratulations you are connected to the database mode payment";
    ?>