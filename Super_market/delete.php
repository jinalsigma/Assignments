<?php
/**
 * Created by PhpStorm.
 * User: jinalshah
 * Date: 11/11/20
 * Time: 10:59 PM
 */
include ('dbconnection.php');
if(isset($_REQUEST['del']))
{
    $uid = intval($_GET['del']);
    echo $uid;
    $sql = mysqli_query($con, "delete from address where AddressId='$uid'");
    echo "<script> alert('Data deleted successfully');</script>";
    echo "<script> window.location.href ='account.php'; </script>";
}
?>