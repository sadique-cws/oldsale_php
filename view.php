<?php include "dbconnect.php";
$id = $_GET['id'];
$callingPost = mysqli_query($connect,"select * from posts JOIN categories ON posts.cat_id = categories.c_id JOIN users ON posts.user_id = users.id where p_id='$id'");

$data = mysqli_fetch_array($callingPost);

?>
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
<body>
    <?php include "header.php";?>

    <div class="container mt-3">
        <div class="row">
        <div class="col-lg-3">
                <div class="list-group list-group-flush">
                    <a href="" class="list-group-item-action list-group-item active bg-dark-green">Categories</a>
                    <a href="" class="list-group-item-action list-group-item">Furniture <i class="bi bi-chevron-right float-end"></i> </a>
                    <a href="" class="list-group-item-action list-group-item">Mobile <i class="bi bi-chevron-right float-end"></i> </a>
                    <a href="" class="list-group-item-action list-group-item">Laptop <i class="bi bi-chevron-right float-end"></i> </a>
                </div>
            </div>

            <div class="col-lg-9">
                <div class="row">
                    <div class="col-4">
                        <img src="images/<?= $data['img'];?>" alt="" class="card-img-top">
                    </div>
                    <div class="col-8">
                            <table class="table">
                                <tr>
                                    <td>Title</td>
                                    <td><?= $data['title'];?></td>
                                </tr>
                                <tr>
                                    <td>Price</td>
                                    <td><?= $data['price'];?></td>
                                </tr>
                                <tr>
                                    <td>Area</td>
                                    <td><?= $data['area'];?></td>
                                </tr>
                                <tr>
                                    <td>Date of Purchase</td>
                                    <td><?= $data['dop'];?></td>
                                </tr>
                                <tr>
                                    <td>category</td>
                                    <td><?= $data['c_title'];?></td>
                                </tr>
                                <tr>
                                    <td>User</td>
                                    <td><?= $data['name'];?></td>
                                </tr>
                                <tr>
                                    <td>Contact</td>
                                    <td><?= $data['contact'];?></td>
                                </tr>
</table>
                          
                    </div>
                </div>

                
                <div class="card border">
                    <div class="card-header bg-dark-green text-white">Description</div>
                    <div class="card-body">
                        <p class="lead"><?= $data['descr'];?></p>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-12">
                        <h4 class="h5 text-muted text-uppercase">Related Post</h4>
                        <hr>
                    </div>
                    <?php 
                   $callingPost = mysqli_query($connect, "select * from posts where p_id != '$id'");
                   while($row = mysqli_fetch_array($callingPost)){
                ?>
                 <div class="col-3">
                        <div class="card">
                            <img src="images/<?= $row['img'];?>" alt="" class="card-img-top">
                            <div class="card-body">
                                <h3 class="h6"><?= $row['title'];?></h3>
                                <p class="small">Rs.<?= $row['price'];?></p>

                                <a href="view.php?id=<?= $row['p_id'];?>" class="btn bg-light-green">Read More</a>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
            </div>

           
           
        </div>
    </div>

    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>