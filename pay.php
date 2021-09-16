<?php
session_start();
include_once ('config.php');
include_once ('badge.php');


$total = $_GET['total'];

if(isset($_POST['pay'])) {

    if(empty($_POST['name'])){
        echo 'Empty Name';
    }


}
?>
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

    <script>
        $( function() {
            $( document ).tooltip();
        } );
    </script>
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
            <li><a class="rounded-pill btn-block p-1 " href="home1.php">Home</a></li>
            <li><a href="cart.php"><style>
                        #ex4 .p1[data-count]:after{
                            position:absolute;
                            right:10%;
                            top:8%;
                            content: attr(data-count);
                            font-size:70%;
                            padding:.2em;
                            border-radius:50%;
                            line-height:1em;
                            color: white;
                            background:rgba(255,0,0,.85);
                            text-align:center;
                            min-width: 1em;
                        }
                        .rounded-pill:hover{
                            background-color: white;
                            color: black;
                        }
                    </style>
                    <div id="ex4">
  <span class="p1 fa-stack  has-badge" data-count="<?php echo $rowcount?>">
    <i class="p3 fa fa-shopping-cart fa-stack-1x xfa-inverse" data-count="0"></i>
  </span></a></li>

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
                    <span class="text-success">$<?=$_GET['total']?></span>
                </li>


                </ul>
            <div style="margin: ">
                <label>Testing Card No</label>
                <br>
                <label>5200828282828210</label>
                <br>
                <label>378282246310005</label>
                <br>
                <label>4242424242424242</label>
            </div>
            </div>

        <div class="col-md-8 order-md-1">

            <form class="needs-validation"   role="form" action="orderconfirm.php" method="POST" name="cardpayment" id="payform" >

                <input type="hidden" name="total" value="<?php echo $total;?>"/>

                <h4 class="mb-3"><strong>Biling details</strong></h4>
                    <div class="col">
                        <div class="form-outline">
                            <label class="form-label" for="form6Example1">First Name</label>
                            <input type="text" style="border: 1px red solid;width: 50%;" name="fname" id="fname" value="<?php echo $_SESSION['username'];?>" autofocus placeholder="First Name" class="form-control" required/>
                        </div>

                    </div>
                    <div class="col" >
                        <div class="form-outline">
                            <label class="form-label" for="form6Example2">Last name</label>
                            <input type="text" style="border: 1px red solid;width: 50%" id="lname" name="lname" placeholder="Last Name" class="form-control" required />
                        </div>
                    </div>

                <div class="form-outline ">
                    <label class="form-label" for="form6Example4">Address</label>
                    <input type="text" style="border: 1px red solid;width: 50%" id="add" name="add" placeholder="Address"class="form-control"required />
                </div>

                <div class="form-outline ">
                    <label class="form-label" for="form6Example5">Email</label>
                    <input type="email" style="border: 1px red solid;width: 50%" id="email" name="email" placeholder="Email"class="form-control" required />
                </div>

                <div class="form-outline ">
                    <label class="form-label" for="form6Example6">Phone</label>
                    <input type="text" style="border: 1px red solid;width: 50%"id="phone" name="phone" min=0 maxlength="12" placeholder="Phone"class="form-control" required/>
                </div>


                <div class="d-block my-3">
                    <div class="form-check pl-0">
                        <label class="form-check-label" for="credit">Credit card</label>
                        <input style="border: 1px black solid" id="credit" name="paymentMethod" type="radio" class="form-check-input" checked required>
                    </div>
                    <div class="form-check pl-0">
                        <label class="form-check-label" for="debit">Debit card</label>
                        <input style="border: 1px black solid" id="debit" name="paymentMethod" type="radio" class="form-check-input" required>

                    </div>

                </div>
                    <div class="col-md-6 mb-2">
                        <div class="md-form md-outline my-2">
                            <label for="cc-name">Name on card</label>
                            <input type="text" style="border: 1px red solid" class="form-control" name="holdername" placeholder="Enter Card Holder Name"  required id="name" />
                        </div>
                        <div class="invalid-feedback">
                            Name on card is required
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <div class="md-form md-outline my-2">
                            <label for="cc-number">Credit card number</label>
                            <input type="text" style="border: 1px red solid" class="form-control" name="card_number" placeholder="Valid Card Number" autocomplete="cc-number" id="card_number" maxlength="16" data-stripe="number" required />
                        </div>
                        <div class="invalid-feedback">
                            Credit card number is required
                        </div>
                    </div>


                                <div class="form-group">
                                    <label for="cardExpiry">MM</label>
                                    <input type="text"  style="width: 75px;border: 1px red solid" class="form-control" name="card_exp_month" placeholder="MM" data-stripe="exp_month"  required id="card_exp_month" />
                                </div>



                        <div class="invalid-feedback">
                            Expiration date required
                        </div>

                        <div class="form-group">
                            <label for="cardExpiry">YYYY</label>
                            <input type="text" class="form-control" style="width: 75px;border: 1px red solid" name="card_exp_year"   id="card_exp_year"  data-stripe="exp_year" placeholder="YYYY"   required  />
                            <button class="btn btn btn-dark rounded-pill py-2 btn-block" style="margin: 0px 180px; type="submit" name="pay" id="pay">PAY NOW ( $<?php echo $total;?> )</button>

                        </div>
                <div class="form-group">
                            <input type="password" class="form-control" style="width: 75px;border: 1px red solid" name="card_cvc" placeholder="CVV" autocomplete="cc-csc" id="card_cvc" required />
                    <label for="cc-cvv">CVV</label>

                </div>

                        <div class="invalid-feedback">
                            Security code required
                        </div>

            </form>
        </div>

    </div>


</body>

<script src="https://js.stripe.com/v2/"></script>
<script src="js/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.8.1/jquery.validate.min.js"></script>

<script>

        Stripe.setPublishableKey('pk_test_51JV4w3HIYxZbUlwCM9gCCkQ5Hm0EvMzrjNvP1kmMzmSodCqb0PR1jumxypkcvJm2ifIUdc9qaRBPSlSx1N2hyMyn00yi6QwFhq');

    function stripeResponseHandler(status, response) {
        if (response.error) {
            $('#pay').removeAttr("disabled");
            $(".payment-status").html('<p>'+response.error.message+'</p>');
        } else {
            var form$ = $("#payform");
            var token = response.id;
            form$.append("<input type='hidden' name='stripeToken' value='" + token + "' />");
            form$.get(0).submit();
        }
    }

    $(document).ready(function() {
            $("#payform").submit(function () {
                $('#pay').attr("disabled", "disabled");

                Stripe.createToken({
                    number: $('#card_number').val(),
                    exp_month: $('#card_exp_month').val(),
                    exp_year: $('#card_exp_year').val(),
                    cvc: $('#card_cvc').val()
                }, stripeResponseHandler);

                return false;
            });

    });


</script>
<?php require_once ('footer.php')?>
</html>