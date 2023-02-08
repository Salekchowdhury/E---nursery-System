<?php
if(!isset($_SESSION)){
    session_start();
}
include_once ("../../vendor/autoload.php");
use App\DataManipulation\DataManipulation;
$datamanipulation = new DataManipulation();
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>E- Nursery System</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/responsive.css">
        <link rel="stylesheet" href="fontawesome/css/fontawesome.css">

    </head>

    <body>
        <!-- <navabr start> -->
        <nav class="navbar navbar-expand-lg custome-bg fixed-top">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <img  class="p-2" src="img/plant-icon.jpg" width="75" height="75" style="border-radius: 50%">
                    <button class="navbar-toggler" type="button"
                            data-bs-toggle="collapse" data-bs-target="#navbarNav"
                            aria-controls="navbarNav" aria-expanded="false"
                            aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <ul class="navbar-nav text-center">

                        <li class="nav-item">
                            <a class="nav-link text-white active"
                               aria-current="page" href="#home">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-white" href="#service">Service</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#contact">Contacts</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="../login_register_forgot/register.php">Sign Up</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="../login_register_forgot/login.php">Sign In</a>
                        </li>

                    </ul>
                    <div class="ml-auto">
                        <p class="text-white">E-Nursery System</p>
                    </div>
                </div>
            </div>
        </nav>
        <!-- <navabr end> -->

        <!-- <landing section start> -->

        <section id="home">
            <div class="container">
                <div class="row">
                    <div class="home-center text-center">
                        <h1>Choice Your Plant</h1>
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section id="service" class="bg-secondary text-white py-2">
                <div class="container text-center">
                    <div class="text-center mt-5">
                        <h5 class="text-uppercase">Our Services</h5>
                        <h2 class="text-uppercase font-weight-bold">services</h2>
                    </div>
                    <div class="row ">
<!--                        <div class="col-md-5">-->
<!--                                <div class="mt-5">-->
<!--                                    <img  class="p-2 mt-5" src="img/baby_care.jpeg" style="width: 400px" height="410px" >-->
<!--                                </div>-->
<!--                        </div>-->
                        <div class=" col-md-12  shadow-box" >
                            <div class="row mt-2" >
                                <div class="col-md-4 p-2" >
                                    <div class="height-vh-27 custome-bg text-white text-center
                            rounded p-3" style="border-radius: 50%">
                                        <div class="my-2">
                                            <img  class="p-2" src="img/service/acount.png" width="75" height="75" style="border-radius: 50% ; border: 1px solid black">
                                        </div>
                                        <h5 class="text-uppercase">Create Account</h5>
                                    </div>
                                </div>
                                <div class="col-md-4 p-2">
                                    <div class="height-vh-27 custome-bg text-white text-center
                            rounded p-3">
                                        <div class="my-2">
                                            <img class="p-2" src="img/service/message.png" width="75" height="75" style="border-radius: 50%; border: 1px solid black">
                                        </div>
                                        <h5 class="text-uppercase">Message</h5>
                                    </div>
                                </div>
                                <div class="col-md-4 p-2">
                                    <div class="height-vh-27 custome-bg text-white text-center
                            rounded p-3">
                                        <div class="my-2">
                                            <img  class="p-2" src="img/help.png" width="75" height="75" style="border-radius: 50%; border: 1px solid black">
                                        </div>
                                        <h5 class="text-uppercase">Expert help</h5>

                                    </div>
                                </div>
                                <div class="col-md-4 p-2">
                                    <div class="height-vh-27 custome-bg text-white text-center
                            rounded p-3">
                                        <div class="my-2">
                                            <img  class="p-2" src="img/plant2.png" width="75" height="75" style="border-radius: 50% ; border: 1px solid white">
                                        </div>
                                        <h5 class="text-uppercase">Buy Plant</h5>
                                    </div>
                                </div>
                                <div class="col-md-4 p-2">
                                    <div class="height-vh-27 custome-bg text-white text-center
                            rounded p-3">
                                        <div class="my-2">
                                            <img class="p-2" src="img/service/rating.png" width="75" height="75" style="border-radius: 50%; border: 1px solid white">
                                        </div>
                                        <h5 class="text-uppercase">Rating</h5>
                                    </div>
                                </div>
                                <div class="col-md-4 p-2">
                                    <div class="height-vh-27 custome-bg text-white text-center
                            rounded p-3">
                                        <div class="my-2">
                                            <img  class="p-2" src="img/service/contact.png" width="75" height="75" style="border-radius: 50%; border: 1px solid white">
                                        </div>
                                        <h5 class="text-uppercase">Subscrition</h5>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

        </section>


        <!-- <Services section end> -->

        <!-- < contact section Start> -->

        <section id="contact" class="bg-secondary">
            <div class="container">
                <div class="row custome-bg mt-4">
                    <div class="col-md-12 mt-4 ">
                        <div class="text-center text-white mb-2">
                            <h5 class="text-uppercase">Our Office</h5>
                            <!--                            <h2 class="text-uppercase font-weight-bold">Get in Touch</h2>-->
                        </div>
                            <iframe width="1100" height="300" id="gmap_canvas" src="https://maps.google.com/maps?q=Chawk%20Bazar,
                    %20Chattogram&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>

                    </div>
                </div>
            </div>
        </section>

        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>

</html>