<?php
/**
 * Created by PhpStorm.
 * User: jinalshah
 * Date: 27/10/20
 * Time: 1:13 PM
 */
session_start();
include('dbconnection.php');
if(strlen($_SESSION['uid']!=0))
{
    echo "<script>alert('You are already logged in');</script>";
    echo "<script> window.location.href ='account.php'; </script>";
}
//include('header.php');
else {
    if (isset($_POST['submit'])) {
        $fname = trim($_POST['firstName']);
        $lname = trim($_POST['lastNameId']);
        $contact = trim($_POST['phoneNoId']);
        $email = trim($_POST['emailId']);
        $password = trim($_POST['password']);
        $cpassword = trim($_POST['cpassword']);
        $document = trim(($_POST['document']));
        $file = $_FILES['document']['name'];
        $extension = substr($file, strlen($file) - 4, strlen($file));
//    $imgnewfile = $file.$extension;
//    $allowed_extensions = array(".jpg","jpeg",".png",".pdf");
        $file_loc = $_FILES['document']['tmp_name'];
        $new_file_name = strtolower($file);
        $final_file = str_replace(' ', '_', $new_file_name);
        $folder = "/var/www/html/super_market_jinal.com/uploadeddata/";
        if (empty($fname)) {
            $error = "Please Enter your First Name !";
            $code = 1;
        } else if (!ctype_alpha($fname)) {
            $error = "Please enter letters only in first name!";
            $code = 1;
        } else if (empty($lname)) {
            $error = "Please Enter your LastName!";
            $code = 2;
        } else if (!ctype_alpha($lname)) {
            $error = "Please enter letters only !";
            $code = 2;
        } else if (empty($contact)) {
            $error = "Please Enter your Contact Number !";
            $code = 3;
        } else if (!is_numeric($contact)) {
            $error = "Please Enter Numbers only!";
            $code = 3;
        } else if (strlen($contact) != 10) {
            $error = "Contact Number should be of 10 digits only!";
            $code = 3;
        } else if (empty($file)) {
            $error = "Please Attach your Document!";
            $code = 4;
        } else if (empty($email)) {
            $error = "Please Enter your E-mail!";
            $code = 5;
        } else if (!preg_match("/^[_.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+.)+[a-zA-Z]{2,6}$/i", $email)) {
            $error = "Please Enter valid E-mail!";
            $code = 5;
        } else if (empty($password)) {
            $error = "Please Enter your Password!";
            $code = 6;
        } else if (strlen($password) < 8) {
            $error = "Password should be of minimum 8 characters!";
            $code = 6;
        }
//    else if(empty($cpassword))
//    {
//        $error = "Please Confirm your Password!";
//        $code = 7;
//    }

        else if (($password) != $cpassword) {
            echo "Pass" . $cpassword;
            echo $password;
            $error = "Passwords do not match. Enter correct Password!";
            $code = 7;
        } else {
            $ret = mysqli_query($con, "select UserEmail from users where UserEmail='" . $email . "' || UserPhone='" . $contact . "'");
            $result = mysqli_fetch_array($ret);

            if ($result > 0) {
                echo "<script>alert('This email or Contact Number already associated with another account');</script>";
                echo "<script>window.location.href ='registered.php'</script>";
            } else {
                $password = trim(md5($_POST['password']));
                $cpassword = trim(md5($_POST['cpassword']));
                $query = mysqli_query($con, "insert into users(UserFirstName, UserLastName, UserPhone, UserFile, UserEmail, UserPassword) value('$fname', '$lname','$contact','$final_file', '$email', '$password' )");
                if ($query) {
                    echo "<script>alert('You have successfully registered');</script>";
                    move_uploaded_file($file_loc, $folder . $final_file);
                    $to = $_POST['emailId'];
                    $subject = "Account Verification Mail";
                    $from = "Sigmainfo.net";
                    $message = "Hello" . $fname . ", \n Your account has been verified and successfully activated with this email address.";
                    $headers = 'MIME-Version: 1.0' . "\r\n";
                    //    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                    //    $headers .= 'From: '.$from."\r\n". 'Reply-To: '.$from."\r\n";
                    if (mail($to, $subject, $message, $headers)) {
                        echo "<script>alert('Your mail has been Sent successfully');</script>";
                    } else {
                        echo "<script>alert('Your registration mail Failed');</script>";
                    }
                    echo "<script>window.location.href ='login.php'</script>";
                } else {
                    echo "<script>alert('Something Went Wrong. Please try again');</script>";
                    echo "<script>window.location.href ='registered.php'</script>";
                }
            }

        }
    }
}
?>
<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
//include('header.php');
//?>
<!DOCTYPE html>
<html>
<head>
    <title>Super Market an Ecommerce Online Shopping Category Flat Bootstrap Responsive Website Template | Registered :: w3layouts</title>
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
    <link href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet">
    <script src='https://cdn.rawgit.com/pguso/jquery-plugin-circliful/master/js/jquery.circliful.min.js'></script>
    <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js" ></script>
    <!-- start-smoth-scrolling -->
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
                    <a href='registered.php'> Create Account
                    </li>
                <li>
                    <a href='login.php'> Log In </a></li>
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
                <button type="submit" class="btn btn-default search" aria-label="Left Align">
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
<!-- //navigation -->
<!-- breadcrumbs -->
<div class="breadcrumbs">
    <div class="container">
        <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
            <li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
            <li class="active">Register Page</li>
        </ol>
    </div>
</div>
<!-- //breadcrumbs -->
<!-- register -->
<div class="register">
    <div class="container">
        <h2>Register Here</h2>
        <div class="login-form-grids">
            <h5>profile information</h5>
            <form  role="form"  enctype="multipart/form-data" method="POST" name="myForm">
                <?php
                if(isset($error))
                {
                ?>
                <div id="formvalid"><?php echo $error; ?></div>
                    <?php
                }
                ?>
                <input type="text" name="firstName" placeholder="First Name..." id="firstNameId" value="<?php if(isset($fname)){echo $fname;} ?>"  <?php if(isset($code) && $code == 1){ echo "autofocus"; }  ?> />
                <input type="text" placeholder="Last Name..."  id="lastNameId" name="lastNameId" value="<?php if(isset($lname)){echo $lname;} ?>"  <?php if(isset($code) && $code == 2){ echo "autofocus"; }  ?> />
                <input type="text" placeholder="Contact Number..." id="phoneNoId" name="phoneNoId" value="<?php if(isset($contact)){echo $contact;} ?>"  <?php if(isset($code) && $code == 3){ echo "autofocus"; }  ?> />
                <label class="verfication">Identity Verification Document...</label>
                <input type="file" name="document" id="documentId" value="<?php if(isset($document)){echo $document;} ?>"  <?php if(isset($code) && $code == 4){ echo "autofocus"; }  ?> />

                <div class="register-check-box">
                    <div class="check">
                        <label class="checkbox"><input type="checkbox" name="checkbox"><i> </i>Subscribe to Newsletter</label>
                    </div>
                </div>
                <h6>Login information</h6>
                <input type="email" placeholder="Email Address"  id="emailId" name="emailId" value="<?php if(isset($email)){echo $email;} ?>"  <?php if(isset($code) && $code == 5){ echo "autofocus"; }  ?> />
                <input type="password" placeholder="Password" id="password" name="password" value="<?php if(isset($password)){echo $password;} ?>"  <?php if(isset($code) && $code == 6){ echo "autofocus"; }  ?> />
                <input type="password" placeholder="Password Confirmation" name="cpassword" id="cpassword" value="<?php if(isset($cpassword)){echo $cpassword;} ?>"  <?php if(isset($code) && $code == 7){ echo "autofocus"; }  ?> />
                <div class="register-check-box">
                    <div class="check">
                        <label class="checkbox"><input type="checkbox" name="checkbox"><i> </i>I accept the terms and conditions</label>
                    </div>
                </div>
                <input type="submit" name="submit" value="Register" onclick="return register()">
            </form>
        </div>
        <div class="register-home">
            <a href="index.php">Home</a>
        </div>
    </div>
</div>
<!-- //register -->
<!-- //footer -->
<?php
include('footer.php');
?>

</body>
</html>
