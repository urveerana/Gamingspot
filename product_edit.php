<?php

include "config.php";

$id = $_GET['id'];

$qry = mysqli_query($mysqli,"select * from products where id='$id'");

$data = mysqli_fetch_array($qry);

if(isset($_POST['update']))
{
    $product_name = $_POST['product_name'];
    $quantity = $_POST['product_quantity'];
    $price = $_POST['product_price'];

    $edit = mysqli_query($mysqli,"update products set product_name='$product_name', product_quantity='$quantity',product_price='$price' where id='$id'");

    if($edit)
    {
        mysqli_close($mysqli);
        header("location:admin_delete.php");
        exit;
    }
    else
    {
        echo mysqli_error();
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
    <link href="admin.css" rel="stylesheet" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" >
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>



    <style>
        input{
            margin: 0px 500px;
            border:1px black solid;
            margin-left: auto;
            width: 100%;
        }

        .form-group{
            display: flex;
            padding: 8px;
        }

    </style>

</head>

<header>
    <nav>
        <img src="images/Logo.png" height="60px"/ >

        <h1 style="padding-top: 0px">
            Welcome Admin<br>
            How Are You Today
        </h1>
        <ul style="padding-top: 35px">
            <li><a href="admin_delete.php" style="">Go Back</a></li>
&nbsp;
            <li><a href="adminlogout.php" style="">Logout</a></li>
        </ul>

    </nav>

</header>
<body>
<br>
<br>

<h3 style="text-align: center">Update Product Details</h3>
<br>

    <form class="form-horizontal" style="text-align: center;"  method="post" >
        <fieldset>

            <div class="form-group">
                <label class="col-md-4 control-label" >PRODUCT NAME</label>
                <div class="col-md-4">
                    <input type="text" name="product_name" value="<?php echo $data['product_name'] ?>" placeholder="Enter Product Name" Required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" >PRODUCT QUANTITY</label>
                <div class="col-md-4">
                    <input type="text" name="product_quantity" value="<?php echo $data['product_quantity'] ?>" placeholder="Enter Quantity" Required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" >PRODUCT PRICE</label>
                <div class="col-md-4">
                    <input type="text" name="product_price" value="<?php echo $data['product_price'] ?>" placeholder="Enter Price" Required>
                </div>
            </div>
        </fieldset>
    <input type="submit" name="update" class="btn btn-warning rounded-pill py-2 btn-block" style="color: white;margin:0px  20px;width: auto" value="Update">
</form>