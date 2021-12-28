<?php require_once('config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>delete</title>

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">


</head>

<body>



    <h1>col deletion</h1>
    <p><a href="index.php"> Go Back To The HomePage</a></p>
    <?php if (isset($_GET['id'])) : ?>
    <?php $id = $_GET['id']; ?>
    <?php
        $connection = new PDO($dsn, $database_user, $database_user_password, $option); ?>
    <?php $sql = "DELETE FROM payment WHERE id=:id"; ?>
    <?php $statement = $connection->prepare($sql); ?>
    <?php $statement->bindValue(":id", $id); ?>
    <?php $statement->execute(); ?>
    <div style="background-color: red;color:#fff;padding: 20px;">
        <p>COL id : #<?php echo $id ?> in table payment is deleted</p>
    </div>
    <?php endif; ?>



</body>

</html>