/**
 * Created by jinalshah on 14/10/20.
 */

function  validate() {
    var sname = document.getElementsByName("sname")[0].value;
    var scontact = document.getElementsByName("scontact")[0].value;
    var saddress = document.getElementsByName("saddress")[0].value;
    var scity = document.getElementsByName("scity")[0].value;
    var sstate = document.getElementsByName("sstate")[0].value;
    var spin = document.getElementsByName("spin")[0].value;
    if (document.getElementById('remember').checked){
       document.getElementsByName("bname")[0].value = sname;
        document.getElementsByName("bcontact")[0].value = scontact;
        document.getElementsByName("baddress")[0].value = saddress;
        document.getElementsByName("bcity")[0].value = scity;
        document.getElementsByName("bstate")[0].value = sstate;
        document.getElementsByName("bpin")[0].value = spin;

    }else{
        document.getElementsByName("bname")[0].value = null;
        document.getElementsByName("bcontact")[0].value = null;
        document.getElementsByName("baddress")[0].value = null;
        document.getElementsByName("bcity")[0].value = null;
        document.getElementsByName("bstate")[0].value = null;
        document.getElementsByName("bpin")[0].value = null;
    }
}
function check() {
    var scontact = document.getElementsByName("scontact")[0].value;
    var spin = document.getElementsByName("spin")[0].value;
    if (scontact.length != 10) {
        alert("Check your phone number");
    }
    if (spin.length != 6)
    {
        alert("Please check your pin");
    }

}