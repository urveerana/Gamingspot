<?php
require_once ("config.php");


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

    </style>

</head>

<header >
    <nav>
        <img src="images/Logo.png" height="60px"/ >

        <h1 style="padding-top: 0px ">
            Welcome Admin<br>
            How Are You Today
        </h1>
        <ul >
            <li>
                <div class="dropdown" style="padding: 45px">
                    <button class="btn btn-primary rounded-pill btn-block dropdown-toggle" style="background-color: white;color: black" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        User
                    </button>
                    <ul class="dropdown-menu "  style=" background-image: linear-gradient(#36d1dc,#5b86e5);" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item rounded-pill btn-block" href="admin.php">Products</a></li>
                        <li><a class="dropdown-item rounded-pill btn-block" href="user.php">User</a></li>
                        <li><a class="dropdown-item rounded-pill btn-block" href="usermessage.php">Messages</a></li>
                        <li><a class="dropdown-item rounded-pill btn-block" href="admin_delete.php">Product_Edit</a></li>

                    </ul>
                </div>


            </li>
            <li><a href="adminlogout.php" style="margin: 0px 0px">Logout</a></li>
        </ul>

    </nav>

</header>
<body>
<table class="table table-striped">
    <thead style="text-align: center">
    <tr>
        <th scope="col">User Number</th>
        <th scope="col">Username</th>
    </tr>
    </thead>
    <tbody style="text-align: center";>

    <?php

    $sql = "SELECT * FROM `users`";
    $result= mysqli_query($mysqli, $sql);
    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo ucfirst($row['username']); ?></td>

                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                <td >
                    <td>
                        <a href="deletebutton.php?id=<?php echo $row['id']; ?>" style=""> <input type="button" id="delete" class="btn btn-primary rounded-pill py-2 btn-block" style="background-color: red;color: white;margin:0px  10px;" value="Delete"></a></td>

                </td>
                </form>
            </tr>
            <?php
        }
    }
    else{
        echo "<tr style='color:orange;'><td colspan='8'>No User...!</td></tr>";
    }
    ?>
    </tbody>
</table>


</body>
</html>