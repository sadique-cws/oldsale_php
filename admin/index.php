<?php include "../dbconnect.php";

if(!isset($_SESSION['admin'])){
    echo "<script>window.open('login.php','_self')</script>";
}

?>
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

<div class="container-fluid ps-0">
    <div class="row w-100 p-0">
        <div class="col-2 bg-secondary" style="height:100vh;overflow-y:scroll">
            <?php include "side.php";?>
        </div>
        <div class="col-10">
            <div class="row mt-3">
                <div class="col-4">
                    <div class="card bg-danger text-white">
                        <div class="card-body">
                            <h1 class="display-4"><?= mysqli_num_rows(mysqli_query($connect,"select * from posts"));?></h1>
                            <h6>Total Posts</h6>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card bg-warning text-white">
                        <div class="card-body">
                            <h1 class="display-4"><?= mysqli_num_rows(mysqli_query($connect,"select * from categories"));?></h1>
                            <h6>Total Category</h6>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card bg-dark-green text-white">
                        <div class="card-body">
                            <h1 class="display-4"><?= mysqli_num_rows(mysqli_query($connect,"select * from users"));?></h1>
                            <h6>Total Users</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>