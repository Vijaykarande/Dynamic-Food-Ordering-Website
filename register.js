/*  Dishant javascript */

function formdata() {

    var fname = document.getElementById("fname").value;
    var lname = document.getElementById("lname").value;
    var email = document.getElementById("email").value;
    var phone = document.getElementById("phone").value;
    var password = document.getElementById("password").value;
    var confirmpassword = document.getElementById("confirmpassword").value;



    if (fname == "" || lname == "" || email == ""|| phone == "" || password == "") {

        alert("All Fields are Mandatory");
        return false;

    } else if (fname.length < 3) {

        alert("Firstname Should be more than three charecter");
        return false;

    } else if (fname.length > 20) {

        alert("Firstname Should be more than twenty charecter");
        return false;

    } else if (!/^[A-Za-z]+$/.test(fname)) {
        alert("Firstname Should Only Contain Alphabets.");
        return false;
    } else if (!/^[A-Za-z]+$/.test(lname)) {
        alert("lastname Should Only Contain Alphabets.");
        return false;
    } else if (lname.length < 3) {

        alert("Lastname Should be more than three charecter");
        return false;

    } else if (lname.length > 20) {

        alert("Lastname Should be more than twenty charecter");
        return false;

    } else if (password.length < 8) {
        alert("Password should be at least 8 characters long!");
        return false;
    } else if (!/[A-Z]/.test(password)) {
        alert("Password should contain at least one uppercase letter!");
        return false;
    } else if (!/[!@#$%^&*()_+\-=\[\]{ };':"\\|,.<>\/?]/.test(password)) {
        alert("Password should contain at least one special symbol!");
        return false;

    }
    else if(phone.length<10 || phone.length>10 )
        {
        
        alert("Number Should be of 10 Digit ! Please Enter Valid Number");
        return false;
        
        }
    else if (confirmpassword != password) {
        alert("password and confirmpassword should be match.");
        return false;
    }
    else {
        true;
    }

}