<?php include "../dbconnect.php";
if(!isset($_SESSION['user'])){
    echo "<script>window.open('../login.php','_self')</script>";
}

$log = $_SESSION['user'];
$callingUser = mysqli_query($connect,"select * from users where contact = '$log'");
$data = mysqli_fetch_array($callingUser);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= PROJECT_NAME; ?> | </title>
    <link rel="stylesheet" href="../style.css">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
</head>
<body>
    <?php include "../header.php";?>

    <div class="container mt-3">
        <div class="row">
            <div class="col-3">
                <div class="card border-0 ">
                    <img src="../dp.jpg" class="card-img-top rounded-circle" alt="">
                    <div class="card-body text-center">
                        <a href="" class="btn bg-dark-green text-white">Edit Profile</a>
</div>
<div class="card-body">
                        <div class="mt-3">
                            <h4 class="text-uppercase text-secondary"><?= $data['name'];?></h4>
                            <h5 class=" text-muted small"><?= $data['email'];?></h5>
                            <h5 class="text-uppercase text-muted small"><?= $data['contact'];?></h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-9">
                <table class="table table-bordered table-hover">
                    <tr>
                        <th>id</th>
                        <th>title</th>
                        <th>Area</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th>DOP</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                    <?php 
                    $callingPost = mysqli_query($connect,"select * from posts JOIN categories ON posts.cat_id=categories.c_id where user_id='".$data['id']."'");
                    while($row = mysqli_fetch_array($callingPost)){
                    ?>
                    <tr>
                        <td><?= $row['p_id'];?></td>
                        <td><?= $row['title'];?></td>
                        <td><?= $row['area'];?></td>
                        <td><?= $row['price'];?></td>
                        <td><?= $row['c_title'];?></td>
                        <td><?= $row['dop'];?></td>
                        <td><img src='../images/<?= $row['img'];?>' width="50px"/></td>
                        <td>
                            <a href="" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                            <a href="" class="btn btn-info">Off</a>
                    </td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>

    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>