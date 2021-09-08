<?php
session_start();

require_once ('config.php');


$Message_Status = '';
$OrderStatus = 'error';
$id = '';
global $total;
$user = htmlspecialchars($_SESSION["username"]);



if(!empty($_POST['stripeToken'])){

    $token = $_POST['stripeToken'];
    $name = $_POST['holdername'];
    $card_no = $_POST['card_number'];
    $card_cvc = $_POST['card_cvc'];
    $card_exp_month = $_POST['card_exp_month'];
    $card_exp_year = $_POST['card_exp_year'];

    $total= $_POST['total'];
    $add = $_POST['add'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];





    require_once('stripe-php-master/init.php');

    $stripe = array(
        "SecretKey"=>"sk_test_51JV4w3HIYxZbUlwCwLPrQiNKP4ZCrsaVwVBMNUl1CIfqNwNhou89PK97xT8vFb68jquXMMqHsKOuFvV9YxK5K4jj00eqPHERnH",
        "PublishableKey"=>"pk_test_51JV4w3HIYxZbUlwCM9gCCkQ5Hm0EvMzrjNvP1kmMzmSodCqb0PR1jumxypkcvJm2ifIUdc9qaRBPSlSx1N2hyMyn00yi6QwFhq"
    );


    \Stripe\Stripe::setApiKey($stripe['SecretKey']);

    $customer = \Stripe\Customer::create(array(
        'source'  => $token,
        'name' => $name,
    ));

    $order_no = strtoupper(str_replace('.','',uniqid('', true)));

    $itemPrice = ($total*100);
    $currency = "cad";

    $charge = \Stripe\Charge::create(array(
        'customer' => $customer->id,
        'amount'   => $itemPrice,
        'currency' => $currency,
        'metadata' => array(
            'order_id' => $order_no
        )
    ));

    $each_value = $charge->jsonSerialize();

    if($each_value['amount_refunded'] == 0 && empty($each_value['failure_code']) && $each_value['paid'] == 1 && $each_value['captured'] == 1){

        $transactionID = $each_value['balance_transaction'];
        $paidAmount = $each_value['amount'];
        $paidCurrency = $each_value['currency'];
        $payment_status = $each_value['status'];
        $payment_date = date("Y-m-d H:i:s");
        $dt_tm = date('Y-m-d H:i:s');


        if($payment_status == 'succeeded'){
            $OrderStatus = 'success';
            $Message_Status = 'Your Payment has been Successful!';



            $amount12 = 100;
            $previousValues = array();
            for ($i = 0; $i < $amount12; $i++){
                $rand = rand(0,9999);
                while (in_array($rand, $previousValues)){
                    $rand = rand(0, 9999);
                }
                $previousValues[] = $rand;
                $today = date("Ymd");
                $unique1 = $today.$rand;
            }

            $today1 = date("Y-m-d-h-i-s");

            $str1 = date("Ymdhms") + 1;
            $sql = " INSERT INTO `history`(`id`, `customername`, `email`, `address`, `phone`, `orderno`, `total`, `time`) 
            VALUES (NULL,'$user','$email','$add','$phone','$unique1','$total','$today1')";


            mysqli_query($mysqli, $sql);

            $id1 = $_SESSION['id'];
            $cartp = "SELECT * FROM `cart` WHERE `uid` = '$id1'";
            $re = mysqli_query($mysqli, $cartp);
            if (mysqli_num_rows($re)>0) {
                while ($row = mysqli_fetch_assoc($re)) {
                    $q = (int)$row['quantity'];
                    $pd = (int)$row['pid'];
                    $dp = "UPDATE `products` SET `product_quantity` = `product_quantity`-'$q' WHERE `id` = '$pd'";
                    mysqli_query($mysqli, $dp);
                }
            }

            $sql1 = "DELETE FROM `cart` WHERE `uid`='$id1'";
            mysqli_query($mysqli, $sql1);


        } else{
            $Message_Status = "Your Payment has Failed!";
        }
    } else{
        $Message_Status = "Transaction has been failed!";
    }
} else{
    $Message_Status = "Error on form submission.";
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



    <style>
        .form-check-input[type=checkbox].filled-in:checked+label:after,
        label.btn input[type=checkbox].filled-in:checked+label:after {
            border: 2px solid #4285f4;
            background-color: #4285f4;
        }
        body{
            background-image: url("images/5.jpg");
            background-size: cover;
        }
         .rounded-pill:hover{
             background-color: yellow;
         }
    </style>

</head>

<header>
    <nav >
        <img src="images/Logo.png" height="60px" />

        <ul style="padding: 25px">
            <li><a class="rounded-pill btn-block p-1 " href="home1.php">Home</a></li>
        </ul>

    </nav>
</header>
<body>
<div class="container mt-4 mb-4">
    <div class="row d-flex cart align-items-center justify-content-center">
        <div class="col-md-10">
            <div class="card">

                <div class="row g-0">
                    <div class="col-md-6 border-right p-5">
                        <div class="text-center order-details">
                            <div class="d-flex justify-content-center mb-5 flex-column align-items-center">
                                <span class="check1"><i class="fas fa-check fa-5x"></i></span>

                                <h1 class="<?php echo $OrderStatus; ?>"><?php echo $Message_Status; ?></h1>

                                <h6 class="heading">Payment Information - </h6>
                                <br>

                            <?php
                            global $unique;
                            $amount = 100;
                            $previousValues = array();
                            for ($i = 0; $i < $amount; $i++){
                                $rand = rand(0,9999);
                                while (in_array($rand, $previousValues)){
                                    $rand = rand(0, 9999);
                                }
                                $previousValues[] = $rand;
                                $today = date("Ymd");
                                $unique = $today.$rand;
                            }
                            ?>

                                <p><b>Transaction ID: </b><?php echo $unique?> </p>
                                <p><b>Paid Amount:</b>$ <?php echo $total?> </p>


                                <span class="font-weight-bold" style="font-size: 40px">Order Confirmed</span>
                                <small class="mt-2">Thank You <b style="text-transform:uppercase"><?php echo $user?></b> For Shopping at GamingSpot</small> </div>

                            <button class="btn btn-danger btn-block order-button"><a href="home1.php" style="color: white">Go to Home</a></button>                        </div>
                    </div>

                    </div>
                </div>
                <div> </div>
            </div>
        </div>
    </div>
</div>
</body>
<?php require_once ('footer.php')?>
</html>