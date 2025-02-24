<?php // This file is mostly containing things for your view / html ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" type="text/css"
          rel="stylesheet"/>
    <title>Your fancy store</title>
</head>
<body>
<div class="container">
    <h1>Place your order</h1>
    <?php // Navigation for when you need it ?>
    <?php /*
    <nav>
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link active" href="?food=1">Order food</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?food=0">Order drinks</a>
            </li>
        </ul>
    </nav>
    */ ?>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" class="form-control" required/>
            </div>
            <?php if (($_SERVER["REQUEST_METHOD"] == "POST") && empty($_POST["email"])) { echo '<div class="alert alert-danger" role="alert">Email is required</div>';} else if(isset($_POST["email"])) {
                        $email = test_input($_POST["email"]);
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        echo '<div class="alert alert-danger" role="alert">Invalid email format</div>';
                    };
                    }
            ?>
        </div>

        <fieldset>
            <legend>Address</legend>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="street">Street:</label>
                    <input type="text" name="street" id="street" class="form-control" required>
                    <?php if (($_SERVER["REQUEST_METHOD"] == "POST") && empty($_POST["street"])) { echo '<div class="alert alert-danger" role="alert">Street is required</div>';} else if (isset($_POST["street"])) {
                        $street = test_input($_POST["street"]);
                            }
                    ?>

                </div>
                <div class="form-group col-md-6">
                    <label for="streetnumber">Street number:</label>
                    <input type="text" id="streetnumber" name="streetnumber" class="form-control" required>
                    <?php if (($_SERVER["REQUEST_METHOD"] == "POST") && empty($_POST["streetnumber"])) { echo '<div class="alert alert-danger" role="alert">Streetnumber is required</div>';} else if (isset($_POST["streetnumber"])) {
                        $street_number = test_input($_POST["streetnumber"]);
                            }
                    ?>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="city">City:</label>
                    <input type="text" id="city" name="city" class="form-control" required>
                    <?php if (($_SERVER["REQUEST_METHOD"] == "POST") && empty($_POST["city"])) { echo '<div class="alert alert-danger" role="alert">City is required</div>';} else if (isset($_POST["city"])) {
                        $city = test_input($_POST["city"]);
                            }
                    ?>
                </div>
                <div class="form-group col-md-6">
                    <label for="zipcode">Zipcode</label>
                    <input type="text" id="zipcode" name="zipcode" class="form-control" required>
                    <?php if (($_SERVER["REQUEST_METHOD"] == "POST") && empty($_POST["zipcode"])) { echo '<div class="alert alert-danger" role="alert">Zipcode is required</div>';} else if (isset($_POST["zipcode"])) {
                        $zipcode = test_input($_POST["zipcode"]);
                        if (!is_numeric($_POST["zipcode"])) {
                            echo '<div class="alert alert-danger" role="alert">Zipcode must be a number</div>';
                        }
                            }
                    ?>
                </div>
            </div>
        </fieldset>

        <fieldset>
            <legend>Products</legend>
            <?php foreach ($products as $i => $product): ?>
                <label>
					<?php // <?= is equal to <?php echo ?>
                    <input type="checkbox" value="1" name="products[<?php echo $i ?>]"/> <?php echo $product['name'] ?> -
                    &euro; <?= number_format($product['price'], 2) ?></label><br />
            <?php endforeach; ?>
        </fieldset>

        <button type="submit" class="btn btn-primary">Order!</button>
    </form>

    <footer>You already ordered <strong>&euro; <?php echo $totalValue ?></strong> in pacemaker and defibrillators. <br><br></footer>

    <div class="order-summary" style="visibility: <?php echo ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['street']) && !empty($_POST['streetnumber']) && !empty($_POST['zipcode']) && !empty($_POST['city']) && !empty($_POST['email'])) ? 'visible' : 'hidden'; ?>">
        <h1>Order summary</h1>
        <?php echo "<h5>Delivery adress:</h5>" . $adress . "</br></br>"; ?>
        
        <?php echo "<h5>Products:</h5>" . "<ul>";
        if (isset($_POST["products"])){
        foreach ($_POST["products"] as $index => $value) {
            echo "<li>" . $products[$index]["name"] . "</br>" . $products[$index]["price"] . " €" . "</li>";
            $totalValue += $products[$index]["price"];
        }
    }
        echo "</ul>";
        ?>
    </div>
</div>

<style>
    footer {
        text-align: center;
    }
    .order-summary{
        text-align: center;
        margin-top: 50px;
    }
    li {
    list-style-position: inside; 
    }
    h1{
        margin-bottom: 20px;
    }

</style>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
