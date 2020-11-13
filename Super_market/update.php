<?php
/**
 * Created by PhpStorm.
 * User: jinalshah
 * Date: 11/11/20
 * Time: 5:36 PM
 */
include ('dbconnection.php');
include('header.php');

// Get the userid
$userid=intval($_GET['id']);

$sql = mysqli_query($con, "select AddressId,UserAddress,UserCountry,UserState,UserCity,UserPostcode,UserPhone from address where AddressId='$userid'");
$row=mysqli_fetch_array($sql);
$UserAddress=$row['UserAddress'];
$UserCountry=$row['UserCountry'];
$UserState=$row['UserState'];
$UserCity=$row['UserCity'];
$UserPostcode=$row['UserPostcode'];
$UserPhone=$row['UserPhone'];
if(isset($_POST['update']))
{
    $UserAddress = $_POST['address'];
    $UserCountry= $_POST['country'];
    $UserState = $_POST['state'];
    $UserCity = $_POST['city'];
    $UserPostcode = $_POST['zipcode'];
    $UserPhone = $_POST['phone'];
    $sql = mysqli_query($con, "update address set UserAddress='$UserAddress',UserCountry='$UserCountry',UserState='$UserState',UserCity='$UserCity',UserPostcode='$UserPostcode',UserPhone='$UserPhone' WHERE AddressId='$userid'");

        echo "<script> alert('Data updated successfully');</script>";
        echo "<script> window.location.href ='account.php'; </script>";

}
?>


                    <form class="pb-modalreglog-form-reg" method="post">
                        <div class="form-group">
                            <div id="pb-modalreglog-progressbar"></div>
                        </div>
                        <div class="form-group">
                            <label for="email">Address</label>
                            <div class="input-group pb-modalreglog-input-group">
                                <span class="input-group-addon"><span class="fas fa-address-card"></span></span>
                                <input type="text" class="form-control" id="inputEmail" placeholder="Enter Address" name="address" value="<?php echo $UserAddress;?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password">City</label>
                            <div class="input-group pb-modalreglog-input-group">
                                <span class="input-group-addon"><span class="fas fa-city"></span></span>
                                <input type="text" class="form-control" id="inputPws" placeholder="Enter City" name="city" value="<?php echo $UserCity;?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="confirmpassword">State</label>
                            <div class="input-group pb-modalreglog-input-group">
                                <span class="input-group-addon"><span class="fa fa-bank"></span></span>
                                <input type="text" class="form-control" id="inputConfirmPws" placeholder="Enter State" name="state" value="<?php echo $UserState;?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="country">Country</label>
                            <div class="input-group pb-modalreglog-input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-globe"></span></span>
                                <input type="text" class="form-control" id="countries" placeholder="Country" name="country" value="<?php echo $UserCountry;?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="country">Postal Code</label>
                            <div class="input-group pb-modalreglog-input-group">
                                <span class="input-group-addon"><span class="fas fa-map-marker-alt"></span></span>
                                <input type="text" class="form-control" id="countries" placeholder="Enter Postal Code" name="zipcode" value="<?php echo $UserPostcode;?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="country">Contact Number</label>
                            <div class="input-group pb-modalreglog-input-group">
                                <span class="input-group-addon"><span class="fas fa-phone-alt"></span></span>
                                <input type="text" class="form-control" id="countries" placeholder="Enter Contact Number" name="phone" value="<?php echo $UserPhone;?>">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" name="update">Update</button>
                        </div>
                    </form>
<style>
    .form-group {
        width: 80%;
        margin-left: 5%
    }
    .btn-primary
    {
        margin-right: 15%;
    }
</style>
<?php
include ('footer.php');
?>