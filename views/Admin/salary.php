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
                        <a href="salary.php" class="nav-link active">
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
                        <a href="profile.php" class="nav-link">
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
                        <a href="create_admin.php" class="nav-link">
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

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Expert Salary</h1>
                    </div>

                </div>
            </div>
        </section>
        <div style="margin:20px ">
            <?php

            if(isset($_SESSION['updatetMsg'])){
                echo $_SESSION['updatetMsg'];
                unset($_SESSION['updatetMsg']);
            }
            if(isset($_SESSION['ExistMsg'])){
                echo $_SESSION['ExistMsg'];
                unset($_SESSION['ExistMsg']);
            }
            ?>
        </div>
        <div class="content">
            <div class="row">
                <div  class="col-md-6" data-wow-duration= "0.5s" data-wow-delay = "0.5s">
                    <div class="card" style="background-color: rgba(10,55,71,0.86)">

                        <div class="card-body">


                            <h3 style="color: white">Salary Table</h3>
                            <table id="sohag1" class="table table-bordered table-hover" >
                                <thead>
                                <tr style="color:white;background-color:#34ce57;">
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>amount</th>
                                    <th>Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $lists=$datamanipulation->showAllExpertPayment();
                                $s=1;
                                if($lists){
                                    foreach ($lists as $list){
                                        ?>
                                        <tr>
                                            <td style="color: white"><?php echo $s?></td>
                                            <td style="color: white"><?php echo $list->nursery_name?></td>
                                            <td style="color: white"><?php echo $list->phone?></td>
                                            <td style="color: white"><?php echo $list->amount?></td>
                                            <td style="color: white"><?php echo $list->date?></td>
                                        </tr>
                                        <?php
                                    }
                                    $s++;
                                }
                                ?>


                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <div  class="col-md-6" data-wow-duration= "0.5s" data-wow-delay = "0.5s">
                    <div class="card" style="background-color: rgba(10,55,71,0.86)">

                        <div class="card-body">


                            <h3 style="color: white">Expert Table</h3>
                            <table id="sohag2" class="table table-bordered table-hover" >
                                <thead>
                                <tr style="color:white;background-color:#34ce57;">
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $lists = $datamanipulation->showAllexpert();
                                $s=1;
                                if($lists){
                                    foreach ($lists as $list){
                                        ?>
                                        <tr>
                                            <td style="color: white"><?php echo $s?></td>
                                            <td style="color: white"><?php echo $list->name?></td>
                                            <td style="color: white"><?php echo $list->phone?></td>
                                            <td><img src="<?php echo $list->image?>" width="70px" height="80px"></td>


                                            <td>


                                                <a href="pay_salary.php?pay_id=<?php echo $list->user_id ?>" title="delete" class="btn btn-info">Pay</a>

                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    $s++;
                                }
                                ?>


                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>


    <aside class="control-sidebar control-sidebar-dark">
</div>
<script src="../../contents/plugins/jquery/jquery.min.js"></script>
<script src="../../contents/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../contents/js/adminlte.min.js"></script>
<script src="../../contents/js/demo.js"></script>
<script src="../../contents/plugins/custom-scrollbar/jquery.mCustomScrollbar.js"></script>
<script src="../../contents/plugins/jquery.fancybox.min.js"></script>
<script src="../../contents/plugins/datatables/jquery.dataTables.js"></script>
<script src="../../contents/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        bsCustomFileInput.init();
    });
</script>
<script src="../../contents/js/dist/wow.min.js"></script>
<script>
    new WOW().init();
</script>
<script>
    $(function () {
        $("#sohag1").DataTable({
            "lengthMenu":[ 3,4 ],
        });
        $("#sohag2").DataTable({
            "lengthMenu":[ 3,4 ],
        });
        $("#sohag3").DataTable({
            "lengthMenu":[ 3,4 ],
        });
        $('#example2').DataTable({
            "paging": true,
            "lengthMenu":[ 3 ],
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
        });

        $('#sohag').DataTable({
            "paging": true,
            "lengthMenu":[ 3 ],
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
        });
    });
</script>
<script>
    $(document).ready(function() {
        $(".scroll-content").mCustomScrollbar({
            axis:"yx",
            theme:"my-theme"
        });

        $(".datepicker").datepicker({
            dateFormat:"yy-mm-dd"
        });
        // $(".fancy").fancybox();
        demo.initChartsPages();

        $(".fancy").click(function () {

        });
    });
</script>
</body>
</html>
