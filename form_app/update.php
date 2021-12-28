<?php require_once('config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>delete</title>


</head>

<body>



    <h1>col update</h1>
    <p><a href="index.php"> Go Back To The HomePage</a></p>
    <?php if (isset($_GET['id'])) : ?>
    <?php $id = $_GET['id']; ?>
    <?php $connection = new PDO($dsn, $database_user, $database_user_password, $option); ?>
    <?php $sql = "SELECT * FROM payment WHERE id=:id"; ?>
    <?php $statement = $connection->prepare($sql); ?>
    <?php $statement->bindValue(":id", $id); ?>
    <?php $statement->execute(); ?>
    <?php $payment1 =  $statement->fetch(PDO::FETCH_ASSOC); ?>
    <?php //print_r($payment); 
        ?>
    <div style="background-color: orange;color:#fff; padding: 20px;">
        <p>you are updating col id : #<?php echo $id ?> in table payment </p>
    </div>
    <hr>
    <hr>
    <br>
    <?php if (isset($_POST['submit'])) : ?>
    <?php $payment_upd = array(
                'full_name' => $_POST['full_name'],
                'email' => $_POST['email'],
                'addresse' => $_POST['addresse'],
                'city' => $_POST['city'],
                'paye' => $_POST['paye'],
                'zip_code' => $_POST['zip_code'],
                'name_on_card' => $_POST['name_on_card'],
                'credit_card_number' => $_POST['credit_card_number'],
                'exp_month' => $_POST['exp_month'],
                'exp_year' => $_POST['exp_year'],
                'CVV' => $_POST['CVV'],
            ); ?>
    <?php $connection = new PDO($dsn, $database_user, $database_user_password, $option);
            // contacte la base de donnée
            ?>
    <?php $sql = "UPDATE payment  SET full_name=:full_name,email=:email,addresse=:addresse,city=:city,paye=:paye,zip_code=:zip_code,name_on_card=:name_on_card,credit_card_number=:credit_card_number,exp_month=:exp_month,exp_year=:exp_year,CVV=:CVV where id=:id "; ?>
    <?php $statement = $connection->prepare($sql); ?>
    <?php $statement->execute($payment1); ?>
    <div style="background-color: green; color:black; whith: 50px;padding: 10px; text-align:center;">
        <p>Your have updated your idea succesfully</p>

    </div>
    <?php endif; ?>

    <?php endif; ?>
    <form method="POST">
        <?php foreach ($payment1 as $key => $value) : ?>
        <label for="<?php echo $key; ?>"><?php echo $key; ?></label>
        <input type="text" name="<?php echo $key; ?>" value="<?php echo $value; ?>" id="<?php echo $key; ?>">
        <br>
        <br>
        <?php if ($key == 'text') : ?>
        <input type="text" name="<?php echo $key; ?>" value="<?php echo $value; ?>" id="<?php echo $key; ?>"
            <?php if ($key == 'id') {
                                                                                                                            echo 'readonly';
                                                                                                                        } ?>>

        <?php endif; ?>
        <?php endforeach; ?>
        <input type="submit" name="submit" value="UPDATE your row or your col">
    </form>







</body>

</html>