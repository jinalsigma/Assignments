<?php
/**
 * Created by PhpStorm.
 * User: jinalshah
 * Date: 6/11/20
 * Time: 1:16 PM
 */
session_start();
include('dbconnection.php');
$uid=$_SESSION['uid'];
$ret=mysqli_query($con,"select UserFirstName,UserLastName from users where UserID='$uid'");
$row=mysqli_fetch_array($ret);
$fname=$row['UserFirstName'];
$lname=$row['UserLastName'];
if (!isset($uid))
{
    echo "<script>alert('Please Login first !');</script>";
    echo "<script>document.location = 'login.php';</script>";
}

    ?>
    <!DOCTYPE html>
    <html>
    <head>

        <!-- for-mobile-apps -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="keywords" content="Super Market Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design"/>
        <script type="application/x-javascript"> addEventListener("load", function () {
                setTimeout(hideURLbar, 0);
            }, false);
            function hideURLbar() {
                window.scrollTo(0, 1);
            } </script>
        <!-- //for-mobile-apps -->
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all"/>
        <link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
        <!-- font-awesome icons -->
        <link href="css/font-awesome.css" rel="stylesheet">
        <!-- //font-awesome icons -->
        <!-- js -->
        <script src="js/jquery-1.11.1.min.js"></script>
        <!-- //js -->
        <link
            href='//fonts.googleapis.com/css?family=Raleway:400,100,100italic,200,200italic,300,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic'
            rel='stylesheet' type='text/css'>
        <link
            href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic'
            rel='stylesheet' type='text/css'>
        <!-- start-smoth-scrolling -->
        <script type="text/javascript" src="js/move-top.js"></script>
        <script type="text/javascript" src="js/easing.js"></script>
        <script type="text/javascript">
            jQuery(document).ready(function ($) {
                $(".scroll").click(function (event) {
                    event.preventDefault();
                    $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1000);
                });
            });
        </script>

        <!-- start-smoth-scrolling -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

<!--        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />-->
<!--        <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />-->
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
        <link href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet">
        <script src='https://cdn.rawgit.com/pguso/jquery-plugin-circliful/master/js/jquery.circliful.min.js'></script>
        <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js" ></script>
    </head>
    </head>

    <body>
    <!-- header -->
    <div class="agileits_header">
        <div class="container">
            <div class="w3l_offers">
                <p>SALE UP TO 70% OFF. USE CODE "SALE70%" . <a href="products.php">SHOP NOW</a></p>
            </div>
            <div class="agile-login">
                <ul>
                    <li>
                        <?php 
    if(strlen($_SESSION['uid']==0))
    {
        echo "<a href='registered.php'> Create Account </a>";
    }
    else
    {
        echo "<a href='account.php'>Welcome $fname $lname!</a>";
    }
    ?></li>
                    <li>
                        <?php
                        if(strlen($_SESSION['uid']==0))
                        {
                            echo "<a href='login.php'> Log In </a>";
                        }
                        else
                        {
                            echo "<a href='logout.php'>Log Out</a>";
                        }
                        ?>
                        
                    <li><a href="contact.php">Help</a></li>

                </ul>
            </div>
            <div class="product_list_header">
                <form action="#" method="post" class="last">
                    <input type="hidden" name="cmd" value="_cart">
                    <input type="hidden" name="display" value="1">
                    <button class="w3view-cart" type="submit" name="submit" value=""><i class="fa fa-cart-arrow-down"
                                                                                        aria-hidden="true"></i></button>
                </form>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="logo_products">
        <div class="container">
            <div class="w3ls_logo_products_left1">
                <ul class="phone_email">
                    <li><i class="fa fa-phone" aria-hidden="true"></i>Order online or call us : (+0123) 234 567</li>

                </ul>
            </div>
            <div class="w3ls_logo_products_left">
                <h1><a href="index.php">super Market</a></h1>
            </div>
            <div class="w3l_search">
                <form action="productview.php" method="get">
                    <input type="search" name="Search" id="search" placeholder="Search for a Product..." required="">
                    <button  type="submit" class="btn btn-default search" aria-label="Left Align">
                        <i class="fa fa-search" aria-hidden="true"> </i>
                    </button>
                    <div class="clearfix"></div>
                    <div id="searchr" style="border: 1px solid #cccccc;width: 83%;border-collapse: collapse;z-index: 5;"></div>
                </form>
                <script>
                    $(function() {
                        $( "#search" ).keyup(function () {
                            var search=$(this).val();
                            if(search != '' && search.length>=3)
                            {
                                $.ajax({
                                    url:'search.php',
                                    type:'post',
                                    data:{search:search},
                                    success:function(response){
                                        console.log(response);
                                        $('#searchr').html(response);

                                    }
                                })}
                        });
                    });


                </script>
                </form>
            </div>

            <div class="clearfix"></div>
        </div>
    </div>
    <!-- //header -->
    <!-- navigation -->
    <div class="navigation-agileits">
        <div class="container">
            <nav class="navbar navbar-default">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header nav_2">
                    <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse"
                            data-target="#bs-megadropdown-tabs">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="index.php" class="act">Home</a></li>
                        <!-- Mega Menu -->
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Groceries<b
                                    class="caret"></b></a>
                            <ul class="dropdown-menu multi-column columns-3">
                                <div class="row">
                                    <div class="multi-gd-img">
                                        <ul class="multi-column-dropdown">
                                            <h6>All Groceries</h6>
                                            <li><a href="groceries.php">Dals & Pulses</a></li>
                                            <li><a href="groceries.php">Almonds</a></li>
                                            <li><a href="groceries.php">Cashews</a></li>
                                            <li><a href="groceries.php">Dry Fruit</a></li>
                                            <li><a href="groceries.php"> Mukhwas </a></li>
                                            <li><a href="groceries.php">Rice & Rice Products</a></li>
                                        </ul>
                                    </div>

                                </div>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Household<b
                                    class="caret"></b></a>
                            <ul class="dropdown-menu multi-column columns-3">
                                <div class="row">
                                    <div class="multi-gd-img">
                                        <ul class="multi-column-dropdown">
                                            <h6>All Household</h6>
                                            <li><a href="household.php">Cookware</a></li>
                                            <li><a href="household.php">Dust Pans</a></li>
                                            <li><a href="household.php">Scrubbers</a></li>
                                            <li><a href="household.php">Dust Cloth</a></li>
                                            <li><a href="household.php"> Mops </a></li>
                                            <li><a href="household.php">Kitchenware</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Personal Care<b
                                    class="caret"></b></a>
                            <ul class="dropdown-menu multi-column columns-3">
                                <div class="row">
                                    <div class="multi-gd-img">
                                        <ul class="multi-column-dropdown">
                                            <h6>Baby Care</h6>
                                            <li><a href="personalcare.php">Baby Soap</a></li>
                                            <li><a href="personalcare.php">Baby Care Accessories</a></li>
                                            <li><a href="personalcare.php">Baby Oil & Shampoos</a></li>
                                            <li><a href="personalcare.php">Baby Creams & Lotion</a></li>
                                            <li><a href="personalcare.php"> Baby Powder</a></li>
                                            <li><a href="personalcare.php">Diapers & Wipes</a></li>
                                        </ul>
                                    </div>

                                </div>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Packaged Foods<b
                                    class="caret"></b></a>
                            <ul class="dropdown-menu multi-column columns-3">
                                <div class="row">
                                    <div class="multi-gd-img">
                                        <ul class="multi-column-dropdown">
                                            <h6>All Accessories</h6>
                                            <li><a href="packagedfoods.php">Baby Food</a></li>
                                            <li><a href="packagedfoods.php">Dessert Items</a></li>
                                            <li><a href="packagedfoods.php">Biscuits</a></li>
                                            <li><a href="packagedfoods.php">Breakfast Cereals</a></li>
                                            <li><a href="packagedfoods.php"> Canned Food </a></li>
                                            <li><a href="packagedfoods.php">Chocolates & Sweets</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Beverages<b
                                    class="caret"></b></a>
                            <ul class="dropdown-menu multi-column columns-3">
                                <div class="row">
                                    <div class="multi-gd-img">
                                        <ul class="multi-column-dropdown">
                                            <h6>Tea & Coeffe</h6>
                                            <li><a href="beverages.php">Green Tea</a></li>
                                            <li><a href="beverages.php">Ground Coffee</a></li>
                                            <li><a href="beverages.php">Herbal Tea</a></li>
                                            <li><a href="beverages.php">Instant Coffee</a></li>
                                            <li><a href="beverages.php"> Tea </a></li>
                                            <li><a href="beverages.php">Tea Bags</a></li>
                                        </ul>
                                    </div>

                                </div>
                            </ul>
                        </li>
                        <li><a href="gourmet.php">Gourmet</a></li>
                        <li><a href="offers.php">Offers</a></li>
                        <li><a href="contact.php">Contact</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>

    </body>
    </html>
    <?php

?>