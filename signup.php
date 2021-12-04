<?php include "dbconnect.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= PROJECT_NAME; ?></title>
    <link rel="stylesheet" href="style.css">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
</head>
<body class="bg-light">
    <?php include "header.php";?>

    <div class="container mt-3">
        <div class="row">
            <div class="col-4 mx-auto">
                <div class="card">
                    <div class="card-header bg-dark-green text-white"><i class="bi bi-people"></i> Create An Account</div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="mb-3">
                                <label for=""><i class="bi bi-phone-fill"></i> Name</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for=""><i class="bi bi-envelope-fill"></i> email</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for=""><i class="bi bi-phone-fill"></i> Contact</label>
                                <input type="text" name="contact" class="form-control">
                            </div>
                            <div class="row">
                                <div class="mb-3 col">
                                    <label for=""><i class="bi bi-key-fill"></i> Password</label>
                                    <input type="password" name="password" class="form-control">
                                </div>
                                <div class="mb-3 col">
                                    <label for="">Confirm Password</label>
                                    <input type="password" name="c_password" class="form-control">
                                </div>
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="signup" class="btn bg-dark-green float-end text-white"><i class="bi bi-lock"></i> Signup</button>
                            </div>
                        </form>

                        <?php
                            if(isset($_POST['signup'])){
                                $name = $_POST['name'];
                                $contact = $_POST['contact'];
                                $email = $_POST['email'];
                                $password = $_POST['password'];
                                $c_password = $_POST['c_password'];

                                if($password != $c_password){
                                    echo "<script>alert('password in match') </script>";
                                }
                                else{
                                    $callingCheck = mysqli_query($connect,"select * from users where email = '$email'");
                                    
                                    $countCheck = mysqli_num_rows($callingCheck);

                                    if($countCheck > 0){
                                        echo "<script>alert('email already exist try with another email') </script>";
                                    }
                                    else{

                                    $password = sha1($password);
                                    $query = mysqli_query($connect,"insert into users (name, contact, email, password) value ('$name','$contact','$email','$password')");

                                    if($query){
                                        echo "<script>window.open('login.php','_self')</script>";
                                    }
                                }
                                }
                            }



                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>