<?php
/**
 * Created by PhpStorm.
 * User: jinalshah
 * Date: 12/11/20
 * Time: 4:17 PM
 */
include ('dbconnection.php');
include ('header.php');
$search = $_REQUEST['Search'];
$per_page_record = 3;
if (isset($_GET["page"])) {
    $page = $_GET["page"];
}
else {
    $page=1;
}

$start_from = ($page-1) * $per_page_record;

$query = "SELECT ProductName,ProductPrice,ProductImage FROM products where ProductName LIKE '%" . $search . "%' LIMIT $start_from, $per_page_record";
$rs_result = mysqli_query ($con, $query);
?>
<style>
    .pagination {
        display: inline-block;
        margin: 20px !important;
    }

    .pagination a {
        font-weight:bold;
        font-size:14px;
        color: black;
        float: left;
        padding: 6px 12px;
        text-decoration: none;
        border:1px solid #ddd;
        border-radius: 4px;
    }
    .pagination a.active {
        background-color: #FFC229;
    }
    .pagination a:hover:not(.active) {
        background-color: #EEE;
        color: ##23528A;
    }
</style>
<div class="breadcrumbs">
    <div class="container">
        <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
            <li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
            <li class="active">Products</li>
        </ol>
    </div>
</div>
    <div class="products">
        <div class="container">
            <div class="col-md-4 products-left">
                <div class="categories">
                    <h2>Categories</h2>
                    <ul class="cate">
                        <li><a href="products.php"><i class="fa fa-arrow-right" aria-hidden="true"></i>Fruits And Vegetables</a></li>
                        <ul>
                            <li><a href="products.php"><i class="fa fa-arrow-right" aria-hidden="true"></i>Cuts & Sprouts</a></li>
                            <li><a href="products.php"><i class="fa fa-arrow-right" aria-hidden="true"></i>Flowers</a></li>
                            <li><a href="products.php"><i class="fa fa-arrow-right" aria-hidden="true"></i>Fresh Herbs & Seasonings</a></li>
                            <li><a href="products.php"><i class="fa fa-arrow-right" aria-hidden="true"></i>Fresh Vegetables</a> </li>
                            <li><a href="products.php"><i class="fa fa-arrow-right" aria-hidden="true"></i>International Vegetables</a> </li>
                            <li><a href="products.php"><i class="fa fa-arrow-right" aria-hidden="true"></i>Organic Fruits & Vegetables</a></li>
                        </ul>
                        <li><a href="products.php"><i class="fa fa-arrow-right" aria-hidden="true"></i>Grocery & Staples</a></li>
                        <ul>
                            <li><a href="products.php"><i class="fa fa-arrow-right" aria-hidden="true"></i>Dals & Pulses</a> </li>
                            <li><a href="products.php"><i class="fa fa-arrow-right" aria-hidden="true"></i>Dry Fruits</a> </li>
                            <li><a href="products.php"><i class="fa fa-arrow-right" aria-hidden="true"></i>Edible Oils & Ghee</a> </li>
                            <li><a href="products.php"><i class="fa fa-arrow-right" aria-hidden="true"></i>Flours & Sooji</a> </li>
                            <li><a href="products.php"><i class="fa fa-arrow-right" aria-hidden="true"></i>Masalas & Spices</a> </li>
                            <li><a href="products.php"><i class="fa fa-arrow-right" aria-hidden="true"></i>Organic Staples</a> </li>
                            <li><a href="products.php"><i class="fa fa-arrow-right" aria-hidden="true"></i>Rice & Rice Products</a> </li>
                            <li><a href="products.php"><i class="fa fa-arrow-right" aria-hidden="true"></i>Salt, Sugar & Jaggery</a></li>
                        </ul>
                        <li><a href="products.php"><i class="fa fa-arrow-right" aria-hidden="true"></i>PersonalCare</a></li>
                        <ul>
                            <li><a href="products.php"><i class="fa fa-arrow-right" aria-hidden="true"></i>Baby Care</a> </li>
                            <li><a href="products.php"><i class="fa fa-arrow-right" aria-hidden="true"></i>Cosmetics</a> </li>
                            <li><a href="products.php"><i class="fa fa-arrow-right" aria-hidden="true"></i>Deos & Perfumes</a> </li>
                            <li><a href="products.php"><i class="fa fa-arrow-right" aria-hidden="true"></i>Skin Care</a> </li>
                            <li><a href="products.php"><i class="fa fa-arrow-right" aria-hidden="true"></i>Sanitary Needs</a> </li>
                            <li><a href="products.php"><i class="fa fa-arrow-right" aria-hidden="true"></i>Oral Care</a> </li>
                            <li><a href="products.php"><i class="fa fa-arrow-right" aria-hidden="true"></i>Personal Hygiene</a> </li>
                            <li><a href="products.php"><i class="fa fa-arrow-right" aria-hidden="true"></i>Shaving Needs</a></li>
                        </ul>
                    </ul>
                </div>
            </div>

            <div class="col-md-8 products-right">
                <div class="agile_top_brands_grids">
                    <?php
                    // echo "<script>alert('Hello');</script>";
                   // $query = "SELECT ProductName,ProductPrice,ProductImage FROM products WHERE ProductName LIKE '%" . $search . "%'";
                   // $result = mysqli_query($con,$query);
                    while($row=mysqli_fetch_array($rs_result)) {
                    $ProductName = $row['ProductName'];
                    $ProductPrice = $row['ProductPrice'];
                        $ProductImage = $row['ProductImage'];
                    ?>
                    <div class="col-md-4 top_brand_left" style="margin-top: 5%;">
                        <div class="hover14 column">
                            <div class="agile_top_brand_left_grid">
                                <div class="agile_top_brand_left_grid_pos">
                                    <img src="images/offer.png" alt=" " class="img-responsive">
                                </div>
                                <div class="agile_top_brand_left_grid1">
                                    <figure>
                                        <div class="snipcart-item block">
                                            <div class="snipcart-thumb">
                                                <a href="single.php"><img title=" " alt=" " src="images/<?php echo $ProductImage ?>"></a>
                                                <p><?php echo $ProductName;?></p>
                                                <h4>$<?php echo $ProductPrice;?></h4>
                                            </div>
                                            <div class="snipcart-details top_brand_home_details">
                                                <form action="#" method="post">
                                                    <fieldset>
                                                        <input type="hidden" name="cmd" value="_cart">
                                                        <input type="hidden" name="add" value="1">
                                                        <input type="hidden" name="business" value=" ">
                                                        <input type="hidden" name="item_name" value="Fortune Sunflower Oil">
                                                        <input type="hidden" name="amount" value="35.99">
                                                        <input type="hidden" name="discount_amount" value="1.00">
                                                        <input type="hidden" name="currency_code" value="USD">
                                                        <input type="hidden" name="return" value=" ">
                                                        <input type="hidden" name="cancel_return" value=" ">
                                                        <input type="submit" name="submit" value="Add to cart" class="button">
                                                    </fieldset>
                                                </form>
                                            </div>
                                        </div>
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php  }?>
                    <div class="clearfix"> </div>
                </div>
                <nav class="numbering">
                    <div class="pagination">
                        <?php
                        $query = "SELECT COUNT(*) FROM products WHERE ProductName LIKE '%" . $search . "%'";
                        $rs_result = mysqli_query($con, $query);
                        $row = mysqli_fetch_row($rs_result);
                        $total_records = $row[0];

                        echo "</br>";
                        $total_pages = ceil($total_records / $per_page_record);
                        $pagLink = "";

                        if($page>=2){
                            $url = 'productview.php?Search='.$search.'&page='.($page-1);
                            echo "<a href=$url>  &laquo;</a>";
                        }

                        for ($i=1; $i<=$total_pages; $i++) {
                            if ($i == $page) {
                                $url1 = 'productview.php?Search='.$search.'&page='.$i;
                                $pagLink .= "<a class = 'active' href=$url1>$i</a>";
                            }
                            else  {
                            $url2= 'productview.php?Search='.$search.'&page='.$i;
                                $pagLink .= "<a href=$url2>$i</a>";
                            }
                        };
                        echo $pagLink;

                        if($page<$total_pages){
                            $url3='productview.php?Search='.$search.'&page='.($page+1);
                            echo "<a href=$url3> &raquo;</a>";
                        }

                        ?>
                    </div>
                </nav>
            </div>

</div></div>
<?php
include ('footer.php');
?>