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
    <title>Manage Order</title>
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
                    <a href="profile.php" class="d-block"><?php echo $name?></a>
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
                        <a href="profile.php" class="nav-link ">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                Profile
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="manage_order.php" class="nav-link active">
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

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Manage Order</h1>
                    </div>

                    <?php

                    if(isset($_SESSION['updateMsg'])){
                        echo $_SESSION['updateMsg'];
                        unset($_SESSION['updateMsg']);
                    }
                    ?>
                </div>
            </div>
        </section>

        <div class="content wow rotateInDownLeft" data-wow-duration= "1s">
            <div class="row">
                <div class="col-md-12" >
                    <div class="card card-plain">

                        <div class="card-body">
                                <table id="" class="table table-bordered table-striped table-hover">
                                    <thead class="" style="background-color: rgba(12,73,38,0.78);color:white">
                                    <tr>
                                        <th>SL#</th>
                                        <th>Porduct Name</th>
                                        <th>Quantity</th>
                                        <th>Payment Method</th>
                                        <th>Transaction Number</th>
                                        <th>Price</th>
                                        <th>Status</th>
                                        <!--<th>Product Image</th>-->
                                    </tr>
                                    </thead>
                                    <tbody class="tableBody">
                                    <?php
                                    $list = $datamanipulation->viewConfimrListInfo($user_id);
                                    $s=1;
                                    if ($list){
                                        foreach ($list as $lists){

                                            ?>
                                            <tr>
                                                <td><?php echo $s++ ?></td>
                                                <td><?php echo $lists->name ?></td>
                                                <td><?php echo $lists->quantity ?></td>
                                                <td><?php if($lists->transaction_id){
                                                        echo "Bkash";
                                                    }else{
                                                        echo "Cash on Delivery";
                                                    }?></td>
                                                <td><?php echo $lists->transaction_id?></td>
                                                <?php
                                                if($lists->uprice){
                                                   ?>
                                                    <td><?php echo $lists->uprice ?></td>
                                                    <?php
                                                }else{
                                                    ?>
                                                    <td><?php echo $lists->price ?></td>
                                                    <?php
                                                }
                                                ?>


                                                <?php
                                                if($lists->confirm_status=='yes'){
                                                    ?>
                                                    <td>
                                                        <span class="btn-sm btn-success" style="font-size: 10px">Accepted </span>
                                                        <!--<a href="../process/data_process.php?seller_user_id=<?php /*echo  $lists->no */?>"   ><i class="disabled fas fa-trash"></i> Delete</a>-->
                                                    </td>
                                                    <?php
                                                }else{
                                                    ?>
                                                    <td>
                                                        <span class="btn-sm btn-danger" style="font-size: 10px; margin-right: 3px">Pending</span><a href="../process/data_process.php?seller_user_id=<?php echo  $lists->cart_id ?>"  <i class="  btn btn-success btn-outline-primary fas fa-trash-alt" aria-hidden="true" style="color: white"></i> Delete</a>
                                                        <!--<a href="../process/data_process.php?seller_user_id=<?php /*echo  $lists->no */?>"   ><i class="disabled fas fa-trash"></i> Delete</a>-->
                                                    </td>
                                                    <?php
                                                }
                                                ?>

                                            </tr>
                                            <?php
                                        }
                                    }
                                    ?>
                                    <tbody>
                                </table>
                            </div>
                    </div>
                </div>
            </div>
        </div>

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
</script>
</body>
</html>



