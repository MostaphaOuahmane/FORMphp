<?php require_once('config.php'); ?>


<?php $connection = new PDO($dsn, $database_user, $database_user_password); ?>
<?php echo "congratulations you are connected to the database mode payment"; ?>