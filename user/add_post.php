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
               <form action="" method="post" enctype="multipart/form-data">
                   <div class="mb-3">
                       <label for="">Title</label>
                       <input type="text" name="title" class="form-control">
                   </div>
                  <div class="row">
                  <div class="mb-3 col">
                       <label for="">price</label>
                       <input type="text" name="price" class="form-control">
                   </div>
                   <div class="mb-3 col">
                       <label for="">category</label>
                       <select name="cat_id" class="form-select">
                                <option value="">select Category</option>
                                <?php 

                                $callingCat = mysqli_query($connect,"select * from categories");
                                while($c  = mysqli_fetch_array($callingCat)){

                                    $id = $c['c_id'];
                                    $title = $c['c_title'];
                                    echo "<option value='$id'>$title</option>";
                                }
                                ?>
                        </select>
                   </div>
                  </div>
                  <div class="row">
                  <div class="mb-3 col">
                       <label for="">Image</label>
                       <input type="file" name="img" class="form-control">
                   </div>
                   <div class="mb-3 col">
                       <label for="">Area</label>
                       <input type="text" name="area" class="form-control">
                   </div>
                  </div>
                   <div class="mb-3">
                       <label for="">Date of Purchase</label>
                       <input type="date" name="dop" class="form-control">
                   </div>
                   <div class="mb-3">
                       <label for="">Description</label>
                       <textarea rows="5" name="descr" class="form-control"></textarea>
                   </div>
                   <div class="mb-3">
                       <input type="reset" name="clear" class="btn btn-dark text-white">
                       <input type="submit" name="add" value="add Post" class="btn btn-success btn-lg float-end">
                   </div>
               </form>

               <?php 
                if(isset($_POST['add'])){
                    $title = $_POST['title'];
                    $price = $_POST['price'];
                    $category = $_POST['cat_id'];
                    $area = $_POST['area'];
                    $dop = $_POST['dop'];
                    $descr = $_POST['descr'];

                    $user=  $data['id'];

                    //image work

                    $img = $_FILES['img']['name'];
                    $tmp_img = $_FILES['img']['tmp_name'];
                
                    move_uploaded_file($tmp_img,"../images/$img");

                    $query= mysqli_query($connect,"insert into posts (title, price, area, cat_id, user_id, dop, descr, img) value('$title','$price','$area','$category','$user','$dop','$descr','$img')");

                    if($query){
                        echo "<script>window.open('post_list.php','_self')</script>";
                    }
                }

                ?>
            </div>
        </div>
    </div>

    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>