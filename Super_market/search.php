<?php
/**
 * Created by PhpStorm.
 * User: jinalshah
 * Date: 12/11/20
 * Time: 12:53 AM
 */
include ('dbconnection.php');
$search = $_REQUEST['search'];

if (isset($_REQUEST['search'])) {

    $query = "SELECT * FROM products WHERE ProductName LIKE '%" . $search . "%' OR ProductSKU LIKE '%".$search."%' LIMIT 5";
//    echo $query;
//    exit;
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {

        while ($data = mysqli_fetch_assoc($result)) {
            $output .= '
 <a href="products.php" style="padding: 10px;color:#333333">' . $data["ProductName"] . '<br/></a>';
        }
        echo $output;

    }
//    $result = mysqli_query($con, $query);
//    if($result->num_rows >0)
//    {
//    while ($data = mysqli_fetch_assoc($result)) {
//
//        '<a href="products.php">'.$data["ProductName"].'<br/></a>';
//    }
//}}
}
?>
