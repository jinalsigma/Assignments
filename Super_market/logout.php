<?php
/**
 * Created by PhpStorm.
 * User: jinalshah
 * Date: 28/10/20
 * Time: 6:11 PM
 */
session_start();
session_unset();
session_destroy();
header('location:index.php');
?>