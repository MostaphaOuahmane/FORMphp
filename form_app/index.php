<?php require_once('config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- lin icon boostrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">
    <style>
    table,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;
    }

    i:hover {
        color: red;
    }
    </style>

</head>

<body>

    <div class="container">

        <form action="" method="POST">

            <div class="row">

                <div class="col">

                    <h3 class="title">billingaddresse</h3>

                    <div class="inputBox">
                        <span>full name :</span>
                        <input type="text" name="full_name" placeholder="Ouahmane mostapha">
                    </div>
                    <div class="inputBox">
                        <span>email :</span>
                        <input type="email" name="email" placeholder="ouahmane.mostapha@example.com">
                    </div>
                    <div class="inputBox">
                        <span>addresse :</span>
                        <input type="text" name="addresse" placeholder="room - street - locality">
                    </div>
                    <div class="inputBox">
                        <span>city :</span>
                        <input type="text" name="city" placeholder="Pantin">
                    </div>

                    <div class="flex">
                        <div class="inputBox">
                            <span>paye:</span>
                            <input type="text" name="paye" placeholder="France">
                        </div>
                        <div class="inputBox">
                            <span>zip code :</span>
                            <input type="text" name="zip_code" placeholder="93500">
                        </div>
                    </div>

                </div>

                <div class="col">

                    <h3 class="title">payment</h3>

                    <div class="inputBox">
                        <span>cards accepted :</span>
                        <img src="img/card_img.png" alt="">
                    </div>
                    <div class="inputBox">
                        <span>name on card :</span>
                        <input type="text" name="name_on_card" placeholder="Ouahmane Mostapha">
                    </div>
                    <div class="inputBox">
                        <span>credit card number :</span>
                        <input type="text" name="credit_card_number" placeholder="1111-2222-3333-4444">
                    </div>
                    <div class="inputBox">
                        <span>exp month :</span>
                        <input type="number" min="1" name="exp_month" max="12" placeholder="04">
                    </div>

                    <div class="flex">
                        <div class="inputBox">
                            <span>exp year :</span>
                            <input type="number" min="1" name="exp_year" placeholder="2022">
                        </div>
                        <div class="inputBox">
                            <span>CVV :</span>
                            <input type="number" min="1" name="CVV" placeholder="1234">
                        </div>
                    </div>

                </div>

            </div>

            <input type="submit" name="submit" value="proceed to checkout" class="submit-btn">

        </form>
        <hr>
        <hr>

        <?php if (isset($_POST['submit'])) : ?>
        <!-- billing address -->
        <!-- ******************* -->
        <!-- if full name -->
        <?php if (isset($_POST['full_name'])) : ?>
        <?php $full_name = $_POST['full_name']; ?>
        <?php endif; ?>
        <!-- fin if full name -->
        <!-- if email -->
        <?php if (isset($_POST['email'])) : ?>
        <?php $email = $_POST['email']; ?>
        <?php endif; ?>
        <!-- fin if email -->
        <!-- if address -->
        <?php if (isset($_POST['addresse'])) : ?>
        <?php $addresse = $_POST['addresse']; ?>
        <?php endif; ?>
        <!-- fin if address -->
        <!-- if city -->
        <?php if (isset($_POST['city'])) : ?>
        <?php $city = $_POST['city']; ?>
        <?php endif; ?>
        <!-- fin if city -->
        <!-- if state -->
        <?php if (isset($_POST['paye'])) : ?>
        <?php $paye = $_POST['paye']; ?>
        <?php endif; ?>
        <!-- fin if state -->
        <!-- if zip_code -->
        <?php if (isset($_POST['zip_code'])) : ?>
        <?php $zip_code = $_POST['zip_code']; ?>
        <?php endif; ?>
        <!-- fin if zip_code -->
        <!--  fin billing address -->
        <!-- ***************************** -->
        <!-- payment -->
        <!-- if name_on_card -->
        <?php if (isset($_POST['name_on_card'])) : ?>
        <?php $name_on_card = $_POST['name_on_card']; ?>
        <?php endif; ?>
        <!-- fin if name_on_card-->
        <!-- if credit_card_number -->
        <?php if (isset($_POST['credit_card_number'])) : ?>
        <?php $credit_card_number = $_POST['credit_card_number']; ?>
        <?php endif; ?>
        <!-- fin if credit_card_number-->
        <!-- if exp_month -->
        <?php if (isset($_POST['exp_month'])) : ?>
        <?php $exp_month = $_POST['exp_month']; ?>
        <?php endif; ?>
        <!-- fin if exp_month-->
        <!-- if exp_year -->
        <?php if (isset($_POST['exp_year'])) : ?>
        <?php $exp_year = $_POST['exp_year']; ?>
        <?php endif; ?>
        <!-- fin if exp_year-->
        <!-- if CVV -->
        <?php if (isset($_POST['CVV'])) : ?>
        <?php $CVV = $_POST['CVV']; ?>
        <?php endif; ?>
        <!-- fin if CVV-->
        <?php
            $new_payment = array(
                'full_name' => $full_name,
                'email' => $email,
                'addresse' => $addresse,
                'city' => $city,
                'paye' => $paye,
                'zip_code' => $zip_code,
                'name_on_card' => $name_on_card,
                'credit_card_number' => $credit_card_number,
                'exp_month' => $exp_month,
                'exp_year' => $exp_year,
                'CVV' => $CVV
            );
            ?>
        <?php $new_payment_kays_string = implode(',', array_keys($new_payment)); ?>
        <?php $new_payment_kays_placehorders = ':' . implode(',:', array_keys($new_payment)); ?>

        <?php $connection = new PDO($dsn, $database_user, $database_user_password, $option);
            // contacte la base de donnée
            ?>
        <?php
            $sql = sprintf(
                "INSERT INTO %s (%s) VALUES (%s)",
                'payment',
                $new_payment_kays_string,
                $new_payment_kays_placehorders
            ); ?>
        <?php $statement1 = $connection->prepare($sql); ?>
        <?php $statement1->execute($new_payment); ?>
        <!--  ($statement1 = $connection->prepare($sql);Et($statement1->execute($new_payment); code pour contacte form avec base de donnée dans php my admin -->


        <div style="background-color: green;color:white ;padding :10px;">
            <p> Merci pour votre confiance </p>

        </div>


        <?php endif; ?>
        <!-- fin if de submit -->

    </div>
    <div>
        <?php $connection = new PDO($dsn, $database_user, $database_user_password, $option);
        // contacte la base de donnée
        ?>
        <?php $sql = "SELECT * FROM payment "; ?>
        <?php $statement1 = $connection->prepare($sql); ?>
        <?php $statement1->execute(); ?>
        <?php $results = $statement1->fetchAll(); ?>
        <table style=" width:100%;background:#eee;text-align:center;">
            <tr>
                <th>ID</th>
                <th>full_name </th>
                <th>email </th>
                <th>addresse </th>
                <th>city </th>
                <th>paye </th>
                <th> zip_code </th>
                <th> name_on_card </th>
                <th>credit_card_number </th>
                <th>exp_month</th>
                <th>exp_year </th>
                <th> CVV </th>
                <th>Delete</th>
            </tr>
            <?php foreach ($results as $row) : ?>
            <tr>
                <td> <a href="update.php?id=<?php echo $row['id']; ?>">#<?php echo $row['id']; ?></a></td>
                <td><?php echo $row['full_name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['addresse']; ?></td>
                <td><?php echo $row['city']; ?></td>
                <td><?php echo $row['paye']; ?></td>
                <td><?php echo $row['zip_code'] ?></td>
                <td><?php echo $row['name_on_card'] ?></td>
                <td><?php echo $row['credit_card_number'] ?></td>
                <td><?php echo $row['exp_month'] ?></td>
                <td><?php echo $row['exp_year'] ?></td>
                <td><?php echo $row['CVV'] ?></td>
                <td><a href="delete.php? id=<?php echo $row['id'] ?>" style="color:black;"><i
                            class="bi bi-trash-fill"></i></a></td>
            </tr>
            <?php endforeach; ?>
        </table>

    </div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>