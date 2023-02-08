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
$data=$datamanipulation->showAdminDataById($user_id);
    $phone=$data->phone;

include_once '../../views/Admin/adminHeader.php';
?>
<div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav ">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <strong style="font-size: 24px;padding-left: 10px;padding-right: 730px;"><?php echo $data->email?></strong>
            </li>

        </ul>
    </nav>

    <aside class="main-sidebar sidebar-dark-blue elevation-4" style="background-color: rgba(10,55,71,0.86); position: fixed">
        <a href="#" class="brand-link">
            <span class="brand-text font-weight-light"><b>E-Nursery</b></span>
        </a>

        <div class="sidebar">

            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <?php
                if($data->image){
                    ?>
                    <img  src="<?php echo $data->image?>" class="img-circle elevation-2"  alt="User Image">
                    <?php
                }else{
                    ?>
                    <img  src="../../contents/img/f4.png" class="img-circle elevation-2"  alt="User Image">
                    <?php
                }
                ?>


                <div class="info">
                    <a href="profile.php" class="d-block"><?php echo $data->name?></a>
                </div>
            </div>

            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                    <li class="nav-item has-treeview">
                        <a href="dashboard.php" class="nav-link ">
                            <i class="nav-icon fas fa-tasks"></i>
                            <p>
                                Dashboard

                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="payment.php" class="nav-link ">
                            <i class="nav-icon fas fa-money-bill"></i>
                            <p>
                                payment

                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="salary.php" class="nav-link ">
                            <i class="nav-icon fas fa-money-bill"></i>
                            <p>
                                Salary

                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="manage_item.php" class="nav-link ">
                            <i class="nav-icon fas fa-mail-bulk"></i>
                            <p>
                                Manage Item

                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="control_account.php" class="nav-link ">
                            <i class="nav-icon fas fa-user-cog"></i>

                            <p>
                                Control Account

                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="pending_account.php" class="nav-link">
                            <i class="nav-icon  fas fa-calendar-check"></i>
                            <p>Pending Account</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="shop_details.php" class="nav-link ">
                            <i class="nav-icon fas fa-shopping-bag"></i>

                            <p>
                                Shop Details
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="profile.php" class="nav-link active">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                My Profile
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="notice.php" class="nav-link">
                            <i class="nav-icon fas fa-exclamation-circle"></i>

                            <p>
                                Notice
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="create_admin.php" class="nav-link ">
                            <i class="nav-icon fas fa-user-lock"></i>
                            <p>
                                Create Admin
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../../views/process/admin_process.php?logout=1" class="nav-link">
                            <i class="nav-icon fas fa-lock"></i>
                            <p>Logout</p>
                        </a>
                    </li>


                </ul>
            </nav>
        </div>
    </aside>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Profile Information</h1>
                    </div>
                </div>
            </div>
        </section>
        <div class="content">
            <div class="row">
                <div class="col-md-4" style="margin-left: 5px; border: 2px  royalblue; margin-top: 15px;background-color: rgba(10,55,71,0.86);border-radius: 20px; height:490px">
                    <?php
                    if($data->image){
                        ?>
                        <img style="box-shadow: 0 3px 6px rgba(0,0,0,.16),0 3px 6px rgba(0,0,0,.23); border-radius:50%;  height: 200px; width: 200px;" src="<?php echo $data->image?>" alt="Avatar" class="m-4 avatar mb-2">
                        <?php
                    }else{
                        ?>
                        <img style="box-shadow: 0 3px 6px rgba(0,0,0,.16),0 3px 6px rgba(0,0,0,.23); border-radius:50%;  height: 200px; width: 200px;" src="../../contents/img/f4.png" alt="Avatar" class="m-4 avatar mb-2">
                        <?php
                    }
                    ?>


                    <form action="../process/admin_process.php" method="post" enctype="multipart/form-data" >
                        <input type = 'hidden' name="id"  value="<?php echo $user_id?>">
                        <input required type="file" name="photo" accept="image/x-png,image/gif,image/jpeg">

                        <input type="submit" class="btn btn-success w-100 mb-2"  name="AdminImageUpload" value="Chanage Photo"style="padding-top: 5px;margin-top: 10px;" >


                    </form>
                    <h5 style="color: white; font-style: italic"><?php echo $data->name?></h5>
                    <hr>
                    <?php
                    if($phone){
                        ?>
                        <h5 style="color: white;font-style: italic"><?php echo $phone?></h5>
                        <?php
                    }else{
                        ?>
                        <h5 style="color: red;font-style: italic">No Phone Number</h5>
                        <?php
                    }
                    ?>

                    <hr>
                    <h5 style="color: white;font-style: italic"><?php echo $data->email?></h5>

                </div>
                <div class="col-md-7" style="padding-top: 15px">
                    <div class="card card-user" style="background-color: rgba(10,55,71,0.86) ">
                        <div class="card-header">
                            <h5 class="card-title" style="color: white">Edit Profile</h5>

                            <?php
                            if (isset($_SESSION["updatetMsg"])){
                                echo $_SESSION["updatetMsg"];
                                unset($_SESSION["updatetMsg"]);
                            }
                            if (isset($_SESSION["uploadMsg"])){
                                echo $_SESSION["uploadMsg"];
                                unset($_SESSION["uploadMsg"]);
                            }
                            ?>
                        </div>
                        <div class="card-body">

                            <form action="../process/admin_process.php" method="post">
                                <div class="row">
                                    <div class="col-md-6 pr-1">
                                        <div class="form-group">
                                            <label style="color: white">Full Name</label>
                                            <input type="text" class="form-control" name="name" value="<?php echo $data->name?>" placeholder="Name">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">

                                    <div class="col-md-3 px-1">
                                        <div class="form-group">
                                            <label style="color: white">Password</label>
                                            <input type="password" class="form-control" name="password" placeholder="Password" value="<?php echo $data->password?>">
                                            <input type="hidden"  name="id" value="<?php echo $user_id?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6 pl-1">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" style="color: white">Email address</label>
                                            <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $data->email?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label style="color: white">Address</label>
                                            <input type="text" class="form-control" name="address" value="<?php echo $data->address?>" placeholder="Home Address">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">


                                    <div class="col-md-6 pl-1">
                                        <div class="form-group">
                                            <label style="color: white">Phone Number</label>
                                            <input type="number" class="form-control" name="phone" value="<?php echo $phone?>" placeholder="Phone Number">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="update ml-auto mr-auto">
                                        <button type="submit" name="update_profile" class="btn btn-success btn-round">Update Profile</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- /.content -->
    </div>


  <!-- /.content-wrapper -->

  <aside class="control-sidebar control-sidebar-dark">
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../contents/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../contents/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../contents/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../contents/js/demo.js"></script>
<script src="../../contents/js/dist/wow.min.js"></script>
<script>
    new WOW().init();
</script>
<script type="text/javascript">
    $(document).ready(function () {
        bsCustomFileInput.init();
    });
</script>

</body>
</html>
