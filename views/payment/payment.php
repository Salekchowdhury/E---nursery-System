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

<div class="">

    <div class="row">
        <div class="col-md-12">
            <div class="card card-user">
                <div class="card-header">
                    <h2 class="">Paymnet</h2>
                </div>
                <?php

                if(isset($_SESSION['donationMsg'])){
                    echo $_SESSION['donationMsg'];
                    unset($_SESSION['donationMsg']);
                }
                ?>

                <div class="card-body">
                    <form action="../process/data_process.php" autocomplete="off" method="post">
                        <div class="row">
                            <div class="col-md-4 pr-1">
                                <div class="form-group">

                                    <label>Nursery Name</label>
                                    <input type="text"  value="" class="form-control" name="nursery_name" placeholder="Nursery Name">
                                    <input type="hidden"  value="<?php echo $user_id?>"  name="user_id">
                                </div>
                            </div>

                            <div class="col-md-4 px-1">
                                <div class="form-group">
                                    <label>Add payment Amount</label>
                                    <input type="number" required name="amount" class="form-control" placeholder="Amount">
                                </div>
                            </div>
                            <div class="col-md-4 pl-1">
                                <div class="form-group">
                                    <label>Phone Number<b>(bkash)</b></label>
                                    <input type="number" required class="form-control" name="phone" placeholder="Phone Number">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="alert alert-default-primary alert-dismissible fade show text-black-50" >Transaction ID (Send Money through Bkash to the following number, and give the transaction ID.)</label>
                                    <h2 class="mb-0">Bkash Agent Number <strong>(+880 1992-865086)</strong></h2>

                                    <label>Transaction ID </label>
                                    <input type="text" class="form-control" required name="transaction_id" placeholder="Transaction Number">
                                </div>
                            </div>

                            <div class="col-md-4 pl-1">
                                <div class="form-group">
                                    <label>Date</label>
                                    <input type="date"  required class="form-control" name="date" placeholder="Date">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="update col-md-6 mr-auto">
                                <button type="submit" name="payment_send" class="btn btn-primary">Send</button>
                                <a href="../login_register_forgot/login.php" name="payment_send" class="btn btn-success">Back</a>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ./wrapper -->

<!-- jQuery -->
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
