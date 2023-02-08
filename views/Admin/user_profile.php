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
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile Information</h1>
          </div>

        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="">

            <div style="height: 96%" class="card card-primary card-outline ">

            </div>

          </div>
          <!-- /.col -->
          <div class="col-md-12">
            <div style="height: 96%" class="card ">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <div class="card-body box-profile">
                    <div class="text-center">
                        <?php
                        if(isset($_GET['view_building_woner_profile_by_email'])){
                            $data =$datamanipulation->view_building_woner_profile_by_email($_GET['view_building_woner_profile_by_email']);
                            $checkEmail=$datamanipulation->checkValid($_GET['view_building_woner_profile_by_email']);
                        }
                        ?>
                      <img class="profile-user-img img-fluid img-circle"
                           src="<?php echo $data->image?>"
                           alt="User profile picture">
                    </div>

                    <p class="text-muted text-center"><?php echo $data->profession?></p>
                    <h3 class="text-muted text-center">Bio</h3>
                    <p class="text-muted text-center"><?php echo $data->bio?></p>

                  </div>

                </ul>
                  <?php

                  if(isset($_SESSION['updatetMsg'])){
                      echo $_SESSION['updatetMsg'];
                      unset($_SESSION['updatetMsg']);
                  }
                  ?>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">

                  <div class="tab-pane active" id="settings">
                    <form class="form-horizontal">
                      <div class="form-group row">
                        <label  class="col-sm-2 col-form-label">Name:</label><span> <b style="font-size: 28px;"><?php echo $data->name?></b></span>

                      </div>
                      <div class="form-group row">
                        <label  class="col-sm-2 col-form-label">Email:</label><span class=""> <b style="font-size: 28px;"><?php echo $data->email?></b></span>

                      </div>
                      <div class="form-group row">
                        <label  class="col-sm-2 col-form-label">Phone:</label><span class=""> <b style="font-size: 28px;"><?php echo $data->phone?></b></span>

                      </div>
                      <div class="form-group row">
                        <label  class="col-sm-2 col-form-label">User Type:</label><span class=""> <b style="font-size: 28px;"><?php echo $data->type?></b></span>

                      </div>

                      <div class="form-group row">
                        <label  class="col-sm-2 col-form-label">Address:</label><span class=""> <b style="font-size: 28px;"><?php echo $data->road_no?></b></span>

                      </div>

                      <div class="form-group row">
                        <label  class="col-sm-2 col-form-label">Account Status:</label><span class=""> <b style="font-size: 28px;"><?php echo $data->action?></b></span>

                      </div>


                           <div class="row">
                               <div class="col-sm-12 btn-group">
                                       <?php

                                       if($data->action=='no'){
                                        ?>
                                           <a  style="color: white" class="btn btn-success  btn-outline-primary  btn-group" href="../process/admin_process.php?confirm_building_woner_from_all_building_owner=<?php echo $data->user_id?>" >Confirm</a>
                                           <a style="color: white" class="btn btn-danger  btn-outline-primary btn-group" href="../process/admin_process.php?delete_building_owner=<?php echo $data->user_id?>" >Delete</a>

                                           <?php
                                       }else{
                                         ?>
                                           <a style="color: white" class="btn btn-danger  btn-outline-primary" href="../process/admin_process.php?delete_building_owner=<?php echo $data->user_id?>" >Delete</a>

                                           <?php
                                       }
                                       ?>





                               </div>

                           </div>


                    </form>
                  </div>

                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <aside class="control-sidebar control-sidebar-dark">
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../contents/plugins/jquery/jquery.min.js"></script>
<script src="../../contents/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../contents/js/adminlte.min.js"></script>
<script src="../../contents/js/demo.js"></script>
</body>
</html>
