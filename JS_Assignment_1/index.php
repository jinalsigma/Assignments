<?php
/**
 * Created by PhpStorm.
 * User: jinalshah
 * Date: 14/10/20
 * Time: 2:11 PM
 */
?>
<html>
<head>
    <title>Form validation using Javascript</title>
    <link rel="stylesheet" href="style.css">
    <script src="index.js"></script>
</head>
<body>
    <form class="form1">
        <fieldset>
        <legend>Shipping Information</legend>
        <label>Name:</label><br>
            <input type="text" name="sname"><br>
            <label>Contact Number:</label><br>
            <input type="tel" name="scontact"><br>
        <label>Address:</label><br>
            <textarea cols="20" rows="5" name="saddress"></textarea><br>
            <label>City:</label><br>
            <input type="text" name="scity"><br>
            <label>State:</label><br>
            <input type="text"name="sstate"><br>
            <label>Pincode:</label><br>
            <input type="text" name="spin"><br>
        </fieldset>
    </form><br><br>
    <input id="remember" name="remember" type="checkbox" onclick="validate()">Is the Billing Information same?
    <form class="form2">
    <fieldset>
        <legend>Billing Information  </legend>
        <label>Name:</label><br>
        <input type="text" name="bname"><br>
        <label>Contact Number:</label><br>
        <input type="tel" name="bcontact"><br>
        <label>Address:</label><br>
        <textarea cols="20" rows="5" name="baddress"></textarea><br>
        <label>City:</label><br>
        <input type="text" name="bcity"><br>
        <label>State:</label><br>
        <input type="text" name="bstate"><br>
        <label>Pincode:</label><br>
        <input type="text" name="bpin"><br>
    </fieldset><br><br>
        <input type="submit" value="Verify" onclick="check()">
    </form>
</body>
</html>
