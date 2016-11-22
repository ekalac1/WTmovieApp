function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

function filterFunction() {
    var input, filter, ul, li, a, i;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    var div = document.getElementById("myDropdown");
    a = div.getElementsByTagName("a");
    for (i = 0; i < a.length; i++) {
        if (a[i].innerHTML.toUpperCase().indexOf(filter) > -1) {
            a[i].style.display = "";
        }
        else {
            a[i].style.display = "none";
        }
    }
}

function reloadPage(sadrzaj) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("context").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", sadrzaj, true);
    xhttp.send();
}

function validateLogin() {
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
    var y = document.getElementById("valtext");
    if (username == "") {
        y.innerHTML = "Username can't be blank!";
        return false;
    }
    else if (password == "") {
        y.innerHTML = "Password can't be blank!";
        return false;
    }
    else {
        return true;
    }
}

function validateRegistration() {
    var username = document.getElementById("usernamereg").value;
    var password = document.getElementById("passwordreg").value;
    var email = document.getElementById("email").value;
    var y = document.getElementById("mssg");
    if (username == "") {
        y.innerHTML = "Username can't be blank!";
        return false;
    }
    else if (password == "") {
        y.innerHTML = "Password can't be blank!";
        return false;
    }
    else if (ValidateEmail(email)) {
        return true;
    }
    else if (!ValidateEmail(email)) {
        y.innerHTML = "Wrong email!";
        return false;
    }
    else {
        return true;
    }
}

function ValidateEmail(email) {
    var emailReg = /^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
    var bo = emailReg.test(email);
    var a = 0;
    return bo;
}

function ResizeImage() {
    var imagesmall = document.getElementsByClassName("images")[0];
    var imagelarge = document.getElementById("large");
    document.onkeydown = function (event) {
        event = event || window.event;
        var isEscape = false;
        if ("key" in event) {
            isEscape = (event.key == "Escape" || event.key == "Esc");
        }
        else {
            isEscape = (event.keyCode == 27);
        }
        if (isEscape && document.getElementById("ex_image").style.display == 'block') {
            document.getElementById("ex_image").style.display = 'none'
            document.getElementById("context").style.display = 'block';
        }
    }
    var link = imagesmall.src;
    imagelarge.src = link;
    document.getElementById("ex_image").style.display = 'block';
    document.getElementById("context").style.display = 'none';
}
