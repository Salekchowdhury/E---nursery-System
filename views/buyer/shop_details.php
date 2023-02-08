
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
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Product</title>
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


                        <img src="<?php echo $profileData->image?>" class="img-circle elevation-2"  alt="User Image">


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
    <form id="ConfirmForm" action="../process/buyer_process.php" method="post" enctype="multipart/form-data">
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><b>Information</b></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        </div>
                        <p class="p-3 border-dark border-top" style="font-size: 15px; color:darkred">Total Price: <span class="totalPrice"></span></p>
                        <div class="px-3">
                            <label>Payment Method Choose</label>
                            <select name="payment_method" class="form-control payment_method">
                                <option value=""></option>
                                <option value="cashOnDelivery">Cash on Delivery</option>
                                <option value="bkash">Bkash</option>
                            </select>
                        </div>
                        <div style="display: none" class="p-3 bkashContent">
                            <?php $sellersData=$datamanipulation->showSellerAccount($_GET['shop_id']);?>
                            <label>Transaction ID:(Send Money through Bikash to the following number, and give the transaction ID.)</label>
                            <h4>Bkash Agent Number <strong class="show-number-bkash"><?php echo $sellersData->phone?></strong></h4>
                            <input type="text" class="form-control" placeholder="Transaction Number" name="transactionId" value="">
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="buyer_id" value="<?php echo $user_id?>">
                            <input type="hidden" name="seller_id" value="<?php echo $_GET['shop_id']?>">
                            <button type="button" class="btn btn-info btn-sm resetbtn" data-dismiss="modal"><i class="fas fa-times-circle"></i> Close</button>
                            <button type="submit" name="btnConfirmSend" class="btnConfirmSend btn btn-primary btn-sm"><i class="fas fa-save"></i> Confirm </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    <div class="content-wrapper">
        <section class="content">
            <?php
            if(isset($_SESSION['uploadImage'])){

                echo $_SESSION['uploadImage'];
                unset($_SESSION['uploadImage']);
            }
            ?>
            <div class="mt-5 row">
                <div class="col-9">
                    <div class="row">
                        <?php
                        $allProducts = $datamanipulation->checkAllproduct($_GET["shop_id"]);
                        if($allProducts){
                            foreach ($allProducts as $allProduct){
                                ?>
                                <div class="card col-4">
                                    <div class="card-body">
                                        <img class="w-100" height="300" src="<?php echo $allProduct->image?>"/>
                                    </div>
                                    <div class="card-footer">
                                        <span style="font-size: 23px;color: darkgoldenrod">Name: <?php echo $allProduct->product_name?></span><br>
                                        <span style="font-size:23px;color: darkgoldenrod">Price: <?php echo $allProduct->price?></span><br>
                                        <span style="font-size: 16px;">Description: <?php echo $allProduct->description?></span>
                                        <form action="../process/buyer_process.php" method="post">
                                            <?php
                                            $true = $datamanipulation->statusCheckItem($user_id,$_GET["shop_id"],$allProduct->item_id);
                                            if(!$true){
                                                ?>
                                                <button class="btn btn-success form-control" name="add_card">add to cart</button><?php }
                                            else{
                                                echo "<button disabled=true class=\"btn btn-success form-control\" name=\"add_card\">add to cart</button>";
                                            }
                                            ?>
                                            <input name="item_id" type="hidden" value="<?php echo $allProduct->item_id?>">
                                            <input name="name" type="hidden" value="<?php echo $allProduct->product_name?>">
                                            <input name="price" type="hidden" value="<?php echo $allProduct->price?>">
                                            <input name="seller_id" type="hidden" value="<?php echo $allProduct->seller_id?>">
                                            <input name="buyer_id" type="hidden" value="<?php echo $user_id?>">
                                            <input name="buyer_id" type="hidden" value="<?php echo $user_id?>">
                                            <input name="phone" type="hidden" value="<?php echo $profileData->phone?>">
                                        </form>
                                    </div>
                                </div>
                            <?php }}?>
                    </div>
                </div>
                <div class="col-3 border-left border-dark">
                    <h3 class="text-center">Cart Details</h3>
                    <?php
                    $cardData=$datamanipulation->showCardData($user_id,$_GET['shop_id']);
                    if($cardData){
                        foreach ($cardData as $list){
                            ?>
                            <div data-cart-id = "<?php echo $list->cart_id ?>" class="card">
                                <div class="card-body">
                                    <p><?php echo "<span class='pname'> Product Name: ", $list->name;"</span>" ?></p>
                                    <p><?php if(!$list->uprice){ echo "<span class='pname uprice'> Product Price: ",  $list->price; "</span>"; } else{echo "<span class='pname uprice'> Product Price: ",  $list->uprice; "</span>"; }?></p>
                                    <p><?php echo "<span class='pname'> Quantity: ", $list->quantity;"</span>" ?> </p>

                                    <form action="../process/buyer_process.php" method="post">
                                    <input class="w-25" name="updateQuantity" type="number" min="1" value="1">
                                    <input class="w-25" name="cart_id" type="hidden" value="<?php echo $list->cart_id?>">
                                    <input class="w-25" name="totalQuantity" type="hidden" value="<?php echo $list->quantity?>">
                                    <input class="w-25" name="totalPrice" type="hidden" value="<?php echo $list->price?>">
                                    <button class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button></form><br>
                                    <a href="../process/buyer_process.php?cancelQuantity=<?php echo $list->cart_id?>" class="btn btn-danger btn-sm form-control mt-1"><i class="fa fa-trash-alt"></i> Item Cancel</a>
                                </div>
                            </div>

                            <?php
                        }
                        echo "<button data-toggle=\"modal\" data-target=\"#exampleModal\" class=\"btn btn-success btn-sm form-control mt-1 allItemConfirm \"><i class=\"fa fa-air-freshener\"></i>Item Confirm</button>";

                    }
                    ?>
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
      $(".payment_method").on("change",function () {
          if($(this).val() == "bkash"){
              $(".bkashContent").css("display","block")
          }
          else{
              $(".bkashContent").css("display","none")
          }
      })
    $(".allItemConfirm").click(function (e) {
        //$(this).modal("show")
          //debugger
        var html = "";
        var sum = 0;
        document.querySelectorAll(".pname").forEach(e=> {
            let p = document.createElement("p");
        //document.querySelector(".modal-body").append(e.innerText, p);
        html += "<p>" + e.innerText + "</p>";

    });
        document.querySelectorAll(".uprice").forEach(el=>{


            let pq = document.createElement("p");
            sum = sum + parseInt(el.innerText.split(":").slice(-1).toString());

    })
        //console.log(html)
        console.log(sum);
        $(".modal-body").html(html)
        $(".totalPrice").text(sum)
        //$(".cart_value").val(e.target.previousElementSibling.getAttribute("data-cart-id"))

        //var html = "<div class='card'><div class='card-body'></div></div>";

    })
  });
</script>

</body>
</html>



