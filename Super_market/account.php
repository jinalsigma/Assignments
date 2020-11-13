<?php
/**
 * Created by PhpStorm.
 * User: jinalshah
 * Date: 6/11/20
 * Time: 4:16 PM
 */?>
<!DOCTYPE html>
<html>
<head>
    <title>Super Market an Ecommerce Online Shopping Category Flat Bootstrap Responsive Website Template | Household :: w3layouts</title>
    <!-- for-mobile-apps -->
    <style>
        .row
        {
            margin-left: 5% !important;
            margin-top: 5%;
            margin-bottom: 3%;
        }

    </style>
</head>
<body>
<!-- header -->
<?php
include('header.php');

$uid=$_SESSION['uid'];
$sql = mysqli_query($con, "select UserFirstName from users where UserId='$uid'");
$result = mysqli_fetch_array($sql);
if(isset($_POST['submit']))
{
    $UserAddress = $_POST['address'];
    $UserCountry= $_POST['country'];
    $UserState = $_POST['state'];
    $UserCity = $_POST['city'];
    $UserPostcode = $_POST['zipcode'];
    $UserPhone = $_POST['phone'];
    $query = mysqli_query($con, "insert into address(UserID, UserAddress, UserCountry, UserState, UserCity, UserPostcode, UserPhone) value($uid, '$UserAddress', '$UserCountry','$UserState','$UserCity', '$UserPostcode', '$UserPhone' )");
    if($query)
    {
        echo "<script>alert('You have successfully entered a new address');</script>";
    }
}
if(isset($_REQUEST['del']))
{
    $uid = intval($_GET['del']);
    echo $uid;
    $sql = mysqli_query($con, "delete from address where AddressId='$uid'");
    echo "<script> alert('Data deleted successfully');</script>";
    echo "<script> window.location.href ='account.php'; </script>";
}
?>

<!-- breadcrumbs -->
<div class="breadcrumbs">
    <div class="container">
        <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
            <li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
            <li class="active">Account</li>
        </ol>
    </div>
</div>
<!-- //breadcrumbs -->
<div class="row">

        <div class="pb-modalreglog-input-group">
            <button class="btn btn-primary pb-modalreglog-submit" data-toggle="modal" data-target="#myModal2">+ Add New Address</button>
        </div>
        <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel"> Address</h4>
                    </div>
                    <div class="modal-body">
                        <form class="pb-modalreglog-form-reg" method="post">
                            <div class="form-group">
                                <div id="pb-modalreglog-progressbar"></div>
                            </div>
                            <div class="form-group">
                                <label for="email">Address</label>
                                <div class="input-group pb-modalreglog-input-group">
                                    <span class="input-group-addon"><span class="fas fa-address-card"></span></span>
                                    <input type="text" class="form-control" id="inputEmail" placeholder="Enter Address" name="address">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password">City</label>
                                <div class="input-group pb-modalreglog-input-group">
                                    <span class="input-group-addon"><span class="fas fa-city"></span></span>
                                    <input type="text" class="form-control" id="inputPws" placeholder="Enter City" name="city">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="confirmpassword">State</label>
                                <div class="input-group pb-modalreglog-input-group">
                                    <span class="input-group-addon"><span class="fa fa-bank"></span></span>
                                    <input type="text" class="form-control" id="inputConfirmPws" placeholder="Enter State" name="state">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="country">Country</label>
                                <div class="input-group pb-modalreglog-input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-globe"></span></span>
                                    <input type="text" class="form-control" id="countries" placeholder="Country" name="country">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="country">Postal Code</label>
                                <div class="input-group pb-modalreglog-input-group">
                                    <span class="input-group-addon"><span class="fas fa-map-marker-alt"></span></span>
                                    <input type="text" class="form-control" id="countries" placeholder="Enter Postal Code" name="zipcode">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="country">Contact Number</label>
                                <div class="input-group pb-modalreglog-input-group">
                                    <span class="input-group-addon"><span class="fas fa-phone-alt"></span></span>
                                    <input type="text" class="form-control" id="countries" placeholder="Enter Contact Number" name="phone">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
<div class="table-responsive">
    <table id="mytable" class="table table-bordred table-striped">
        <thead>
        <th></th>
        <th>Address</th>
        <th>Country</th>
        <th>State</th>
        <th>City</th>
        <th>Post Code</th>
        <th>Phone</th>
        <th></th>
        <th></th>
        </thead>
        <tbody>
        <?php

$sql = mysqli_query($con, "select AddressId,UserAddress,UserCountry,UserState,UserCity,UserPostcode,UserPhone from address where UserID='$uid'");

        $cnt=1;
//        $jsonData = array();

           while($row=mysqli_fetch_assoc($sql)) {
               $AddressId = $row['AddressId'];
//               $jsonData[$AddressId] = $row;
               $UserAddress = $row['UserAddress'];
               $UserCountry = $row['UserCountry'];
               $UserState = $row['UserState'];
               $UserCity = $row['UserCity'];
               $UserPostcode = $row['UserPostcode'];
               $UserPhone = $row['UserPhone']; ?>
               <tr>
                   <td><?php echo htmlentities($cnt); ?></td>
                   <td><?php echo $UserAddress ?></td>
                   <td><?php echo $UserCountry ?></td>
                   <td><?php echo $UserState ?></td>
                   <td><?php echo $UserCity ?></td>
                   <td><?php echo $UserPostcode ?></td>
                   <td><?php echo $UserPhone ?></td>
                   <td>
                       <a href="update.php?id=<?php echo htmlentities($AddressId); ?>">
                           <button class="btn btn-danger btn-xs" style="background-color: #fff">
                               <span class="glyphicon glyphicon-pencil"></span></button>
                       </a>
                   </td>

                   <td><a href="delete.php?del=<?php echo htmlentities($AddressId); ?>">
                           <button class="btn btn-danger btn-xs" style="background-color: #fff"
                                   onClick="return confirm('Do you really want to delete');"><span
                                   class="glyphicon glyphicon-trash"></span></button>
                       </a></td>

               </tr>
               <?php
// for serial number increment
               $cnt++;
           } ?>
        </tbody>
    </table>
</div>
<!--<script>-->
<!--var addressArray = JSON.parse('--><?php //echo json_encode($jsonData); ?>
<!--/script-->


<?php
include('footer.php');
?>
</body>
</html>
