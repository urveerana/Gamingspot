<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GamingSpot</title>
    <link href="hf.css" rel="stylesheet" type="text/css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    <style>
        .form-check-input[type=checkbox].filled-in:checked+label:after,
        label.btn input[type=checkbox].filled-in:checked+label:after {
            border: 2px solid #4285f4;
            background-color: #4285f4;
        }
        .mb-4-5 {
            margin-bottom: 24px;
        }
        body{
            background-image: url("images/5.jpg");
            background-size: cover;
        }

    </style>

</head>

<header>
    <nav >
        <img src="images/Logo.png" height="60px" />

        <ul style="padding: 25px">
            <li><a href="home1.php">Home</a></li>
            <li><a href="#"><i class="fas fa-shopping-cart"></i></a></li>
            <li><a href="home.php">Logout</a></li>

        </ul>

    </nav>
</header>
<body>

<div class="container" style="background: white;border: 1px black solid">


    <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-4-5">
                <span class="text-muted"><strong>Your cart</strong></span>
                <span class="badge badge-primary badge-pill">3</span>
            </h4>
            <ul class="list-group mb-3">
                <li class="list-group-item d-flex justify-content-between bg-light">
                    <div class="text-success">
                        <h6 class="my-0">Total Amount</h6>
                        <small></small>
                    </div>
                    <span class="text-success">-$5</span>
                </li>
                <form class="card p-2">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Promo code">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary btn-md my-0 ml-0">Redeem</button>
                        </div>
                    </div>
                </form>
                <li class="list-group-item d-flex justify-content-between">
                    <span>Total After Promo/Discount</span>
                    <strong>$20</strong>
                </li>
            </ul>

        </div>
        <div class="col-md-8 order-md-1">
            <form class="needs-validation" novalidate>

                <h4 class="mb-3"><strong>Payment</strong></h4>

                <div class="d-block my-3">
                    <div class="form-check pl-0">
                        <input style="border: 1px black solid" id="credit" name="paymentMethod" type="radio" class="form-check-input" checked required>
                        <label class="form-check-label" for="credit">Credit card</label>
                    </div>
                    <div class="form-check pl-0">
                        <input style="border: 1px black solid" id="debit" name="paymentMethod" type="radio" class="form-check-input" required>
                        <label class="form-check-label" for="debit">Debit card</label>
                    </div>

                </div>
                <div class="row" style="margin: 0px -70px;">
                    <div class="col-md-6 mb-2">
                        <div class="md-form md-outline my-2">
                            <input style="border: 1px black solid" type="text" id="cc-name" class="form-control" required>
                            <label for="cc-name">Name on card</label>
                            <small class="text-muted">Full name as displayed on card</small>
                        </div>
                        <div class="invalid-feedback">
                            Name on card is required
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <div class="md-form md-outline my-2">
                            <input style="border: 1px black solid" type="text" id="cc-number" class="form-control" required>
                            <label for="cc-number">Credit card number</label>
                        </div>
                        <div class="invalid-feedback">
                            Credit card number is required
                        </div>
                    </div>
                </div>
                <div class="row" >
                    <div class="col-md-3 mb-2" style="margin: -100px -380px;">
                        <div class="md-form md-outline my-2">
                            <input style="border: 1px black solid" type="text" id="cc-expiration" class="form-control" required>
                            <label for="cc-expiration">Expiration</label>
                        </div>
                        <div class="invalid-feedback">
                            Expiration date required
                        </div>
                    </div>
                    <div class="col-md-3 mb-2" style="margin: -100px -90px; ">
                        <div class="md-form md-outline my-2">
                            <input style="border: 1px black solid" type="text" id="cc-cvv" class="form-control" required>
                            <label for="cc-cvv">CVV</label>
                        </div>
                        <div class="invalid-feedback">
                            Security code required
                        </div>
                    </div>
                </div>
                <hr class="mb-4">
                <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
            </form>
        </div>
    </div>
</body>
<footer style="">
    <a href="index.html">About Us</a>
    <a href="#">Addresses</a>
    <a href="login.html">Contact</a>
</footer>
</html>
