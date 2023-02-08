
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
                        <a href="profile.php" class="nav-link active">
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
                            <a href="order_history.php" class="nav-link">
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

                            <?php
                            $rateList = $datamanipulation->totalRating($user_id);
                            //var_dump($rateList);
                            $totalRatingAvg = $rateList[0]->averageRating;
                            $totalClient = $rateList[0]->totalClient;
                            $int = (int)$totalRatingAvg;
                            $totalClient = (int)$totalClient;

                            if($rateList){
                                for ($i=1;$i<6;$i++){
                                    if($int>=$i){

                                        echo "<i style='color: #AF0000' class=\"far fa-star \"></i>";
                                    }else{

                                    }
                                }
                                echo "<b>($totalClient)</b>";
                            }
                            ?>
                            <input class="mr-4" type="file" name="photo" accept="image/x-png,image/gif,image/jpeg">
                    </div>
                    <div class="col-md-8">
                        <div class="row">

                            <div class="col-11 ml-3" >

                                <div class="form-group row mt-3">
                                    <label  class="col-sm-2 col-form-label">Name:</label><span> <b style="font-size: 28px;"></b></span>
                                    <div class="col-sm-10">
                                        <input type="name"  required class="form-control" name="name" value="<?php echo $profileData->name?>">
                                        <input type="hidden" name="user_id" value="<?php echo $user_id?>">

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
                                    <label  class="col-sm-2 col-form-label">Shop Name:</label><span class=""> <b style="font-size: 28px;"></b></span>
                                    <div class="col-sm-10">
                                        <input type="text" required class="form-control" name="shop_name" value="<?php echo $profileData->shop_name?>" >
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


                        <input type="submit" class="btn btn-success w-50  mb-2"  name="buyerProfileChange" value="Update" style="margin-top: 15px;font-size: 21px; background-image: linear-gradient(#50700c, rgba(50, 6, 125, 0.59)); text-align: center;border: 1px solid;border-radius: 25px;" >

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



