<?php
include 'config.php';
session_start();
$id=$_SESSION['id'];
$query=mysqli_query($mysqli,"SELECT * FROM users where id='$id'");
$row=mysqli_fetch_assoc($query);
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>GamingSpot</title>
        <link href="hf.css" rel="stylesheet" type="text/css">

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>




        <script>
            $(document).ready(function(){

                $('.slider').bxSlider({
                    auto: true,
                    autoControls: false,
                    stopAutoOnClick: true,
                    pager: true,
                });

            });

        </script>

    </head>

    <header style="position: relative">
        <nav>
            <img src="images/Logo.png" height="60px"/ >



                    <style>
                        .rounded-pill:hover{
                            background-color: white;
                            color: black;
                        }

                    </style>
                </li>


                <li><a class="rounded-pill btn-block p-1 " style="padding-top: 75px;margin: 0px 500px;" href="home1.php">Home</a></li>

                &nbsp;&nbsp;&nbsp;&nbsp;
                <li> <div style="text-align: end;margin: 0px 20px;">

                        <b style="text-transform:uppercase"> <div class="btn-group shadow-0" style="margin: 0px -50px">
                                <button
                                    type="button"
                                    class="btn btn-light dropdown-toggle rounded-pill py-2 btn-block"
                                    data-mdb-toggle="dropdown"
                                    data-bs-toggle="dropdown"
                                    aria-expanded="false"
                                    style="background-color: white;color:black;"

                                >
                                    <i class="fas fa-user fa-2px" style="text-align: center">   <br><?php echo$_SESSION['username'] ?></i>  </b>                     </button>
                        <ul class="dropdown-menu" style="background-image: linear-gradient(#36d1dc,#5b86e5);color: white">
                            <li><a class="dropdown-item dropdown-primary rounded-pill py-2 btn-block" style="color: black" href="profile.php">Profile</a></li>
                            <li><a class="dropdown-item dropdown-primary rounded-pill py-2 btn-block" style="color: black" href="order_history.php">History</a></li>
                            <li><a class="dropdown-item dropdown-primary rounded-pill py-2 btn-block" style="color: black" href="logout.php">Logout</a></li>

                        </ul>
                    </div>




                    </div></li>


            </ul>

        </nav>
    </header>
    <body>
    <style>
        input {
            margin: 0px 600px;
        }
        label{
            font-weight: bold;
        }
    </style>
<div style="border: 2px dotted black;margin: 120px 10px">
<h1 style="color: black">User Profile</h1>
<div class="profile-input-field" style="text-align: center">
    <form method="post" action="#" >




        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" name="name" style="width:20em;" placeholder="Enter your Name" value="<?php echo $row['username']; ?>" required />
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email" style="width:20em;" required placeholder="Enter your email" value="<?php echo $row['email']; ?>"/>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" name="password" style="width:20em;" required placeholder="Enter your Password" value="<?php echo $row['password']; ?>"/>
        </div>

        <div class="form-group">
            <label>Image</label>
            <img style="
                            background-color: white;
  display: inline-block;
  width: 50px;
  height: 50px;
  border-radius: 50%;
  object-fit: cover;
" src="<?php echo $row['image']; ?>"
            >
            <input type="text" class="form-control" name="file" style="width:20em;" required placeholder="Image Name" value="<?php echo $row['image']; ?>"/>
        </div>
        <br>
        <br>
        <div class="form-group">
            <input type="submit" name="submit" class="btn btn-danger rounded-pill py-2 btn-block" style="width:auto; margin:0;"><br><br>

        </div>
    </form>

</div>
</div>
</html>
<?php
if(isset($_POST['submit'])){
    $fullname = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $s =$_SESSION['username'];
    $password1 = password_hash($password,PASSWORD_DEFAULT);
    $pImage = $_POST['file'];
    $image = "images/" . $pImage;



    $query = "UPDATE users SET username = '$fullname',
                      email = '$email',
                 password = '$password1',
                 image = '$image'
                      WHERE id = '$id'";
    $update = "UPDATE history SET customername = '$fullname' where customername = '$s'";
    $result = mysqli_query($mysqli, $query);

        $r = mysqli_query($mysqli, $update);

    ?>
    <script type="text/javascript">
        alert("Update Successfull.");
        window.location("profile.php");
    </script>

    <?php

}
?>


