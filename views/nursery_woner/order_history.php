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
 $_SESSION['checkBack']=1;
$profileData=$datamanipulation->showSellerAccount($user_id);
include_once('../nursery_woner/sellerHeader.php');
?>
<div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav ">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
            </li>

            <li class="nav-item d-none d-sm-inline-block">
                <strong style="font-size: 24px;padding-left: 10px;">E-Nursery</strong>
            </li>
        </ul>

    </nav>

    <aside style="background-color: rgba(116,12,41,0.6)" class="student-bg main-sidebar sidebar-dark-primary elevation-4">
        <a href="#" class="brand-link">
            <?php
            if(!empty($profileData->shop_name)){
                ?>
                <h5><?php echo $profileData->shop_name?></h5>
                <?php
            }else{
                ?>
                <h5>E-Nursery</h5>
                <?php
            }
            ?>
        </a>

        <div class="sidebar">

            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <?php
                if($profileData->image) {
                    ?>

                    <img src="<?php echo $profileData->image?>" class="img-circle elevation-2"  alt="User Image">
                    <?php
                }else{
                    ?>
                    <img src="../../contents/img/f5.png" class="img-circle elevation-2"  alt="User Image">
                    <?php
                }
                ?>

                <div class="info">
                    <a href="profile.php" class="d-block"><?php echo $profileData->name?></a>
                </div>
            </div>

            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item has-treeview">
                        <a href="add_item.php" class="nav-link ">
                            <i class="nav-icon fas fa-shopping-bag"></i>
                            <p>
                                My Nursery
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

                    <li class="nav-item has-treeview">
                        <a href="message.php" class="nav-link ">
                            <i class="nav-icon fas fa-comments"></i>
                            <p>
                                Message
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="order_history.php" class="nav-link active">
                            <i class="nav-icon fas fa-book-medical"></i>
                            <p>
                                Order History
                            </p>
                        </a>
                    </li>

                    <li class="nav-item has-treeview">
                        <a href="admin_notice.php" class="nav-link">
                            <i class="nav-icon fas fa-exclamation-triangle"></i>
                            <p>
                                Admin Notice
                            </p>
                        </a>
                    </li>

                    <li class="nav-item has-treeview">
                        <a href="message_to_expert.php" class="nav-link ">
                            <i class="nav-icon fas fa-exclamation-triangle"></i>
                            <p>
                                Expert
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="contact_us.php" class="nav-link">
                            <i class="nav-icon far fa-address-card"></i>
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
            <div>

            </div>

            <div class="col-12">
                <div class="card">

                    <div class="card-body">
                        <h3>My Order History</h3>
                        <?php

                        if(isset($_SESSION['updatetMsg'])){
                            echo $_SESSION['updatetMsg'];
                            unset($_SESSION['updatetMsg']);
                        }
                        if(isset($_SESSION['confirmMSG'])){
                            echo $_SESSION['confirmMSG'];
                            unset($_SESSION['confirmMSG']);
                        }
                        ?>

                        <table id="sohag1" class="table table-bordered table-hover">
                            <thead>
                            <tr style="color: white;background-image: linear-gradient(#50700c, rgba(50, 6, 125, 0.59));position:;">
                                <th>Serial</th>
                                <th>Name</th>
                                <th>Quantity</th>
                                <th>Order Date</th>
                                <th>Payment Method</th>
                                <th>Transaction id</th>
                                <th>Price</th>

                                <th style="text-align: center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php
                                $lists=$datamanipulation->showMyOrderHistoryById($user_id);
                                $s=1;
                                foreach ($lists as $list){

                                    ?>
                                    <tr>
                                        <td><?php echo $s?></td>
                                        <td><?php echo $list->name?></td>
                                        <td><?php echo $list->quantity?></td>
                                        <td><?php echo $list->confirm_date?></td>
                                        <td><?php if($list->transaction_id){
                                            echo "Bkash";
                                            }else{
                                            echo "Cash on Delivery";
                                            }?></td>
                                        <td><?php echo $list->transaction_id?></td>
                                        <?php
                                        if($list->uprice){
                                            ?>
                                            <td><?php echo $list->uprice ?></td>
                                            <?php
                                        }else{
                                            ?>
                                            <td><?php echo $list->price ?></td>
                                            <?php
                                        }
                                        ?>


                                        <td>
                                            <?php
                                            if($list->confirm_status=='yes'){
                                                ?>
                                                <a style="color: red"  href="" <i class=" disabled btn btn-success btn-outline-primary far fa-check-circle" aria-hidden="true"></i> CONFIRMED</a>
                                                <a style="color: white"  href="user_profile.php?view_buyer_profile=<?php echo $list->buyer_id?>"title="profile" <i class=" btn btn-success btn-outline-primary far fa-check-circle" aria-hidden="true"></i>PROFILE</a>
                                                <?php
                                            }else{
                                                ?>
                                                <a style="color: white"  href="confirm_history.php?cart_id=<?php echo $list->cart_id?>"title="Confirm Order" <i class=" btn btn-success btn-outline-primary far fa-check-circle" aria-hidden="true"></i> CONFIRM</a>
                                                <?php
                                            }
                                            ?>





                                        </td>
                                    </tr>
                                    <?php
                                    $s++;
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


