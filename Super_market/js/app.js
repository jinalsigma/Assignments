/**
 * Created by jinalshah on 27/10/20.
 */
function register() {
    // var email = document.forms['myForm']['email'].value;
    // alert(email);
    // var x = email.indexOf('@');
    // var y = email.lastIndexOf('.');
    var firstName = document.getElementById('firstNameId').value;
    var lastName = document.getElementById('lastNameId').value;
    var contact = document.getElementById('phoneNoId').value;
    var file = document.getElementById('documentId').value;
    var emailAddress = document.getElementById('emailId').value;
    var password = document.getElementById('password').value;
    var password_confirm = document.getElementById('cpassword').value;
    if (firstName == '') {
        document.getElementById('formvalid').innerHTML = 'Please Enter Your First Name';
        return false;
    }
    else if (lastName == '') {
        document.getElementById('formvalid').innerHTML = 'Please Enter Your Last Name';
        return false;
    }
    else if (contact == '') {
        document.getElementById('formvalid').innerHTML = 'Please Enter Your Contact Number';
        return false;
    }
    else if (contact.length != 10){
        document.getElementById('formvalid').innerHTML = 'Please Enter Your Correct Contact Number';
        return false;
    }
    // else if(contact.indexOf('9') != 1 || contact.indexOf('8') != 1 || contact.indexOf('7') != 1)
    // {
    //     document.getElementById('formvalid').innerHTML = 'Please Enter Your Correct Contact Number1';
    //     return false;
    // }
    else if (file == '') {
        document.getElementById('formvalid').innerHTML = 'Please Attach your Document';
        return false;
    }
    else if (emailAddress == '') {
        document.getElementById('formvalid').innerHTML = 'Please Enter your Email Address';
        return false;
    }
    else if (emailAddress.indexOf('@') < 1 || emailAddress.lastIndexOf('.') < emailAddress.indexOf('@') + 2 || emailAddress.lastIndexOf('.') + 2 >= emailAddress.length) {
        document.getElementById('formvalid').innerHTML = 'Please Enter Your Email like exapmle@gmail.com';
        return false;
    }
    else if (password == '') {
        document.getElementById('formvalid').innerHTML = 'Please Enter Your Password';
        return false;
    }
    else if (password_confirm == '') {
        document.getElementById('formvalid').innerHTML = 'Please Enter Your confirmation password';
        return false;
    }
    else if (password_confirm !== password) {
        document.getElementById('formvalid').innerHTML = 'Password does not match Enter correct password';
        return false;
    }
}