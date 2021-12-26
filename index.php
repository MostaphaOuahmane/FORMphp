<?php require_once('config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <div class="container">

        <form action="" method="POST">

            <div class="row">

                <div class="col">

                    <h3 class="title">billing address</h3>

                    <div class="inputBox">
                        <span>full name :</span>
                        <input type="text" name="full_name" placeholder="Ouahmane mostapha">
                    </div>
                    <div class="inputBox">
                        <span>email :</span>
                        <input type="email" name="email" placeholder="ouahmane.mostapha@example.com">
                    </div>
                    <div class="inputBox">
                        <span>address :</span>
                        <input type="text" name="address" placeholder="room - street - locality">
                    </div>
                    <div class="inputBox">
                        <span>city :</span>
                        <input type="text" name="city" placeholder="Pantin">
                    </div>

                    <div class="flex">
                        <div class="inputBox">
                            <span>state :</span>
                            <input type="text" name="state" placeholder="France">
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
                        <input type="number" min="1" name="credit_card_number" placeholder="1111-2222-3333-4444">
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
        <?php if (isset($_POST['address'])) : ?>
        <?php $address = $_POST['address']; ?>
        <?php endif; ?>
        <!-- fin if address -->
        <!-- if city -->
        <?php if (isset($_POST['city'])) : ?>
        <?php $city = $_POST['city']; ?>
        <?php endif; ?>
        <!-- fin if city -->
        <!-- if state -->
        <?php if (isset($_POST['state'])) : ?>
        <?php $state = $_POST['state']; ?>
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
                'address' => $address,
                'city' => $city,
                'state' => $state,
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
        <?php echo $new_payment_kays_string; ?>
        <?php echo $new_payment_kays_placehorders; ?>
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





        <?php endif; ?>
        <!-- fin if de submit -->

    </div>

</body>

</html>