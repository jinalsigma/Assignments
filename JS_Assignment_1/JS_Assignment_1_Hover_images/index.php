<?php
/**
 * Created by PhpStorm.
 * User: jinalshah
 * Date: 15/10/20
 * Time: 11:21 AM
 */
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Photo Gallery</title>
    <link rel="stylesheet" href="style.css">
    <script src="index.js"></script>
</head>
<body>

<div id = "image">
    Hover over an image below to display here.
</div>

<img class = "preview" id="bandana" alt = "Styling with a Bandana" src = "https://s3-us-west-2.amazonaws.com/s.cdpn.io/389177/bacon.jpg" onmouseover="hoverimage1()" onmouseout="nohoverimage()">

<img class = "preview" id="boy" alt = "With My Boy" src = "https://s3-us-west-2.amazonaws.com/s.cdpn.io/389177/bacon2.JPG" onmouseover="hoverimage2()" onmouseout="nohoverimage()">

<img class = "preview" id="puppy" src = "https://s3-us-west-2.amazonaws.com/s.cdpn.io/389177/bacon3.jpg" alt = "Young Puppy" onmouseover="hoverimage3()" onmouseout="nohoverimage()">

</body>
</html>
