<?php
session_start();
require_once ("config.php");

if(isset($_SESSION["valid"]) && $_SESSION["valid"] === true){
    echo '';
} else {
    header("location: adminlogin.php");
    exit;
}


$product_name = $product_desc =$product_category=$product_quantity=$product_price=$product_image= "";
$product_name_err = $product_desc_err =$product_category_err=$product_quantity_err=$product_price_err=$product_image_err= "";
global $error;



if($_SERVER["REQUEST_METHOD"] == "POST") {

    if(empty(trim($_POST["product_name"]))){
        $product_name_err = "Enter Product Name";
    } else{
        $product_name = trim($_POST["product_name"]);
    }

    if(empty(trim($_POST["product_desc"]))){
        $product_desc_err = "Enter Product Desc";
    } else{
        $product_desc = trim($_POST["product_desc"]);
    }

    if(empty(trim($_POST["product_categories"]))){
        $product_category_err = "Enter Category";
    } else{
        $product_category = trim($_POST["product_categories"]);
    }
    if(empty(trim($_POST["quantity"]))){
        $product_quantity_err = "Enter Quantity";
    } else{
        $product_quantity = trim($_POST["quantity"]);
    }
    if(empty(trim($_POST["price"]))){
        $product_price_err = "Enter Price";
    } else{
        $product_price = trim($_POST["price"]);
    }
    if(empty(trim($_POST["file"]))){
        $product_image_err = "Enter Image Url";
    } else{
        $product_image = trim($_POST["file"]);
    }





if(empty($product_name_err) && empty($product_desc_err) && empty($product_category_err) && empty($product_quantity_err) && empty($product_price_err) && empty($product_image_err)) {
    $sql = "INSERT INTO products  VALUES (NULL,'$product_name','$product_desc','$product_category','$product_quantity','$product_price','$product_image')";

    if (mysqli_query($mysqli, $sql)) {
        echo '<script>alert("Product Added in a database successfully.")</script>';
        header("location: admin.php");
        exit;
    } else {

        $error = "One Of The field is empty";
    }
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
input,textarea{
    margin: 0px 500px;
    border:1px black solid;
    font-weight: bold;
    margin-left: auto;
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
        <ul >
            <li>
                <div class="dropdown" style="padding: 45px">
                    <button class="btn btn-primary rounded-pill btn-block dropdown-toggle" style="background-color: white;color: black" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        Products
                    </button>
                    <ul class="dropdown-menu "  style=" background-image: linear-gradient(#36d1dc,#5b86e5);" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item rounded-pill btn-block" href="admin.php">Products</a></li>
                        <li><a class="dropdown-item rounded-pill btn-block" href="user.php">User</a></li>
                        <li><a class="dropdown-item rounded-pill btn-block" href="usermessage.php">Messages</a></li>
                        <li><a class="dropdown-item rounded-pill btn-block" href="admin_delete.php">Product_Edit</a></li>


                    </ul>
                </div>


            </li>
            <li><a href="adminlogout.php" style="">Logout</a></li>
        </ul>

    </nav>

</header>
<body>

<form class="form-horizontal" style="text-align: center;" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" >
    <fieldset>

        <legend>PRODUCTS</legend>
        <span class="text-danger"><?php echo $error; ?></span>
        <div class="form-group">
            <label class="col-md-4 control-label" >PRODUCT NAME</label>
            <div class="col-md-4">
                <input id="product_name" style="border: 1px black solid" name="product_name" placeholder="PRODUCT NAME" class="form-control input-md"  type="text" >
                <span class="text-danger"><?php echo $product_name_err; ?></span>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label" >PRODUCT DESCRIPTION</label>
            <div class="col-md-4">
                <textarea id="product_desc" style="border: 1px black solid" name="product_desc" placeholder="PRODUCT DESCRIPTION" class="form-control input-md" ></textarea>
                <span class="text-danger"><?php echo $product_desc_err; ?></span>
            </div>
        </div>

        <div class="form-group" >
            <label class="col-md-4 control-label" >PRODUCT CATEGORY</label>
            <div class="col-md-4">
                <select id="product_categories"  style="border: 1px black solid" name="product_categories" class="form-control">
                    <option>Ps4</option>
                <option>Ps5</option>
                    <option>Xbox</option>
                </select>
            </div>
            <span class="text-danger"><?php echo $product_category_err; ?></span>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label" >AVAILABLE QUANTITY</label>
            <div class="col-md-4">
                <input id="quantity" style="border: 1px black solid" name="quantity" placeholder="AVAILABLE QUANTITY" class="form-control input-md"  type="text" >
                <span class="text-danger"><?php echo $product_quantity_err; ?></span>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label" >PRICE</label>
            <div class="col-md-4">
                <input id="price" name="price" style="border: 1px black solid" placeholder="Price" class="form-control input-md" type="text" >
                <span class="text-danger"><?php echo $product_price_err; ?></span>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label" >IMAGE LINK</label>
            <div class="col-md-4">
                <textarea id="file" style="border: 1px black solid" name="file" placeholder="LINK" class="form-control input-md" ></textarea>
                <span class="text-danger"><?php echo $product_image_err; ?></span>
            </div>
        </div>



                <div class="form-group" style="" ><input type="submit" id="submit" class="btn btn-primary rounded-pill btn-block" style="background-color:lightgreen;color:black;margin: 0px 500px;width: 15%;" value="Submit">
                </div>

    </fieldset>
</form>

<table border="2" width="75%" style="margin: 0px 150px">
    <tr style="text-align: center">
        <td>Sr.No.</td>
        <td>Name</td>
        <td>Images</td>
    </tr>

    <?php


    $records = mysqli_query($mysqli,"select id,product_name, product_image from products");

    while($data = mysqli_fetch_array($records))
    {
        ?>
        <tr style="text-align: center">
            <td><?php echo $data['id']; ?></td>
            <td><?php echo $data['product_name']; ?></td>
            <td><img src="<?php echo $data['product_image']; ?>" width="100" height="100"></td>
        </tr>
        <?php
    }
    ?>

</table>

<?php mysqli_close($mysqli);
?>

</body>
</html>