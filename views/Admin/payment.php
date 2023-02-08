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
                        <a href="payment.php" class="nav-link active">
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
                        <a href="pending_account.php" class="nav-link ">
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
        <section class="content-header">
            <div>

            </div>

            <div class="col-12">
                <div class="card" style="background-color: rgba(10,55,71,0.86)">
                    <?php
                    $TotalMonthlyPayment=$datamanipulation->TotalMonthlyPayment();
                    $total=$TotalMonthlyPayment->total;
                    ?>
                    <div class="card-body">
                        <h3 style="color: white">Payment(<span style="font-size: 25px; color: #2ecc71"><?php echo $total?></span>)</h3>
                        <?php

                        if(isset($_SESSION['confirmMsg'])){
                            echo $_SESSION['confirmMsg'];
                            unset($_SESSION['confirmMsg']);
                        }
                        ?>

                        <table id="sohag1" class="table table-bordered table-hover">
                            <thead>
                            <tr style="color: cornflowerblue;background-color: bisque;">
                                <th>SL#</th>
                                <th>Nursery Name</th>
                                <th>Phone</th>
                                <th>Amount</th>
                                <th>Transaction Id</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
//                            $lists=$datamanipulation->showAllPendingAccount();
                            $lists=$datamanipulation->showAllPayment();

                            //var_dump($lists);
                            $s=1;
                            if($lists){
                                foreach ($lists as $list){
                                    ?>
                                    <tr>

                                        <td style="color: white"><?php echo $s?></td>
                                        <td style="color: white"><?php echo $list->nursery_name?></td>
                                        <td style="color: white"><?php echo $list->phone?></td>
                                        <td style="color: white"> <?php echo $list->amount?></td>
                                        <td style="color: white"> <?php echo $list->transaction_id?></td>
                                        <td style="color: white"> <?php echo $list->date?></td>


                                        <td>
                                            <?php
                                            if($list->status == 'yes'){
                                                ?>
                                                <a style="color: white" href="../process/admin_process.php?confirmPayment=<?php echo $list->id?>"title="Confirm" class="btn disabled  btn-success btn-outline-danger"><i class="fas fa-check-circle"></i> CONFIRMED</a>
                                                <?php
                                            }else{
                                                ?>
                                                <a style="color: white" href="../process/admin_process.php?confirmPayment=<?php echo $list->id?>"title="Confirm" class="btn  btn-success btn-outline-danger"><i class="fas fa-check-circle"></i> CONFIRM</a>
                                                <?php
                                            }
                                            ?>

                                        </td>
                                    </tr>
                                    <?php
                                    $s++;
                                }
                            }
                            ?>




                            </tbody>

                        </table>
                    </div>
                </div>
            </div>




        </section>



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


