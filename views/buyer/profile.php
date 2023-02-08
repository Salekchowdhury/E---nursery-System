
<?php
if(!isset($_SESSION)){
    session_start();
}
include_once ("../../vendor/autoload.php");
use App\DataManipulation\DataManipulation;
$datamanipulation = new DataManipulation();
use App\Utility\Utility;

$user_id = $_SESSION['user_id'];
$email = $_SESSION['email'];
$name = $_SESSION['name'];
$profileData=$datamanipulation->showBuyerDataById($user_id);
$phone=$profileData->phone;
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../contents/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="../../contents/css/adminlte.min.css">
    <link rel="stylesheet" href="../../contents/css/custom-bg-student.css">
    <link rel="stylesheet" href="../../contents/css/new.css">
    <!--<link rel="stylesheet" href="../../contents/css/new.css">-->

    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav ">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
            </li>

            <li class="nav-item d-none d-sm-inline-block">
                <strong style="font-size: 24px;padding-left: 10px;padding-right: 730px;">E-Nursery</strong>
            </li>
        </ul>
    </nav>

    <aside style="background-color: rgba(12,73,38,0.78)" class=" main-sidebar sidebar-dark-primary elevation-4">

        <div class="sidebar" style="position: fixed">

            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">

                    <?php
                    if($profileData->image){
                        ?>
                        <img  src="<?php echo $profileData->image?>" class="img-circle elevation-2"  alt="User Image">
                        <?php
                    }else{
                        ?>
                        <img  src="../../contents/img/f5.png" class="img-circle elevation-2"  alt="User Image">
                        <?php
                    }
                    ?>

                </div>
                <div class="info">
                    <a href="profile.php" class="d-block"><?php echo $profileData->name?></a>
                </div>
            </div>

            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                    <li class="nav-item has-treeview">
                        <a href="shop.php" class="nav-link">
                            <i class="nav-icon fas fa-home"></i>
                            <p>
                                Shop
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="profile.php" class="nav-link active">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                Profile
                            </p>
                        </a>
                    </li>
                        <li class="nav-item">
                            <a href="manage_order.php" class="nav-link">
                                <i class="nav-icon fas fa-cogs"></i>
                                <p>Manage Order</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="admin_notice.php" class="nav-link ">
                                <i class="nav-icon fas fa-exclamation-circle"></i>
                                <p>Admin Notice</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="message.php" class="nav-link">
                                <i class="nav-icon fas fa-book"></i>
                                <p>Message</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="contact_us.php" class="nav-link">
                                <i class="nav-icon fas fa-phone"></i>
                                <p>Contact Us</p>
                            </a>
                        </li>

                    <li class="nav-item">
                        <a href="../process/seller_process.php?logout=1" class="nav-link">
                            <i class="nav-icon fas fa-lock"></i>
                            <p>Logout</p>
                        </a>
                    </li>

                </ul>
            </nav>
        </div>
    </aside>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Profile</h1>
                    </div>
                    <?php
                    if (isset($_SESSION["UdateMsg"])){
                        echo $_SESSION["UdateMsg"];
                        unset($_SESSION["UdateMsg"]);
                    }
                    if (isset($_SESSION["UpdatePass"])){
                        echo $_SESSION["UpdatePass"];
                        unset($_SESSION["UpdatePass"]);
                    }
                    if (isset($_SESSION["uploadImage"])){
                        echo $_SESSION["uploadImage"];
                        unset($_SESSION["uploadImage"]);
                    }
                    ?>

                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="bg-dark">
                <div class="row">
                    <div class="col-md-4">
                        <?php
                        if($profileData->image){
                            ?>
                            <img style="box-shadow: 0 3px 6px rgba(0,0,0,.16),0 3px 6px rgba(0,0,0,.23); border-radius:50%;  height: 200px; width: 200px;" src="<?php echo $profileData->image?>" alt="Avatar" class="m-4 avatar mb-2">
                            <?php
                        }else{
                            ?>
                            <img style="box-shadow: 0 3px 6px rgba(0,0,0,.16),0 3px 6px rgba(0,0,0,.23); border-radius:50%;  height: 200px; width: 200px;" src="../../contents/img/f5.png" alt="Avatar" class="m-4 avatar mb-2">
                            <?php
                        }
                        ?>

                        <form action="../process/buyer_process.php" method="post" enctype="multipart/form-data" >
                            <input type = 'hidden' name="id"  value="<?php echo $user_id?>">
                            <input class="mr-4" type="file" name="photo" accept="image/x-png,image/gif,image/jpeg">
                            <br>
                            <br>

                    </div>
                    <div class="col-md-8">
                            <div class="row">

                                <div class="col-11 ml-3" >

                                    <div class="form-group row mt-3">
                                        <label  class="col-sm-2 col-form-label">Name:</label><span> <b style="font-size: 28px;"></b></span>
                                        <div class="col-sm-10">
                                            <input type="name"  required class="form-control" name="name" value="<?php echo $profileData->name?>">
                                            <input type="hidden" name="user_id" value="<?php echo $user_id?>">
                                            <input type="hidden" name="shop_name" value="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label  class="col-sm-2 col-form-label">Email:</label><span class=""> <b style="font-size: 28px;"></b></span>
                                        <div class="col-sm-10">
                                            <input type="email"required class="form-control" name="email" value="<?php echo $profileData->email?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label  class="col-sm-2 col-form-label">Phone:</label><span class=""> <b style="font-size: 28px;"></b></span>
                                        <div class="col-sm-10">
                                            <input type="Phone" required class="form-control" name="phone" value="<?php echo $profileData->phone?>" >
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label  class="col-sm-2 col-form-label">Address:</label><span class=""> <b style="font-size: 28px;"></b></span>
                                        <div class="col-sm-10">
                                            <input type="text" required class="form-control" name="address" value="<?php echo $profileData->address?>" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label  class="col-sm-2 col-form-label">Password:</label><span class=""> <b style="font-size: 28px;"></b></span>
                                        <div class="col-sm-10">
                                            <input type="password" required class="form-control" name="password" value="<?php echo $profileData->password?>" >
                                        </div>
                                    </div>

                                </div>
                            </div>


                            <input type="submit" class="btn btn-success w-50  mb-2"  name="buyerProfileChange" value="Update" style="margin-top: 15px;font-size: 21px; background: rgba(12,73,38,0.78); text-align: center;border: 1px solid;border-radius: 25px;" >

                            <!-- <div class="form-group row">
                               <div class="btn  btn-group offset-sm-2 col-sm-10">
                                 <button type="submit" class="btn btn-outline-secondary">Confirm</button>
                               </div>
                             </div>-->
                        </form>
                    </div>

                </div>
            </div>


        </section>
        <!-- /.content -->
    </div>


    <aside class="control-sidebar control-sidebar-dark">

    </aside>

</div>

<script src="../../contents/plugins/jquery/jquery.min.js"></script>

<script src="../../contents/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="../../contents/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

<script src="../../contents/js/adminlte.min.js"></script>

<script src="../../contents/js/demo.js"></script>
<script type="text/javascript">
  $(document).ready(function () {
    bsCustomFileInput.init();
  });
</script>
</body>
</html>



