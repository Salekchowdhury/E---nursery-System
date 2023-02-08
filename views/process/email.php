<?php
if(!isset($_SESSION)){
    session_start();
}
include_once ("../../vendor/autoload.php");
include_once ("../../vendor/phpmailer/phpmailer/src/PHPMailer.php");
use App\DataManipulation\DataManipulation;
use App\user_registration\registration;

$datamanipulation =new DataManipulation();
//$registration =new registration();

use PHPMailer\PHPMailer\PHPMailer;
use App\Utility\Utilit;
$mail = new PHPMailer( true);
$datamanipulation =new DataManipulation();


if(isset($_POST['send_request'])){
    $http_reffer= $_SERVER['HTTP_REFERER'];
    //var_dump($_POST);
    $emailToken = rand(100000, 999999);
    $_POST['emailToken'] = $emailToken;
    $userEmail=$_POST['email'];
   $checkEmailInAdminTable =$datamanipulation->checkEmailInAdminTable($userEmail);
   $checkEmailInUserTable =$datamanipulation->checkEmailInUserTable($userEmail);

    if($checkEmailInAdminTable || $checkEmailInUserTable ){


        try {
            //Server settings
            $mail->SMTPDebug = 0;                                       // Enable verbose debug output
            $mail->isSMTP();                                            // Set mailer to use SMTP
            $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'enurserysystem@gmail.com';                     // SMTP username
            $mail->Password   = 'umsmiyoshepsuikx';                               // SMTP password
            $mail->SMTPSecure = 'ssl';         // Enable TLS encryption, `PHPMailer::ENCRYPTION_SMTPS` also accepted
            $mail->Port       = 465;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('enurserysystem@gmail.com', 'E-Nursery system');
            $mail->addAddress("$userEmail", 'User');     // Add a recipient
            $mail->addAddress('ellen@example.com');               // Name is optional
            $mail->addReplyTo('enurserysystem@gmail.com', 'confirmation code');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            // Attachments
            //  $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Change password';
            $mail->Body    = "$emailToken";
            $mail->AltBody = 'this is the body in plain text for non-HTML main clients';

            if($mail->send()){
                if($checkEmailInAdminTable){
                    $status=$datamanipulation->updateAdminRegisterToken($emailToken, $userEmail);
                    if($status){
                        $_SESSION['email']=$_POST['email'];
                        \App\Utility\Utility::redirect('../../views/login_register_forgot/verification_forgot_password.php');
                        // Utility::redirect('../../views/login_register_forgot/verification_forgot_password.php');
                        //include_once ("../../views/login_register_forgot/verification_forgot_password.php");
                    }
                }elseif ($checkEmailInUserTable){
                    $status=$datamanipulation->updateUserRegisterToken($emailToken, $userEmail);
                    if($status){
                        $_SESSION['email']=$_POST['email'];
                        \App\Utility\Utility::redirect('../../views/login_register_forgot/verification_forgot_password.php');
                        // Utility::redirect('../../views/login_register_forgot/verification_forgot_password.php');
                        //include_once ("../../views/login_register_forgot/verification_forgot_password.php");
                    }
                }

            }

        }
        catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            //echo 'Message has been sent';
        }
    }else{

        $_SESSION["notFoundEmail"] = "<div style='background-color: #218838' class=\"alert alert-danger alert-dismissible fade show\">
                          <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <i class=\"fa fa-times\"></i>
                          </button>
                          <span style='color: white'>
                            <b> Sorry! </b> Email ID is incorrect </span>
                        </div>";
        \App\Utility\Utility::redirect("$http_reffer");

    }







}
if(isset($_POST['message_send_by_seller'])){
    $http_reffer= $_SERVER['HTTP_REFERER'];
    //var_dump($_POST);
    $userEmail=$_POST['email'];
    $subject=$_POST['subject'];
    $user_name=$_POST['name'];
    $message=$_POST['message'];



        try {
            //Server settings
            $mail->SMTPDebug = 0;                                       // Enable verbose debug output
            $mail->isSMTP();                                            // Set mailer to use SMTP
            $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'enurserysystem@gmail.com';                     // SMTP username
            $mail->Password   = 'umsmiyoshepsuikx';                               // SMTP password
            $mail->SMTPSecure = 'ssl';         // Enable TLS encryption, `PHPMailer::ENCRYPTION_SMTPS` also accepted
            $mail->Port       = 465;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('enurserysystem@gmail.com', 'e-nursery system');
            $mail->addAddress($userEmail, 'User');     // Add a recipient
            $mail->addAddress('ellen@example.com');               // Name is optional
            $mail->addReplyTo($userEmail, 'Message');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            // Attachments
            //  $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = "<p>Me  $user_name, I am a nursery woner of the website. my email id is <b>$userEmail</b>  </p>
                            
                               <table>
                              <tr><th>Message</th></tr>
                              <tr><td>$message</td></tr>
                              </table>";
            $mail->AltBody = 'this is the body in plain text for non-HTML main clients';

            if($mail->send()){
                $_SESSION["SendMessage"] = "<div style='background-color: #218838' class=\"alert alert-success alert-dismissible fade show\">
                          <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <i class=\"fa fa-times\"></i>
                          </button>
                          <span style='color: white'>
                            <b> Success - </b> Your message sent to admin. </span>
                        </div>";
                \App\Utility\Utility::redirect("$http_reffer");

            }

        }
        catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            //echo 'Message has been sent';
        }








}

if(isset($_POST['message_send_by_buyer'])){
    $http_reffer= $_SERVER['HTTP_REFERER'];
    //var_dump($_POST);
    $userEmail=$_POST['email'];
    $subject=$_POST['subject'];
    $user_name=$_POST['name'];
    $message=$_POST['message'];



        try {
            //Server settings
            $mail->SMTPDebug = 0;                                       // Enable verbose debug output
            $mail->isSMTP();                                            // Set mailer to use SMTP
            $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'enurserysystem@gmail.com';                     // SMTP username
            $mail->Password   = 'umsmiyoshepsuikx';                               // SMTP password
            $mail->SMTPSecure = 'ssl';         // Enable TLS encryption, `PHPMailer::ENCRYPTION_SMTPS` also accepted
            $mail->Port       = 465;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('enurserysystem@gmail.com', 'E-Nursery');
            $mail->addAddress($userEmail, 'User');     // Add a recipient
            $mail->addAddress('ellen@example.com');               // Name is optional
            $mail->addReplyTo($userEmail, 'Message');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            // Attachments
            //  $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = "<p>Me  $user_name, I am a Buyer of the website. my email id is <b>$userEmail</b>  </p>
                            
                               <table>
                              <tr><th>Message</th></tr>
                              <tr><td>$message</td></tr>
                              </table>";
            $mail->AltBody = 'this is the body in plain text for non-HTML main clients';

            if($mail->send()){
                $_SESSION["SendMessage"] = "<div style='background-color: #218838' class=\"alert alert-success alert-dismissible fade show\">
                          <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <i class=\"fa fa-times\"></i>
                          </button>
                          <span style='color: white'>
                            <b> Success - </b> Your message sent to admin. </span>
                        </div>";
                \App\Utility\Utility::redirect("$http_reffer");

            }

        }
        catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            //echo 'Message has been sent';
        }








}

if(isset($_POST['message_send_by_expert'])){
    $http_reffer= $_SERVER['HTTP_REFERER'];
    //var_dump($_POST);
    $userEmail=$_POST['email'];
    $subject=$_POST['subject'];
    $user_name=$_POST['name'];
    $message=$_POST['message'];



        try {
            //Server settings
            $mail->SMTPDebug = 0;                                       // Enable verbose debug output
            $mail->isSMTP();                                            // Set mailer to use SMTP
            $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'enurserysystem@gmail.com';                     // SMTP username
            $mail->Password   = 'umsmiyoshepsuikx';                               // SMTP password
            $mail->SMTPSecure = 'ssl';         // Enable TLS encryption, `PHPMailer::ENCRYPTION_SMTPS` also accepted
            $mail->Port       = 465;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('enurserysystem@gmail.com', 'E-Nursery');
            $mail->addAddress($userEmail, 'User');     // Add a recipient
            $mail->addAddress('ellen@example.com');               // Name is optional
            $mail->addReplyTo($userEmail, 'Message');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            // Attachments
            //  $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = "<p>Me  $user_name, I am a Expert of the website. my email id is <b>$userEmail</b>  </p>
                            
                               <table>
                              <tr><th>Message</th></tr>
                              <tr><td>$message</td></tr>
                              </table>";
            $mail->AltBody = 'this is the body in plain text for non-HTML main clients';

            if($mail->send()){
                $_SESSION["SendMessage"] = "<div style='background-color: #218838' class=\"alert alert-success alert-dismissible fade show\">
                          <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <i class=\"fa fa-times\"></i>
                          </button>
                          <span style='color: white'>
                            <b> Success - </b> Your message sent to admin. </span>
                        </div>";
                \App\Utility\Utility::redirect("$http_reffer");

            }

        }
        catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            //echo 'Message has been sent';
        }








}

if(isset($_POST['message_send_to_client'])){
    $http_reffer= $_SERVER['HTTP_REFERER'];
    //var_dump($_POST);
    $userEmail=$_POST['email'];
    $subject=$_POST['subject'];
    $user_name=$_POST['name'];
    $message=$_POST['message'];

    $order_id=$_POST['order_id'];
    $client_name=$_POST['client_name'];
    $pnumber=$_POST['pnumber'];
    $item=$_POST['item'];
    $address=$_POST['address'];
    $product=$_POST['product'];
    $units=$_POST['units'];
    $date=$_POST['date'];

    $dateArray = explode("-",$date);

    $dateRevers= array_reverse($dateArray);
    $dateString = implode("-", $dateRevers);



        try {
            //Server settings
            $mail->SMTPDebug = 0;                                       // Enable verbose debug output
            $mail->isSMTP();                                            // Set mailer to use SMTP
            $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'pithapuli.seto@gmail.com';                     // SMTP username
            $mail->Password   = 'pithapuli123';                               // SMTP password
            $mail->SMTPSecure = 'ssl';         // Enable TLS encryption, `PHPMailer::ENCRYPTION_SMTPS` also accepted
            $mail->Port       = 465;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('pithapuli.seto@gmail.com', 'Pitha Puli');
            $mail->addAddress($userEmail, 'User');     // Add a recipient
            $mail->addAddress('ellen@example.com');               // Name is optional
            $mail->addReplyTo($userEmail, 'Message');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            // Attachments
            //  $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = "
                            <h3>Your Order Details</h3>
                               <table border='1'>
                               <tr>
                                <th>Name</th>
                                <th>phone</th>
                                <th>Iteam</th>
                                <th>Product</th>
                                <th>Address</th>
                                <th>Units</th>
                                <th>Date</th>
                              </tr>
                                <tr>
                                <td>$client_name</td>
                                <td>$pnumber</td>
                                <td>$item</td>
                                <td>$product</td>
                                <td>$address</td>
                                <td>$units</td>
                                <td>$dateString</td>
                              </tr>
                        
                                <tr><th  colspan='7'><b>Message</b></th></tr>
                                
                             
                         
                              <tr><td colspan='7'>$message</td></tr>
                              </table>";
            $mail->AltBody = 'this is the body in plain text for non-HTML main clients';

            if($mail->send()){
                $updateMailStatus=$datamanipulation->updateMailStatus($order_id);
                $_SESSION["SendMessage"] = "<div style='background-color: #218838' class=\"alert alert-success alert-dismissible fade show\">
                          <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <i class=\"fa fa-times\"></i>
                          </button>
                          <span style='color: white'>
                            <b> Success - </b> Your message sent to $client_name. </span>
                        </div>";
                \App\Utility\Utility::redirect("$http_reffer");

            }

        }
        catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            //echo 'Message has been sent';
        }








}
if(isset($_POST['message_send_to_seller'])){
    $http_reffer= $_SERVER['HTTP_REFERER'];
    //var_dump($_POST);
    //$userEmail=$_POST['email'];
    $id=$_POST['id'];

    $profileData=$datamanipulation->showSellerAccount($id);
    $userEmail=$profileData->email;
    $userName=$profileData->name;

    $subject=$_POST['subject'];
    $message=$_POST['message'];



        try {
            //Server settings
            $mail->SMTPDebug = 0;                                       // Enable verbose debug output
            $mail->isSMTP();                                            // Set mailer to use SMTP
            $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'enurserysystem@gmail.com';                     // SMTP username
            $mail->Password   = 'umsmiyoshepsuikx';                               // SMTP password
            $mail->SMTPSecure = 'ssl';         // Enable TLS encryption, `PHPMailer::ENCRYPTION_SMTPS` also accepted
            $mail->Port       = 465;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('enurserysystem@gmail.com', 'E-Nursery');
            $mail->addAddress($userEmail, 'User');     // Add a recipient
            $mail->addAddress('ellen@example.com');               // Name is optional
            $mail->addReplyTo($userEmail, 'Message');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            // Attachments
            //  $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = "
                               <table>
                              <tr><th>Message</th></tr>
                              <tr><td>$message</td></tr>
                              </table>";
            $mail->AltBody = 'this is the body in plain text for non-HTML main clients';

            if($mail->send()){
                $_SESSION["SendMessage"] = "<div style='background-color: #218838' class=\"alert alert-success alert-dismissible fade show\">
                          <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <i class=\"fa fa-times\"></i>
                          </button>
                          <span style='color: white'>
                            <b> Success - </b> Your message sent to $userName. </span>
                        </div>";
                \App\Utility\Utility::redirect("$http_reffer");

            }

        }
        catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            //echo 'Message has been sent';
        }








}


