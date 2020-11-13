<?php
/**
 * Created by PhpStorm.
 * User: jinalshah
 * Date: 27/10/20
 * Time: 12:44 PM
 */
$con=mysqli_connect("localhost", "admin", "admin@123", "super_market");
if(mysqli_connect_errno())
{
    echo "Connection Fail".mysqli_connect_error();
}

?>