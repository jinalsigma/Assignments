/**
 * Created by jinalshah on 15/10/20.
 */
function hoverimage1() {
    document.getElementById("image").style.backgroundImage = "url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/389177/bacon.jpg')";
    document.getElementById("image").innerHTML = "Styling with a Bandana";

}
function hoverimage2()
{
    document.getElementById("image").style.backgroundImage = "url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/389177/bacon2.JPG')";
    document.getElementById("image").innerHTML = "With My Boy";
}
function hoverimage3()
{
    document.getElementById("image").style.backgroundImage = "url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/389177/bacon3.jpg')";
    document.getElementById("image").innerHTML = "Young Puppy";
}
function nohoverimage() {
   document.getElementById("image").style.backgroundImage = null;
    document.getElementById("image").innerHTML =  "Hover over an image below to display here."
}