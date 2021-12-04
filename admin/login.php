<?php include "../dbconnect.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin login | <?= PROJECT_NAME; ?> </title>
    <link rel="stylesheet" href="../style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

</head>
<body class="bg-dark">
<?php include "header.php";?>

<div class="container mt-3">
    <div class="row w-100 p-0">
        <div class="col-4 mx-auto">
            <div class="card">
                <div class="card-header">Admin Login Here</div>
                <div class="card-body">
                        <form action="" method="post">
                            <div class="mb-3">
                                <label for=""><i class="bi bi-phone-fill"></i> username</label>
                                <input type="text" name="username" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for=""><i class="bi bi-key-fill"></i> Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="login" class="btn bg-dark-green float-end text-white"><i class="bi bi-lock"></i> Login</button>
                            </div>
                        </form>

                        <?php 
                        if(isset($_POST['login'])){
                            $contact = $_POST['username'];
                            $password = $_POST['password'];

                            $query = mysqli_query($connect, "select * from admin where username='$contact' and password='$password'");

                            $count = mysqli_num_rows($query);

                            if($count > 0){
                                $_SESSION['admin'] = $contact;
                                echo "<script>window.open('index.php','_self')</script>";
                            }
                            else{
                                echo "<script>alert('contact and password is incorrect') </script>";
                            }

                        }
                        ?>
                    </div>
            </div>
        </div>
    </div>
</div>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>