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
                        <a href="dashboard.php" class="nav-link active">
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
        <br>
        <div class="content">
            <div class="row">
                <div  class="col-lg-4 col-md-6 col-sm-6 wow bounceInRight" data-wow-duration="2s">
                    <div class="card card-stats" style="background-color: #5b7586">
                        <div class="card-body " >
                            <div class="row" style="margin-bottom: 5px">
                                <div class="col-5 col-md-4">
                                    <div class="icon-big text-center icon-warning">
                                        <i class="fas fa-male  fa-5x"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-md-8">
                                    <?php
                                    //$Member = $dataManipulation->viewMemberDetails();
                                    //$count_member = 0;
                                    ?>
                                    <div class="numbers">
                                        <p class="card-category">Profile</p>
                                        <p class="card-title">

                                        <p>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="card-footer ">
                            <hr>
                            <div class="stats">
                                <a href="profile.php"><i class="fa fa-eye"></i> My Profile</a>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-6 wow bounceInRight" data-wow-duration="2s">
                    <div class="card card-stats">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-5 col-md-4">
                                    <div class="icon-big text-center icon-warning">
                                        <i class="fas fa-money-bill fa-5x"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-md-8">

                                    <div class="numbers">
                                        <p class="card-category">Payment</p>


                                        <p>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="card-footer ">
                            <hr>
                            <div class="stats">
                                <a href="payment.php"><i class="fa fa-eye"></i> Payment</a>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-6 wow bounceInRight" data-wow-duration="2s">
                    <div class="card card-stats">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-5 col-md-4">
                                    <div class="icon-big text-center icon-warning">
                                        <i class="far fa-user fa-5x"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-md-8">

                                    <div class="numbers">
                                        <p class="card-category">Control Account</p>


                                        <p>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="card-footer ">
                            <hr>
                            <div class="stats">
                                <a href="control_account.php"><i class="fa fa-eye"></i> Control Account</a>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-6 wow bounceInRight" data-wow-duration="2s" >
                    <div class="card card-stats" style="background-color: #7c665e">
                        <div class="card-body ">
                            <div class="row" style="padding-top: 16px">
                                <div class="col-5 col-md-4">
                                    <div class="icon-big text-center icon-warning">
                                        <i class="fas fa-mail-bulk fa-4x"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-md-8" >


                                    <div class="numbers">
                                        <p class="card-category">Manage Item</p>
                                        <span style="font-size: 20px;color: #11a726"></span>


                                        <p>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="card-footer ">
                            <hr>
                            <div class="stats">
                                <a href="manage_item.php"><i class="fa fa-eye"></i> Manage Item</a>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 wow bounceInRight" data-wow-duration="2s">
                    <div class="card card-stats" style="background-color: #848684">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-5 col-md-4">
                                    <div class="icon-big text-center icon-warning">
                                        <i class="fab fa-creative-commons-by fa-4x"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-md-8">

                                    <div class="numbers">
                                        <p class="card-category">Pending Account</p>


                                        <p>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="card-footer ">
                            <hr>
                            <div class="stats">
                                <a href="pending_account.php"><i class="fa fa-eye"></i> Pending Account</a>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 wow bounceInRight" data-wow-duration="2s">
                    <div class="card card-stats" style="background-color: #3b645a">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-5 col-md-4">
                                    <div class="icon-big text-center icon-warning">
                                        <i class="fas fa-shopping-bag fa-4x"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-md-8">

                                    <div class="numbers">
                                        <p class="card-category">Shop Deatils</p>


                                        <p>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="card-footer ">
                            <hr>
                            <div class="stats">
                                <a href="shop_details.php"><i class="fa fa-eye"></i> Shop Deatils</a>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 wow bounceInRight" data-wow-duration="2s">
                    <div class="card card-stats" style="background-color: rgba(128,146,141,0.42)">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-5 col-md-4">
                                    <div class="icon-big text-center icon-warning">
                                        <i class="fas fa-exclamation-triangle fa-4x"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-md-8">

                                    <div class="numbers">
                                        <p class="card-category">Notice</p>


                                        <p>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="card-footer ">
                            <hr>
                            <div class="stats">
                                <a href="notice.php"><i class="fa fa-eye"></i> Notice</a>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 wow bounceInRight" data-wow-duration="2s">
                    <div class="card card-stats" style="background-color: rgba(187,115,74,0.26)">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-5 col-md-4">
                                    <div class="icon-big text-center icon-warning">
                                        <i class="fas fa-user-cog fa-4x"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-md-8">

                                    <div class="numbers">
                                        <p class="card-category">Create Admin</p>


                                        <p>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="card-footer ">
                            <hr>
                            <div class="stats">
                                <a href="create_admin.php"><i class="fa fa-eye"></i> Create Admin</a>

                            </div>
                        </div>
                    </div>
                </div>

                </div>

            </div>
        </div>



        <footer>

        </footer>
    </div>






    <aside class="control-sidebar control-sidebar-dark">

    </aside>
</div>

<script src="../../contents/plugins/jquery/jquery.min.js"></script>
<script src="../../contents/plugins/jquery-ui/jquery-ui.min.js"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>

<script src="../../contents/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../contents/plugins/chart.js/Chart.min.js"></script>
<script src="../../contents/plugins/sparklines/sparkline.js"></script>
<script src="../../contents/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../../contents/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<script src="../../contents/plugins/jquery-knob/jquery.knob.min.js"></script>
<script src="../../contents/plugins/moment/moment.min.js"></script>
<script src="../../contents/plugins/daterangepicker/daterangepicker.js"></script>
<script src="../../contents/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="../../contents/plugins/summernote/summernote-bs4.min.js"></script>
<script src="../../contents/plugins/datatables/jquery.dataTables.js"></script>
<script src="../../contents/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="../../contents/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="../../contents/js/adminlte.js"></script>
<script src="../../contents/js/pages/dashboard.js"></script>
<script src="../../contents/js/demo.js"></script>

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
</body>
</html>


