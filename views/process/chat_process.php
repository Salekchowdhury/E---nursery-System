<?php
include_once ("../../vendor/autoload.php");
include_once ("../../vendor/phpmailer/phpmailer/src/PHPMailer.php");

use App\Utility\Utility;
use App\user_registration\registration;
use App\user_registration\authentication;
use App\DataManipulation\DataManipulation;
$datamanipulation =new DataManipulation();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// $authenticate =new authentication();
// $registration =new registration();
if(!isset($_SESSION)){
    session_start();

}
if (isset($_POST['sellerDataCollectViaId']))
{
    $buyers_id = $_POST['buyers_id'];
    $sellers_id = $_POST['sellers_id'];
    $data = $datamanipulation->viewSellerBuyersTotalInfo($buyers_id,$sellers_id);
    echo json_encode($data);
}
if (isset($_POST['buyers_name']) && isset($_POST['buyers_id'])){
    $buyers_name = $_POST['buyers_name'];
    $buyers_id = $_POST['buyers_id'];
    $sellers_id = $_POST['sellers_id'];
    $sellers_name = $_POST['sellers_name'];
    $chat_message = $_POST['chat_message'];
    $image = 0;
    if (count($_FILES) >0){
        $emailToken = rand(100000, 999999);
        $files = $_FILES['image'];
        $fileName = $files['name'];
        $fileTmpName = $files['tmp_name'];
        $destinationFile = '../../contents/img/chat_message/' . $emailToken . $fileName;
        move_uploaded_file($fileTmpName, $destinationFile);
        $_POST['destinationFile']=$destinationFile ;
        $image = $_POST['destinationFile']; 
    }
    $data = $datamanipulation->insertMessageForChat($buyers_id,$sellers_id,$buyers_name,$sellers_name,$chat_message,$image);

}
if (isset($_GET['user_type_for_buyers'])){
    $data = $datamanipulation->showAlertonMessageforbuyers($_GET['user_id']);
    echo json_encode($data);
}
if (isset($_POST['sellerSDataCollectViaId']))
{
    $buyers_id = $_POST['buyers_id'];
    $sellers_id = $_POST['sellers_id'];
    $data = $datamanipulation->viewSellerBuyersTotalInfoS($buyers_id,$sellers_id);
    echo json_encode($data);
}
if (isset($_POST['buyers_ids']) && isset($_POST['sellerActive']) && isset($_POST['sellers_names'])){
    $buyers_name = $_POST['buyers_names'];
    $buyers_id = $_POST['buyers_ids'];
    $sellers_id = $_POST['sellers_ids'];
    $sellers_name = $_POST['sellers_names'];
    $chat_message = $_POST['chat_messages'];
    $image = 0;
    if (count($_FILES) >0){
        $emailToken = rand(100000, 999999);
        $files = $_FILES['image'];
        $fileName = $files['name'];
        $fileTmpName = $files['tmp_name'];
        $destinationFile = '../../contents/img/chat_message/' . $emailToken . $fileName;
        move_uploaded_file($fileTmpName, $destinationFile);
        $_POST['destinationFile']=$destinationFile ;
        $image = $_POST['destinationFile']; 
    }
    
    $data = $datamanipulation->insertMessageForChatSellers($buyers_id,$sellers_id,$buyers_name,$sellers_name,$chat_message,$image);

}

if (isset($_GET['user_type'])){
    $data = $datamanipulation->showAlertonMessage($_GET['sellers_id']);
    echo json_encode($data);
}