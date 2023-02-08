
<?php
if(!isset($_SESSION)){
    session_start();
}
include_once("../../vendor/autoload.php");
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
    <title>Shop</title>
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
                        <a href="shop.php" class="nav-link active">
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
                        <h1 style="color: #3c763d">Rating...</h1>
                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">


                <div class="row">
                    <?php
                    if(isset($_GET['rating_user_id'])){
                        $userDetails=$datamanipulation->sellerById($_GET['rating_user_id']);
                        //var_dump($userDetails);

                    }
                    ?>
                    <div class="col-md-5" style="box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);
-webkit-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);
-moz-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);">

                            <!-- Profile Image -->
                            <div style="height: 96%; background-color: #0b1921" class="card card-primary card-outline ">
                                <div class="card-body box-profile">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="text-center">
                                                <img class="profile-user-img img-fluid img-circle" src="<?php echo $userDetails->image ?>" alt="User profile picture" style=" height: 100px; width: 100px  ;border: 1px solid rgba(15,80,36,0.41) ">
                                                <h3 class="profile-username text-center" style="color: white"><?php echo  $userDetails->name?></h3>
                                                <br>

                                            </div>
                                        </div>
                                        <div class="col-md-8">



                                            <ul class="list-group list-group-unbordered mb-3" style="list-style: none; color: white">
                                                <li class="">
                                                    <b>Shop Name:</b> <a class="float-right" style="font-style: italic;font-size: 20px"><?php echo  $userDetails->shop_name?></a>
                                                </li>
                                                <li class="">
                                                    <b>Email:</b> <a class="float-right" style="font-style: italic;font-size: 20px"><?php echo  $userDetails->email?></a>
                                                </li>
                                                <li class="">
                                                    <b>Phone:</b> <a class="float-right" style="font-style: italic;font-size: 20px"><?php echo  $userDetails->phone?></a>
                                                </li>


                                                <br>

                                                <!-- <li class="list-group-item">
                                            <b>Total Post:</b> <a class="float-right"><?php /*echo $value*/?></a>
                                        </li>-->
                                                <div class="flex flex-column text-center fa-2x">
                                                    <?php
                                                    $rateList = $datamanipulation->totalRating($_GET['rating_user_id']);
                                                    //var_dump($rateList);
                                                    $totalRatingAvg = $rateList[0]->averageRating;
                                                    $int = (int)$totalRatingAvg;

                                                    if($rateList){
                                                        for ($i=1;$i<6;$i++){
                                                            if($int>=$i){
                                                                echo "<i style='color: #1D00AF' class=\"far fa-star \"></i>";
                                                            }else{
                                                                echo "<i class=\"far fa-star\"></i>";
                                                            }
                                                        }
                                                    }

                                                    ?>

                                                    <!--                                            <i class="far fa-star"></i>-->
                                                    <!--                                            <i class="far fa-star"></i>-->
                                                    <!--                                            <i class="far fa-star"></i>-->
                                                    <!--                                            <i class="far fa-star"></i>-->
                                                    <!--                                            <i class="far fa-star"></i>-->
                                                </div>
                                                <?php
                                                $check = $datamanipulation->checkRating($_GET['rating_user_id'],$user_id);
                                                if(!$check){
                                                    echo "<button class=\"btn btn-success d-block mx-auto\" data-toggle=\"modal\" data-target=\"#exampleModal\">Rating</button>";
                                                }
                                                ?>


                                                <form id="rateForm" action="../process/buyer_process.php" method="post">
                                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Buyer Profile</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="flex flex-column text-center fa-2x text-dark">
                                                                        <i class="far fa-star one"></i>
                                                                        <i class="far fa-star two"></i>
                                                                        <i class="far fa-star three"></i>
                                                                        <i class="far fa-star four"></i>
                                                                        <i class="far fa-star five"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <input type="hidden" class="coutnRating" name="coutnRating" value="">
                                                                    <input type="hidden" name="user_id" value="<?php echo $_GET['rating_user_id']?>">
                                                                    <input type="hidden" name="client_id" value="<?php echo $user_id?>">
                                                                    <button type="button"  class="btn btn-secondary Close-rate" data-dismiss="modal">Close</button>
                                                                    <button type="submit" name="submitRating" class="submitRating btn btn-primary">Submit</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </form>

                                            </ul>
                                        </div>
                                    </div>




                                </div>
                            </div>

                    </div>



                    <!-- /.col -->

                </div>

                <!-- /.row -->
            </div><!-- /.container-fluid -->
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

    var count = 0;

    $(".one").click(function () {
        $(this).css("color","yellow")
        $(".two").css("color","")
        $(".three").css("color","")
        $(".four").css("color","")
        $(".five").css("color","")
        count=1;
        $(".coutnRating").val(count)
    })
      $(".two").click(function () {
          $(this).css("color","yellow")
          $(".one").css("color","yellow")
          $(".three").css("color","")
          $(".four").css("color","")
          $(".five").css("color","")
          count=2;
          $(".coutnRating").val(count)
      })
      $(".three").click(function () {
          $(this).css("color","yellow")
          $(".two").css("color","yellow")
          $(".one").css("color","yellow")
          $(".four").css("color","")
          $(".five").css("color","")
          count=3;
          $(".coutnRating").val(count)
      })
      $(".four").click(function () {
          $(this).css("color","yellow")
          $(".two").css("color","yellow")
          $(".three").css("color","yellow")
          $(".one").css("color","yellow")
          $(".five").css("color","")
          count=4;
          $(".coutnRating").val(count)
      })
      $(".five").click(function () {
          $(this).css("color","yellow")
          $(".two").css("color","yellow")
          $(".three").css("color","yellow")
          $(".four").css("color","yellow")
          $(".one").css("color","yellow")
          count=5;
          $(".coutnRating").val(count)
      })

      $(".Close-rate").click(function () {
          $(".one").css("color","")
          $(".two").css("color","")
          $(".three").css("color","")
          $(".four").css("color","")
          $(".five").css("color","")
          count=0;
          $(".coutnRating").val(count)
      })

      $(".submitRating").click(function (e) {
          e.preventDefault()
          if(count>0){
              $("#rateForm").submit()
          }
      })




  });
</script>
</body>
</html>



